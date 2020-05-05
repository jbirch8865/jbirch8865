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
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "secret-token: Rm$6fDJn=BHuSyR$EJcCn2GyKcl2Mx+=ztF?pcUgR2jQT+?w" \
    -d '{"user":"default","password":"BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/signin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "secret-token": "Rm$6fDJn=BHuSyR$EJcCn2GyKcl2Mx+=ztF?pcUgR2jQT+?w",
};

let body = {
    "user": "default",
    "password": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
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
        "id": "12",
        "client_id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
        "access_token": "0X1YZ54Wq4l?Zi5Qu+roBgQd8m1BgysElU=DDpvvL6Xxn",
        "user_id": "57",
        "experation_timestamp": "2020-05-04 06:20:03"
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
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+"
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
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
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
        "id": "12",
        "client_id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
        "access_token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
        "user_id": "57",
        "experation_timestamp": "2020-05-04 06:10:13"
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
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+"
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
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
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
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+" \
    -d '{"first_name":"Bob","last_name":"Grillman","title":"The Builder","description":"Amazing Biceps","email":"Bob@amazingbiceps.com"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/employees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
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
        "id": 20,
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

<!-- START_ae78e363d7824b20483f3bf00da06146 -->
## {POST} credit_statuses/v1/api

> Example request:

```bash
curl -X POST \
    "https://project.dsfellowship.com/api/v1/credit_statuses" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+" \
    -d '{"name":"Good"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/credit_statuses"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
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
        "id": 26,
        "credit_status_name": "Good",
        "company_id": 1,
        "active_status": 1
    }
}
```

### HTTP Request
`POST api/v1/credit_statuses`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | {string}
    
<!-- END_ae78e363d7824b20483f3bf00da06146 -->

<!-- START_ee8f0ed845b360f577e52399c18ac577 -->
## {GET} credit_statuses/v1/api

> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/credit_statuses?include_disabled_objects=&include_details=2&details_offset=0&details_limit=5&limit=10&offset=0" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/credit_statuses"
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
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
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
        "Good - 26": {
            "id": "26",
            "credit_status_name": "Good",
            "company_id": "1",
            "active_status": "1",
            "Companies": {
                "id": "1",
                "company_name": "System",
                "active_status": "1",
                "Company_Configs": [
                    {
                        "id": "52",
                        "company_id": "1",
                        "config_id": "1",
                        "config_value": "UTC",
                        "active_status": "1"
                    }
                ],
                "Company_Roles": [
                    {
                        "id": "66",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ],
                "Credit_Statuses": [
                    {
                        "id": "26",
                        "credit_status_name": "Good",
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
`GET api/v1/credit_statuses`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `include_disabled_objects` |  optional  | {bool}
    `include_details` |  optional  | {int} Include the entire object model of the object.  If set the integer determines how many levels deep you want to return for related objects.
    `details_offset` |  optional  | {int} If include_details is false this is ignored.  For related objects which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.
    `details_limit` |  optional  | {int} If include_details is false this is ignored.  For related objects how many do you want to return. Must be a number between 1 and 25.
    `limit` |  optional  | {int} How many objects do you want to return. Must be a number between 1 and 100.
    `offset` |  optional  | {int} Which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.

<!-- END_ee8f0ed845b360f577e52399c18ac577 -->

<!-- START_8373bb28a1572074b02e7a56846e9edc -->
## {PUT} {credit_status}/credit_statuses/v1/api

> Example request:

```bash
curl -X PUT \
    "https://project.dsfellowship.com/api/v1/credit_statuses/26" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+" \
    -d '{"name":"Good 80"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/credit_statuses/26"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
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
        "id": "26",
        "credit_status_name": "Good 80",
        "company_id": "1",
        "active_status": "1"
    }
}
```

### HTTP Request
`PUT api/v1/credit_statuses/{credit_status}`

`PATCH api/v1/credit_statuses/{credit_status}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `credit_status` |  required  | {int}
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  optional  | {string}
    
<!-- END_8373bb28a1572074b02e7a56846e9edc -->

<!-- START_d113b631052d46d41c6de1f91d8905f4 -->
## {POST} customers/v1/api

> Example request:

```bash
curl -X POST \
    "https://project.dsfellowship.com/api/v1/customers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+" \
    -d '{"customer_name":"Bob The Builder","credit_status":26,"ccb":"","website":"www.amazingbiceps.com"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/customers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
};

let body = {
    "customer_name": "Bob The Builder",
    "credit_status": 26,
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
        "id": 26,
        "customer_name": "Bob The Builder",
        "credit_status": 26,
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
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+"
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
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
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
        "Bob The Builder - 26": {
            "id": "26",
            "customer_name": "Bob The Builder",
            "credit_status": "26",
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
                        "id": "52",
                        "company_id": "1",
                        "config_id": "1",
                        "config_value": "UTC",
                        "active_status": "1"
                    }
                ],
                "Company_Roles": [
                    {
                        "id": "66",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ],
                "Credit_Statuses": [
                    {
                        "id": "26",
                        "credit_status_name": "Good 80",
                        "company_id": "1",
                        "active_status": "1"
                    }
                ]
            },
            "Credit_Statuses": {
                "id": "26",
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
    "https://project.dsfellowship.com/api/v1/customers/26" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+" \
    -d '{"customer_name":"Bob and Son The Builders","credit_status":26,"ccb":"","website":"www.amazingbiceps.com"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/customers/26"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
};

let body = {
    "customer_name": "Bob and Son The Builders",
    "credit_status": 26,
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
        "id": "26",
        "customer_name": "Bob and Son The Builders",
        "credit_status": 26,
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
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+" \
    -d '{"equipment_name":"F3452"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/equipment"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
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
        "id": 26,
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
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+"
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
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
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
        "F3452 - 26": {
            "id": "26",
            "equipment_name": "F3452",
            "company_id": "1",
            "active_status": "1",
            "Companies": {
                "id": "1",
                "company_name": "System",
                "active_status": "1",
                "Company_Configs": [
                    {
                        "id": "52",
                        "company_id": "1",
                        "config_id": "1",
                        "config_value": "UTC",
                        "active_status": "1"
                    }
                ],
                "Company_Roles": [
                    {
                        "id": "66",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ],
                "Equipments": [
                    {
                        "id": "26",
                        "equipment_name": "F3452",
                        "company_id": "1",
                        "active_status": "1"
                    }
                ],
                "Credit_Statuses": [
                    {
                        "id": "26",
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
    "https://project.dsfellowship.com/api/v1/equipment/26" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+" \
    -d '{"equipment_name":"F3453"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/equipment/26"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
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
        "id": "26",
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
    "https://project.dsfellowship.com/api/v1/equipment/26?active_status=" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/equipment/26"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
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

<!-- START_2a14a188f45b7e75b826287c6fdc8cc3 -->
## {GET} customer_addresses/{customer}/customers/v1/api

> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/customers/26/customer_addresses?include_disabled_objects=&include_details=2&details_offset=0&details_limit=5&limit=10&offset=0" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/customers/26/customer_addresses"
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
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
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
`GET api/v1/customers/{customer}/customer_addresses`

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

<!-- END_2a14a188f45b7e75b826287c6fdc8cc3 -->

<!-- START_6a0206ccbd4b64accfaf0a7b659292ed -->
## {POST} customer_addresses/{customer}/customers/v1/api

> Example request:

```bash
curl -X POST \
    "https://project.dsfellowship.com/api/v1/customers/26/customer_addresses" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+" \
    -d '{"customer_id":26,"description":"Physical","city":"Portland","state":"OR","street1":"1234 NW Front St","street2":"Suite 203","zip":"97123","lat":"123.000001254","lng":"-312.45675","url":"","google_id":""}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/customers/26/customer_addresses"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
};

let body = {
    "customer_id": 26,
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
        "id": 19,
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
`POST api/v1/customers/{customer}/customer_addresses`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `customer` |  required  | {int}
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `customer_id` | int |  required  | {int}
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
    
<!-- END_6a0206ccbd4b64accfaf0a7b659292ed -->

<!-- START_dbe522f7ae20a209a9068bfaefe9fc01 -->
## {DELETE} {customer}/customers/v1/api

> Example request:

```bash
curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/customers/26?active_status=" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/customers/26"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
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

<!-- START_7e6176fbd50cfd97beab0ab609ac833b -->
## {DELETE} {credit_status}/credit_statuses/v1/api

> Example request:

```bash
curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/credit_statuses/26?active_status=" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/credit_statuses/26"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
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
`DELETE api/v1/credit_statuses/{credit_status}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `credit_status` |  required  | {int}
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `active_status` |  required  | {bool} When true object will be marked inactive.  When false the object will be deleted.

<!-- END_7e6176fbd50cfd97beab0ab609ac833b -->

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
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+"
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
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
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
                "id": "57",
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
                            "id": "52",
                            "company_id": "1",
                            "config_id": "1",
                            "config_value": "UTC",
                            "active_status": "1"
                        }
                    ],
                    "Company_Roles": [
                        {
                            "id": "66",
                            "company_id": "1",
                            "role_name": "master",
                            "active_status": "1"
                        }
                    ]
                },
                "Users_Have_Roles": [
                    {
                        "id": "79",
                        "user_id": "57",
                        "role_id": "66",
                        "Company_Roles": {
                            "id": "66",
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
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+" \
    -d '{"user":"new_user","password":"BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK","company_roles":[{"id":"66","company_id":"1","role_name":"master","active_status":"1","Companies":{"id":"1","company_name":"System","active_status":"1","Company_Configs":[{"id":"52","company_id":"1","config_id":"1","config_value":"UTC","active_status":"1"}],"Company_Roles":[{"id":"66","company_id":"1","role_name":"master","active_status":"1"}]},"Users_Have_Roles":[{"id":"79","user_id":"57","role_id":"66","Company_Roles":{"id":"66","company_id":"1","role_name":"master","active_status":"1"}}],"Routes_Have_Roles":[{"id":"1959","route_id":"25","role_id":"66","right_id":"1959","Routes":{"id":"25","name":"Create_Credit_Status","implicit_allow":"0","module":"CDM"},"Company_Roles":{"id":"66","company_id":"1","role_name":"master","active_status":"1"},"Rights":{"id":"1959","get":"1","destroy":"1","post":"1","patch":"1","put":"1"}},{"id":"1960","route_id":"21","role_id":"66","right_id":"1960","Routes":{"id":"21","name":"Create_Customer","implicit_allow":"0","module":"CDM"},"Company_Roles":{"id":"66","company_id":"1","role_name":"master","active_status":"1"},"Rights":{"id":"1960","get":"1","destroy":"1","post":"1","patch":"1","put":"1"}},{"id":"1961","route_id":"33","role_id":"66","right_id":"1961","Routes":{"id":"33","name":"Create_Customer_Address","implicit_allow":"0","module":"CDM"},"Company_Roles":{"id":"66","company_id":"1","role_name":"master","active_status":"1"},"Rights":{"id":"1961","get":"1","destroy":"1","post":"1","patch":"1","put":"1"}},{"id":"1962","route_id":"16","role_id":"66","right_id":"1962","Routes":{"id":"16","name":"Create_Employee","implicit_allow":"0","module":"CDM"},"Company_Roles":{"id":"66","company_id":"1","role_name":"master","active_status":"1"},"Rights":{"id":"1962","get":"1","destroy":"1","post":"1","patch":"1","put":"1"}},{"id":"1963","route_id":"29","role_id":"66","right_id":"1963","Routes":{"id":"29","name":"Create_Equipment","implicit_allow":"0","module":"CDM"},"Company_Roles":{"id":"66","company_id":"1","role_name":"master","active_status":"1"},"Rights":{"id":"1963","get":"1","destroy":"1","post":"1","patch":"1","put":"1"}}]}]}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
};

let body = {
    "user": "new_user",
    "password": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "company_roles": [
        {
            "id": "66",
            "company_id": "1",
            "role_name": "master",
            "active_status": "1",
            "Companies": {
                "id": "1",
                "company_name": "System",
                "active_status": "1",
                "Company_Configs": [
                    {
                        "id": "52",
                        "company_id": "1",
                        "config_id": "1",
                        "config_value": "UTC",
                        "active_status": "1"
                    }
                ],
                "Company_Roles": [
                    {
                        "id": "66",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ]
            },
            "Users_Have_Roles": [
                {
                    "id": "79",
                    "user_id": "57",
                    "role_id": "66",
                    "Company_Roles": {
                        "id": "66",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                }
            ],
            "Routes_Have_Roles": [
                {
                    "id": "1959",
                    "route_id": "25",
                    "role_id": "66",
                    "right_id": "1959",
                    "Routes": {
                        "id": "25",
                        "name": "Create_Credit_Status",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "66",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1959",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "1960",
                    "route_id": "21",
                    "role_id": "66",
                    "right_id": "1960",
                    "Routes": {
                        "id": "21",
                        "name": "Create_Customer",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "66",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1960",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "1961",
                    "route_id": "33",
                    "role_id": "66",
                    "right_id": "1961",
                    "Routes": {
                        "id": "33",
                        "name": "Create_Customer_Address",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "66",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1961",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "1962",
                    "route_id": "16",
                    "role_id": "66",
                    "right_id": "1962",
                    "Routes": {
                        "id": "16",
                        "name": "Create_Employee",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "66",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1962",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "1963",
                    "route_id": "29",
                    "role_id": "66",
                    "right_id": "1963",
                    "Routes": {
                        "id": "29",
                        "name": "Create_Equipment",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "66",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1963",
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
        "id": 63,
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
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+" \
    -d '{"new_password":"BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK","company_roles":[{"id":"66","company_id":"1","role_name":"master","active_status":"1"}]}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/users/new_user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
};

let body = {
    "new_password": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "company_roles": [
        {
            "id": "66",
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
        "id": "63",
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
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+"
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
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
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
        "id": "63",
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
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+"
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
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
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
        "master - 66": {
            "id": "66",
            "company_id": "1",
            "role_name": "master",
            "active_status": "1",
            "Companies": {
                "id": "1",
                "company_name": "System",
                "active_status": "1",
                "Company_Configs": [
                    {
                        "id": "52",
                        "company_id": "1",
                        "config_id": "1",
                        "config_value": "UTC",
                        "active_status": "1"
                    }
                ],
                "Company_Roles": [
                    {
                        "id": "66",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ]
            },
            "Users_Have_Roles": [
                {
                    "id": "79",
                    "user_id": "57",
                    "role_id": "66",
                    "Company_Roles": {
                        "id": "66",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                }
            ],
            "Routes_Have_Roles": [
                {
                    "id": "1959",
                    "route_id": "25",
                    "role_id": "66",
                    "right_id": "1959",
                    "Routes": {
                        "id": "25",
                        "name": "Create_Credit_Status",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "66",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1959",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "1960",
                    "route_id": "21",
                    "role_id": "66",
                    "right_id": "1960",
                    "Routes": {
                        "id": "21",
                        "name": "Create_Customer",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "66",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1960",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "1961",
                    "route_id": "33",
                    "role_id": "66",
                    "right_id": "1961",
                    "Routes": {
                        "id": "33",
                        "name": "Create_Customer_Address",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "66",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1961",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "1962",
                    "route_id": "16",
                    "role_id": "66",
                    "right_id": "1962",
                    "Routes": {
                        "id": "16",
                        "name": "Create_Employee",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "66",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1962",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "1963",
                    "route_id": "29",
                    "role_id": "66",
                    "right_id": "1963",
                    "Routes": {
                        "id": "29",
                        "name": "Create_Equipment",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "66",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1963",
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
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+" \
    -d '{"Routes_Have_Roles":[{"route_id":"3","Rights":{"get":true,"post":false,"patch":false,"put":false,"destroy":false}},{"route_id":"6","Rights":{"get":false,"post":true,"patch":false,"put":false,"destroy":false}}],"role_name":"5eafb2ea3f184"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/roles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
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
    "role_name": "5eafb2ea3f184"
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
        "id": "73",
        "company_id": "1",
        "role_name": "5eafb2ea3f184",
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
    "https://project.dsfellowship.com/api/v1/roles/73" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+" \
    -d '{"Routes_Have_Roles":[{"route_id":"3","Rights":{"get":true,"post":false,"patch":false,"put":false,"destroy":false}},{"route_id":"6","Rights":{"get":false,"post":true,"patch":false,"put":false,"destroy":false}}],"role_name":"5eafb2eb71a08"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/roles/73"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
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
    "role_name": "5eafb2eb71a08"
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
        "id": "73",
        "company_id": "1",
        "role_name": "5eafb2eb71a08",
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
    
<!-- END_81ac9047f8db2b92092c5a7f13e5d28d -->

<!-- START_04c524fc2f0ea8c793406426144b4c71 -->
## {DELETE} roles/v1/api

> Example request:

```bash
curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/roles/73?active_status=" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/roles/73"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
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
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "secret-token: Rm$6fDJn=BHuSyR$EJcCn2GyKcl2Mx+=ztF?pcUgR2jQT+?w"
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
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "secret-token": "Rm$6fDJn=BHuSyR$EJcCn2GyKcl2Mx+=ztF?pcUgR2jQT+?w",
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
                    "id": "52",
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
                    "id": "51",
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
                    "id": "66",
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
                            "id": "79",
                            "user_id": "57",
                            "role_id": "66"
                        }
                    ],
                    "Routes_Have_Roles": [
                        {
                            "id": "1959",
                            "route_id": "25",
                            "role_id": "66",
                            "right_id": "1959"
                        }
                    ]
                }
            ]
        },
        "documentation_company - 89": {
            "id": "89",
            "company_name": "documentation_company",
            "active_status": "1",
            "Company_Configs": [
                {
                    "id": "50",
                    "company_id": "89",
                    "config_id": "1",
                    "config_value": "UTC",
                    "active_status": "1",
                    "Companies": {
                        "id": "89",
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
                    "id": "49",
                    "company_id": "89",
                    "config_id": "2",
                    "config_value": "300",
                    "active_status": "1",
                    "Companies": {
                        "id": "89",
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
                    "id": "64",
                    "company_id": "89",
                    "role_name": "master",
                    "active_status": "1",
                    "Companies": {
                        "id": "89",
                        "company_name": "documentation_company",
                        "active_status": "1"
                    },
                    "Users_Have_Roles": [
                        {
                            "id": "77",
                            "user_id": "56",
                            "role_id": "64"
                        }
                    ],
                    "Routes_Have_Roles": [
                        {
                            "id": "1899",
                            "route_id": "25",
                            "role_id": "64",
                            "right_id": "1899"
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
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "secret-token: Rm$6fDJn=BHuSyR$EJcCn2GyKcl2Mx+=ztF?pcUgR2jQT+?w" \
    -d '{"company_name":"documentation_company"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/companies"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "secret-token": "Rm$6fDJn=BHuSyR$EJcCn2GyKcl2Mx+=ztF?pcUgR2jQT+?w",
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
    "master_password": "156i=xSwD+5zWH",
    "company": {
        "id": 103,
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
    "https://project.dsfellowship.com/api/v1/companies/103?active_status=" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "secret-token: Rm$6fDJn=BHuSyR$EJcCn2GyKcl2Mx+=ztF?pcUgR2jQT+?w"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/companies/103"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "secret-token": "Rm$6fDJn=BHuSyR$EJcCn2GyKcl2Mx+=ztF?pcUgR2jQT+?w",
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
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "secret-token: Rm$6fDJn=BHuSyR$EJcCn2GyKcl2Mx+=ztF?pcUgR2jQT+?w"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/doc.json"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "secret-token": "Rm$6fDJn=BHuSyR$EJcCn2GyKcl2Mx+=ztF?pcUgR2jQT+?w",
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
        "_postman_id": "4d8b2889-c21f-4485-ad29-3bdf2c82cf23",
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
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "secret-token",
                                "value": "Rm$6fDJn=BHuSyR$EJcCn2GyKcl2Mx+=ztF?pcUgR2jQT+?w"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"user\": \"default\",\n    \"password\": \"BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK\"\n}"
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
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
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
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
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
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
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
                    "name": "{POST} credit_statuses\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/credit_statuses",
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
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
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
                    "name": "{GET} credit_statuses\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/credit_statuses",
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
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
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
                    "name": "{PUT} {credit_status}\/credit_statuses\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/credit_statuses\/:credit_status",
                            "query": [],
                            "variable": [
                                {
                                    "id": "credit_status",
                                    "key": "credit_status",
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
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
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
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"customer_name\": \"Bob The Builder\",\n    \"credit_status\": 24,\n    \"ccb\": \"\",\n    \"website\": \"www.amazingbiceps.com\"\n}"
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
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
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
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"customer_name\": \"Bob and Son The Builders\",\n    \"credit_status\": 24,\n    \"ccb\": \"\",\n    \"website\": \"www.amazingbiceps.com\"\n}"
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
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
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
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            },
                            {
                                "key": "client-id",
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
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
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
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
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
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
                            "path": "api\/v1\/customers\/:customer\/customer_addresses",
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
                                    "value": "24",
                                    "description": "{int}"
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
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
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
                            "path": "api\/v1\/customers\/:customer\/customer_addresses",
                            "query": [],
                            "variable": [
                                {
                                    "id": "customer",
                                    "key": "customer",
                                    "value": "24",
                                    "description": "{int}"
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
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"customer_id\": 24,\n    \"description\": \"Physical\",\n    \"city\": \"Portland\",\n    \"state\": \"OR\",\n    \"street1\": \"1234 NW Front St\",\n    \"street2\": \"Suite 203\",\n    \"zip\": \"97123\",\n    \"lat\": \"123.000001254\",\n    \"lng\": \"-312.45675\",\n    \"url\": \"\",\n    \"google_id\": \"\"\n}"
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
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
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
                    "name": "{DELETE} {credit_status}\/credit_statuses\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/credit_statuses\/:credit_status",
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
                                    "id": "credit_status",
                                    "key": "credit_status",
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
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
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
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
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
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"user\": \"new_user\",\n    \"password\": \"BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK\",\n    \"company_roles\": [\n        {\n            \"id\": \"50\",\n            \"company_id\": \"1\",\n            \"role_name\": \"master\",\n            \"active_status\": \"1\",\n            \"Companies\": {\n                \"id\": \"1\",\n                \"company_name\": \"System\",\n                \"active_status\": \"1\",\n                \"Company_Configs\": [\n                    {\n                        \"id\": \"2\",\n                        \"company_id\": \"1\",\n                        \"config_id\": \"1\",\n                        \"config_value\": \"UTC\",\n                        \"active_status\": \"1\"\n                    }\n                ],\n                \"Company_Roles\": [\n                    {\n                        \"id\": \"50\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    }\n                ],\n                \"Credit_Statuses\": [\n                    {\n                        \"id\": \"1\",\n                        \"credit_status_name\": \"Good 80\",\n                        \"company_id\": \"1\",\n                        \"active_status\": \"1\"\n                    }\n                ],\n                \"People_Belong_To_Company\": [\n                    {\n                        \"id\": \"1\",\n                        \"company_id\": \"1\",\n                        \"people_id\": \"1\"\n                    }\n                ]\n            },\n            \"Users_Have_Roles\": [\n                {\n                    \"id\": \"57\",\n                    \"user_id\": \"1\",\n                    \"role_id\": \"50\",\n                    \"Company_Roles\": {\n                        \"id\": \"50\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    }\n                }\n            ],\n            \"Routes_Have_Roles\": [\n                {\n                    \"id\": \"1473\",\n                    \"route_id\": \"25\",\n                    \"role_id\": \"50\",\n                    \"right_id\": \"1473\",\n                    \"Routes\": {\n                        \"id\": \"25\",\n                        \"name\": \"Create_Credit_Status\",\n                        \"implicit_allow\": \"0\",\n                        \"module\": \"CDM\"\n                    },\n                    \"Company_Roles\": {\n                        \"id\": \"50\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    },\n                    \"Rights\": {\n                        \"id\": \"1473\",\n                        \"get\": \"1\",\n                        \"destroy\": \"1\",\n                        \"post\": \"1\",\n                        \"patch\": \"1\",\n                        \"put\": \"1\"\n                    }\n                },\n                {\n                    \"id\": \"1474\",\n                    \"route_id\": \"21\",\n                    \"role_id\": \"50\",\n                    \"right_id\": \"1474\",\n                    \"Routes\": {\n                        \"id\": \"21\",\n                        \"name\": \"Create_Customer\",\n                        \"implicit_allow\": \"0\",\n                        \"module\": \"CDM\"\n                    },\n                    \"Company_Roles\": {\n                        \"id\": \"50\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    },\n                    \"Rights\": {\n                        \"id\": \"1474\",\n                        \"get\": \"1\",\n                        \"destroy\": \"1\",\n                        \"post\": \"1\",\n                        \"patch\": \"1\",\n                        \"put\": \"1\"\n                    }\n                },\n                {\n                    \"id\": \"1475\",\n                    \"route_id\": \"33\",\n                    \"role_id\": \"50\",\n                    \"right_id\": \"1475\",\n                    \"Routes\": {\n                        \"id\": \"33\",\n                        \"name\": \"Create_Customer_Address\",\n                        \"implicit_allow\": \"0\",\n                        \"module\": \"CDM\"\n                    },\n                    \"Company_Roles\": {\n                        \"id\": \"50\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    },\n                    \"Rights\": {\n                        \"id\": \"1475\",\n                        \"get\": \"1\",\n                        \"destroy\": \"1\",\n                        \"post\": \"1\",\n                        \"patch\": \"1\",\n                        \"put\": \"1\"\n                    }\n                },\n                {\n                    \"id\": \"1476\",\n                    \"route_id\": \"16\",\n                    \"role_id\": \"50\",\n                    \"right_id\": \"1476\",\n                    \"Routes\": {\n                        \"id\": \"16\",\n                        \"name\": \"Create_Employee\",\n                        \"implicit_allow\": \"0\",\n                        \"module\": \"CDM\"\n                    },\n                    \"Company_Roles\": {\n                        \"id\": \"50\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    },\n                    \"Rights\": {\n                        \"id\": \"1476\",\n                        \"get\": \"1\",\n                        \"destroy\": \"1\",\n                        \"post\": \"1\",\n                        \"patch\": \"1\",\n                        \"put\": \"1\"\n                    }\n                },\n                {\n                    \"id\": \"1477\",\n                    \"route_id\": \"29\",\n                    \"role_id\": \"50\",\n                    \"right_id\": \"1477\",\n                    \"Routes\": {\n                        \"id\": \"29\",\n                        \"name\": \"Create_Equipment\",\n                        \"implicit_allow\": \"0\",\n                        \"module\": \"CDM\"\n                    },\n                    \"Company_Roles\": {\n                        \"id\": \"50\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    },\n                    \"Rights\": {\n                        \"id\": \"1477\",\n                        \"get\": \"1\",\n                        \"destroy\": \"1\",\n                        \"post\": \"1\",\n                        \"patch\": \"1\",\n                        \"put\": \"1\"\n                    }\n                }\n            ]\n        }\n    ]\n}"
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
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"new_password\": \"BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK\",\n    \"company_roles\": [\n        {\n            \"id\": \"50\",\n            \"company_id\": \"1\",\n            \"role_name\": \"master\",\n            \"active_status\": \"1\"\n        }\n    ]\n}"
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
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
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
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
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
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"Routes_Have_Roles\": [\n        {\n            \"route_id\": \"3\",\n            \"Rights\": {\n                \"get\": true,\n                \"post\": false,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        },\n        {\n            \"route_id\": \"6\",\n            \"Rights\": {\n                \"get\": false,\n                \"post\": true,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        }\n    ],\n    \"role_name\": \"5eafad4cbe396\"\n}"
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
                                    "value": "61",
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
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"Routes_Have_Roles\": [\n        {\n            \"route_id\": \"3\",\n            \"Rights\": {\n                \"get\": true,\n                \"post\": false,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        },\n        {\n            \"route_id\": \"6\",\n            \"Rights\": {\n                \"get\": false,\n                \"post\": true,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        }\n    ],\n    \"role_name\": \"5eafad4e02bc9\"\n}"
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
                                    "value": "61",
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
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
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
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "secret-token",
                                "value": "Rm$6fDJn=BHuSyR$EJcCn2GyKcl2Mx+=ztF?pcUgR2jQT+?w"
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
                            "path": "api\/v1\/companies",
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
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "secret-token",
                                "value": "Rm$6fDJn=BHuSyR$EJcCn2GyKcl2Mx+=ztF?pcUgR2jQT+?w"
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
                                    "value": "88",
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
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
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
                                "value": "Rm$6fDJn=BHuSyR$EJcCn2GyKcl2Mx+=ztF?pcUgR2jQT+?w"
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
                                "key": "client-id",
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "secret-token",
                                "value": "Rm$6fDJn=BHuSyR$EJcCn2GyKcl2Mx+=ztF?pcUgR2jQT+?w"
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
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "secret-token",
                                "value": "Rm$6fDJn=BHuSyR$EJcCn2GyKcl2Mx+=ztF?pcUgR2jQT+?w"
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
                                    "value": "18",
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
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
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
                                    "value": "18",
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
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
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
                                    "value": "17",
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
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
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
                                    "value": "17",
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
                                "value": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "4FTE284FBp=3QxEIKNQS?Ckw4OnGA9YcmBOvu5h.Bzcjq"
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
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "secret-token: Rm$6fDJn=BHuSyR$EJcCn2GyKcl2Mx+=ztF?pcUgR2jQT+?w"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/routes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "secret-token": "Rm$6fDJn=BHuSyR$EJcCn2GyKcl2Mx+=ztF?pcUgR2jQT+?w",
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
                "Delete_Role - 13": 13,
                "Delete_User - 10": 10,
                "Edit_Role - 14": 14,
                "Enable_Default_User - 11": 11,
                "List_Companies - 4": 4,
                "List_Credit_Statuses - 24": 24,
                "List_Customers - 20": 20,
                "List_Customer_Addresses - 32": 32,
                "List_Employees - 15": 15,
                "List_Equipment - 28": 28,
                "List_Roles - 6": 6,
                "List_Routes - 8": 8,
                "List_Users - 2": 2,
                "Update_Address - 34": 34,
                "Update_Credit_Status - 26": 26,
                "Update_Customer - 22": 22,
                "Update_Equipment - 30": 30,
                "Update_People - 17": 17,
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
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "secret-token: Rm$6fDJn=BHuSyR$EJcCn2GyKcl2Mx+=ztF?pcUgR2jQT+?w"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/default_user/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "secret-token": "Rm$6fDJn=BHuSyR$EJcCn2GyKcl2Mx+=ztF?pcUgR2jQT+?w",
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
        "id": "57",
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

#Universal Objects


<!-- START_88fd2695ee6fa84ecd268c1eb91a3831 -->
## {PUT} {people}/peoples/v1/api

> Example request:

```bash
curl -X PUT \
    "https://project.dsfellowship.com/api/v1/peoples/20" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+" \
    -d '{"first_name":"Bobby","last_name":"Grillman","title":"The Founder","description":"Amazing Biceps","email":"Bob@amazingbiceps.com"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/peoples/20"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
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
        "id": "20",
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
    "https://project.dsfellowship.com/api/v1/peoples/20?active_status=" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/peoples/20"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
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
    "https://project.dsfellowship.com/api/v1/addresses/19" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+" \
    -d '{"description":"Physical","city":"Sand Iago","state":"OR","street1":"1234 NW Front St","street2":"Suite 203","zip":"97123","lat":"123.000001254","lng":"-312.45675","url":"","google_id":""}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/addresses/19"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
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
        "id": "19",
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
    "https://project.dsfellowship.com/api/v1/addresses/19?active_status=" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK" \
    -H "User-Access-Token: sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/addresses/19"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "BTR.5pDNVGHo$S4Qh?Lqu5Qozlm.4GIK",
    "User-Access-Token": "sHPrejSEZPqjHnUmu856uo2uklI0UG4T?cX0VIOHj1GA+",
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


