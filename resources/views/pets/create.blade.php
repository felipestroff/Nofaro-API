@extends('layouts.app')

@section('content')

<form id="form" onsubmit="create(event)">
    @csrf

    <!-- Name -->
    <div class="mb-3">
        <label for="name" class="form-label">name</label>
        <input type="text" class="form-control" name="name" id="name" required>
    </div>

    <!-- Specie -->
    <div class="mb-3">
        <label for="specie_id" class="form-label">specie</label>
        <select class="form-control" name="specie_id" id="specie_id" required>
            @foreach ($species as $specie)
                <option value="{{ $specie->id }}">
                    {{ $specie->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Submit -->
    <div class="mb-3">
        <a href="/pets" class="btn btn-link mb-3">back</a>
        <button type="submit" class="btn btn-primary mb-3">create</button>
    </div>
</form>

<div class="form-floating">
    <textarea class="form-control" placeholder="response" id="json" readonly></textarea>
    <label for="json">response</label>
</div>

<script>
    function create(e) {
        e.preventDefault();

        fetch('/api/pets', {
            method: 'POST',
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
