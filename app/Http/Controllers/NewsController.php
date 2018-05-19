<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\News;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Request;

class NewsController extends Controller
{

    public function create(NewsRequest $request)
    {

        $new = new News();
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $new->name = $name;
        $new->phone = $phone;
        $new->email = $email;
        $new->status = (int)0;
        if ($new->save()) {
            return redirect('/');
        }

    }

    public function form()
    {
        if (Request::ajax()) {
            $email = Request::get('email');
            $name = Request::get('name');
            $phone = Request::get('phone');
            $data = array(
                'email' => $email,
                'phone' => $phone,
                'name' => $name,
                'status' => 0,
                'created_at' => date('Y-m-d H:i:s')
            );

            $add = DB::table('news')->insert($data);
            if ($add) {
                return "ok";
            }
            return "err";
        }
    }
}
