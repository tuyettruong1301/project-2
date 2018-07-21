<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    protected $table = 'danhgia';

    public function users(){
    	$this -> belongsTo('App\User');
    }

    public function tour(){
    	$this -> belongsTo('App\Tour');
    }
}
