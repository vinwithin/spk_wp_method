<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('tb_alternatif')->insert([
            [
                
                'nama_alternatif' => 'Samsung s-20',
            ],
            [
                
                'nama_alternatif' => 'Samsung j2 Prime',
            ],
            [
                
                'nama_alternatif' => 'Samsung fold',
            ],
            [
                
                'nama_alternatif' => 'Iphone 14 ',
            ],
            [
                
                'nama_alternatif' => 'Iphone 12',
            ],
            [
                
                'nama_alternatif' => 'Oppo F1',
            ],
            [
                
                'nama_alternatif' => 'Oppo a54',
            ],
            [
                
                'nama_alternatif' => 'Infinix Hot 10',
            ],
            [
                
                'nama_alternatif' => 'Advan',
            ],
            [
                
                'nama_alternatif' => 'Vivo V25e',
            ],
            
        ]);

        DB::table('tb_kriteria')->insert([
            [
                
                'nama_kriteria' => 'Harga',
                'atribut' => 'Cost',
                'bobot' => 0.2,
            ],
            [
                
                'nama_kriteria' => 'Performa',
                'atribut' => 'Benefit',
                'bobot' => 0.3,
            ],
            [
               
                'nama_kriteria' => 'Ukuran Layar',
                'atribut' => 'Benefit',
                'bobot' => 0.2,
            ],
            [
                
                'nama_kriteria' => 'Berat',
                'atribut' => 'Cost',
                'bobot' => 0.15,
            ],
            [
                'nama_kriteria' => 'Kapasitas Baterai',
                'atribut' => 'Benefit',
                'bobot' => 0.15,
            ],

           
        ]);
        DB::statement("INSERT INTO tb_nilai (id_alternatif, id_kriteria, nilai) 
        SELECT tb_alternatif.id, tb_kriteria.id,
        CASE 
            WHEN tb_kriteria.id = 1 THEN ROUND(RAND() * (5000 - 1000 + 1) + 1000) -- Rentang untuk kriteria 1: 10 hingga 100
            WHEN tb_kriteria.id = 2 THEN ROUND(RAND() * 5) -- Rentang untuk kriteria 2: 200 hingga 500
            WHEN tb_kriteria.id = 3 THEN ROUND(RAND() * (8.0 - 5.5) + 5.5, 1) -- Rentang untuk kriteria 3: 1000 hingga 3000
            WHEN tb_kriteria.id = 4 THEN ROUND(RAND() * (3.0 - 0.3) + 0.3, 1) -- Rentang untuk kriteria 3: 1000 hingga 3000
            WHEN tb_kriteria.id = 5 THEN ROUND(RAND() * (5400 - 2000 + 1) + 2000) -- Rentang untuk kriteria 3: 1000 hingga 3000
        END 
        FROM tb_alternatif, tb_kriteria");
    }
}
