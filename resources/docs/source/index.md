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
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "secret-token: HR1O3+JO.8fUGBTR24NR1YQYSw9UtFOdos?zXdpa$ZFs+ra8" \
    -H "Content-Type: application/json" \
    -d '{"user":"default","password":"1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/signin"
);

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "secret-token": "HR1O3+JO.8fUGBTR24NR1YQYSw9UtFOdos?zXdpa$ZFs+ra8",
    "Content-Type": "application/json",
};

let body = {
    "user": "default",
    "password": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
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
        "client_id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
        "access_token": "=gNVMLxJOOPn=TDiz9?h=S$04tEj4UGLlV0sOO2PMBJyI",
        "user_id": "1",
        "experation_timestamp": "2020-05-10 06:40:51"
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

<!-- START_3e883aa0827947fa4757edb61b41430d -->
## {DELETE} {user}/signin/{company}/v1/api

> Example request:

```bash
curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/companies/1/signin/default?active_status=" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/companies/1/signin/default"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
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
        "client_id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
        "access_token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
        "user_id": "1",
        "experation_timestamp": "2020-05-10 06:31:10"
    }
}
```

### HTTP Request
`DELETE api/v1/companies/{company}/signin/{signin}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `company` |  required  | {integer} The ID of the organization
    `signin` |  required  | {string}
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `active_status` |  required  | {bool} When true object will be marked inactive.  When false the object will be deleted.

<!-- END_3e883aa0827947fa4757edb61b41430d -->

#CDM


<!-- START_c3b1501f26d96b9bd4056f1aee29bb63 -->
## {GET} employees/v1/api

> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/employees?include_disabled_objects=&include_details=2&details_offset=0&details_limit=5&limit=10&offset=0" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/employees"
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
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
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
    "Employee": []
}
```

### HTTP Request
`GET api/v1/employees`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `include_disabled_objects` |  optional  | {bool}
    `include_details` |  optional  | {int} Include the entire object model of the object.  If set the integer determines how many levels deep you want to return for related objects.
    `details_offset` |  optional  | {int} If include_details is false this is ignored.  For related objects which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.
    `details_limit` |  optional  | {int} If include_details is false this is ignored.  For related objects how many do you want to return. Must be a number between 1 and 25.
    `limit` |  optional  | {int} How many objects do you want to return. Must be a number between 1 and 100.
    `offset` |  optional  | {int} Which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.

<!-- END_c3b1501f26d96b9bd4056f1aee29bb63 -->

<!-- START_76b5bb081b7655196b60780d41943e4e -->
## {POST} employees/v1/api

> Example request:

```bash
curl -X POST \
    "https://project.dsfellowship.com/api/v1/employees" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe" \
    -H "Content-Type: application/json" \
    -d '{"first_name":"Bob","last_name":"Grillman","title":"The Builder","description":"Amazing Biceps","email":"Bob@amazingbiceps.com"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/employees"
);

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
};

let body = {
    "first_name": "Bob",
    "last_name": "Grillman",
    "title": "The Builder",
    "description": "Amazing Biceps",
    "email": "Bob@amazingbiceps.com"
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
    "message": "Employee Created",
    "Employee": {
        "id": 11,
        "first_name": "Bob",
        "last_name": "Grillman",
        "title": "The Builder",
        "email": "Bob@amazingbiceps.com",
        "description": "Amazing Biceps",
        "active_status": 1,
        "company_id": 1
    }
}
```

### HTTP Request
`POST api/v1/employees`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `first_name` | string |  required  | {string}
        `last_name` | string |  required  | {string}
        `title` | string |  optional  | {string}
        `description` | string |  optional  | {string}
        `email` | string |  optional  | {string}
    
<!-- END_76b5bb081b7655196b60780d41943e4e -->

<!-- START_4ae2add2ef264683a8a9e6ab16bae2f3 -->
## {POST} creditstatuses/v1/api

> Example request:

```bash
curl -X POST \
    "https://project.dsfellowship.com/api/v1/creditstatuses" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe" \
    -H "Content-Type: application/json" \
    -d '{"name":"Good"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/creditstatuses"
);

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
};

let body = {
    "name": "Good"
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
    "message": "Credit_Status Created",
    "Credit_Status": {
        "id": 11,
        "credit_status_name": "Good",
        "company_id": 1,
        "active_status": 1
    }
}
```

### HTTP Request
`POST api/v1/creditstatuses`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | {string}
    
<!-- END_4ae2add2ef264683a8a9e6ab16bae2f3 -->

<!-- START_81005cc50aac34cd5507d224bfe2fdfb -->
## {GET} creditstatuses/v1/api

> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/creditstatuses?include_disabled_objects=&include_details=2&details_offset=0&details_limit=5&limit=10&offset=0" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/creditstatuses"
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
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
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
    "Credit_Status": {
        "Good 80 - 2": {
            "id": "2",
            "credit_status_name": "Good 80",
            "company_id": "1",
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
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ],
                "Credit_Statuses": [
                    {
                        "id": "2",
                        "credit_status_name": "Good 80",
                        "company_id": "1",
                        "active_status": "1"
                    }
                ]
            }
        },
        "Good 80 - 3": {
            "id": "3",
            "credit_status_name": "Good 80",
            "company_id": "1",
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
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ],
                "Credit_Statuses": [
                    {
                        "id": "2",
                        "credit_status_name": "Good 80",
                        "company_id": "1",
                        "active_status": "1"
                    }
                ]
            }
        },
        "Good 80 - 4": {
            "id": "4",
            "credit_status_name": "Good 80",
            "company_id": "1",
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
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ],
                "Credit_Statuses": [
                    {
                        "id": "2",
                        "credit_status_name": "Good 80",
                        "company_id": "1",
                        "active_status": "1"
                    }
                ]
            }
        },
        "Good 80 - 5": {
            "id": "5",
            "credit_status_name": "Good 80",
            "company_id": "1",
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
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ],
                "Credit_Statuses": [
                    {
                        "id": "2",
                        "credit_status_name": "Good 80",
                        "company_id": "1",
                        "active_status": "1"
                    }
                ]
            }
        },
        "Good 80 - 6": {
            "id": "6",
            "credit_status_name": "Good 80",
            "company_id": "1",
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
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ],
                "Credit_Statuses": [
                    {
                        "id": "2",
                        "credit_status_name": "Good 80",
                        "company_id": "1",
                        "active_status": "1"
                    }
                ]
            }
        },
        "Good 80 - 7": {
            "id": "7",
            "credit_status_name": "Good 80",
            "company_id": "1",
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
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ],
                "Credit_Statuses": [
                    {
                        "id": "2",
                        "credit_status_name": "Good 80",
                        "company_id": "1",
                        "active_status": "1"
                    }
                ]
            }
        },
        "Good 80 - 8": {
            "id": "8",
            "credit_status_name": "Good 80",
            "company_id": "1",
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
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ],
                "Credit_Statuses": [
                    {
                        "id": "2",
                        "credit_status_name": "Good 80",
                        "company_id": "1",
                        "active_status": "1"
                    }
                ]
            }
        },
        "Good 80 - 9": {
            "id": "9",
            "credit_status_name": "Good 80",
            "company_id": "1",
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
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ],
                "Credit_Statuses": [
                    {
                        "id": "2",
                        "credit_status_name": "Good 80",
                        "company_id": "1",
                        "active_status": "1"
                    }
                ]
            }
        },
        "Good 80 - 10": {
            "id": "10",
            "credit_status_name": "Good 80",
            "company_id": "1",
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
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ],
                "Credit_Statuses": [
                    {
                        "id": "2",
                        "credit_status_name": "Good 80",
                        "company_id": "1",
                        "active_status": "1"
                    }
                ]
            }
        },
        "Good - 11": {
            "id": "11",
            "credit_status_name": "Good",
            "company_id": "1",
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
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ],
                "Credit_Statuses": [
                    {
                        "id": "2",
                        "credit_status_name": "Good 80",
                        "company_id": "1",
                        "active_status": "1"
                    }
                ]
            }
        }
    }
}
```

### HTTP Request
`GET api/v1/creditstatuses`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `include_disabled_objects` |  optional  | {bool}
    `include_details` |  optional  | {int} Include the entire object model of the object.  If set the integer determines how many levels deep you want to return for related objects.
    `details_offset` |  optional  | {int} If include_details is false this is ignored.  For related objects which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.
    `details_limit` |  optional  | {int} If include_details is false this is ignored.  For related objects how many do you want to return. Must be a number between 1 and 25.
    `limit` |  optional  | {int} How many objects do you want to return. Must be a number between 1 and 100.
    `offset` |  optional  | {int} Which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.

<!-- END_81005cc50aac34cd5507d224bfe2fdfb -->

<!-- START_8724fb8d28b3369b26fcafe957895f3b -->
## {PUT} {creditstatus}/credit_statuses/v1/api

> Example request:

```bash
curl -X PUT \
    "https://project.dsfellowship.com/api/v1/creditstatuses/11" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe" \
    -H "Content-Type: application/json" \
    -d '{"name":"Good 80"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/creditstatuses/11"
);

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
};

let body = {
    "name": "Good 80"
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
    "message": "Credit Status Updated",
    "Credit_Status": {
        "id": "11",
        "credit_status_name": "Good 80",
        "company_id": "1",
        "active_status": "1"
    }
}
```

### HTTP Request
`PUT api/v1/creditstatuses/{creditstatus}`

`PATCH api/v1/creditstatuses/{creditstatus}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `creditstatus` |  required  | {int}
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  optional  | {string}
    
