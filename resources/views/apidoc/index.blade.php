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
    -H "client-id: NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T" \
    -H "secret-token: ?un$Y$CxxdMk+nOZ2bO$5g3MXoqyJ76p8x2uA9szrO=eq1KA" \
    -d '{"user":"default","password":"NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/signin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T",
    "secret-token": "?un$Y$CxxdMk+nOZ2bO$5g3MXoqyJ76p8x2uA9szrO=eq1KA",
};

let body = {
    "user": "default",
    "password": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T"
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
        "client_id": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T",
        "access_token": "m=IS.3+KCf4qRBcrvKdqoh54GJSykYz0=ZfHq13aoU3=W",
        "user_id": "1",
        "experation_timestamp": "2020-04-30 08:46:10"
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
<!-- START_1aee1acf38a8f7575d1a2b9eddc7a109 -->
<h2>{DELETE} {user}/signin/{company}/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/1/signin/default?active_status=" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T" \
    -H "User-Access-Token: UPWQQLFYg9FB5SAfGd6OFllS=p+E5N$Y.iFlgMlPwLH0C"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/signin/default"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T",
    "User-Access-Token": "UPWQQLFYg9FB5SAfGd6OFllS=p+E5N$Y.iFlgMlPwLH0C",
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
    "message": "Session revoked",
    "Program_Session": {
        "id": "3",
        "client_id": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T",
        "access_token": "UPWQQLFYg9FB5SAfGd6OFllS=p+E5N$Y.iFlgMlPwLH0C",
        "user_id": "1",
        "experation_timestamp": "2020-04-30 08:36:16"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/v1/{company}/signin/{signin}</code></p>
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
<td><code>signin</code></td>
<td>required</td>
<td>{string}</td>
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
<!-- END_1aee1acf38a8f7575d1a2b9eddc7a109 -->
<h1>CDM</h1>
<!-- START_76b5bb081b7655196b60780d41943e4e -->
<h2>{POST} employees/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://project.dsfellowship.com/api/v1/employees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T" \
    -H "User-Access-Token: UPWQQLFYg9FB5SAfGd6OFllS=p+E5N$Y.iFlgMlPwLH0C" \
    -d '{"first_name":"Bob","last_name":"Grillman","title":"The Builder","description":"Amazing Biceps","email":"Bob@amazingbiceps.com"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/employees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T",
    "User-Access-Token": "UPWQQLFYg9FB5SAfGd6OFllS=p+E5N$Y.iFlgMlPwLH0C",
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Employee Created",
    "Employee": {
        "id": 52,
        "first_name": "Bob",
        "last_name": "Grillman",
        "title": "The Builder",
        "description": "Amazing Biceps",
        "active_status": 1,
        "email": "Bob@amazingbiceps.com"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/v1/employees</code></p>
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
<td><code>first_name</code></td>
<td>string</td>
<td>required</td>
<td>{string}</td>
</tr>
<tr>
<td><code>last_name</code></td>
<td>string</td>
<td>required</td>
<td>{string}</td>
</tr>
<tr>
<td><code>title</code></td>
<td>string</td>
<td>optional</td>
<td>{string}</td>
</tr>
<tr>
<td><code>description</code></td>
<td>string</td>
<td>optional</td>
<td>{string}</td>
</tr>
<tr>
<td><code>email</code></td>
<td>string</td>
<td>optional</td>
<td>{string}</td>
</tr>
</tbody>
</table>
<!-- END_76b5bb081b7655196b60780d41943e4e -->
<!-- START_c3b1501f26d96b9bd4056f1aee29bb63 -->
<h2>{GET} employees/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/employees?include_disabled_objects=&amp;include_details=2&amp;details_offset=0&amp;details_limit=5&amp;limit=10&amp;offset=0" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T" \
    -H "User-Access-Token: UPWQQLFYg9FB5SAfGd6OFllS=p+E5N$Y.iFlgMlPwLH0C"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T",
    "User-Access-Token": "UPWQQLFYg9FB5SAfGd6OFllS=p+E5N$Y.iFlgMlPwLH0C",
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
    "Employee": {
        "Bob Grillman - 52": {
            "id": "52",
            "first_name": "Bob",
            "last_name": "Grillman",
            "title": "The Builder",
            "description": "Amazing Biceps",
            "active_status": "1",
            "email": "Bob@amazingbiceps.com",
            "People_Belong_To_Company": {
                "company_id": "1",
                "people_id": "52",
                "Companies": {
                    "id": "1",
                    "company_name": "System",
                    "active_status": "1"
                },
                "People": {
                    "id": "52",
                    "first_name": "Bob",
                    "last_name": "Grillman",
                    "title": "The Builder",
                    "description": "Amazing Biceps",
                    "active_status": "1",
                    "email": "Bob@amazingbiceps.com"
                }
            }
        }
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/v1/employees</code></p>
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
<td><code>include_disabled_objects</code></td>
<td>optional</td>
<td>{bool}</td>
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
<!-- END_c3b1501f26d96b9bd4056f1aee29bb63 -->
<!-- START_cd5d44cbadeaff4191f854a8d3a69147 -->
<h2>{PUT} employees/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://project.dsfellowship.com/api/v1/employees/52" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T" \
    -H "User-Access-Token: UPWQQLFYg9FB5SAfGd6OFllS=p+E5N$Y.iFlgMlPwLH0C" \
    -d '{"title":"The Founder","active_status":true}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/employees/52"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T",
    "User-Access-Token": "UPWQQLFYg9FB5SAfGd6OFllS=p+E5N$Y.iFlgMlPwLH0C",
};

let body = {
    "title": "The Founder",
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
    "message": "Employee Updated",
    "Employee": {
        "id": "52",
        "first_name": "Bob",
        "last_name": "Grillman",
        "title": "The Founder",
        "description": "Amazing Biceps",
        "active_status": "1",
        "email": "Bob@amazingbiceps.com"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/v1/employees/{employee}</code></p>
<p><code>PATCH api/v1/employees/{employee}</code></p>
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
<td><code>employee</code></td>
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
<td><code>title</code></td>
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
<!-- END_cd5d44cbadeaff4191f854a8d3a69147 -->
<!-- START_68f545670c93a37a8b8428e7151a1174 -->
<h2>{DELETE} {employee}/employees/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/employees/52?active_status=" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T" \
    -H "User-Access-Token: UPWQQLFYg9FB5SAfGd6OFllS=p+E5N$Y.iFlgMlPwLH0C"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/employees/52"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T",
    "User-Access-Token": "UPWQQLFYg9FB5SAfGd6OFllS=p+E5N$Y.iFlgMlPwLH0C",
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
    "message": "Employee Deleted"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/v1/employees/{employee}</code></p>
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
<td><code>employee</code></td>
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
<!-- END_68f545670c93a37a8b8428e7151a1174 -->
<h1>Company</h1>
<p>Basic CRUD operations for Companies, Company Configs and Users</p>
<!-- START_1aff981da377ba9a1bbc56ff8efaec0d -->
<h2>{GET} users/v1/api</h2>
<p>Return a list of users belonging to the company</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/users?include_disabled_objects=&amp;include_details=2&amp;details_offset=0&amp;details_limit=5&amp;limit=10&amp;offset=0" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T" \
    -H "User-Access-Token: UPWQQLFYg9FB5SAfGd6OFllS=p+E5N$Y.iFlgMlPwLH0C"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T",
    "User-Access-Token": "UPWQQLFYg9FB5SAfGd6OFllS=p+E5N$Y.iFlgMlPwLH0C",
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
                            "id": "123",
                            "company_id": "1",
                            "role_name": "5eaa8e9d39261",
                            "active_status": "0"
                        }
                    ]
                }
            }
        }
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/v1/users</code></p>
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
<td><code>include_disabled_objects</code></td>
<td>optional</td>
<td>{bool}</td>
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
<!-- END_1aff981da377ba9a1bbc56ff8efaec0d -->
<!-- START_4194ceb9a20b7f80b61d14d44df366b4 -->
<h2>{POST} users/v1/api</h2>
<p>Create a user</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://project.dsfellowship.com/api/v1/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T" \
    -H "User-Access-Token: UPWQQLFYg9FB5SAfGd6OFllS=p+E5N$Y.iFlgMlPwLH0C" \
    -d '{"user":"new_user","password":"NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T","company_roles":[{"id":"63","company_id":"1","role_name":"master","active_status":"1","Companies":{"id":"1","company_name":"System","active_status":"1","Company_Configs":[{"id":"2","company_id":"1","config_id":"1","config_value":"UTC","active_status":"1"}],"Company_Roles":[{"id":"123","company_id":"1","role_name":"5eaa8e9d39261","active_status":"0"}]},"Users_Have_Roles":[{"id":"82","user_id":"1","role_id":"63","Company_Roles":{"id":"63","company_id":"1","role_name":"master","active_status":"1"}}],"Routes_Have_Roles":[{"id":"842","route_id":"16","role_id":"63","right_id":"842","Routes":{"id":"16","name":"Create_Employee","implicit_allow":"0","module":"CDM"},"Company_Roles":{"id":"63","company_id":"1","role_name":"master","active_status":"1"},"Rights":{"id":"842","get":"1","destroy":"1","post":"1","patch":"1","put":"1"}},{"id":"843","route_id":"12","role_id":"63","right_id":"843","Routes":{"id":"12","name":"Create_Role","implicit_allow":"0","module":"Company"},"Company_Roles":{"id":"63","company_id":"1","role_name":"master","active_status":"1"},"Rights":{"id":"843","get":"1","destroy":"1","post":"1","patch":"1","put":"1"}},{"id":"844","route_id":"3","role_id":"63","right_id":"844","Routes":{"id":"3","name":"Create_User","implicit_allow":"0","module":"Company"},"Company_Roles":{"id":"63","company_id":"1","role_name":"master","active_status":"1"},"Rights":{"id":"844","get":"1","destroy":"1","post":"1","patch":"1","put":"1"}},{"id":"845","route_id":"18","role_id":"63","right_id":"845","Routes":{"id":"18","name":"Delete_Employee","implicit_allow":"0","module":"CDM"},"Company_Roles":{"id":"63","company_id":"1","role_name":"master","active_status":"1"},"Rights":{"id":"845","get":"1","destroy":"1","post":"1","patch":"1","put":"1"}},{"id":"846","route_id":"13","role_id":"63","right_id":"846","Routes":{"id":"13","name":"Delete_Role","implicit_allow":"0","module":"Company"},"Company_Roles":{"id":"63","company_id":"1","role_name":"master","active_status":"1"},"Rights":{"id":"846","get":"1","destroy":"1","post":"1","patch":"1","put":"1"}}]}]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T",
    "User-Access-Token": "UPWQQLFYg9FB5SAfGd6OFllS=p+E5N$Y.iFlgMlPwLH0C",
};

