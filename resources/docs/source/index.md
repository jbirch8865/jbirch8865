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
<!-- START_2cb38f1f812a602469c22d7858e3f5a2 -->
## api/v1/{company}/signin
> Example request:

```bash
curl -X POST \
    "https://project.dsfellowship.com/api/v1/1/signin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization-Token: kBfFF9COlHfnnXfX4O7b27dBxDO9lm3z" \
    -H "Secret-Token: AhrTwTY3JcOClfqOXGXd4YNObtm8sXcYrUIUsuEJrvqmCy3i" \
    -d '{"user_name":"project2","plain_text_password":"FlgFFgl&nl@hhg@hg&"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/signin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization-Token": "kBfFF9COlHfnnXfX4O7b27dBxDO9lm3z",
    "Secret-Token": "AhrTwTY3JcOClfqOXGXd4YNObtm8sXcYrUIUsuEJrvqmCy3i",
};

let body = {
    "user_name": "project2",
    "plain_text_password": "FlgFFgl&nl@hhg@hg&"
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
    "session_token": "Jr0TC0BzG9$4j?CtkUfywWb.2FWEj?M21XN==216Ui8Zn",
    "expires": {
        "date": "2020-03-31 16:32:44.000000",
        "timezone_type": 3,
        "timezone": "UTC"
    }
}
```

### HTTP Request
`POST api/v1/{company}/signin`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `company_id` |  required  | The ID of the organization
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `user_name` | string |  required  | 
        `plain_text_password` | string |  required  | 
    
<!-- END_2cb38f1f812a602469c22d7858e3f5a2 -->

#Company

Basic CRUD operations for Companies, Company Configs and Users
<!-- START_184e047bad4015900de0f043d91a1177 -->
## api/v1/{company}/Users
> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/1/Users?only_active=true" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization-Token: kBfFF9COlHfnnXfX4O7b27dBxDO9lm3z"
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
    "Authorization-Token": "kBfFF9COlHfnnXfX4O7b27dBxDO9lm3z",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (422):

```json
{
    "message": "The Secret header with secret Secret-Token is required."
}
```

### HTTP Request
`GET api/v1/{company}/Users`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `company_id` |  required  | The ID of the organization
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `only_active` |  optional  | if set will only return active users

<!-- END_184e047bad4015900de0f043d91a1177 -->

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
                            "raw": "{\n    \"user_name\": \"magnam\",\n    \"plain_text_password\": \"quia\"\n}"
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


