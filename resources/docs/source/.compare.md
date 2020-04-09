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

<!-- END_INFO -->

#Authentication

Requesting an End User Access Token for authenticating future requests
<!-- START_3cb60164618dd6dfd435f39ac4ef6402 -->
## {POST} api/v1/{company_id}/Signin

Returns a unique access_token used to authenticate in place of the username and password
The access_token experation date is based on the company_config session_timeout which is comany specific

> Example request:

```bash
curl -X POST \
    "https://project.dsfellowship.com/api/v1/1/signin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: Q8NfiyrBUzoXAl?1PYVzBv3jc$Nk1ZMV" \
    -H "Secret-Token: P.N?KqJXK4CT54QuW4H2eWU+guM4Q2KtPx0JuFIAAzsPtbzj" \
    -H "User-Access-Token: J+V53FP3bqpSKlrRKbm09rw16tYd9hlRSB.PzLA??s8DS" \
    -d '{"username":"default","password":"Q8NfiyrBUzoXAl?1PYVzBv3jc$Nk1ZMV"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/signin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "Q8NfiyrBUzoXAl?1PYVzBv3jc$Nk1ZMV",
    "Secret-Token": "P.N?KqJXK4CT54QuW4H2eWU+guM4Q2KtPx0JuFIAAzsPtbzj",
    "User-Access-Token": "J+V53FP3bqpSKlrRKbm09rw16tYd9hlRSB.PzLA??s8DS",
};

let body = {
    "username": "default",
    "password": "Q8NfiyrBUzoXAl?1PYVzBv3jc$Nk1ZMV"
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
        "id": "92",
        "client_id": "Q8NfiyrBUzoXAl?1PYVzBv3jc$Nk1ZMV",
        "access_token": "+ZyYTsMl$BPuSePuEcqepOr03sP5S3R3lslyIobJU9dxr",
        "user_id": "221",
        "experation_timestamp": "2020-04-09 03:13:02",
        "Users_Have_Roles": [
            {
                "id": "262",
                "user_id": "221",
                "role_id": "190",
                "Company_Roles": {
                    "id": "190",
                    "company_id": "1",
                    "active_status": "1",
                    "role_name": "master",
                    "Companies": {
                        "id": "1",
                        "company_name": "System",
                        "active_status": "1",
                        "Company_Configs": [
                            {
                                "id": "314",
                                "company_id": "1",
                                "config_id": "3",
                                "config_value": "UTC",
                                "active_status": "1"
                            },
                            {
                                "id": "313",
                                "company_id": "1",
                                "config_id": "4",
                                "config_value": "300",
                                "active_status": "1"
                            }
                        ],
                        "Company_Roles": [
                            {
                                "id": "190",
                                "company_id": "1",
                                "active_status": "1",
                                "role_name": "master"
                            }
                        ]
                    },
                    "Users_Have_Roles": [
                        {
                            "id": "262",
                            "user_id": "221",
                            "role_id": "190",
                            "Company_Roles": {
                                "id": "190",
                                "company_id": "1",
                                "active_status": "1",
                                "role_name": "master"
                            }
                        }
                    ]
                }
            }
        ]
    }
}
```

### HTTP Request
`POST api/v1/{company_id}/signin`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `company` |  required  | The ID of the organization
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `username` | string |  required  | 
        `password` | string |  required  | 
    
<!-- END_3cb60164618dd6dfd435f39ac4ef6402 -->

#Company

Basic CRUD operations for Companies, Company Configs and Users
<!-- START_81fc4121563abd0a0a65cb26f4a0a066 -->
## {GET} api/v1/{company_id}/Users
Return a list of users belonging to the company

> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/1/Users?only_active=true" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: Q8NfiyrBUzoXAl?1PYVzBv3jc$Nk1ZMV" \
    -H "User-Access-Token: hY1TsDwzfo6L$e5G.5=jzuwo7oaqVt6w4zyJZ??US0WwC"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/Users"
);

