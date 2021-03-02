@extends('layouts.app')

@section('content')

<a href="/cares" class="btn btn-link">
    back
</a>

<div class="form-floating">
    <textarea class="form-control" placeholder="response" id="json" readonly></textarea>
    <label for="json">response</label>
</div>

<script>
    fetch('/api/cares/{{ $care->id }}')
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
</script>

@endsection
