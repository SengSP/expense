<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Validator, Auth;

class ExpenseController extends Controller
{
  // function buying page
  public function index()
  {
    $title = "ໜ້າລາຍຈ່າຍ";
    $year = (int)date('Y')-1;
    $expenses = DB::table('expenses')->where('datebuy', 'like', '%'.date('Y-m-d').'%')->where('userid', Auth::user()->id)->orderBy('expenseid', 'desc')->paginate(15);
    $showtotal = DB::table('expenses')->where('datebuy', 'like', '%'.date('Y-m-d').'%')->where('userid', Auth::user()->id)->sum('total');
    $no = 1;
    $count = count(DB::table('expenses')->where('datebuy', 'like', '%'.date('Y-m-d').'%')->where('userid', Auth::user()->id)->orderBy('expenseid', 'desc')->get());
    $dateselect = date('d', strtotime('Last day of this month'));
    return view('mybackend/expense')->with('title', $title)
    ->with('year', $year)->with('no', $no)->with('showtotal', $showtotal)
    ->with('expenses', $expenses)->with('count', $count)
    ->with('dateselect', $dateselect);
  }

  // function insert new expense
  public function fnInsertExpense(Request $req)
  {
    // dd($req->all());
      $databuy = array(
        'listbuy' =>  $req->input('listbuy'),
        'datebuy' =>  $req->input('datebuy'),
        'qty' =>  $req->input('qty'),
        'price' =>  $req->input('price'),
        'total' =>  $req->input('total'),
        'remark' =>  $req->input('remark'),
        'userid' =>  Auth::user()->id,
      );

      if(auth()->user()->hasPermissionTo('Add')){
        DB::table('expenses')->insert($databuy);
        return redirect('buying')->with('success', 'ການເພີ່ມຂໍ້ມູນສຳເລັດ!');
      }else{
        return back()->with('error', 'ທ່ານຍັງບໍ່ມີສິດເພີ່ມຂໍ້ມູນເຂົ້າລະບົບ!');
      }
  }

  // function load search
  public function fnLoadSearchex(Request $req)
  {
    $y = $req->y;
    $m = $req->m;
    $d = $req->d;
    $result = "";
    $expenses = DB::table('expenses')->where('datebuy', 'like', '%'.$y.'-'.$m.'-'.$d.'%')->where('userid', Auth::user()->id)->orderBy('expenseid', 'desc')->get();
    $showtotal = DB::table('expenses')->where('datebuy', 'like', '%'.$y.'-'.$m.'-'.$d.'%')->where('userid', Auth::user()->id)->sum('total');
    $count = count(DB::table('expenses')->where('datebuy', 'like', '%'.$y.'-'.$m.'-'.$d.'%')->where('userid', Auth::user()->id)->orderBy('expenseid', 'desc')->get());
    $i = 1;
    if(count($expenses) > 0){
      foreach($expenses as $exp){
        $result .= '
        <tr>
          <td>'.$i++.'</td>
          <td>'.$exp->listbuy.'</td>
          <td>'.$exp->datebuy.'</td>
          <td>'.$exp->qty.'</td>
          <td>'.number_format($exp->price).'</td>
          <td>'.number_format($exp->total).'</td>
          <td>'.$exp->remark.'</td>
          <td>
            <div class="dropleft adropdown">
              <a class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
              <div class="dropdown-menu dropdown-primary">
                <button class="dropdown-item" type="button" id="btnEditexp" value="'.$exp->expenseid.'"><i class="fas fa-pen-alt"></i> ແກ້ໄຂຂ້ໍມູນ</button>
                <button class="dropdown-item" type="button" id="btnTrashexp" value="'.$exp->expenseid.'"><i class="fas fa-trash-alt"></i> ລຶບ</button>
              </div>
            </div>
          </td>
        </tr>
        ';
      }
    }else{
      $result .= '
      <tr>
        <td colspan="8" class="text-center text-danger">ຍັງບໍ່ມີການບັນທຶກຂໍ້ມູນລາຍຈ່າຍ</td>
      </tr>
      ';
    }
    $data = array('result' => $result, 'showtotal' => number_format($showtotal), 'count' => $count);
    echo json_encode($data);
  }

  // function get expense data to edit form by expenseid
  public function fnGetexpensedata(Request $req)
  {
    $expenseid = $req->expenseid;
    $expenses = DB::table('expenses')->where('expenseid', $expenseid)->where('userid', Auth::user()->id)->get();
    foreach($expenses as $exp){
      $listbuy = $exp->listbuy;
      $datebuy = $exp->datebuy;
      $qty = $exp->qty;
      $price = $exp->price;
      $total = $exp->total;
      $remark = $exp->remark;
    }
    $data = array(
      'listbuy' => $listbuy,'datebuy' => $datebuy,'qty' => $qty,
      'price' => $price,'total' => $total,'remark' => $remark
    );
    echo json_encode($data);
  }

  // function update expense data by expenseid
  public function fnUpdatexpense(Request $req)
  {
    // dd($req->all());
    $dataupdate = array(
      'listbuy' =>  $req->input('listbuy'),
      'datebuy' =>  $req->input('datebuy'),
      'qty' =>  $req->input('qty'),
      'price' =>  $req->input('price'),
      'total' =>  $req->input('total'),
      'remark' =>  $req->input('remark')
    );
    if(auth()->user()->hasPermissionTo('Edit')){
      DB::table('expenses')->where('expenseid', $req->input('expenseid'))->where('userid', Auth::user()->id)->update($dataupdate);
      return redirect('buying')->with('success', 'ການແກ້ໄຂຂໍ້ມູນສຳເລັດ!');
    }else{
      return back()->with('error', 'ທ່ານຍັງບໍ່ມີສິດແກ້ໄຂຂໍ້ມູນຂອງລະບົບ!');
    }
  }

  // function delete
  public function fnDeletedataexp(Request $req)
  {
    // dd($req->all());
    if(auth()->user()->hasPermissionTo('Delete')){
      DB::table('expenses')->where('expenseid', $req->input('delexpid'))->where('userid', Auth::user()->id)->delete();
      return redirect('buying')->with('success', 'ການລຶບຂໍ້ມູນສຳເລັດ!');
    }else{
      return back()->with('error', 'ທ່ານຍັງບໍ່ມີສິດລົບຂໍ້ມູນຂອງລະບົບ!');
    }
  }
}
