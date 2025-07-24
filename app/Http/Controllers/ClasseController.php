<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    // Affiche toutes les classes
    public function index()
    {
        $classes = Classe::all();
        return view('classes.index', compact('classes'));
    }

    // Affiche le formulaire de création
    public function create()
    {
        return view('classes.create');
    }

    // Enregistre une nouvelle classe
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'niveau' => 'required|string|max:100',
        ]);

        Classe::create([
            'nom' => $request->nom,
            'niveau' => $request->niveau,
        ]);

        return redirect()->route('classes.index')->with('success', 'Classe créée avec succès.');
    }

    // Affiche une seule classe (optionnel)
 public function show($id)
{
    $classe = Classe::with(['affectations.enseignant', 'affectations.matiere'])->findOrFail($id);

    return view('classes.show', compact('classe'));
}



    // Formulaire de modification
    public function edit($id)
    {
        $classe = Classe::findOrFail($id);
        return view('classes.edit', compact('classe'));
    }

    // Mise à jour
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'niveau' => 'required|string|max:255',
        ]);

        $classe = Classe::findOrFail($id);
        $classe->nom = $request->nom;
        $classe->niveau = $request->niveau;
        $classe->save();

        return redirect()->route('classes.index')->with('success', 'Classe modifiée avec succès.');
    }

    // Suppression
    public function destroy($id)
    {
        $classe = Classe::findOrFail($id);
        $classe->delete();

        return redirect()->route('classes.index')->with('success', 'Classe supprimée.');
    }
}
