<?php

namespace App\Http\Controllers;

use App\Models\Care;
use App\Models\Pet;

class CareController extends Controller
{
    public function index()
    {
        return view('cares.index');
    }

    public function show($id)
    {
        $care = Care::findOrFail($id);

        return view('cares.show', compact('care'));
    }

    public function create()
    {
        $pets = Pet::get();

        return view('cares.create', compact('pets'));
    }

    public function edit($id)
    {
        $pets = Pet::get();

        $care = Care::findOrFail($id);
        return view('cares.edit', compact('care', 'pets'));
    }
}
