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

Welcome to the JRTS Solutions platform.  Please contact jbirch88655@gmail.com to get a client id and secret token to make requests

<!-- END_INFO -->

#Authentication

Requesting an End User Access Token for authenticating future requests
<!-- START_3cb60164618dd6dfd435f39ac4ef6402 -->
## api/v1/{company_id}/signin
> Example request:

```bash
curl -X POST \
    "https://project.dsfellowship.com/api/v1/1/signin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: kBfFF9COlHfnnXfX4O7b27dBxDO9lm3z" \
    -H "secret-token: AhrTwTY3JcOClfqOXGXd4YNObtm8sXcYrUIUsuEJrvqmCy3i" \
    -d '{"username":"project2","password":"FlgFFgl&nl@hhg@hg&"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/signin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "kBfFF9COlHfnnXfX4O7b27dBxDO9lm3z",
    "secret-token": "AhrTwTY3JcOClfqOXGXd4YNObtm8sXcYrUIUsuEJrvqmCy3i",
};

let body = {
    "username": "project2",
    "password": "FlgFFgl&nl@hhg@hg&"
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
    "session_token": "6H0pMCbinT.9nV48T$gQ6I0pbA+cjLa=T+fl=8=HQ=M87",
    "expires": {
        "date": "2020-03-31 23:32:22.000000",
        "timezone_type": 3,
        "timezone": "UTC"
    },
    "user": {
        "id": "1",
        "username": "project2",
        "company_id": "1",
        "project_name": "project2",
        "active_status": "1"
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
## api/v1/{company_id}/Users
> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/1/Users?only_active=true" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: kBfFF9COlHfnnXfX4O7b27dBxDO9lm3z"
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
    "client-id": "kBfFF9COlHfnnXfX4O7b27dBxDO9lm3z",
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
                "username": "project2",
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

#Tools


<!-- START_cd4a874127cd23508641c63b640ee838 -->
## doc.json
> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/doc.json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/doc.json"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
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
        "_postman_id": "e68f5e95-cfac-49a2-b10a-58c06482ee0c",
        "description": "",
        "schema": "https:\/\/schema.getpostman.com\/json\/collection\/v2.0.0\/collection.json"
    },
    "item": [
        {
            "name": "Authentication",
            "description": "Requesting an End User Access Token for authenticating future requests",
            "item": [
                {
                    "name": "api\/v1\/{company}\/signin",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/:company\/signin",
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
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"user_name\": \"magnam\",\n    \"password\": \"quia\"\n}"
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


