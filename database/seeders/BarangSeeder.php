<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 20; $i++) {
            $barang = new Barang();
            $barang->nobarcode = rand(10000000, 99999999);
            $barang->nama = $faker->name();
            $barang->harga = $faker->numberBetween(1000, 1000000);
            $barang->stok = $faker->numberBetween(10, 100);
            $barang->save();
        }
    }
}
