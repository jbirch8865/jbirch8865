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
    -H "client-id: nNJgngdqsELvvEus=aczqGRkGc.GXXbX" \
    -H "Secret-Token: fkTK8vdV33USfgBusQjpkwdY.0cqTgp0j+JX6QTBjlqcFa4R" \
    -H "User-Access-Token: usfTzAcSKlcQ?etmB2DUeF$?3WWLojbXeECF0T20WH3j+" \
    -d '{"username":"default","password":"nNJgngdqsELvvEus=aczqGRkGc.GXXbX"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/signin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "nNJgngdqsELvvEus=aczqGRkGc.GXXbX",
    "Secret-Token": "fkTK8vdV33USfgBusQjpkwdY.0cqTgp0j+JX6QTBjlqcFa4R",
    "User-Access-Token": "usfTzAcSKlcQ?etmB2DUeF$?3WWLojbXeECF0T20WH3j+",
};

let body = {
    "username": "default",
    "password": "nNJgngdqsELvvEus=aczqGRkGc.GXXbX"
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
        "client_id": "nNJgngdqsELvvEus=aczqGRkGc.GXXbX",
        "access_token": "a9o.qmxN+UYaF7arPNtHjUBFhrYmejonxPBBJzMLgPybX",
        "user_id": "1",
        "experation_timestamp": "2020-04-09 08:10:49",
        "Users_Have_Roles": [
            {
                "id": "8",
                "user_id": "1",
                "role_id": "6",
                "Company_Roles": {
                    "id": "6",
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
                                "id": "6",
                                "company_id": "1",
                                "role_name": "master",
                                "active_status": "1"
                            }
                        ]
                    },
                    "Users_Have_Roles": [
                        {
                            "id": "8",
                            "user_id": "1",
                            "role_id": "6",
                            "Company_Roles": {
                                "id": "6",
                                "company_id": "1",
                                "role_name": "master",
                                "active_status": "1"
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
    -G "https://project.dsfellowship.com/api/v1/1/Users?include_disabled=true&amp;offset=0&amp;limit=2" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: nNJgngdqsELvvEus=aczqGRkGc.GXXbX" \
    -H "User-Access-Token: SeGabSDi3?cfzl8EDGtCgN6B?Zyqc9.Fnxi7?XTY6dg$d"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/Users"
);

let params = {
    "include_disabled": "true",
    "offset": "0",
    "limit": "2",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "nNJgngdqsELvvEus=aczqGRkGc.GXXbX",
    "User-Access-Token": "SeGabSDi3?cfzl8EDGtCgN6B?Zyqc9.Fnxi7?XTY6dg$d",
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
                "id": "1",
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
<td><code>include_disabled</code></td>
<td>optional</td>
<td>if set will only return active users</td>
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
    -H "client-id: nNJgngdqsELvvEus=aczqGRkGc.GXXbX" \
    -H "User-Access-Token: uDsJ9YIwzKXxV1s?ETqbo$fE.S?Pwt2nTZlNuK91Fzscr" \
    -d '{"username":"default","password":"nNJgngdqsELvvEus=aczqGRkGc.GXXbX"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/User"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "nNJgngdqsELvvEus=aczqGRkGc.GXXbX",
    "User-Access-Token": "uDsJ9YIwzKXxV1s?ETqbo$fE.S?Pwt2nTZlNuK91Fzscr",
};

let body = {
    "username": "default",
    "password": "nNJgngdqsELvvEus=aczqGRkGc.GXXbX"
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
        "id": "1",
        "username": "default",
        "company_id": "1",
        "project_name": "project2",
        "cspring": "fbGgc=j40VDjGIk4s$OS9jmQOj2i+6BdWcCrQ+9$CSBe76uOxuAbrwUknc05nnYt",
        "active_status": "1",
        "verified_hashed_password": "8773f668eb4e18d922fc7850c28636b0f807b2adf1a01109bdf92ee0c6411915",
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
    -H "client-id: nNJgngdqsELvvEus=aczqGRkGc.GXXbX" \
    -H "Secret-Token: fkTK8vdV33USfgBusQjpkwdY.0cqTgp0j+JX6QTBjlqcFa4R" \
    -d '{"company_name":"documentation_company"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/Company"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "nNJgngdqsELvvEus=aczqGRkGc.GXXbX",
    "Secret-Token": "fkTK8vdV33USfgBusQjpkwdY.0cqTgp0j+JX6QTBjlqcFa4R",
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
    "master_password": "7ur4Bs.tUr4wxr",
    "company": {
        "company_name": "documentation_company",
        "Company_Configs": [
            {
                "id": "8",
                "company_id": "14",
                "config_id": "1",
                "config_value": "UTC",
                "active_status": "1",
                "Companies": {
                    "id": "14",
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
                "id": "7",
                "company_id": "14",
                "role_name": "master",
                "active_status": "1",
                "Companies": {
                    "id": "14",
                    "company_name": "documentation_company",
                    "active_status": "1"
                },
                "Users_Have_Roles": [
                    {
                        "id": "9",
                        "user_id": "7",
                        "role_id": "7"
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
<!-- START_8060c49b9883262b12e22f0571825e95 -->
<h2>{GET} app/v1/Companies</h2>
<p>List all companies</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/Companies?include_disabled=true&amp;include_details=2&amp;details_offset=0&amp;details_limit=1&amp;offset=0&amp;limit=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: nNJgngdqsELvvEus=aczqGRkGc.GXXbX" \
    -H "Secret-Token: fkTK8vdV33USfgBusQjpkwdY.0cqTgp0j+JX6QTBjlqcFa4R"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/Companies"
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
    "client-id": "nNJgngdqsELvvEus=aczqGRkGc.GXXbX",
    "Secret-Token": "fkTK8vdV33USfgBusQjpkwdY.0cqTgp0j+JX6QTBjlqcFa4R",
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
            "id": "14",
            "company_name": "documentation_company",
            "active_status": "1",
            "Company_Configs": [
                {
                    "id": "8",
                    "company_id": "14",
                    "config_id": "1",
                    "config_value": "UTC",
                    "active_status": "1",
                    "Companies": {
                        "id": "14",
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
                    "id": "7",
                    "company_id": "14",
                    "role_name": "master",
                    "active_status": "1",
                    "Companies": {
                        "id": "14",
                        "company_name": "documentation_company",
                        "active_status": "1"
                    },
                    "Users_Have_Roles": [
                        {
                            "id": "9",
                            "user_id": "7",
                            "role_id": "7"
                        }
                    ]
                }
            ]
        }
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/v1/Companies</code></p>
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
<!-- END_8060c49b9883262b12e22f0571825e95 -->
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
    -H "User-Access-Token: qj63BNEAwVZgWKli1ywo.WOl63F4yuHDQqnJ28SC$kCN+"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/doc.json"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "User-Access-Token": "qj63BNEAwVZgWKli1ywo.WOl63F4yuHDQqnJ28SC$kCN+",
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