<!-- END_8724fb8d28b3369b26fcafe957895f3b -->

<!-- START_d113b631052d46d41c6de1f91d8905f4 -->
## {POST} customers/v1/api

> Example request:

```bash
curl -X POST \
    "https://project.dsfellowship.com/api/v1/customers" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe" \
    -H "Content-Type: application/json" \
    -d '{"customer_name":"Bob The Builder","credit_status":11,"ccb":"","website":"www.amazingbiceps.com"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/customers"
);

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
};

let body = {
    "customer_name": "Bob The Builder",
    "credit_status": 11,
    "ccb": "",
    "website": "www.amazingbiceps.com"
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
    "message": "Customer Created",
    "Customer": {
        "id": 11,
        "customer_name": "Bob The Builder",
        "credit_status": 11,
        "website": "www.amazingbiceps.com",
        "ccb": "",
        "company_id": 1,
        "active_status": 1
    }
}
```

### HTTP Request
`POST api/v1/customers`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `customer_name` | string |  required  | {string}
        `credit_status` | int |  required  | {int}
        `ccb` | string |  optional  | {string}
        `website` | string |  optional  | {string}
    
<!-- END_d113b631052d46d41c6de1f91d8905f4 -->

<!-- START_e680a22e8c8604379f3319896fca4d36 -->
## {GET} customers/v1/api

> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/customers?include_disabled_objects=&include_details=2&details_offset=0&details_limit=5&limit=10&offset=0" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/customers"
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
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
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
    "Customer": {
        "Bob and Son The Builders - 2": {
            "id": "2",
            "customer_name": "Bob and Son The Builders",
            "credit_status": "2",
            "website": "www.amazingbiceps.com",
            "ccb": "",
            "company_id": "1",
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
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ],
                "Credit_Statuses": [
                    {
                        "id": "2",
                        "credit_status_name": "Good 80",
                        "company_id": "1",
                        "active_status": "1"
                    }
                ]
            },
            "Credit_Statuses": {
                "id": "2",
                "credit_status_name": "Good 80",
                "company_id": "1",
                "active_status": "1",
                "Companies": {
                    "id": "1",
                    "company_name": "System",
                    "active_status": "1"
                }
            }
        },
        "Bob and Son The Builders - 3": {
            "id": "3",
            "customer_name": "Bob and Son The Builders",
            "credit_status": "3",
            "website": "www.amazingbiceps.com",
            "ccb": "",
            "company_id": "1",
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
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ],
                "Credit_Statuses": [
                    {
                        "id": "2",
                        "credit_status_name": "Good 80",
                        "company_id": "1",
                        "active_status": "1"
                    }
                ]
            },
            "Credit_Statuses": {
                "id": "3",
                "credit_status_name": "Good 80",
                "company_id": "1",
                "active_status": "1",
                "Companies": {
                    "id": "1",
                    "company_name": "System",
                    "active_status": "1"
                }
            }
        },
        "Bob and Son The Builders - 4": {
            "id": "4",
            "customer_name": "Bob and Son The Builders",
            "credit_status": "4",
            "website": "www.amazingbiceps.com",
            "ccb": "",
            "company_id": "1",
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
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ],
                "Credit_Statuses": [
                    {
                        "id": "2",
                        "credit_status_name": "Good 80",
                        "company_id": "1",
                        "active_status": "1"
                    }
                ]
            },
            "Credit_Statuses": {
                "id": "4",
                "credit_status_name": "Good 80",
                "company_id": "1",
                "active_status": "1",
                "Companies": {
                    "id": "1",
                    "company_name": "System",
                    "active_status": "1"
                }
            }
        },
        "Bob and Son The Builders - 5": {
            "id": "5",
            "customer_name": "Bob and Son The Builders",
            "credit_status": "5",
            "website": "www.amazingbiceps.com",
            "ccb": "",
            "company_id": "1",
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
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ],
                "Credit_Statuses": [
                    {
                        "id": "2",
                        "credit_status_name": "Good 80",
                        "company_id": "1",
                        "active_status": "1"
                    }
                ]
            },
            "Credit_Statuses": {
                "id": "5",
                "credit_status_name": "Good 80",
                "company_id": "1",
                "active_status": "1",
                "Companies": {
                    "id": "1",
                    "company_name": "System",
                    "active_status": "1"
                }
            }
        },
        "Bob and Son The Builders - 6": {
            "id": "6",
            "customer_name": "Bob and Son The Builders",
            "credit_status": "6",
            "website": "www.amazingbiceps.com",
            "ccb": "",
            "company_id": "1",
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
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ],
                "Credit_Statuses": [
                    {
                        "id": "2",
                        "credit_status_name": "Good 80",
                        "company_id": "1",
                        "active_status": "1"
                    }
                ]
            },
            "Credit_Statuses": {
                "id": "6",
                "credit_status_name": "Good 80",
                "company_id": "1",
                "active_status": "1",
                "Companies": {
                    "id": "1",
                    "company_name": "System",
                    "active_status": "1"
                }
            }
        },
        "Bob and Son The Builders - 7": {
            "id": "7",
            "customer_name": "Bob and Son The Builders",
            "credit_status": "7",
            "website": "www.amazingbiceps.com",
            "ccb": "",
            "company_id": "1",
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
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ],
                "Credit_Statuses": [
                    {
                        "id": "2",
                        "credit_status_name": "Good 80",
                        "company_id": "1",
                        "active_status": "1"
                    }
                ]
            },
            "Credit_Statuses": {
                "id": "7",
                "credit_status_name": "Good 80",
                "company_id": "1",
                "active_status": "1",
                "Companies": {
                    "id": "1",
                    "company_name": "System",
                    "active_status": "1"
                }
            }
        },
        "Bob and Son The Builders - 8": {
            "id": "8",
            "customer_name": "Bob and Son The Builders",
            "credit_status": "8",
            "website": "www.amazingbiceps.com",
            "ccb": "",
            "company_id": "1",
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
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ],
                "Credit_Statuses": [
                    {
                        "id": "2",
                        "credit_status_name": "Good 80",
                        "company_id": "1",
                        "active_status": "1"
                    }
                ]
            },
            "Credit_Statuses": {
                "id": "8",
                "credit_status_name": "Good 80",
                "company_id": "1",
                "active_status": "1",
                "Companies": {
                    "id": "1",
                    "company_name": "System",
                    "active_status": "1"
                }
            }
        },
        "Bob and Son The Builders - 9": {
            "id": "9",
            "customer_name": "Bob and Son The Builders",
            "credit_status": "9",
            "website": "www.amazingbiceps.com",
            "ccb": "",
            "company_id": "1",
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
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ],
                "Credit_Statuses": [
                    {
                        "id": "2",
                        "credit_status_name": "Good 80",
                        "company_id": "1",
                        "active_status": "1"
                    }
                ]
            },
            "Credit_Statuses": {
                "id": "9",
                "credit_status_name": "Good 80",
                "company_id": "1",
                "active_status": "1",
                "Companies": {
                    "id": "1",
                    "company_name": "System",
                    "active_status": "1"
                }
            }
        },
        "Bob and Son The Builders - 10": {
            "id": "10",
            "customer_name": "Bob and Son The Builders",
            "credit_status": "10",
            "website": "www.amazingbiceps.com",
            "ccb": "",
            "company_id": "1",
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
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ],
                "Credit_Statuses": [
                    {
                        "id": "2",
                        "credit_status_name": "Good 80",
                        "company_id": "1",
                        "active_status": "1"
                    }
                ]
            },
            "Credit_Statuses": {
                "id": "10",
                "credit_status_name": "Good 80",
                "company_id": "1",
                "active_status": "1",
                "Companies": {
                    "id": "1",
                    "company_name": "System",
                    "active_status": "1"
                }
            }
        },
        "Bob The Builder - 11": {
            "id": "11",
            "customer_name": "Bob The Builder",
            "credit_status": "11",
            "website": "www.amazingbiceps.com",
            "ccb": "",
            "company_id": "1",
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
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ],
                "Credit_Statuses": [
                    {
                        "id": "2",
                        "credit_status_name": "Good 80",
                        "company_id": "1",
                        "active_status": "1"
                    }
                ]
            },
            "Credit_Statuses": {
                "id": "11",
                "credit_status_name": "Good 80",
                "company_id": "1",
                "active_status": "1",
                "Companies": {
                    "id": "1",
                    "company_name": "System",
                    "active_status": "1"
                }
            }
        }
    }
}
```

### HTTP Request
`GET api/v1/customers`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `include_disabled_objects` |  optional  | {bool}
    `include_details` |  optional  | {int} Include the entire object model of the object.  If set the integer determines how many levels deep you want to return for related objects.
    `details_offset` |  optional  | {int} If include_details is false this is ignored.  For related objects which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.
    `details_limit` |  optional  | {int} If include_details is false this is ignored.  For related objects how many do you want to return. Must be a number between 1 and 25.
    `limit` |  optional  | {int} How many objects do you want to return. Must be a number between 1 and 100.
    `offset` |  optional  | {int} Which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.

<!-- END_e680a22e8c8604379f3319896fca4d36 -->

<!-- START_a1eb533beb6315e57c1bc2dd4d4fd5a3 -->
## {PUT} {customer}/customers/v1/api

> Example request:

```bash
curl -X PUT \
    "https://project.dsfellowship.com/api/v1/customers/11" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe" \
    -H "Content-Type: application/json" \
    -d '{"customer_name":"Bob and Son The Builders","credit_status":11,"ccb":"","website":"www.amazingbiceps.com"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/customers/11"
);

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
};

