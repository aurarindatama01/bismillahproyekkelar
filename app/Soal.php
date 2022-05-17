<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    public function dataMateri()
  {
    return $this->belongsTo('App\Materi', 'materi');
  }
  public function user()
  {
    return $this->belongsTo('App\User', 'id_user');
  }
  public function jawab()
  {
    return $this->belongsTo('App\Jawab', 'id_soal');
  }
  public function detailSoal()
  {
    return $this->hasMany('App\Detailsoal', 'id_soal');
  }

  public function detail_soal_essays()
  {
    return $this->hasMany(DetailSoalEssay::class, 'id_soal', 'id');
  }
}