let params = {
    "only_active": "true",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "Q8NfiyrBUzoXAl?1PYVzBv3jc$Nk1ZMV",
    "User-Access-Token": "hY1TsDwzfo6L$e5G.5=jzuwo7oaqVt6w4zyJZ??US0WwC",
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
        "Users": [
            {
                "id": "221",
                "username": "default",
                "active_status": true
            }
        ]
    }
}
```

### HTTP Request
`GET api/v1/{company_id}/Users`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `company` |  required  | The ID of the organization
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `only_active` |  optional  | if set will only return active users

<!-- END_81fc4121563abd0a0a65cb26f4a0a066 -->

<!-- START_228e9e1a1b5016f6a5e604abba80c2d9 -->
## {POST} api/v1/{company_id}/User

Create a user

> Example request:

```bash
curl -X POST \
    "https://project.dsfellowship.com/api/v1/1/User" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: Q8NfiyrBUzoXAl?1PYVzBv3jc$Nk1ZMV" \
    -H "User-Access-Token: NHjOtgk=kYRHXByjLKjipl0JOIeB5IjsGg=MB=ZUihG1H" \
    -d '{"username":"default","password":"Q8NfiyrBUzoXAl?1PYVzBv3jc$Nk1ZMV"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/User"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "Q8NfiyrBUzoXAl?1PYVzBv3jc$Nk1ZMV",
    "User-Access-Token": "NHjOtgk=kYRHXByjLKjipl0JOIeB5IjsGg=MB=ZUihG1H",
};

let body = {
    "username": "default",
    "password": "Q8NfiyrBUzoXAl?1PYVzBv3jc$Nk1ZMV"
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
        "id": "221",
        "username": "default",
        "company_id": "1",
        "project_name": "project2",
        "active_status": "1",
        "Companies": {
            "id": "1",
            "company_name": "System",
            "active_status": "1"
        }
    }
}
```

### HTTP Request
`POST api/v1/{company_id}/User`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `company` |  required  | The ID of the organization
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `username` | string |  required  | 
        `password` | string |  required  | 
    
<!-- END_228e9e1a1b5016f6a5e604abba80c2d9 -->

<!-- START_523a394728ab8a79e82878761dcb790f -->
## {POST} api/v1/Company

This framework doesn't allow a company to do anything unless there is an authorized user making the request.
So as part of creating a company this will auto create a master role that has access to all methods on all routes
It will also create a user with the username default (recommend disabling after establishing a real person with master credentials)
Make sure to record the default password upon success, this password is unrecoverable and the company would need to be deleted and recreated

> Example request:

```bash
curl -X POST \
    "https://project.dsfellowship.com/api/v1/Company" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: Q8NfiyrBUzoXAl?1PYVzBv3jc$Nk1ZMV" \
    -H "Secret-Token: P.N?KqJXK4CT54QuW4H2eWU+guM4Q2KtPx0JuFIAAzsPtbzj" \
    -d '{"company_name":"documentation_company"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/Company"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "Q8NfiyrBUzoXAl?1PYVzBv3jc$Nk1ZMV",
    "Secret-Token": "P.N?KqJXK4CT54QuW4H2eWU+guM4Q2KtPx0JuFIAAzsPtbzj",
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
    "master_password": "2aVU?tf.kc=NI8",
    "company": {
        "company_name": "documentation_company",
        "Company_Configs": [
            {
                "id": "322",
                "company_id": "1006",
                "config_id": "3",
                "config_value": "UTC",
                "active_status": "1",
                "Companies": {
                    "id": "1006",
                    "company_name": "documentation_company",
                    "active_status": "1"
                },
                "Configs": {
                    "id": "3",
                    "active_status": "1",
                    "config_name": "company_time_zone",
                    "default_value": "UTC"
                }
            },
            {
                "id": "321",
                "company_id": "1006",
                "config_id": "4",
                "config_value": "300",
                "active_status": "1",
                "Companies": {
                    "id": "1006",
                    "company_name": "documentation_company",
                    "active_status": "1"
                },
                "Configs": {
                    "id": "4",
                    "active_status": "1",
                    "config_name": "session_time_limit",
                    "default_value": "300"
                }
            }
        ],
        "Company_Roles": [
            {
                "id": "192",
                "company_id": "1006",
                "active_status": "1",
                "role_name": "master",
                "Companies": {
                    "id": "1006",
                    "company_name": "documentation_company",
                    "active_status": "1"
                },
                "Users_Have_Roles": [
                    {
                        "id": "264",
                        "user_id": "228",
                        "role_id": "192"
                    }
                ]
            }
        ]
    }
}
```

### HTTP Request
`POST api/v1/Company`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `company` |  required  | The ID of the organization
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `company_name` | string |  required  | 
    
<!-- END_523a394728ab8a79e82878761dcb790f -->

#Tools


<!-- START_cd4a874127cd23508641c63b640ee838 -->
## doc.json
> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/doc.json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "User-Access-Token: i23uSOaz9DXlrBMn8eSgBAv2GEz394yPWuGy0TgGLrm09"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/doc.json"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "User-Access-Token": "i23uSOaz9DXlrBMn8eSgBAv2GEz394yPWuGy0TgGLrm09",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET doc.json`


<!-- END_cd4a874127cd23508641c63b640ee838 -->


