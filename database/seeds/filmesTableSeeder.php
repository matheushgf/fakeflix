<?php

use Illuminate\Database\Seeder;

class filmesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$categorias = array ('Terror', 'Comedia', 'Ação', 'Drama', 'Suspense');
        $faker = Faker\Factory::create();
			for($i=1;$i<=40; $i++){
				DB::table('filmes')->insert([
					'nome' => $faker->text(20),
					'categoria' => $faker->randomElement($categorias),
					'autor' => $faker->name(),
					'diretor' => $faker->name(),
					'preco' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 200),
					'created_at' =>\Carbon\Carbon::now(),
                    'status' => true
				]);
		}
    }
}