let body = {
    "user": "new_user",
    "password": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T",
    "company_roles": [
        {
            "id": "63",
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
                        "id": "123",
                        "company_id": "1",
                        "role_name": "5eaa8e9d39261",
                        "active_status": "0"
                    }
                ]
            },
            "Users_Have_Roles": [
                {
                    "id": "82",
                    "user_id": "1",
                    "role_id": "63",
                    "Company_Roles": {
                        "id": "63",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                }
            ],
            "Routes_Have_Roles": [
                {
                    "id": "842",
                    "route_id": "16",
                    "role_id": "63",
                    "right_id": "842",
                    "Routes": {
                        "id": "16",
                        "name": "Create_Employee",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "63",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "842",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "843",
                    "route_id": "12",
                    "role_id": "63",
                    "right_id": "843",
                    "Routes": {
                        "id": "12",
                        "name": "Create_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "63",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "843",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "844",
                    "route_id": "3",
                    "role_id": "63",
                    "right_id": "844",
                    "Routes": {
                        "id": "3",
                        "name": "Create_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "63",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "844",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "845",
                    "route_id": "18",
                    "role_id": "63",
                    "right_id": "845",
                    "Routes": {
                        "id": "18",
                        "name": "Delete_Employee",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "63",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "845",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "846",
                    "route_id": "13",
                    "role_id": "63",
                    "right_id": "846",
                    "Routes": {
                        "id": "13",
                        "name": "Delete_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "63",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "846",
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "User successfully created or already exists with that password",
    "user": {
        "id": 114,
        "username": "new_user",
        "company_id": 1,
        "project_name": "project2",
        "active_status": 1
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/v1/users</code></p>
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
<tr>
<td><code>company_roles</code></td>
<td>array</td>
<td>required</td>
<td>{array}</td>
</tr>
</tbody>
</table>
<!-- END_4194ceb9a20b7f80b61d14d44df366b4 -->
<!-- START_296fac4bf818c99f6dd42a4a0eb56b58 -->
<h2>{PUT} {user}/users/v1/api</h2>
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
    "https://project.dsfellowship.com/api/v1/users/new_user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T" \
    -H "User-Access-Token: UPWQQLFYg9FB5SAfGd6OFllS=p+E5N$Y.iFlgMlPwLH0C" \
    -d '{"new_password":"NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T","company_roles":[{"id":"63","company_id":"1","role_name":"master","active_status":"1"}],"active_status":true}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/users/new_user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T",
    "User-Access-Token": "UPWQQLFYg9FB5SAfGd6OFllS=p+E5N$Y.iFlgMlPwLH0C",
};

let body = {
    "new_password": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T",
    "company_roles": [
        {
            "id": "63",
            "company_id": "1",
            "role_name": "master",
            "active_status": "1"
        }
    ],
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
        "id": "114",
        "username": "new_user",
        "company_id": "1",
        "project_name": "project2",
        "active_status": 1
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/v1/users/{user}</code></p>
<p><code>PATCH api/v1/users/{user}</code></p>
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
<td><code>company_roles</code></td>
<td>array</td>
<td>required</td>
<td>{array}</td>
</tr>
<tr>
<td><code>active_status</code></td>
<td>bool</td>
<td>optional</td>
<td>{string}</td>
</tr>
</tbody>
</table>
<!-- END_296fac4bf818c99f6dd42a4a0eb56b58 -->
<!-- START_22354fc95c42d81a744eece68f5b9b9a -->
<h2>{DELETE} {user}/users/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/users/new_user?active_status=" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T" \
    -H "User-Access-Token: UPWQQLFYg9FB5SAfGd6OFllS=p+E5N$Y.iFlgMlPwLH0C"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/users/new_user"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T",
    "User-Access-Token": "UPWQQLFYg9FB5SAfGd6OFllS=p+E5N$Y.iFlgMlPwLH0C",
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
        "id": "114",
        "username": "new_user",
        "company_id": "1",
        "project_name": "project2",
        "active_status": "1"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/v1/users/{user}</code></p>
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
<!-- END_22354fc95c42d81a744eece68f5b9b9a -->
<!-- START_d2f16357cb4ed36dbb0e9529ea4a460c -->
<h2>{GET} roles/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/roles?include_disabled_objects=&amp;include_details=2&amp;details_offset=0&amp;details_limit=5&amp;limit=10&amp;offset=0" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T" \
    -H "User-Access-Token: UPWQQLFYg9FB5SAfGd6OFllS=p+E5N$Y.iFlgMlPwLH0C"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T",
    "User-Access-Token": "UPWQQLFYg9FB5SAfGd6OFllS=p+E5N$Y.iFlgMlPwLH0C",
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
        "master - 63": {
            "id": "63",
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
                        "id": "123",
                        "company_id": "1",
                        "role_name": "5eaa8e9d39261",
                        "active_status": "0"
                    }
                ]
            },
            "Users_Have_Roles": [
                {
                    "id": "82",
                    "user_id": "1",
                    "role_id": "63",
                    "Company_Roles": {
                        "id": "63",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                }
            ],
            "Routes_Have_Roles": [
                {
                    "id": "842",
                    "route_id": "16",
                    "role_id": "63",
                    "right_id": "842",
                    "Routes": {
                        "id": "16",
                        "name": "Create_Employee",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "63",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "842",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "843",
                    "route_id": "12",
                    "role_id": "63",
                    "right_id": "843",
                    "Routes": {
                        "id": "12",
                        "name": "Create_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "63",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "843",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "844",
                    "route_id": "3",
                    "role_id": "63",
                    "right_id": "844",
                    "Routes": {
                        "id": "3",
                        "name": "Create_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "63",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "844",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "845",
                    "route_id": "18",
                    "role_id": "63",
                    "right_id": "845",
                    "Routes": {
                        "id": "18",
                        "name": "Delete_Employee",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "63",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "845",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "846",
                    "route_id": "13",
                    "role_id": "63",
                    "right_id": "846",
                    "Routes": {
                        "id": "13",
                        "name": "Delete_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "63",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "846",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                }
            ]
        },
        "master - 126": {
            "id": "126",
            "company_id": "116",
            "role_name": "master",
            "active_status": "1",
            "Companies": {
                "id": "116",
                "company_name": "documentation_company",
                "active_status": "1",
                "Company_Configs": [
                    {
                        "id": "112",
                        "company_id": "116",
                        "config_id": "1",
                        "config_value": "UTC",
                        "active_status": "1"
                    }
                ],
                "Company_Roles": [
                    {
                        "id": "126",
                        "company_id": "116",
                        "role_name": "master",
                        "active_status": "1"
                    }
                ]
            },
            "Users_Have_Roles": [
                {
                    "id": "171",
                    "user_id": "113",
                    "role_id": "126",
                    "Company_Roles": {
                        "id": "126",
                        "company_id": "116",
                        "role_name": "master",
                        "active_status": "1"
                    }
                }
            ],
            "Routes_Have_Roles": [
                {
                    "id": "1673",
                    "route_id": "16",
                    "role_id": "126",
                    "right_id": "1673",
                    "Routes": {
                        "id": "16",
                        "name": "Create_Employee",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "126",
                        "company_id": "116",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1673",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "1674",
                    "route_id": "12",
                    "role_id": "126",
                    "right_id": "1674",
                    "Routes": {
                        "id": "12",
                        "name": "Create_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "126",
                        "company_id": "116",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1674",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "1675",
                    "route_id": "3",
                    "role_id": "126",
                    "right_id": "1675",
                    "Routes": {
                        "id": "3",
                        "name": "Create_User",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "126",
                        "company_id": "116",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1675",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "1676",
                    "route_id": "18",
                    "role_id": "126",
                    "right_id": "1676",
                    "Routes": {
                        "id": "18",
                        "name": "Delete_Employee",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "126",
                        "company_id": "116",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1676",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "1677",
                    "route_id": "13",
                    "role_id": "126",
                    "right_id": "1677",
                    "Routes": {
                        "id": "13",
                        "name": "Delete_Role",
                        "implicit_allow": "0",
                        "module": "Company"
                    },
                    "Company_Roles": {
                        "id": "126",
                        "company_id": "116",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1677",
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
<p><code>GET api/v1/roles</code></p>
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
<td><code>include_disabled_objects</code></td>
<td>optional</td>
<td>{bool}</td>
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
<!-- END_d2f16357cb4ed36dbb0e9529ea4a460c -->
<!-- START_5f753b2bffb6b34b6136ddfe1be7bcce -->
<h2>{POST} roles/v1/api</h2>
<p>So a company role is just a company and a name
However, in order to create a company you need to provide
an array of routes and the associated rights you would like
with that route.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://project.dsfellowship.com/api/v1/roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T" \
    -H "User-Access-Token: UPWQQLFYg9FB5SAfGd6OFllS=p+E5N$Y.iFlgMlPwLH0C" \
    -d '{"Routes_Have_Roles":[{"route_id":"3","Rights":{"get":true,"post":false,"patch":false,"put":false,"destroy":false}},{"route_id":"6","Rights":{"get":false,"post":true,"patch":false,"put":false,"destroy":false}}],"role_name":"5eaa8f2994e43"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/roles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T",
    "User-Access-Token": "UPWQQLFYg9FB5SAfGd6OFllS=p+E5N$Y.iFlgMlPwLH0C",
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
    "role_name": "5eaa8f2994e43"
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
        "id": "127",
        "company_id": "1",
        "role_name": "5eaa8f2994e43",
        "active_status": "1"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/v1/roles</code></p>
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
<!-- END_5f753b2bffb6b34b6136ddfe1be7bcce -->
<!-- START_81ac9047f8db2b92092c5a7f13e5d28d -->
<h2>{PUT} roles/v1/api</h2>
<p>This will recreate the role with the provided modal
Anything previous will be deleted so make sure this
is the complete modal you are expecting</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://project.dsfellowship.com/api/v1/roles/127" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T" \
    -H "User-Access-Token: UPWQQLFYg9FB5SAfGd6OFllS=p+E5N$Y.iFlgMlPwLH0C" \
    -d '{"Routes_Have_Roles":[{"route_id":"3","Rights":{"get":true,"post":false,"patch":false,"put":false,"destroy":false}},{"route_id":"6","Rights":{"get":false,"post":true,"patch":false,"put":false,"destroy":false}}],"role_name":"5eaa8f2a1d459","active_status":true}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/roles/127"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T",
    "User-Access-Token": "UPWQQLFYg9FB5SAfGd6OFllS=p+E5N$Y.iFlgMlPwLH0C",
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
    "role_name": "5eaa8f2a1d459",
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
        "id": "127",
        "company_id": "1",
        "role_name": "5eaa8f2a1d459",
        "active_status": 1
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/v1/roles/{role}</code></p>
<p><code>PATCH api/v1/roles/{role}</code></p>
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
<!-- END_81ac9047f8db2b92092c5a7f13e5d28d -->
<!-- START_04c524fc2f0ea8c793406426144b4c71 -->
<h2>{DELETE} roles/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/roles/127?active_status=" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T" \
    -H "User-Access-Token: UPWQQLFYg9FB5SAfGd6OFllS=p+E5N$Y.iFlgMlPwLH0C"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/roles/127"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T",
    "User-Access-Token": "UPWQQLFYg9FB5SAfGd6OFllS=p+E5N$Y.iFlgMlPwLH0C",
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
    "message": "Role successfully deleted"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/v1/roles/{role}</code></p>
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
<!-- END_04c524fc2f0ea8c793406426144b4c71 -->
<!-- START_3325a7e1462036041b5bb9084e516f11 -->
<h2>{GET} companies/v1/api</h2>
<p>List all companies</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/companies?include_disabled=true&amp;include_details=2&amp;details_offset=0&amp;details_limit=5&amp;offset=0&amp;limit=10&amp;include_disabled_objects=" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T" \
    -H "secret-token: ?un$Y$CxxdMk+nOZ2bO$5g3MXoqyJ76p8x2uA9szrO=eq1KA"</code></pre>
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
    "include_disabled_objects": "",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T",
    "secret-token": "?un$Y$CxxdMk+nOZ2bO$5g3MXoqyJ76p8x2uA9szrO=eq1KA",
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
                    "id": "123",
                    "company_id": "1",
                    "role_name": "5eaa8e9d39261",
                    "active_status": "0",
                    "Companies": {
                        "id": "1",
                        "company_name": "System",
                        "active_status": "1"
                    },
                    "Routes_Have_Roles": [
                        {
                            "id": "1634",
                            "route_id": "16",
                            "role_id": "123",
                            "right_id": "1634"
                        }
                    ]
                },
                {
                    "id": "63",
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
                            "id": "82",
                            "user_id": "1",
                            "role_id": "63"
                        }
                    ],
                    "Routes_Have_Roles": [
                        {
                            "id": "842",
                            "route_id": "16",
                            "role_id": "63",
                            "right_id": "842"
                        }
                    ]
                }
            ]
        },
        "documentation_company - 116": {
            "id": "116",
            "company_name": "documentation_company",
            "active_status": "1",
            "Company_Configs": [
                {
                    "id": "112",
                    "company_id": "116",
                    "config_id": "1",
                    "config_value": "UTC",
                    "active_status": "1",
                    "Companies": {
                        "id": "116",
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
                    "id": "111",
                    "company_id": "116",
                    "config_id": "2",
                    "config_value": "300",
                    "active_status": "1",
                    "Companies": {
                        "id": "116",
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
                    "id": "126",
                    "company_id": "116",
                    "role_name": "master",
                    "active_status": "1",
                    "Companies": {
                        "id": "116",
                        "company_name": "documentation_company",
                        "active_status": "1"
                    },
                    "Users_Have_Roles": [
                        {
                            "id": "171",
                            "user_id": "113",
                            "role_id": "126"
                        }
                    ],
                    "Routes_Have_Roles": [
                        {
                            "id": "1673",
                            "route_id": "16",
                            "role_id": "126",
                            "right_id": "1673"
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
<td><code>include_disabled_objects</code></td>
<td>optional</td>
<td>{bool}</td>
</tr>
</tbody>
</table>
<!-- END_3325a7e1462036041b5bb9084e516f11 -->
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
    -H "client-id: NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T" \
    -H "secret-token: ?un$Y$CxxdMk+nOZ2bO$5g3MXoqyJ76p8x2uA9szrO=eq1KA" \
    -d '{"company_name":"documentation_company"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/company"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T",
    "secret-token": "?un$Y$CxxdMk+nOZ2bO$5g3MXoqyJ76p8x2uA9szrO=eq1KA",
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
    "master_password": "tj10YLk19rsSa6",
    "company": {
        "id": 117,
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
    -H "secret-token: ?un$Y$CxxdMk+nOZ2bO$5g3MXoqyJ76p8x2uA9szrO=eq1KA"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/doc.json"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "secret-token": "?un$Y$CxxdMk+nOZ2bO$5g3MXoqyJ76p8x2uA9szrO=eq1KA",
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
        "_postman_id": "c27123ec-60c2-427a-aa20-4270b6369dcc",
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
                                "value": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T"
                            },
                            {
                                "key": "secret-token",
                                "value": "?un$Y$CxxdMk+nOZ2bO$5g3MXoqyJ76p8x2uA9szrO=eq1KA"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"user\": \"default\",\n    \"password\": \"NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T\"\n}"
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
                            "path": "api\/v1\/:company\/signin\/:signin",
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
                                "value": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "j4UfXYJPsSt1TQ3XQSpGSrDW8L4G8b4CNM7Ob8$1g+mZs"
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
                                "value": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "j4UfXYJPsSt1TQ3XQSpGSrDW8L4G8b4CNM7Ob8$1g+mZs"
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
                                "value": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "j4UfXYJPsSt1TQ3XQSpGSrDW8L4G8b4CNM7Ob8$1g+mZs"
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
                    "name": "{PUT} employees\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/employees\/:employee",
                            "query": [],
                            "variable": [
                                {
                                    "id": "employee",
                                    "key": "employee",
                                    "value": "51",
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
                                "value": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "j4UfXYJPsSt1TQ3XQSpGSrDW8L4G8b4CNM7Ob8$1g+mZs"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"title\": \"The Founder\",\n    \"active_status\": true\n}"
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
                            "path": "api\/v1\/employees\/:employee",
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
                                    "id": "employee",
                                    "key": "employee",
                                    "value": "51",
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
                                "value": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "j4UfXYJPsSt1TQ3XQSpGSrDW8L4G8b4CNM7Ob8$1g+mZs"
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
                                "value": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "j4UfXYJPsSt1TQ3XQSpGSrDW8L4G8b4CNM7Ob8$1g+mZs"
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
                                "value": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "j4UfXYJPsSt1TQ3XQSpGSrDW8L4G8b4CNM7Ob8$1g+mZs"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"user\": \"new_user\",\n    \"password\": \"NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T\",\n    \"company_roles\": [\n        {\n            \"id\": \"63\",\n            \"company_id\": \"1\",\n            \"role_name\": \"master\",\n            \"active_status\": \"1\",\n            \"Companies\": {\n                \"id\": \"1\",\n                \"company_name\": \"System\",\n                \"active_status\": \"1\",\n                \"Company_Configs\": [\n                    {\n                        \"id\": \"2\",\n                        \"company_id\": \"1\",\n                        \"config_id\": \"1\",\n                        \"config_value\": \"UTC\",\n                        \"active_status\": \"1\"\n                    }\n                ],\n                \"Company_Roles\": [\n                    {\n                        \"id\": \"123\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"5eaa8e9d39261\",\n                        \"active_status\": \"0\"\n                    }\n                ]\n            },\n            \"Users_Have_Roles\": [\n                {\n                    \"id\": \"82\",\n                    \"user_id\": \"1\",\n                    \"role_id\": \"63\",\n                    \"Company_Roles\": {\n                        \"id\": \"63\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    }\n                },\n                {\n                    \"id\": \"168\",\n                    \"user_id\": \"111\",\n                    \"role_id\": \"63\",\n                    \"Company_Roles\": {\n                        \"id\": \"63\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    }\n                }\n            ],\n            \"Routes_Have_Roles\": [\n                {\n                    \"id\": \"842\",\n                    \"route_id\": \"16\",\n                    \"role_id\": \"63\",\n                    \"right_id\": \"842\",\n                    \"Routes\": {\n                        \"id\": \"16\",\n                        \"name\": \"Create_Employee\",\n                        \"implicit_allow\": \"0\",\n                        \"module\": \"CDM\"\n                    },\n                    \"Company_Roles\": {\n                        \"id\": \"63\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    },\n                    \"Rights\": {\n                        \"id\": \"842\",\n                        \"get\": \"1\",\n                        \"destroy\": \"1\",\n                        \"post\": \"1\",\n                        \"patch\": \"1\",\n                        \"put\": \"1\"\n                    }\n                },\n                {\n                    \"id\": \"843\",\n                    \"route_id\": \"12\",\n                    \"role_id\": \"63\",\n                    \"right_id\": \"843\",\n                    \"Routes\": {\n                        \"id\": \"12\",\n                        \"name\": \"Create_Role\",\n                        \"implicit_allow\": \"0\",\n                        \"module\": \"Company\"\n                    },\n                    \"Company_Roles\": {\n                        \"id\": \"63\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    },\n                    \"Rights\": {\n                        \"id\": \"843\",\n                        \"get\": \"1\",\n                        \"destroy\": \"1\",\n                        \"post\": \"1\",\n                        \"patch\": \"1\",\n                        \"put\": \"1\"\n                    }\n                },\n                {\n                    \"id\": \"844\",\n                    \"route_id\": \"3\",\n                    \"role_id\": \"63\",\n                    \"right_id\": \"844\",\n                    \"Routes\": {\n                        \"id\": \"3\",\n                        \"name\": \"Create_User\",\n                        \"implicit_allow\": \"0\",\n                        \"module\": \"Company\"\n                    },\n                    \"Company_Roles\": {\n                        \"id\": \"63\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    },\n                    \"Rights\": {\n                        \"id\": \"844\",\n                        \"get\": \"1\",\n                        \"destroy\": \"1\",\n                        \"post\": \"1\",\n                        \"patch\": \"1\",\n                        \"put\": \"1\"\n                    }\n                },\n                {\n                    \"id\": \"845\",\n                    \"route_id\": \"18\",\n                    \"role_id\": \"63\",\n                    \"right_id\": \"845\",\n                    \"Routes\": {\n                        \"id\": \"18\",\n                        \"name\": \"Delete_Employee\",\n                        \"implicit_allow\": \"0\",\n                        \"module\": \"CDM\"\n                    },\n                    \"Company_Roles\": {\n                        \"id\": \"63\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    },\n                    \"Rights\": {\n                        \"id\": \"845\",\n                        \"get\": \"1\",\n                        \"destroy\": \"1\",\n                        \"post\": \"1\",\n                        \"patch\": \"1\",\n                        \"put\": \"1\"\n                    }\n                },\n                {\n                    \"id\": \"846\",\n                    \"route_id\": \"13\",\n                    \"role_id\": \"63\",\n                    \"right_id\": \"846\",\n                    \"Routes\": {\n                        \"id\": \"13\",\n                        \"name\": \"Delete_Role\",\n                        \"implicit_allow\": \"0\",\n                        \"module\": \"Company\"\n                    },\n                    \"Company_Roles\": {\n                        \"id\": \"63\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    },\n                    \"Rights\": {\n                        \"id\": \"846\",\n                        \"get\": \"1\",\n                        \"destroy\": \"1\",\n                        \"post\": \"1\",\n                        \"patch\": \"1\",\n                        \"put\": \"1\"\n                    }\n                }\n            ]\n        }\n    ]\n}"
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
                                "value": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "j4UfXYJPsSt1TQ3XQSpGSrDW8L4G8b4CNM7Ob8$1g+mZs"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"new_password\": \"NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T\",\n    \"company_roles\": [\n        {\n            \"id\": \"63\",\n            \"company_id\": \"1\",\n            \"role_name\": \"master\",\n            \"active_status\": \"1\"\n        }\n    ],\n    \"active_status\": true\n}"
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
                                "value": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "j4UfXYJPsSt1TQ3XQSpGSrDW8L4G8b4CNM7Ob8$1g+mZs"
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
                                "value": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "j4UfXYJPsSt1TQ3XQSpGSrDW8L4G8b4CNM7Ob8$1g+mZs"
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
                                "value": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "j4UfXYJPsSt1TQ3XQSpGSrDW8L4G8b4CNM7Ob8$1g+mZs"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"Routes_Have_Roles\": [\n        {\n            \"route_id\": \"3\",\n            \"Rights\": {\n                \"get\": true,\n                \"post\": false,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        },\n        {\n            \"route_id\": \"6\",\n            \"Rights\": {\n                \"get\": false,\n                \"post\": true,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        }\n    ],\n    \"role_name\": \"5eaa8ec278264\"\n}"
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
                                    "value": "125",
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
                                "value": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "j4UfXYJPsSt1TQ3XQSpGSrDW8L4G8b4CNM7Ob8$1g+mZs"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"Routes_Have_Roles\": [\n        {\n            \"route_id\": \"3\",\n            \"Rights\": {\n                \"get\": true,\n                \"post\": false,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        },\n        {\n            \"route_id\": \"6\",\n            \"Rights\": {\n                \"get\": false,\n                \"post\": true,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        }\n    ],\n    \"role_name\": \"5eaa8ec2f3079\",\n    \"active_status\": true\n}"
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
                                    "value": "125",
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
                                "value": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "j4UfXYJPsSt1TQ3XQSpGSrDW8L4G8b4CNM7Ob8$1g+mZs"
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
                                "value": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T"
                            },
                            {
                                "key": "secret-token",
                                "value": "?un$Y$CxxdMk+nOZ2bO$5g3MXoqyJ76p8x2uA9szrO=eq1KA"
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
                                "value": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T"
                            },
                            {
                                "key": "secret-token",
                                "value": "?un$Y$CxxdMk+nOZ2bO$5g3MXoqyJ76p8x2uA9szrO=eq1KA"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"company_name\": \"documentation_company\"\n}"
                        },
                        "description": "This framework doesn't allow a company to do anything unless there is an authorized user making the request.\nSo as part of creating a company this will auto create a master role that has access to all methods on all routes\nIt will also create a user with the username default (recommend disabling after establishing a real person with master credentials)\nMake sure to record the default password upon success, this password is unrecoverable and the company would need to be deleted and recreated",
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
                                "value": "?un$Y$CxxdMk+nOZ2bO$5g3MXoqyJ76p8x2uA9szrO=eq1KA"
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
                                    "key": "include_disabled_objects",
                                    "value": "1",
                                    "description": "{bool}",
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
                                "value": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T"
                            },
                            {
                                "key": "secret-token",
                                "value": "?un$Y$CxxdMk+nOZ2bO$5g3MXoqyJ76p8x2uA9szrO=eq1KA"
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
                                "value": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T"
                            },
                            {
                                "key": "secret-token",
                                "value": "?un$Y$CxxdMk+nOZ2bO$5g3MXoqyJ76p8x2uA9szrO=eq1KA"
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
    -G "https://project.dsfellowship.com/api/v1/routes?include_disabled_objects=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "client-id: NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T" \
    -H "secret-token: ?un$Y$CxxdMk+nOZ2bO$5g3MXoqyJ76p8x2uA9szrO=eq1KA"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/routes"
);

let params = {
    "include_disabled_objects": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T",
    "secret-token": "?un$Y$CxxdMk+nOZ2bO$5g3MXoqyJ76p8x2uA9szrO=eq1KA",
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
        "headers": {},
        "original": {
            "message": "Response Objects",
            "Route": {
                "apidoc.json - 9": 9,
                "Create_Company - 5": 5,
                "Create_Employee - 16": 16,
                "Create_Role - 12": 12,
                "Create_User - 3": 3,
                "Delete_Employee - 18": 18,
                "Delete_Role - 13": 13,
                "Delete_User - 10": 10,
                "Edit_Role - 14": 14,
                "Enable_Default_User - 11": 11,
                "List_Companies - 4": 4,
                "List_Employees - 15": 15,
                "List_Roles - 6": 6,
                "List_Routes - 8": 8,
                "List_Users - 2": 2,
                "Update_Employee - 17": 17,
                "Update_User - 7": 7,
                "User_Signin - 1": 1,
                "User_Signout - 19": 19
            }
        },
        "exception": null
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
<td><code>include_disabled_objects</code></td>
<td>required</td>
<td>{bool}</td>
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
    -H "client-id: NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T" \
    -H "secret-token: ?un$Y$CxxdMk+nOZ2bO$5g3MXoqyJ76p8x2uA9szrO=eq1KA"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/default_user/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "client-id": "NCJ12fQciiGcuR.7vbLou0M6Z+pj2u7T",
    "secret-token": "?un$Y$CxxdMk+nOZ2bO$5g3MXoqyJ76p8x2uA9szrO=eq1KA",
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