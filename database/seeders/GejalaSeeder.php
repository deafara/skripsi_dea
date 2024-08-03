<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gejala;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gejala::create([
            'kode_gejala'=>'G01',
            'nama_gejala'=>'Gigi goyang pada anak-anak',
        ]);
        Gejala::create([
            'kode_gejala'=>'G02',
            'nama_gejala'=>'Tumbuh gigi baru pada anak-anak',
        ]);
        Gejala::create([
            'kode_gejala'=>'G03',
            'nama_gejala'=>'Sakit pada perkusi',
        ]);
        Gejala::create([
            'kode_gejala'=>'G04',
            'nama_gejala'=>'Adanya tekanan positif pada gigi',
        ]);
        Gejala::create([
            'kode_gejala'=>'G05',
            'nama_gejala'=>'Karies mencapai pulpa',
        ]);
        Gejala::create([
            'kode_gejala'=>'G06',
            'nama_gejala'=>'Gigi terasa sakit',
        ]);
        Gejala::create([
            'kode_gejala'=>'G07',
            'nama_gejala'=>'Gusi berwarna kemerahan',
        ]);
        Gejala::create([
            'kode_gejala'=>'G08',
            'nama_gejala'=>'Gusi bengkak',
        ]);
        Gejala::create([
            'kode_gejala'=>'G09',
            'nama_gejala'=>'Gigi goyang',
        ]);
        Gejala::create([
            'kode_gejala'=>'G10',
            'nama_gejala'=>'Gusi terasa nyeri',
        ]);
        Gejala::create([
            'kode_gejala'=>'G11',
            'nama_gejala'=>'Karies mencapai dentin',
        ]);
        Gejala::create([
            'kode_gejala'=>'G12',
            'nama_gejala'=>'Gigi terasa linu',
        ]);
        Gejala::create([
            'kode_gejala'=>'G13',
            'nama_gejala'=>'Gigi ujung tumbuh miring',
        ]);
        Gejala::create([
            'kode_gejala'=>'G14',
            'nama_gejala'=>'Gigi terasa nyeri',
        ]);
        Gejala::create([
            'kode_gejala'=>'G15',
            'nama_gejala'=>'Gigi bengkak',
        ]);
        Gejala::create([
            'kode_gejala'=>'G16',
            'nama_gejala'=>'Gigi tumbuh berjejal',
        ]);
        Gejala::create([
            'kode_gejala'=>'G17',
            'nama_gejala'=>'Menyebabkan malrelasi(hubungan antara gigi-gigi pada rahang yang berbeda)',
        ]);
        Gejala::create([
            'kode_gejala'=>'G18',
            'nama_gejala'=>'Ujung akar gigi sulung keluar dari gigi',
        ]);
        Gejala::create([
            'kode_gejala'=>'G19',
            'nama_gejala'=>'Nyeri yang tajam pada saat mengunyah dan menggigit makanan',
        ]);
        Gejala::create([
            'kode_gejala'=>'G20',
            'nama_gejala'=>'Gusi mudah berdarah',
        ]);
        Gejala::create([
            'kode_gejala'=>'G21',
            'nama_gejala'=>'Terdapat kotoran yang berwarna kuning kecoklatan pada gigi(karang gigi)',
        ]);
        Gejala::create([
            'kode_gejala'=>'G22',
            'nama_gejala'=>'Tidak terdapat respon sakit terhadap tes pulpa',
        ]);
        Gejala::create([
            'kode_gejala'=>'G23',
            'nama_gejala'=>'Perubahan warna pada gigi',
        ]);
    }
}
