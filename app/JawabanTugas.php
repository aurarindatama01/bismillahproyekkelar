<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JawabanTugas extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [''];

    /**
     * This is For CRUD
     * Mengkaitkan table materi
     *
     */
    protected $table = 'jawaban_tugas';

    public $timestamps = false;

    public function mapeljawaban(){
        return $this->hasOne(mataPelajaran::class);
    }

    public function exercisejawaban(){
        return $this->hasOne(Exercise::class);
    }
}
