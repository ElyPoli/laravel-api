<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('project_technology', function (Blueprint $table) {
            // Aggiungo la foreign key per la tabella "projects"
            $table->unsignedBigInteger("project_id"); // creo una colonna di tipo unsignedBigInteger
            $table->foreign("project_id") // rendo la colonna appena creata una foreign key
                ->references("id") // si riferisce alla colonna id della tabella projects
                ->on("projects");

            // Aggiungo la foreign key per la tabella "technologies"
            $table->unsignedBigInteger("technology_id"); // creo una colonna di tipo unsignedBigInteger
            $table->foreign("technology_id") // rendo la colonna appena creata una foreign key
                ->references("id") // si riferisce alla colonna id della tabella technologies
                ->on("technologies");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_technology');
    }
};
