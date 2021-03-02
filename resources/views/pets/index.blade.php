@extends('layouts.app')

@section('content')

<a href="/" class="btn btn-link">
    back
</a>
<a href="/pets/create" class="btn btn-primary">
    create pet
</a>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">specie</th>
            <th scope="col">cares</th>
            <th></th>
        </tr>
    </thead>
    <tbody id="results"></tbody>
</table>

<div class="form-floating">
    <textarea class="form-control" placeholder="response" id="json" readonly></textarea>
    <label for="json">response</label>
</div>

<script>
    loadPets();

    function loadPets() {
        fetch('/api/pets')
        .then(function(response) {
            console.log(response);
            return response.json();
        })
        .then(function(data) {
            console.log(data);

            json.innerText = JSON.stringify(data, null, '\t');

            if (data.length) {
                data.forEach(function (pet) {
                    console.log(pet);

                    let row = document.createElement('tr');
                    row.id = `row_${pet.id}`;

                    let id = document.createElement('td');
                    id.innerText = pet.id;
                    row.appendChild(id);

                    let name = document.createElement('td');
                    name.innerText = pet.name;
                    row.appendChild(name);

                    let specie = document.createElement('td');
                    specie.innerText = pet.specie.name;
                    row.appendChild(specie);

                    let cares = document.createElement('td');
                    if (pet.cares.length) {
                        pet.cares.forEach(function (care, index) {
                            let item = document.createElement('a');
                            item.innerText = index;
                            item.title = `o pet ${pet.name} (${pet.specie.name}) '${care.description}'`;
                            item.href = `/cares/${care.id}`;
                            item.classList.add('p-2');
                            cares.appendChild(item);
                        });
                    }
                    row.appendChild(cares);

                    // Actions
                    let actions = document.createElement('td');
                    // View
                    let viewAction = document.createElement('a');
                    viewAction.innerText = 'view';
                    viewAction.href = `/pets/${pet.id}`;
                    actions.appendChild(viewAction);
                    // Edit
                    let editAction = document.createElement('a');
                    editAction.innerText = 'edit';
                    editAction.href = `/pets/${pet.id}/edit`;
                    editAction.classList.add('p-2');
                    actions.appendChild(editAction);
                    // Delete
                    let delAction = document.createElement('a');
                    delAction.innerText = 'delete';
                    delAction.href = `#`;
                    delAction.classList.add('p-2');
                    delAction.addEventListener('click', function () {
                        deletePet(pet.id);
                    }, false);
                    actions.appendChild(delAction);

                    row.appendChild(actions);

                    results.appendChild(row);
                });
            }
        })
        .catch(function (error) {
            console.error(error);
            json.innerText = error;
        });
    }

    function deletePet(id) {
        fetch(`/api/pets/${id}`, {
            method: 'DELETE'
        })
        .then(function(response) {
            console.log(response);
            return response.json();
        })
        .then(function(data) {
            console.log(data);
            json.innerText = JSON.stringify(data, null, '\t');

            document.getElementById(`row_${id}`).remove();
        })
        .catch(function (error) {
            console.error(error);
            json.innerText = error;
        });
    }
</script>

@endsection
