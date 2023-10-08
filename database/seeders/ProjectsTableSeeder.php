<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        // Elimino i dati presenti nella tabella
        Project::truncate();

        // Genero dei dati provvisori con il faker
        for ($i = 0; $i < 10; $i++) {
            $project = new Project();

            $project->title = $faker->word();
            $project->description = $faker->text(100);
            $project->tools_used = $faker->sentences(2);
            $project->repository_link = $faker->url();
            $project->url = $faker->url();
            $project->slug = Str::slug($project["title"]);

            $project->save();
        }
    }
}
