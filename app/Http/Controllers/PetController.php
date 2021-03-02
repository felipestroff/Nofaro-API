<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Specie;

class PetController extends Controller
{
    public function index()
    {
        return view('pets.index');
    }

    public function show($id)
    {
        $pet = Pet::findOrFail($id);

        return view('pets.show', compact('pet'));
    }

    public function create()
    {
        $species = Specie::get();

        return view('pets.create', compact('species'));
    }

    public function edit($id)
    {
        $species = Specie::get();

        $pet = Pet::findOrFail($id);
        return view('pets.edit', compact('pet', 'species'));
    }
}
