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
        "access_token": "H4on..HR2hOyuJwnZlkiX9qMcCkgAuGMCXpG9xfquxQ1m",
        "user_id": "1",
        "experation_timestamp": "2020-04-20 02:55:52"
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
    -H "User-Access-Token: ICE54viTswUfVCBM5yzv=Wi.?3diUk4Dn?xzjkLv3xkXL"</code></pre>
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
    "User-Access-Token": "ICE54viTswUfVCBM5yzv=Wi.?3diUk4Dn?xzjkLv3xkXL",
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
                            "id": "99",
                            "company_id": "1",
                            "role_name": "5e9b84865c81e",
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
                            "id": "99",
                            "company_id": "1",
                            "role_name": "5e9b84865c81e",
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
                            "id": "99",
                            "company_id": "1",
                            "role_name": "5e9b84865c81e",
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
                            "id": "99",
                            "company_id": "1",
                            "role_name": "5e9b84865c81e",
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
                            "id": "99",
                            "company_id": "1",
                            "role_name": "5e9b84865c81e",
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
    -H "User-Access-Token: wb$FHvsPvGcknSHlzQkld?FoxH6n8$HlrhstXUL7EEyTU" \
    -d '{"user":"5e9d0e0ccdefc","password":"ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "User-Access-Token": "wb$FHvsPvGcknSHlzQkld?FoxH6n8$HlrhstXUL7EEyTU",
};

