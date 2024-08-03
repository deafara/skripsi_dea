<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Penyakit;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Penyakit::create([
            'kode_penyakit' =>"P01",
            'nama_penyakit' =>"Persistensi",
            'deskripsi' =>"Persistensi adalah kondisi dimana gigi sulung (gigi susu) tidak tanggal meskipun gigi permanen sudah tumbuh.",
            'solusi' =>"Pencabutan gigi",
        ]);
        Penyakit::create([
            'kode_penyakit' =>"P02",
            'nama_penyakit' =>"Periodontitis",
            'deskripsi' =>"Periodontitis adalah infeksi serius pada gusi yang merusak jaringan lunak dan tulang penyangga gigi.",
            'solusi' =>"Pembersihan mendalam (scaling dan root planning), penggunaan antibiotic",
        ]);
        Penyakit::create([
            'kode_penyakit' =>"P03",
            'nama_penyakit' =>"Pulpitis",
            'deskripsi' =>"Pulpitis adalah peradangan pada pulpa gigi yang biasanya disebabkan oleh infeksi atau kerusakan gigi.",
            'solusi' =>"Perawatan saluran akar, pencabutan gigi",
        ]);
        Penyakit::create([
            'kode_penyakit' =>"P04",
            'nama_penyakit' =>"Abses",
            'deskripsi' =>"Abses adalah kantung nanah yang terbentuk akibat infeksi bakteri pada gigi atau gusi.",
            'solusi' =>"Penggunaan antibiotic, drainase nanah",
        ]);
        Penyakit::create([
            'kode_penyakit' =>"P05",
            'nama_penyakit' =>"Karies tintin",
            'deskripsi' =>"Karies gigi adalah kerusakan gigi yang terjadi akibat asam yang dihasilkan oleh bakteri pada plak gigi.",
            'solusi' =>"Penambalan gigi, pencabutan gigi",
        ]);
        Penyakit::create([
            'kode_penyakit' =>"P06",
            'nama_penyakit' =>"Impaksi",
            'deskripsi' =>"Impaksi terjadi ketika gigi tidak bisa tumbuh keluar dengan sempurna karena terhalang oleh gigi lain atau tulang rahang.",
            'solusi' =>"Pencabutan gigi, pemberian obat Pereda nyeri dan antibiotik",
        ]);
        Penyakit::create([
            'kode_penyakit' =>"P07",
            'nama_penyakit' =>"Malposisi",
            'deskripsi' =>"Karies gigi adalah kerusakan gigi yang terjadi akibat asam yang dihasilkan oleh bakteri pada plak gigi.",
            'solusi' =>"Penggunaan kawat gigi",
        ]);
        Penyakit::create([
            'kode_penyakit' =>"P08",
            'nama_penyakit' =>"Ulcus decubitus",
            'deskripsi' =>"Ulcus decubitus pada mulut adalah luka atau borok yang disebabkan oleh tekanan atau gesekan, sering kali dari gigi palsu atau kawat gigi yang tidak pas.",
            'solusi' =>"Penggantian gigi palsu atau kawat gigi, pemberian obat nyeri dan antiseptic",
        ]);
        Penyakit::create([
            'kode_penyakit' =>"P09",
            'nama_penyakit' =>"Ginggivitis",
            'deskripsi' =>"Gingivitis adalah peradangan pada gusi yang biasanya disebabkan oleh plak gigi.",
            'solusi' =>"Pembersihan gigi, pemberian obat antiseptik",
        ]);
        Penyakit::create([
            'kode_penyakit' =>"P10",
            'nama_penyakit' =>"Calculus",
            'deskripsi' =>"Calculus gigi adalah plak gigi yang mengeras dan menempel erat pada gigi.",
            'solusi' =>"Pembersihan mendalam (scalling), perawatan gigi",
        ]);
        Penyakit::create([
            'kode_penyakit' =>"P11",
            'nama_penyakit' =>"Nekrose pulpa",
            'deskripsi' =>"Nekrosis pulpa adalah kematian jaringan pulpa gigi akibat infeksi atau cedera.",
            'solusi' =>"Perawatan saluran akar, pencabutan gigi",
        ]);
    }
}
