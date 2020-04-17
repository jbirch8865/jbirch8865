<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>API Reference</title>

    <link rel="stylesheet" href="/docs/css/style.css" />
    <script src="/docs/js/all.js"></script>


          <script>
        $(function() {
            setupLanguages(["bash","javascript"]);
        });
      </script>
      </head>

  <body class="">
    <a href="#" id="nav-button">
      <span>
        NAV
        <img src="/docs/images/navbar.png" />
      </span>
    </a>
    <div class="tocify-wrapper">
        <img src="/docs/images/logo.png" />
                    <div class="lang-selector">
                                  <a href="#" data-language-name="bash">bash</a>
                                  <a href="#" data-language-name="javascript">javascript</a>
                            </div>
                            <div class="search">
              <input type="text" class="search" id="input-search" placeholder="Search">
            </div>
            <ul class="search-results"></ul>
              <div id="toc">
      </div>
                    <ul class="toc-footer">
                                  <li><a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a></li>
                            </ul>
            </div>
    <div class="page-wrapper">
      <div class="dark-box"></div>
      <div class="content">
          <!-- START_INFO -->
<h1>Info</h1>
<p>Welcome to the generated API reference.
<a href="{{ route("apidoc.json") }}">Get Postman Collection</a></p>
<!-- END_INFO -->
<h1>Authentication</h1>
<p>Requesting an End User Access Token for authenticating future requests</p>
<!-- START_2cb38f1f812a602469c22d7858e3f5a2 -->
<h2>{POST} api/v1/{company}/signin</h2>
<p>Returns a unique access_token used to authenticate in place of the username and password
The access_token experation date is based on the company_config session_timeout which is comany specific</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://project.dsfellowship.com/api/v1/1/signin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "secret-token: moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0" \
    -d '{"user":"default","password":"ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/signin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "secret-token": "moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0",
};

