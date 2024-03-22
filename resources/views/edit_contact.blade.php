<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Edit Contact</h2>

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $contact->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $contact->email }}" required>
        </div>
        <div class="mb-3">
            <label for="birthdate" class="form-label">Birthdate</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ $contact->birthdate }}" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $contact->cpf }}" required>
        </div>
        <div class="mb-3">
            <label for="phones" class="form-label">Phones</label>
            <div id="phones">
                @foreach($contact->phones as $phone)
                    <input type="text" class="form-control mb-2" name="phones[]" value="{{ $phone->phone_number }}" required>
                @endforeach
            </div>
            <button type="button" class="btn btn-secondary mt-2" onclick="addPhoneField()">Add Phone</button>
        </div>

        <button type="submit" class="btn btn-primary">Update Contact</button>
    </form>
</div>

<script>
    function addPhoneField() {
        const phonesDiv = document.getElementById('phones');
        const input = document.createElement('input');
        input.type = 'text';
        input.className = 'form-control mt-2';
        input.name = 'phones[]';
        phonesDiv.appendChild(input);
    }
</script>

</body>
</html>
