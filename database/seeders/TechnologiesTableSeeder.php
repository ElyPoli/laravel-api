<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologiesTableSeeder extends Seeder
{
    private $rawTools = [
        [
            "name" => "HTML",
        ],
        [
            "name" => "CSS",
        ],
        [
            "name" => "JavaScript",
        ],
        [
            "name" => "Vue.js",
        ],
        [
            "name" => "PHP",
        ],
        [
            "name" => "MySQL",
        ],
        [
            "name" => "Laravel",
        ]
    ];

    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        // Recupero i dati da $rawTools
        foreach ($this->rawTools as $singleTools) {
            $technology = new Technology(); // Creo una nuova istanza di Technology()

            $technology->name = $singleTools["name"];
            $technology->icon = $faker->imageUrl(640, 480, 'animals', true);
            $technology->description = $faker->text(100);

            $technology->save(); // Salvo i dati nella tabella del db
        }
    }
}
