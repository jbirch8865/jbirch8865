---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://project.dsfellowship.com/docs/collection.json)

<!-- END_INFO -->

#Authentication

Requesting an End User Access Token for authenticating future requests
<!-- START_2cb38f1f812a602469c22d7858e3f5a2 -->
## {POST} signin/{company}/v1/api

Returns a unique access_token used to authenticate in place of the username and password
The access_token experation date is based on the company_config session_timeout which is comany specific

> Example request:

```bash
curl -X POST \
    "https://project.dsfellowship.com/api/v1/1/signin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "secret-token: moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0" \
    -d '{"user":"default","password":"ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/signin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "secret-token": "moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0",
};

let body = {
    "user": "default",
    "password": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (201):

```json
{
    "Program_Session": {
        "id": "3",
        "client_id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
        "access_token": ".8GYC=nkc7DPfY4c9tGFOtke7MTuKJY$ya$hmfjkDN4zi",
        "user_id": "1",
        "experation_timestamp": "2020-04-20 06:57:31"
    }
}
```

### HTTP Request
`POST api/v1/{company}/signin`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `company` |  required  | {integer} The ID of the organization
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `user` | string |  required  | {string}
        `password` | string |  required  | {string}
    
<!-- END_2cb38f1f812a602469c22d7858e3f5a2 -->

<!-- START_1aee1acf38a8f7575d1a2b9eddc7a109 -->
## {DELETE} {user}/signin/{company}/v1/api

> Example request:

```bash
curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/1/signin/default?active_status=" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "secret-token: moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/signin/default"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "secret-token": "moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (201):

```json
{
    "message": "Session revoked",
    "Program_Session": {
        "id": "3",
        "client_id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
        "access_token": "JTvOBaSx+YgSNHVbboT3djk+3Ab7f4+=+MLKkKUU5v$0j",
        "user_id": "1",
        "experation_timestamp": "2020-04-20 06:47:32"
    }
}
```

### HTTP Request
`DELETE api/v1/{company}/signin/{signin}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `company` |  required  | {integer} The ID of the organization
    `signin` |  required  | {string}
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `active_status` |  required  | {bool} When true object will be marked inactive.  When false the object will be deleted.

<!-- END_1aee1acf38a8f7575d1a2b9eddc7a109 -->

#Company

Basic CRUD operations for Companies, Company Configs and Users
<!-- START_98c7cd9e1616fc65c12af185be991ff8 -->
## {GET} users/{company}/v1/api
Return a list of users belonging to the company

> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/1/users?active_status=&include_details=2&details_offset=0&details_limit=5&limit=10&offset=0" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "User-Access-Token: cIiYna?cvvH1O=$AsJlLlJCSfuW7YiEUjGozHnjjUXB+E"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/users"
);

let params = {
    "active_status": "",
    "include_details": "2",
    "details_offset": "0",
    "details_limit": "5",
    "limit": "10",
    "offset": "0",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "User-Access-Token": "cIiYna?cvvH1O=$AsJlLlJCSfuW7YiEUjGozHnjjUXB+E",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": {
        "Users": {
            "default": {
                "id": "1",
                "username": "default",
                "company_id": "1",
                "project_name": "project2",
                "active_status": "1",
                "Companies": {
                    "id": "1",
                    "company_name": "System",
                    "active_status": "1",
                    "Company_Configs": [
                        {
                            "id": "2",
                            "company_id": "1",
                            "config_id": "1",
                            "config_value": "UTC",
                            "active_status": "1"
                        }
                    ],
                    "Company_Roles": [
                        {
                            "id": "99",
                            "company_id": "1",
                            "role_name": "5e9b84865c81e",
                            "active_status": "1"
                        }
                    ]
                }
            }
        }
    }
}
```

### HTTP Request
`GET api/v1/{company}/users`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `company` |  required  | {integer} The ID of the organization
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `active_status` |  optional  | {bool} Include inactive objects
    `include_details` |  optional  | {int} Include the entire object model of the object.  If set the integer determines how many levels deep you want to return for related objects.
    `details_offset` |  optional  | {int} If include_details is false this is ignored.  For related objects which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.
    `details_limit` |  optional  | {int} If include_details is false this is ignored.  For related objects how many do you want to return. Must be a number between 1 and 25.
    `limit` |  optional  | {int} How many objects do you want to return. Must be a number between 1 and 100.
    `offset` |  optional  | {int} Which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.

<!-- END_98c7cd9e1616fc65c12af185be991ff8 -->

<!-- START_37cc2f7db7536431917bf10b848bd8e4 -->
## {POST} users/{company}/v1/api

Create a user

> Example request:

```bash
curl -X POST \
    "https://project.dsfellowship.com/api/v1/1/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "User-Access-Token: psSmUoqMu3THwHUW6mWEfLY=x0V$i0e1wVMb4dG9zmiax" \
    -d '{"user":"new_user","password":"ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "User-Access-Token": "psSmUoqMu3THwHUW6mWEfLY=x0V$i0e1wVMb4dG9zmiax",
};

let body = {
    "user": "new_user",
    "password": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (201):

```json
{
    "message": "User successfully created or already exists with that password",
    "user": {
        "username": "new_user",
        "project_name": "project2"
    }
}
```

### HTTP Request
`POST api/v1/{company}/users`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `company` |  required  | {integer} The ID of the organization
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `user` | string |  required  | {string}
        `password` | string |  required  | {string}
    
<!-- END_37cc2f7db7536431917bf10b848bd8e4 -->

<!-- START_0b2e8585c58a2fdc22e4236c22e7da46 -->
## {PUT} {user}/users/{company}/v1/api
Currently this endpoint is only able to change a password and re-enable a disabled user
Please note that the User-Access-Token does not have to be the access token for the username
you are changing the password for.  It just needs to be a user that has rights to this endpoint.

Currently there is no way for the User to change their own password if they don't have rights
to this endpoint.  So you would need to first authenticate with a user who does have rights to change
the password.  This could be accomplished by first enabling the default user, authenticating and updating
the password.  Then remember to disable the default user.

> Example request:

```bash
curl -X PUT \
    "https://project.dsfellowship.com/api/v1/1/users/new_user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "User-Access-Token: JTvOBaSx+YgSNHVbboT3djk+3Ab7f4+=+MLKkKUU5v$0j" \
    -d '{"new_password":"ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb","active_status":true}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/users/new_user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "User-Access-Token": "JTvOBaSx+YgSNHVbboT3djk+3Ab7f4+=+MLKkKUU5v$0j",
};

