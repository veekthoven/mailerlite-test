## How to set up project on a local environment
I used [sail](https://laravel.com/docs/9.x/sail) for my development environment. So you'd need [docker installed](https://docs.docker.com/get-docker/) on your machine to run this app.

This is just the backend (API) of the whole app. The frontend (client) that consumes this API is in this repo: [https://github.com/veekthoven/mailerlite-client](https://github.com/veekthoven/mailerlite-client).

- Clone repo.
- run `composer install`.
- run `cp .env.example .env`
- run `vendor/bin/sail artisan key:generate`
- run `vendor/bin/sail up -d`. Not that this command will run for quite a while the first time you run it. Don't worry, it's expected.
- run `vendor/bin/sail artisan migrate --seed`.
- The API can be accessed via [http://localhost:82](http://localhost:82). If there's an app running on this port already, you might need to change it in `.env` file.


## API documentation
Below are the endpoints this API exposes.

#### General
1. `GET /` - This just returns a welcome message. Nothing serious.

#### Subscribers
1. `GET /subscribers` - This returns all the subscribers.
2. `POST /subscribers/` - This creates a new subscriber. Below is a sample data the endpoint expects:
    ```
        {
            "email": "john@doe.com",
            "name": "John Doe",
            "fields": [
                {
                    "key": "phone_number",
                    "value": "07723232323",
                    "type": "number"
                },
                {
                    "key": "company",
                    "value": "Acme Inc.",
                    "type": "string"
                },
                {
                    "key": "approved",
                    "value": true,
                    "type": "boolean"
                },
                {
                    "key": "date_of_birth",
                    "value": "1999-01-31",
                    "type": "date"
                }
            ]
        }
    ```
3. `PUT /subscribers/{id}` - This updates the subscriber with the given ID. Below is a sample data the endpoint expects:
```
    {
        "email": "john@doe.com",
        "name": "John Doe",
        "state": "active",
        "fields": [
            {
                "key": "phone_number",
                "value": "07723232323",
                "type": "number"
            },
            {
                "key": "company",
                "value": "Acme Inc.",
                "type": "string"
            },
            {
                "key": "approved",
                "value": true,
                "type": "boolean"
            },
            {
                "key": "date_of_birth",
                "value": "1999-01-31",
                "type": "date"
            }
        ]
    }
```
4. `GET /subscribers/{id}` - This returns the subscriber with the provided ID
5. `DELETE /subscribers/{id}` - This deleted the subscriber with the provided ID


#### Fields
1. `GET /fields` - This returns all the fields.
2. `POST /fields/` - This creates a new field. Below is a sample data the endpoint expects:
    ```
    {
        "title": "Company",
        "type": "string"
    }
    ```
3. `PUT /fields/{id}` - This updates the field with the given ID. Below is a sample data the endpoint expects:
    ```
    {
        "title": "Company",
        "type": "string"
    }
    ```
4. `GET /fields/{id}` - This returns the field with the provided ID
5. `DELETE /fields/{id}` - This deleted the field with the provided ID

## NOTE
The client for this API is in a seperate repo, you can access it here: [https://github.com/veekthoven/mailerlite-client](https://github.com/veekthoven/mailerlite-client)
