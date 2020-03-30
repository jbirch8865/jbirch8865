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
# Getting Started

Welcome to the JRTS Solutions V1 API Here you will find all the endpoints and methods currently in production The first thing you will need is to submit a request to jbirch88655@gmail.com to obtain a Client Token and Secret Token for your programs requests Once you have those all requests will have to have to be submitted with a header key of Authorization and your Client Token. Additionally some endpoints that don't require a user_token will require your secret token. Secret tokens should be kept private.

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
    -d '{"user_name":"aut","plain_text_password":"provident"}'

```

```javascript
const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/signin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_name": "aut",
    "plain_text_password": "provident"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "session_token": "?M?nZIA1x5XJLQjxVzuilhVDq0n51uI47ZZXIYAWPtNxb",
    "expires": {
        "date": "2020-03-30 19:59:06.000000",
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