<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustormerRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Custormer;
use Illuminate\Support\Facades\DB;
use Validator;

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

    public function update($id, Request $request)
    {
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

    public function create(CustormerRequest $request)
    {
        $custormer = new Custormer();
        $name = $request->input('name');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $custormer->name = $name;
        $custormer->phone = $phone;
        $custormer->address = $address;
        $custormer->created_at = Carbon::now();
        $custormer->status = (int)0;
        $custormer->status = (int)0;
        dd($custormer);
        if ($custormer->save()) {
            dd('1');
            return redirect('/');
        }

    }
}