let body = {
    "new_password": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "active_status": true
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (422):

```json
{
    "message": "The given data was invalid.",
    "errors": {
        "company_roles": [
            "The company roles field is required."
        ]
    }
}
```

### HTTP Request
`PUT api/v1/{company}/users/{user}`

`PATCH api/v1/{company}/users/{user}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `company` |  required  | {integer} The ID of the organization
    `user` |  required  | {string} username to change password
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `new_password` | string |  optional  | {string}
        `active_status` | bool |  optional  | {string}
    
<!-- END_0b2e8585c58a2fdc22e4236c22e7da46 -->

<!-- START_ff18a82b48db2f4db7ea36392e0da63c -->
## {DELETE} {user}/users/{company}/v1/api

> Example request:

```bash
curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/1/users/new_user?active_status=" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "User-Access-Token: 0ReQN?xkJQX.at9TmiFVlN6+kPN?5EZ5FCFZ4NXnj=QMx"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/users/new_user"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "User-Access-Token": "0ReQN?xkJQX.at9TmiFVlN6+kPN?5EZ5FCFZ4NXnj=QMx",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (201):

```json
{
    "message": "User Successfully Deleted",
    "user": {
        "id": "259",
        "username": "new_user",
        "company_id": "1",
        "project_name": "project2",
        "active_status": "1"
    }
}
```

### HTTP Request
`DELETE api/v1/{company}/users/{user}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `company` |  required  | {integer} The ID of the organization
    `user` |  required  | {string} username to delete
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `active_status` |  required  | {bool} When true object will be marked inactive.  When false the object will be deleted.

<!-- END_ff18a82b48db2f4db7ea36392e0da63c -->

<!-- START_110cfd4e77fbf74bd678ea1fbf46b800 -->
## {GET} roles/{company}/v1/api

> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/1/roles?active_status=&include_details=2&details_offset=0&details_limit=5&limit=10&offset=0" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "User-Access-Token: EkszSIKLpRekHIHGYhOqKLiBLyXCy6z8tH8lh7rZ9ndyG"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/roles"
);

let params = {
    "active_status": "",
    "include_details": "2",
    "details_offset": "0",
    "details_limit": "5",
    "limit": "10",
    "offset": "0",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "User-Access-Token": "EkszSIKLpRekHIHGYhOqKLiBLyXCy6z8tH8lh7rZ9ndyG",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "Response Objects",
    "Company_Role": {
        "5e9b84865c81e": {
            "id": "99",
            "company_id": "1",
            "role_name": "5e9b84865c81e",
            "active_status": "1",
            "Companies": {
                "id": "1",
                "company_name": "System",
                "active_status": "1",
                "Company_Configs": [
                    {
                        "id": "2",
                        "company_id": "1",
                        "config_id": "1",
                        "config_value": "UTC",
                        "active_status": "1"
                    }
                ],
                "Company_Roles": [
                    {
                        "id": "99",
                        "company_id": "1",
                        "role_name": "5e9b84865c81e",
                        "active_status": "1"
                    }
                ]
            },
            "Routes_Have_Roles": [
                {
                    "id": "385",
                    "route_id": "12",
                    "role_id": "99",
                    "right_id": "390",
                    "Routes": {
                        "id": "12",
                        "name": "Create_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "99",
                        "company_id": "1",
                        "role_name": "5e9b84865c81e",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "390",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "386",
                    "route_id": "3",
                    "role_id": "99",
                    "right_id": "391",
                    "Routes": {
                        "id": "3",
                        "name": "Create_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "99",
                        "company_id": "1",
                        "role_name": "5e9b84865c81e",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "391",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "387",
                    "route_id": "10",
                    "role_id": "99",
                    "right_id": "392",
                    "Routes": {
                        "id": "10",
                        "name": "Delete_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "99",
                        "company_id": "1",
                        "role_name": "5e9b84865c81e",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "392",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "388",
                    "route_id": "6",
                    "role_id": "99",
                    "right_id": "393",
                    "Routes": {
                        "id": "6",
                        "name": "List_Roles",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "99",
                        "company_id": "1",
                        "role_name": "5e9b84865c81e",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "393",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "389",
                    "route_id": "2",
                    "role_id": "99",
                    "right_id": "394",
                    "Routes": {
                        "id": "2",
                        "name": "List_Users",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "99",
                        "company_id": "1",
                        "role_name": "5e9b84865c81e",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "394",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                }
            ]
        },
        "5e9b87ae6d1c8": {
            "id": "101",
            "company_id": "1",
            "role_name": "5e9b87ae6d1c8",
            "active_status": "1",
            "Companies": {
                "id": "1",
                "company_name": "System",
                "active_status": "1",
                "Company_Configs": [
                    {
                        "id": "2",
                        "company_id": "1",
                        "config_id": "1",
                        "config_value": "UTC",
                        "active_status": "1"
                    }
                ],
                "Company_Roles": [
                    {
                        "id": "99",
                        "company_id": "1",
                        "role_name": "5e9b84865c81e",
                        "active_status": "1"
                    }
                ]
            },
            "Routes_Have_Roles": [
                {
                    "id": "397",
                    "route_id": "12",
                    "role_id": "101",
                    "right_id": "402",
                    "Routes": {
                        "id": "12",
                        "name": "Create_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "101",
                        "company_id": "1",
                        "role_name": "5e9b87ae6d1c8",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "402",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "398",
                    "route_id": "3",
                    "role_id": "101",
                    "right_id": "403",
                    "Routes": {
                        "id": "3",
                        "name": "Create_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "101",
                        "company_id": "1",
                        "role_name": "5e9b87ae6d1c8",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "403",
                        "get": "1",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "399",
                    "route_id": "10",
                    "role_id": "101",
                    "right_id": "404",
                    "Routes": {
                        "id": "10",
                        "name": "Delete_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "101",
                        "company_id": "1",
                        "role_name": "5e9b87ae6d1c8",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "404",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "400",
                    "route_id": "6",
                    "role_id": "101",
                    "right_id": "405",
                    "Routes": {
                        "id": "6",
                        "name": "List_Roles",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "101",
                        "company_id": "1",
                        "role_name": "5e9b87ae6d1c8",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "405",
                        "get": "0",
                        "destroy": "0",
                        "post": "1",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "401",
                    "route_id": "2",
                    "role_id": "101",
                    "right_id": "406",
                    "Routes": {
                        "id": "2",
                        "name": "List_Users",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "101",
                        "company_id": "1",
                        "role_name": "5e9b87ae6d1c8",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "406",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                }
            ]
        },
        "5e9b87eb3d3e5": {
            "id": "103",
            "company_id": "1",
            "role_name": "5e9b87eb3d3e5",
            "active_status": "1",
            "Companies": {
                "id": "1",
                "company_name": "System",
                "active_status": "1",
                "Company_Configs": [
                    {
                        "id": "2",
                        "company_id": "1",
                        "config_id": "1",
                        "config_value": "UTC",
                        "active_status": "1"
                    }
                ],
                "Company_Roles": [
                    {
                        "id": "99",
                        "company_id": "1",
                        "role_name": "5e9b84865c81e",
                        "active_status": "1"
                    }
                ]
            },
            "Routes_Have_Roles": [
                {
                    "id": "409",
                    "route_id": "12",
                    "role_id": "103",
                    "right_id": "414",
                    "Routes": {
                        "id": "12",
                        "name": "Create_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "103",
                        "company_id": "1",
                        "role_name": "5e9b87eb3d3e5",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "414",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "410",
                    "route_id": "3",
                    "role_id": "103",
                    "right_id": "415",
                    "Routes": {
                        "id": "3",
                        "name": "Create_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "103",
                        "company_id": "1",
                        "role_name": "5e9b87eb3d3e5",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "415",
                        "get": "1",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "411",
                    "route_id": "10",
                    "role_id": "103",
                    "right_id": "416",
                    "Routes": {
                        "id": "10",
                        "name": "Delete_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "103",
                        "company_id": "1",
                        "role_name": "5e9b87eb3d3e5",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "416",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "412",
                    "route_id": "6",
                    "role_id": "103",
                    "right_id": "417",
                    "Routes": {
                        "id": "6",
                        "name": "List_Roles",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "103",
                        "company_id": "1",
                        "role_name": "5e9b87eb3d3e5",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "417",
                        "get": "0",
                        "destroy": "0",
                        "post": "1",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "413",
                    "route_id": "2",
                    "role_id": "103",
                    "right_id": "418",
                    "Routes": {
                        "id": "2",
                        "name": "List_Users",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "103",
                        "company_id": "1",
                        "role_name": "5e9b87eb3d3e5",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "418",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                }
            ]
        },
        "5e9b88f3acf10": {
            "id": "105",
            "company_id": "1",
            "role_name": "5e9b88f3acf10",
            "active_status": "1",
            "Companies": {
                "id": "1",
                "company_name": "System",
                "active_status": "1",
                "Company_Configs": [
                    {
                        "id": "2",
                        "company_id": "1",
                        "config_id": "1",
                        "config_value": "UTC",
                        "active_status": "1"
                    }
                ],
                "Company_Roles": [
                    {
                        "id": "99",
                        "company_id": "1",
                        "role_name": "5e9b84865c81e",
                        "active_status": "1"
                    }
                ]
            },
            "Routes_Have_Roles": [
                {
                    "id": "421",
                    "route_id": "12",
                    "role_id": "105",
                    "right_id": "426",
                    "Routes": {
                        "id": "12",
                        "name": "Create_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "105",
                        "company_id": "1",
                        "role_name": "5e9b88f3acf10",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "426",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "422",
                    "route_id": "3",
                    "role_id": "105",
                    "right_id": "427",
                    "Routes": {
                        "id": "3",
                        "name": "Create_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "105",
                        "company_id": "1",
                        "role_name": "5e9b88f3acf10",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "427",
                        "get": "1",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "423",
                    "route_id": "10",
                    "role_id": "105",
                    "right_id": "428",
                    "Routes": {
                        "id": "10",
                        "name": "Delete_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "105",
                        "company_id": "1",
                        "role_name": "5e9b88f3acf10",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "428",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "424",
                    "route_id": "6",
                    "role_id": "105",
                    "right_id": "429",
                    "Routes": {
                        "id": "6",
                        "name": "List_Roles",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "105",
                        "company_id": "1",
                        "role_name": "5e9b88f3acf10",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "429",
                        "get": "0",
                        "destroy": "0",
                        "post": "1",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "425",
                    "route_id": "2",
                    "role_id": "105",
                    "right_id": "430",
                    "Routes": {
                        "id": "2",
                        "name": "List_Users",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "105",
                        "company_id": "1",
                        "role_name": "5e9b88f3acf10",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "430",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                }
            ]
        },
        "5e9b9cae49dca": {
            "id": "114",
            "company_id": "1",
            "role_name": "5e9b9cae49dca",
            "active_status": "1",
            "Companies": {
                "id": "1",
                "company_name": "System",
                "active_status": "1",
                "Company_Configs": [
                    {
                        "id": "2",
                        "company_id": "1",
                        "config_id": "1",
                        "config_value": "UTC",
                        "active_status": "1"
                    }
                ],
                "Company_Roles": [
                    {
                        "id": "99",
                        "company_id": "1",
                        "role_name": "5e9b84865c81e",
                        "active_status": "1"
                    }
                ]
            },
            "Routes_Have_Roles": [
                {
                    "id": "494",
                    "route_id": "12",
                    "role_id": "114",
                    "right_id": "499",
                    "Routes": {
                        "id": "12",
                        "name": "Create_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "114",
                        "company_id": "1",
                        "role_name": "5e9b9cae49dca",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "499",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "495",
                    "route_id": "3",
                    "role_id": "114",
                    "right_id": "500",
                    "Routes": {
                        "id": "3",
                        "name": "Create_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "114",
                        "company_id": "1",
                        "role_name": "5e9b9cae49dca",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "500",
                        "get": "1",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "496",
                    "route_id": "13",
                    "role_id": "114",
                    "right_id": "501",
                    "Routes": {
                        "id": "13",
                        "name": "Delete_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "114",
                        "company_id": "1",
                        "role_name": "5e9b9cae49dca",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "501",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "497",
                    "route_id": "10",
                    "role_id": "114",
                    "right_id": "502",
                    "Routes": {
                        "id": "10",
                        "name": "Delete_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "114",
                        "company_id": "1",
                        "role_name": "5e9b9cae49dca",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "502",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "498",
                    "route_id": "6",
                    "role_id": "114",
                    "right_id": "503",
                    "Routes": {
                        "id": "6",
                        "name": "List_Roles",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "114",
                        "company_id": "1",
                        "role_name": "5e9b9cae49dca",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "503",
                        "get": "0",
                        "destroy": "0",
                        "post": "1",
                        "patch": "0",
                        "put": "0"
                    }
                }
            ]
        },
        "5e9b9e46971e7": {
            "id": "116",
            "company_id": "1",
            "role_name": "5e9b9e46971e7",
            "active_status": "1",
            "Companies": {
                "id": "1",
                "company_name": "System",
                "active_status": "1",
                "Company_Configs": [
                    {
                        "id": "2",
                        "company_id": "1",
                        "config_id": "1",
                        "config_value": "UTC",
                        "active_status": "1"
                    }
                ],
                "Company_Roles": [
                    {
                        "id": "99",
                        "company_id": "1",
                        "role_name": "5e9b84865c81e",
                        "active_status": "1"
                    }
                ]
            },
            "Routes_Have_Roles": [
                {
                    "id": "508",
                    "route_id": "12",
                    "role_id": "116",
                    "right_id": "513",
                    "Routes": {
                        "id": "12",
                        "name": "Create_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "116",
                        "company_id": "1",
                        "role_name": "5e9b9e46971e7",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "513",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "509",
                    "route_id": "3",
                    "role_id": "116",
                    "right_id": "514",
                    "Routes": {
                        "id": "3",
                        "name": "Create_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "116",
                        "company_id": "1",
                        "role_name": "5e9b9e46971e7",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "514",
                        "get": "1",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "510",
                    "route_id": "13",
                    "role_id": "116",
                    "right_id": "515",
                    "Routes": {
                        "id": "13",
                        "name": "Delete_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "116",
                        "company_id": "1",
                        "role_name": "5e9b9e46971e7",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "515",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "511",
                    "route_id": "10",
                    "role_id": "116",
                    "right_id": "516",
                    "Routes": {
                        "id": "10",
                        "name": "Delete_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "116",
                        "company_id": "1",
                        "role_name": "5e9b9e46971e7",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "516",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "512",
                    "route_id": "6",
                    "role_id": "116",
                    "right_id": "517",
                    "Routes": {
                        "id": "6",
                        "name": "List_Roles",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "116",
                        "company_id": "1",
                        "role_name": "5e9b9e46971e7",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "517",
                        "get": "0",
                        "destroy": "0",
                        "post": "1",
                        "patch": "0",
                        "put": "0"
                    }
                }
            ]
        },
        "5e9b9eafb0db7": {
            "id": "122",
            "company_id": "1",
            "role_name": "5e9b9eafb0db7",
            "active_status": "1",
            "Companies": {
                "id": "1",
                "company_name": "System",
                "active_status": "1",
                "Company_Configs": [
                    {
                        "id": "2",
                        "company_id": "1",
                        "config_id": "1",
                        "config_value": "UTC",
                        "active_status": "1"
                    }
                ],
                "Company_Roles": [
                    {
                        "id": "99",
                        "company_id": "1",
                        "role_name": "5e9b84865c81e",
                        "active_status": "1"
                    }
                ]
            },
            "Routes_Have_Roles": [
                {
                    "id": "550",
                    "route_id": "12",
                    "role_id": "122",
                    "right_id": "555",
                    "Routes": {
                        "id": "12",
                        "name": "Create_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "122",
                        "company_id": "1",
                        "role_name": "5e9b9eafb0db7",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "555",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "551",
                    "route_id": "3",
                    "role_id": "122",
                    "right_id": "556",
                    "Routes": {
                        "id": "3",
                        "name": "Create_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "122",
                        "company_id": "1",
                        "role_name": "5e9b9eafb0db7",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "556",
                        "get": "1",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "552",
                    "route_id": "13",
                    "role_id": "122",
                    "right_id": "557",
                    "Routes": {
                        "id": "13",
                        "name": "Delete_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "122",
                        "company_id": "1",
                        "role_name": "5e9b9eafb0db7",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "557",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "553",
                    "route_id": "10",
                    "role_id": "122",
                    "right_id": "558",
                    "Routes": {
                        "id": "10",
                        "name": "Delete_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "122",
                        "company_id": "1",
                        "role_name": "5e9b9eafb0db7",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "558",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "554",
                    "route_id": "6",
                    "role_id": "122",
                    "right_id": "559",
                    "Routes": {
                        "id": "6",
                        "name": "List_Roles",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "122",
                        "company_id": "1",
                        "role_name": "5e9b9eafb0db7",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "559",
                        "get": "0",
                        "destroy": "0",
                        "post": "1",
                        "patch": "0",
                        "put": "0"
                    }
                }
            ]
        },
        "5e9d095668926": {
            "id": "158",
            "company_id": "1",
            "role_name": "5e9d095668926",
            "active_status": "1",
            "Companies": {
                "id": "1",
                "company_name": "System",
                "active_status": "1",
                "Company_Configs": [
                    {
                        "id": "2",
                        "company_id": "1",
                        "config_id": "1",
                        "config_value": "UTC",
                        "active_status": "1"
                    }
                ],
                "Company_Roles": [
                    {
                        "id": "99",
                        "company_id": "1",
                        "role_name": "5e9b84865c81e",
                        "active_status": "1"
                    }
                ]
            },
            "Routes_Have_Roles": [
                {
                    "id": "916",
                    "route_id": "12",
                    "role_id": "158",
                    "right_id": "921",
                    "Routes": {
                        "id": "12",
                        "name": "Create_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "158",
                        "company_id": "1",
                        "role_name": "5e9d095668926",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "921",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "917",
                    "route_id": "3",
                    "role_id": "158",
                    "right_id": "922",
                    "Routes": {
                        "id": "3",
                        "name": "Create_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "158",
                        "company_id": "1",
                        "role_name": "5e9d095668926",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "922",
                        "get": "1",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "918",
                    "route_id": "13",
                    "role_id": "158",
                    "right_id": "923",
                    "Routes": {
                        "id": "13",
                        "name": "Delete_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "158",
                        "company_id": "1",
                        "role_name": "5e9d095668926",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "923",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "919",
                    "route_id": "10",
                    "role_id": "158",
                    "right_id": "924",
                    "Routes": {
                        "id": "10",
                        "name": "Delete_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "158",
                        "company_id": "1",
                        "role_name": "5e9d095668926",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "924",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "920",
                    "route_id": "14",
                    "role_id": "158",
                    "right_id": "925",
                    "Routes": {
                        "id": "14",
                        "name": "Edit_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "158",
                        "company_id": "1",
                        "role_name": "5e9d095668926",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "925",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                }
            ]
        },
        "master": {
            "id": "236",
            "company_id": "194",
            "role_name": "master",
            "active_status": "1",
            "Companies": {
                "id": "194",
                "company_name": "documentation_company",
                "active_status": "1",
                "Company_Configs": [
                    {
                        "id": "248",
                        "company_id": "194",
                        "config_id": "1",
                        "config_value": "UTC",
                        "active_status": "1"
                    }
                ],
                "Company_Roles": [
                    {
                        "id": "236",
                        "company_id": "194",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ]
            },
            "Users_Have_Roles": [
                {
                    "id": "169",
                    "user_id": "258",
                    "role_id": "236",
                    "Company_Roles": {
                        "id": "236",
                        "company_id": "194",
                        "role_name": "master",
                        "active_status": "1"
                    }
                }
            ],
            "Routes_Have_Roles": [
                {
                    "id": "1661",
                    "route_id": "12",
                    "role_id": "236",
                    "right_id": "1666",
                    "Routes": {
                        "id": "12",
                        "name": "Create_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "236",
                        "company_id": "194",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1666",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "1662",
                    "route_id": "3",
                    "role_id": "236",
                    "right_id": "1667",
                    "Routes": {
                        "id": "3",
                        "name": "Create_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "236",
                        "company_id": "194",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1667",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "1663",
                    "route_id": "13",
                    "role_id": "236",
                    "right_id": "1668",
                    "Routes": {
                        "id": "13",
                        "name": "Delete_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "236",
                        "company_id": "194",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1668",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "1664",
                    "route_id": "10",
                    "role_id": "236",
                    "right_id": "1669",
                    "Routes": {
                        "id": "10",
                        "name": "Delete_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "236",
                        "company_id": "194",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1669",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "1665",
                    "route_id": "14",
                    "role_id": "236",
                    "right_id": "1670",
                    "Routes": {
                        "id": "14",
                        "name": "Edit_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "236",
                        "company_id": "194",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1670",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                }
            ]
        }
    }
}
```

### HTTP Request
`GET api/v1/{company}/roles`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `company` |  required  | {integer} The ID of the organization
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `active_status` |  optional  | {bool} Include inactive objects
    `include_details` |  optional  | {int} Include the entire object model of the object.  If set the integer determines how many levels deep you want to return for related objects.
    `details_offset` |  optional  | {int} If include_details is false this is ignored.  For related objects which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.
    `details_limit` |  optional  | {int} If include_details is false this is ignored.  For related objects how many do you want to return. Must be a number between 1 and 25.
    `limit` |  optional  | {int} How many objects do you want to return. Must be a number between 1 and 100.
    `offset` |  optional  | {int} Which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.

<!-- END_110cfd4e77fbf74bd678ea1fbf46b800 -->

<!-- START_afcca4321b978edea0f876b7920559a4 -->
## {POST} roles/{company}/v1/api

So a company role is just a company and a name
However, in order to create a company you need to provide
an array of routes and the associated rights you would like
with that route.

> Example request:

```bash
curl -X POST \
    "https://project.dsfellowship.com/api/v1/1/roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "User-Access-Token: =FSLuQDJsTo7+3WruTXVyFOmotoIxntPATyE.DpgSRi5K" \
    -d '{"Routes_Have_Roles":[{"route_id":"3","Rights":{"get":true,"post":false,"patch":false,"put":false,"destroy":false}},{"route_id":"6","Rights":{"get":false,"post":true,"patch":false,"put":false,"destroy":false}}],"role_name":"5e9d46c2edc90"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/roles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "User-Access-Token": "=FSLuQDJsTo7+3WruTXVyFOmotoIxntPATyE.DpgSRi5K",
};

let body = {
    "Routes_Have_Roles": [
        {
            "route_id": "3",
            "Rights": {
                "get": true,
                "post": false,
                "patch": false,
                "put": false,
                "destroy": false
            }
        },
        {
            "route_id": "6",
            "Rights": {
                "get": false,
                "post": true,
                "patch": false,
                "put": false,
                "destroy": false
            }
        }
    ],
    "role_name": "5e9d46c2edc90"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (201):

```json
{
    "message": "Company Role created",
    "company role": {
        "id": "237",
        "company_id": "1",
        "role_name": "5e9d46c2edc90",
        "active_status": "1"
    }
}
```

### HTTP Request
`POST api/v1/{company}/roles`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `company` |  required  | {integer} The ID of the organization
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `Routes_Have_Roles.*.module` | string |  optional  | if route_id is missing then the module name will be used to create rights with multiple roles.
        `Routes_Have_Roles.*.route_id` | string |  optional  | if route_id is missing then the module name will be used to create rights with multiple roles.
        `Routes_Have_Roles.*.get` | boolean |  optional  | true allows method false denys method
        `Routes_Have_Roles.*.post` | boolean |  optional  | true allows method false denys method
        `Routes_Have_Roles.*.put` | boolean |  optional  | true allows method false denys method
        `Routes_Have_Roles.*.patch` | boolean |  optional  | true allows method false denys method
        `Routes_Have_Roles.*.delete` | boolean |  optional  | true allows method false denys method
        `role_name` | string |  required  | {string}
        `Routes_Have_Roles` | array |  required  | {array[array]} Needs to contain a key value pair for each route_id you are linking too, plus a Rights key with an array of get,post,destroy,patch,put keys and their corresponding boolean values you want.
    
<!-- END_afcca4321b978edea0f876b7920559a4 -->

<!-- START_858de4711294b15426ddfd8c8648a599 -->
## {PUT} roles/{company}/v1/api

This will recreate the role with the provided modal
Anything previous will be deleted so make sure this
is the complete modal you are expecting

> Example request:

```bash
curl -X PUT \
    "https://project.dsfellowship.com/api/v1/1/roles/237" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "User-Access-Token: TBom96x=ccL9FYfGmgk$=YQoJ3.RI.sZhCJKw5.?qC63Z" \
    -d '{"Routes_Have_Roles":[{"route_id":"3","Rights":{"get":true,"post":false,"patch":false,"put":false,"destroy":false}},{"route_id":"6","Rights":{"get":false,"post":true,"patch":false,"put":false,"destroy":false}}],"role_name":"5e9d46c3c29d8","active_status":true}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/roles/237"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "User-Access-Token": "TBom96x=ccL9FYfGmgk$=YQoJ3.RI.sZhCJKw5.?qC63Z",
};

