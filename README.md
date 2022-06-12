## How to set up project on a local environment
I used [sail](https://laravel.com/docs/9.x/sail) for my development environment. So you'd need (docker installed)[https://docs.docker.com/get-docker] on your machine to run this app.

This is just the backend (API) of the whole app. The frontend (client) that consumes this API lives in [this repo](http://veekthoven.com).

- Clone repo.
- run `composer install`.
- run `cp .env.example .env`
- run `vendor/bin/sail artisan key:generate`
- run `vendor/bin/sail up -d`. Not that this command will run for quite a while the first time you run it. Don't worry, it's expected.
- run `vendor/bin/sail artisan migrate --seed`.
- The API can be accessed via `http://localhost:82`. If there's an app running on this port already, you might need to change it in `.env` file.

Below are the endpoints this API exposes.

1. `GET /` - This just returns a welcome message. Nothing serious.
2. `GET /subscribers` - This returns all the subscribers.
4. `POST /subscribers/` - This created a new subscriber. Below is a sample data the endpoint expects:
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
3. `GET /subscribers/{id}` - This returns the subscriber with the provided ID
4. `DELETE /subscribers/{id}` - This deleted the subscriber with the provided ID



## API documentation
