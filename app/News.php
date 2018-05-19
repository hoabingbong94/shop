<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'name', 'email', 'phone', 'status'
    ];

    public $timestamps = true;

//    public  function scopeSearch($query, $params){
//        //search name
//        if (isset($params['name'])) {
//            $name = $params['name'];
//            $query->where('name', '=', $name)->orwhere('name', 'like', "%$name%");
//        }
//        if ($params['phone']) {
//            $phone = $params['phone'];
//            $query->where('phone', '=', $phone);
//        }
//        if ($params['status']) {
//            $status = strval($params['status']);
//            $query->where('status', '=', $status);
//        }
//        return $query;
//    }
}
