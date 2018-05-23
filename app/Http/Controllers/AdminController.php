<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController  extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('admin.admin');
    }

    public function setting($id) {
        $user = new User();
        $user = $user->find($id);
       return view('admin.setting', ['user' => $user]);
    }

    public function update($id, Request $request) {
      $user = new User();
      $user = $user->find($id);
      $reverse_date = $request->input('reverse_date');
      $user->reverse_date = !empty($reverse_date) ? $reverse_date . ':00'  : '';
      if($user->save()) {
        return redirect('/admin/custormer');
      }

    }

}
