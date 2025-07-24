<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'coefficient', 'classe_id', 'enseignant_id'];

    // Relation classique : une matière appartient à une classe
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    // Relation classique : une matière appartient à un enseignant
    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class);
    }

    // Relation : une matière a plusieurs notes
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    // Relation many-to-many avec enseignants via la table pivot 'classe_enseignant_matiere'
    public function enseignants()
    {
        return $this->belongsToMany(Enseignant::class, 'affectations')
                    ->withPivot('classe_id')
                    ->withTimestamps();
    }
    public function affectations()
    {
        return $this->hasMany(Affectation::class);
    }
}
// 🔍 Modèle Matiere : représente une matière dans le système (nom, coefficient, etc.)
