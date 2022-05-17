<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Detailsoal extends Model
{
    public function checkJawab()
	{
		return $this->belongsTo('App\Jawab', 'id', 'no_soal_id')->where('id_user', Auth::user()->id);
	}
}
