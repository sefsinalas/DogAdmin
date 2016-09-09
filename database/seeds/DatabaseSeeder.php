<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

use App\Models\Home;
use App\Models\Servicios;
use App\Models\Portfolio;
use App\Models\Contacto;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

    	foreach (range(1,10) as $index) {
    		Home::insert([
'titulo_principal' => $faker->word,
'titulo_2' => $faker->sentence(2),
'texto' => $faker->text,
'activo' => $faker->boolean,
'fecha' => $faker->date('Y-m-d'),
'fondo' => $faker->hexcolor,
]);
Servicios::insert([
'titulo' => $faker->sentence(3),
]);
Portfolio::insert([
'titulo_corto' => $faker->word,
'titulo_completo' => $faker->sentence,
'texto' => $faker->sentence,
]);
Contacto::insert([
'email' => $faker->email,
'dirección' => $faker->address,
'localidad' => $faker->city,
'url__facebook' => $faker->domainName,
'url__behance' => $faker->domainName,
'url__vimeo' => $faker->domainName,
'url__pinterest' => $faker->domainName,
'url__linked_in' => $faker->domainName,
]);

        }
    }
}
