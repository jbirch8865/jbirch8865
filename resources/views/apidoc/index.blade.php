<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>API Reference</title>

    <link rel="stylesheet" href="{{ asset('/docs/css/style.css') }}" />
    <script src="{{ asset('/docs/js/all.js') }}"></script>


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
<h2>{POST} signin/{company}/v1/api</h2>
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
        "access_token": "QojcTZwaI1jNJlmxkJEQRtZCbJJmMhA+uE21DePAUXRe1",
        "user_id": "1",
        "experation_timestamp": "2020-04-18 03:16:39"
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
<!-- START_98c7cd9e1616fc65c12af185be991ff8 -->
<h2>{GET} users/{company}/v1/api</h2>
<p>Return a list of users belonging to the company</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/1/users?active_status=&amp;include_details=2&amp;details_offset=0&amp;details_limit=5&amp;limit=10&amp;offset=0" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "User-Access-Token: DdYvTSrbLntKzv+PQh8KjTQ7+5NrYONQZeT3LFii7ZPJ4"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "User-Access-Token": "DdYvTSrbLntKzv+PQh8KjTQ7+5NrYONQZeT3LFii7ZPJ4",
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
            "5e9a03c28215c": {
                "id": "44",
                "username": "5e9a03c28215c",
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
                            "id": "54",
                            "company_id": "1",
                            "role_name": "master",
                            "active_status": "1"
                        }
                    ]
                }
            },
            "5e9a03f2714d6": {
                "id": "46",
                "username": "5e9a03f2714d6",
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
                            "id": "54",
                            "company_id": "1",
                            "role_name": "master",
                            "active_status": "1"
                        }
                    ]
                }
            },
            "5e9a6b2a4053c": {
                "id": "89",
                "username": "5e9a6b2a4053c",
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
                            "id": "54",
                            "company_id": "1",
                            "role_name": "master",
                            "active_status": "1"
                        }
                    ]
                }
            },
            "5e9a6f1d6f692": {
                "id": "91",
                "username": "5e9a6f1d6f692",
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
                            "id": "54",
                            "company_id": "1",
                            "role_name": "master",
                            "active_status": "1"
                        }
                    ]
                }
            },
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
                            "id": "54",
                            "company_id": "1",
                            "role_name": "master",
                            "active_status": "1"
                        }
                    ]
                }
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
<!-- START_37cc2f7db7536431917bf10b848bd8e4 -->
<h2>{POST} users/{company}/v1/api</h2>
<p>Create a user</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://project.dsfellowship.com/api/v1/1/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "User-Access-Token: NUEPi225hSoNRUI6FlFahmHh+gHtpES8xRkEGIusGJofB" \
    -d '{"user":"5e9a6fec2ce33","password":"ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "User-Access-Token": "NUEPi225hSoNRUI6FlFahmHh+gHtpES8xRkEGIusGJofB",
};

