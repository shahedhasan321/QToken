<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Client;
use App\Department;

class Token extends Model
{
    protected $fillable = [
        'client_id','dept_id','counter_no','status',
    ];

    public function client(){
        return $this->belongsTo('App\Client');

    }
    public function department(){
        return $this->belongsTo('App\Department','dept_id');

    }
    public function counter(){
        return $this->belongsTo('App\Counter','counter_no');

    }
}
