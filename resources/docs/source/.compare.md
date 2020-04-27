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
    -H "client-id: c7X2ItzT1FuJpgB?oorN3HK8nacTygmN" \
    -H "secret-token: KydrxxVjcE$ZN=W4UZoI9fp8oeYqOyUEvg3z37WawSlzVjG5" \
    -d '{"user":"default","password":"c7X2ItzT1FuJpgB?oorN3HK8nacTygmN"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/signin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN",
    "secret-token": "KydrxxVjcE$ZN=W4UZoI9fp8oeYqOyUEvg3z37WawSlzVjG5",
};

let body = {
    "user": "default",
    "password": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN"
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
        "client_id": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN",
        "access_token": "YIB==3ZKPzLo$uUZLlk.7?nk$4VEnP.8ovwOI.owkaGy4",
        "user_id": "1",
        "experation_timestamp": "2020-04-27 06:15:03"
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
    -H "client-id: c7X2ItzT1FuJpgB?oorN3HK8nacTygmN" \
    -H "User-Access-Token: .GSH.kjWap?u+Rq5tJsD$WyP0BySF?S+Hc$Nw8yHhLaCy"
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
    "client-id": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN",
    "User-Access-Token": ".GSH.kjWap?u+Rq5tJsD$WyP0BySF?S+Hc$Nw8yHhLaCy",
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
        "client_id": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN",
        "access_token": ".GSH.kjWap?u+Rq5tJsD$WyP0BySF?S+Hc$Nw8yHhLaCy",
        "user_id": "1",
        "experation_timestamp": "2020-04-27 06:05:13"
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
<!-- START_1aff981da377ba9a1bbc56ff8efaec0d -->
## {GET} users/v1/api
Return a list of users belonging to the company

> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/users?include_disabled_objects=&include_details=2&details_offset=0&details_limit=5&limit=10&offset=0" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: c7X2ItzT1FuJpgB?oorN3HK8nacTygmN" \
    -H "User-Access-Token: .GSH.kjWap?u+Rq5tJsD$WyP0BySF?S+Hc$Nw8yHhLaCy"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/users"
);

let params = {
    "include_disabled_objects": "",
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
    "client-id": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN",
    "User-Access-Token": ".GSH.kjWap?u+Rq5tJsD$WyP0BySF?S+Hc$Nw8yHhLaCy",
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
                "active_status": "1"
            }
        }
    }
}
```

### HTTP Request
`GET api/v1/users`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `include_disabled_objects` |  optional  | {bool}
    `include_details` |  optional  | {int} Include the entire object model of the object.  If set the integer determines how many levels deep you want to return for related objects.
    `details_offset` |  optional  | {int} If include_details is false this is ignored.  For related objects which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.
    `details_limit` |  optional  | {int} If include_details is false this is ignored.  For related objects how many do you want to return. Must be a number between 1 and 25.
    `limit` |  optional  | {int} How many objects do you want to return. Must be a number between 1 and 100.
    `offset` |  optional  | {int} Which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.

<!-- END_1aff981da377ba9a1bbc56ff8efaec0d -->

<!-- START_4194ceb9a20b7f80b61d14d44df366b4 -->
## {POST} users/v1/api

Create a user

> Example request:

```bash
curl -X POST \
    "https://project.dsfellowship.com/api/v1/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: c7X2ItzT1FuJpgB?oorN3HK8nacTygmN" \
    -H "User-Access-Token: .GSH.kjWap?u+Rq5tJsD$WyP0BySF?S+Hc$Nw8yHhLaCy" \
    -d '{"user":"new_user","password":"c7X2ItzT1FuJpgB?oorN3HK8nacTygmN","company_roles":[{"id":"2","company_id":"1","role_name":"master","active_status":"1","Users_Have_Roles":[{"id":"2","user_id":"1","role_id":"2"}],"Routes_Have_Roles":[{"id":"1","route_id":"1","role_id":"2","right_id":"1"},{"id":"2","route_id":"2","role_id":"2","right_id":"2"},{"id":"3","route_id":"3","role_id":"2","right_id":"3"},{"id":"4","route_id":"4","role_id":"2","right_id":"4"},{"id":"5","route_id":"5","role_id":"2","right_id":"5"}]}]}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN",
    "User-Access-Token": ".GSH.kjWap?u+Rq5tJsD$WyP0BySF?S+Hc$Nw8yHhLaCy",
};

