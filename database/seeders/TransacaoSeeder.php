<?php

namespace Database\Seeders;

use App\Models\Transacao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transacao::factory(10)->create();
        // $transaction = Transacao::create([
        //     'data' => '2023-10-01',
        //     'tipo' => 'entrada',
        //     'descricao' => 'Salário',
        //     'valor' => 5000.00,
        //     'categoria' => 'Renda',
        //     'repeticao' => false,
        //     'fixo' => true,
        //     'user_id' => 1,
        // ]);
    }
}
