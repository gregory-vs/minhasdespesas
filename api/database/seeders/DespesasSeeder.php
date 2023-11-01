<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Despesas;

class DespesasSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 50; $i++) {
            Despesas::create([
                'descricao' => $faker->sentence,
                'valor' => $faker->randomFloat(2, 0, 10000000),
                'usuario' => $faker->uuid,
                'data' => $faker->date,
            ]);
        }
    }
}