let body = {
    "Routes_Have_Roles": [
        {
            "route_id": "3",
            "Rights": {
                "get": true,
                "post": false,
                "patch": false,
                "put": false,
                "destroy": false
            }
        },
        {
            "route_id": "6",
            "Rights": {
                "get": false,
                "post": true,
                "patch": false,
                "put": false,
                "destroy": false
            }
        }
    ],
    "role_name": "5e9d46c3c29d8",
    "active_status": true
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (201):

```json
{
    "message": "Company Role Updated",
    "company role": {
        "id": "237",
        "company_id": "1",
        "role_name": "5e9d46c3c29d8"
    }
}
```

### HTTP Request
`PUT api/v1/{company}/roles/{role}`

`PATCH api/v1/{company}/roles/{role}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `company` |  required  | {integer} The ID of the organization
    `role` |  required  | {int}
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `Routes_Have_Roles.*.module` | string |  optional  | if route_id is missing then the module name will be used to create rights with multiple roles. Example Company
        `Routes_Have_Roles.*.route_id` | integer |  optional  | if route_id is missing then the module name will be used to create rights with multiple roles.
        `Routes_Have_Roles.*.get` | boolean |  optional  | true allows method false denys method
        `Routes_Have_Roles.*.post` | boolean |  optional  | true allows method false denys method
        `Routes_Have_Roles.*.put` | boolean |  optional  | true allows method false denys method
        `Routes_Have_Roles.*.patch` | boolean |  optional  | true allows method false denys method
        `Routes_Have_Roles.*.delete` | boolean |  optional  | true allows method false denys method
        `role_name` | string |  required  | {string}
        `Routes_Have_Roles` | array |  required  | {array[array]} Needs to contain a key value pair for each route_id you are linking too, plus a Rights key with an array of get,post,destroy,patch,put keys and their corresponding boolean values you want.
        `active_status` | bool |  optional  | {string}
    
<!-- END_858de4711294b15426ddfd8c8648a599 -->

<!-- START_da23e5dc8ee97937a677d1aa6cca4a86 -->
## {DELETE} roles/{company}/v1/api

> Example request:

```bash
curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/1/roles/237?active_status=" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "User-Access-Token: ?LpWbY4XwYvvYX=szpdpd2rWwVR8Os0PKP0OlytuM1DyQ"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/roles/237"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "User-Access-Token": "?LpWbY4XwYvvYX=szpdpd2rWwVR8Os0PKP0OlytuM1DyQ",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (201):

```json
{
    "message": "Role successfully deleted"
}
```

### HTTP Request
`DELETE api/v1/{company}/roles/{role}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `company` |  required  | {integer} The ID of the organization
    `role` |  required  | {int}
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `active_status` |  required  | {bool} When true object will be marked inactive.  When false the object will be deleted.

<!-- END_da23e5dc8ee97937a677d1aa6cca4a86 -->

<!-- START_c694d0d5865ccb731d64c8931b1befe1 -->
## {POST} company/v1/api

This framework doesn't allow a company to do anything unless there is an authorized user making the request.
So as part of creating a company this will auto create a master role that has access to all methods on all routes
It will also create a user with the username default (recommend disabling after establishing a real person with master credentials)
Make sure to record the default password upon success, this password is unrecoverable and the company would need to be deleted and recreated

> Example request:

```bash
curl -X POST \
    "https://project.dsfellowship.com/api/v1/company" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "secret-token: moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0" \
    -d '{"company_name":"documentation_company"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/company"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "secret-token": "moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0",
};