let body = {
    "user": "new_user",
    "password": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN",
    "company_roles": [
        {
            "id": "2",
            "company_id": "1",
            "role_name": "master",
            "active_status": "1",
            "Users_Have_Roles": [
                {
                    "id": "2",
                    "user_id": "1",
                    "role_id": "2"
                }
            ],
            "Routes_Have_Roles": [
                {
                    "id": "1",
                    "route_id": "1",
                    "role_id": "2",
                    "right_id": "1"
                },
                {
                    "id": "2",
                    "route_id": "2",
                    "role_id": "2",
                    "right_id": "2"
                },
                {
                    "id": "3",
                    "route_id": "3",
                    "role_id": "2",
                    "right_id": "3"
                },
                {
                    "id": "4",
                    "route_id": "4",
                    "role_id": "2",
                    "right_id": "4"
                },
                {
                    "id": "5",
                    "route_id": "5",
                    "role_id": "2",
                    "right_id": "5"
                }
            ]
        }
    ]
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
        "id": 89,
        "username": "new_user",
        "company_id": 1,
        "project_name": "project2",
        "active_status": 1
    }
}
```

### HTTP Request
`POST api/v1/users`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `user` | string |  required  | {string}
        `password` | string |  required  | {string}
        `company_roles` | array |  required  | {array}
    
<!-- END_4194ceb9a20b7f80b61d14d44df366b4 -->

<!-- START_296fac4bf818c99f6dd42a4a0eb56b58 -->
## {PUT} {user}/users/v1/api
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
    "https://project.dsfellowship.com/api/v1/users/new_user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: c7X2ItzT1FuJpgB?oorN3HK8nacTygmN" \
    -H "User-Access-Token: .GSH.kjWap?u+Rq5tJsD$WyP0BySF?S+Hc$Nw8yHhLaCy" \
    -d '{"new_password":"c7X2ItzT1FuJpgB?oorN3HK8nacTygmN","company_roles":[{"id":"2","company_id":"1","role_name":"master","active_status":"1"}],"active_status":true}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/users/new_user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN",
    "User-Access-Token": ".GSH.kjWap?u+Rq5tJsD$WyP0BySF?S+Hc$Nw8yHhLaCy",
};

let body = {
    "new_password": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN",
    "company_roles": [
        {
            "id": "2",
            "company_id": "1",
            "role_name": "master",
            "active_status": "1"
        }
    ],
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
    "message": "User successfully updated",
    "user": {
        "id": "89",
        "username": "new_user",
        "company_id": "1",
        "project_name": "project2",
        "active_status": 1
    }
}
```

### HTTP Request
`PUT api/v1/users/{user}`

`PATCH api/v1/users/{user}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `user` |  required  | {string} username to change password
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `new_password` | string |  optional  | {string}
        `company_roles` | array |  required  | {array}
        `active_status` | bool |  optional  | {string}
    
<!-- END_296fac4bf818c99f6dd42a4a0eb56b58 -->

<!-- START_22354fc95c42d81a744eece68f5b9b9a -->
## {DELETE} {user}/users/v1/api

> Example request:

```bash
curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/users/new_user?active_status=" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: c7X2ItzT1FuJpgB?oorN3HK8nacTygmN" \
    -H "User-Access-Token: .GSH.kjWap?u+Rq5tJsD$WyP0BySF?S+Hc$Nw8yHhLaCy"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/users/new_user"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN",
    "User-Access-Token": ".GSH.kjWap?u+Rq5tJsD$WyP0BySF?S+Hc$Nw8yHhLaCy",
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
        "id": "89",
        "username": "new_user",
        "company_id": "1",
        "project_name": "project2",
        "active_status": "1"
    }
}
```

### HTTP Request
`DELETE api/v1/users/{user}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `user` |  required  | {string} username to delete
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `active_status` |  required  | {bool} When true object will be marked inactive.  When false the object will be deleted.

<!-- END_22354fc95c42d81a744eece68f5b9b9a -->

<!-- START_d2f16357cb4ed36dbb0e9529ea4a460c -->
## {GET} roles/v1/api

> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/roles?include_disabled_objects=&include_details=2&details_offset=0&details_limit=5&limit=10&offset=0" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: c7X2ItzT1FuJpgB?oorN3HK8nacTygmN" \
    -H "User-Access-Token: .GSH.kjWap?u+Rq5tJsD$WyP0BySF?S+Hc$Nw8yHhLaCy"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/roles"
);

