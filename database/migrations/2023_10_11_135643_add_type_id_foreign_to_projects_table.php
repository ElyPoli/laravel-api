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
        Schema::table('projects', function (Blueprint $table) {
            // Creo una colonna di tipo unsignedBigInteger
            $table->unsignedBigInteger("type_id")->nullable()->after('url');

            // Rendo la colonna appena creata una foreign key
            $table->foreign("type_id")
                ->references("id") // si riferisce alla colonna id della tabella projects
                ->on("types")
                ->onDelete("set null"); // se la categoria viene cancellata, il progetto resta e la sua tipologia viene messa a null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Rimuovo la foreign key
            $table->dropForeign('projects_type_id_foreign');

            // Rimuovo la colonna type_id
            $table->dropColumn('type_id');
        });
    }
};
