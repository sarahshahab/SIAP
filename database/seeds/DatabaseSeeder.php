<?php

use App\Kantor;
// use RoleSeeder;
use App\Counter;
use App\Layanan;
use App\Pelanggan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);

        Pelanggan::create([
            'nomor_pelanggan' => '123456789219',
            'nama_pelanggan' => 'Doni Irawan',
            'alamat' => 'Jalan Imam Bonjol No.430 Pontianak'
        ]);

        Pelanggan::create([
            'nomor_pelanggan' => '1223456789192',
            'nama_pelanggan' => 'Armada',
            'alamat' => 'Jalan Danau Sintarum'
        ]);

        Pelanggan::create([
            'nomor_pelanggan' => '123345678919',
            'nama_pelanggan' => 'Laluna Amanda',
            'alamat' => 'Jalan Sungai Raya Dalam No. 435'
        ]);

        Kantor::create([
            'kantor' => 'Kantor Utama Imam Bonjol',
            'lokasi' => 'Jalan Imam Bonjol No.430, Benua Melayu Laut, Kec. Pontianak Selatan, Benua Melayu Laut, Pontianak, Kota Pontianak, Kalimantan Barat'
        ]);

        Kantor::create([
            'kantor' => 'Kantor Wilayah 28 Oktober',
            'lokasi' => 'Jalan 28 Oktober No.18b, Siantan Hulu, Kec. Pontianak Utara, Kota Pontianak, Kalimantan Barat'
        ]);

        Kantor::create([
            'kantor' => 'Kantor Wilayah Kom Yos Sudarso',
            'lokasi' => 'Jl. Komodor Yos Sudarso No.83, Sungai Jawi Luar, Kec. Pontianak Barat, Kota Pontianak, Kalimantan Barat'
        ]);

        Layanan::create([
            'pelayanan' => 'Customer Service',
        ]);

        Layanan::create([
            'pelayanan' => 'Teller Pembayaran',
        ]);

        Counter::create([
            'id_layanan' => '1',
            'id_kantor'=> '1',
            'nomor_counter' => '1',
            'id' => 'IB CS 1',
        ]);

        Counter::create([
            'id_layanan' => '1',
            'id_kantor'=> '1',
            'nomor_counter' => '2',
            'id' => 'IB CS 2',
        ]);
        
        Counter::create([
            'id_layanan' => '2',
            'id_kantor'=> '1',
            'nomor_counter' => '1',
            'id' => 'IB TP 1',
        ]);

        Counter::create([
            'id_layanan' => '2',
            'id_kantor'=> '1',
            'nomor_counter' => '2',
            'id' => 'IB TP 2',
        ]);

        Counter::create([
            'id_layanan' => '1',
            'id_kantor'=> '2',
            'nomor_counter' => '1',
            'id' => 'OKT CS 1',
        ]);

        Counter::create([
            'id_layanan' => '1',
            'id_kantor'=> '2',
            'nomor_counter' => '2',
            'id' => 'OKT CS 2',
        ]);

        Counter::create([
            'id_layanan' => '2',
            'id_kantor'=> '2',
            'nomor_counter' => '1',
            'id' => 'OKT TP 1',
        ]);

        Counter::create([
            'id_layanan' => '2',
            'id_kantor'=> '2',
            'nomor_counter' => '2',
            'id' => 'OKT TP 2',
        ]);

        Counter::create([
            'id_layanan' => '1',
            'id_kantor'=> '3',
            'nomor_counter' => '1',
            'id' => 'KYS CS 1',
        ]);

        Counter::create([
            'id_layanan' => '1',
            'id_kantor'=> '3',
            'nomor_counter' => '2',
            'id' => 'KYS CS 2',
        ]);

        Counter::create([
            'id_layanan' => '2',
            'id_kantor'=> '3',
            'nomor_counter' => '1',
            'id' => 'KYS TP 1',
        ]);

        Counter::create([
            'id_layanan' => '2',
            'id_kantor'=> '3',
            'nomor_counter' => '2',
            'id' => 'KYS TP 2',
        ]);

    }
}
