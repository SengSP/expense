<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Validator, Auth, Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\User;

class UserController extends Controller
{
    // add new user
    public function fnAddUser()
    {
      $sqlselectid = DB::table('users')->orderBy('id', 'desc')->take(1)->get();
      if(count($sqlselectid) > 0){
        foreach ($sqlselectid as $rid) {
          $userid = $rid->id;
        }
        $id = (int)$userid + 1;
      }else{
        $id = 1;
      }
      $title = "ເພີ່ມຜູ້ໃຊ້";

      if(auth()->user()->hasPermissionTo('ManageUser')){
        return view('mybackend/newuser')->with('title', $title)->with('id', $id);
      }else{
        abort(404);
      }
    }

    // function add new user
    public function fnAddnewUser(Request $req)
    {
      $this->validate($req, [
        'fimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8',
        'Add' => 'required',
        'Edit' => 'required',
        'Delete' => 'required',
        'View' => 'required'
      ]);
      if($req->input('status') == ""){
        $status = "block";
      }else{
        $status = "public";
      }
      
      $imgname = time().'.'.$req->file('fimage')->getClientOriginalExtension();
      $checkmail = DB::table('users')->where('email', $req->input('email'))->get();
      if(count($checkmail) < 1){
        $datainsert = array(
          'id' => $req->input('id'),
          'name' => $req->input('name'),
          'email' => $req->input('email'),
          'password' => Hash::make($req->input('password')),
          'status' => $status,
          'remember_token' => Str::random(60),
          'image' => $imgname,
          'created_at' => date('Y-m-d')
        );
        $req->file('fimage')->move(public_path('/images'), $imgname);
        if(auth()->user()->hasPermissionTo('ManageUser')){
          // insert user data
          DB::table('users')->insert($datainsert);
          
          $user = User::find($req->input('id'));
          // insert user role
          if($req->input('roles') == ""){
            $user->assignRole('Client');
            // $insertrole = array('role_id' => '2', 'model_type' => 'App\User', 'model_id' => $req->input('id'));
          }else{
            $user->assignRole('Admin');
            // $insertrole = array('role_id' => $req->input('roles'), 'model_type' => 'App\User', 'model_id' => $req->input('id'));
          }
          
          // insert user permission
          if($req->input('ManageUser') != ""){
            $user->givePermissionTo('ManageUser');
          }
          if($req->input('Add') != ""){
            $user->givePermissionTo('Add');
          }
          if($req->input('Edit') != ""){
            $user->givePermissionTo('Edit');
          }
          if($req->input('Delete') != ""){
            $user->givePermissionTo('Delete');
          }
          if($req->input('View') != ""){
            $user->givePermissionTo('View');
          }

          return redirect('adduser')->with('success', 'ການເພີ່ມຜູ້ໃຊ້ສຳເລັດ');
        }else{
          return back()->with('error', 'ທ່ານບໍ່ມີສິດເພີ່ມຜູ້ໃຊ້ເຂົ້າລະບົບ');
        }
      }else{
        return back()->with('error', 'ອີເມວນີ້ມີໃນລະບົບແລ້ວ');
      }
    }

  ////////////////////////// user list page
  public function fnUserlist(Request $req)
  {
    $title = "ລາຍການຜູ້ໃຊ້";
    $listuser = DB::table('users')->get();
    $i = 1;
    if(auth()->user()->hasPermissionTo('ManageUser')){
      return view('mybackend/userlist')->with('title', $title)->with('listuser', $listuser)->with('i', $i);
    }else{
      abort(404);
    }
  }