let body = {
    "company_name": "documentation_company"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (201):

```json
{
    "message": "Company successfully created",
    "master_password": ".RGjh3E6.Xqp$m",
    "company": {
        "company_name": "documentation_company"
    }
}
```

### HTTP Request
`POST api/v1/company`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `company_name` | string |  required  | {string}
    
<!-- END_c694d0d5865ccb731d64c8931b1befe1 -->

<!-- START_3325a7e1462036041b5bb9084e516f11 -->
## {GET} companies/v1/api
List all companies

> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/companies?include_disabled=true&include_details=2&details_offset=0&details_limit=5&offset=0&limit=10&active_status=" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "secret-token: moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/companies"
);

let params = {
    "include_disabled": "true",
    "include_details": "2",
    "details_offset": "0",
    "details_limit": "5",
    "offset": "0",
    "limit": "10",
    "active_status": "",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "secret-token": "moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "Response Objects",
    "Company": {
        "documentation_company": {
            "id": "195",
            "company_name": "documentation_company",
            "active_status": "1",
            "Company_Configs": [
                {
                    "id": "250",
                    "company_id": "195",
                    "config_id": "1",
                    "config_value": "UTC",
                    "active_status": "1",
                    "Companies": {
                        "id": "195",
                        "company_name": "documentation_company",
                        "active_status": "1"
                    },
                    "Configs": {
                        "id": "1",
                        "active_status": "1",
                        "config_name": "company_time_zone",
                        "default_value": "UTC"
                    }
                },
                {
                    "id": "249",
                    "company_id": "195",
                    "config_id": "2",
                    "config_value": "300",
                    "active_status": "1",
                    "Companies": {
                        "id": "195",
                        "company_name": "documentation_company",
                        "active_status": "1"
                    },
                    "Configs": {
                        "id": "2",
                        "active_status": "1",
                        "config_name": "session_time_limit",
                        "default_value": "300"
                    }
                }
            ],
            "Company_Roles": [
                {
                    "id": "238",
                    "company_id": "195",
                    "role_name": "master",
                    "active_status": "1",
                    "Companies": {
                        "id": "195",
                        "company_name": "documentation_company",
                        "active_status": "1"
                    },
                    "Users_Have_Roles": [
                        {
                            "id": "170",
                            "user_id": "260",
                            "role_id": "238"
                        }
                    ],
                    "Routes_Have_Roles": [
                        {
                            "id": "1677",
                            "route_id": "12",
                            "role_id": "238",
                            "right_id": "1682"
                        }
                    ]
                }
            ]
        },
        "System": {
            "id": "1",
            "company_name": "System",
            "active_status": "1",
            "Company_Configs": [
                {
                    "id": "2",
                    "company_id": "1",
                    "config_id": "1",
                    "config_value": "UTC",
                    "active_status": "1",
                    "Companies": {
                        "id": "1",
                        "company_name": "System",
                        "active_status": "1"
                    },
                    "Configs": {
                        "id": "1",
                        "active_status": "1",
                        "config_name": "company_time_zone",
                        "default_value": "UTC"
                    }
                },
                {
                    "id": "1",
                    "company_id": "1",
                    "config_id": "2",
                    "config_value": "300",
                    "active_status": "1",
                    "Companies": {
                        "id": "1",
                        "company_name": "System",
                        "active_status": "1"
                    },
                    "Configs": {
                        "id": "2",
                        "active_status": "1",
                        "config_name": "session_time_limit",
                        "default_value": "300"
                    }
                }
            ],
            "Company_Roles": [
                {
                    "id": "99",
                    "company_id": "1",
                    "role_name": "5e9b84865c81e",
                    "active_status": "1",
                    "Companies": {
                        "id": "1",
                        "company_name": "System",
                        "active_status": "1"
                    },
                    "Routes_Have_Roles": [
                        {
                            "id": "385",
                            "route_id": "12",
                            "role_id": "99",
                            "right_id": "390"
                        }
                    ]
                },
                {
                    "id": "101",
                    "company_id": "1",
                    "role_name": "5e9b87ae6d1c8",
                    "active_status": "1",
                    "Companies": {
                        "id": "1",
                        "company_name": "System",
                        "active_status": "1"
                    },
                    "Routes_Have_Roles": [
                        {
                            "id": "397",
                            "route_id": "12",
                            "role_id": "101",
                            "right_id": "402"
                        }
                    ]
                },
                {
                    "id": "103",
                    "company_id": "1",
                    "role_name": "5e9b87eb3d3e5",
                    "active_status": "1",
                    "Companies": {
                        "id": "1",
                        "company_name": "System",
                        "active_status": "1"
                    },
                    "Routes_Have_Roles": [
                        {
                            "id": "409",
                            "route_id": "12",
                            "role_id": "103",
                            "right_id": "414"
                        }
                    ]
                },
                {
                    "id": "105",
                    "company_id": "1",
                    "role_name": "5e9b88f3acf10",
                    "active_status": "1",
                    "Companies": {
                        "id": "1",
                        "company_name": "System",
                        "active_status": "1"
                    },
                    "Routes_Have_Roles": [
                        {
                            "id": "421",
                            "route_id": "12",
                            "role_id": "105",
                            "right_id": "426"
                        }
                    ]
                },
                {
                    "id": "114",
                    "company_id": "1",
                    "role_name": "5e9b9cae49dca",
                    "active_status": "1",
                    "Companies": {
                        "id": "1",
                        "company_name": "System",
                        "active_status": "1"
                    },
                    "Routes_Have_Roles": [
                        {
                            "id": "494",
                            "route_id": "12",
                            "role_id": "114",
                            "right_id": "499"
                        }
                    ]
                }
            ]
        }
    }
}
```

### HTTP Request
`GET api/v1/companies`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `include_disabled` |  optional  | if set will only return active companies
    `include_details` |  optional  | {int} Include the entire object model of the object.  If set the integer determines how many levels deep you want to return for related objects.
    `details_offset` |  optional  | {int} If include_details is false this is ignored.  For related objects which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.
    `details_limit` |  optional  | {int} If include_details is false this is ignored.  For related objects how many do you want to return. Must be a number between 1 and 25.
    `offset` |  optional  | {int} Which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.
    `limit` |  optional  | {int} How many objects do you want to return. Must be a number between 1 and 100.
    `active_status` |  optional  | {bool} Include inactive objects

<!-- END_3325a7e1462036041b5bb9084e516f11 -->

#Tools


<!-- START_cd4a874127cd23508641c63b640ee838 -->
## doc.json
> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/doc.json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "secret-token: moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/doc.json"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "secret-token": "moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "variables": [],
    "info": {
        "name": "Laravel API",
        "_postman_id": "d455c0b4-3f65-412d-97d6-e0e9c18042a6",
        "description": "",
        "schema": "https:\/\/schema.getpostman.com\/json\/collection\/v2.0.0\/collection.json"
    },
    "item": [
        {
            "name": "Authentication",
            "description": "Requesting an End User Access Token for authenticating future requests",
            "item": [
                {
                    "name": "{POST} signin\/{company}\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/:company\/signin",
                            "query": [],
                            "variable": [
                                {
                                    "id": "company",
                                    "key": "company",
                                    "value": "1",
                                    "description": "{integer} The ID of the organization"
                                }
                            ]
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "secret-token",
                                "value": "moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"user\": \"default\",\n    \"password\": \"ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb\"\n}"
                        },
                        "description": "Returns a unique access_token used to authenticate in place of the username and password\nThe access_token experation date is based on the company_config session_timeout which is comany specific",
                        "response": []
                    }
                },
                {
                    "name": "{DELETE} {user}\/signin\/{company}\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/:company\/signin\/:signin",
                            "query": [
                                {
                                    "key": "active_status",
                                    "value": "",
                                    "description": "{bool} When true object will be marked inactive.  When false the object will be deleted.",
                                    "disabled": false
                                }
                            ],
                            "variable": [
                                {
                                    "id": "company",
                                    "key": "company",
                                    "value": "1",
                                    "description": "{integer} The ID of the organization"
                                },
                                {
                                    "id": "signin",
                                    "key": "signin",
                                    "value": "default",
                                    "description": "{string}"
                                }
                            ]
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "secret-token",
                                "value": "moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                }
            ]
        },
        {
            "name": "Company",
            "description": "Basic CRUD operations for Companies, Company Configs and Users",
            "item": [
                {
                    "name": "{GET} users\/{company}\/v1\/api\nReturn a list of users belonging to the company",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/:company\/users",
                            "query": [
                                {
                                    "key": "active_status",
                                    "value": "",
                                    "description": "{bool} Include inactive objects",
                                    "disabled": true
                                },
                                {
                                    "key": "include_details",
                                    "value": "2",
                                    "description": "{int} Include the entire object model of the object.  If set the integer determines how many levels deep you want to return for related objects.",
                                    "disabled": false
                                },
                                {
                                    "key": "details_offset",
                                    "value": "0",
                                    "description": "{int} If include_details is false this is ignored.  For related objects which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.",
                                    "disabled": true
                                },
                                {
                                    "key": "details_limit",
                                    "value": "5",
                                    "description": "{int} If include_details is false this is ignored.  For related objects how many do you want to return. Must be a number between 1 and 25.",
                                    "disabled": false
                                },
                                {
                                    "key": "limit",
                                    "value": "10",
                                    "description": "{int} How many objects do you want to return. Must be a number between 1 and 100.",
                                    "disabled": false
                                },
                                {
                                    "key": "offset",
                                    "value": "0",
                                    "description": "{int} Which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.",
                                    "disabled": true
                                }
                            ],
                            "variable": [
                                {
                                    "id": "company",
                                    "key": "company",
                                    "value": "1",
                                    "description": "{integer} The ID of the organization"
                                }
                            ]
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "qmPIaN2PqgsIpYazL7ubjS0ebtSsU5+AnJMxwt.x8$6ts"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "{POST} users\/{company}\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/:company\/users",
                            "query": [],
                            "variable": [
                                {
                                    "id": "company",
                                    "key": "company",
                                    "value": "1",
                                    "description": "{integer} The ID of the organization"
                                }
                            ]
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "9?n=he.aBECXjmJ?n8iPb7tRG+oy6tF+s7mIxYXGnKc1x"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"user\": \"new_user\",\n    \"password\": \"ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb\"\n}"
                        },
                        "description": "Create a user",
                        "response": []
                    }
                },
                {
                    "name": "{PUT} {user}\/users\/{company}\/v1\/api\nCurrently this endpoint is only able to change a password and re-enable a disabled user\nPlease note that the User-Access-Token does not have to be the access token for the username\nyou are changing the password for.  It just needs to be a user that has rights to this endpoint.",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/:company\/users\/:user",
                            "query": [],
                            "variable": [
                                {
                                    "id": "company",
                                    "key": "company",
                                    "value": "1",
                                    "description": "{integer} The ID of the organization"
                                },
                                {
                                    "id": "user",
                                    "key": "user",
                                    "value": "new_user",
                                    "description": "{string} username to change password"
                                }
                            ]
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "r?C9$aToCuw2qk3MKDGO2l9=Xsghr.Ehnhhc?gV=gFV6n"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"new_password\": \"ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb\",\n    \"active_status\": true\n}"
                        },
                        "description": "Currently there is no way for the User to change their own password if they don't have rights\nto this endpoint.  So you would need to first authenticate with a user who does have rights to change\nthe password.  This could be accomplished by first enabling the default user, authenticating and updating\nthe password.  Then remember to disable the default user.",
                        "response": []
                    }
                },
                {
                    "name": "{DELETE} {user}\/users\/{company}\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/:company\/users\/:user",
                            "query": [
                                {
                                    "key": "active_status",
                                    "value": "",
                                    "description": "{bool} When true object will be marked inactive.  When false the object will be deleted.",
                                    "disabled": false
                                }
                            ],
                            "variable": [
                                {
                                    "id": "company",
                                    "key": "company",
                                    "value": "1",
                                    "description": "{integer} The ID of the organization"
                                },
                                {
                                    "id": "user",
                                    "key": "user",
                                    "value": "new_user",
                                    "description": "{string} username to delete"
                                }
                            ]
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "abPp0EMSj.uI6GuwqRR7ye0c9grzx.ysOJS0dFklDkj45"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "{GET} roles\/{company}\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/:company\/roles",
                            "query": [
                                {
                                    "key": "active_status",
                                    "value": "",
                                    "description": "{bool} Include inactive objects",
                                    "disabled": true
                                },
                                {
                                    "key": "include_details",
                                    "value": "2",
                                    "description": "{int} Include the entire object model of the object.  If set the integer determines how many levels deep you want to return for related objects.",
                                    "disabled": false
                                },
                                {
                                    "key": "details_offset",
                                    "value": "0",
                                    "description": "{int} If include_details is false this is ignored.  For related objects which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.",
                                    "disabled": true
                                },
                                {
                                    "key": "details_limit",
                                    "value": "5",
                                    "description": "{int} If include_details is false this is ignored.  For related objects how many do you want to return. Must be a number between 1 and 25.",
                                    "disabled": false
                                },
                                {
                                    "key": "limit",
                                    "value": "10",
                                    "description": "{int} How many objects do you want to return. Must be a number between 1 and 100.",
                                    "disabled": false
                                },
                                {
                                    "key": "offset",
                                    "value": "0",
                                    "description": "{int} Which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.",
                                    "disabled": true
                                }
                            ],
                            "variable": [
                                {
                                    "id": "company",
                                    "key": "company",
                                    "value": "1",
                                    "description": "{integer} The ID of the organization"
                                }
                            ]
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": ".0GTfEpFAU=tOc$EaddGBHzA3BoIw3$APnGNo3LRcM9zN"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "{POST} roles\/{company}\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/:company\/roles",
                            "query": [],
                            "variable": [
                                {
                                    "id": "company",
                                    "key": "company",
                                    "value": "1",
                                    "description": "{integer} The ID of the organization"
                                }
                            ]
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "xV4k+l$.N9KUkSvRKCPTF6WlPfrESLWI4nY.Rb?1bWS0c"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"Routes_Have_Roles\": [\n        {\n            \"route_id\": \"3\",\n            \"Rights\": {\n                \"get\": true,\n                \"post\": false,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        },\n        {\n            \"route_id\": \"6\",\n            \"Rights\": {\n                \"get\": false,\n                \"post\": true,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        }\n    ],\n    \"role_name\": \"5e9d468770fa9\"\n}"
                        },
                        "description": "So a company role is just a company and a name\nHowever, in order to create a company you need to provide\nan array of routes and the associated rights you would like\nwith that route.",
                        "response": []
                    }
                },
                {
                    "name": "{PUT} roles\/{company}\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/:company\/roles\/:role",
                            "query": [],
                            "variable": [
                                {
                                    "id": "company",
                                    "key": "company",
                                    "value": "1",
                                    "description": "{integer} The ID of the organization"
                                },
                                {
                                    "id": "role",
                                    "key": "role",
                                    "value": "235",
                                    "description": "{int}"
                                }
                            ]
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "aU$ynki74?LhRKgN7dp8QXn6BcDQ5lEnKnjO2ENMnvZ76"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"Routes_Have_Roles\": [\n        {\n            \"route_id\": \"3\",\n            \"Rights\": {\n                \"get\": true,\n                \"post\": false,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        },\n        {\n            \"route_id\": \"6\",\n            \"Rights\": {\n                \"get\": false,\n                \"post\": true,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        }\n    ],\n    \"role_name\": \"5e9d4687ea8ec\",\n    \"active_status\": true\n}"
                        },
                        "description": "This will recreate the role with the provided modal\nAnything previous will be deleted so make sure this\nis the complete modal you are expecting",
                        "response": []
                    }
                },
                {
                    "name": "{DELETE} roles\/{company}\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/:company\/roles\/:role",
                            "query": [
                                {
                                    "key": "active_status",
                                    "value": "",
                                    "description": "{bool} When true object will be marked inactive.  When false the object will be deleted.",
                                    "disabled": false
                                }
                            ],
                            "variable": [
                                {
                                    "id": "company",
                                    "key": "company",
                                    "value": "1",
                                    "description": "{integer} The ID of the organization"
                                },
                                {
                                    "id": "role",
                                    "key": "role",
                                    "value": "235",
                                    "description": "{int}"
                                }
                            ]
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4Hu6z=Pudqsl3t4j=.yHmifk6X1m2+Cfxikln882J7iy0"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "{POST} company\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/company",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "secret-token",
                                "value": "moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"company_name\": \"documentation_company\"\n}"
                        },
                        "description": "This framework doesn't allow a company to do anything unless there is an authorized user making the request.\nSo as part of creating a company this will auto create a master role that has access to all methods on all routes\nIt will also create a user with the username default (recommend disabling after establishing a real person with master credentials)\nMake sure to record the default password upon success, this password is unrecoverable and the company would need to be deleted and recreated",
                        "response": []
                    }
                },
                {
                    "name": "{GET} companies\/v1\/api\nList all companies",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/companies",
                            "query": [
                                {
                                    "key": "include_disabled",
                                    "value": "true",
                                    "description": "if set will only return active companies",
                                    "disabled": false
                                },
                                {
                                    "key": "include_details",
                                    "value": "2",
                                    "description": "{int} Include the entire object model of the object.  If set the integer determines how many levels deep you want to return for related objects.",
                                    "disabled": false
                                },
                                {
                                    "key": "details_offset",
                                    "value": "0",
                                    "description": "{int} If include_details is false this is ignored.  For related objects which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.",
                                    "disabled": true
                                },
                                {
                                    "key": "details_limit",
                                    "value": "5",
                                    "description": "{int} If include_details is false this is ignored.  For related objects how many do you want to return. Must be a number between 1 and 25.",
                                    "disabled": false
                                },
                                {
                                    "key": "offset",
                                    "value": "0",
                                    "description": "{int} Which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.",
                                    "disabled": true
                                },
                                {
                                    "key": "limit",
                                    "value": "10",
                                    "description": "{int} How many objects do you want to return. Must be a number between 1 and 100.",
                                    "disabled": false
                                },
                                {
                                    "key": "active_status",
                                    "value": "",
                                    "description": "{bool} Include inactive objects",
                                    "disabled": true
                                }
                            ]
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "secret-token",
                                "value": "moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                }
            ]
        },
        {
            "name": "Tools",
            "description": "",
            "item": [
                {
                    "name": "doc.json",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "doc.json",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "secret-token",
                                "value": "moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "{GET} routes\/v1\/api\nSee all the endpoints and if their explicit rights",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/routes",
                            "query": [
                                {
                                    "key": "active_status",
                                    "value": "1",
                                    "description": "{bool} When true will only return active objects.  When false all objects returned.",
                                    "disabled": false
                                }
                            ]
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "secret-token",
                                "value": "moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "{PUT} default_user\/{company}\/v1\/api\nThis endpoint is exclusively to re-enable the default user specified\nit should be used when for some reason ALL users in a company are locked out\nor at least one person doesn't have all rights.",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/:company\/default_user\/:default_user",
                            "query": [],
                            "variable": [
                                {
                                    "id": "company",
                                    "key": "company",
                                    "value": "1",
                                    "description": "{integer} The ID of the organization"
                                }
                            ]
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "secret-token",
                                "value": "moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                }
            ]
        }
    ]
}
```

