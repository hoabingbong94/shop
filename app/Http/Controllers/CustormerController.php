<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustormerRequest;
use Carbon\Carbon;
use App\Custormer;
use Illuminate\Support\Facades\DB;
use Validator;
use Request;

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

    public function update($id)
    {
        $custormer = new Custormer();
        $custormer = $custormer->find($id);
        if (empty($custormer)) {
            return redirect('/admin/custormer');
        }
        $custormer->status = request()->input('status');
        if ($custormer->save()) {
            return redirect('/admin/custormer');
        }
    }

    public function create(CustormerRequest $request)
    {
         if (Request::ajax()) {
            $name = Request::get('name');
            $phone = Request::get('phone');
            $address = Request::get('address');
            $quantity = Request::get('quantity');
            $data = array(
                'name' => $name,
                'phone' => $phone,
                'name' => $name,
                'address' => $address,
                'quantity' => $quantity,
                'status' => 0,
                'created_at' => date('Y-m-d H:i:s')
            );
            $addCustomer = DB::table('customers')->insert($data);
            if ($addCustomer) {
                return response()->json(['status' => true]);
            }
            return response()->json(['status' => false, 'data' => $request]);
        }

    }
}
