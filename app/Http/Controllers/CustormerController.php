<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Custormer;
use Illuminate\Support\Facades\DB;


class CustormerController extends Controller
{
    public function index (Request $request) {
    	$custormers = DB::table('custormers')->orderBy('id', 'desc');
        $custormers = $custormers->paginate(15);
    	return view("admin.custormer", ["custormers" => $custormers]);
    }
}