let body = {
    "user": "default",
    "password": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "Program_Session": {
        "id": "3",
        "client_id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
        "access_token": "ZCbds615woQ712cWkJDqVHJu5pjoKzwOBJEV7zyEwWwXU",
        "user_id": "1",
        "experation_timestamp": "2020-04-17 23:24:01"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/v1/{company}/signin</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>company</code></td>
<td>required</td>
<td>{integer} The ID of the organization</td>
</tr>
</tbody>
</table>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>user</code></td>
<td>string</td>
<td>required</td>
<td>{string}</td>
</tr>
<tr>
<td><code>password</code></td>
<td>string</td>
<td>required</td>
<td>{string}</td>
</tr>
</tbody>
</table>
<!-- END_2cb38f1f812a602469c22d7858e3f5a2 -->
<h1>Company</h1>
<p>Basic CRUD operations for Companies, Company Configs and Users</p>
<!-- START_93ebf56a5f43247bf91c25a2be5cb179 -->
<h2>{POST} api/v1/{company}/user</h2>
<p>Create a user</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://project.dsfellowship.com/api/v1/1/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "User-Access-Token: MvB+QI+g94KdKKjgfO3Nky+UiodmrXeS2K5+D9d+6cQyF" \
    -d '{"user":"5e9a3965871be","password":"ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "User-Access-Token": "MvB+QI+g94KdKKjgfO3Nky+UiodmrXeS2K5+D9d+6cQyF",
};

let body = {
    "user": "5e9a3965871be",
    "password": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "User successfully created or already exists with that password",
    "user": {
        "id": 66,
        "username": "5e9a3965871be",
        "company_id": 1,
        "project_name": "project2",
        "active_status": 1
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/v1/{company}/user</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>company</code></td>
<td>required</td>
<td>{integer} The ID of the organization</td>
</tr>
</tbody>
</table>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>user</code></td>
<td>string</td>
<td>required</td>
<td>{string}</td>
</tr>
<tr>
<td><code>password</code></td>
<td>string</td>
<td>required</td>
<td>{string}</td>
</tr>
</tbody>
</table>
<!-- END_93ebf56a5f43247bf91c25a2be5cb179 -->
<!-- START_98c7cd9e1616fc65c12af185be991ff8 -->
<h2>{GET} api/v1/{company}/users</h2>
<p>Return a list of users belonging to the company</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/1/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "User-Access-Token: yndjlpT6.lbMGTi2CpmkK.n7yEp8tOaUNF+61j?vPyBw2"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "User-Access-Token": "yndjlpT6.lbMGTi2CpmkK.n7yEp8tOaUNF+61j?vPyBw2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "message": {
        "Users": {
            "default": {
                "id": "1",
                "username": "default",
                "company_id": "1",
                "project_name": "project2",
                "active_status": "1"
            },
            "5e9a03c28215c": {
                "id": "44",
                "username": "5e9a03c28215c",
                "company_id": "1",
                "project_name": "project2",
                "active_status": "1"
            },
            "5e9a03f2714d6": {
                "id": "46",
                "username": "5e9a03f2714d6",
                "company_id": "1",
                "project_name": "project2",
                "active_status": "1"
            },
            "5e9a3965871be": {
                "id": "66",
                "username": "5e9a3965871be",
                "company_id": "1",
                "project_name": "project2",
                "active_status": "1"
            }
        }
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/v1/{company}/users</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>company</code></td>
<td>required</td>
<td>{integer} The ID of the organization</td>
</tr>
<tr>
<td><code>active_status</code></td>
<td>optional</td>
<td>{bool} Include inactive objects</td>
</tr>
<tr>
<td><code>include_details</code></td>
<td>optional</td>
<td>{int} Include the entire object model of the object.  If set the integer determines how many levels deep you want to return for related objects.</td>
</tr>
<tr>
<td><code>details_offset</code></td>
<td>optional</td>
<td>{int} If include_details is false this is ignored.  For related objects which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.</td>
</tr>
<tr>
<td><code>details_limit</code></td>
<td>optional</td>
<td>{int} If include_details is false this is ignored.  For related objects how many do you want to return. Must be a number between 1 and 25.</td>
</tr>
<tr>
<td><code>limit</code></td>
<td>optional</td>
<td>{int} How many objects do you want to return. Must be a number between 1 and 100.</td>
</tr>
<tr>
<td><code>offset</code></td>
<td>optional</td>
<td>{int} Which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.</td>
</tr>
</tbody>
</table>
<!-- END_98c7cd9e1616fc65c12af185be991ff8 -->
<!-- START_0b2e8585c58a2fdc22e4236c22e7da46 -->
<h2>{PUT} api/v1/{company}/user/{user}</h2>
<p>Currently this endpoint is only able to change a password and re-enable a disabled user
Please note that the User-Access-Token does not have to be the access token for the username
you are changing the password for.  It just needs to be a user that has rights to this endpoint.</p>
<p>Currently there is no way for the User to change their own password if they don't have rights
to this endpoint.  So you would need to first authenticate with a user who does have rights to change
the password.  This could be accomplished by first enabling the default user, authenticating and updating
the password.  Then remember to disable the default user.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://project.dsfellowship.com/api/v1/1/users/5e9a3965871be" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "User-Access-Token: udpce7ec?s7nC9W6Az9?YBK1IfZXRiEIHDa+YLh4qlvUh" \
    -d '{"new_password":"ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb","active_status":true}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/users/5e9a3965871be"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "User-Access-Token": "udpce7ec?s7nC9W6Az9?YBK1IfZXRiEIHDa+YLh4qlvUh",
};

let body = {
    "new_password": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "active_status": true
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "User successfully updated",
    "user": {
        "id": "66",
        "username": "5e9a3965871be",
        "company_id": "1",
        "project_name": "project2",
        "active_status": 1
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/v1/{company}/users/{user}</code></p>
<p><code>PATCH api/v1/{company}/users/{user}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>company</code></td>
<td>required</td>
<td>{integer} The ID of the organization</td>
</tr>
<tr>
<td><code>user</code></td>
<td>required</td>
<td>{string} username to change password</td>
</tr>
</tbody>
</table>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>new_password</code></td>
<td>string</td>
<td>optional</td>
<td>{string}</td>
</tr>
<tr>
<td><code>active_status</code></td>
<td>bool</td>
<td>optional</td>
<td>{string}</td>
</tr>
</tbody>
</table>
<!-- END_0b2e8585c58a2fdc22e4236c22e7da46 -->
<!-- START_ff18a82b48db2f4db7ea36392e0da63c -->
<h2>{DELETE} api/v1/{company}/user/{user}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/1/users/5e9a3965871be?active_status=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "User-Access-Token: h+KfuR0Jsbt6GjGccH6++THjPMk01T0sI+4yO+w?zF7vE"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/users/5e9a3965871be"
);

let params = {
    "active_status": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "User-Access-Token": "h+KfuR0Jsbt6GjGccH6++THjPMk01T0sI+4yO+w?zF7vE",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "User Successfully Deleted",
    "user": {
        "id": "66",
        "username": "5e9a3965871be",
        "company_id": "1",
        "project_name": "project2",
        "active_status": 0
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/v1/{company}/users/{user}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>company</code></td>
<td>required</td>
<td>{integer} The ID of the organization</td>
</tr>
<tr>
<td><code>user</code></td>
<td>required</td>
<td>{string} username to delete</td>
</tr>
</tbody>
</table>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>active_status</code></td>
<td>required</td>
<td>{bool} When true user will be marked inactive.  When false the user will be deleted.</td>
</tr>
</tbody>
</table>
<!-- END_ff18a82b48db2f4db7ea36392e0da63c -->
<!-- START_c694d0d5865ccb731d64c8931b1befe1 -->
<h2>{POST} api/v1/company</h2>
<p>This framework doesn't allow a company to do anything unless there is an authorized user making the request.
So as part of creating a company this will auto create a master role that has access to all methods on all routes
It will also create a user with the username default (recommend disabling after establishing a real person with master credentials)
Make sure to record the default password upon success, this password is unrecoverable and the company would need to be deleted and recreated</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://project.dsfellowship.com/api/v1/company" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "secret-token: moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0" \
    -d '{"company_name":"documentation_company"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/company"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "secret-token": "moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0",
};

let body = {
    "company_name": "documentation_company"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Company successfully created",
    "master_password": "Tj5.CDJ1.07A92",
    "company": {
        "id": 44,
        "company_name": "documentation_company",
        "active_status": 1
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/v1/company</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>company_name</code></td>
<td>string</td>
<td>required</td>
<td>{string}</td>
</tr>
</tbody>
</table>
<!-- END_c694d0d5865ccb731d64c8931b1befe1 -->
<!-- START_3325a7e1462036041b5bb9084e516f11 -->
<h2>{GET} app/v1/companies</h2>
<p>List all companies</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/companies?include_disabled=true&amp;include_details=2&amp;details_offset=0&amp;details_limit=1&amp;offset=0&amp;limit=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "secret-token: moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "secret-token": "moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "List of Current Companies",
    "Companies": {
        "documentation_company": {
            "id": "44",
            "company_name": "documentation_company",
            "active_status": "1",
            "Company_Configs": [
                {
                    "id": "68",
                    "company_id": "44",
                    "config_id": "1",
                    "config_value": "UTC",
                    "active_status": "1",
                    "Companies": {
                        "id": "44",
                        "company_name": "documentation_company",
                        "active_status": "1"
                    },
                    "Configs": {
                        "id": "1",
                        "active_status": "1",
                        "config_name": "company_time_zone",
                        "default_value": "UTC"
                    }
                }
            ],
            "Company_Roles": [
                {
                    "id": "40",
                    "company_id": "44",
                    "role_name": "master",
                    "active_status": "1",
                    "Companies": {
                        "id": "44",
                        "company_name": "documentation_company",
                        "active_status": "1"
                    },
                    "Users_Have_Roles": [
                        {
                            "id": "42",
                            "user_id": "67",
                            "role_id": "40"
                        }
                    ]
                }
            ]
        }
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/v1/companies</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>active_status</code></td>
<td>optional</td>
<td>{bool} Include inactive objects</td>
</tr>
<tr>
<td><code>include_details</code></td>
<td>optional</td>
<td>{int} Include the entire object model of the object.  If set the integer determines how many levels deep you want to return for related objects.</td>
</tr>
<tr>
<td><code>details_offset</code></td>
<td>optional</td>
<td>{int} If include_details is false this is ignored.  For related objects which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.</td>
</tr>
<tr>
<td><code>details_limit</code></td>
<td>optional</td>
<td>{int} If include_details is false this is ignored.  For related objects how many do you want to return. Must be a number between 1 and 25.</td>
</tr>
<tr>
<td><code>limit</code></td>
<td>optional</td>
<td>{int} How many objects do you want to return. Must be a number between 1 and 100.</td>
</tr>
<tr>
<td><code>offset</code></td>
<td>optional</td>
<td>{int} Which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.</td>
</tr>
</tbody>
</table>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>include_disabled</code></td>
<td>optional</td>
<td>if set will only return active companies</td>
</tr>
<tr>
<td><code>include_details</code></td>
<td>optional</td>
<td>is a number between 0 and 5 which will return the entire object to the depth you specified default is disabled</td>
</tr>
<tr>
<td><code>details_offset</code></td>
<td>optional</td>
<td>a number between 0 and infinite that represents which object to start with for objects relating to Companies default is 0</td>
</tr>
<tr>
<td><code>details_limit</code></td>
<td>optional</td>
<td>a number between 1 and 25 representing the number of records to return after the offset for related objects default is 1</td>
</tr>
<tr>
<td><code>offset</code></td>
<td>optional</td>
<td>a number between 0 and infinite that represents which object to start with default is 0</td>
</tr>
<tr>
<td><code>limit</code></td>
<td>optional</td>
<td>a number between 1 and 100 representing the number of records to return after the offset default is 50</td>
</tr>
</tbody>
</table>
<!-- END_3325a7e1462036041b5bb9084e516f11 -->
<h1>Tools</h1>
<!-- START_cd4a874127cd23508641c63b640ee838 -->
<h2>doc.json</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/doc.json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "secret-token: moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/doc.json"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "secret-token": "moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "variables": [],
    "info": {
        "name": "Laravel API",
        "_postman_id": "5fab22b9-d8f7-469f-acd9-7be81f709cde",
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
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "secret-token",
                                "value": "moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"user\": \"default\",\n    \"password\": \"ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb\"\n}"
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
                    "name": "{POST} api\/v1\/{company}\/user",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/:company\/user",
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
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "OJM7DNVgm=VjxbHO3wm5nsikxk?Uu30ExiCKtvWZRalNk"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"user\": \"5e9a392b6db4f\",\n    \"password\": \"ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb\"\n}"
                        },
                        "description": "Create a user",
                        "response": []
                    }
                },
                {
                    "name": "{GET} api\/v1\/{company}\/users\nReturn a list of users belonging to the company",
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
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "DNkQ+WK=OeZTIiU7FMEQFqYNuTboVLwSu+rgbOyV.h?hr"
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
                    "name": "{PUT} api\/v1\/{company}\/user\/{user}\nCurrently this endpoint is only able to change a password and re-enable a disabled user\nPlease note that the User-Access-Token does not have to be the access token for the username\nyou are changing the password for.  It just needs to be a user that has rights to this endpoint.",
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
                                    "value": "5e9a392b6db4f",
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
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "73kuQCO8gm?u00PXuMBMcp98TcFkDLq+FZJriBZCFdimT"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"new_password\": \"ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb\",\n    \"active_status\": true\n}"
                        },
                        "description": "Currently there is no way for the User to change their own password if they don't have rights\nto this endpoint.  So you would need to first authenticate with a user who does have rights to change\nthe password.  This could be accomplished by first enabling the default user, authenticating and updating\nthe password.  Then remember to disable the default user.",
                        "response": []
                    }
                },
                {
                    "name": "{DELETE} api\/v1\/{company}\/user\/{user}",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/:company\/users\/:user",
                            "query": [
                                {
                                    "key": "active_status",
                                    "value": "1",
                                    "description": "{bool} When true user will be marked inactive.  When false the user will be deleted.",
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
                                    "value": "5e9a392b6db4f",
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
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "Il46o5f9uk9aNk59Ow?pWFlASsKqPVOJIfUQ??+8rQyoK"
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
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "secret-token",
                                "value": "moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0"
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
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "secret-token",
                                "value": "moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0"
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
                                "value": "moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0"
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
                    "name": "{GET} api\/v1\/routes\nSee all the endpoints and if their explicit rights",
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
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "secret-token",
                                "value": "moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0"
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
                    "name": "{PUT} api\/v1\/{company}\/default_user\/{user}\nThis endpoint is exclusively to re-enable the default user specified\nit should be used when for some reason ALL users in a company are locked out\nor at least one person doesn't have all rights.",
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
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "secret-token",
                                "value": "moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0"
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET doc.json</code></p>
<!-- END_cd4a874127cd23508641c63b640ee838 -->
<!-- START_392f39a571495220f725e466d873f08b -->
<h2>{GET} api/v1/routes</h2>
<p>See all the endpoints and if their explicit rights</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/routes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "secret-token: moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/routes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "secret-token": "moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "List of Current Routes",
    "Routes": {
        "User_Signin": {
            "id": "1",
            "name": "User_Signin",
            "implicit_allow": "1",
            "module": ""
        },
        "List_Users": {
            "id": "2",
            "name": "List_Users",
            "implicit_allow": "0",
            "module": "Company"
        },
        "Create_User": {
            "id": "3",
            "name": "Create_User",
            "implicit_allow": "0",
            "module": "Company"
        },
        "List_Companies": {
            "id": "4",
            "name": "List_Companies",
            "implicit_allow": "1",
            "module": ""
        },
        "Create_Company": {
            "id": "5",
            "name": "Create_Company",
            "implicit_allow": "1",
            "module": ""
        },
        "List_Roles": {
            "id": "6",
            "name": "List_Roles",
            "implicit_allow": "0",
            "module": "Company"
        },
        "Update_User": {
            "id": "7",
            "name": "Update_User",
            "implicit_allow": "0",
            "module": "Company"
        },
        "List_Routes": {
            "id": "8",
            "name": "List_Routes",
            "implicit_allow": "1",
            "module": ""
        },
        "apidoc.json": {
            "id": "9",
            "name": "apidoc.json",
            "implicit_allow": "1",
            "module": ""
        },
        "Delete_User": {
            "id": "10",
            "name": "Delete_User",
            "implicit_allow": "0",
            "module": ""
        },
        "Enable_Default_User": {
            "id": "11",
            "name": "Enable_Default_User",
            "implicit_allow": "1",
            "module": ""
        }
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/v1/routes</code></p>
<!-- END_392f39a571495220f725e466d873f08b -->
<!-- START_bc0f2a216f00c2aa2122a1a7be9ad77b -->
<h2>{PUT} api/v1/{company}/default_user/{user}</h2>
<p>This endpoint is exclusively to re-enable the default user specified
it should be used when for some reason ALL users in a company are locked out
or at least one person doesn&#039;t have all rights.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://project.dsfellowship.com/api/v1/1/default_user/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "secret-token: moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/default_user/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "secret-token": "moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Default User Enabled",
    "user": {
        "id": "1",
        "username": "default",
        "company_id": "1",
        "project_name": "project2",
        "active_status": 1
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/v1/{company}/default_user/{default_user}</code></p>
<p><code>PATCH api/v1/{company}/default_user/{default_user}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>company</code></td>
<td>required</td>
<td>{integer} The ID of the organization</td>
</tr>
<tr>
<td><code>user</code></td>
<td>optional</td>
<td>{string} default username.  Not required. In fact will be overridden</td>
</tr>
</tbody>
</table>
<!-- END_bc0f2a216f00c2aa2122a1a7be9ad77b -->
      </div>
      <div class="dark-box">
                        <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                              </div>
                </div>
    </div>
  </body>
</html>