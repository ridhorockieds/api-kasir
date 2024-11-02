<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 20; $i++) {
            $supplier = new Supplier();
            $supplier->nama = $faker->name();
            $supplier->alamat = $faker->address();
            $supplier->hp = $faker->phoneNumber();
            $supplier->save();
        }
    }
}
