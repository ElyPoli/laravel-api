<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    // Specifico in che tipologia convertire i dati di alcune colonne per facilitarne la lettura
    protected $casts = [
        "tools_used" => "array"
    ];

    // Creo un array con indicate le colonne da popolare
    protected $fillable = [
        "title",
        "description",
        "thumbnail",
        "tools_used",
        "repository_link",
        "url",
        "type_id",
        "slug"
    ];
    
    // Creo la relazione: ogni "project" può avere un solo "type"
    public function type() {
        return $this->belongsTo(Type::class);
    }
}
