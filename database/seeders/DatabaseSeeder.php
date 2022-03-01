<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Post::create([
            'title' => 'Pelayanan Pasangan Baru',
            'slug' => '#pelayanan-pasangan-baru',
            'body' => 'Prosedur Pemasangan Baru antara lain:

            Calon pelanggan ke PERUMDA Air Minum Tirta Khatulistiwa dengan membawa syarat pendaftaran seperti fotokopi KTP Pemohon, Surat Keterangan RT setempat, mengisi permohonan sambungan baru dan sket lokasi calon pelanggan.
            Berkas persyaratan diserahkan ke Petugas (Loket 1).
            Petugas memeriksa berkas persyaratan calon pelanggan, jika belum lengkap berkas dikembalikan dan calon pelanggan diminta untuk melengkapinya, jika sudah lengkap petugas memberikan formulir permintaan berlangganan kepada calon pelanggan.
            Petugas PDAM meninjau lokasi/ persil calon pelanggan, jika hasil survey menunjukan adanya permasalahan ( Eks pelanggan, jaringan pipa tidak tersedia) sehingga pemasangan sambungan baru ke lokasi / persil calon pelanggan tidak bisa dilayani maka PDAM akan memberikan surat pemberitahuan kepada calon pelanggan melalui telepon atau HP calon pelanggan.
            Jika Hasil Survey tidak ada permasalahan maka petugas membuat penetapan biaya pemasangan sambungan baru.
            Calon pelanggan membayar biaya pasang baru ke kantor PERUMDA Air Minum Tirta Khatulistiwa di Jl. Imam Bonjol No. 430 melalui loket ( Bank BTN)
            Petugas Membuat SPK dan menyerahkan ke Instalatir PERUMDA Air Minum Tirta Khatulistiwa.
            Instalatir PERUMDA Air Minum Tirta Khatulistiwa kelokasi Calon Pelanggan untuk pemasangan sambungan baru.
            Waktu proses pendaftaran sampai dengan penetapan biaya pemasangan 7(tujuh) hari kerja dan pembayaran sampai pemasangan 7(tujuh) hari kerja.
            
            
            Daftar Biaya Izin Sambungan Baru dengan water meter diameter 1/2 inc
            
            Golongan Sosial sebesar Rp. 1.000.000,-
            Golongan Rumah Sederhana sebesar Rp. 1.000.000,-
            Golongan Rumah Semi Permananen / Permanen sebesar Rp. 1.500.000,-
            Golongan Rumah Permanen Mandiri / Kantor Pemerintah / Swasta sebesar Rp. 2.500.000,-
            Golongan Niaga sebesar Rp. 3.000.000,-
            Golongan Industri sebesar Rp. 3.500.000,-
            Untuk biaya pemasangan sambungan baru air minum dengan water meter diameter 3/4 inc keatas, akan dihitung untuk semua golongan dan akan diperhitungkan oleh PDAM sesuai dengan bahan dan peralatan yang digunakan berdasarkan hasil perhitungan survey lapangan'
        ]);

        Post::create([
            'title' => 'Pelayanan Pengaduan',
            'slug' => '#pelayanan-pengaduan',
            'body' => 'Layanan Pengaduan merupakan salah satu layanan yang dapat digunakan pelanggan atau masyarakat yang ingin melaporkan pengaduan terhadap saluran air.'
        ]);

        Post::create([
            'title' => 'Pelayanan Pembayaran Tagihan',
            'slug' => '#pelayanan-pembayaran-Tagihan',
            'body' => 'Prosedur Pemasangan Baru antara lain:'
        ]);
    }
}
