<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypesTableSeeder extends Seeder
{
    private $rawTypes = [
        [
            "name" => "FullStack",
            "color" => "#009c90",
        ],
        [
            "name" => "Frontend",
            "color" => "#4dada2",
        ],
        [
            "name" => "Backend",
            "color" => "#75bdb4",
        ]
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Recupero i dati da $rawTypes
        foreach ($this->rawTypes as $singleType) {
            $type = new Type(); // Creo una nuova istanza di Type()

            $type->name = $singleType["name"];
            $type->color = $singleType["color"];

            $type->save(); // Salvo i dati nella tabella del db
        }
    }
}
