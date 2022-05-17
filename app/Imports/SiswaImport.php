<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'nisn'=>$row[0],
            'name'=>$row[1],
            'username'=>$row[2],
            'email'=>$row[3],
            'kelas'=>$row[4],
            'tgl_lahir'=>$row[5],
            'tahun_masuk'=>$row[6],
            'password'=>Hash::make($row[7]),
        ]);

        User::roles()->attach(Role::where('name', 'Student')->first());
    }
}
