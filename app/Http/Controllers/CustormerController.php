<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Custormer;
use Illuminate\Support\Facades\DB;


class CustormerController extends Controller
{
    public function index()
    {
        $custormers = new Custormer();
        $params = request()->input();

        if (!empty($params['search'])) {
            $custormers = $custormers->search($params);
        }
        if (!empty($params['status'])) {
            $status = $params['status'];
        } else {
            $status = '';
        }
        $custormers = $custormers->orderBy('id', 'desc');
        $custormers = $custormers->paginate(15);

        return view("admin.custormer", ["custormers" => $custormers, 'selected' => $status, 'params' => $params]);
    }

    public function form($id)
    {
        $custormer = new Custormer();
        $custormer = $custormer->find($id);
        if (empty($custormer)) {
            return redirect('/admin/custormer');
        }

        return view("admin.edit", ["custormer" => $custormer]);
    }

    public function update($id, Request $request) {
        $custormer = new Custormer();
        $custormer = $custormer->find($id);
        if (empty($custormer)) {
            return redirect('/admin/custormer');
        }
        $custormer->status = $request->input('status');
        if ($custormer->save()) {
            return redirect('/admin/custormer');
        }
    }
}
