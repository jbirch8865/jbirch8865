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
## {POST} api/v1/{company}/signin

Returns a unique access_token used to authenticate in place of the username and password
The access_token experation date is based on the company_config session_timeout which is comany specific

> Example request:

```bash
curl -X POST \
    "https://project.dsfellowship.com/api/v1/1/signin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ?e+gC2UgQP3otYdJmra66Sfnslq?qxU7" \
    -H "secret-token: 6iehsRzeKNOz5jKAhkmbwD7c8B73S$++AV$uPDa0lku4YHH9" \
    -d '{"username":"default","password":"?e+gC2UgQP3otYdJmra66Sfnslq?qxU7"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/signin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "?e+gC2UgQP3otYdJmra66Sfnslq?qxU7",
    "secret-token": "6iehsRzeKNOz5jKAhkmbwD7c8B73S$++AV$uPDa0lku4YHH9",
};

let body = {
    "username": "default",
    "password": "?e+gC2UgQP3otYdJmra66Sfnslq?qxU7"
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
        "client_id": "?e+gC2UgQP3otYdJmra66Sfnslq?qxU7",
        "access_token": "Go54SYIFyLLU.q.01Mt55fZ1FoFVCWk04KrT3hzJIfLZV",
        "user_id": "1",
        "experation_timestamp": "2020-04-10 20:24:10"
    }
}
```

### HTTP Request
`POST api/v1/{company}/signin`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `company` |  required  | The ID of the organization
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `username` | string |  required  | 
        `password` | string |  required  | 
    
<!-- END_2cb38f1f812a602469c22d7858e3f5a2 -->

#Company

Basic CRUD operations for Companies, Company Configs and Users
<!-- START_98c7cd9e1616fc65c12af185be991ff8 -->
## {GET} api/v1/{company_id}/users
Return a list of users belonging to the company

> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/1/users?include_disabled=true&offset=0&limit=2" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ?e+gC2UgQP3otYdJmra66Sfnslq?qxU7" \
    -H "User-Access-Token: mpgJlNxeUgn+F0edQ8SGE8XFBNz3v5+th$4CLQYyav?7T"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/users"
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
    "client-id": "?e+gC2UgQP3otYdJmra66Sfnslq?qxU7",
    "User-Access-Token": "mpgJlNxeUgn+F0edQ8SGE8XFBNz3v5+th$4CLQYyav?7T",
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
    `company` |  required  | The ID of the organization
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `include_disabled` |  optional  | if set will only return active users
    `offset` |  optional  | a number between 0 and infinite that represents which object to start with default is 0
    `limit` |  optional  | a number between 1 and 100 representing the number of records to return after the offset default is 50

<!-- END_98c7cd9e1616fc65c12af185be991ff8 -->

<!-- START_93ebf56a5f43247bf91c25a2be5cb179 -->
## {POST} api/v1/{company}/user

Create a user

> Example request:

```bash
curl -X POST \
    "https://project.dsfellowship.com/api/v1/1/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ?e+gC2UgQP3otYdJmra66Sfnslq?qxU7" \
    -H "User-Access-Token: Kx.7tZSGZm3UB0cL1e=qBsAURoIU9P9XfBCp8=74xSCsQ" \
    -d '{"username":"default","password":"?e+gC2UgQP3otYdJmra66Sfnslq?qxU7"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "?e+gC2UgQP3otYdJmra66Sfnslq?qxU7",
    "User-Access-Token": "Kx.7tZSGZm3UB0cL1e=qBsAURoIU9P9XfBCp8=74xSCsQ",
};

let body = {
    "username": "default",
    "password": "?e+gC2UgQP3otYdJmra66Sfnslq?qxU7"
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
        "id": "1",
        "username": "default",
        "company_id": "1",
        "project_name": "project2",
        "active_status": "1"
    }
}
```

### HTTP Request
`POST api/v1/{company}/user`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `company` |  required  | The ID of the organization
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `username` | string |  required  | 
        `password` | string |  required  | 
    
<!-- END_93ebf56a5f43247bf91c25a2be5cb179 -->

<!-- START_5149dfea124049ab5e5b0e37d1c9e78e -->
## {PUT} api/v1/{company}/user/{user}
Currently this endpoint is only able to change a password
Please note that the User-Access-Token does not have to be the access token for the username
you are changing the password for.  It just needs to be a user that has rights to this endpoint.

Currently there is no way for the User to change their own password if they don't have rights
to this endpoint.  So you would need to first authenticate with a user who does have rights to change
the password.

> Example request:

```bash
curl -X PUT \
    "https://project.dsfellowship.com/api/v1/1/user/default" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ?e+gC2UgQP3otYdJmra66Sfnslq?qxU7" \
    -H "User-Access-Token: 5P8vYSZrnG+oq=Ghm1oRKedZCaJFXh0EDKbi.U=YEFCST" \
    -d '{"new_password":"?e+gC2UgQP3otYdJmra66Sfnslq?qxU7"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/user/default"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "?e+gC2UgQP3otYdJmra66Sfnslq?qxU7",
    "User-Access-Token": "5P8vYSZrnG+oq=Ghm1oRKedZCaJFXh0EDKbi.U=YEFCST",
};

let body = {
    "new_password": "?e+gC2UgQP3otYdJmra66Sfnslq?qxU7"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/v1/{company}/user/{user}`

