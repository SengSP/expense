<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Validator, Auth;

class LoginController extends Controller
{
  // function login
  public function fnLoginSystem(Request $req)
  {
    $this->validate($req, [
      'email' => 'required|email',
      'pass' => 'required|min:8'
    ]);

    $logindata = array(
      'email' => $req->input('email'),
      'password' => $req->input('pass')
    );

    if(Auth::attempt($logindata)){
      // $user = auth()->user();
      // $user->assignRole('Admin');
      // $user->syncPermissions(['Add','Edit','Delete','View','ManageUser']);

      // $title = "ໜ້າກະດານ";
      // ->with('title', $title)
      return redirect('dashboard');
    }else{
      return back()->with('error', 'ອີເມວ ຫຼື ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ ກະລຸນາລອງໃໝ່ອີກຄັ້ງ');
    }
  }

  // logout
  public function fnLogout()
  {
    Auth::logout();
    return redirect('/');
  }

  // report block
  public function fnReportBlock()
  {
    return redirect('/')->with('error', 'ບັນຊີຂອງທ່ານຖືກປິດໃຊ້ງານ ກະລຸນາຕິດຕໍ່ຫາແອັດມິນ');
  }
}