let body = {
    "customer_name": "Bob and Son The Builders",
    "credit_status": 11,
    "ccb": "",
    "website": "www.amazingbiceps.com"
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
    "message": "Customer Updated",
    "Customer": {
        "id": "11",
        "customer_name": "Bob and Son The Builders",
        "credit_status": 11,
        "website": "www.amazingbiceps.com",
        "ccb": "",
        "company_id": "1",
        "active_status": "1"
    }
}
```

### HTTP Request
`PUT api/v1/customers/{customer}`

`PATCH api/v1/customers/{customer}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `customer` |  required  | {int}
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `customer_name` | string |  optional  | {string}
        `credit_status` | int |  optional  | {int}
        `ccb` | string |  optional  | {string}
        `website` | string |  optional  | {string}
    
<!-- END_a1eb533beb6315e57c1bc2dd4d4fd5a3 -->

<!-- START_226b5da00a059d38f1162e2cc9ae29d4 -->
## {POST} equipment/v1/api

> Example request:

```bash
curl -X POST \
    "https://project.dsfellowship.com/api/v1/equipment" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe" \
    -H "Content-Type: application/json" \
    -d '{"equipment_name":"F3452"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/equipment"
);

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
};

let body = {
    "equipment_name": "F3452"
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
    "message": "Equipment Created",
    "Equipment": {
        "id": 11,
        "equipment_name": "F3452",
        "company_id": 1,
        "active_status": 1
    }
}
```

### HTTP Request
`POST api/v1/equipment`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `equipment_name` | string |  required  | {string}
    
<!-- END_226b5da00a059d38f1162e2cc9ae29d4 -->

<!-- START_12a211602c23da463598adc31c06a157 -->
## {GET} equipment/v1/api

> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/equipment?include_disabled_objects=&include_details=2&details_offset=0&details_limit=5&limit=10&offset=0" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/equipment"
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
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
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
    "Equipment": {
        "F3452 - 11": {
            "id": "11",
            "equipment_name": "F3452",
            "company_id": "1",
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
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ],
                "Equipments": [
                    {
                        "id": "11",
                        "equipment_name": "F3452",
                        "company_id": "1",
                        "active_status": "1"
                    }
                ],
                "Credit_Statuses": [
                    {
                        "id": "2",
                        "credit_status_name": "Good 80",
                        "company_id": "1",
                        "active_status": "1"
                    }
                ]
            }
        }
    }
}
```

### HTTP Request
`GET api/v1/equipment`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `include_disabled_objects` |  optional  | {bool}
    `include_details` |  optional  | {int} Include the entire object model of the object.  If set the integer determines how many levels deep you want to return for related objects.
    `details_offset` |  optional  | {int} If include_details is false this is ignored.  For related objects which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.
    `details_limit` |  optional  | {int} If include_details is false this is ignored.  For related objects how many do you want to return. Must be a number between 1 and 25.
    `limit` |  optional  | {int} How many objects do you want to return. Must be a number between 1 and 100.
    `offset` |  optional  | {int} Which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.

<!-- END_12a211602c23da463598adc31c06a157 -->

<!-- START_6b8a847c0ac6a2dab0ff9e90f7f07e35 -->
## {PUT} {equipment}/equipment/v1/api

> Example request:

```bash
curl -X PUT \
    "https://project.dsfellowship.com/api/v1/equipment/11" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe" \
    -H "Content-Type: application/json" \
    -d '{"equipment_name":"F3453"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/equipment/11"
);

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
};

let body = {
    "equipment_name": "F3453"
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
    "message": "Equipment Updated",
    "Equipment": {
        "id": "11",
        "equipment_name": "F3453",
        "company_id": "1",
        "active_status": "1"
    }
}
```

### HTTP Request
`PUT api/v1/equipment/{equipment}`

`PATCH api/v1/equipment/{equipment}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `equipment` |  required  | {int}
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `equipment_name` | string |  optional  | {string}
    
<!-- END_6b8a847c0ac6a2dab0ff9e90f7f07e35 -->

<!-- START_6684b9b8c09eab38e28e1d63210b302b -->
## {DELETE} {equipment}/equipment/v1/api

> Example request:

```bash
curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/equipment/11?active_status=" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/equipment/11"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
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
    "message": "Equipment Deleted"
}
```

### HTTP Request
`DELETE api/v1/equipment/{equipment}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `equipment` |  required  | {int}
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `active_status` |  required  | {bool} When true object will be marked inactive.  When false the object will be deleted.

<!-- END_6684b9b8c09eab38e28e1d63210b302b -->

<!-- START_d8c47f1a8318e20b72fbb34a2b7582e8 -->
## {GET} customer_addresses/{customer}/customers/v1/api

> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/customers/11/customeraddresses?include_disabled_objects=&include_details=2&details_offset=0&details_limit=5&limit=10&offset=0" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/customers/11/customeraddresses"
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
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
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
    "Customer_Address": []
}
```

### HTTP Request
`GET api/v1/customers/{customer}/customeraddresses`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `customer` |  required  | {int}
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `include_disabled_objects` |  optional  | {bool}
    `include_details` |  optional  | {int} Include the entire object model of the object.  If set the integer determines how many levels deep you want to return for related objects.
    `details_offset` |  optional  | {int} If include_details is false this is ignored.  For related objects which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.
    `details_limit` |  optional  | {int} If include_details is false this is ignored.  For related objects how many do you want to return. Must be a number between 1 and 25.
    `limit` |  optional  | {int} How many objects do you want to return. Must be a number between 1 and 100.
    `offset` |  optional  | {int} Which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.

<!-- END_d8c47f1a8318e20b72fbb34a2b7582e8 -->

<!-- START_444e58b8665537b015b6aed35d40c41a -->
## {POST} customer_addresses/{customer}/customers/v1/api

> Example request:

```bash
curl -X POST \
    "https://project.dsfellowship.com/api/v1/customers/11/customeraddresses" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe" \
    -H "Content-Type: application/json" \
    -d '{"description":"Physical","city":"Portland","state":"OR","street1":"1234 NW Front St","street2":"Suite 203","zip":"97123","lat":"123.000001254","lng":"-312.45675","url":"","google_id":""}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/customers/11/customeraddresses"
);

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
};

let body = {
    "description": "Physical",
    "city": "Portland",
    "state": "OR",
    "street1": "1234 NW Front St",
    "street2": "Suite 203",
    "zip": "97123",
    "lat": "123.000001254",
    "lng": "-312.45675",
    "url": "",
    "google_id": ""
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
    "message": "Customer Address Created",
    "Customer_Address": {
        "id": 11,
        "description": "Physical",
        "name": "",
        "street1": "1234 NW Front St",
        "street2": "Suite 203",
        "city": "Portland",
        "state": "OR",
        "zip": "97123",
        "lat": "123.000001254",
        "lng": "-312.45675",
        "url": "",
        "google_id": "",
        "company_id": 1
    }
}
```

### HTTP Request
`POST api/v1/customers/{customer}/customeraddresses`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `customer` |  required  | {int}
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `description` | string |  required  | {string}
        `city` | string |  required  | {string}
        `state` | string |  required  | {string}
        `street1` | string |  optional  | {string}
        `street2` | string |  optional  | {string}
        `zip` | string |  optional  | {string}
        `lat` | string |  optional  | {string} Latitude Coordinate
        `lng` | string |  optional  | {string} Longitude Coordinate
        `url` | string |  optional  | {string} a url you would like to link to this address.
        `google_id` | string |  optional  | {string} if present supply the google location id for extra google features
    
<!-- END_444e58b8665537b015b6aed35d40c41a -->

<!-- START_3bfc0cad953371df6b2df2810a6fb01d -->
## {GET} tags/customers/v1/api

> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/customers/tags?include_disabled_objects=&include_details=2&details_offset=0&details_limit=5&limit=10&offset=0" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/customers/tags"
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
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
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
    "Tag": {
        "5eb79cf55bd32 - 2": {
            "id": "2",
            "name": "5eb79cf55bd32",
            "company_id": "1",
            "object_table_name": "Customers",
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
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ],
                "Credit_Statuses": [
                    {
                        "id": "2",
                        "credit_status_name": "Good 80",
                        "company_id": "1",
                        "active_status": "1"
                    }
                ]
            }
        }
    }
}
```

### HTTP Request
`GET api/v1/customers/tags`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `include_disabled_objects` |  optional  | {bool}
    `include_details` |  optional  | {int} Include the entire object model of the object.  If set the integer determines how many levels deep you want to return for related objects.
    `details_offset` |  optional  | {int} If include_details is false this is ignored.  For related objects which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.
    `details_limit` |  optional  | {int} If include_details is false this is ignored.  For related objects how many do you want to return. Must be a number between 1 and 25.
    `limit` |  optional  | {int} How many objects do you want to return. Must be a number between 1 and 100.
    `offset` |  optional  | {int} Which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.

<!-- END_3bfc0cad953371df6b2df2810a6fb01d -->

<!-- START_18b5a0d1985927835c8f57e9f20660dd -->
## {POST} tags/customers/v1/api

> Example request:

```bash
curl -X POST \
    "https://project.dsfellowship.com/api/v1/customers/tags" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe" \
    -H "Content-Type: application/json" \
    -d '{"tag_name":"5eb7a0d159918"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/customers/tags"
);

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
};

