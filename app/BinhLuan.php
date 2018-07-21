<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    protected $table = 'binhluan';

    public function users(){
		return $this->belongsTo('App\User');
	}

	public function tour(){
    	return $this -> belongsTo('App\Tour');
    }
}