let params = {
    "include_disabled_objects": "",
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
    "client-id": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN",
    "User-Access-Token": ".GSH.kjWap?u+Rq5tJsD$WyP0BySF?S+Hc$Nw8yHhLaCy",
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
        "master": {
            "id": "2",
            "company_id": "1",
            "role_name": "master",
            "active_status": "1",
            "Users_Have_Roles": [
                {
                    "id": "2",
                    "user_id": "1",
                    "role_id": "2"
                }
            ],
            "Routes_Have_Roles": [
                {
                    "id": "1",
                    "route_id": "1",
                    "role_id": "2",
                    "right_id": "1"
                },
                {
                    "id": "2",
                    "route_id": "2",
                    "role_id": "2",
                    "right_id": "2"
                },
                {
                    "id": "3",
                    "route_id": "3",
                    "role_id": "2",
                    "right_id": "3"
                },
                {
                    "id": "4",
                    "route_id": "4",
                    "role_id": "2",
                    "right_id": "4"
                },
                {
                    "id": "5",
                    "route_id": "5",
                    "role_id": "2",
                    "right_id": "5"
                }
            ]
        },
        "5ea358e714492": {
            "id": "9",
            "company_id": "1",
            "role_name": "5ea358e714492",
            "active_status": "1",
            "Routes_Have_Roles": [
                {
                    "id": "64",
                    "route_id": "12",
                    "role_id": "9",
                    "right_id": "64"
                },
                {
                    "id": "65",
                    "route_id": "3",
                    "role_id": "9",
                    "right_id": "65"
                },
                {
                    "id": "66",
                    "route_id": "13",
                    "role_id": "9",
                    "right_id": "66"
                },
                {
                    "id": "67",
                    "route_id": "10",
                    "role_id": "9",
                    "right_id": "67"
                },
                {
                    "id": "68",
                    "route_id": "14",
                    "role_id": "9",
                    "right_id": "68"
                }
            ]
        },
        "5ea35c33f172e": {
            "id": "10",
            "company_id": "1",
            "role_name": "5ea35c33f172e",
            "active_status": "1",
            "Routes_Have_Roles": [
                {
                    "id": "72",
                    "route_id": "12",
                    "role_id": "10",
                    "right_id": "72"
                },
                {
                    "id": "73",
                    "route_id": "3",
                    "role_id": "10",
                    "right_id": "73"
                },
                {
                    "id": "74",
                    "route_id": "13",
                    "role_id": "10",
                    "right_id": "74"
                },
                {
                    "id": "75",
                    "route_id": "10",
                    "role_id": "10",
                    "right_id": "75"
                },
                {
                    "id": "76",
                    "route_id": "14",
                    "role_id": "10",
                    "right_id": "76"
                }
            ]
        },
        "5ea35c747e77f": {
            "id": "11",
            "company_id": "1",
            "role_name": "5ea35c747e77f",
            "active_status": "1",
            "Routes_Have_Roles": [
                {
                    "id": "80",
                    "route_id": "12",
                    "role_id": "11",
                    "right_id": "80"
                },
                {
                    "id": "81",
                    "route_id": "3",
                    "role_id": "11",
                    "right_id": "81"
                },
                {
                    "id": "82",
                    "route_id": "13",
                    "role_id": "11",
                    "right_id": "82"
                },
                {
                    "id": "83",
                    "route_id": "10",
                    "role_id": "11",
                    "right_id": "83"
                },
                {
                    "id": "84",
                    "route_id": "14",
                    "role_id": "11",
                    "right_id": "84"
                }
            ]
        },
        "5ea3628f9f8af": {
            "id": "12",
            "company_id": "1",
            "role_name": "5ea3628f9f8af",
            "active_status": "1",
            "Routes_Have_Roles": [
                {
                    "id": "88",
                    "route_id": "12",
                    "role_id": "12",
                    "right_id": "88"
                },
                {
                    "id": "89",
                    "route_id": "3",
                    "role_id": "12",
                    "right_id": "89"
                },
                {
                    "id": "90",
                    "route_id": "13",
                    "role_id": "12",
                    "right_id": "90"
                },
                {
                    "id": "91",
                    "route_id": "10",
                    "role_id": "12",
                    "right_id": "91"
                },
                {
                    "id": "92",
                    "route_id": "14",
                    "role_id": "12",
                    "right_id": "92"
                }
            ]
        },
        "5ea3643372858": {
            "id": "13",
            "company_id": "1",
            "role_name": "5ea3643372858",
            "active_status": "1",
            "Routes_Have_Roles": [
                {
                    "id": "96",
                    "route_id": "12",
                    "role_id": "13",
                    "right_id": "96"
                },
                {
                    "id": "97",
                    "route_id": "3",
                    "role_id": "13",
                    "right_id": "97"
                },
                {
                    "id": "98",
                    "route_id": "13",
                    "role_id": "13",
                    "right_id": "98"
                },
                {
                    "id": "99",
                    "route_id": "10",
                    "role_id": "13",
                    "right_id": "99"
                },
                {
                    "id": "100",
                    "route_id": "14",
                    "role_id": "13",
                    "right_id": "100"
                }
            ]
        },
        "5ea369528cba4": {
            "id": "16",
            "company_id": "1",
            "role_name": "5ea369528cba4",
            "active_status": "1",
            "Routes_Have_Roles": [
                {
                    "id": "120",
                    "route_id": "12",
                    "role_id": "16",
                    "right_id": "120"
                },
                {
                    "id": "121",
                    "route_id": "3",
                    "role_id": "16",
                    "right_id": "121"
                },
                {
                    "id": "122",
                    "route_id": "13",
                    "role_id": "16",
                    "right_id": "122"
                },
                {
                    "id": "123",
                    "route_id": "10",
                    "role_id": "16",
                    "right_id": "123"
                },
                {
                    "id": "124",
                    "route_id": "14",
                    "role_id": "16",
                    "right_id": "124"
                }
            ]
        },
        "5ea64f78a1f4b": {
            "id": "68",
            "company_id": "1",
            "role_name": "5ea64f78a1f4b",
            "active_status": "1",
            "Routes_Have_Roles": [
                {
                    "id": "536",
                    "route_id": "12",
                    "role_id": "68",
                    "right_id": "536"
                },
                {
                    "id": "537",
                    "route_id": "3",
                    "role_id": "68",
                    "right_id": "537"
                },
                {
                    "id": "538",
                    "route_id": "13",
                    "role_id": "68",
                    "right_id": "538"
                },
                {
                    "id": "539",
                    "route_id": "10",
                    "role_id": "68",
                    "right_id": "539"
                },
                {
                    "id": "540",
                    "route_id": "14",
                    "role_id": "68",
                    "right_id": "540"
                }
            ]
        },
        "5ea6510869884": {
            "id": "70",
            "company_id": "1",
            "role_name": "5ea6510869884",
            "active_status": "1",
            "Routes_Have_Roles": [
                {
                    "id": "552",
                    "route_id": "12",
                    "role_id": "70",
                    "right_id": "552"
                },
                {
                    "id": "553",
                    "route_id": "3",
                    "role_id": "70",
                    "right_id": "553"
                },
                {
                    "id": "554",
                    "route_id": "13",
                    "role_id": "70",
                    "right_id": "554"
                },
                {
                    "id": "555",
                    "route_id": "10",
                    "role_id": "70",
                    "right_id": "555"
                },
                {
                    "id": "556",
                    "route_id": "14",
                    "role_id": "70",
                    "right_id": "556"
                }
            ]
        },
        "5ea651b81dd8f": {
            "id": "72",
            "company_id": "1",
            "role_name": "5ea651b81dd8f",
            "active_status": "1",
            "Routes_Have_Roles": [
                {
                    "id": "568",
                    "route_id": "12",
                    "role_id": "72",
                    "right_id": "568"
                },
                {
                    "id": "569",
                    "route_id": "3",
                    "role_id": "72",
                    "right_id": "569"
                },
                {
                    "id": "570",
                    "route_id": "13",
                    "role_id": "72",
                    "right_id": "570"
                },
                {
                    "id": "571",
                    "route_id": "10",
                    "role_id": "72",
                    "right_id": "571"
                },
                {
                    "id": "572",
                    "route_id": "14",
                    "role_id": "72",
                    "right_id": "572"
                }
            ]
        }
    }
}
```

### HTTP Request
`GET api/v1/roles`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `include_disabled_objects` |  optional  | {bool}
    `include_details` |  optional  | {int} Include the entire object model of the object.  If set the integer determines how many levels deep you want to return for related objects.
    `details_offset` |  optional  | {int} If include_details is false this is ignored.  For related objects which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.
    `details_limit` |  optional  | {int} If include_details is false this is ignored.  For related objects how many do you want to return. Must be a number between 1 and 25.
    `limit` |  optional  | {int} How many objects do you want to return. Must be a number between 1 and 100.
    `offset` |  optional  | {int} Which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.

<!-- END_d2f16357cb4ed36dbb0e9529ea4a460c -->

<!-- START_5f753b2bffb6b34b6136ddfe1be7bcce -->
## {POST} roles/v1/api

So a company role is just a company and a name
However, in order to create a company you need to provide
an array of routes and the associated rights you would like
with that route.

> Example request:

```bash
curl -X POST \
    "https://project.dsfellowship.com/api/v1/roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: c7X2ItzT1FuJpgB?oorN3HK8nacTygmN" \
    -H "User-Access-Token: .GSH.kjWap?u+Rq5tJsD$WyP0BySF?S+Hc$Nw8yHhLaCy" \
    -d '{"Routes_Have_Roles":[{"route_id":"3","Rights":{"get":true,"post":false,"patch":false,"put":false,"destroy":false}},{"route_id":"6","Rights":{"get":false,"post":true,"patch":false,"put":false,"destroy":false}}],"role_name":"5ea6774337b12"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/roles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN",
    "User-Access-Token": ".GSH.kjWap?u+Rq5tJsD$WyP0BySF?S+Hc$Nw8yHhLaCy",
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
    "role_name": "5ea6774337b12"
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
        "id": "89",
        "company_id": "1",
        "role_name": "5ea6774337b12",
        "active_status": "1"
    }
}
```

### HTTP Request
`POST api/v1/roles`

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
    
<!-- END_5f753b2bffb6b34b6136ddfe1be7bcce -->

<!-- START_81ac9047f8db2b92092c5a7f13e5d28d -->
## {PUT} roles/v1/api

This will recreate the role with the provided modal
Anything previous will be deleted so make sure this
is the complete modal you are expecting

> Example request:

```bash
curl -X PUT \
    "https://project.dsfellowship.com/api/v1/roles/89" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: c7X2ItzT1FuJpgB?oorN3HK8nacTygmN" \
    -H "User-Access-Token: .GSH.kjWap?u+Rq5tJsD$WyP0BySF?S+Hc$Nw8yHhLaCy" \
    -d '{"Routes_Have_Roles":[{"route_id":"3","Rights":{"get":true,"post":false,"patch":false,"put":false,"destroy":false}},{"route_id":"6","Rights":{"get":false,"post":true,"patch":false,"put":false,"destroy":false}}],"role_name":"5ea67743bef36","active_status":true}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/roles/89"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN",
    "User-Access-Token": ".GSH.kjWap?u+Rq5tJsD$WyP0BySF?S+Hc$Nw8yHhLaCy",
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
    "role_name": "5ea67743bef36",
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
        "id": "89",
        "company_id": "1",
        "role_name": "5ea67743bef36",
        "active_status": 1
    }
}
```

### HTTP Request
`PUT api/v1/roles/{role}`

`PATCH api/v1/roles/{role}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
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
    
