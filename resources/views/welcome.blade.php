@extends('layouts.app')

@section('content')

<div class="card-group">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Pets</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <a href="/pets">list</a>
            </li>
            <li class="list-group-item">
                <a href="/pets/create">create</a>
            </li>
        </ul>
    </div>

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Cares</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <a href="/cares">list</a>
            </li>
            <li class="list-group-item">
                <a href="/cares/create">create</a>
            </li>
        </ul>
    </div>
</div>

@endsection
