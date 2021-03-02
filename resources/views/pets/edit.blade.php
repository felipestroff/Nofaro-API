@extends('layouts.app')

@section('content')

<form id="form" onsubmit="update(event)">
    @csrf

    <!-- Name -->
    <div class="mb-3">
        <label for="name" class="form-label">name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $pet->name }}" required>
    </div>

    <!-- Specie -->
    <div class="mb-3">
        <label for="specie_id" class="form-label">specie</label>
        <select class="form-control" name="specie_id" id="specie_id" value="${{ $pet->specie->id }}" required>
            @foreach ($species as $specie)
                <option value="{{ $specie->id }}"
                    {{ $pet->specie->id == $specie->id ? 'selected' : '' }}>
                    {{ $specie->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Submit -->
    <div class="mb-3">
        <a href="/pets" class="btn btn-link mb-3">back</a>
        <button type="submit" class="btn btn-primary mb-3">update</button>
    </div>
</form>

<div class="form-floating">
    <textarea class="form-control" placeholder="response" id="json" readonly></textarea>
    <label for="json">response</label>
</div>

<script>
    function update(e) {
        e.preventDefault();

        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(`/api/pets/{{ $pet->id }}`, {
            method: 'PUT',
            body: JSON.stringify({
                'name': document.getElementById('name').value,
                'specie_id': document.getElementById('specie_id').value
            }),
            headers: {
                'Content-Type':'application/json'
            }
        })
        .then(function(response) {
            console.log(response);
            return response.json();
        })
        .then(function(data) {
            console.log(data);
            json.innerText = JSON.stringify(data, null, '\t');
        })
        .catch(function (error) {
            console.error(error);
            json.innerText = error;
        });
    }
</script>

@endsection
