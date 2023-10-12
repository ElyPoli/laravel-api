<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Technology extends Model
{
    use HasFactory, SoftDeletes;

    // Creo un array con indicate le colonne da popolare
    protected $fillable = [
        "name",
        "icon",
        "description"
    ];

    // Creo la relazione: ogni "technology" può avere più "projects"
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
