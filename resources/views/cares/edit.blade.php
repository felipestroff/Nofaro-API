@extends('layouts.app')

@section('content')

<form id="form" onsubmit="update(event)">
    @csrf

    <!-- Pets -->
    <div class="mb-3">
        <label for="pet_id" class="form-label">pet</label>
        <select class="form-control" name="pet_id" id="pet_id" value="{{ $care->pet_id }}" required>
            @foreach ($pets as $pet)
                <option value="{{ $pet->id }}"
                    {{ $pet->id == $care->pet_id ? 'selected' : '' }}>
                    {{ $pet->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Description -->
    <div class="mb-3">
        <label for="description" class="form-label">description</label>
        <textarea class="form-control" name="description" id="description">{{ $care->description }}</textarea>
    </div>

    <!-- Cared at -->
    <div class="mb-3">
        <label for="cared_at" class="form-label">cared at</label>
        <input type="date" class="form-control" name="cared_at" id="cared_at" value="{{ $care->cared_at }}" required>
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

        fetch(`/api/cares/{{ $care->id }}`, {
            method: 'PUT',
            body: JSON.stringify({
                'pet_id': document.getElementById('pet_id').value,
                'description': document.getElementById('description').value,
                'cared_at': document.getElementById('cared_at').value
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