  // function change user profile
  public function fnChangeProfile(Request $req)
  {
    $this->validate($req, [
      'fimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
    ]);
    $imgname = time().'.'.$req->file('fimage')->getClientOriginalExtension();
    $checkoldimg = DB::table('users')->where('id', $req->input('imguserid'))->get();
    if(count($checkoldimg) > 0){
      foreach($checkoldimg as $oldimg){
        $img = $oldimg->image;
      }
      $imgpath = public_path('images/'.$img);
      if(File::exists($imgpath)){
        unlink($imgpath);
      }
    }
    $updateimg = array('image' => $imgname);
    if(auth()->user()->hasPermissionTo('ManageUser')){
      DB::table('users')->where('id', $req->input('imguserid'))->update($updateimg);
      $req->file('fimage')->move(public_path('/images'), $imgname);
      return redirect('userlist')->with('success', 'ປ່ຽນຮູບໂປຣໄຟລ໌ສຳເລັດ!');
    }else{
      return back()->with('error', 'ທ່ານບໍ່ມີສິດປ່ຽນຮູບໂປຣໄຟລ໌ໃນໜ້ານີ້');
    }
  }

  // function change user status
  public function fnChangestatus(Request $req)
  {
    $updatestatus = array('status' => $req->input('status'));
    if(auth()->user()->hasPermissionTo('ManageUser')){
      DB::table('users')->where('id', $req->input('stuserid'))->update($updatestatus);
      return redirect('userlist')->with('success', 'ການອັບເດດສະຖານະສຳເລັດ');
    }else{
      return back()->with('error', 'ທ່ານບໍ່ມີສິດອັບເດດສະຖານະຜູ້ໃຊ້!');
    }
  }

  // function change user pass
  public function fnChangepass(Request $req)
  {
    $updatepass = array('password' => Hash::make($req->input('password')));
    if(auth()->user()->hasPermissionTo('ManageUser')){
      DB::table('users')->where('id', $req->input('passuserid'))->update($updatepass);
      return redirect('userlist')->with('success', 'ການປ່ຽນລະຫັດຜ່ານສຳເລັດ');
    }else{
      return back()->with('error', 'ທ່ານບໍ່ມີສິດປ່ຽນລະຫັດຜູ້ໃຊ້!');
    }
  }

  // function select user role and permission
  public function fnSelectrolepms(Request $req)
  {
    $id = $req->id;
    $sqlrole = DB::table('model_has_roles')->where('model_id', $id)->get();
    
    $sqlpms = DB::table('model_has_permissions')->where('model_id', $id)->get();
    
    $roledata['data'] = $sqlrole;
    $pmsdata['data'] = $sqlpms;
    $data = array('role' => $roledata['data'], 'pms' => $pmsdata['data']);
    echo json_encode($data);
  }

  // function update role and permission
  public function fnUpdateRolepms(Request $req)
  {
    $userid = $req->input('rpmsuserid');
    if(auth()->user()->hasPermissionTo('ManageUser')){
      $sqlcheck = DB::table('model_has_permissions')->where('model_id', $userid)->get();
      $user = User::find($userid);
      if(count($sqlcheck) > 0){
        if($req->input('Add') == ""){
          $user->revokePermissionTo('Add');
        }else{
          $user->givePermissionTo('Add');
        }
        if($req->input('Edit') == ""){
          $user->revokePermissionTo('Edit');
        }else{
          $user->givePermissionTo('Edit');
        }
        if($req->input('Delete') == ""){
          $user->revokePermissionTo('Delete');
        }else{
          $user->givePermissionTo('Delete');
        }
        if($req->input('View') == ""){
          $user->revokePermissionTo('View');
        }else{
          $user->givePermissionTo('View');
        }
        if($req->input('ManageUser') == ""){
          $user->revokePermissionTo('ManageUser');
        }else{
          $user->givePermissionTo('ManageUser');
        }
      }else{
        if($req->input('ManagerUser') == ""){
          $user->syncPermissions(['Add','Edit','Delete','View']);
        }else{
          $user->syncPermissions(['Add','Edit','Delete','View','ManageUser']);
        }
      }
      if($req->input('roles') == ""){
        $roleid = 2;
      }else{
        $roleid = $req->input('roles');
      }
      $roleupdate = array('role_id' => $roleid);
      DB::table('model_has_roles')->where('model_id', $userid)->update($roleupdate);
      return redirect('userlist')->with('success', 'ການແກ້ໄຂຂໍ້ມູນສຳເລັດ');
    }else{
      return back()->with('error', 'ທ່ານບໍ່ມີສິດກຳນົດສະຖານະ ແລະ ສິດຂອງຜູ້ໃຊ້!');
    }
  }

