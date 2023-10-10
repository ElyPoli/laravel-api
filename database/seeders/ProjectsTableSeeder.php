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
        $tools = ['HTML', 'CSS', 'JavaScript', 'Vue.js', 'PHP', 'MySQL', 'Laravel'];
        
        // Elimino i dati presenti nella tabella
        \App\Models\Project::truncate();

        // Genero dei dati provvisori con il faker
        for ($i = 0; $i < 10; $i++) {
            $project = new Project();

            $project->title = $faker->word();
            $project->description = $faker->text(100);
            $project->thumbnail = $faker->imageUrl(640, 480, 'animals', true);
            $project->tools_used = $faker->randomElements($tools, mt_rand(1, count($tools)));
            $project->repository_link = $faker->url();
            $project->url = $faker->url();
            $project->slug = Str::slug($project["title"]);

            $project->save();
        }
    }
}