let body = {
    "user": "5e9a6fec2ce33",
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
        "username": "5e9a6fec2ce33",
        "project_name": "project2"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/v1/{company}/users</code></p>
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
<!-- END_37cc2f7db7536431917bf10b848bd8e4 -->
<!-- START_0b2e8585c58a2fdc22e4236c22e7da46 -->
<h2>{PUT} {user}/users/{company}/v1/api</h2>
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
    "https://project.dsfellowship.com/api/v1/1/users/5e9a6fec2ce33" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "User-Access-Token: +MjnnnhDddPeg=aIVLx81QDyaTv2GZ0cy8SnOexbPnYyi" \
    -d '{"new_password":"ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb","active_status":true}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/users/5e9a6fec2ce33"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "User-Access-Token": "+MjnnnhDddPeg=aIVLx81QDyaTv2GZ0cy8SnOexbPnYyi",
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
        "id": "93",
        "username": "5e9a6fec2ce33",
        "company_id": "1",
        "project_name": "project2"
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
<h2>{DELETE} {user}/users/{company}/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/1/users/5e9a6fec2ce33?active_status=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "User-Access-Token: p7xfAkOESo1OF7iWdOQr8LG5vzVHQRxkPmh3=3EtH0?Yq"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/users/5e9a6fec2ce33"
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
    "User-Access-Token": "p7xfAkOESo1OF7iWdOQr8LG5vzVHQRxkPmh3=3EtH0?Yq",
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
        "id": "93",
        "username": "5e9a6fec2ce33",
        "company_id": "1",
        "project_name": "project2"
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
<td>{bool} When true object will be marked inactive.  When false the object will be deleted.</td>
</tr>
</tbody>
</table>
<!-- END_ff18a82b48db2f4db7ea36392e0da63c -->
<!-- START_110cfd4e77fbf74bd678ea1fbf46b800 -->
<h2>{GET} roles/{company}/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/1/roles?active_status=&amp;include_details=2&amp;details_offset=0&amp;details_limit=5&amp;limit=10&amp;offset=0" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "User-Access-Token: iUrTy.+Z+zt.M1GySO+RGMt+HiGNZoJ4GjOmksNL1PEHd"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "User-Access-Token": "iUrTy.+Z+zt.M1GySO+RGMt+HiGNZoJ4GjOmksNL1PEHd",
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
    "message": "Response Objects",
    "Company_Role": {
        "master": {
            "id": "58",
            "company_id": "85",
            "role_name": "master",
            "active_status": "1",
            "Companies": {
                "id": "85",
                "company_name": "documentation_company",
                "active_status": "1",
                "Company_Configs": [
                    {
                        "id": "90",
                        "company_id": "85",
                        "config_id": "1",
                        "config_value": "UTC",
                        "active_status": "1"
                    }
                ],
                "Company_Roles": [
                    {
                        "id": "58",
                        "company_id": "85",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ]
            },
            "Users_Have_Roles": [
                {
                    "id": "69",
                    "user_id": "92",
                    "role_id": "58",
                    "Company_Roles": {
                        "id": "58",
                        "company_id": "85",
                        "role_name": "master",
                        "active_status": "1"
                    }
                }
            ],
            "Routes_Have_Roles": [
                {
                    "id": "218",
                    "route_id": "3",
                    "role_id": "58",
                    "right_id": "218",
                    "Routes": {
                        "id": "3",
                        "name": "Create_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "58",
                        "company_id": "85",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "218",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "219",
                    "route_id": "10",
                    "role_id": "58",
                    "right_id": "219",
                    "Routes": {
                        "id": "10",
                        "name": "Delete_User",
                        "implicit_allow": "0",
                        "module": ""
                    },
                    "Company_Roles": {
                        "id": "58",
                        "company_id": "85",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "219",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "220",
                    "route_id": "6",
                    "role_id": "58",
                    "right_id": "220",
                    "Routes": {
                        "id": "6",
                        "name": "List_Roles",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "58",
                        "company_id": "85",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "220",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "221",
                    "route_id": "2",
                    "role_id": "58",
                    "right_id": "221",
                    "Routes": {
                        "id": "2",
                        "name": "List_Users",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "58",
                        "company_id": "85",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "221",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "222",
                    "route_id": "7",
                    "role_id": "58",
                    "right_id": "222",
                    "Routes": {
                        "id": "7",
                        "name": "Update_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "58",
                        "company_id": "85",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "222",
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/v1/{company}/roles</code></p>
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
<!-- END_110cfd4e77fbf74bd678ea1fbf46b800 -->
<!-- START_c694d0d5865ccb731d64c8931b1befe1 -->
<h2>{POST} company/v1/api</h2>
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
    "master_password": ".YHsiIhRQfJUzt",
    "company": {
        "company_name": "documentation_company"
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
<h2>{GET} companies/v1/api</h2>
<p>List all companies</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/companies?include_disabled=true&amp;include_details=2&amp;details_offset=0&amp;details_limit=5&amp;offset=0&amp;limit=10&amp;active_status=" \
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
    "details_limit": "5",
    "offset": "0",
    "limit": "10",
    "active_status": "",
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
    "message": "Response Objects",
    "Company": {
        "documentation_company": {
            "id": "86",
            "company_name": "documentation_company",
            "active_status": "1",
            "Company_Configs": [
                {
                    "id": "92",
                    "company_id": "86",
                    "config_id": "1",
                    "config_value": "UTC",
                    "active_status": "1",
                    "Companies": {
                        "id": "86",
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
                    "id": "91",
                    "company_id": "86",
                    "config_id": "2",
                    "config_value": "300",
                    "active_status": "1",
                    "Companies": {
                        "id": "86",
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
                    "id": "59",
                    "company_id": "86",
                    "role_name": "master",
                    "active_status": "1",
                    "Companies": {
                        "id": "86",
                        "company_name": "documentation_company",
                        "active_status": "1"
                    },
                    "Users_Have_Roles": [
                        {
                            "id": "70",
                            "user_id": "94",
                            "role_id": "59"
                        }
                    ],
                    "Routes_Have_Roles": [
                        {
                            "id": "223",
                            "route_id": "3",
                            "role_id": "59",
                            "right_id": "223"
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
                    "id": "54",
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
                            "id": "65",
                            "user_id": "1",
                            "role_id": "54"
                        }
                    ],
                    "Routes_Have_Roles": [
                        {
                            "id": "186",
                            "route_id": "3",
                            "role_id": "54",
                            "right_id": "186"
                        }
                    ]
                }
            ]
        }
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/v1/companies</code></p>
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
<td><code>offset</code></td>
<td>optional</td>
<td>{int} Which object index to you want to start at for the return value. Zero is the first object.  Must be a number greater than 0.</td>
</tr>
<tr>
<td><code>limit</code></td>
<td>optional</td>
<td>{int} How many objects do you want to return. Must be a number between 1 and 100.</td>
</tr>
<tr>
<td><code>active_status</code></td>
<td>optional</td>
<td>{bool} Include inactive objects</td>
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
        "_postman_id": "26699e8f-6766-463d-84d8-11a8424932bd",
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
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "cPgdireqdNfbevjOh5+q?cjhLJ0T3uObIuMCv3RCtZjcD"
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
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "Q5uZquouehgYEmh7GrH9ixh6$0zEe68K0A7pto62LLiyg"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"user\": \"5e9a6f1d6f692\",\n    \"password\": \"ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb\"\n}"
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
                                    "value": "5e9a6f1d6f692",
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
                                "value": "tZU4DvCRn9H91oVSkwJnV3.+1SPDVlKeOCDtXWmZq0fyd"
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
                    "name": "{DELETE} {user}\/users\/{company}\/v1\/api",
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
                                    "value": "5e9a6f1d6f692",
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
                                "value": "zq$PGgTynQ5ahO6mFIiRG9ZcsXzLH$7WkZnUgeI8LiU=8"
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
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "rrAYJkt+q?zniB7Tmrx6CUSZX6FQZrYiHZNahTaTk5oxv"
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
                                    "description": "{bool} When true object will be marked inactive.  When false the object will be deleted.",
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
<h2>{GET} routes/v1/api</h2>
<p>See all the endpoints and if their explicit rights</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/routes?active_status=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "secret-token: moME8sUcpFzwqV5Lo7WVh4jezgQxfFnxrKJ391EY0tP9Psh0"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/routes"
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
<td>{bool} When true will only return active objects.  When false all objects returned.</td>
</tr>
</tbody>
</table>
<!-- END_392f39a571495220f725e466d873f08b -->
<!-- START_bc0f2a216f00c2aa2122a1a7be9ad77b -->
<h2>{PUT} default_user/{company}/v1/api</h2>
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
        "project_name": "project2"
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