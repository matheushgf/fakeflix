<?php

use Illuminate\Database\Seeder;

class alugueisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filmesIDs = DB::table('filmes')->select('id')->get();
		$clientesIDs = DB::table('clientes')->select('id')->get();
		$faker = Faker\Factory::create();
		for($i=1;$i<=50;$i++){
			DB::table('alugueis')->insert([
				'dataAluguel' => $faker->date($format = 'Y-m-d', $max = 'now'),
				'dataEntrega' => $faker->date($format = 'Y-m-d', $min = 'now'),
				'filmes_id' => $faker->randomELement($filmesIDs)->id,
				'clientes_id' => $faker->randomElement($clientesIDs)->id,
				'created_at' =>Carbon\Carbon::now(),
			]);
		}
    }
}