let body = {
    "tag_name": "5eb7a0d159918"
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
    "message": "Customer Tag Created",
    "Customer_Tag": {
        "id": 6,
        "name": "5eb7a0d159918",
        "company_id": 1,
        "object_table_name": "Customers"
    }
}
```

### HTTP Request
`POST api/v1/customers/tags`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `tag_name` | string |  required  | {string}
    
<!-- END_18b5a0d1985927835c8f57e9f20660dd -->

<!-- START_115e1a6e1c6f387d892a1d18582c55e6 -->
## {GET} phonenumbers/{customer}/customers/v1/api

> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/customers/11/phonenumbers?include_disabled_objects=&include_details=2&details_offset=0&details_limit=5&limit=10&offset=0" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/customers/11/phonenumbers"
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
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
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
    "Customer_Phone_Number": []
}
```

### HTTP Request
`GET api/v1/customers/{customer}/phonenumbers`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `customer` |  required  | {int}
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `include_disabled_objects` |  optional  | {bool}
    `include_details` |  optional  | {int} Include the entire object model of the object.  If set the integer determines how many levels deep you want to return for related objects.
    `details_offset` |  optional  | {int} If include_details is false this is ignored.  For related objects which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.
    `details_limit` |  optional  | {int} If include_details is false this is ignored.  For related objects how many do you want to return. Must be a number between 1 and 25.
    `limit` |  optional  | {int} How many objects do you want to return. Must be a number between 1 and 100.
    `offset` |  optional  | {int} Which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.

<!-- END_115e1a6e1c6f387d892a1d18582c55e6 -->

<!-- START_cb32251418e5f4078eb929d6c504aa8f -->
## {POST} phonenumbers/{customer}/customers/v1/api

> Example request:

```bash
curl -X POST \
    "https://project.dsfellowship.com/api/v1/customers/11/phonenumbers" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe" \
    -H "Content-Type: application/json" \
    -d '{"description":"Home 1","area_code":"503","prefix":"631","suffix":"8865","ext":"1234","country_code":1}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/customers/11/phonenumbers"
);

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
};

let body = {
    "description": "Home 1",
    "area_code": "503",
    "prefix": "631",
    "suffix": "8865",
    "ext": "1234",
    "country_code": 1
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
    "message": "Customer Phone Number Created",
    "Customer_Phone_Number": {
        "id": 2,
        "description": "Home 1",
        "country_code": 1,
        "area_code": 503,
        "prefix": 631,
        "suffix": 8865,
        "ext": 1234,
        "type": "landline",
        "carrier": "Clear Creek Mutual Tel. Co.",
        "company_id": 1
    }
}
```

### HTTP Request
`POST api/v1/customers/{customer}/phonenumbers`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `customer` |  required  | {int}
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `description` | string |  optional  | {string}
        `area_code` | int |  required  | {int}
        `prefix` | int |  required  | {int}
        `suffix` | int |  required  | {int}
        `ext` | int |  optional  | {int}
        `country_code` | int |  optional  | {int}
    
<!-- END_cb32251418e5f4078eb929d6c504aa8f -->

<!-- START_dbe522f7ae20a209a9068bfaefe9fc01 -->
## {DELETE} {customer}/customers/v1/api

> Example request:

```bash
curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/customers/11?active_status=" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/customers/11"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
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
    "message": "Customer Deleted"
}
```

### HTTP Request
`DELETE api/v1/customers/{customer}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `customer` |  required  | {int}
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `active_status` |  required  | {bool} When true object will be marked inactive.  When false the object will be deleted.

<!-- END_dbe522f7ae20a209a9068bfaefe9fc01 -->

<!-- START_b3f889412af8021019fddbb9dcad8eb4 -->
## {DELETE} {creditstatus}/credit_statuses/v1/api

> Example request:

```bash
curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/creditstatuses/11?active_status=" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/creditstatuses/11"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
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
    "message": "Credit_Status Deleted"
}
```

### HTTP Request
`DELETE api/v1/creditstatuses/{creditstatus}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `creditstatus` |  required  | {int}
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `active_status` |  required  | {bool} When true object will be marked inactive.  When false the object will be deleted.

<!-- END_b3f889412af8021019fddbb9dcad8eb4 -->

#Company


Basic CRUD operations for Companies, Company Configs and Users
<!-- START_1aff981da377ba9a1bbc56ff8efaec0d -->
## {GET} users/v1/api

Return a list of users belonging to the company

> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/users?include_disabled_objects=&include_details=2&details_offset=0&details_limit=5&limit=10&offset=0" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe"
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
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
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
                            "id": "2",
                            "company_id": "1",
                            "role_name": "master",
                            "active_status": "1"
                        }
                    ],
                    "Credit_Statuses": [
                        {
                            "id": "2",
                            "credit_status_name": "Good 80",
                            "company_id": "1",
                            "active_status": "1"
                        }
                    ]
                },
                "Users_Have_Roles": [
                    {
                        "id": "2",
                        "user_id": "1",
                        "role_id": "2",
                        "Company_Roles": {
                            "id": "2",
                            "company_id": "1",
                            "role_name": "master",
                            "active_status": "1"
                        }
                    }
                ]
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
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe" \
    -H "Content-Type: application/json" \
    -d '{"user":"new_user","password":"1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT","company_roles":[{"id":"2","company_id":"1","role_name":"master","active_status":"1","Companies":{"id":"1","company_name":"System","active_status":"1","Company_Configs":[{"id":"2","company_id":"1","config_id":"1","config_value":"UTC","active_status":"1"}],"Company_Roles":[{"id":"2","company_id":"1","role_name":"master","active_status":"1"}],"Credit_Statuses":[{"id":"2","credit_status_name":"Good 80","company_id":"1","active_status":"1"}]},"Users_Have_Roles":[{"id":"2","user_id":"1","role_id":"2","Company_Roles":{"id":"2","company_id":"1","role_name":"master","active_status":"1"}}],"Routes_Have_Roles":[{"id":"1","route_id":"1","role_id":"2","right_id":"1","Routes":{"id":"1","name":"User_Signin","implicit_allow":"1","module":""},"Company_Roles":{"id":"2","company_id":"1","role_name":"master","active_status":"1"},"Rights":{"id":"1","get":"1","destroy":"1","post":"1","patch":"1","put":"1"}},{"id":"2","route_id":"2","role_id":"2","right_id":"2","Routes":{"id":"2","name":"List_Users","implicit_allow":"0","module":"Company"},"Company_Roles":{"id":"2","company_id":"1","role_name":"master","active_status":"1"},"Rights":{"id":"2","get":"1","destroy":"1","post":"1","patch":"1","put":"1"}},{"id":"3","route_id":"3","role_id":"2","right_id":"3","Routes":{"id":"3","name":"Create_User","implicit_allow":"0","module":"Company"},"Company_Roles":{"id":"2","company_id":"1","role_name":"master","active_status":"1"},"Rights":{"id":"3","get":"1","destroy":"1","post":"1","patch":"1","put":"1"}},{"id":"4","route_id":"4","role_id":"2","right_id":"4","Routes":{"id":"4","name":"List_Companies","implicit_allow":"1","module":""},"Company_Roles":{"id":"2","company_id":"1","role_name":"master","active_status":"1"},"Rights":{"id":"4","get":"1","destroy":"1","post":"1","patch":"1","put":"1"}},{"id":"5","route_id":"5","role_id":"2","right_id":"5","Routes":{"id":"5","name":"Create_Company","implicit_allow":"1","module":""},"Company_Roles":{"id":"2","company_id":"1","role_name":"master","active_status":"1"},"Rights":{"id":"5","get":"1","destroy":"1","post":"1","patch":"1","put":"1"}}]}]}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/users"
);

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
};

