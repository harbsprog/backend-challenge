# Observation

-   Ambiente de desenvolvimento linux.
-   Cores são enviadas a API como números pois são FK, mas sua visualização se dá o nome da cor.

# Run

-   `git clone https://github.com/harbsprog/backend-challenge.git backend-challenge`

-   `cd backend-challenge`

-   `cp .env.example .env`

-   `substituir os dados do banco pelos seus`

-   `composer install`

-   `php artisan jwt:secret`

-   `php artisan migrate`

-   `php artisan db:seed`

-   `php -S localhost:8000 -t public`

# End-points

### Auth

| resource                  | description     |
| :------------------------ | :-------------- |
| `/api/auth/login` **GET** | Read auth token |

`/api/auth/login` **GET** - Body

```shell
{
	"email": "qdoyle@davis.biz",
	"password": 123456
}
```

### Colors

| resource                      | description                |
| :---------------------------- | :------------------------- |
| `/api/colors` **GET**         | Read all colors            |
| `/api/colors/{id}` **GET**    | Read selected {id} color   |
| `/api/colors` **POST**        | Create color               |
| `/api/colors/{id}` **PUT**    | Update selected {id} color |
| `/api/colors/{id}` **DELETE** | Delete selected {id} color |

`/api/colors` **POST** and `/api/colors/{id}` **PUT** - Body

```shell
{
	"color": "Cinza",
	"code": "#8A8281"
}
```

### Products

| resource                        | description                  |
| :------------------------------ | :--------------------------- |
| `/api/products` **GET**         | Read all products            |
| `/api/products/{id}` **GET**    | Read selected {id} product   |
| `/api/products` **POST**        | Create product               |
| `/api/products/{id}` **PUT**    | Update selected {id} product |
| `/api/products/{id}` **DELETE** | Delete selected {id} product |

`/api/products` **POST** and `/api/products/{id}` **PUT** - Body

```shell
{
	"product": "iPhone X",
	"description": "Sint amet id occaecat consectetur aliqua occaecat elit deserunt aliqua sit culpa tempor. Qui enim in minim occaecat consectetur exercitation velit",
	"quantity": 210,
	"color": 1,
	"color_variant":[1, 3, 4]
}
```

### Users

| resource                     | description               |
| :--------------------------- | :------------------------ |
| `/api/users` **GET**         | Read all users            |
| `/api/users/{id}` **GET**    | Read selected {id} user   |
| `/api/users` **POST**        | Create user               |
| `/api/users/{id}` **PUT**    | Update selected {id} user |
| `/api/users/{id}` **DELETE** | Delete selected {id} user |

`/api/users` **POST** and `/api/users/{id}` **PUT** - Body

```shell
{
	"email": "user@example.com",
	"password": 123456
}
```
