<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    // Creo un array con indicate le colonne da popolare
    protected $fillable = [
        "title",
        "description",
        "thumbnail",
        "repository_link",
        "url",
        "type_id",
        "slug"
    ];

    // Creo la relazione: ogni "project" può avere un solo "type"
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    // Creo la relazione: ogni "project" può avere più "technologies"
    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
