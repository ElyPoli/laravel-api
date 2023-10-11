<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use HasFactory, SoftDeletes;

    // Creo un array con indicate le colonne da popolare
    protected $fillable = [
        "name",
        "color"
    ];

    // Creo la relazione: ogni "type" può essere assegnato a più "projects"
    public function projects() {
        return $this->hasMany(Project::class);
    }
}