<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\News;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Request;

class NewsController extends Controller
{
    public function index() {
        $news = new News();
        $params = request()->input();

        if (!empty($params['search'])) {
            $news = $news->search($params);
        }
        if (!empty($params['status'])) {
            $status = $params['status'];
        } else {
            $status = '';
        }

        $news = $news->orderBy('id', 'desc');
        $news = $news->paginate(15);
        return view("admin.new", ["news" => $news, 'selected' => $status, 'params' => $params]);
    }

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

    public function form(NewsRequest $request)
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
                return response()->json(['status' => true]);
            }
            return response()->json(['status' => false, 'data' => $request]);
        }
    }

    public function edit($id) {
        $new = new News();
        $new = $new->find($id);
        if (empty($new)) {
            return redirect('/admin/new');
        }

        return view("admin.news.edit", ["new" => $new]);
    }

    public function update($id)
    {
        $new = new News();
        $new = $new->find($id);
        if (empty($new)) {
            return redirect('/admin/news');
        }
        $new->status = request()->input('status');
        if ($new->save()) {
            return redirect('/admin/news');
        }
    }
}