`PATCH api/v1/{company}/user/{user}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `user` |  required  | username to change password
    `company` |  required  | The ID of the organization
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `new_password` | string |  required  | 
    
<!-- END_5149dfea124049ab5e5b0e37d1c9e78e -->

<!-- START_c694d0d5865ccb731d64c8931b1befe1 -->
## {POST} api/v1/company

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
    -H "client-id: ?e+gC2UgQP3otYdJmra66Sfnslq?qxU7" \
    -H "secret-token: 6iehsRzeKNOz5jKAhkmbwD7c8B73S$++AV$uPDa0lku4YHH9" \
    -d '{"company_name":"documentation_company"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/company"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "?e+gC2UgQP3otYdJmra66Sfnslq?qxU7",
    "secret-token": "6iehsRzeKNOz5jKAhkmbwD7c8B73S$++AV$uPDa0lku4YHH9",
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
    "master_password": "x.3GxsaZA2D=D9",
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
    `company_name` | string |  required  | 
    
<!-- END_c694d0d5865ccb731d64c8931b1befe1 -->

<!-- START_3325a7e1462036041b5bb9084e516f11 -->
## {GET} app/v1/companies
List all companies

> Example request:

```bash
curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/companies?include_disabled=true&include_details=2&details_offset=0&details_limit=1&offset=0&limit=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ?e+gC2UgQP3otYdJmra66Sfnslq?qxU7" \
    -H "secret-token: 6iehsRzeKNOz5jKAhkmbwD7c8B73S$++AV$uPDa0lku4YHH9"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/companies"
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
    "client-id": "?e+gC2UgQP3otYdJmra66Sfnslq?qxU7",
    "secret-token": "6iehsRzeKNOz5jKAhkmbwD7c8B73S$++AV$uPDa0lku4YHH9",
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
`GET api/v1/companies`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `include_disabled` |  optional  | if set will only return active companies
    `include_details` |  optional  | is a number between 0 and 5 which will return the entire object to the depth you specified default is disabled
    `details_offset` |  optional  | a number between 0 and infinite that represents which object to start with for objects relating to Companies default is 0
    `details_limit` |  optional  | a number between 1 and 25 representing the number of records to return after the offset for related objects default is 1
    `offset` |  optional  | a number between 0 and infinite that represents which object to start with default is 0
    `limit` |  optional  | a number between 1 and 100 representing the number of records to return after the offset default is 50

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
    -H "User-Access-Token: tiMgUVkJ.DotF6R?6mfCHqfR$dsR8LhgxYbaeRWwHj?04"
```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/doc.json"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "User-Access-Token": "tiMgUVkJ.DotF6R?6mfCHqfR$dsR8LhgxYbaeRWwHj?04",
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
        "_postman_id": "8904bbf7-4b60-4006-a0a7-787648ddc573",
        "description": "",
        "schema": "https:\/\/schema.getpostman.com\/json\/collection\/v2.0.0\/collection.json"
    },
    "item": [
        {
            "name": "Authentication",
            "description": "Requesting an End User Access Token for authenticating future requests",
            "item": [
                {
                    "name": "{POST} api\/v1\/{company}\/signin",
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
                                    "description": "The ID of the organization"
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
                                "value": "FYE?0YgY.DuO1$a4W=XTfLE6JSVLAQki"
                            },
                            {
                                "key": "secret-token",
                                "value": "Ah3U+s.7mNFJ=CRqA6qELfcs+0GWrBt9S$.qJSqTmerSI764"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"username\": \"default\",\n    \"password\": \"FYE?0YgY.DuO1$a4W=XTfLE6JSVLAQki\"\n}"
                        },
                        "description": "Returns a unique access_token used to authenticate in place of the username and password\nThe access_token experation date is based on the company_config session_timeout which is comany specific",
                        "response": []
                    }
                }
            ]
        },
        {
            "name": "Company",
            "description": "",
            "item": [
                {
                    "name": "{POST} api\/v1\/company",
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
                                "value": "FYE?0YgY.DuO1$a4W=XTfLE6JSVLAQki"
                            },
                            {
                                "key": "secret-token",
                                "value": "Ah3U+s.7mNFJ=CRqA6qELfcs+0GWrBt9S$.qJSqTmerSI764"
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
                    "name": "{GET} app\/v1\/companies\nList all companies",
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
                                    "description": "is a number between 0 and 5 which will return the entire object to the depth you specified default is disabled",
                                    "disabled": false
                                },
                                {
                                    "key": "details_offset",
                                    "value": "0",
                                    "description": "a number between 0 and infinite that represents which object to start with for objects relating to Companies default is 0",
                                    "disabled": true
                                },
                                {
                                    "key": "details_limit",
                                    "value": "1",
                                    "description": "a number between 1 and 25 representing the number of records to return after the offset for related objects default is 1",
                                    "disabled": false
                                },
                                {
                                    "key": "offset",
                                    "value": "0",
                                    "description": "a number between 0 and infinite that represents which object to start with default is 0",
                                    "disabled": true
                                },
                                {
                                    "key": "limit",
                                    "value": "1",
                                    "description": "a number between 1 and 100 representing the number of records to return after the offset default is 50",
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
                                "value": "FYE?0YgY.DuO1$a4W=XTfLE6JSVLAQki"
                            },
                            {
                                "key": "secret-token",
                                "value": "Ah3U+s.7mNFJ=CRqA6qELfcs+0GWrBt9S$.qJSqTmerSI764"
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


