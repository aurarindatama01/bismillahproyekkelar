<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jawab extends Model
{
    public function user()
  {
    return $this->belongsTo('App\User', 'id_user');
  }
  public function detailSoal()
  {
    return $this->belongsTo('App\Detailsoal', 'no_soal_id');
  }
}
