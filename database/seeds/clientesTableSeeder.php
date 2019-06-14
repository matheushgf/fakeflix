<?php

use Illuminate\Database\Seeder;

class clientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker\Factory::create();
			for($i=1;$i<=20;$i++){
			DB::table('clientes')->insert([
				'nome' => $faker->name(),
				'cartao' => $faker->creditCardNumber(),
				'created_at' => Carbon\Carbon::now(),
                'status' => true
			]);
		}
    }
}