### HTTP Request
`GET doc.json`


<!-- END_cd4a874127cd23508641c63b640ee838 -->

<!-- START_392f39a571495220f725e466d873f08b -->
## {GET} routes/v1/api
See all the endpoints and if their explicit rights

> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/routes?active_status=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "secret-token: moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/routes"
);

let params = {
    "active_status": "1",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "secret-token": "moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "List of Current Routes",
    "Routes": {
        "User_Signin": {
            "id": "1",
            "name": "User_Signin",
            "implicit_allow": "1",
            "module": ""
        },
        "List_Users": {
            "id": "2",
            "name": "List_Users",
            "implicit_allow": "0",
            "module": "Company"
        },
        "Create_User": {
            "id": "3",
            "name": "Create_User",
            "implicit_allow": "0",
            "module": "Company"
        },
        "List_Companies": {
            "id": "4",
            "name": "List_Companies",
            "implicit_allow": "1",
            "module": ""
        },
        "Create_Company": {
            "id": "5",
            "name": "Create_Company",
            "implicit_allow": "1",
            "module": ""
        },
        "List_Roles": {
            "id": "6",
            "name": "List_Roles",
            "implicit_allow": "0",
            "module": "Company"
        },
        "Update_User": {
            "id": "7",
            "name": "Update_User",
            "implicit_allow": "0",
            "module": "Company"
        },
        "List_Routes": {
            "id": "8",
            "name": "List_Routes",
            "implicit_allow": "1",
            "module": ""
        },
        "apidoc.json": {
            "id": "9",
            "name": "apidoc.json",
            "implicit_allow": "1",
            "module": ""
        },
        "Delete_User": {
            "id": "10",
            "name": "Delete_User",
            "implicit_allow": "0",
            "module": "Company"
        },
        "Enable_Default_User": {
            "id": "11",
            "name": "Enable_Default_User",
            "implicit_allow": "1",
            "module": ""
        },
        "Create_Role": {
            "id": "12",
            "name": "Create_Role",
            "implicit_allow": "0",
            "module": "Company"
        },
        "Delete_Role": {
            "id": "13",
            "name": "Delete_Role",
            "implicit_allow": "0",
            "module": "Company"
        },
        "Edit_Role": {
            "id": "14",
            "name": "Edit_Role",
            "implicit_allow": "0",
            "module": "Company"
        },
        "User_Signout": {
            "id": "15",
            "name": "User_Signout",
            "implicit_allow": "1",
            "module": ""
        }
    }
}
```

### HTTP Request
`GET api/v1/routes`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `active_status` |  required  | {bool} When true will only return active objects.  When false all objects returned.

<!-- END_392f39a571495220f725e466d873f08b -->

<!-- START_bc0f2a216f00c2aa2122a1a7be9ad77b -->
## {PUT} default_user/{company}/v1/api
This endpoint is exclusively to re-enable the default user specified
it should be used when for some reason ALL users in a company are locked out
or at least one person doesn&#039;t have all rights.

> Example request:

```bash
curl -X PUT \
    "https://project.dsfellowship.com/api/v1/1/default_user/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "secret-token: moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/default_user/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "secret-token": "moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (201):

```json
{
    "message": "Default User Enabled",
    "user": {
        "id": "1",
        "username": "default",
        "company_id": "1",
        "project_name": "project2"
    }
}
```

### HTTP Request
`PUT api/v1/{company}/default_user/{default_user}`

`PATCH api/v1/{company}/default_user/{default_user}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `company` |  required  | {integer} The ID of the organization
    `user` |  optional  | {string} default username.  Not required. In fact will be overridden

<!-- END_bc0f2a216f00c2aa2122a1a7be9ad77b -->


