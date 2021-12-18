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
    protected $fillable = [
        'id_mapel', 'id_tugas', 'isi', 'file', 'user_id_student',
    ];

    /**
     * This is For CRUD
     * Mengkaitkan table materi
     *
     */
    protected $table = 'jawaban_tugas';

    public function mapeljawaban(){
        return $this->belongsTo('App\mataPelajaran');
    }

    public function exercisejawaban(){
        return $this->belongsTo('App\Exercise');
    }
}
