<?php

use Illuminate\Database\Seeder;

class MateriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materi')->insert([
            'id' => '1',
            'mapel' => 'Matematika',
            'kelas' => 'XI RPL 1',
            'judul' => 'Matriks Ordo 2x2',
            'isi' => '
            <h1>Matriks Ordo 2x2 - Heading 1</h1>

            <h2>Heading 2</h2>

            <p>Ini adalah paragraf, anda tahu apa itu paragraf? Ya, silahkan jawab karena saya tidak tahu, jadi tolong jelaskan.&nbsp;Ini adalah paragraf, anda tahu apa itu paragraf? Ya, silahkan jawab karena saya tidak tahu, jadi tolong jelaskan.Ini adalah paragraf, anda tahu apa itu paragraf? Ya, silahkan jawab karena saya tidak tahu, jadi tolong jelaskan.Ini adalah paragraf, anda tahu apa itu paragraf? Ya, silahkan jawab karena saya tidak tahu, jadi tolong jelaskan.</p>

            <h3>Ini Numbering - Heading 3&nbsp;:&nbsp;</h3>

            <ol>
                <li>Ini nomor 1</li>
                <li>Ini nomor 2</li>
                <li>Ini nomor 3</li>
                <li>Dan sayangnya kamu nomor 4 bagi saya.&nbsp;</li>
            </ol>

            
            ',
            'keterangan' => 'Ini adalah Keterangan jadi jangan takut gelap.',
            'kesimpulan' => 'Ini Hanya suatu EasterEgg dari Creator LaraELearn. SO, NO HARD FEELING!',
            'user_id_teacher' => '2',
        ]);
    }
}