let body = {
    "user": "5e9d0e0ccdefc",
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
        "username": "5e9d0e0ccdefc",
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
    "https://project.dsfellowship.com/api/v1/1/users/5e9d0e0ccdefc" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "User-Access-Token: ybQxdCWHm7Lmuo0BS9L7nQi3Yd=7VS9dTcJe+7$g05u2U" \
    -d '{"new_password":"ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb","active_status":true}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/users/5e9d0e0ccdefc"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "User-Access-Token": "ybQxdCWHm7Lmuo0BS9L7nQi3Yd=7VS9dTcJe+7$g05u2U",
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
        "id": "180",
        "username": "5e9d0e0ccdefc",
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
    "https://project.dsfellowship.com/api/v1/1/users/5e9d0e0ccdefc?active_status=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "User-Access-Token: 1B72ZOlfNpTH14TMvMKU1ymgD49wL=mw3UiOKq+nUeRCO"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/users/5e9d0e0ccdefc"
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
    "User-Access-Token": "1B72ZOlfNpTH14TMvMKU1ymgD49wL=mw3UiOKq+nUeRCO",
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
        "id": "180",
        "username": "5e9d0e0ccdefc",
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
    -H "User-Access-Token: CLyNGy5rSUgAS3dvn2ojIBXvDR?Nz9X$kgf8f4N7aTWiq"</code></pre>
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
    "User-Access-Token": "CLyNGy5rSUgAS3dvn2ojIBXvDR?Nz9X$kgf8f4N7aTWiq",
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
        "5e9b84865c81e": {
            "id": "99",
            "company_id": "1",
            "role_name": "5e9b84865c81e",
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
                        "id": "99",
                        "company_id": "1",
                        "role_name": "5e9b84865c81e",
                        "active_status": "1"
                    }
                ]
            },
            "Routes_Have_Roles": [
                {
                    "id": "385",
                    "route_id": "12",
                    "role_id": "99",
                    "right_id": "390",
                    "Routes": {
                        "id": "12",
                        "name": "Create_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "99",
                        "company_id": "1",
                        "role_name": "5e9b84865c81e",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "390",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "386",
                    "route_id": "3",
                    "role_id": "99",
                    "right_id": "391",
                    "Routes": {
                        "id": "3",
                        "name": "Create_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "99",
                        "company_id": "1",
                        "role_name": "5e9b84865c81e",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "391",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "387",
                    "route_id": "10",
                    "role_id": "99",
                    "right_id": "392",
                    "Routes": {
                        "id": "10",
                        "name": "Delete_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "99",
                        "company_id": "1",
                        "role_name": "5e9b84865c81e",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "392",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "388",
                    "route_id": "6",
                    "role_id": "99",
                    "right_id": "393",
                    "Routes": {
                        "id": "6",
                        "name": "List_Roles",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "99",
                        "company_id": "1",
                        "role_name": "5e9b84865c81e",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "393",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "389",
                    "route_id": "2",
                    "role_id": "99",
                    "right_id": "394",
                    "Routes": {
                        "id": "2",
                        "name": "List_Users",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "99",
                        "company_id": "1",
                        "role_name": "5e9b84865c81e",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "394",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                }
            ]
        },
        "5e9b87ae6d1c8": {
            "id": "101",
            "company_id": "1",
            "role_name": "5e9b87ae6d1c8",
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
                        "id": "99",
                        "company_id": "1",
                        "role_name": "5e9b84865c81e",
                        "active_status": "1"
                    }
                ]
            },
            "Routes_Have_Roles": [
                {
                    "id": "397",
                    "route_id": "12",
                    "role_id": "101",
                    "right_id": "402",
                    "Routes": {
                        "id": "12",
                        "name": "Create_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "101",
                        "company_id": "1",
                        "role_name": "5e9b87ae6d1c8",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "402",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "398",
                    "route_id": "3",
                    "role_id": "101",
                    "right_id": "403",
                    "Routes": {
                        "id": "3",
                        "name": "Create_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "101",
                        "company_id": "1",
                        "role_name": "5e9b87ae6d1c8",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "403",
                        "get": "1",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "399",
                    "route_id": "10",
                    "role_id": "101",
                    "right_id": "404",
                    "Routes": {
                        "id": "10",
                        "name": "Delete_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "101",
                        "company_id": "1",
                        "role_name": "5e9b87ae6d1c8",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "404",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "400",
                    "route_id": "6",
                    "role_id": "101",
                    "right_id": "405",
                    "Routes": {
                        "id": "6",
                        "name": "List_Roles",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "101",
                        "company_id": "1",
                        "role_name": "5e9b87ae6d1c8",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "405",
                        "get": "0",
                        "destroy": "0",
                        "post": "1",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "401",
                    "route_id": "2",
                    "role_id": "101",
                    "right_id": "406",
                    "Routes": {
                        "id": "2",
                        "name": "List_Users",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "101",
                        "company_id": "1",
                        "role_name": "5e9b87ae6d1c8",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "406",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                }
            ]
        },
        "5e9b87eb3d3e5": {
            "id": "103",
            "company_id": "1",
            "role_name": "5e9b87eb3d3e5",
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
                        "id": "99",
                        "company_id": "1",
                        "role_name": "5e9b84865c81e",
                        "active_status": "1"
                    }
                ]
            },
            "Routes_Have_Roles": [
                {
                    "id": "409",
                    "route_id": "12",
                    "role_id": "103",
                    "right_id": "414",
                    "Routes": {
                        "id": "12",
                        "name": "Create_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "103",
                        "company_id": "1",
                        "role_name": "5e9b87eb3d3e5",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "414",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "410",
                    "route_id": "3",
                    "role_id": "103",
                    "right_id": "415",
                    "Routes": {
                        "id": "3",
                        "name": "Create_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "103",
                        "company_id": "1",
                        "role_name": "5e9b87eb3d3e5",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "415",
                        "get": "1",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "411",
                    "route_id": "10",
                    "role_id": "103",
                    "right_id": "416",
                    "Routes": {
                        "id": "10",
                        "name": "Delete_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "103",
                        "company_id": "1",
                        "role_name": "5e9b87eb3d3e5",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "416",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "412",
                    "route_id": "6",
                    "role_id": "103",
                    "right_id": "417",
                    "Routes": {
                        "id": "6",
                        "name": "List_Roles",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "103",
                        "company_id": "1",
                        "role_name": "5e9b87eb3d3e5",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "417",
                        "get": "0",
                        "destroy": "0",
                        "post": "1",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "413",
                    "route_id": "2",
                    "role_id": "103",
                    "right_id": "418",
                    "Routes": {
                        "id": "2",
                        "name": "List_Users",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "103",
                        "company_id": "1",
                        "role_name": "5e9b87eb3d3e5",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "418",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                }
            ]
        },
        "5e9b88f3acf10": {
            "id": "105",
            "company_id": "1",
            "role_name": "5e9b88f3acf10",
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
                        "id": "99",
                        "company_id": "1",
                        "role_name": "5e9b84865c81e",
                        "active_status": "1"
                    }
                ]
            },
            "Routes_Have_Roles": [
                {
                    "id": "421",
                    "route_id": "12",
                    "role_id": "105",
                    "right_id": "426",
                    "Routes": {
                        "id": "12",
                        "name": "Create_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "105",
                        "company_id": "1",
                        "role_name": "5e9b88f3acf10",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "426",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "422",
                    "route_id": "3",
                    "role_id": "105",
                    "right_id": "427",
                    "Routes": {
                        "id": "3",
                        "name": "Create_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "105",
                        "company_id": "1",
                        "role_name": "5e9b88f3acf10",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "427",
                        "get": "1",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "423",
                    "route_id": "10",
                    "role_id": "105",
                    "right_id": "428",
                    "Routes": {
                        "id": "10",
                        "name": "Delete_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "105",
                        "company_id": "1",
                        "role_name": "5e9b88f3acf10",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "428",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "424",
                    "route_id": "6",
                    "role_id": "105",
                    "right_id": "429",
                    "Routes": {
                        "id": "6",
                        "name": "List_Roles",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "105",
                        "company_id": "1",
                        "role_name": "5e9b88f3acf10",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "429",
                        "get": "0",
                        "destroy": "0",
                        "post": "1",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "425",
                    "route_id": "2",
                    "role_id": "105",
                    "right_id": "430",
                    "Routes": {
                        "id": "2",
                        "name": "List_Users",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "105",
                        "company_id": "1",
                        "role_name": "5e9b88f3acf10",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "430",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                }
            ]
        },
        "5e9b9cae49dca": {
            "id": "114",
            "company_id": "1",
            "role_name": "5e9b9cae49dca",
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
                        "id": "99",
                        "company_id": "1",
                        "role_name": "5e9b84865c81e",
                        "active_status": "1"
                    }
                ]
            },
            "Routes_Have_Roles": [
                {
                    "id": "494",
                    "route_id": "12",
                    "role_id": "114",
                    "right_id": "499",
                    "Routes": {
                        "id": "12",
                        "name": "Create_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "114",
                        "company_id": "1",
                        "role_name": "5e9b9cae49dca",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "499",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "495",
                    "route_id": "3",
                    "role_id": "114",
                    "right_id": "500",
                    "Routes": {
                        "id": "3",
                        "name": "Create_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "114",
                        "company_id": "1",
                        "role_name": "5e9b9cae49dca",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "500",
                        "get": "1",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "496",
                    "route_id": "13",
                    "role_id": "114",
                    "right_id": "501",
                    "Routes": {
                        "id": "13",
                        "name": "Delete_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "114",
                        "company_id": "1",
                        "role_name": "5e9b9cae49dca",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "501",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "497",
                    "route_id": "10",
                    "role_id": "114",
                    "right_id": "502",
                    "Routes": {
                        "id": "10",
                        "name": "Delete_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "114",
                        "company_id": "1",
                        "role_name": "5e9b9cae49dca",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "502",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "498",
                    "route_id": "6",
                    "role_id": "114",
                    "right_id": "503",
                    "Routes": {
                        "id": "6",
                        "name": "List_Roles",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "114",
                        "company_id": "1",
                        "role_name": "5e9b9cae49dca",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "503",
                        "get": "0",
                        "destroy": "0",
                        "post": "1",
                        "patch": "0",
                        "put": "0"
                    }
                }
            ]
        },
        "5e9b9e46971e7": {
            "id": "116",
            "company_id": "1",
            "role_name": "5e9b9e46971e7",
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
                        "id": "99",
                        "company_id": "1",
                        "role_name": "5e9b84865c81e",
                        "active_status": "1"
                    }
                ]
            },
            "Routes_Have_Roles": [
                {
                    "id": "508",
                    "route_id": "12",
                    "role_id": "116",
                    "right_id": "513",
                    "Routes": {
                        "id": "12",
                        "name": "Create_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "116",
                        "company_id": "1",
                        "role_name": "5e9b9e46971e7",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "513",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "509",
                    "route_id": "3",
                    "role_id": "116",
                    "right_id": "514",
                    "Routes": {
                        "id": "3",
                        "name": "Create_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "116",
                        "company_id": "1",
                        "role_name": "5e9b9e46971e7",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "514",
                        "get": "1",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "510",
                    "route_id": "13",
                    "role_id": "116",
                    "right_id": "515",
                    "Routes": {
                        "id": "13",
                        "name": "Delete_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "116",
                        "company_id": "1",
                        "role_name": "5e9b9e46971e7",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "515",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "511",
                    "route_id": "10",
                    "role_id": "116",
                    "right_id": "516",
                    "Routes": {
                        "id": "10",
                        "name": "Delete_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "116",
                        "company_id": "1",
                        "role_name": "5e9b9e46971e7",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "516",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "512",
                    "route_id": "6",
                    "role_id": "116",
                    "right_id": "517",
                    "Routes": {
                        "id": "6",
                        "name": "List_Roles",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "116",
                        "company_id": "1",
                        "role_name": "5e9b9e46971e7",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "517",
                        "get": "0",
                        "destroy": "0",
                        "post": "1",
                        "patch": "0",
                        "put": "0"
                    }
                }
            ]
        },
        "5e9b9eafb0db7": {
            "id": "122",
            "company_id": "1",
            "role_name": "5e9b9eafb0db7",
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
                        "id": "99",
                        "company_id": "1",
                        "role_name": "5e9b84865c81e",
                        "active_status": "1"
                    }
                ]
            },
            "Routes_Have_Roles": [
                {
                    "id": "550",
                    "route_id": "12",
                    "role_id": "122",
                    "right_id": "555",
                    "Routes": {
                        "id": "12",
                        "name": "Create_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "122",
                        "company_id": "1",
                        "role_name": "5e9b9eafb0db7",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "555",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "551",
                    "route_id": "3",
                    "role_id": "122",
                    "right_id": "556",
                    "Routes": {
                        "id": "3",
                        "name": "Create_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "122",
                        "company_id": "1",
                        "role_name": "5e9b9eafb0db7",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "556",
                        "get": "1",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "552",
                    "route_id": "13",
                    "role_id": "122",
                    "right_id": "557",
                    "Routes": {
                        "id": "13",
                        "name": "Delete_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "122",
                        "company_id": "1",
                        "role_name": "5e9b9eafb0db7",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "557",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "553",
                    "route_id": "10",
                    "role_id": "122",
                    "right_id": "558",
                    "Routes": {
                        "id": "10",
                        "name": "Delete_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "122",
                        "company_id": "1",
                        "role_name": "5e9b9eafb0db7",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "558",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "554",
                    "route_id": "6",
                    "role_id": "122",
                    "right_id": "559",
                    "Routes": {
                        "id": "6",
                        "name": "List_Roles",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "122",
                        "company_id": "1",
                        "role_name": "5e9b9eafb0db7",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "559",
                        "get": "0",
                        "destroy": "0",
                        "post": "1",
                        "patch": "0",
                        "put": "0"
                    }
                }
            ]
        },
        "master": {
            "id": "161",
            "company_id": "157",
            "role_name": "master",
            "active_status": "1",
            "Companies": {
                "id": "157",
                "company_name": "documentation_company",
                "active_status": "1",
                "Company_Configs": [
                    {
                        "id": "174",
                        "company_id": "157",
                        "config_id": "1",
                        "config_value": "UTC",
                        "active_status": "1"
                    }
                ],
                "Company_Roles": [
                    {
                        "id": "161",
                        "company_id": "157",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ]
            },
            "Users_Have_Roles": [
                {
                    "id": "131",
                    "user_id": "179",
                    "role_id": "161",
                    "Company_Roles": {
                        "id": "161",
                        "company_id": "157",
                        "role_name": "master",
                        "active_status": "1"
                    }
                }
            ],
            "Routes_Have_Roles": [
                {
                    "id": "940",
                    "route_id": "12",
                    "role_id": "161",
                    "right_id": "945",
                    "Routes": {
                        "id": "12",
                        "name": "Create_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "161",
                        "company_id": "157",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "945",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "941",
                    "route_id": "3",
                    "role_id": "161",
                    "right_id": "946",
                    "Routes": {
                        "id": "3",
                        "name": "Create_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "161",
                        "company_id": "157",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "946",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "942",
                    "route_id": "13",
                    "role_id": "161",
                    "right_id": "947",
                    "Routes": {
                        "id": "13",
                        "name": "Delete_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "161",
                        "company_id": "157",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "947",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "943",
                    "route_id": "10",
                    "role_id": "161",
                    "right_id": "948",
                    "Routes": {
                        "id": "10",
                        "name": "Delete_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "161",
                        "company_id": "157",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "948",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "944",
                    "route_id": "14",
                    "role_id": "161",
                    "right_id": "949",
                    "Routes": {
                        "id": "14",
                        "name": "Edit_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "161",
                        "company_id": "157",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "949",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                }
            ]
        },
        "5e9d095668926": {
            "id": "158",
            "company_id": "1",
            "role_name": "5e9d095668926",
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
                        "id": "99",
                        "company_id": "1",
                        "role_name": "5e9b84865c81e",
                        "active_status": "1"
                    }
                ]
            },
            "Routes_Have_Roles": [
                {
                    "id": "916",
                    "route_id": "12",
                    "role_id": "158",
                    "right_id": "921",
                    "Routes": {
                        "id": "12",
                        "name": "Create_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "158",
                        "company_id": "1",
                        "role_name": "5e9d095668926",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "921",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "917",
                    "route_id": "3",
                    "role_id": "158",
                    "right_id": "922",
                    "Routes": {
                        "id": "3",
                        "name": "Create_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "158",
                        "company_id": "1",
                        "role_name": "5e9d095668926",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "922",
                        "get": "1",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "918",
                    "route_id": "13",
                    "role_id": "158",
                    "right_id": "923",
                    "Routes": {
                        "id": "13",
                        "name": "Delete_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "158",
                        "company_id": "1",
                        "role_name": "5e9d095668926",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "923",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "919",
                    "route_id": "10",
                    "role_id": "158",
                    "right_id": "924",
                    "Routes": {
                        "id": "10",
                        "name": "Delete_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "158",
                        "company_id": "1",
                        "role_name": "5e9d095668926",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "924",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "920",
                    "route_id": "14",
                    "role_id": "158",
                    "right_id": "925",
                    "Routes": {
                        "id": "14",
                        "name": "Edit_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "158",
                        "company_id": "1",
                        "role_name": "5e9d095668926",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "925",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
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
<!-- START_afcca4321b978edea0f876b7920559a4 -->
<h2>{POST} roles/{company}/v1/api</h2>
<p>So a company role is just a company and a name
However, in order to create a company you need to provide
an array of routes and the associated rights you would like
with that route.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://project.dsfellowship.com/api/v1/1/roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "User-Access-Token: ?5w8O?2Y0MsfKJzPi.MnOP7DzSRxL.0DCNj.EVcw89dcE" \
    -d '{"Routes_Have_Roles":[{"route_id":"3","Rights":{"get":true,"post":false,"patch":false,"put":false,"destroy":false}},{"route_id":"6","Rights":{"get":false,"post":true,"patch":false,"put":false,"destroy":false}}],"role_name":"5e9d0e0dd1be9"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/roles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "User-Access-Token": "?5w8O?2Y0MsfKJzPi.MnOP7DzSRxL.0DCNj.EVcw89dcE",
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
    "role_name": "5e9d0e0dd1be9"
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
    "message": "Company Role created",
    "company role": {
        "id": "162",
        "company_id": "1",
        "role_name": "5e9d0e0dd1be9",
        "active_status": "1"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/v1/{company}/roles</code></p>
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
<td><code>Routes_Have_Roles.*.module</code></td>
<td>string</td>
<td>optional</td>
<td>if route_id is missing then the module name will be used to create rights with multiple roles.</td>
</tr>
<tr>
<td><code>Routes_Have_Roles.*.route_id</code></td>
<td>string</td>
<td>optional</td>
<td>if route_id is missing then the module name will be used to create rights with multiple roles.</td>
</tr>
<tr>
<td><code>Routes_Have_Roles.*.get</code></td>
<td>boolean</td>
<td>optional</td>
<td>true allows method false denys method</td>
</tr>
<tr>
<td><code>Routes_Have_Roles.*.post</code></td>
<td>boolean</td>
<td>optional</td>
<td>true allows method false denys method</td>
</tr>
<tr>
<td><code>Routes_Have_Roles.*.put</code></td>
<td>boolean</td>
<td>optional</td>
<td>true allows method false denys method</td>
</tr>
<tr>
<td><code>Routes_Have_Roles.*.patch</code></td>
<td>boolean</td>
<td>optional</td>
<td>true allows method false denys method</td>
</tr>
<tr>
<td><code>Routes_Have_Roles.*.delete</code></td>
<td>boolean</td>
<td>optional</td>
<td>true allows method false denys method</td>
</tr>
<tr>
<td><code>role_name</code></td>
<td>string</td>
<td>required</td>
<td>{string}</td>
</tr>
<tr>
<td><code>Routes_Have_Roles</code></td>
<td>array</td>
<td>required</td>
<td>{array[array]} Needs to contain a key value pair for each route_id you are linking too, plus a Rights key with an array of get,post,destroy,patch,put keys and their corresponding boolean values you want.</td>
</tr>
</tbody>
</table>
<!-- END_afcca4321b978edea0f876b7920559a4 -->
<!-- START_858de4711294b15426ddfd8c8648a599 -->
<h2>{PUT} roles/{company}/v1/api</h2>
<p>This will recreate the role with the provided modal
Anything previous will be deleted so make sure this
is the complete modal you are expecting</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://project.dsfellowship.com/api/v1/1/roles/162" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "User-Access-Token: a.BSP2$+RFhn4jc?TtGBVkR3nS+rZfBzfdz1WcjSJT$wU" \
    -d '{"Routes_Have_Roles":[{"route_id":"3","Rights":{"get":true,"post":false,"patch":false,"put":false,"destroy":false}},{"route_id":"6","Rights":{"get":false,"post":true,"patch":false,"put":false,"destroy":false}}],"role_name":"5e9d0e0e4b768","active_status":true}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/roles/162"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb",
    "User-Access-Token": "a.BSP2$+RFhn4jc?TtGBVkR3nS+rZfBzfdz1WcjSJT$wU",
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
    "role_name": "5e9d0e0e4b768",
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
    "message": "Company Role Updated",
    "company role": {
        "id": "162",
        "company_id": "1",
        "role_name": "5e9d0e0e4b768"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/v1/{company}/roles/{role}</code></p>
<p><code>PATCH api/v1/{company}/roles/{role}</code></p>
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
<td><code>role</code></td>
<td>required</td>
<td>{int}</td>
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
<td><code>Routes_Have_Roles.*.module</code></td>
<td>string</td>
<td>optional</td>
<td>if route_id is missing then the module name will be used to create rights with multiple roles. Example Company</td>
</tr>
<tr>
<td><code>Routes_Have_Roles.*.route_id</code></td>
<td>integer</td>
<td>optional</td>
<td>if route_id is missing then the module name will be used to create rights with multiple roles.</td>
</tr>
<tr>
<td><code>Routes_Have_Roles.*.get</code></td>
<td>boolean</td>
<td>optional</td>
<td>true allows method false denys method</td>
</tr>
<tr>
<td><code>Routes_Have_Roles.*.post</code></td>
<td>boolean</td>
<td>optional</td>
<td>true allows method false denys method</td>
</tr>
<tr>
<td><code>Routes_Have_Roles.*.put</code></td>
<td>boolean</td>
<td>optional</td>
<td>true allows method false denys method</td>
</tr>
<tr>
<td><code>Routes_Have_Roles.*.patch</code></td>
<td>boolean</td>
<td>optional</td>
<td>true allows method false denys method</td>
</tr>
<tr>
<td><code>Routes_Have_Roles.*.delete</code></td>
<td>boolean</td>
<td>optional</td>
<td>true allows method false denys method</td>
</tr>
<tr>
<td><code>role_name</code></td>
<td>string</td>
<td>required</td>
<td>{string}</td>
</tr>
<tr>
<td><code>Routes_Have_Roles</code></td>
<td>array</td>
<td>required</td>
<td>{array[array]} Needs to contain a key value pair for each route_id you are linking too, plus a Rights key with an array of get,post,destroy,patch,put keys and their corresponding boolean values you want.</td>
</tr>
<tr>
<td><code>active_status</code></td>
<td>bool</td>
<td>optional</td>
<td>{string}</td>
</tr>
</tbody>
</table>
<!-- END_858de4711294b15426ddfd8c8648a599 -->
<!-- START_da23e5dc8ee97937a677d1aa6cca4a86 -->
<h2>{DELETE} roles/{company}/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/1/roles/162?active_status=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb" \
    -H "User-Access-Token: U9koiKLx=XLwngVcc?dZJ0nAODO=p3h$e.HZ2M=TxeDbN"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/roles/162"
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
    "User-Access-Token": "U9koiKLx=XLwngVcc?dZJ0nAODO=p3h$e.HZ2M=TxeDbN",
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
    "message": "Role successfully deactivated",
    "Company_Role": {
        "id": "162",
        "company_id": "1",
        "role_name": "5e9d0e0e4b768"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/v1/{company}/roles/{role}</code></p>
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
<td><code>role</code></td>
<td>required</td>
<td>{int}</td>
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
<!-- END_da23e5dc8ee97937a677d1aa6cca4a86 -->
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
    "master_password": "Le$wcRiljQHtp7",
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
            "id": "158",
            "company_name": "documentation_company",
            "active_status": "1",
            "Company_Configs": [
                {
                    "id": "176",
                    "company_id": "158",
                    "config_id": "1",
                    "config_value": "UTC",
                    "active_status": "1",
                    "Companies": {
                        "id": "158",
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
                    "id": "175",
                    "company_id": "158",
                    "config_id": "2",
                    "config_value": "300",
                    "active_status": "1",
                    "Companies": {
                        "id": "158",
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
                    "id": "163",
                    "company_id": "158",
                    "role_name": "master",
                    "active_status": "1",
                    "Companies": {
                        "id": "158",
                        "company_name": "documentation_company",
                        "active_status": "1"
                    },
                    "Users_Have_Roles": [
                        {
                            "id": "132",
                            "user_id": "181",
                            "role_id": "163"
                        }
                    ],
                    "Routes_Have_Roles": [
                        {
                            "id": "956",
                            "route_id": "12",
                            "role_id": "163",
                            "right_id": "961"
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
                    "id": "99",
                    "company_id": "1",
                    "role_name": "5e9b84865c81e",
                    "active_status": "1",
                    "Companies": {
                        "id": "1",
                        "company_name": "System",
                        "active_status": "1"
                    },
                    "Routes_Have_Roles": [
                        {
                            "id": "385",
                            "route_id": "12",
                            "role_id": "99",
                            "right_id": "390"
                        }
                    ]
                },
                {
                    "id": "101",
                    "company_id": "1",
                    "role_name": "5e9b87ae6d1c8",
                    "active_status": "1",
                    "Companies": {
                        "id": "1",
                        "company_name": "System",
                        "active_status": "1"
                    },
                    "Routes_Have_Roles": [
                        {
                            "id": "397",
                            "route_id": "12",
                            "role_id": "101",
                            "right_id": "402"
                        }
                    ]
                },
                {
                    "id": "103",
                    "company_id": "1",
                    "role_name": "5e9b87eb3d3e5",
                    "active_status": "1",
                    "Companies": {
                        "id": "1",
                        "company_name": "System",
                        "active_status": "1"
                    },
                    "Routes_Have_Roles": [
                        {
                            "id": "409",
                            "route_id": "12",
                            "role_id": "103",
                            "right_id": "414"
                        }
                    ]
                },
                {
                    "id": "105",
                    "company_id": "1",
                    "role_name": "5e9b88f3acf10",
                    "active_status": "1",
                    "Companies": {
                        "id": "1",
                        "company_name": "System",
                        "active_status": "1"
                    },
                    "Routes_Have_Roles": [
                        {
                            "id": "421",
                            "route_id": "12",
                            "role_id": "105",
                            "right_id": "426"
                        }
                    ]
                },
                {
                    "id": "114",
                    "company_id": "1",
                    "role_name": "5e9b9cae49dca",
                    "active_status": "1",
                    "Companies": {
                        "id": "1",
                        "company_name": "System",
                        "active_status": "1"
                    },
                    "Routes_Have_Roles": [
                        {
                            "id": "494",
                            "route_id": "12",
                            "role_id": "114",
                            "right_id": "499"
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
        "_postman_id": "d88b08db-388d-464b-97d5-fa2879cf5cce",
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
                                "value": "cnWnmcU9VBpoD2L9L9j43u2Jzq3ws1=y82zv7O27rjzm."
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
                                "value": "dtPapI?WX91gRYpODoJWJBml91pOXsALvMF+tzE4xNPae"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"user\": \"5e9d0a5228930\",\n    \"password\": \"ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb\"\n}"
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
                                    "value": "5e9d0a5228930",
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
                                "value": "x5kf3XcjjFZj5UJoU69Pc6l57cpWJlxtSWNHZ0v1nRoC+"
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
                            "query": [
                                {
                                    "key": "active_status",
                                    "value": "1",
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
                                    "id": "user",
                                    "key": "user",
                                    "value": "5e9d0a5228930",
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
                                "value": "kbCgF?uxFU7E2lOPyviYTE=6Pu?YIXOao12tSw1UjvQQF"
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
                                "value": "Q=pJTHb05TQsWeJwwIiaif5DbK$91xXjPc9oTMwf?VXEx"
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
                    "name": "{POST} roles\/{company}\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/:company\/roles",
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
                                "value": "CtlRXgAm1BDXAaUKsd.139yJXinZtiKpTZ2nEIn9N+dZp"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"Routes_Have_Roles\": [\n        {\n            \"route_id\": \"3\",\n            \"Rights\": {\n                \"get\": true,\n                \"post\": false,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        },\n        {\n            \"route_id\": \"6\",\n            \"Rights\": {\n                \"get\": false,\n                \"post\": true,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        }\n    ],\n    \"role_name\": \"5e9d0a53035b4\"\n}"
                        },
                        "description": "So a company role is just a company and a name\nHowever, in order to create a company you need to provide\nan array of routes and the associated rights you would like\nwith that route.",
                        "response": []
                    }
                },
                {
                    "name": "{PUT} roles\/{company}\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/:company\/roles\/:role",
                            "query": [],
                            "variable": [
                                {
                                    "id": "company",
                                    "key": "company",
                                    "value": "1",
                                    "description": "{integer} The ID of the organization"
                                },
                                {
                                    "id": "role",
                                    "key": "role",
                                    "value": "160",
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
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "Srf$OxvX6Q8DA4vHm4VLXMsUu$pYL93tW?IwuHrhfO459"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"Routes_Have_Roles\": [\n        {\n            \"route_id\": \"3\",\n            \"Rights\": {\n                \"get\": true,\n                \"post\": false,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        },\n        {\n            \"route_id\": \"6\",\n            \"Rights\": {\n                \"get\": false,\n                \"post\": true,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        }\n    ],\n    \"role_name\": \"5e9d0a537fa96\",\n    \"active_status\": true\n}"
                        },
                        "description": "This will recreate the role with the provided modal\nAnything previous will be deleted so make sure this\nis the complete modal you are expecting",
                        "response": []
                    }
                },
                {
                    "name": "{DELETE} roles\/{company}\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/:company\/roles\/:role",
                            "query": [
                                {
                                    "key": "active_status",
                                    "value": "1",
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
                                    "id": "role",
                                    "key": "role",
                                    "value": "160",
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
                                "value": "ANcyx9Ibg5xp9SX0H4LD0?htjMP+wqmb"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jS.wnUFxSeKkbkTqz3uHkVhbc4Oi+wdg0JBgo$xTxbK3o"
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
                                    "description": "{bool} When true will only return active objects.  When false all objects returned.",
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
            "module": "Company"
        },
        "Enable_Default_User": {
            "id": "11",
            "name": "Enable_Default_User",
            "implicit_allow": "1",
            "module": ""
        },
        "Create_Role": {
            "id": "12",
            "name": "Create_Role",
            "implicit_allow": "0",
            "module": "Company"
        },
        "Delete_Role": {
            "id": "13",
            "name": "Delete_Role",
            "implicit_allow": "0",
            "module": "Company"
        },
        "Edit_Role": {
            "id": "14",
            "name": "Edit_Role",
            "implicit_allow": "0",
            "module": "Company"
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