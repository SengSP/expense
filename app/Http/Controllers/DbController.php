<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Auth, Validator;
use Illuminate\Support\Str;

class DbController extends Controller
{
  // dashboard page
  public function index()
  {
    $title = "ໜ້າກະດານ";

    // count expense today
    $expensetoday = DB::table('expenses')->where('datebuy', 'like', '%'.date('Y-m-d').'%')->where('userid', Auth::user()->id)->sum('total');
  
    // sum expense this week
    $monday = date('Y-m-d', strtotime('Monday this week'));
    $sunday = date('Y-m-d', strtotime('Sunday this week'));
    $expthisweek = DB::table('expenses')->whereBetween('datebuy', [$monday, $sunday])->where('userid', Auth::user()->id)->sum('total');

    // sum expense this month
    $firstday = date('Y-m-d', strtotime('First day of this month'));
    $lastday = date('Y-m-d', strtotime('Last day of this month'));
    $expthismonth = DB::table('expenses')->whereBetween('datebuy', [$firstday, $lastday])->where('userid', Auth::user()->id)->sum('total');

    // sum expense this year
    $firstdayofyear = date('Y-m-d', strtotime('First day of January'));
    $lastdayofyear = date('Y-m-d', strtotime('Last day of December'));
    $expthisyear = DB::table('expenses')->whereBetween('datebuy', [$firstdayofyear, $lastdayofyear])->where('userid', Auth::user()->id)->sum('total');

    return view('mybackend/dashboard')->with('title', $title)
                                      ->with('exptoday', number_format($expensetoday))
                                      ->with('expthisweek', number_format($expthisweek))
                                      ->with('expthismonth', number_format($expthismonth))
                                      ->with('expthisyear', number_format($expthisyear));
  }

  // function data to show on chart
  public function fnLoadexpensechart(Request $req)
  {
    $jan = DB::table('expenses')->where('datebuy', 'like', '%'.date('Y').'-01'.'%')->where('userid', Auth::user()->id)->sum('total');
    $feb = DB::table('expenses')->where('datebuy', 'like', '%'.date('Y').'-02'.'%')->where('userid', Auth::user()->id)->sum('total');
    $mar = DB::table('expenses')->where('datebuy', 'like', '%'.date('Y').'-03'.'%')->where('userid', Auth::user()->id)->sum('total');
    $apr = DB::table('expenses')->where('datebuy', 'like', '%'.date('Y').'-04'.'%')->where('userid', Auth::user()->id)->sum('total');
    $may = DB::table('expenses')->where('datebuy', 'like', '%'.date('Y').'-05'.'%')->where('userid', Auth::user()->id)->sum('total');
    $jun = DB::table('expenses')->where('datebuy', 'like', '%'.date('Y').'-06'.'%')->where('userid', Auth::user()->id)->sum('total');
    $jul = DB::table('expenses')->where('datebuy', 'like', '%'.date('Y').'-07'.'%')->where('userid', Auth::user()->id)->sum('total');
    $aug = DB::table('expenses')->where('datebuy', 'like', '%'.date('Y').'-08'.'%')->where('userid', Auth::user()->id)->sum('total');
    $sep = DB::table('expenses')->where('datebuy', 'like', '%'.date('Y').'-09'.'%')->where('userid', Auth::user()->id)->sum('total');
    $oct = DB::table('expenses')->where('datebuy', 'like', '%'.date('Y').'-10'.'%')->where('userid', Auth::user()->id)->sum('total');
    $nov = DB::table('expenses')->where('datebuy', 'like', '%'.date('Y').'-11'.'%')->where('userid', Auth::user()->id)->sum('total');
    $dec = DB::table('expenses')->where('datebuy', 'like', '%'.date('Y').'-12'.'%')->where('userid', Auth::user()->id)->sum('total');
    $data = array(
      'jan' => $jan,'feb' => $feb,'mar' => $mar,'apr' => $apr,'may' => $may,'jun' => $jun,
      'jul' => $jul,'aug' => $aug,'sep' => $sep,'oct' => $oct,'nov' => $nov,'dec' => $dec,
    );
    echo json_encode($data);
  }

  // function show expense this month list
  public function fnExpenseMonth()
  {
    $firstday = date('Y-m-d', strtotime('First day of this month'));
    $lastday = date('Y-m-d', strtotime('Last day of this month'));
    $expthismonth = DB::table('expenses')->whereBetween('datebuy', [$firstday, $lastday])->where('userid', Auth::user()->id)->paginate(20);
    $showtotal = DB::table('expenses')->whereBetween('datebuy', [$firstday, $lastday])->where('userid', Auth::user()->id)->sum('total');
    $title = "ລາຍຈ່າຍຂອງເດືອນນີ້ ".date('m-Y');
    $no = 1;
    return view('mybackend/expmonth')->with('title', $title)
                                     ->with('expthismonth', $expthismonth)
                                     ->with('no', $no)->with('showtotal', $showtotal)
                                     ->with('count', count($expthismonth));
  }

  public function fnExpthisweek()
  {
    $monday = date('Y-m-d', strtotime('Monday this week'));
    $sunday = date('Y-m-d', strtotime('Sunday this week'));
    $expthisweek = DB::table('expenses')->whereBetween('datebuy', [$monday, $sunday])->where('userid', Auth::user()->id)->paginate(20);
    $showtotal = DB::table('expenses')->whereBetween('datebuy', [$monday, $sunday])->where('userid', Auth::user()->id)->sum('total');
    $title = "ລາຍຈ່າຍຂອງອາທິດນີ້ ".$monday." - ".$sunday;
    $no = 1;
    return view('mybackend/expweek')->with('title', $title)
                                     ->with('expthisweek', $expthisweek)
                                     ->with('no', $no)->with('showtotal', $showtotal)
                                     ->with('count', count($expthisweek));
  }
}
