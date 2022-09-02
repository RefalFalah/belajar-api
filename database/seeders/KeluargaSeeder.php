<?php

namespace Database\Seeders;

use App\Models\OrangTua;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orangTua = new OrangTua();
        $orangTua->namaKepalakeluarga = 'Bapa Ucok';
        $orangTua->jumlahAnak = 3;
        $orangTua->save();

        $anak = [
            ["anak_ke" => 1, "nama" => "Ucok", "id_orangTua" => $orangTua->id],
            ["anak_ke" => 2, "nama" => "Ujang", "id_orangTua" => $orangTua->id],
            ["anak_ke" => 3, "nama" => "Udin", "id_orangTua" => $orangTua->id]
        ];

        DB::table('anaks')->insert($anak);
    }
}
