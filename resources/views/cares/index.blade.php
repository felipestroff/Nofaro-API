@extends('layouts.app')

@section('content')

<a href="/" class="btn btn-link">
    back
</a>
<a href="/cares/create" class="btn btn-primary">
    new care
</a>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">pet</th>
            <th scope="col">description</th>
            <th scope="col">cared at</th>
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
    loadCares();

    function loadCares() {
        fetch('/api/cares')
        .then(function(response) {
            console.log(response);
            return response.json();
        })
        .then(function(data) {
            console.log(data);

            json.innerText = JSON.stringify(data, null, '\t');

            if (data.length) {
                data.forEach(function (care) {
                    console.log(care);

                    let row = document.createElement('tr');
                    row.id = `row_${care.id}`;

                    let id = document.createElement('td');
                    id.innerText = care.id;
                    row.appendChild(id);

                    let pet = document.createElement('td');
                    let petLink = document.createElement('a');
                    petLink.innerText = `${care.pet.name} (${care.pet.id})`;
                    petLink.href = `/pets/${care.pet.id}`;
                    pet.appendChild(petLink);
                    row.appendChild(pet);

                    let description = document.createElement('td');
                    description.innerText = care.description ? care.description : '-';
                    row.appendChild(description);

                    let cared_at = document.createElement('td');
                    cared_at.innerText = care.cared_at;
                    row.appendChild(cared_at);

                    // Actions
                    let actions = document.createElement('td');
                    // View
                    let viewAction = document.createElement('a');
                    viewAction.innerText = 'view';
                    viewAction.href = `/cares/${care.id}`;
                    actions.appendChild(viewAction);
                    // Edit
                    let editAction = document.createElement('a');
                    editAction.innerText = 'edit';
                    editAction.href = `/cares/${care.id}/edit`;
                    editAction.classList.add('p-2');
                    actions.appendChild(editAction);
                    // Delete
                    let delAction = document.createElement('a');
                    delAction.innerText = 'delete';
                    delAction.href = `#`;
                    delAction.classList.add('p-2');
                    delAction.addEventListener('click', function () {
                        deleteCare(care.id);
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

    function deleteCare(id) {
        fetch(`/api/cares/${id}`, {
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
