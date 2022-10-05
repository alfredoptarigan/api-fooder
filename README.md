# API Spec

## Create User

Request :

-   Method : POST
-   Endpoint : `/auth/register`
-   Body :

```json
{
    "name": "required|string",
    "email": "required|string|email|unique:users",
    "password": "required|string"
}
```

Response :

```json
{
    "result": {
        "code": "numebr",
        "success": "bool",
        "message": "string"
    },
    "data": {
        "id": "string",
        "name": "string",
        "email": "string",
        "created_at": "datetime",
        "updated_at": "datetime"
    }
}
```
## Login User
Request :

-   Method : POST
-   Endpoint : `/auth/login`
-   Body :

```json
{
    "email": "required|string|email|unique:users",
    "password": "required|string"
}
```

Response :

```json
{
    "user": {
        "id": 1,
        "name": "Pedo",
        "email": "Pedo@ymail.com",
        "created_at": "2022-10-03T12:36:45.000000Z",
        "updated_at": "2022-10-03T12:36:45.000000Z"
    },
    "token": ""
}
```
