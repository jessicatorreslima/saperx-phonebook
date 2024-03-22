<!-- resources/views/phonebook.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phonebook</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Phonebook</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="birthdate" class="form-label">Birthdate</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" required>
        </div>
        <div class="mb-3">
            <label for="phones" class="form-label">Phones</label>
            <input type="text" class="form-control" id="phones" name="phones[]" required>
            <button type="button" class="btn btn-secondary mt-2" onclick="addPhoneField()">Add Phone</button>
        </div>

        <button type="submit" class="btn btn-primary">Add Contact</button>
    </form>

    <h3 class="mt-4">Contacts</h3>
    <ul class="list-group">
        @foreach($contacts as $contact)
            <li class="list-group-item">
                {{ $contact->name }} - {{ $contact->email }} - {{ $contact->birthdate }} - {{ $contact->cpf }}
                <ul>
                    @foreach($contact->phones as $phone)
                        <li>{{ $phone->phone_number }}</li>
                    @endforeach
                </ul>
                <div class="mt-2">
                    <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<script>
    function addPhoneField() {
        const phonesDiv = document.getElementById('phones');
        const input = document.createElement('input');
        input.type = 'text';
        input.className = 'form-control mt-2';
        input.name = 'phones[]';
        phonesDiv.parentNode.insertBefore(input, phonesDiv.nextSibling);
    }
</script>

</body>
</html>
