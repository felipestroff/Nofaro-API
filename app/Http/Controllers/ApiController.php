<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Http\Requests\PetRequest;
use App\Models\Care;
use App\Http\Requests\CareRequest;

class ApiController extends Controller
{
    // Pets
    public function showPet($id)
    {
		$pet = Pet::with('specie', 'cares')->find($id);

        if (!$pet) {
            return response()->json([
                'message' => 'Pet not found',
            ], 404);
        }

		return response()->json(
            $pet, 201, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function showAllPets()
    {
		$pets = Pet::with('specie', 'cares')->get();

        if (!count($pets)) {
            return response()->json([
                'message' => 'Pets not found',
            ], 404);
        }

		return response()->json(
            $pets, 201, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function createPet(PetRequest $request)
    {
		$pet = Pet::create($request->all());

        if (!$pet) {
            return response()->json([
                'message' => 'Error when create pet',
            ], 404);
        }

        return response()->json(
            $pet, 201, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function updatePet($id, PetRequest $request)
    {
        $pet = Pet::findOrFail($id);
        $pet->update($request->all());

        if (!$pet) {
            return response()->json([
                'message' => 'Error when update pet',
            ], 404);
        }

        return response()->json(
            $pet, 201, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function deletePet($id)
    {
        Pet::findOrFail($id)->delete();
        Care::where('pet_id', $id)->delete();

        return response()->json(
            'Pet deleted successfully', 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }

    // Cares
    public function showCare($id)
    {
		$care = Care::with('pet')->find($id);

        if (!$care) {
            return response()->json([
                'message' => 'Care not found',
            ], 404);
        }

		return response()->json(
            $care, 201, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function showAllCares()
    {
		$cares = Care::with('pet')->get();

        if (!count($cares)) {
            return response()->json([
                'message' => 'Cares not found',
            ], 404);
        }

		return response()->json(
            $cares, 201, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function createCare(CareRequest $request)
    {
		$care = Care::create([
            'pet_id' => $request['pet_id'],
            'description' => $request['description'],
            'cared_at' => $request['cared_at']
        ]);

        if (!$care) {
            return response()->json([
                'message' => 'Error when create care',
            ], 404);
        }

        return response()->json(
            $care, 201, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function updateCare($id, CareRequest $request)
    {
        $care = Care::findOrFail($id);
        $care->update($request->all());

        if (!$care) {
            return response()->json([
                'message' => 'Error when update care',
            ], 404);
        }

        return response()->json(
            $care, 201, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function deleteCare($id)
    {
        Care::findOrFail($id)->delete();

        return response()->json(
            'Care deleted successfully', 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }
}
