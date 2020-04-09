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
    -H "User-Access-Token: VFPgwBsV2z5Pq1LLpbc1la4.gVlEe4Be8XugGBhRlcVyC" \
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
    "User-Access-Token": "VFPgwBsV2z5Pq1LLpbc1la4.gVlEe4Be8XugGBhRlcVyC",
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
        "access_token": "QLiRhnQX3fuOKvt0HfC=3LWLnHeJp4.owpoT1XWMNhLI7",
        "user_id": "221",
        "experation_timestamp": "2020-04-09 04:44:01",
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
    -G "https://project.dsfellowship.com/api/v1/1/Users?include_disabled=true&offset=0&limit=2" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: Q8NfiyrBUzoXAl?1PYVzBv3jc$Nk1ZMV" \
    -H "User-Access-Token: dofCEp0FTnPKlz$S?$.tZ3v4C$c9eJ=f3ck1nWYO0qTnY"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/Users"
);

let params = {
    "include_disabled": "true",
    "offset": "0",
    "limit": "2",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "Q8NfiyrBUzoXAl?1PYVzBv3jc$Nk1ZMV",
    "User-Access-Token": "dofCEp0FTnPKlz$S?$.tZ3v4C$c9eJ=f3ck1nWYO0qTnY",
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
            },
            {
                "id": "235",
                "username": "default_2",
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
    `include_disabled` |  optional  | if set will only return active users
    `offset` |  optional  | a number between 0 and infinite that represents which object to start with default is 0
    `limit` |  optional  | a number between 1 and 100 representing the number of records to return after the offset default is 50

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
    -H "User-Access-Token: HJwhY5im0jJSt2UxOLXOFvspNRVc.Nc+u6o8x=m4.1j7f" \
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
    "User-Access-Token": "HJwhY5im0jJSt2UxOLXOFvspNRVc.Nc+u6o8x=m4.1j7f",
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
    "master_password": "TuQdqC=wpCT6oy",
    "company": {
        "company_name": "documentation_company",
        "Company_Configs": [
            {
                "id": "340",
                "company_id": "1015",
                "config_id": "3",
                "config_value": "UTC",
                "active_status": "1",
                "Companies": {
                    "id": "1015",
                    "company_name": "documentation_company",
                    "active_status": "1"
                },
                "Configs": {
                    "id": "3",
                    "active_status": "1",
                    "config_name": "company_time_zone",
                    "default_value": "UTC"
                }
            }
        ],
        "Company_Roles": [
            {
                "id": "201",
                "company_id": "1015",
                "active_status": "1",
                "role_name": "master",
                "Companies": {
                    "id": "1015",
                    "company_name": "documentation_company",
                    "active_status": "1"
                },
                "Users_Have_Roles": [
                    {
                        "id": "273",
                        "user_id": "238",
                        "role_id": "201"
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

<!-- START_8060c49b9883262b12e22f0571825e95 -->
## {GET} app/v1/Companies
List all companies

> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/Companies?include_disabled=true&include_details=2&details_offset=0&details_limit=1&offset=0&limit=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: Q8NfiyrBUzoXAl?1PYVzBv3jc$Nk1ZMV" \
    -H "Secret-Token: P.N?KqJXK4CT54QuW4H2eWU+guM4Q2KtPx0JuFIAAzsPtbzj"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/Companies"
);

let params = {
    "include_disabled": "true",
    "include_details": "2",
    "details_offset": "0",
    "details_limit": "1",
    "offset": "0",
    "limit": "1",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "Q8NfiyrBUzoXAl?1PYVzBv3jc$Nk1ZMV",
    "Secret-Token": "P.N?KqJXK4CT54QuW4H2eWU+guM4Q2KtPx0JuFIAAzsPtbzj",
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
    "message": "List of Current Companies",
    "Companies": {
        "documentation_company": {
            "id": "1015",
            "company_name": "documentation_company",
            "active_status": "1",
            "Company_Configs": [
                {
                    "id": "340",
                    "company_id": "1015",
                    "config_id": "3",
                    "config_value": "UTC",
                    "active_status": "1",
                    "Companies": {
                        "id": "1015",
                        "company_name": "documentation_company",
                        "active_status": "1"
                    },
                    "Configs": {
                        "id": "3",
                        "active_status": "1",
                        "config_name": "company_time_zone",
                        "default_value": "UTC"
                    }
                }
            ],
            "Company_Roles": [
                {
                    "id": "201",
                    "company_id": "1015",
                    "active_status": "1",
                    "role_name": "master",
                    "Companies": {
                        "id": "1015",
                        "company_name": "documentation_company",
                        "active_status": "1"
                    },
                    "Users_Have_Roles": [
                        {
                            "id": "273",
                            "user_id": "238",
                            "role_id": "201"
                        }
                    ]
                }
            ]
        }
    }
}
```

### HTTP Request
`GET api/v1/Companies`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `company` |  required  | The ID of the organization
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `include_disabled` |  optional  | if set will only return active companies
    `include_details` |  optional  | is a number between 0 and 5 which will return the entire object to the depth you specified default is disabled
    `details_offset` |  optional  | a number between 0 and infinite that represents which object to start with for objects relating to Companies default is 0
    `details_limit` |  optional  | a number between 1 and 25 representing the number of records to return after the offset for related objects default is 1
    `offset` |  optional  | a number between 0 and infinite that represents which object to start with default is 0
    `limit` |  optional  | a number between 1 and 100 representing the number of records to return after the offset default is 50

<!-- END_8060c49b9883262b12e22f0571825e95 -->

#Tools


<!-- START_cd4a874127cd23508641c63b640ee838 -->
## doc.json
> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/doc.json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "User-Access-Token: Q13TQwW0q2VydmYUeTj7ywNCh1c?ckFt64VoTOHq7?k7y"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/doc.json"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "User-Access-Token": "Q13TQwW0q2VydmYUeTj7ywNCh1c?ckFt64VoTOHq7?k7y",
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


