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
        "access_token": "41T$3YBaYDR?P0NSSIZ$ibf0Mg+DJM?0$a3yxV$FGaO55",
        "user_id": "1",
        "experation_timestamp": "2020-04-24 23:06:32"
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
    -H "secret-token: KydrxxVjcE$ZN=W4UZoI9fp8oeYqOyUEvg3z37WawSlzVjG5"
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
    "secret-token": "KydrxxVjcE$ZN=W4UZoI9fp8oeYqOyUEvg3z37WawSlzVjG5",
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
        "access_token": "$8n9fN.AlNIJO2iH?6WtZ=+x3TAD$2SmaIchDbdwINQ0Z",
        "user_id": "1",
        "experation_timestamp": "2020-04-24 22:56:33"
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
    -H "client-id: c7X2ItzT1FuJpgB?oorN3HK8nacTygmN" \
    -H "User-Access-Token: 0=tPalb2da45ih6xOyMnFqtJ9CQr$+vT3ESLX6GiOu75="
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
    "client-id": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN",
    "User-Access-Token": "0=tPalb2da45ih6xOyMnFqtJ9CQr$+vT3ESLX6GiOu75=",
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
    -H "client-id: c7X2ItzT1FuJpgB?oorN3HK8nacTygmN" \
    -H "User-Access-Token: 7anfPxsoPuFT6FNAZABg0tgcZb9Dfpx6Mx3=eFcCp4m9Y" \
    -d '{"user":"new_user","password":"c7X2ItzT1FuJpgB?oorN3HK8nacTygmN","company_roles":[{"id":"2","company_id":"1","role_name":"master","active_status":"1","Users_Have_Roles":[{"id":"2","user_id":"1","role_id":"2"}],"Routes_Have_Roles":[{"id":"1","route_id":"1","role_id":"2","right_id":"1"},{"id":"2","route_id":"2","role_id":"2","right_id":"2"},{"id":"3","route_id":"3","role_id":"2","right_id":"3"},{"id":"4","route_id":"4","role_id":"2","right_id":"4"},{"id":"5","route_id":"5","role_id":"2","right_id":"5"}]}]}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN",
    "User-Access-Token": "7anfPxsoPuFT6FNAZABg0tgcZb9Dfpx6Mx3=eFcCp4m9Y",
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
        "id": 17,
        "username": "new_user",
        "company_id": 1,
        "project_name": "project2",
        "active_status": 1
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
        `company_roles` | array |  required  | {array}
    
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
    -H "client-id: c7X2ItzT1FuJpgB?oorN3HK8nacTygmN" \
    -H "User-Access-Token: $8n9fN.AlNIJO2iH?6WtZ=+x3TAD$2SmaIchDbdwINQ0Z" \
    -d '{"new_password":"c7X2ItzT1FuJpgB?oorN3HK8nacTygmN","company_roles":[{"id":"2","company_id":"1","role_name":"master","active_status":"1"}],"active_status":true}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/users/new_user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN",
    "User-Access-Token": "$8n9fN.AlNIJO2iH?6WtZ=+x3TAD$2SmaIchDbdwINQ0Z",
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
        "id": "17",
        "username": "new_user",
        "company_id": "1",
        "project_name": "project2",
        "active_status": 1
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
        `company_roles` | array |  required  | {array}
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
    -H "client-id: c7X2ItzT1FuJpgB?oorN3HK8nacTygmN" \
    -H "User-Access-Token: a5l.Tk59QMPWLzJVr5j1SzJis6TdTh7O=1g1j8S2P?DO3"
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
    "client-id": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN",
    "User-Access-Token": "a5l.Tk59QMPWLzJVr5j1SzJis6TdTh7O=1g1j8S2P?DO3",
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
        "id": "17",
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
    -H "client-id: c7X2ItzT1FuJpgB?oorN3HK8nacTygmN" \
    -H "User-Access-Token: 3+Cp6q0+X8rgYQ2OJ$74kHyuTui4yWfYy0X8GwFsUq3Wx"
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
    "client-id": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN",
    "User-Access-Token": "3+Cp6q0+X8rgYQ2OJ$74kHyuTui4yWfYy0X8GwFsUq3Wx",
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
        "5ea36887b113d": {
            "id": "15",
            "company_id": "1",
            "role_name": "5ea36887b113d",
            "active_status": "0",
            "Routes_Have_Roles": [
                {
                    "id": "112",
                    "route_id": "12",
                    "role_id": "15",
                    "right_id": "112"
                },
                {
                    "id": "113",
                    "route_id": "3",
                    "role_id": "15",
                    "right_id": "113"
                },
                {
                    "id": "114",
                    "route_id": "13",
                    "role_id": "15",
                    "right_id": "114"
                },
                {
                    "id": "115",
                    "route_id": "10",
                    "role_id": "15",
                    "right_id": "115"
                },
                {
                    "id": "116",
                    "route_id": "14",
                    "role_id": "15",
                    "right_id": "116"
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
        "5ea36a0c5e6fb": {
            "id": "17",
            "company_id": "1",
            "role_name": "5ea36a0c5e6fb",
            "active_status": "0",
            "Routes_Have_Roles": [
                {
                    "id": "128",
                    "route_id": "12",
                    "role_id": "17",
                    "right_id": "128"
                },
                {
                    "id": "129",
                    "route_id": "3",
                    "role_id": "17",
                    "right_id": "129"
                },
                {
                    "id": "130",
                    "route_id": "13",
                    "role_id": "17",
                    "right_id": "130"
                },
                {
                    "id": "131",
                    "route_id": "10",
                    "role_id": "17",
                    "right_id": "131"
                },
                {
                    "id": "132",
                    "route_id": "14",
                    "role_id": "17",
                    "right_id": "132"
                }
            ]
        },
        "5ea36acf7e951": {
            "id": "18",
            "company_id": "1",
            "role_name": "5ea36acf7e951",
            "active_status": "0",
            "Routes_Have_Roles": [
                {
                    "id": "136",
                    "route_id": "12",
                    "role_id": "18",
                    "right_id": "136"
                },
                {
                    "id": "137",
                    "route_id": "3",
                    "role_id": "18",
                    "right_id": "137"
                },
                {
                    "id": "138",
                    "route_id": "13",
                    "role_id": "18",
                    "right_id": "138"
                },
                {
                    "id": "139",
                    "route_id": "10",
                    "role_id": "18",
                    "right_id": "139"
                },
                {
                    "id": "140",
                    "route_id": "14",
                    "role_id": "18",
                    "right_id": "140"
                }
            ]
        },
        "5ea36da305350": {
            "id": "20",
            "company_id": "1",
            "role_name": "5ea36da305350",
            "active_status": "0",
            "Routes_Have_Roles": [
                {
                    "id": "152",
                    "route_id": "12",
                    "role_id": "20",
                    "right_id": "152"
                },
                {
                    "id": "153",
                    "route_id": "3",
                    "role_id": "20",
                    "right_id": "153"
                },
                {
                    "id": "154",
                    "route_id": "13",
                    "role_id": "20",
                    "right_id": "154"
                },
                {
                    "id": "155",
                    "route_id": "10",
                    "role_id": "20",
                    "right_id": "155"
                },
                {
                    "id": "156",
                    "route_id": "14",
                    "role_id": "20",
                    "right_id": "156"
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
    -H "client-id: c7X2ItzT1FuJpgB?oorN3HK8nacTygmN" \
    -H "User-Access-Token: 5F9aOFFcVcROIvb1B.ynHqy66mXpoIxCJnLzwUKfGQF5F" \
    -d '{"Routes_Have_Roles":[{"route_id":"3","Rights":{"get":true,"post":false,"patch":false,"put":false,"destroy":false}},{"route_id":"6","Rights":{"get":false,"post":true,"patch":false,"put":false,"destroy":false}}],"role_name":"5ea36fce63be3"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/roles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN",
    "User-Access-Token": "5F9aOFFcVcROIvb1B.ynHqy66mXpoIxCJnLzwUKfGQF5F",
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
    "role_name": "5ea36fce63be3"
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
        "id": "26",
        "company_id": "1",
        "role_name": "5ea36fce63be3",
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
    "https://project.dsfellowship.com/api/v1/1/roles/26" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: c7X2ItzT1FuJpgB?oorN3HK8nacTygmN" \
    -H "User-Access-Token: 9jKoPSr+qVMt7m9LFYdCy6m1Q9O7ZI4Y7ncsaRxF0ARH1" \
    -d '{"Routes_Have_Roles":[{"route_id":"3","Rights":{"get":true,"post":false,"patch":false,"put":false,"destroy":false}},{"route_id":"6","Rights":{"get":false,"post":true,"patch":false,"put":false,"destroy":false}}],"role_name":"5ea36fcee799d","active_status":true}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/roles/26"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN",
    "User-Access-Token": "9jKoPSr+qVMt7m9LFYdCy6m1Q9O7ZI4Y7ncsaRxF0ARH1",
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
    "role_name": "5ea36fcee799d",
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
        "id": "26",
        "company_id": "1",
        "role_name": "5ea36fcee799d",
        "active_status": 1
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
    "https://project.dsfellowship.com/api/v1/1/roles/26?active_status=" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: c7X2ItzT1FuJpgB?oorN3HK8nacTygmN" \
    -H "User-Access-Token: 6X0kdjNyH4Ohe4kjZfNROP9Hnk.co0x7SDs78nR3yEXYf"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/roles/26"
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
    "User-Access-Token": "6X0kdjNyH4Ohe4kjZfNROP9Hnk.co0x7SDs78nR3yEXYf",
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
    "master_password": "O9QuL9pgDhm5TU",
    "company": {
        "id": 18,
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

<!-- START_3325a7e1462036041b5bb9084e516f11 -->
## {GET} companies/v1/api
List all companies

> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/companies?include_disabled=true&include_details=2&details_offset=0&details_limit=5&offset=0&limit=10&active_status=" \
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
    "active_status": "",
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
        "documentation_company": {
            "id": "18",
            "company_name": "documentation_company",
            "active_status": "1",
            "Company_Configs": [
                {
                    "id": "16",
                    "company_id": "18",
                    "config_id": "1",
                    "config_value": "UTC",
                    "active_status": "1"
                },
                {
                    "id": "15",
                    "company_id": "18",
                    "config_id": "2",
                    "config_value": "300",
                    "active_status": "1"
                }
            ],
            "Company_Roles": [
                {
                    "id": "27",
                    "company_id": "18",
                    "role_name": "master",
                    "active_status": "1",
                    "Users_Have_Roles": [
                        {
                            "id": "32",
                            "user_id": "18",
                            "role_id": "27"
                        }
                    ],
                    "Routes_Have_Roles": [
                        {
                            "id": "208",
                            "route_id": "12",
                            "role_id": "27",
                            "right_id": "208"
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
        "_postman_id": "f035d501-984d-42f8-b867-15606e20c3ce",
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
                                "value": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "X?+jojLXcSRT0ODEd.G0EntwfqWQtyrN$Gsm13YDPvemb"
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
                                "value": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "9b=4JK.b7ewI20kSMsC5gRXXZa6j8B0?$M4G2x1IVh3xZ"
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
                                "value": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "pOL8kzo2Ws7LC9VmYMyf$mzpfY$IqBpmIhaDKN+Vk9bZe"
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
                                "value": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "Tn8zxq5rrnK.cxgPmNuJKN1gSs?bRq.qUOEX78g9Ukc8F"
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
                                "value": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "wXChRarYd0bCGSteyfzjZYLo69zhoWaWglB?M6ukVkDcF"
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
                                "value": "c7X2ItzT1FuJpgB?oorN3HK8nacTygmN"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "EZIXSfYS+bN3cjJSZUWpivCkB4TfiyYCqFkbD6ewZRK.f"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"Routes_Have_Roles\": [\n        {\n            \"route_id\": \"3\",\n            \"Rights\": {\n                \"get\": true,\n                \"post\": false,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        },\n        {\n            \"route_id\": \"6\",\n            \"Rights\": {\n                \"get\": false,\n                \"post\": true,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        }\n    ],\n    \"role_name\": \"5ea36fc51ce23\"\n}"
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
                                    "value": "24",
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
                                "value": "g6cWZtiFL5=8wo$kZXxgg4siM$KIxshcN+VdfF+CxC$tF"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"Routes_Have_Roles\": [\n        {\n            \"route_id\": \"3\",\n            \"Rights\": {\n                \"get\": true,\n                \"post\": false,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        },\n        {\n            \"route_id\": \"6\",\n            \"Rights\": {\n                \"get\": false,\n                \"post\": true,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        }\n    ],\n    \"role_name\": \"5ea36fc58e326\",\n    \"active_status\": true\n}"
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
                                    "value": "24",
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
                                "value": "6H?2X=3FXssjcP3edHa8yhbh.rP05z87tIuQD49ys+Vf$"
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
    -G "https://project.dsfellowship.com/api/v1/routes?active_status=1" \
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
    "active_status": "1",
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


