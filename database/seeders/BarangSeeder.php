<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Barang::factory()->count(3)->sequence(
            ['nama' => 'Apel'],
            ['nama' => 'Kelengkeng'],
            ['nama' => 'Durian'],
        )->create();
    }
}