let body = {
    "user": "new_user",
    "password": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "company_roles": [
        {
            "id": "2",
            "company_id": "1",
            "role_name": "master",
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
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ],
                "Credit_Statuses": [
                    {
                        "id": "2",
                        "credit_status_name": "Good 80",
                        "company_id": "1",
                        "active_status": "1"
                    }
                ]
            },
            "Users_Have_Roles": [
                {
                    "id": "2",
                    "user_id": "1",
                    "role_id": "2",
                    "Company_Roles": {
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                }
            ],
            "Routes_Have_Roles": [
                {
                    "id": "1",
                    "route_id": "1",
                    "role_id": "2",
                    "right_id": "1",
                    "Routes": {
                        "id": "1",
                        "name": "User_Signin",
                        "implicit_allow": "1",
                        "module": ""
                    },
                    "Company_Roles": {
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "2",
                    "route_id": "2",
                    "role_id": "2",
                    "right_id": "2",
                    "Routes": {
                        "id": "2",
                        "name": "List_Users",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "2",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "3",
                    "route_id": "3",
                    "role_id": "2",
                    "right_id": "3",
                    "Routes": {
                        "id": "3",
                        "name": "Create_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "3",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "4",
                    "route_id": "4",
                    "role_id": "2",
                    "right_id": "4",
                    "Routes": {
                        "id": "4",
                        "name": "List_Companies",
                        "implicit_allow": "1",
                        "module": ""
                    },
                    "Company_Roles": {
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "4",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "5",
                    "route_id": "5",
                    "role_id": "2",
                    "right_id": "5",
                    "Routes": {
                        "id": "5",
                        "name": "Create_Company",
                        "implicit_allow": "1",
                        "module": ""
                    },
                    "Company_Roles": {
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "5",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
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
        "id": 18,
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
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe" \
    -H "Content-Type: application/json" \
    -d '{"new_password":"1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT","company_roles":[{"id":"2","company_id":"1","role_name":"master","active_status":"1"}]}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/users/new_user"
);

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
};

let body = {
    "new_password": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "company_roles": [
        {
            "id": "2",
            "company_id": "1",
            "role_name": "master",
            "active_status": "1"
        }
    ]
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
        "id": "18",
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
    
<!-- END_296fac4bf818c99f6dd42a4a0eb56b58 -->

<!-- START_22354fc95c42d81a744eece68f5b9b9a -->
## {DELETE} {user}/users/v1/api

> Example request:

```bash
curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/users/new_user?active_status=" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe"
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
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
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
    "message": "User Successfully Deleted\/Disabled",
    "user": {
        "id": "18",
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
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe"
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
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
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
        "master - 2": {
            "id": "2",
            "company_id": "1",
            "role_name": "master",
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
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ],
                "Credit_Statuses": [
                    {
                        "id": "2",
                        "credit_status_name": "Good 80",
                        "company_id": "1",
                        "active_status": "1"
                    }
                ]
            },
            "Users_Have_Roles": [
                {
                    "id": "2",
                    "user_id": "1",
                    "role_id": "2",
                    "Company_Roles": {
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                }
            ],
            "Routes_Have_Roles": [
                {
                    "id": "1",
                    "route_id": "1",
                    "role_id": "2",
                    "right_id": "1",
                    "Routes": {
                        "id": "1",
                        "name": "User_Signin",
                        "implicit_allow": "1",
                        "module": ""
                    },
                    "Company_Roles": {
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "2",
                    "route_id": "2",
                    "role_id": "2",
                    "right_id": "2",
                    "Routes": {
                        "id": "2",
                        "name": "List_Users",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "2",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "3",
                    "route_id": "3",
                    "role_id": "2",
                    "right_id": "3",
                    "Routes": {
                        "id": "3",
                        "name": "Create_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "3",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "4",
                    "route_id": "4",
                    "role_id": "2",
                    "right_id": "4",
                    "Routes": {
                        "id": "4",
                        "name": "List_Companies",
                        "implicit_allow": "1",
                        "module": ""
                    },
                    "Company_Roles": {
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "4",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "5",
                    "route_id": "5",
                    "role_id": "2",
                    "right_id": "5",
                    "Routes": {
                        "id": "5",
                        "name": "Create_Company",
                        "implicit_allow": "1",
                        "module": ""
                    },
                    "Company_Roles": {
                        "id": "2",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "5",
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
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe" \
    -H "Content-Type: application/json" \
    -d '{"Routes_Have_Roles":[{"route_id":"3","Rights":{"get":true,"post":false,"patch":false,"put":false,"destroy":false}},{"route_id":"6","Rights":{"get":false,"post":true,"patch":false,"put":false,"destroy":false}}],"role_name":"5eb7a0ca74b84"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/roles"
);

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
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
    "role_name": "5eb7a0ca74b84"
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
        "id": "20",
        "company_id": "1",
        "role_name": "5eb7a0ca74b84",
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
    "https://project.dsfellowship.com/api/v1/roles/20" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe" \
    -H "Content-Type: application/json" \
    -d '{"Routes_Have_Roles":[{"route_id":"3","Rights":{"get":true,"post":false,"patch":false,"put":false,"destroy":false}},{"route_id":"6","Rights":{"get":false,"post":true,"patch":false,"put":false,"destroy":false}}],"role_name":"5eb7a0cd94a54"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/roles/20"
);

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
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
    "role_name": "5eb7a0cd94a54"
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
        "id": "20",
        "company_id": "1",
        "role_name": "5eb7a0cd94a54",
        "active_status": "1"
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
    
<!-- END_81ac9047f8db2b92092c5a7f13e5d28d -->

<!-- START_04c524fc2f0ea8c793406426144b4c71 -->
## {DELETE} roles/v1/api

> Example request:

```bash
curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/roles/20?active_status=" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/roles/20"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
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
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "secret-token: HR1O3+JO.8fUGBTR24NR1YQYSw9UtFOdos?zXdpa$ZFs+ra8"
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
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "secret-token": "HR1O3+JO.8fUGBTR24NR1YQYSw9UtFOdos?zXdpa$ZFs+ra8",
    "Content-Type": "application/json",
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
        "System - 1": {
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
                    "id": "2",
                    "company_id": "1",
                    "role_name": "master",
                    "active_status": "1",
                    "Companies": {
                        "id": "1",
                        "company_name": "System",
                        "active_status": "1"
                    },
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
                        }
                    ]
                }
            ],
            "Credit_Statuses": [
                {
                    "id": "2",
                    "credit_status_name": "Good 80",
                    "company_id": "1",
                    "active_status": "1",
                    "Companies": {
                        "id": "1",
                        "company_name": "System",
                        "active_status": "1"
                    }
                },
                {
                    "id": "3",
                    "credit_status_name": "Good 80",
                    "company_id": "1",
                    "active_status": "1",
                    "Companies": {
                        "id": "1",
                        "company_name": "System",
                        "active_status": "1"
                    }
                },
                {
                    "id": "4",
                    "credit_status_name": "Good 80",
                    "company_id": "1",
                    "active_status": "1",
                    "Companies": {
                        "id": "1",
                        "company_name": "System",
                        "active_status": "1"
                    }
                },
                {
                    "id": "5",
                    "credit_status_name": "Good 80",
                    "company_id": "1",
                    "active_status": "1",
                    "Companies": {
                        "id": "1",
                        "company_name": "System",
                        "active_status": "1"
                    }
                },
                {
                    "id": "6",
                    "credit_status_name": "Good 80",
                    "company_id": "1",
                    "active_status": "1",
                    "Companies": {
                        "id": "1",
                        "company_name": "System",
                        "active_status": "1"
                    }
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

<!-- START_7be8cb2d15a57d2062ece90d5b8f8269 -->
## {POST} company/v1/api

This framework doesn't allow a company to do anything unless there is an authorized user making the request.
So as part of creating a company this will auto create a master role that has access to all methods on all routes
It will also create a user with the username default (recommend disabling after establishing a real person with master credentials)
Make sure to record the default password upon success, this password is unrecoverable and the company would need to be deleted and recreated

> Example request:

```bash
curl -X POST \
    "https://project.dsfellowship.com/api/v1/companies" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "secret-token: HR1O3+JO.8fUGBTR24NR1YQYSw9UtFOdos?zXdpa$ZFs+ra8" \
    -H "Content-Type: application/json" \
    -d '{"company_name":"documentation_company"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/companies"
);

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "secret-token": "HR1O3+JO.8fUGBTR24NR1YQYSw9UtFOdos?zXdpa$ZFs+ra8",
    "Content-Type": "application/json",
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
    "master_password": "Vv=FRU7w$YaArl",
    "company": {
        "id": 15,
        "company_name": "documentation_company",
        "active_status": 1
    }
}
```

### HTTP Request
`POST api/v1/companies`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `company_name` | string |  required  | {string}
    
<!-- END_7be8cb2d15a57d2062ece90d5b8f8269 -->

<!-- START_02c1ebf9f4df1c10bbf4748053f03c8e -->
## {DELETE} {company}/companies/v1/api

> Example request:

```bash
curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/companies/15?active_status=" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "secret-token: HR1O3+JO.8fUGBTR24NR1YQYSw9UtFOdos?zXdpa$ZFs+ra8"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/companies/15"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "secret-token": "HR1O3+JO.8fUGBTR24NR1YQYSw9UtFOdos?zXdpa$ZFs+ra8",
    "Content-Type": "application/json",
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
    "message": "Company Deleted"
}
```

### HTTP Request
`DELETE api/v1/companies/{company}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `company` |  required  | {int}
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `active_status` |  required  | {bool} When true object will be marked inactive.  When false the object will be deleted.

<!-- END_02c1ebf9f4df1c10bbf4748053f03c8e -->

#Tools


<!-- START_cd4a874127cd23508641c63b640ee838 -->
## doc.json
> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/doc.json" \
    -H "Accept: application/json" \
    -H "secret-token: HR1O3+JO.8fUGBTR24NR1YQYSw9UtFOdos?zXdpa$ZFs+ra8"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/doc.json"
);

let headers = {
    "Accept": "application/json",
    "secret-token": "HR1O3+JO.8fUGBTR24NR1YQYSw9UtFOdos?zXdpa$ZFs+ra8",
    "Content-Type": "application/json",
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
        "name": "All Postman Endpoints",
        "_postman_id": "57c6d221-cc81-4d98-95cc-a7599fabd4a0",
        "description": "Use this collection to test all the endpoints using postmans",
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
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "secret-token",
                                "value": "HR1O3+JO.8fUGBTR24NR1YQYSw9UtFOdos?zXdpa$ZFs+ra8"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"user\": \"default\",\n    \"password\": \"1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT\"\n}"
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
                            "path": "api\/v1\/companies\/:company\/signin\/:signin",
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
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
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
            "name": "CDM",
            "description": "",
            "item": [
                {
                    "name": "{GET} employees\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/employees",
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
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
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
                    "name": "{POST} employees\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/employees",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"first_name\": \"Bob\",\n    \"last_name\": \"Grillman\",\n    \"title\": \"The Builder\",\n    \"description\": \"Amazing Biceps\",\n    \"email\": \"Bob@amazingbiceps.com\"\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "{POST} creditstatuses\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/creditstatuses",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"name\": \"Good\"\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "{GET} creditstatuses\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/creditstatuses",
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
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
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
                    "name": "{PUT} {creditstatus}\/credit_statuses\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/creditstatuses\/:creditstatus",
                            "query": [],
                            "variable": [
                                {
                                    "id": "creditstatus",
                                    "key": "creditstatus",
                                    "value": "1",
                                    "description": "{int}"
                                }
                            ]
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"name\": \"Good 80\"\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "{POST} customers\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/customers",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"customer_name\": \"Bob The Builder\",\n    \"credit_status\": 1,\n    \"ccb\": \"\",\n    \"website\": \"www.amazingbiceps.com\"\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "{GET} customers\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/customers",
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
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
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
                    "name": "{PUT} {customer}\/customers\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/customers\/:customer",
                            "query": [],
                            "variable": [
                                {
                                    "id": "customer",
                                    "key": "customer",
                                    "value": "1",
                                    "description": "{int}"
                                }
                            ]
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"customer_name\": \"Bob and Son The Builders\",\n    \"credit_status\": 1,\n    \"ccb\": \"\",\n    \"website\": \"www.amazingbiceps.com\"\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "{POST} equipment\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/equipment",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"equipment_name\": \"F3452\"\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "{GET} equipment\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/equipment",
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
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
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
                    "name": "{PUT} {equipment}\/equipment\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/equipment\/:equipment",
                            "query": [],
                            "variable": [
                                {
                                    "id": "equipment",
                                    "key": "equipment",
                                    "value": "1",
                                    "description": "{int}"
                                }
                            ]
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"equipment_name\": \"F3453\"\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "{DELETE} {equipment}\/equipment\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/equipment\/:equipment",
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
                                    "id": "equipment",
                                    "key": "equipment",
                                    "value": "1",
                                    "description": "{int}"
                                }
                            ]
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
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
                    "name": "{GET} customer_addresses\/{customer}\/customers\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/customers\/:customer\/customeraddresses",
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
                            ],
                            "variable": [
                                {
                                    "id": "customer",
                                    "key": "customer",
                                    "value": "1",
                                    "description": "{int}"
                                }
                            ]
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
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
                    "name": "{POST} customer_addresses\/{customer}\/customers\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/customers\/:customer\/customeraddresses",
                            "query": [],
                            "variable": [
                                {
                                    "id": "customer",
                                    "key": "customer",
                                    "value": "1",
                                    "description": "{int}"
                                }
                            ]
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"description\": \"Physical\",\n    \"city\": \"Portland\",\n    \"state\": \"OR\",\n    \"street1\": \"1234 NW Front St\",\n    \"street2\": \"Suite 203\",\n    \"zip\": \"97123\",\n    \"lat\": \"123.000001254\",\n    \"lng\": \"-312.45675\",\n    \"url\": \"\",\n    \"google_id\": \"\"\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "{GET} tags\/customers\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/customers\/tags",
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
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
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
                    "name": "{POST} tags\/customers\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/customers\/tags",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"tag_name\": \"5eb79a5c046f5\"\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "{GET} phonenumbers\/{customer}\/customers\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/customers\/:customer\/phonenumbers",
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
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
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
                    "name": "{POST} phonenumbers\/{customer}\/customers\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/customers\/:customer\/phonenumbers",
                            "query": [],
                            "variable": [
                                {
                                    "id": "customer",
                                    "key": "customer",
                                    "value": "1",
                                    "description": "{int}"
                                }
                            ]
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"description\": \"Home 1\",\n    \"area_code\": \"503\",\n    \"prefix\": \"631\",\n    \"suffix\": \"8865\",\n    \"ext\": \"1234\",\n    \"country_code\": 1\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "{DELETE} {customer}\/customers\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/customers\/:customer",
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
                                    "id": "customer",
                                    "key": "customer",
                                    "value": "1",
                                    "description": "{int}"
                                }
                            ]
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
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
                    "name": "{DELETE} {creditstatus}\/credit_statuses\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/creditstatuses\/:creditstatus",
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
                                    "id": "creditstatus",
                                    "key": "creditstatus",
                                    "value": "1",
                                    "description": "{int}"
                                }
                            ]
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
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
            "description": "\nBasic CRUD operations for Companies, Company Configs and Users",
            "item": [
                {
                    "name": "{GET} users\/v1\/api",
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
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "Return a list of users belonging to the company",
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
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"user\": \"new_user\",\n    \"password\": \"1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT\",\n    \"company_roles\": [\n        {\n            \"id\": \"2\",\n            \"company_id\": \"1\",\n            \"role_name\": \"master\",\n            \"active_status\": \"1\",\n            \"Companies\": {\n                \"id\": \"1\",\n                \"company_name\": \"System\",\n                \"active_status\": \"1\",\n                \"Company_Configs\": [\n                    {\n                        \"id\": \"2\",\n                        \"company_id\": \"1\",\n                        \"config_id\": \"1\",\n                        \"config_value\": \"UTC\",\n                        \"active_status\": \"1\"\n                    }\n                ],\n                \"Company_Roles\": [\n                    {\n                        \"id\": \"2\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    }\n                ]\n            },\n            \"Users_Have_Roles\": [\n                {\n                    \"id\": \"2\",\n                    \"user_id\": \"1\",\n                    \"role_id\": \"2\",\n                    \"Company_Roles\": {\n                        \"id\": \"2\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    }\n                }\n            ],\n            \"Routes_Have_Roles\": [\n                {\n                    \"id\": \"1\",\n                    \"route_id\": \"1\",\n                    \"role_id\": \"2\",\n                    \"right_id\": \"1\",\n                    \"Routes\": {\n                        \"id\": \"1\",\n                        \"name\": \"User_Signin\",\n                        \"implicit_allow\": \"1\",\n                        \"module\": \"\"\n                    },\n                    \"Company_Roles\": {\n                        \"id\": \"2\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    },\n                    \"Rights\": {\n                        \"id\": \"1\",\n                        \"get\": \"1\",\n                        \"destroy\": \"1\",\n                        \"post\": \"1\",\n                        \"patch\": \"1\",\n                        \"put\": \"1\"\n                    }\n                },\n                {\n                    \"id\": \"2\",\n                    \"route_id\": \"2\",\n                    \"role_id\": \"2\",\n                    \"right_id\": \"2\",\n                    \"Routes\": {\n                        \"id\": \"2\",\n                        \"name\": \"List_Users\",\n                        \"implicit_allow\": \"0\",\n                        \"module\": \"Company\"\n                    },\n                    \"Company_Roles\": {\n                        \"id\": \"2\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    },\n                    \"Rights\": {\n                        \"id\": \"2\",\n                        \"get\": \"1\",\n                        \"destroy\": \"1\",\n                        \"post\": \"1\",\n                        \"patch\": \"1\",\n                        \"put\": \"1\"\n                    }\n                },\n                {\n                    \"id\": \"3\",\n                    \"route_id\": \"3\",\n                    \"role_id\": \"2\",\n                    \"right_id\": \"3\",\n                    \"Routes\": {\n                        \"id\": \"3\",\n                        \"name\": \"Create_User\",\n                        \"implicit_allow\": \"0\",\n                        \"module\": \"Company\"\n                    },\n                    \"Company_Roles\": {\n                        \"id\": \"2\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    },\n                    \"Rights\": {\n                        \"id\": \"3\",\n                        \"get\": \"1\",\n                        \"destroy\": \"1\",\n                        \"post\": \"1\",\n                        \"patch\": \"1\",\n                        \"put\": \"1\"\n                    }\n                },\n                {\n                    \"id\": \"4\",\n                    \"route_id\": \"4\",\n                    \"role_id\": \"2\",\n                    \"right_id\": \"4\",\n                    \"Routes\": {\n                        \"id\": \"4\",\n                        \"name\": \"List_Companies\",\n                        \"implicit_allow\": \"1\",\n                        \"module\": \"\"\n                    },\n                    \"Company_Roles\": {\n                        \"id\": \"2\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    },\n                    \"Rights\": {\n                        \"id\": \"4\",\n                        \"get\": \"1\",\n                        \"destroy\": \"1\",\n                        \"post\": \"1\",\n                        \"patch\": \"1\",\n                        \"put\": \"1\"\n                    }\n                },\n                {\n                    \"id\": \"5\",\n                    \"route_id\": \"5\",\n                    \"role_id\": \"2\",\n                    \"right_id\": \"5\",\n                    \"Routes\": {\n                        \"id\": \"5\",\n                        \"name\": \"Create_Company\",\n                        \"implicit_allow\": \"1\",\n                        \"module\": \"\"\n                    },\n                    \"Company_Roles\": {\n                        \"id\": \"2\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    },\n                    \"Rights\": {\n                        \"id\": \"5\",\n                        \"get\": \"1\",\n                        \"destroy\": \"1\",\n                        \"post\": \"1\",\n                        \"patch\": \"1\",\n                        \"put\": \"1\"\n                    }\n                }\n            ]\n        }\n    ]\n}"
                        },
                        "description": "Create a user",
                        "response": []
                    }
                },
                {
                    "name": "{PUT} {user}\/users\/v1\/api",
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
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"new_password\": \"1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT\",\n    \"company_roles\": [\n        {\n            \"id\": \"2\",\n            \"company_id\": \"1\",\n            \"role_name\": \"master\",\n            \"active_status\": \"1\"\n        }\n    ]\n}"
                        },
                        "description": "Currently this endpoint is only able to change a password and re-enable a disabled user\nPlease note that the User-Access-Token does not have to be the access token for the username\nyou are changing the password for.  It just needs to be a user that has rights to this endpoint.\nCurrently there is no way for the User to change their own password if they don't have rights\nto this endpoint.  So you would need to first authenticate with a user who does have rights to change\nthe password.  This could be accomplished by first enabling the default user, authenticating and updating\nthe password.  Then remember to disable the default user.",
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
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
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
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
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
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"Routes_Have_Roles\": [\n        {\n            \"route_id\": \"3\",\n            \"Rights\": {\n                \"get\": true,\n                \"post\": false,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        },\n        {\n            \"route_id\": \"6\",\n            \"Rights\": {\n                \"get\": false,\n                \"post\": true,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        }\n    ],\n    \"role_name\": \"5eb79a55d690c\"\n}"
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
                                    "value": "9",
                                    "description": "{int}"
                                }
                            ]
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"Routes_Have_Roles\": [\n        {\n            \"route_id\": \"3\",\n            \"Rights\": {\n                \"get\": true,\n                \"post\": false,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        },\n        {\n            \"route_id\": \"6\",\n            \"Rights\": {\n                \"get\": false,\n                \"post\": true,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        }\n    ],\n    \"role_name\": \"5eb79a58d1010\"\n}"
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
                                    "value": "9",
                                    "description": "{int}"
                                }
                            ]
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
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
                    "name": "{GET} companies\/v1\/api",
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
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "secret-token",
                                "value": "HR1O3+JO.8fUGBTR24NR1YQYSw9UtFOdos?zXdpa$ZFs+ra8"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "List all companies",
                        "response": []
                    }
                },
                {
                    "name": "{POST} company\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/companies",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "secret-token",
                                "value": "HR1O3+JO.8fUGBTR24NR1YQYSw9UtFOdos?zXdpa$ZFs+ra8"
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
                    "name": "{DELETE} {company}\/companies\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/companies\/:company",
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
                                    "value": "14",
                                    "description": "{int}"
                                }
                            ]
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "secret-token",
                                "value": "HR1O3+JO.8fUGBTR24NR1YQYSw9UtFOdos?zXdpa$ZFs+ra8"
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
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "secret-token",
                                "value": "HR1O3+JO.8fUGBTR24NR1YQYSw9UtFOdos?zXdpa$ZFs+ra8"
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
                    "name": "{GET} routes\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/routes",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "secret-token",
                                "value": "HR1O3+JO.8fUGBTR24NR1YQYSw9UtFOdos?zXdpa$ZFs+ra8"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "See all the endpoints and if their explicit rights",
                        "response": []
                    }
                },
                {
                    "name": "{PUT} default_user\/{company}\/v1\/api\n\nThis endpoint is exclusively to re-enable the default user specified\nit should be used when for some reason ALL users in a company are locked out\nor at least one person doesn't have all rights.",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/:company\/defaultuser\/:defaultuser",
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
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "secret-token",
                                "value": "HR1O3+JO.8fUGBTR24NR1YQYSw9UtFOdos?zXdpa$ZFs+ra8"
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
            "name": "Universal Objects",
            "description": "",
            "item": [
                {
                    "name": "{PUT} {people}\/peoples\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/peoples\/:people",
                            "query": [],
                            "variable": [
                                {
                                    "id": "people",
                                    "key": "people",
                                    "value": "1",
                                    "description": "{int}"
                                }
                            ]
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"first_name\": \"Bobby\",\n    \"last_name\": \"Grillman\",\n    \"title\": \"The Founder\",\n    \"description\": \"Amazing Biceps\",\n    \"email\": \"Bob@amazingbiceps.com\"\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "{DELETE} {employee}\/employees\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/peoples\/:people",
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
                                    "id": "people",
                                    "key": "people",
                                    "value": "1",
                                    "description": "{int}"
                                }
                            ]
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
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
                    "name": "{PUT} {address}\/addresses\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/addresses\/:address",
                            "query": [],
                            "variable": [
                                {
                                    "id": "address",
                                    "key": "address",
                                    "value": "1",
                                    "description": "{int}"
                                }
                            ]
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"description\": \"Physical\",\n    \"city\": \"Sand Iago\",\n    \"state\": \"OR\",\n    \"street1\": \"1234 NW Front St\",\n    \"street2\": \"Suite 203\",\n    \"zip\": \"97123\",\n    \"lat\": \"123.000001254\",\n    \"lng\": \"-312.45675\",\n    \"url\": \"\",\n    \"google_id\": \"\"\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "{DELETE} {address}\/addresses\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/addresses\/:address",
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
                                    "id": "address",
                                    "key": "address",
                                    "value": "1",
                                    "description": "{int}"
                                }
                            ]
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
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
                    "name": "{PUT} {tag}\/tags\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/tags\/:tag",
                            "query": [],
                            "variable": [
                                {
                                    "id": "tag",
                                    "key": "tag",
                                    "value": "",
                                    "description": "{int}"
                                }
                            ]
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"tag_name\": \"5eb79a5c14118\"\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "{DELETE} {tag}\/tags\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/tags\/:tag",
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
                                    "id": "tag",
                                    "key": "tag",
                                    "value": "",
                                    "description": "{int}"
                                }
                            ]
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
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
                    "name": "{PUT} {phonenumber}\/phonenumbers\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/phonenumbers\/:phonenumber",
                            "query": [],
                            "variable": [
                                {
                                    "id": "phonenumber",
                                    "key": "phonenumber",
                                    "value": "1",
                                    "description": "{int}"
                                }
                            ]
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"description\": \"cell\",\n    \"area_code\": \"503\",\n    \"prefix\": \"828\",\n    \"suffix\": \"7180\",\n    \"ext\": \"1234\",\n    \"country_code\": \"1\"\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "{DELETE} {phonenumber}\/phonenumbers\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/phonenumbers\/:phonenumber",
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
                                    "id": "phonenumber",
                                    "key": "phonenumber",
                                    "value": "1",
                                    "description": "{int}"
                                }
                            ]
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "m1bFopC8GieFyzb.Kjb04fS6eFrkmCgcwIU6qIiVzoOcp"
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
    -G "https://project.dsfellowship.com/api/v1/routes" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "secret-token: HR1O3+JO.8fUGBTR24NR1YQYSw9UtFOdos?zXdpa$ZFs+ra8"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/routes"
);

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "secret-token": "HR1O3+JO.8fUGBTR24NR1YQYSw9UtFOdos?zXdpa$ZFs+ra8",
    "Content-Type": "application/json",
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
                "apidoc.json - 9": 9,
                "Create_Company - 5": 5,
                "Create_Credit_Status - 25": 25,
                "Create_Customer - 21": 21,
                "Create_Customer_Address - 33": 33,
                "Create_Customer_Phone_Number - 38": 38,
                "Create_Customer_Tag - 45": 45,
                "Create_Employee - 16": 16,
                "Create_Equipment - 29": 29,
                "Create_Role - 12": 12,
                "Create_User - 3": 3,
                "Delete_Address - 35": 35,
                "Delete_Company - 36": 36,
                "Delete_Credit_Status - 27": 27,
                "Delete_Customer - 23": 23,
                "Delete_Equipment - 31": 31,
                "Delete_People - 18": 18,
                "Delete_Phone_Number - 40": 40,
                "Delete_Role - 13": 13,
                "Delete_Tag - 43": 43,
                "Delete_User - 10": 10,
                "Edit_Role - 14": 14,
                "Enable_Default_User - 11": 11,
                "List_Companies - 4": 4,
                "List_Credit_Statuses - 24": 24,
                "List_Customers - 20": 20,
                "List_Customer_Addresses - 32": 32,
                "List_Customer_Phone_Numbers - 37": 37,
                "List_Customer_Tags - 44": 44,
                "List_Employees - 15": 15,
                "List_Equipment - 28": 28,
                "List_Roles - 6": 6,
                "List_Routes - 8": 8,
                "List_Users - 2": 2,
                "twilio_token_rotate - 41": 41,
                "Update_Address - 34": 34,
                "Update_Credit_Status - 26": 26,
                "Update_Customer - 22": 22,
                "Update_Equipment - 30": 30,
                "Update_People - 17": 17,
                "Update_Phone_Number - 39": 39,
                "Update_Tag - 42": 42,
                "Update_User - 7": 7,
                "User_Signin - 1": 1,
                "User_Signout - 19": 19
            }
        },
        "exception": null
    }
}
```

### HTTP Request
`GET api/v1/routes`


<!-- END_392f39a571495220f725e466d873f08b -->

<!-- START_5801090f750b2ce9f663ab6aa53090e0 -->
## {PUT} default_user/{company}/v1/api

This endpoint is exclusively to re-enable the default user specified
it should be used when for some reason ALL users in a company are locked out
or at least one person doesn&#039;t have all rights.

> Example request:

```bash
curl -X PUT \
    "https://project.dsfellowship.com/api/v1/1/defaultuser/1" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "secret-token: HR1O3+JO.8fUGBTR24NR1YQYSw9UtFOdos?zXdpa$ZFs+ra8"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/defaultuser/1"
);

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "secret-token": "HR1O3+JO.8fUGBTR24NR1YQYSw9UtFOdos?zXdpa$ZFs+ra8",
    "Content-Type": "application/json",
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
`PUT api/v1/{company}/defaultuser/{defaultuser}`

`PATCH api/v1/{company}/defaultuser/{defaultuser}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `company` |  required  | {integer} The ID of the organization
    `user` |  optional  | {string} default username.  Not required. In fact will be overridden

<!-- END_5801090f750b2ce9f663ab6aa53090e0 -->

#Universal Objects


<!-- START_88fd2695ee6fa84ecd268c1eb91a3831 -->
## {PUT} {people}/peoples/v1/api

> Example request:

```bash
curl -X PUT \
    "https://project.dsfellowship.com/api/v1/peoples/11" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe" \
    -H "Content-Type: application/json" \
    -d '{"first_name":"Bobby","last_name":"Grillman","title":"The Founder","description":"Amazing Biceps","email":"Bob@amazingbiceps.com"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/peoples/11"
);

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
};

let body = {
    "first_name": "Bobby",
    "last_name": "Grillman",
    "title": "The Founder",
    "description": "Amazing Biceps",
    "email": "Bob@amazingbiceps.com"
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
    "message": "People Updated",
    "People": {
        "id": "11",
        "first_name": "Bobby",
        "last_name": "Grillman",
        "title": "The Founder",
        "email": "Bob@amazingbiceps.com",
        "description": "Amazing Biceps",
        "active_status": "1",
        "company_id": "1"
    }
}
```

### HTTP Request
`PUT api/v1/peoples/{people}`

`PATCH api/v1/peoples/{people}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `people` |  required  | {int}
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `first_name` | string |  optional  | {string}
        `last_name` | string |  optional  | {string}
        `title` | string |  optional  | {string}
        `description` | string |  optional  | {string}
        `email` | string |  optional  | {string}
    
<!-- END_88fd2695ee6fa84ecd268c1eb91a3831 -->

<!-- START_0f38ec150d94fe83a004d5c5384a61b7 -->
## {DELETE} {employee}/employees/v1/api

> Example request:

```bash
curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/peoples/11?active_status=" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/peoples/11"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
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
    "message": "People Deleted"
}
```

### HTTP Request
`DELETE api/v1/peoples/{people}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `people` |  required  | {int}
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `active_status` |  required  | {bool} When true object will be marked inactive.  When false the object will be deleted.

<!-- END_0f38ec150d94fe83a004d5c5384a61b7 -->

<!-- START_4b5e5f5e131df696d52d14d4875fe7d6 -->
## {PUT} {address}/addresses/v1/api

> Example request:

```bash
curl -X PUT \
    "https://project.dsfellowship.com/api/v1/addresses/11" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe" \
    -H "Content-Type: application/json" \
    -d '{"description":"Physical","city":"Sand Iago","state":"OR","street1":"1234 NW Front St","street2":"Suite 203","zip":"97123","lat":"123.000001254","lng":"-312.45675","url":"","google_id":""}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/addresses/11"
);

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
};

let body = {
    "description": "Physical",
    "city": "Sand Iago",
    "state": "OR",
    "street1": "1234 NW Front St",
    "street2": "Suite 203",
    "zip": "97123",
    "lat": "123.000001254",
    "lng": "-312.45675",
    "url": "",
    "google_id": ""
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
    "message": "Address Updated",
    "Address": {
        "id": "11",
        "description": "Physical",
        "name": "",
        "street1": "1234 NW Front St",
        "street2": "Suite 203",
        "city": "Sand Iago",
        "state": "OR",
        "zip": "97123",
        "lat": "123.000001254",
        "lng": "-312.45675",
        "url": "",
        "google_id": "",
        "company_id": "1"
    }
}
```

### HTTP Request
`PUT api/v1/addresses/{address}`

`PATCH api/v1/addresses/{address}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `address` |  required  | {int}
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `description` | string |  optional  | {string}
        `city` | string |  optional  | {string}
        `state` | string |  optional  | {string}
        `street1` | string |  optional  | {string}
        `street2` | string |  optional  | {string}
        `zip` | string |  optional  | {string}
        `lat` | string |  optional  | {string} Latitude Coordinate
        `lng` | string |  optional  | {string} Longitude Coordinate
        `url` | string |  optional  | {string} a url you would like to link to this address.
        `google_id` | string |  optional  | {string} if present supply the google location id for extra google features
    
<!-- END_4b5e5f5e131df696d52d14d4875fe7d6 -->

<!-- START_6be3601e0e26cb2c00bffdad74949b0e -->
## {DELETE} {address}/addresses/v1/api

> Example request:

```bash
curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/addresses/11?active_status=" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/addresses/11"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
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
    "message": "Address Deleted"
}
```

### HTTP Request
`DELETE api/v1/addresses/{address}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `address` |  required  | {int}
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `active_status` |  required  | {bool} When true object will be marked inactive.  When false the object will be deleted.

<!-- END_6be3601e0e26cb2c00bffdad74949b0e -->

<!-- START_bc9cb4c2371521e7e1379696effcfa43 -->
## {PUT} {tag}/tags/v1/api

> Example request:

```bash
curl -X PUT \
    "https://project.dsfellowship.com/api/v1/tags/6" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe" \
    -H "Content-Type: application/json" \
    -d '{"tag_name":"5eb7a0d172bb0"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/tags/6"
);

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
};

let body = {
    "tag_name": "5eb7a0d172bb0"
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
    "message": "Tag Updated",
    "Tag": {
        "id": "6",
        "name": "5eb7a0d172bb0",
        "company_id": "1",
        "object_table_name": "Customers"
    }
}
```

### HTTP Request
`PUT api/v1/tags/{tag}`

`PATCH api/v1/tags/{tag}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `tag` |  required  | {int}
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `tag_name` | string |  required  | {string}
    
<!-- END_bc9cb4c2371521e7e1379696effcfa43 -->

<!-- START_a5d0790b7aa15c5f66eac1ae30c9a136 -->
## {DELETE} {tag}/tags/v1/api

> Example request:

```bash
curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/tags/6?active_status=" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/tags/6"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
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
    "message": "Tag Deleted"
}
```

### HTTP Request
`DELETE api/v1/tags/{tag}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `tag` |  required  | {int}
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `active_status` |  required  | {bool} When true object will be marked inactive.  When false the object will be deleted.

<!-- END_a5d0790b7aa15c5f66eac1ae30c9a136 -->

<!-- START_18dce138f62ceade24d48d10e034bdf8 -->
## {PUT} {phonenumber}/phonenumbers/v1/api

> Example request:

```bash
curl -X PUT \
    "https://project.dsfellowship.com/api/v1/phonenumbers/2" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe" \
    -H "Content-Type: application/json" \
    -d '{"description":"cell","area_code":"503","prefix":"828","suffix":"7180","ext":"1234","country_code":"1"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/phonenumbers/2"
);

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
};

let body = {
    "description": "cell",
    "area_code": "503",
    "prefix": "828",
    "suffix": "7180",
    "ext": "1234",
    "country_code": "1"
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
    "message": "Phone Number Updated",
    "Phone Number": {
        "id": "2",
        "description": "cell",
        "country_code": 1,
        "area_code": 503,
        "prefix": 828,
        "suffix": 7180,
        "ext": 1234,
        "type": "mobile",
        "carrier": "Verizon Wireless",
        "company_id": "1"
    }
}
```

### HTTP Request
`PUT api/v1/phonenumbers/{phonenumber}`

`PATCH api/v1/phonenumbers/{phonenumber}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `phonenumber` |  required  | {int}
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `description` | string |  optional  | {string}
        `area_code` | int |  optional  | {int}
        `prefix` | int |  optional  | {int}
        `suffix` | int |  optional  | {int}
        `ext` | int |  optional  | {int}
        `country_code` | int |  optional  | {int}
    
<!-- END_18dce138f62ceade24d48d10e034bdf8 -->

<!-- START_f6d874671d4ebba08364ec4dca2ff7af -->
## {DELETE} {phonenumber}/phonenumbers/v1/api

> Example request:

```bash
curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/phonenumbers/2?active_status=" \
    -H "Accept: application/json" \
    -H "client-id: 1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT" \
    -H "User-Access-Token: c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/phonenumbers/2"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "client-id": "1m4m46l7SoSj5R.M4NS8$gf=yn?MtqkT",
    "User-Access-Token": "c?Vn2mNbUmKF2v?dgzbPgRsjQxzv$WmbBHQfGo=mITTfe",
    "Content-Type": "application/json",
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
    "message": "Phone Number Deleted"
}
```

### HTTP Request
`DELETE api/v1/phonenumbers/{phonenumber}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `phonenumber` |  required  | {int}
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `active_status` |  required  | {bool} When true object will be marked inactive.  When false the object will be deleted.

<!-- END_f6d874671d4ebba08364ec4dca2ff7af -->


