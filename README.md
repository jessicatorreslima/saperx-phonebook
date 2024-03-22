# Phonebook

A simple phonebook project built with Laravel.

## Features

- CRUD operations for contacts
- CRUD operations for phones related to contacts

## Requirements

- PHP ^8.2
- Laravel ^11.0
- MySQL

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/jessicatorreslima/saperx-phonebook.git
    ```

2. Navigate to the project folder:

    ```bash
    cd saperx-phonebook
    ```

3. Install the composer dependencies:

    ```bash
    composer install
    ```

4. Set up your `.env` file:

    ```bash
    cp .env.example .env
    ```

    - Configure your database settings in the `.env` file

5. Generate an application key:

    ```bash
    php artisan key:generate
    ```

6. Run the migrations:

    ```bash
    php artisan migrate
    ```

## Usage

### Web Routes

- **GET** `/phonebook`: View all contacts
- **POST** `/contacts`: Create a new contact
- **GET** `/contacts/{contact}/edit`: Edit a contact
- **PUT** `/contacts/{contact}`: Update a contact
- **DELETE** `/contacts/{contact}`: Delete a contact

### API Routes

- **GET** `/api/contacts`: List all contacts
- **POST** `/api/contacts`: Create a new contact
- **GET** `/api/contacts/{contact}`: View a specific contact
- **PUT** `/api/contacts/{contact}`: Update a contact
- **DELETE** `/api/contacts/{contact}`: Delete a contact

### Request Payload Example

```json
{
    "name": "John Doe",
    "email": "john.doe@example.com",
    "birthdate": "1990-01-01",
    "cpf": "12345678901",
    "phones": ["+1234567890", "+0987654321"]
}
