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
<p>Welcome to the generated API reference.</p>
<!-- END_INFO -->
<h1>Authentication</h1>
<p>Requesting an End User Access Token for authenticating future requests</p>
<!-- START_3cb60164618dd6dfd435f39ac4ef6402 -->
<h2>{POST} api/v1/{company_id}/Signin</h2>
<p>Returns a unique access_token used to authenticate in place of the username and password
The access_token experation date is based on the company_config session_timeout which is comany specific</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://project.dsfellowship.com/api/v1/1/signin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: Q8NfiyrBUzoXAl?1PYVzBv3jc$Nk1ZMV" \
    -H "Secret-Token: P.N?KqJXK4CT54QuW4H2eWU+guM4Q2KtPx0JuFIAAzsPtbzj" \
    -H "User-Access-Token: J+V53FP3bqpSKlrRKbm09rw16tYd9hlRSB.PzLA??s8DS" \
    -d '{"username":"default","password":"Q8NfiyrBUzoXAl?1PYVzBv3jc$Nk1ZMV"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/signin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "Q8NfiyrBUzoXAl?1PYVzBv3jc$Nk1ZMV",
    "Secret-Token": "P.N?KqJXK4CT54QuW4H2eWU+guM4Q2KtPx0JuFIAAzsPtbzj",
    "User-Access-Token": "J+V53FP3bqpSKlrRKbm09rw16tYd9hlRSB.PzLA??s8DS",
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "Program_Session": {
        "id": "92",
        "client_id": "Q8NfiyrBUzoXAl?1PYVzBv3jc$Nk1ZMV",
        "access_token": "+ZyYTsMl$BPuSePuEcqepOr03sP5S3R3lslyIobJU9dxr",
        "user_id": "221",
        "experation_timestamp": "2020-04-09 03:13:02",
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
                            },
                            {
                                "id": "313",
                                "company_id": "1",
                                "config_id": "4",
                                "config_value": "300",
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/v1/{company_id}/signin</code></p>
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
<td>The ID of the organization</td>
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
<td><code>username</code></td>
<td>string</td>
<td>required</td>
</tr>
<tr>
<td><code>password</code></td>
<td>string</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_3cb60164618dd6dfd435f39ac4ef6402 -->
<h1>Company</h1>
<p>Basic CRUD operations for Companies, Company Configs and Users</p>
<!-- START_81fc4121563abd0a0a65cb26f4a0a066 -->
<h2>{GET} api/v1/{company_id}/Users</h2>
<p>Return a list of users belonging to the company</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/1/Users?only_active=true" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: Q8NfiyrBUzoXAl?1PYVzBv3jc$Nk1ZMV" \
    -H "User-Access-Token: hY1TsDwzfo6L$e5G.5=jzuwo7oaqVt6w4zyJZ??US0WwC"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/Users"
);

let params = {
    "only_active": "true",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "Q8NfiyrBUzoXAl?1PYVzBv3jc$Nk1ZMV",
    "User-Access-Token": "hY1TsDwzfo6L$e5G.5=jzuwo7oaqVt6w4zyJZ??US0WwC",
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
        "Users": [
            {
                "id": "221",
                "username": "default",
                "active_status": true
            }
        ]
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/v1/{company_id}/Users</code></p>
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
<td>The ID of the organization</td>
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
<td><code>only_active</code></td>
<td>optional</td>
<td>if set will only return active users</td>
</tr>
</tbody>
</table>
<!-- END_81fc4121563abd0a0a65cb26f4a0a066 -->
<!-- START_228e9e1a1b5016f6a5e604abba80c2d9 -->
<h2>{POST} api/v1/{company_id}/User</h2>
<p>Create a user</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://project.dsfellowship.com/api/v1/1/User" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: Q8NfiyrBUzoXAl?1PYVzBv3jc$Nk1ZMV" \
    -H "User-Access-Token: NHjOtgk=kYRHXByjLKjipl0JOIeB5IjsGg=MB=ZUihG1H" \
    -d '{"username":"default","password":"Q8NfiyrBUzoXAl?1PYVzBv3jc$Nk1ZMV"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/User"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "Q8NfiyrBUzoXAl?1PYVzBv3jc$Nk1ZMV",
    "User-Access-Token": "NHjOtgk=kYRHXByjLKjipl0JOIeB5IjsGg=MB=ZUihG1H",
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/v1/{company_id}/User</code></p>
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
<td>The ID of the organization</td>
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
<td><code>username</code></td>
<td>string</td>
<td>required</td>
</tr>
<tr>
<td><code>password</code></td>
<td>string</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_228e9e1a1b5016f6a5e604abba80c2d9 -->
<!-- START_523a394728ab8a79e82878761dcb790f -->
<h2>{POST} api/v1/Company</h2>
<p>This framework doesn't allow a company to do anything unless there is an authorized user making the request.
So as part of creating a company this will auto create a master role that has access to all methods on all routes
It will also create a user with the username default (recommend disabling after establishing a real person with master credentials)
Make sure to record the default password upon success, this password is unrecoverable and the company would need to be deleted and recreated</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://project.dsfellowship.com/api/v1/Company" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: Q8NfiyrBUzoXAl?1PYVzBv3jc$Nk1ZMV" \
    -H "Secret-Token: P.N?KqJXK4CT54QuW4H2eWU+guM4Q2KtPx0JuFIAAzsPtbzj" \
    -d '{"company_name":"documentation_company"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Company successfully created",
    "master_password": "2aVU?tf.kc=NI8",
    "company": {
        "company_name": "documentation_company",
        "Company_Configs": [
            {
                "id": "322",
                "company_id": "1006",
                "config_id": "3",
                "config_value": "UTC",
                "active_status": "1",
                "Companies": {
                    "id": "1006",
                    "company_name": "documentation_company",
                    "active_status": "1"
                },
                "Configs": {
                    "id": "3",
                    "active_status": "1",
                    "config_name": "company_time_zone",
                    "default_value": "UTC"
                }
            },
            {
                "id": "321",
                "company_id": "1006",
                "config_id": "4",
                "config_value": "300",
                "active_status": "1",
                "Companies": {
                    "id": "1006",
                    "company_name": "documentation_company",
                    "active_status": "1"
                },
                "Configs": {
                    "id": "4",
                    "active_status": "1",
                    "config_name": "session_time_limit",
                    "default_value": "300"
                }
            }
        ],
        "Company_Roles": [
            {
                "id": "192",
                "company_id": "1006",
                "active_status": "1",
                "role_name": "master",
                "Companies": {
                    "id": "1006",
                    "company_name": "documentation_company",
                    "active_status": "1"
                },
                "Users_Have_Roles": [
                    {
                        "id": "264",
                        "user_id": "228",
                        "role_id": "192"
                    }
                ]
            }
        ]
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/v1/Company</code></p>
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
<td>The ID of the organization</td>
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
<td><code>company_name</code></td>
<td>string</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_523a394728ab8a79e82878761dcb790f -->
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
    -H "User-Access-Token: i23uSOaz9DXlrBMn8eSgBAv2GEz394yPWuGy0TgGLrm09"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/doc.json"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "User-Access-Token": "i23uSOaz9DXlrBMn8eSgBAv2GEz394yPWuGy0TgGLrm09",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET doc.json</code></p>
<!-- END_cd4a874127cd23508641c63b640ee838 -->
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