  // function delete user
  public function fnDeleteUser(Request $req)
  {
    $userid = $req->input('deluserid');
    if(auth()->user()->hasPermissionTo('ManageUser')){
      $user = User::find($userid);
      
      $imgpath = public_path('images/'.$user->image);
      if(File::exists($imgpath)){
        unlink($imgpath);
      }
      if($user->hasRole('Admin')){
        $user->removeRole('Admin');
      }else{
        $user->removeRole('Client');
      }
      
      if($user->hasPermissionTo('Add')){
        $user->revokePermissionTo('Add');
      }
      if($user->hasPermissionTo('Edit')){
        $user->revokePermissionTo('Edit');
      }
      if($user->hasPermissionTo('Delete')){
        $user->revokePermissionTo('Delete');
      }
      if($user->hasPermissionTo('View')){
        $user->revokePermissionTo('View');
      }
      if($user->hasPermissionTo('ManageUser')){
        $user->revokePermissionTo('ManageUser');
      }
      DB::table('users')->where('id', $userid)->delete();
      return redirect('userlist')->with('success', 'ການລຶບຂໍ້ມູນສຳເລັດ');
    }else{
      return back()->with('error', 'ທ່ານບໍ່ມີສິດກຳນົດສະຖານະ ແລະ ສິດຂອງຜູ້ໃຊ້!');
    }
  }

  // function get user data to show
  public function fnloadUserdata(Request $req)
  {
    $user = User::find($req->userid);
    echo json_encode($user);
  }

  // function update user data
  public function fnUpdateuserdata(Request $req){
    $dataupdate = array(
      'name' => $req->input('name'),
      'email' => $req->input('email')
    );
    if(auth()->user()->hasPermissionTo('ManageUser')){
      DB::table('users')->where('id', $req->input('edituserid'))->update($dataupdate);
      return redirect('userlist')->with('success', 'ການແກ້ໄຂຂໍ້ມູນສຳເລັດ');
    }else{
      return back()->with('error', 'ທ່ານບໍ່ມີສິດກຳນົດສະຖານະ ແລະ ສິດຂອງຜູ້ໃຊ້!');
    }
  }

  // function update account by user
  public function fnUpdateAccount(Request $req)
  {
    $this->validate($req, [
      'fimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
    ]);

    if($req->file('fimage') != ""){
      $imgname = time().'.'.$req->file('fimage')->getClientOriginalExtension();
      $oldpath = public_path('images/'.Auth::user()->image);
      if(File::exists($oldpath)){
        unlink($oldpath);
      }
      $req->file('fimage')->move(public_path('/images'), $imgname);
    }else{
      $imgname = Auth::user()->image;
    }

    $dataupdate = array(
      'name' => $req->input('name'),
      'email' => $req->input('email'),
      'image' => $imgname
    );
    DB::table('users')->where('id', Auth::user()->id)->update($dataupdate);
    return back()->with('success', 'ການແກ້ໄຂຂໍ້ມູນຜູ້ໃຊ້ສຳເລັດ');
  }

  // function change user password by user
  public function fnChangeAcpass(Request $req)
  {
    $passupdate = array('password' => Hash::make($req->input('password')));
    DB::table('users')->where('id', Auth::user()->id)->update($passupdate);
    return back()->with('success', 'ການແກ້ໄຂຂໍ້ມູນຜູ້ໃຊ້ສຳເລັດ');
  }
}