<!-- END_81ac9047f8db2b92092c5a7f13e5d28d -->

<!-- START_04c524fc2f0ea8c793406426144b4c71 -->
## {DELETE} roles/v1/api

> Example request:

```bash
curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/roles/89?active_status=" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: c7X2ItzT1FuJpgB?oorN3HK8nacTygmN" \
    -H "User-Access-Token: .GSH.kjWap?u+Rq5tJsD$WyP0BySF?S+Hc$Nw8yHhLaCy"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/roles/89"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN",
    "User-Access-Token": ".GSH.kjWap?u+Rq5tJsD$WyP0BySF?S+Hc$Nw8yHhLaCy",
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
`DELETE api/v1/roles/{role}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `role` |  required  | {int}
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `active_status` |  required  | {bool} When true object will be marked inactive.  When false the object will be deleted.

<!-- END_04c524fc2f0ea8c793406426144b4c71 -->

<!-- START_3325a7e1462036041b5bb9084e516f11 -->
## {GET} companies/v1/api
List all companies

> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/companies?include_disabled=true&include_details=2&details_offset=0&details_limit=5&offset=0&limit=10&include_disabled_objects=" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: c7X2ItzT1FuJpgB?oorN3HK8nacTygmN" \
    -H "secret-token: KydrxxVjcE$ZN=W4UZoI9fp8oeYqOyUEvg3z37WawSlzVjG5"
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
    "include_disabled_objects": "",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN",
    "secret-token": "KydrxxVjcE$ZN=W4UZoI9fp8oeYqOyUEvg3z37WawSlzVjG5",
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
                    "active_status": "1"
                },
                {
                    "id": "1",
                    "company_id": "1",
                    "config_id": "2",
                    "config_value": "300",
                    "active_status": "1"
                }
            ],
            "Company_Roles": [
                {
                    "id": "9",
                    "company_id": "1",
                    "role_name": "5ea358e714492",
                    "active_status": "1",
                    "Routes_Have_Roles": [
                        {
                            "id": "64",
                            "route_id": "12",
                            "role_id": "9",
                            "right_id": "64"
                        }
                    ]
                },
                {
                    "id": "10",
                    "company_id": "1",
                    "role_name": "5ea35c33f172e",
                    "active_status": "1",
                    "Routes_Have_Roles": [
                        {
                            "id": "72",
                            "route_id": "12",
                            "role_id": "10",
                            "right_id": "72"
                        }
                    ]
                },
                {
                    "id": "11",
                    "company_id": "1",
                    "role_name": "5ea35c747e77f",
                    "active_status": "1",
                    "Routes_Have_Roles": [
                        {
                            "id": "80",
                            "route_id": "12",
                            "role_id": "11",
                            "right_id": "80"
                        }
                    ]
                },
                {
                    "id": "12",
                    "company_id": "1",
                    "role_name": "5ea3628f9f8af",
                    "active_status": "1",
                    "Routes_Have_Roles": [
                        {
                            "id": "88",
                            "route_id": "12",
                            "role_id": "12",
                            "right_id": "88"
                        }
                    ]
                },
                {
                    "id": "13",
                    "company_id": "1",
                    "role_name": "5ea3643372858",
                    "active_status": "1",
                    "Routes_Have_Roles": [
                        {
                            "id": "96",
                            "route_id": "12",
                            "role_id": "13",
                            "right_id": "96"
                        }
                    ]
                }
            ]
        },
        "documentation_company": {
            "id": "52",
            "company_name": "documentation_company",
            "active_status": "1",
            "Company_Configs": [
                {
                    "id": "84",
                    "company_id": "52",
                    "config_id": "1",
                    "config_value": "UTC",
                    "active_status": "1"
                },
                {
                    "id": "83",
                    "company_id": "52",
                    "config_id": "2",
                    "config_value": "300",
                    "active_status": "1"
                }
            ],
            "Company_Roles": [
                {
                    "id": "87",
                    "company_id": "52",
                    "role_name": "master",
                    "active_status": "1",
                    "Users_Have_Roles": [
                        {
                            "id": "144",
                            "user_id": "88",
                            "role_id": "87"
                        }
                    ],
                    "Routes_Have_Roles": [
                        {
                            "id": "689",
                            "route_id": "12",
                            "role_id": "87",
                            "right_id": "689"
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
    `include_disabled_objects` |  optional  | {bool}

<!-- END_3325a7e1462036041b5bb9084e516f11 -->

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
    -H "client-id: c7X2ItzT1FuJpgB?oorN3HK8nacTygmN" \
    -H "secret-token: KydrxxVjcE$ZN=W4UZoI9fp8oeYqOyUEvg3z37WawSlzVjG5" \
    -d '{"company_name":"documentation_company"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/company"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN",
    "secret-token": "KydrxxVjcE$ZN=W4UZoI9fp8oeYqOyUEvg3z37WawSlzVjG5",
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
    "master_password": "xJ7rGB9K$l8j.9",
    "company": {
        "id": 53,
        "company_name": "documentation_company",
        "active_status": 1
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

#Tools


<!-- START_cd4a874127cd23508641c63b640ee838 -->
## doc.json
> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/doc.json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "secret-token: KydrxxVjcE$ZN=W4UZoI9fp8oeYqOyUEvg3z37WawSlzVjG5"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/doc.json"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "secret-token": "KydrxxVjcE$ZN=W4UZoI9fp8oeYqOyUEvg3z37WawSlzVjG5",
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
        "_postman_id": "433c870b-43ec-452d-b5dc-e918198946a7",
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
                                "value": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN"
                            },
                            {
                                "key": "secret-token",
                                "value": "KydrxxVjcE$ZN=W4UZoI9fp8oeYqOyUEvg3z37WawSlzVjG5"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"user\": \"default\",\n    \"password\": \"c7X2ItzT1FuJpgB?oorN3HK8nacTygmN\"\n}"
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
                                "value": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "6rrfwmLl5IpdEWjVQMEaxb21PG0uHJjAQGKq7zqxY1Qc6"
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
                    "name": "{GET} users\/v1\/api\nReturn a list of users belonging to the company",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/users",
                            "query": [
                                {
                                    "key": "include_disabled_objects",
                                    "value": "",
                                    "description": "{bool}",
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
                                "value": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "6rrfwmLl5IpdEWjVQMEaxb21PG0uHJjAQGKq7zqxY1Qc6"
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
                    "name": "{POST} users\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/users",
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
                                "value": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "6rrfwmLl5IpdEWjVQMEaxb21PG0uHJjAQGKq7zqxY1Qc6"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"user\": \"new_user\",\n    \"password\": \"c7X2ItzT1FuJpgB?oorN3HK8nacTygmN\",\n    \"company_roles\": [\n        {\n            \"id\": \"2\",\n            \"company_id\": \"1\",\n            \"role_name\": \"master\",\n            \"active_status\": \"1\",\n            \"Users_Have_Roles\": [\n                {\n                    \"id\": \"2\",\n                    \"user_id\": \"1\",\n                    \"role_id\": \"2\"\n                }\n            ],\n            \"Routes_Have_Roles\": [\n                {\n                    \"id\": \"1\",\n                    \"route_id\": \"1\",\n                    \"role_id\": \"2\",\n                    \"right_id\": \"1\"\n                },\n                {\n                    \"id\": \"2\",\n                    \"route_id\": \"2\",\n                    \"role_id\": \"2\",\n                    \"right_id\": \"2\"\n                },\n                {\n                    \"id\": \"3\",\n                    \"route_id\": \"3\",\n                    \"role_id\": \"2\",\n                    \"right_id\": \"3\"\n                },\n                {\n                    \"id\": \"4\",\n                    \"route_id\": \"4\",\n                    \"role_id\": \"2\",\n                    \"right_id\": \"4\"\n                },\n                {\n                    \"id\": \"5\",\n                    \"route_id\": \"5\",\n                    \"role_id\": \"2\",\n                    \"right_id\": \"5\"\n                }\n            ]\n        }\n    ]\n}"
                        },
                        "description": "Create a user",
                        "response": []
                    }
                },
                {
                    "name": "{PUT} {user}\/users\/v1\/api\nCurrently this endpoint is only able to change a password and re-enable a disabled user\nPlease note that the User-Access-Token does not have to be the access token for the username\nyou are changing the password for.  It just needs to be a user that has rights to this endpoint.",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/users\/:user",
                            "query": [],
                            "variable": [
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
                                "value": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "6rrfwmLl5IpdEWjVQMEaxb21PG0uHJjAQGKq7zqxY1Qc6"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"new_password\": \"c7X2ItzT1FuJpgB?oorN3HK8nacTygmN\",\n    \"company_roles\": [\n        {\n            \"id\": \"2\",\n            \"company_id\": \"1\",\n            \"role_name\": \"master\",\n            \"active_status\": \"1\"\n        }\n    ],\n    \"active_status\": true\n}"
                        },
                        "description": "Currently there is no way for the User to change their own password if they don't have rights\nto this endpoint.  So you would need to first authenticate with a user who does have rights to change\nthe password.  This could be accomplished by first enabling the default user, authenticating and updating\nthe password.  Then remember to disable the default user.",
                        "response": []
                    }
                },
                {
                    "name": "{DELETE} {user}\/users\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/users\/:user",
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
                                "value": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "6rrfwmLl5IpdEWjVQMEaxb21PG0uHJjAQGKq7zqxY1Qc6"
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
                    "name": "{GET} roles\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/roles",
                            "query": [
                                {
                                    "key": "include_disabled_objects",
                                    "value": "",
                                    "description": "{bool}",
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
                                "value": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "6rrfwmLl5IpdEWjVQMEaxb21PG0uHJjAQGKq7zqxY1Qc6"
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
                    "name": "{POST} roles\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/roles",
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
                                "value": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "6rrfwmLl5IpdEWjVQMEaxb21PG0uHJjAQGKq7zqxY1Qc6"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"Routes_Have_Roles\": [\n        {\n            \"route_id\": \"3\",\n            \"Rights\": {\n                \"get\": true,\n                \"post\": false,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        },\n        {\n            \"route_id\": \"6\",\n            \"Rights\": {\n                \"get\": false,\n                \"post\": true,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        }\n    ],\n    \"role_name\": \"5ea6753c90181\"\n}"
                        },
                        "description": "So a company role is just a company and a name\nHowever, in order to create a company you need to provide\nan array of routes and the associated rights you would like\nwith that route.",
                        "response": []
                    }
                },
                {
                    "name": "{PUT} roles\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/roles\/:role",
                            "query": [],
                            "variable": [
                                {
                                    "id": "role",
                                    "key": "role",
                                    "value": "",
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
                                "value": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "6rrfwmLl5IpdEWjVQMEaxb21PG0uHJjAQGKq7zqxY1Qc6"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"Routes_Have_Roles\": [\n        {\n            \"route_id\": \"3\",\n            \"Rights\": {\n                \"get\": true,\n                \"post\": false,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        },\n        {\n            \"route_id\": \"6\",\n            \"Rights\": {\n                \"get\": false,\n                \"post\": true,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        }\n    ],\n    \"role_name\": \"5ea6753cae679\",\n    \"active_status\": true\n}"
                        },
                        "description": "This will recreate the role with the provided modal\nAnything previous will be deleted so make sure this\nis the complete modal you are expecting",
                        "response": []
                    }
                },
                {
                    "name": "{DELETE} roles\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/roles\/:role",
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
                                    "id": "role",
                                    "key": "role",
                                    "value": "",
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
                                "value": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "6rrfwmLl5IpdEWjVQMEaxb21PG0uHJjAQGKq7zqxY1Qc6"
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
                                    "key": "include_disabled_objects",
                                    "value": "",
                                    "description": "{bool}",
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
                                "value": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN"
                            },
                            {
                                "key": "secret-token",
                                "value": "KydrxxVjcE$ZN=W4UZoI9fp8oeYqOyUEvg3z37WawSlzVjG5"
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
                                "value": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN"
                            },
                            {
                                "key": "secret-token",
                                "value": "KydrxxVjcE$ZN=W4UZoI9fp8oeYqOyUEvg3z37WawSlzVjG5"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"company_name\": \"documentation_company\"\n}"
                        },
                        "description": "This framework doesn't allow a company to do anything unless there is an authorized user making the request.\nSo as part of creating a company this will auto create a master role that has access to all methods on all routes\nIt will also create a user with the username default (recommend disabling after establishing a real person with master credentials)\nMake sure to record the default password upon success, this password is unrecoverable and the company would need to be deleted and recreated",
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
                                "value": "KydrxxVjcE$ZN=W4UZoI9fp8oeYqOyUEvg3z37WawSlzVjG5"
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
                                    "key": "include_disabled_objects",
                                    "value": "1",
                                    "description": "{bool}",
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
                                "value": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN"
                            },
                            {
                                "key": "secret-token",
                                "value": "KydrxxVjcE$ZN=W4UZoI9fp8oeYqOyUEvg3z37WawSlzVjG5"
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
                                "value": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN"
                            },
                            {
                                "key": "secret-token",
                                "value": "KydrxxVjcE$ZN=W4UZoI9fp8oeYqOyUEvg3z37WawSlzVjG5"
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
    -G "https://project.dsfellowship.com/api/v1/routes?include_disabled_objects=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: c7X2ItzT1FuJpgB?oorN3HK8nacTygmN" \
    -H "secret-token: KydrxxVjcE$ZN=W4UZoI9fp8oeYqOyUEvg3z37WawSlzVjG5"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/routes"
);

let params = {
    "include_disabled_objects": "1",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN",
    "secret-token": "KydrxxVjcE$ZN=W4UZoI9fp8oeYqOyUEvg3z37WawSlzVjG5",
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
        "headers": {},
        "original": {
            "message": "Response Objects",
            "Route": {
                "apidoc.json": 9,
                "Create_Company": 5,
                "Create_Role": 12,
                "Create_User": 3,
                "Delete_Role": 13,
                "Delete_User": 10,
                "Edit_Role": 14,
                "Enable_Default_User": 11,
                "List_Companies": 4,
                "List_Roles": 6,
                "List_Routes": 8,
                "List_Users": 2,
                "Update_User": 7,
                "User_Signin": 1,
                "User_Signout": 15
            }
        },
        "exception": null
    }
}
```

### HTTP Request
`GET api/v1/routes`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `include_disabled_objects` |  required  | {bool}

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
    -H "client-id: c7X2ItzT1FuJpgB?oorN3HK8nacTygmN" \
    -H "secret-token: KydrxxVjcE$ZN=W4UZoI9fp8oeYqOyUEvg3z37WawSlzVjG5"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/default_user/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN",
    "secret-token": "KydrxxVjcE$ZN=W4UZoI9fp8oeYqOyUEvg3z37WawSlzVjG5",
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
        "project_name": "project2",
        "active_status": 1
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


