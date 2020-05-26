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
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "secret-token: dZqcDrlSKNv+tS5Zn?iOmSg3uXrew?R5Pn=OaX?9jJ$DK$N0" \
    -H "Content-Type: application/json" \
    -d '{"user":"default","password":"2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/signin"
);

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "secret-token": "dZqcDrlSKNv+tS5Zn?iOmSg3uXrew?R5Pn=OaX?9jJ$DK$N0",
    "Content-Type": "application/json",
};

let body = {
    "user": "default",
    "password": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
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
        "client_id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
        "access_token": "D.qvNQZh.la7Y9MbOq4lm.h9PQE$ikj00beEwJuNVz8.d",
        "user_id": "1",
        "experation_timestamp": "2020-05-16 06:44:27"
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
<!-- START_3e883aa0827947fa4757edb61b41430d -->
<h2>{DELETE} {user}/signin/{company}/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/companies/1/signin/default?active_status=" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/companies/1/signin/default"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
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
        "client_id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
        "access_token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
        "user_id": "1",
        "experation_timestamp": "2020-05-16 06:34:42"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/v1/companies/{company}/signin/{signin}</code></p>
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
<!-- END_3e883aa0827947fa4757edb61b41430d -->
<h1>CDM</h1>
<!-- START_c3b1501f26d96b9bd4056f1aee29bb63 -->
<h2>{GET} employees/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/employees?include_disabled_objects=&amp;include_details=2&amp;details_offset=0&amp;details_limit=5&amp;limit=10&amp;offset=0" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV"</code></pre>
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
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
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
    "Employee": []
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
<!-- START_76b5bb081b7655196b60780d41943e4e -->
<h2>{POST} employees/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://project.dsfellowship.com/api/v1/employees" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV" \
    -H "Content-Type: application/json" \
    -d '{"first_name":"Bob","last_name":"Grillman","title":"The Builder","description":"Amazing Biceps","email":"Bob@amazingbiceps.com"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/employees"
);

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Employee Created",
    "Employee": {
        "id": 68,
        "first_name": "Bob",
        "last_name": "Grillman",
        "title": "The Builder",
        "email": "Bob@amazingbiceps.com",
        "description": "Amazing Biceps",
        "active_status": 1,
        "company_id": 1
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
<!-- START_4ae2add2ef264683a8a9e6ab16bae2f3 -->
<h2>{POST} creditstatuses/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://project.dsfellowship.com/api/v1/creditstatuses" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV" \
    -H "Content-Type: application/json" \
    -d '{"name":"Good"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/creditstatuses"
);

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Credit_Status Created",
    "Credit_Status": {
        "id": 68,
        "credit_status_name": "Good",
        "company_id": 1,
        "active_status": 1
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/v1/creditstatuses</code></p>
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
<td><code>name</code></td>
<td>string</td>
<td>required</td>
<td>{string}</td>
</tr>
</tbody>
</table>
<!-- END_4ae2add2ef264683a8a9e6ab16bae2f3 -->
<!-- START_81005cc50aac34cd5507d224bfe2fdfb -->
<h2>{GET} creditstatuses/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/creditstatuses?include_disabled_objects=&amp;include_details=2&amp;details_offset=0&amp;details_limit=5&amp;limit=10&amp;offset=0" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
        "Good 80 - 11": {
            "id": "11",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
        "Good 80 - 12": {
            "id": "12",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
        "Good 80 - 13": {
            "id": "13",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
        "Good 80 - 14": {
            "id": "14",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/v1/creditstatuses</code></p>
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
<!-- END_81005cc50aac34cd5507d224bfe2fdfb -->
<!-- START_8724fb8d28b3369b26fcafe957895f3b -->
<h2>{PUT} {creditstatus}/credit_statuses/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://project.dsfellowship.com/api/v1/creditstatuses/68" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV" \
    -H "Content-Type: application/json" \
    -d '{"name":"Good 80"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/creditstatuses/68"
);

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Credit Status Updated",
    "Credit_Status": {
        "id": "68",
        "credit_status_name": "Good 80",
        "company_id": "1",
        "active_status": "1"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/v1/creditstatuses/{creditstatus}</code></p>
<p><code>PATCH api/v1/creditstatuses/{creditstatus}</code></p>
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
<td><code>creditstatus</code></td>
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
<td><code>name</code></td>
<td>string</td>
<td>optional</td>
<td>{string}</td>
</tr>
</tbody>
</table>
<!-- END_8724fb8d28b3369b26fcafe957895f3b -->
<!-- START_d113b631052d46d41c6de1f91d8905f4 -->
<h2>{POST} customers/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://project.dsfellowship.com/api/v1/customers" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV" \
    -H "Content-Type: application/json" \
    -d '{"customer_name":"Bob The Builder","credit_status":68,"ccb":"","website":"www.amazingbiceps.com"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/customers"
);

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
};

let body = {
    "customer_name": "Bob The Builder",
    "credit_status": 68,
    "ccb": "",
    "website": "www.amazingbiceps.com"
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
    "message": "Customer Created",
    "Customer": {
        "id": 68,
        "customer_name": "Bob The Builder",
        "credit_status": 68,
        "website": "www.amazingbiceps.com",
        "ccb": "",
        "company_id": 1,
        "active_status": 1
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/v1/customers</code></p>
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
<td><code>customer_name</code></td>
<td>string</td>
<td>required</td>
<td>{string}</td>
</tr>
<tr>
<td><code>credit_status</code></td>
<td>int</td>
<td>required</td>
<td>{int}</td>
</tr>
<tr>
<td><code>ccb</code></td>
<td>string</td>
<td>optional</td>
<td>{string}</td>
</tr>
<tr>
<td><code>website</code></td>
<td>string</td>
<td>optional</td>
<td>{string}</td>
</tr>
</tbody>
</table>
<!-- END_d113b631052d46d41c6de1f91d8905f4 -->
<!-- START_e680a22e8c8604379f3319896fca4d36 -->
<h2>{GET} customers/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/customers?include_disabled_objects=&amp;include_details=2&amp;details_offset=0&amp;details_limit=5&amp;limit=10&amp;offset=0" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
        "Bob and Son The Builders - 11": {
            "id": "11",
            "customer_name": "Bob and Son The Builders",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
        },
        "Bob and Son The Builders - 12": {
            "id": "12",
            "customer_name": "Bob and Son The Builders",
            "credit_status": "12",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
                "id": "12",
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
        "Bob and Son The Builders - 13": {
            "id": "13",
            "customer_name": "Bob and Son The Builders",
            "credit_status": "13",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
                "id": "13",
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
        "Bob and Son The Builders - 14": {
            "id": "14",
            "customer_name": "Bob and Son The Builders",
            "credit_status": "14",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
                "id": "14",
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/v1/customers</code></p>
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
<!-- END_e680a22e8c8604379f3319896fca4d36 -->
<!-- START_a1eb533beb6315e57c1bc2dd4d4fd5a3 -->
<h2>{PUT} {customer}/customers/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://project.dsfellowship.com/api/v1/customers/68" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV" \
    -H "Content-Type: application/json" \
    -d '{"customer_name":"Bob and Son The Builders","credit_status":68,"ccb":"","website":"www.amazingbiceps.com"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/customers/68"
);

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
};

let body = {
    "customer_name": "Bob and Son The Builders",
    "credit_status": 68,
    "ccb": "",
    "website": "www.amazingbiceps.com"
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
    "message": "Customer Updated",
    "Customer": {
        "id": "68",
        "customer_name": "Bob and Son The Builders",
        "credit_status": 68,
        "website": "www.amazingbiceps.com",
        "ccb": "",
        "company_id": "1",
        "active_status": "1"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/v1/customers/{customer}</code></p>
<p><code>PATCH api/v1/customers/{customer}</code></p>
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
<td><code>customer</code></td>
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
<td><code>customer_name</code></td>
<td>string</td>
<td>optional</td>
<td>{string}</td>
</tr>
<tr>
<td><code>credit_status</code></td>
<td>int</td>
<td>optional</td>
<td>{int}</td>
</tr>
<tr>
<td><code>ccb</code></td>
<td>string</td>
<td>optional</td>
<td>{string}</td>
</tr>
<tr>
<td><code>website</code></td>
<td>string</td>
<td>optional</td>
<td>{string}</td>
</tr>
</tbody>
</table>
<!-- END_a1eb533beb6315e57c1bc2dd4d4fd5a3 -->
<!-- START_226b5da00a059d38f1162e2cc9ae29d4 -->
<h2>{POST} equipment/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://project.dsfellowship.com/api/v1/equipment" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV" \
    -H "Content-Type: application/json" \
    -d '{"equipment_name":"F3452"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/equipment"
);

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Equipment Created",
    "Equipment": {
        "id": 68,
        "equipment_name": "F3452",
        "company_id": 1,
        "active_status": 1
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/v1/equipment</code></p>
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
<td><code>equipment_name</code></td>
<td>string</td>
<td>required</td>
<td>{string}</td>
</tr>
</tbody>
</table>
<!-- END_226b5da00a059d38f1162e2cc9ae29d4 -->
<!-- START_12a211602c23da463598adc31c06a157 -->
<h2>{GET} equipment/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/equipment?include_disabled_objects=&amp;include_details=2&amp;details_offset=0&amp;details_limit=5&amp;limit=10&amp;offset=0" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
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
    "Equipment": {
        "F3452 - 68": {
            "id": "68",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
                        "active_status": "1"
                    }
                ],
                "Equipments": [
                    {
                        "id": "68",
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/v1/equipment</code></p>
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
<!-- END_12a211602c23da463598adc31c06a157 -->
<!-- START_6b8a847c0ac6a2dab0ff9e90f7f07e35 -->
<h2>{PUT} {equipment}/equipment/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://project.dsfellowship.com/api/v1/equipment/68" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV" \
    -H "Content-Type: application/json" \
    -d '{"equipment_name":"F3453"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/equipment/68"
);

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Equipment Updated",
    "Equipment": {
        "id": "68",
        "equipment_name": "F3453",
        "company_id": "1",
        "active_status": "1"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/v1/equipment/{equipment}</code></p>
<p><code>PATCH api/v1/equipment/{equipment}</code></p>
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
<td><code>equipment</code></td>
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
<td><code>equipment_name</code></td>
<td>string</td>
<td>optional</td>
<td>{string}</td>
</tr>
</tbody>
</table>
<!-- END_6b8a847c0ac6a2dab0ff9e90f7f07e35 -->
<!-- START_6684b9b8c09eab38e28e1d63210b302b -->
<h2>{DELETE} {equipment}/equipment/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/equipment/68?active_status=" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/equipment/68"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
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
    "message": "Equipment Deleted"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/v1/equipment/{equipment}</code></p>
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
<td><code>equipment</code></td>
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
<!-- END_6684b9b8c09eab38e28e1d63210b302b -->
<!-- START_d8c47f1a8318e20b72fbb34a2b7582e8 -->
<h2>{GET} customer_addresses/{customer}/customers/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/customers/68/customeraddresses?include_disabled_objects=&amp;include_details=2&amp;details_offset=0&amp;details_limit=5&amp;limit=10&amp;offset=0" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/customers/68/customeraddresses"
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
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
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
    "Customer_Address": []
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/v1/customers/{customer}/customeraddresses</code></p>
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
<td><code>customer</code></td>
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
<!-- END_d8c47f1a8318e20b72fbb34a2b7582e8 -->
<!-- START_444e58b8665537b015b6aed35d40c41a -->
<h2>{POST} customer_addresses/{customer}/customers/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://project.dsfellowship.com/api/v1/customers/68/customeraddresses" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV" \
    -H "Content-Type: application/json" \
    -d '{"description":"Physical","city":"Portland","state":"OR","street1":"1234 NW Front St","street2":"Suite 203","zip":"97123","lat":"123.000001254","lng":"-312.45675","url":"","google_id":""}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/customers/68/customeraddresses"
);

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Customer Address Created",
    "Customer_Address": {
        "id": 68,
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/v1/customers/{customer}/customeraddresses</code></p>
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
<td><code>customer</code></td>
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
<td><code>description</code></td>
<td>string</td>
<td>required</td>
<td>{string}</td>
</tr>
<tr>
<td><code>city</code></td>
<td>string</td>
<td>required</td>
<td>{string}</td>
</tr>
<tr>
<td><code>state</code></td>
<td>string</td>
<td>required</td>
<td>{string}</td>
</tr>
<tr>
<td><code>street1</code></td>
<td>string</td>
<td>optional</td>
<td>{string}</td>
</tr>
<tr>
<td><code>street2</code></td>
<td>string</td>
<td>optional</td>
<td>{string}</td>
</tr>
<tr>
<td><code>zip</code></td>
<td>string</td>
<td>optional</td>
<td>{string}</td>
</tr>
<tr>
<td><code>lat</code></td>
<td>string</td>
<td>optional</td>
<td>{string} Latitude Coordinate</td>
</tr>
<tr>
<td><code>lng</code></td>
<td>string</td>
<td>optional</td>
<td>{string} Longitude Coordinate</td>
</tr>
<tr>
<td><code>url</code></td>
<td>string</td>
<td>optional</td>
<td>{string} a url you would like to link to this address.</td>
</tr>
<tr>
<td><code>google_id</code></td>
<td>string</td>
<td>optional</td>
<td>{string} if present supply the google location id for extra google features</td>
</tr>
</tbody>
</table>
<!-- END_444e58b8665537b015b6aed35d40c41a -->
<!-- START_566b375c8081ae74697d645858dac4b7 -->
<h2>{GET} addtags/customers/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/customers/addtags?include_disabled_objects=&amp;include_details=2&amp;details_offset=0&amp;details_limit=5&amp;limit=10&amp;offset=0" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/customers/addtags"
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
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
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
    "Tag": {
        "5ebdde5101159 - 2": {
            "id": "2",
            "name": "5ebdde5101159",
            "company_id": "1",
            "object_table_name": "Customers",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
        "5ebde1cf02a0d - 3": {
            "id": "3",
            "name": "5ebde1cf02a0d",
            "company_id": "1",
            "object_table_name": "Customers",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
        "5ebde23e7bccb - 5": {
            "id": "5",
            "name": "5ebde23e7bccb",
            "company_id": "1",
            "object_table_name": "Customers",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
        "5ebde2e4cec1b - 6": {
            "id": "6",
            "name": "5ebde2e4cec1b",
            "company_id": "1",
            "object_table_name": "Customers",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
        "5ebde4caa35c0 - 8": {
            "id": "8",
            "name": "5ebde4caa35c0",
            "company_id": "1",
            "object_table_name": "Customers",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
        "5ebde7546f22d - 9": {
            "id": "9",
            "name": "5ebde7546f22d",
            "company_id": "1",
            "object_table_name": "Customers",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
        "5ebde7fe6e15f - 11": {
            "id": "11",
            "name": "5ebde7fe6e15f",
            "company_id": "1",
            "object_table_name": "Customers",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
        "5ebde8595509c - 12": {
            "id": "12",
            "name": "5ebde8595509c",
            "company_id": "1",
            "object_table_name": "Customers",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
        "5ebdea3d03e3c - 14": {
            "id": "14",
            "name": "5ebdea3d03e3c",
            "company_id": "1",
            "object_table_name": "Customers",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
        "5ebdeb3d9bcde - 15": {
            "id": "15",
            "name": "5ebdeb3d9bcde",
            "company_id": "1",
            "object_table_name": "Customers",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/v1/customers/addtags</code></p>
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
<!-- END_566b375c8081ae74697d645858dac4b7 -->
<!-- START_74dedb46a3f21a2589c4f20ba4a88c3c -->
<h2>{POST} addtags/customers/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://project.dsfellowship.com/api/v1/customers/addtags" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV" \
    -H "Content-Type: application/json" \
    -d '{"tag_name":"5ebf8aa6d0bef"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/customers/addtags"
);

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
};

let body = {
    "tag_name": "5ebf8aa6d0bef"
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
    "message": "Customer Tag Created",
    "Customer_Tag": {
        "id": 121,
        "name": "5ebf8aa6d0bef",
        "company_id": 1,
        "object_table_name": "Customers",
        "active_status": 1
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/v1/customers/addtags</code></p>
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
<td><code>tag_name</code></td>
<td>string</td>
<td>required</td>
<td>{string}</td>
</tr>
</tbody>
</table>
<!-- END_74dedb46a3f21a2589c4f20ba4a88c3c -->
<!-- START_d12743cfafe90729422c3a4fa60ba23c -->
<h2>{GET} addedtags/{customer}/customers/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/customers/68/addtags?include_disabled_objects=&amp;include_details=2&amp;details_offset=0&amp;details_limit=5&amp;limit=10&amp;offset=0" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/customers/68/addtags"
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
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
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
    "Tag": []
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/v1/customers/{customer}/addtags</code></p>
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
<td><code>customer</code></td>
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
<!-- END_d12743cfafe90729422c3a4fa60ba23c -->
<!-- START_2ad77bb6c92166ac3dab0ae54c03accd -->
<h2>{POST} addtags/{customer}/customers/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://project.dsfellowship.com/api/v1/customers/68/addtags" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV" \
    -H "Content-Type: application/json" \
    -d '{"addtag":121}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/customers/68/addtags"
);

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
};

let body = {
    "addtag": 121
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
    "message": "Tag Added To Customer",
    "Customer": {
        "id": "68",
        "customer_name": "Bob and Son The Builders",
        "credit_status": "68",
        "website": "www.amazingbiceps.com",
        "ccb": "",
        "company_id": "1",
        "active_status": "1"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/v1/customers/{customer}/addtags</code></p>
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
<td><code>customer</code></td>
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
<td><code>addtag</code></td>
<td>int</td>
<td>required</td>
<td>{int}</td>
</tr>
</tbody>
</table>
<!-- END_2ad77bb6c92166ac3dab0ae54c03accd -->
<!-- START_76baced5b934424ff03e345bba97b6d1 -->
<h2>{DELETE} {addtag}/addtags/{customer}/customers/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/customers/68/addtags/1?active_status=" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV" \
    -H "Content-Type: application/json" \
    -d '{"addtag":121}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/customers/68/addtags/1"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
};

let body = {
    "addtag": 121
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Tag Removed From Customer",
    "Customer": {
        "id": "68",
        "customer_name": "Bob and Son The Builders",
        "credit_status": "68",
        "website": "www.amazingbiceps.com",
        "ccb": "",
        "company_id": "1",
        "active_status": "1"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/v1/customers/{customer}/addtags/{addtag}</code></p>
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
<td><code>customer</code></td>
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
<td><code>addtag</code></td>
<td>int</td>
<td>required</td>
<td>{int}</td>
</tr>
</tbody>
</table>
<!-- END_76baced5b934424ff03e345bba97b6d1 -->
<!-- START_115e1a6e1c6f387d892a1d18582c55e6 -->
<h2>{GET} phonenumbers/{customer}/customers/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/customers/68/phonenumbers?include_disabled_objects=&amp;include_details=2&amp;details_offset=0&amp;details_limit=5&amp;limit=10&amp;offset=0" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/customers/68/phonenumbers"
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
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
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
    "Customer_Phone_Number": []
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/v1/customers/{customer}/phonenumbers</code></p>
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
<td><code>customer</code></td>
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
<!-- END_115e1a6e1c6f387d892a1d18582c55e6 -->
<!-- START_cb32251418e5f4078eb929d6c504aa8f -->
<h2>{POST} phonenumbers/{customer}/customers/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://project.dsfellowship.com/api/v1/customers/68/phonenumbers" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV" \
    -H "Content-Type: application/json" \
    -d '{"description":"Home 1","area_code":"503","prefix":"631","suffix":"8865","ext":"1234","country_code":1}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/customers/68/phonenumbers"
);

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Customer Phone Number Created",
    "Customer_Phone_Number": {
        "id": 35,
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/v1/customers/{customer}/phonenumbers</code></p>
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
<td><code>customer</code></td>
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
<td><code>description</code></td>
<td>string</td>
<td>optional</td>
<td>{string}</td>
</tr>
<tr>
<td><code>area_code</code></td>
<td>int</td>
<td>required</td>
<td>{int}</td>
</tr>
<tr>
<td><code>prefix</code></td>
<td>int</td>
<td>required</td>
<td>{int}</td>
</tr>
<tr>
<td><code>suffix</code></td>
<td>int</td>
<td>required</td>
<td>{int}</td>
</tr>
<tr>
<td><code>ext</code></td>
<td>int</td>
<td>optional</td>
<td>{int}</td>
</tr>
<tr>
<td><code>country_code</code></td>
<td>int</td>
<td>optional</td>
<td>{int}</td>
</tr>
</tbody>
</table>
<!-- END_cb32251418e5f4078eb929d6c504aa8f -->
<!-- START_dbe522f7ae20a209a9068bfaefe9fc01 -->
<h2>{DELETE} {customer}/customers/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/customers/68?active_status=" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/customers/68"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
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
    "message": "Customer Deleted"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/v1/customers/{customer}</code></p>
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
<td><code>customer</code></td>
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
<!-- END_dbe522f7ae20a209a9068bfaefe9fc01 -->
<!-- START_b3f889412af8021019fddbb9dcad8eb4 -->
<h2>{DELETE} {creditstatus}/credit_statuses/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/creditstatuses/68?active_status=" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/creditstatuses/68"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
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
    "message": "Credit_Status Deleted"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/v1/creditstatuses/{creditstatus}</code></p>
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
<td><code>creditstatus</code></td>
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
<!-- END_b3f889412af8021019fddbb9dcad8eb4 -->
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
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV"</code></pre>
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
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
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
                            "id": "9",
                            "company_id": "1",
                            "role_name": "5ebdde4d53e93",
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
                        "id": "135",
                        "user_id": "1",
                        "role_id": "102",
                        "Company_Roles": {
                            "id": "102",
                            "company_id": "1",
                            "role_name": "master",
                            "active_status": "1"
                        }
                    }
                ]
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
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV" \
    -H "Content-Type: application/json" \
    -d '{"user":"new_user","password":"2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7","company_roles":[{"id":"102","company_id":"1","role_name":"master","active_status":"1","Companies":{"id":"1","company_name":"System","active_status":"1","Company_Configs":[{"id":"2","company_id":"1","config_id":"1","config_value":"UTC","active_status":"1"}],"Company_Roles":[{"id":"9","company_id":"1","role_name":"5ebdde4d53e93","active_status":"1"}],"Credit_Statuses":[{"id":"2","credit_status_name":"Good 80","company_id":"1","active_status":"1"}]},"Users_Have_Roles":[{"id":"135","user_id":"1","role_id":"102","Company_Roles":{"id":"102","company_id":"1","role_name":"master","active_status":"1"}}],"Roles_Have_Routes":[{"id":"5057","route_id":"46","role_id":"102","right_id":"5057","Routes":{"id":"46","name":"Add_Role_To_Tag","implicit_allow":"0","module":"Global"},"Company_Roles":{"id":"102","company_id":"1","role_name":"master","active_status":"1"},"Rights":{"id":"5057","get":"1","destroy":"1","post":"1","patch":"1","put":"1"}},{"id":"5058","route_id":"50","role_id":"102","right_id":"5058","Routes":{"id":"50","name":"Add_Tag_To_Customer","implicit_allow":"0","module":"CDM"},"Company_Roles":{"id":"102","company_id":"1","role_name":"master","active_status":"1"},"Rights":{"id":"5058","get":"1","destroy":"1","post":"1","patch":"1","put":"1"}},{"id":"5059","route_id":"48","role_id":"102","right_id":"5059","Routes":{"id":"48","name":"Add_Tag_To_Tag","implicit_allow":"0","module":"Global"},"Company_Roles":{"id":"102","company_id":"1","role_name":"master","active_status":"1"},"Rights":{"id":"5059","get":"1","destroy":"1","post":"1","patch":"1","put":"1"}},{"id":"5060","route_id":"25","role_id":"102","right_id":"5060","Routes":{"id":"25","name":"Create_Credit_Status","implicit_allow":"0","module":"CDM"},"Company_Roles":{"id":"102","company_id":"1","role_name":"master","active_status":"1"},"Rights":{"id":"5060","get":"1","destroy":"1","post":"1","patch":"1","put":"1"}},{"id":"5061","route_id":"21","role_id":"102","right_id":"5061","Routes":{"id":"21","name":"Create_Customer","implicit_allow":"0","module":"CDM"},"Company_Roles":{"id":"102","company_id":"1","role_name":"master","active_status":"1"},"Rights":{"id":"5061","get":"1","destroy":"1","post":"1","patch":"1","put":"1"}}],"Tags_Have_Roles":[{"tag_id":"56","role_id":"102","get":"0","destroy":"1","post":"1","Tags":{"id":"56","name":"Staff","company_id":"1","object_table_name":"Tags","active_status":"1"},"Company_Roles":{"id":"102","company_id":"1","role_name":"master","active_status":"1"}},{"tag_id":"61","role_id":"102","get":"1","destroy":"1","post":"1","Tags":{"id":"61","name":"5ebf6d19b6f1c","company_id":"1","object_table_name":"Customers","active_status":"1"},"Company_Roles":{"id":"102","company_id":"1","role_name":"master","active_status":"1"}},{"tag_id":"68","role_id":"102","get":"1","destroy":"1","post":"1","Tags":{"id":"68","name":"Staff","company_id":"1","object_table_name":"Tags","active_status":"1"},"Company_Roles":{"id":"102","company_id":"1","role_name":"master","active_status":"1"}},{"tag_id":"69","role_id":"102","get":"1","destroy":"1","post":"1","Tags":{"id":"69","name":"5ebf721e444c4","company_id":"1","object_table_name":"Customers","active_status":"1"},"Company_Roles":{"id":"102","company_id":"1","role_name":"master","active_status":"1"}},{"tag_id":"73","role_id":"102","get":"1","destroy":"1","post":"1","Tags":{"id":"73","name":"5ebf75afa1d65","company_id":"1","object_table_name":"Customers","active_status":"1"},"Company_Roles":{"id":"102","company_id":"1","role_name":"master","active_status":"1"}}]}]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/users"
);

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
};

let body = {
    "user": "new_user",
    "password": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "company_roles": [
        {
            "id": "102",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
                    "id": "135",
                    "user_id": "1",
                    "role_id": "102",
                    "Company_Roles": {
                        "id": "102",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                }
            ],
            "Roles_Have_Routes": [
                {
                    "id": "5057",
                    "route_id": "46",
                    "role_id": "102",
                    "right_id": "5057",
                    "Routes": {
                        "id": "46",
                        "name": "Add_Role_To_Tag",
                        "implicit_allow": "0",
                        "module": "Global"
                    },
                    "Company_Roles": {
                        "id": "102",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "5057",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "5058",
                    "route_id": "50",
                    "role_id": "102",
                    "right_id": "5058",
                    "Routes": {
                        "id": "50",
                        "name": "Add_Tag_To_Customer",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "102",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "5058",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "5059",
                    "route_id": "48",
                    "role_id": "102",
                    "right_id": "5059",
                    "Routes": {
                        "id": "48",
                        "name": "Add_Tag_To_Tag",
                        "implicit_allow": "0",
                        "module": "Global"
                    },
                    "Company_Roles": {
                        "id": "102",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "5059",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "5060",
                    "route_id": "25",
                    "role_id": "102",
                    "right_id": "5060",
                    "Routes": {
                        "id": "25",
                        "name": "Create_Credit_Status",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "102",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "5060",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                },
                {
                    "id": "5061",
                    "route_id": "21",
                    "role_id": "102",
                    "right_id": "5061",
                    "Routes": {
                        "id": "21",
                        "name": "Create_Customer",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "102",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "5061",
                        "get": "1",
                        "destroy": "1",
                        "post": "1",
                        "patch": "1",
                        "put": "1"
                    }
                }
            ],
            "Tags_Have_Roles": [
                {
                    "tag_id": "56",
                    "role_id": "102",
                    "get": "0",
                    "destroy": "1",
                    "post": "1",
                    "Tags": {
                        "id": "56",
                        "name": "Staff",
                        "company_id": "1",
                        "object_table_name": "Tags",
                        "active_status": "1"
                    },
                    "Company_Roles": {
                        "id": "102",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                },
                {
                    "tag_id": "61",
                    "role_id": "102",
                    "get": "1",
                    "destroy": "1",
                    "post": "1",
                    "Tags": {
                        "id": "61",
                        "name": "5ebf6d19b6f1c",
                        "company_id": "1",
                        "object_table_name": "Customers",
                        "active_status": "1"
                    },
                    "Company_Roles": {
                        "id": "102",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                },
                {
                    "tag_id": "68",
                    "role_id": "102",
                    "get": "1",
                    "destroy": "1",
                    "post": "1",
                    "Tags": {
                        "id": "68",
                        "name": "Staff",
                        "company_id": "1",
                        "object_table_name": "Tags",
                        "active_status": "1"
                    },
                    "Company_Roles": {
                        "id": "102",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                },
                {
                    "tag_id": "69",
                    "role_id": "102",
                    "get": "1",
                    "destroy": "1",
                    "post": "1",
                    "Tags": {
                        "id": "69",
                        "name": "5ebf721e444c4",
                        "company_id": "1",
                        "object_table_name": "Customers",
                        "active_status": "1"
                    },
                    "Company_Roles": {
                        "id": "102",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                },
                {
                    "tag_id": "73",
                    "role_id": "102",
                    "get": "1",
                    "destroy": "1",
                    "post": "1",
                    "Tags": {
                        "id": "73",
                        "name": "5ebf75afa1d65",
                        "company_id": "1",
                        "object_table_name": "Customers",
                        "active_status": "1"
                    },
                    "Company_Roles": {
                        "id": "102",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
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
        "id": 158,
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
you are changing the password for.  It just needs to be a user that has rights to this endpoint.
Currently there is no way for the User to change their own password if they don't have rights
to this endpoint.  So you would need to first authenticate with a user who does have rights to change
the password.  This could be accomplished by first enabling the default user, authenticating and updating
the password.  Then remember to disable the default user.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://project.dsfellowship.com/api/v1/users/new_user" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV" \
    -H "Content-Type: application/json" \
    -d '{"new_password":"2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7","company_roles":[{"id":"102","company_id":"1","role_name":"master","active_status":"1"}]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/users/new_user"
);

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
};

let body = {
    "new_password": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "company_roles": [
        {
            "id": "102",
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "User successfully updated",
    "user": {
        "id": "158",
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
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/users/new_user"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
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
    "message": "User Successfully Deleted\/Disabled",
    "user": {
        "id": "158",
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
<!-- START_2ce3aea25ec9eeb6e4f285095ff7f141 -->
<h2>{GET} company_roles/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/company_roles?include_disabled_objects=&amp;include_details=2&amp;details_offset=0&amp;details_limit=5&amp;limit=10&amp;offset=0" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/company_roles"
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
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
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
        "5ebdde4d53e93 - 9": {
            "id": "9",
            "company_id": "1",
            "role_name": "5ebdde4d53e93",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
            "Roles_Have_Routes": [
                {
                    "id": "345",
                    "route_id": "46",
                    "role_id": "9",
                    "right_id": "345",
                    "Routes": {
                        "id": "46",
                        "name": "Add_Role_To_Tag",
                        "implicit_allow": "0",
                        "module": "Global"
                    },
                    "Company_Roles": {
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "345",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "346",
                    "route_id": "50",
                    "role_id": "9",
                    "right_id": "346",
                    "Routes": {
                        "id": "50",
                        "name": "Add_Tag_To_Customer",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "346",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "347",
                    "route_id": "48",
                    "role_id": "9",
                    "right_id": "347",
                    "Routes": {
                        "id": "48",
                        "name": "Add_Tag_To_Tag",
                        "implicit_allow": "0",
                        "module": "Global"
                    },
                    "Company_Roles": {
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "347",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "348",
                    "route_id": "25",
                    "role_id": "9",
                    "right_id": "348",
                    "Routes": {
                        "id": "25",
                        "name": "Create_Credit_Status",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "348",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "349",
                    "route_id": "21",
                    "role_id": "9",
                    "right_id": "349",
                    "Routes": {
                        "id": "21",
                        "name": "Create_Customer",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "349",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                }
            ]
        },
        "5ebde1c839957 - 11": {
            "id": "11",
            "company_id": "1",
            "role_name": "5ebde1c839957",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
            "Roles_Have_Routes": [
                {
                    "id": "441",
                    "route_id": "46",
                    "role_id": "11",
                    "right_id": "441",
                    "Routes": {
                        "id": "46",
                        "name": "Add_Role_To_Tag",
                        "implicit_allow": "0",
                        "module": "Global"
                    },
                    "Company_Roles": {
                        "id": "11",
                        "company_id": "1",
                        "role_name": "5ebde1c839957",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "441",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "442",
                    "route_id": "50",
                    "role_id": "11",
                    "right_id": "442",
                    "Routes": {
                        "id": "50",
                        "name": "Add_Tag_To_Customer",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "11",
                        "company_id": "1",
                        "role_name": "5ebde1c839957",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "442",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "443",
                    "route_id": "48",
                    "role_id": "11",
                    "right_id": "443",
                    "Routes": {
                        "id": "48",
                        "name": "Add_Tag_To_Tag",
                        "implicit_allow": "0",
                        "module": "Global"
                    },
                    "Company_Roles": {
                        "id": "11",
                        "company_id": "1",
                        "role_name": "5ebde1c839957",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "443",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "444",
                    "route_id": "25",
                    "role_id": "11",
                    "right_id": "444",
                    "Routes": {
                        "id": "25",
                        "name": "Create_Credit_Status",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "11",
                        "company_id": "1",
                        "role_name": "5ebde1c839957",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "444",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "445",
                    "route_id": "21",
                    "role_id": "11",
                    "right_id": "445",
                    "Routes": {
                        "id": "21",
                        "name": "Create_Customer",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "11",
                        "company_id": "1",
                        "role_name": "5ebde1c839957",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "445",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                }
            ]
        },
        "5ebde237963a3 - 19": {
            "id": "19",
            "company_id": "1",
            "role_name": "5ebde237963a3",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
            "Roles_Have_Routes": [
                {
                    "id": "849",
                    "route_id": "46",
                    "role_id": "19",
                    "right_id": "849",
                    "Routes": {
                        "id": "46",
                        "name": "Add_Role_To_Tag",
                        "implicit_allow": "0",
                        "module": "Global"
                    },
                    "Company_Roles": {
                        "id": "19",
                        "company_id": "1",
                        "role_name": "5ebde237963a3",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "849",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "850",
                    "route_id": "50",
                    "role_id": "19",
                    "right_id": "850",
                    "Routes": {
                        "id": "50",
                        "name": "Add_Tag_To_Customer",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "19",
                        "company_id": "1",
                        "role_name": "5ebde237963a3",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "850",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "851",
                    "route_id": "48",
                    "role_id": "19",
                    "right_id": "851",
                    "Routes": {
                        "id": "48",
                        "name": "Add_Tag_To_Tag",
                        "implicit_allow": "0",
                        "module": "Global"
                    },
                    "Company_Roles": {
                        "id": "19",
                        "company_id": "1",
                        "role_name": "5ebde237963a3",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "851",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "852",
                    "route_id": "25",
                    "role_id": "19",
                    "right_id": "852",
                    "Routes": {
                        "id": "25",
                        "name": "Create_Credit_Status",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "19",
                        "company_id": "1",
                        "role_name": "5ebde237963a3",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "852",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "853",
                    "route_id": "21",
                    "role_id": "19",
                    "right_id": "853",
                    "Routes": {
                        "id": "21",
                        "name": "Create_Customer",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "19",
                        "company_id": "1",
                        "role_name": "5ebde237963a3",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "853",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                }
            ]
        },
        "5ebde2e08865e - 20": {
            "id": "20",
            "company_id": "1",
            "role_name": "5ebde2e08865e",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
            "Roles_Have_Routes": [
                {
                    "id": "897",
                    "route_id": "46",
                    "role_id": "20",
                    "right_id": "897",
                    "Routes": {
                        "id": "46",
                        "name": "Add_Role_To_Tag",
                        "implicit_allow": "0",
                        "module": "Global"
                    },
                    "Company_Roles": {
                        "id": "20",
                        "company_id": "1",
                        "role_name": "5ebde2e08865e",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "897",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "898",
                    "route_id": "50",
                    "role_id": "20",
                    "right_id": "898",
                    "Routes": {
                        "id": "50",
                        "name": "Add_Tag_To_Customer",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "20",
                        "company_id": "1",
                        "role_name": "5ebde2e08865e",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "898",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "899",
                    "route_id": "48",
                    "role_id": "20",
                    "right_id": "899",
                    "Routes": {
                        "id": "48",
                        "name": "Add_Tag_To_Tag",
                        "implicit_allow": "0",
                        "module": "Global"
                    },
                    "Company_Roles": {
                        "id": "20",
                        "company_id": "1",
                        "role_name": "5ebde2e08865e",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "899",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "900",
                    "route_id": "25",
                    "role_id": "20",
                    "right_id": "900",
                    "Routes": {
                        "id": "25",
                        "name": "Create_Credit_Status",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "20",
                        "company_id": "1",
                        "role_name": "5ebde2e08865e",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "900",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "901",
                    "route_id": "21",
                    "role_id": "20",
                    "right_id": "901",
                    "Routes": {
                        "id": "21",
                        "name": "Create_Customer",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "20",
                        "company_id": "1",
                        "role_name": "5ebde2e08865e",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "901",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                }
            ]
        },
        "5ebde39dc6986 - 29": {
            "id": "29",
            "company_id": "1",
            "role_name": "5ebde39dc6986",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
            "Roles_Have_Routes": [
                {
                    "id": "1353",
                    "route_id": "46",
                    "role_id": "29",
                    "right_id": "1353",
                    "Routes": {
                        "id": "46",
                        "name": "Add_Role_To_Tag",
                        "implicit_allow": "0",
                        "module": "Global"
                    },
                    "Company_Roles": {
                        "id": "29",
                        "company_id": "1",
                        "role_name": "5ebde39dc6986",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1353",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "1354",
                    "route_id": "50",
                    "role_id": "29",
                    "right_id": "1354",
                    "Routes": {
                        "id": "50",
                        "name": "Add_Tag_To_Customer",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "29",
                        "company_id": "1",
                        "role_name": "5ebde39dc6986",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1354",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "1355",
                    "route_id": "48",
                    "role_id": "29",
                    "right_id": "1355",
                    "Routes": {
                        "id": "48",
                        "name": "Add_Tag_To_Tag",
                        "implicit_allow": "0",
                        "module": "Global"
                    },
                    "Company_Roles": {
                        "id": "29",
                        "company_id": "1",
                        "role_name": "5ebde39dc6986",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1355",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "1356",
                    "route_id": "25",
                    "role_id": "29",
                    "right_id": "1356",
                    "Routes": {
                        "id": "25",
                        "name": "Create_Credit_Status",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "29",
                        "company_id": "1",
                        "role_name": "5ebde39dc6986",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1356",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "1357",
                    "route_id": "21",
                    "role_id": "29",
                    "right_id": "1357",
                    "Routes": {
                        "id": "21",
                        "name": "Create_Customer",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "29",
                        "company_id": "1",
                        "role_name": "5ebde39dc6986",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1357",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                }
            ]
        },
        "5ebde73ba8508 - 37": {
            "id": "37",
            "company_id": "1",
            "role_name": "5ebde73ba8508",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
            "Roles_Have_Routes": [
                {
                    "id": "1753",
                    "route_id": "46",
                    "role_id": "37",
                    "right_id": "1753",
                    "Routes": {
                        "id": "46",
                        "name": "Add_Role_To_Tag",
                        "implicit_allow": "0",
                        "module": "Global"
                    },
                    "Company_Roles": {
                        "id": "37",
                        "company_id": "1",
                        "role_name": "5ebde73ba8508",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1753",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "1754",
                    "route_id": "50",
                    "role_id": "37",
                    "right_id": "1754",
                    "Routes": {
                        "id": "50",
                        "name": "Add_Tag_To_Customer",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "37",
                        "company_id": "1",
                        "role_name": "5ebde73ba8508",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1754",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "1755",
                    "route_id": "48",
                    "role_id": "37",
                    "right_id": "1755",
                    "Routes": {
                        "id": "48",
                        "name": "Add_Tag_To_Tag",
                        "implicit_allow": "0",
                        "module": "Global"
                    },
                    "Company_Roles": {
                        "id": "37",
                        "company_id": "1",
                        "role_name": "5ebde73ba8508",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1755",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "1756",
                    "route_id": "25",
                    "role_id": "37",
                    "right_id": "1756",
                    "Routes": {
                        "id": "25",
                        "name": "Create_Credit_Status",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "37",
                        "company_id": "1",
                        "role_name": "5ebde73ba8508",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1756",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "1757",
                    "route_id": "21",
                    "role_id": "37",
                    "right_id": "1757",
                    "Routes": {
                        "id": "21",
                        "name": "Create_Customer",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "37",
                        "company_id": "1",
                        "role_name": "5ebde73ba8508",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "1757",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                }
            ]
        },
        "5ebde7f698d0c - 46": {
            "id": "46",
            "company_id": "1",
            "role_name": "5ebde7f698d0c",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
            "Roles_Have_Routes": [
                {
                    "id": "2201",
                    "route_id": "46",
                    "role_id": "46",
                    "right_id": "2201",
                    "Routes": {
                        "id": "46",
                        "name": "Add_Role_To_Tag",
                        "implicit_allow": "0",
                        "module": "Global"
                    },
                    "Company_Roles": {
                        "id": "46",
                        "company_id": "1",
                        "role_name": "5ebde7f698d0c",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "2201",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "2202",
                    "route_id": "50",
                    "role_id": "46",
                    "right_id": "2202",
                    "Routes": {
                        "id": "50",
                        "name": "Add_Tag_To_Customer",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "46",
                        "company_id": "1",
                        "role_name": "5ebde7f698d0c",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "2202",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "2203",
                    "route_id": "48",
                    "role_id": "46",
                    "right_id": "2203",
                    "Routes": {
                        "id": "48",
                        "name": "Add_Tag_To_Tag",
                        "implicit_allow": "0",
                        "module": "Global"
                    },
                    "Company_Roles": {
                        "id": "46",
                        "company_id": "1",
                        "role_name": "5ebde7f698d0c",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "2203",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "2204",
                    "route_id": "25",
                    "role_id": "46",
                    "right_id": "2204",
                    "Routes": {
                        "id": "25",
                        "name": "Create_Credit_Status",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "46",
                        "company_id": "1",
                        "role_name": "5ebde7f698d0c",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "2204",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "2205",
                    "route_id": "21",
                    "role_id": "46",
                    "right_id": "2205",
                    "Routes": {
                        "id": "21",
                        "name": "Create_Customer",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "46",
                        "company_id": "1",
                        "role_name": "5ebde7f698d0c",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "2205",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                }
            ]
        },
        "5ebde838c9ac7 - 47": {
            "id": "47",
            "company_id": "1",
            "role_name": "5ebde838c9ac7",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
            "Roles_Have_Routes": [
                {
                    "id": "2249",
                    "route_id": "46",
                    "role_id": "47",
                    "right_id": "2249",
                    "Routes": {
                        "id": "46",
                        "name": "Add_Role_To_Tag",
                        "implicit_allow": "0",
                        "module": "Global"
                    },
                    "Company_Roles": {
                        "id": "47",
                        "company_id": "1",
                        "role_name": "5ebde838c9ac7",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "2249",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "2250",
                    "route_id": "50",
                    "role_id": "47",
                    "right_id": "2250",
                    "Routes": {
                        "id": "50",
                        "name": "Add_Tag_To_Customer",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "47",
                        "company_id": "1",
                        "role_name": "5ebde838c9ac7",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "2250",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "2251",
                    "route_id": "48",
                    "role_id": "47",
                    "right_id": "2251",
                    "Routes": {
                        "id": "48",
                        "name": "Add_Tag_To_Tag",
                        "implicit_allow": "0",
                        "module": "Global"
                    },
                    "Company_Roles": {
                        "id": "47",
                        "company_id": "1",
                        "role_name": "5ebde838c9ac7",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "2251",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "2252",
                    "route_id": "25",
                    "role_id": "47",
                    "right_id": "2252",
                    "Routes": {
                        "id": "25",
                        "name": "Create_Credit_Status",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "47",
                        "company_id": "1",
                        "role_name": "5ebde838c9ac7",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "2252",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "2253",
                    "route_id": "21",
                    "role_id": "47",
                    "right_id": "2253",
                    "Routes": {
                        "id": "21",
                        "name": "Create_Customer",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "47",
                        "company_id": "1",
                        "role_name": "5ebde838c9ac7",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "2253",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                }
            ]
        },
        "5ebdea3937422 - 56": {
            "id": "56",
            "company_id": "1",
            "role_name": "5ebdea3937422",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
            "Roles_Have_Routes": [
                {
                    "id": "2705",
                    "route_id": "46",
                    "role_id": "56",
                    "right_id": "2705",
                    "Routes": {
                        "id": "46",
                        "name": "Add_Role_To_Tag",
                        "implicit_allow": "0",
                        "module": "Global"
                    },
                    "Company_Roles": {
                        "id": "56",
                        "company_id": "1",
                        "role_name": "5ebdea3937422",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "2705",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "2706",
                    "route_id": "50",
                    "role_id": "56",
                    "right_id": "2706",
                    "Routes": {
                        "id": "50",
                        "name": "Add_Tag_To_Customer",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "56",
                        "company_id": "1",
                        "role_name": "5ebdea3937422",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "2706",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "2707",
                    "route_id": "48",
                    "role_id": "56",
                    "right_id": "2707",
                    "Routes": {
                        "id": "48",
                        "name": "Add_Tag_To_Tag",
                        "implicit_allow": "0",
                        "module": "Global"
                    },
                    "Company_Roles": {
                        "id": "56",
                        "company_id": "1",
                        "role_name": "5ebdea3937422",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "2707",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "2708",
                    "route_id": "25",
                    "role_id": "56",
                    "right_id": "2708",
                    "Routes": {
                        "id": "25",
                        "name": "Create_Credit_Status",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "56",
                        "company_id": "1",
                        "role_name": "5ebdea3937422",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "2708",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "2709",
                    "route_id": "21",
                    "role_id": "56",
                    "right_id": "2709",
                    "Routes": {
                        "id": "21",
                        "name": "Create_Customer",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "56",
                        "company_id": "1",
                        "role_name": "5ebdea3937422",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "2709",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                }
            ]
        },
        "5ebdeb354dd46 - 57": {
            "id": "57",
            "company_id": "1",
            "role_name": "5ebdeb354dd46",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
            "Roles_Have_Routes": [
                {
                    "id": "2753",
                    "route_id": "46",
                    "role_id": "57",
                    "right_id": "2753",
                    "Routes": {
                        "id": "46",
                        "name": "Add_Role_To_Tag",
                        "implicit_allow": "0",
                        "module": "Global"
                    },
                    "Company_Roles": {
                        "id": "57",
                        "company_id": "1",
                        "role_name": "5ebdeb354dd46",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "2753",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "2754",
                    "route_id": "50",
                    "role_id": "57",
                    "right_id": "2754",
                    "Routes": {
                        "id": "50",
                        "name": "Add_Tag_To_Customer",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "57",
                        "company_id": "1",
                        "role_name": "5ebdeb354dd46",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "2754",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "2755",
                    "route_id": "48",
                    "role_id": "57",
                    "right_id": "2755",
                    "Routes": {
                        "id": "48",
                        "name": "Add_Tag_To_Tag",
                        "implicit_allow": "0",
                        "module": "Global"
                    },
                    "Company_Roles": {
                        "id": "57",
                        "company_id": "1",
                        "role_name": "5ebdeb354dd46",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "2755",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "2756",
                    "route_id": "25",
                    "role_id": "57",
                    "right_id": "2756",
                    "Routes": {
                        "id": "25",
                        "name": "Create_Credit_Status",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "57",
                        "company_id": "1",
                        "role_name": "5ebdeb354dd46",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "2756",
                        "get": "0",
                        "destroy": "0",
                        "post": "0",
                        "patch": "0",
                        "put": "0"
                    }
                },
                {
                    "id": "2757",
                    "route_id": "21",
                    "role_id": "57",
                    "right_id": "2757",
                    "Routes": {
                        "id": "21",
                        "name": "Create_Customer",
                        "implicit_allow": "0",
                        "module": "CDM"
                    },
                    "Company_Roles": {
                        "id": "57",
                        "company_id": "1",
                        "role_name": "5ebdeb354dd46",
                        "active_status": "1"
                    },
                    "Rights": {
                        "id": "2757",
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
<p><code>GET api/v1/company_roles</code></p>
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
<!-- END_2ce3aea25ec9eeb6e4f285095ff7f141 -->
<!-- START_8b1cd3229109d7604afa03e922e6852c -->
<h2>{POST} company_roles/v1/api</h2>
<p>So a company role is just a company and a name
However, in order to create a company you need to provide
an array of routes and the associated rights you would like
with that route.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://project.dsfellowship.com/api/v1/company_roles" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV" \
    -H "Content-Type: application/json" \
    -d '{"Roles_Have_Routes":[{"route_id":"3","Rights":{"get":true,"post":false,"patch":false,"put":false,"destroy":false}},{"route_id":"6","Rights":{"get":false,"post":true,"patch":false,"put":false,"destroy":false}}],"role_name":"5ebf8aa2083e1"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/company_roles"
);

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
};

let body = {
    "Roles_Have_Routes": [
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
    "role_name": "5ebf8aa2083e1"
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
        "id": "180",
        "company_id": "1",
        "role_name": "5ebf8aa2083e1",
        "active_status": "1"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/v1/company_roles</code></p>
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
<td><code>Roles_Have_Routes.*.module</code></td>
<td>string</td>
<td>optional</td>
<td>if route_id is missing then the module name will be used to create rights with multiple roles.</td>
</tr>
<tr>
<td><code>Roles_Have_Routes.*.route_id</code></td>
<td>string</td>
<td>optional</td>
<td>if route_id is missing then the module name will be used to create rights with multiple roles.</td>
</tr>
<tr>
<td><code>Roles_Have_Routes.*.get</code></td>
<td>boolean</td>
<td>optional</td>
<td>true allows method false denys method</td>
</tr>
<tr>
<td><code>Roles_Have_Routes.*.post</code></td>
<td>boolean</td>
<td>optional</td>
<td>true allows method false denys method</td>
</tr>
<tr>
<td><code>Roles_Have_Routes.*.put</code></td>
<td>boolean</td>
<td>optional</td>
<td>true allows method false denys method</td>
</tr>
<tr>
<td><code>Roles_Have_Routes.*.patch</code></td>
<td>boolean</td>
<td>optional</td>
<td>true allows method false denys method</td>
</tr>
<tr>
<td><code>Roles_Have_Routes.*.delete</code></td>
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
<td><code>Roles_Have_Routes</code></td>
<td>array</td>
<td>required</td>
<td>{array[array]} Needs to contain a key value pair for each route_id you are linking too, plus a Rights key with an array of get,post,destroy,patch,put keys and their corresponding boolean values you want.</td>
</tr>
</tbody>
</table>
<!-- END_8b1cd3229109d7604afa03e922e6852c -->
<!-- START_a905afb85b5d8c75078ccd8f099f3b9f -->
<h2>{PUT} company_roles/v1/api</h2>
<p>This will recreate the role with the provided modal
Anything previous will be deleted so make sure this
is the complete modal you are expecting</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://project.dsfellowship.com/api/v1/company_roles/180" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV" \
    -H "Content-Type: application/json" \
    -d '{"Roles_Have_Routes":[{"route_id":"3","Rights":{"get":true,"post":false,"patch":false,"put":false,"destroy":false}},{"route_id":"6","Rights":{"get":false,"post":true,"patch":false,"put":false,"destroy":false}}],"role_name":"5ebf8aa43bee9"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/company_roles/180"
);

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
};

let body = {
    "Roles_Have_Routes": [
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
    "role_name": "5ebf8aa43bee9"
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
        "id": "180",
        "company_id": "1",
        "role_name": "5ebf8aa43bee9",
        "active_status": "1"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/v1/company_roles/{company_role}</code></p>
<p><code>PATCH api/v1/company_roles/{company_role}</code></p>
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
<td><code>company_role</code></td>
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
<td><code>Roles_Have_Routes.*.module</code></td>
<td>string</td>
<td>optional</td>
<td>if route_id is missing then the module name will be used to create rights with multiple roles. Example Company</td>
</tr>
<tr>
<td><code>Roles_Have_Routes.*.route_id</code></td>
<td>integer</td>
<td>optional</td>
<td>if route_id is missing then the module name will be used to create rights with multiple roles.</td>
</tr>
<tr>
<td><code>Roles_Have_Routes.*.get</code></td>
<td>boolean</td>
<td>optional</td>
<td>true allows method false denys method</td>
</tr>
<tr>
<td><code>Roles_Have_Routes.*.post</code></td>
<td>boolean</td>
<td>optional</td>
<td>true allows method false denys method</td>
</tr>
<tr>
<td><code>Roles_Have_Routes.*.put</code></td>
<td>boolean</td>
<td>optional</td>
<td>true allows method false denys method</td>
</tr>
<tr>
<td><code>Roles_Have_Routes.*.patch</code></td>
<td>boolean</td>
<td>optional</td>
<td>true allows method false denys method</td>
</tr>
<tr>
<td><code>Roles_Have_Routes.*.delete</code></td>
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
<td><code>Roles_Have_Routes</code></td>
<td>array</td>
<td>required</td>
<td>{array[array]} Needs to contain a key value pair for each route_id you are linking too, plus a Rights key with an array of get,post,destroy,patch,put keys and their corresponding boolean values you want.</td>
</tr>
</tbody>
</table>
<!-- END_a905afb85b5d8c75078ccd8f099f3b9f -->
<!-- START_7ef7dfc8d6fcd636f1eb4acc4977d357 -->
<h2>{DELETE} company_roles/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/company_roles/180?active_status=" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/company_roles/180"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
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
<p><code>DELETE api/v1/company_roles/{company_role}</code></p>
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
<td><code>company_role</code></td>
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
<!-- END_7ef7dfc8d6fcd636f1eb4acc4977d357 -->
<!-- START_3325a7e1462036041b5bb9084e516f11 -->
<h2>{GET} companies/v1/api</h2>
<p>List all companies</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/companies?include_disabled=true&amp;include_details=2&amp;details_offset=0&amp;details_limit=5&amp;offset=0&amp;limit=10&amp;include_disabled_objects=" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "secret-token: dZqcDrlSKNv+tS5Zn?iOmSg3uXrew?R5Pn=OaX?9jJ$DK$N0"</code></pre>
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
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "secret-token": "dZqcDrlSKNv+tS5Zn?iOmSg3uXrew?R5Pn=OaX?9jJ$DK$N0",
    "Content-Type": "application/json",
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
                    "id": "9",
                    "company_id": "1",
                    "role_name": "5ebdde4d53e93",
                    "active_status": "1",
                    "Companies": {
                        "id": "1",
                        "company_name": "System",
                        "active_status": "1"
                    },
                    "Roles_Have_Routes": [
                        {
                            "id": "345",
                            "route_id": "46",
                            "role_id": "9",
                            "right_id": "345"
                        }
                    ]
                },
                {
                    "id": "11",
                    "company_id": "1",
                    "role_name": "5ebde1c839957",
                    "active_status": "1",
                    "Companies": {
                        "id": "1",
                        "company_name": "System",
                        "active_status": "1"
                    },
                    "Roles_Have_Routes": [
                        {
                            "id": "441",
                            "route_id": "46",
                            "role_id": "11",
                            "right_id": "441"
                        }
                    ]
                },
                {
                    "id": "19",
                    "company_id": "1",
                    "role_name": "5ebde237963a3",
                    "active_status": "1",
                    "Companies": {
                        "id": "1",
                        "company_name": "System",
                        "active_status": "1"
                    },
                    "Roles_Have_Routes": [
                        {
                            "id": "849",
                            "route_id": "46",
                            "role_id": "19",
                            "right_id": "849"
                        }
                    ]
                },
                {
                    "id": "20",
                    "company_id": "1",
                    "role_name": "5ebde2e08865e",
                    "active_status": "1",
                    "Companies": {
                        "id": "1",
                        "company_name": "System",
                        "active_status": "1"
                    },
                    "Roles_Have_Routes": [
                        {
                            "id": "897",
                            "route_id": "46",
                            "role_id": "20",
                            "right_id": "897"
                        }
                    ]
                },
                {
                    "id": "29",
                    "company_id": "1",
                    "role_name": "5ebde39dc6986",
                    "active_status": "1",
                    "Companies": {
                        "id": "1",
                        "company_name": "System",
                        "active_status": "1"
                    },
                    "Roles_Have_Routes": [
                        {
                            "id": "1353",
                            "route_id": "46",
                            "role_id": "29",
                            "right_id": "1353"
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
                    "id": "7",
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
<!-- START_7be8cb2d15a57d2062ece90d5b8f8269 -->
<h2>{POST} company/v1/api</h2>
<p>This framework doesn't allow a company to do anything unless there is an authorized user making the request.
So as part of creating a company this will auto create a master role that has access to all methods on all routes
It will also create a user with the username default (recommend disabling after establishing a real person with master credentials)
Make sure to record the default password upon success, this password is unrecoverable and the company would need to be deleted and recreated</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://project.dsfellowship.com/api/v1/companies" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "secret-token: dZqcDrlSKNv+tS5Zn?iOmSg3uXrew?R5Pn=OaX?9jJ$DK$N0" \
    -H "Content-Type: application/json" \
    -d '{"company_name":"documentation_company"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/companies"
);

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "secret-token": "dZqcDrlSKNv+tS5Zn?iOmSg3uXrew?R5Pn=OaX?9jJ$DK$N0",
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Company successfully created",
    "master_password": "=wCqHCrQJRSGby",
    "company": {
        "id": 168,
        "company_name": "documentation_company",
        "active_status": 1
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/v1/companies</code></p>
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
<!-- END_7be8cb2d15a57d2062ece90d5b8f8269 -->
<!-- START_02c1ebf9f4df1c10bbf4748053f03c8e -->
<h2>{DELETE} {company}/companies/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/companies/168?active_status=" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "secret-token: dZqcDrlSKNv+tS5Zn?iOmSg3uXrew?R5Pn=OaX?9jJ$DK$N0"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/companies/168"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "secret-token": "dZqcDrlSKNv+tS5Zn?iOmSg3uXrew?R5Pn=OaX?9jJ$DK$N0",
    "Content-Type": "application/json",
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
    "message": "Company Deleted"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/v1/companies/{company}</code></p>
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
<!-- END_02c1ebf9f4df1c10bbf4748053f03c8e -->
<h1>Tools</h1>
<!-- START_cd4a874127cd23508641c63b640ee838 -->
<h2>doc.json</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/doc.json" \
    -H "Accept: application/json" \
    -H "secret-token: dZqcDrlSKNv+tS5Zn?iOmSg3uXrew?R5Pn=OaX?9jJ$DK$N0"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/doc.json"
);

let headers = {
    "Accept": "application/json",
    "secret-token": "dZqcDrlSKNv+tS5Zn?iOmSg3uXrew?R5Pn=OaX?9jJ$DK$N0",
    "Content-Type": "application/json",
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
        "name": "All Postman Endpoints",
        "_postman_id": "73f6638d-41f2-46cf-9181-8ba38fd91d96",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "secret-token",
                                "value": "dZqcDrlSKNv+tS5Zn?iOmSg3uXrew?R5Pn=OaX?9jJ$DK$N0"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"user\": \"default\",\n    \"password\": \"2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7\"\n}"
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                                    "value": "67",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"customer_name\": \"Bob The Builder\",\n    \"credit_status\": 67,\n    \"ccb\": \"\",\n    \"website\": \"www.amazingbiceps.com\"\n}"
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                                    "value": "67",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"customer_name\": \"Bob and Son The Builders\",\n    \"credit_status\": 67,\n    \"ccb\": \"\",\n    \"website\": \"www.amazingbiceps.com\"\n}"
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                                    "value": "67",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                                    "value": "67",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                                    "value": "67",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                                    "value": "67",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                    "name": "{GET} addtags\/customers\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/customers\/addtags",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                    "name": "{POST} addtags\/customers\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/customers\/addtags",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"tag_name\": \"5ebf8a583f1fb\"\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "{GET} addedtags\/{customer}\/customers\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/customers\/:customer\/addtags",
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
                                    "value": "67",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                    "name": "{POST} addtags\/{customer}\/customers\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/customers\/:customer\/addtags",
                            "query": [],
                            "variable": [
                                {
                                    "id": "customer",
                                    "key": "customer",
                                    "value": "67",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"addtag\": 119\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "{DELETE} {addtag}\/addtags\/{customer}\/customers\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/customers\/:customer\/addtags\/:addtag",
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
                                    "value": "67",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"addtag\": 119\n}"
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
                            ],
                            "variable": [
                                {
                                    "id": "customer",
                                    "key": "customer",
                                    "value": "67",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                                    "value": "67",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                                    "value": "67",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                                    "value": "67",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"user\": \"new_user\",\n    \"password\": \"2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7\",\n    \"company_roles\": [\n        {\n            \"id\": \"102\",\n            \"company_id\": \"1\",\n            \"role_name\": \"master\",\n            \"active_status\": \"1\",\n            \"Companies\": {\n                \"id\": \"1\",\n                \"company_name\": \"System\",\n                \"active_status\": \"1\",\n                \"Company_Configs\": [\n                    {\n                        \"id\": \"2\",\n                        \"company_id\": \"1\",\n                        \"config_id\": \"1\",\n                        \"config_value\": \"UTC\",\n                        \"active_status\": \"1\"\n                    }\n                ],\n                \"Company_Roles\": [\n                    {\n                        \"id\": \"9\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"5ebdde4d53e93\",\n                        \"active_status\": \"1\"\n                    }\n                ],\n                \"Credit_Statuses\": [\n                    {\n                        \"id\": \"2\",\n                        \"credit_status_name\": \"Good 80\",\n                        \"company_id\": \"1\",\n                        \"active_status\": \"1\"\n                    }\n                ]\n            },\n            \"Users_Have_Roles\": [\n                {\n                    \"id\": \"135\",\n                    \"user_id\": \"1\",\n                    \"role_id\": \"102\",\n                    \"Company_Roles\": {\n                        \"id\": \"102\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    }\n                }\n            ],\n            \"Roles_Have_Routes\": [\n                {\n                    \"id\": \"5057\",\n                    \"route_id\": \"46\",\n                    \"role_id\": \"102\",\n                    \"right_id\": \"5057\",\n                    \"Routes\": {\n                        \"id\": \"46\",\n                        \"name\": \"Add_Role_To_Tag\",\n                        \"implicit_allow\": \"0\",\n                        \"module\": \"Global\"\n                    },\n                    \"Company_Roles\": {\n                        \"id\": \"102\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    },\n                    \"Rights\": {\n                        \"id\": \"5057\",\n                        \"get\": \"1\",\n                        \"destroy\": \"1\",\n                        \"post\": \"1\",\n                        \"patch\": \"1\",\n                        \"put\": \"1\"\n                    }\n                },\n                {\n                    \"id\": \"5058\",\n                    \"route_id\": \"50\",\n                    \"role_id\": \"102\",\n                    \"right_id\": \"5058\",\n                    \"Routes\": {\n                        \"id\": \"50\",\n                        \"name\": \"Add_Tag_To_Customer\",\n                        \"implicit_allow\": \"0\",\n                        \"module\": \"CDM\"\n                    },\n                    \"Company_Roles\": {\n                        \"id\": \"102\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    },\n                    \"Rights\": {\n                        \"id\": \"5058\",\n                        \"get\": \"1\",\n                        \"destroy\": \"1\",\n                        \"post\": \"1\",\n                        \"patch\": \"1\",\n                        \"put\": \"1\"\n                    }\n                },\n                {\n                    \"id\": \"5059\",\n                    \"route_id\": \"48\",\n                    \"role_id\": \"102\",\n                    \"right_id\": \"5059\",\n                    \"Routes\": {\n                        \"id\": \"48\",\n                        \"name\": \"Add_Tag_To_Tag\",\n                        \"implicit_allow\": \"0\",\n                        \"module\": \"Global\"\n                    },\n                    \"Company_Roles\": {\n                        \"id\": \"102\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    },\n                    \"Rights\": {\n                        \"id\": \"5059\",\n                        \"get\": \"1\",\n                        \"destroy\": \"1\",\n                        \"post\": \"1\",\n                        \"patch\": \"1\",\n                        \"put\": \"1\"\n                    }\n                },\n                {\n                    \"id\": \"5060\",\n                    \"route_id\": \"25\",\n                    \"role_id\": \"102\",\n                    \"right_id\": \"5060\",\n                    \"Routes\": {\n                        \"id\": \"25\",\n                        \"name\": \"Create_Credit_Status\",\n                        \"implicit_allow\": \"0\",\n                        \"module\": \"CDM\"\n                    },\n                    \"Company_Roles\": {\n                        \"id\": \"102\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    },\n                    \"Rights\": {\n                        \"id\": \"5060\",\n                        \"get\": \"1\",\n                        \"destroy\": \"1\",\n                        \"post\": \"1\",\n                        \"patch\": \"1\",\n                        \"put\": \"1\"\n                    }\n                },\n                {\n                    \"id\": \"5061\",\n                    \"route_id\": \"21\",\n                    \"role_id\": \"102\",\n                    \"right_id\": \"5061\",\n                    \"Routes\": {\n                        \"id\": \"21\",\n                        \"name\": \"Create_Customer\",\n                        \"implicit_allow\": \"0\",\n                        \"module\": \"CDM\"\n                    },\n                    \"Company_Roles\": {\n                        \"id\": \"102\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    },\n                    \"Rights\": {\n                        \"id\": \"5061\",\n                        \"get\": \"1\",\n                        \"destroy\": \"1\",\n                        \"post\": \"1\",\n                        \"patch\": \"1\",\n                        \"put\": \"1\"\n                    }\n                }\n            ],\n            \"Tags_Have_Roles\": [\n                {\n                    \"tag_id\": \"56\",\n                    \"role_id\": \"102\",\n                    \"get\": \"0\",\n                    \"destroy\": \"1\",\n                    \"post\": \"1\",\n                    \"Tags\": {\n                        \"id\": \"56\",\n                        \"name\": \"Staff\",\n                        \"company_id\": \"1\",\n                        \"object_table_name\": \"Tags\",\n                        \"active_status\": \"1\"\n                    },\n                    \"Company_Roles\": {\n                        \"id\": \"102\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    }\n                },\n                {\n                    \"tag_id\": \"61\",\n                    \"role_id\": \"102\",\n                    \"get\": \"1\",\n                    \"destroy\": \"1\",\n                    \"post\": \"1\",\n                    \"Tags\": {\n                        \"id\": \"61\",\n                        \"name\": \"5ebf6d19b6f1c\",\n                        \"company_id\": \"1\",\n                        \"object_table_name\": \"Customers\",\n                        \"active_status\": \"1\"\n                    },\n                    \"Company_Roles\": {\n                        \"id\": \"102\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    }\n                },\n                {\n                    \"tag_id\": \"68\",\n                    \"role_id\": \"102\",\n                    \"get\": \"1\",\n                    \"destroy\": \"1\",\n                    \"post\": \"1\",\n                    \"Tags\": {\n                        \"id\": \"68\",\n                        \"name\": \"Staff\",\n                        \"company_id\": \"1\",\n                        \"object_table_name\": \"Tags\",\n                        \"active_status\": \"1\"\n                    },\n                    \"Company_Roles\": {\n                        \"id\": \"102\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    }\n                },\n                {\n                    \"tag_id\": \"69\",\n                    \"role_id\": \"102\",\n                    \"get\": \"1\",\n                    \"destroy\": \"1\",\n                    \"post\": \"1\",\n                    \"Tags\": {\n                        \"id\": \"69\",\n                        \"name\": \"5ebf721e444c4\",\n                        \"company_id\": \"1\",\n                        \"object_table_name\": \"Customers\",\n                        \"active_status\": \"1\"\n                    },\n                    \"Company_Roles\": {\n                        \"id\": \"102\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    }\n                },\n                {\n                    \"tag_id\": \"73\",\n                    \"role_id\": \"102\",\n                    \"get\": \"1\",\n                    \"destroy\": \"1\",\n                    \"post\": \"1\",\n                    \"Tags\": {\n                        \"id\": \"73\",\n                        \"name\": \"5ebf75afa1d65\",\n                        \"company_id\": \"1\",\n                        \"object_table_name\": \"Customers\",\n                        \"active_status\": \"1\"\n                    },\n                    \"Company_Roles\": {\n                        \"id\": \"102\",\n                        \"company_id\": \"1\",\n                        \"role_name\": \"master\",\n                        \"active_status\": \"1\"\n                    }\n                }\n            ]\n        }\n    ]\n}"
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"new_password\": \"2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7\",\n    \"company_roles\": [\n        {\n            \"id\": \"102\",\n            \"company_id\": \"1\",\n            \"role_name\": \"master\",\n            \"active_status\": \"1\"\n        }\n    ]\n}"
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                    "name": "{GET} company_roles\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/company_roles",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                    "name": "{POST} company_roles\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/company_roles",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"Roles_Have_Routes\": [\n        {\n            \"route_id\": \"3\",\n            \"Rights\": {\n                \"get\": true,\n                \"post\": false,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        },\n        {\n            \"route_id\": \"6\",\n            \"Rights\": {\n                \"get\": false,\n                \"post\": true,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        }\n    ],\n    \"role_name\": \"5ebf8a53d5f9b\"\n}"
                        },
                        "description": "So a company role is just a company and a name\nHowever, in order to create a company you need to provide\nan array of routes and the associated rights you would like\nwith that route.",
                        "response": []
                    }
                },
                {
                    "name": "{PUT} company_roles\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/company_roles\/:company_role",
                            "query": [],
                            "variable": [
                                {
                                    "id": "company_role",
                                    "key": "company_role",
                                    "value": "178",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"Roles_Have_Routes\": [\n        {\n            \"route_id\": \"3\",\n            \"Rights\": {\n                \"get\": true,\n                \"post\": false,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        },\n        {\n            \"route_id\": \"6\",\n            \"Rights\": {\n                \"get\": false,\n                \"post\": true,\n                \"patch\": false,\n                \"put\": false,\n                \"destroy\": false\n            }\n        }\n    ],\n    \"role_name\": \"5ebf8a5605c2d\"\n}"
                        },
                        "description": "This will recreate the role with the provided modal\nAnything previous will be deleted so make sure this\nis the complete modal you are expecting",
                        "response": []
                    }
                },
                {
                    "name": "{DELETE} company_roles\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/company_roles\/:company_role",
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
                                    "id": "company_role",
                                    "key": "company_role",
                                    "value": "178",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "secret-token",
                                "value": "dZqcDrlSKNv+tS5Zn?iOmSg3uXrew?R5Pn=OaX?9jJ$DK$N0"
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "secret-token",
                                "value": "dZqcDrlSKNv+tS5Zn?iOmSg3uXrew?R5Pn=OaX?9jJ$DK$N0"
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
                                    "value": "167",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "secret-token",
                                "value": "dZqcDrlSKNv+tS5Zn?iOmSg3uXrew?R5Pn=OaX?9jJ$DK$N0"
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
                                "value": "dZqcDrlSKNv+tS5Zn?iOmSg3uXrew?R5Pn=OaX?9jJ$DK$N0"
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "secret-token",
                                "value": "dZqcDrlSKNv+tS5Zn?iOmSg3uXrew?R5Pn=OaX?9jJ$DK$N0"
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "secret-token",
                                "value": "dZqcDrlSKNv+tS5Zn?iOmSg3uXrew?R5Pn=OaX?9jJ$DK$N0"
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
                                    "value": "67",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                    "name": "{DELETE} {people}\/peoples\/v1\/api",
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
                                    "value": "67",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                                    "value": "67",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                                    "value": "67",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                    "name": "{GET} addtags\/tags\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/tags\/addtags",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                    "name": "{POST} addtags\/tags\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/tags\/addtags",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"tag_name\": \"Staff\"\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "{GET} roles\/{tag}\/tags\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/tags\/:tag\/roles",
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
                                    "id": "tag",
                                    "key": "tag",
                                    "value": "118",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                    "name": "{POST} roles\/{tag}\/tags\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/tags\/:tag\/roles",
                            "query": [],
                            "variable": [
                                {
                                    "id": "tag",
                                    "key": "tag",
                                    "value": "118",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"role\": 102,\n    \"get\": false,\n    \"post\": true,\n    \"destroy\": true\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "{GET} addtags\/{tag}\/tags\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/tags\/:tag\/addtags",
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
                                    "id": "tag",
                                    "key": "tag",
                                    "value": "119",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                    "name": "{POST} addtags\/{tag}\/tags\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/tags\/:tag\/addtags",
                            "query": [],
                            "variable": [
                                {
                                    "id": "tag",
                                    "key": "tag",
                                    "value": "119",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"addtag\": 118\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "{DELETE} {addtag}\/addtags\/{tag}\/tags\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/tags\/:tag\/addtags\/:addtag",
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
                                    "value": "119",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"addtag\": 118\n}"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "{DELETE} {role}\/roles\/{tag}\/tags\/v1\/api",
                    "request": {
                        "url": {
                            "protocol": "https",
                            "host": "project.dsfellowship.com",
                            "path": "api\/v1\/tags\/:tag\/roles\/:role",
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
                                    "value": "118",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"role\": 102,\n    \"get\": false,\n    \"post\": true,\n    \"destroy\": true\n}"
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
                                    "value": "118",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "{\n    \"tag_name\": \"5ebf8a58ea642\"\n}"
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
                                    "value": "118",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                                    "value": "34",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
                                    "value": "34",
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
                                "value": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7"
                            },
                            {
                                "key": "User-Access-Token",
                                "value": "jLxhueJCjXVSgflWGGVx+rml?vz81uU.ZTDCPtKFcEbqe"
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
    -G "https://project.dsfellowship.com/api/v1/routes" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "secret-token: dZqcDrlSKNv+tS5Zn?iOmSg3uXrew?R5Pn=OaX?9jJ$DK$N0"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/routes"
);

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "secret-token": "dZqcDrlSKNv+tS5Zn?iOmSg3uXrew?R5Pn=OaX?9jJ$DK$N0",
    "Content-Type": "application/json",
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
                "Add_Role_To_Tag - 46": 46,
                "Add_Tag_To_Customer - 50": 50,
                "Add_Tag_To_Tag - 48": 48,
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
                "Create_Tag_Tag - 56": 56,
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
                "List_Roles_On_Tag - 47": 47,
                "List_Routes - 8": 8,
                "List_Tags_On_Customer - 51": 51,
                "List_Tags_On_Tag - 49": 49,
                "List_Tag_Tags - 55": 55,
                "List_Users - 2": 2,
                "Remove_Role_From_Tag - 54": 54,
                "Remove_Tag_From_Customer - 52": 52,
                "Remove_Tag_From_Tag - 53": 53,
                "twilio_token_rotate - 41": 41,
                "Update_Address - 34": 34,
                "Update_Credit_Status - 26": 26,
                "Update_Customer - 22": 22,
                "Update_Equipment - 30": 30
            }
        },
        "exception": null
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/v1/routes</code></p>
<!-- END_392f39a571495220f725e466d873f08b -->
<!-- START_5801090f750b2ce9f663ab6aa53090e0 -->
<h2>{PUT} default_user/{company}/v1/api</h2>
<p>This endpoint is exclusively to re-enable the default user specified
it should be used when for some reason ALL users in a company are locked out
or at least one person doesn&#039;t have all rights.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://project.dsfellowship.com/api/v1/1/defaultuser/1" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "secret-token: dZqcDrlSKNv+tS5Zn?iOmSg3uXrew?R5Pn=OaX?9jJ$DK$N0"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/1/defaultuser/1"
);

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "secret-token": "dZqcDrlSKNv+tS5Zn?iOmSg3uXrew?R5Pn=OaX?9jJ$DK$N0",
    "Content-Type": "application/json",
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
<p><code>PUT api/v1/{company}/defaultuser/{defaultuser}</code></p>
<p><code>PATCH api/v1/{company}/defaultuser/{defaultuser}</code></p>
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
<!-- END_5801090f750b2ce9f663ab6aa53090e0 -->
<h1>Universal Objects</h1>
<!-- START_88fd2695ee6fa84ecd268c1eb91a3831 -->
<h2>{PUT} {people}/peoples/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://project.dsfellowship.com/api/v1/peoples/68" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV" \
    -H "Content-Type: application/json" \
    -d '{"first_name":"Bobby","last_name":"Grillman","title":"The Founder","description":"Amazing Biceps","email":"Bob@amazingbiceps.com"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/peoples/68"
);

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "People Updated",
    "People": {
        "id": "68",
        "first_name": "Bobby",
        "last_name": "Grillman",
        "title": "The Founder",
        "email": "Bob@amazingbiceps.com",
        "description": "Amazing Biceps",
        "active_status": "1",
        "company_id": "1"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/v1/peoples/{people}</code></p>
<p><code>PATCH api/v1/peoples/{people}</code></p>
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
<td><code>people</code></td>
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
<td><code>first_name</code></td>
<td>string</td>
<td>optional</td>
<td>{string}</td>
</tr>
<tr>
<td><code>last_name</code></td>
<td>string</td>
<td>optional</td>
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
<!-- END_88fd2695ee6fa84ecd268c1eb91a3831 -->
<!-- START_0f38ec150d94fe83a004d5c5384a61b7 -->
<h2>{DELETE} {people}/peoples/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/peoples/68?active_status=" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/peoples/68"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
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
    "message": "People Deleted"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/v1/peoples/{people}</code></p>
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
<td><code>people</code></td>
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
<!-- END_0f38ec150d94fe83a004d5c5384a61b7 -->
<!-- START_4b5e5f5e131df696d52d14d4875fe7d6 -->
<h2>{PUT} {address}/addresses/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://project.dsfellowship.com/api/v1/addresses/68" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV" \
    -H "Content-Type: application/json" \
    -d '{"description":"Physical","city":"Sand Iago","state":"OR","street1":"1234 NW Front St","street2":"Suite 203","zip":"97123","lat":"123.000001254","lng":"-312.45675","url":"","google_id":""}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/addresses/68"
);

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Address Updated",
    "Address": {
        "id": "68",
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/v1/addresses/{address}</code></p>
<p><code>PATCH api/v1/addresses/{address}</code></p>
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
<td><code>address</code></td>
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
<td><code>description</code></td>
<td>string</td>
<td>optional</td>
<td>{string}</td>
</tr>
<tr>
<td><code>city</code></td>
<td>string</td>
<td>optional</td>
<td>{string}</td>
</tr>
<tr>
<td><code>state</code></td>
<td>string</td>
<td>optional</td>
<td>{string}</td>
</tr>
<tr>
<td><code>street1</code></td>
<td>string</td>
<td>optional</td>
<td>{string}</td>
</tr>
<tr>
<td><code>street2</code></td>
<td>string</td>
<td>optional</td>
<td>{string}</td>
</tr>
<tr>
<td><code>zip</code></td>
<td>string</td>
<td>optional</td>
<td>{string}</td>
</tr>
<tr>
<td><code>lat</code></td>
<td>string</td>
<td>optional</td>
<td>{string} Latitude Coordinate</td>
</tr>
<tr>
<td><code>lng</code></td>
<td>string</td>
<td>optional</td>
<td>{string} Longitude Coordinate</td>
</tr>
<tr>
<td><code>url</code></td>
<td>string</td>
<td>optional</td>
<td>{string} a url you would like to link to this address.</td>
</tr>
<tr>
<td><code>google_id</code></td>
<td>string</td>
<td>optional</td>
<td>{string} if present supply the google location id for extra google features</td>
</tr>
</tbody>
</table>
<!-- END_4b5e5f5e131df696d52d14d4875fe7d6 -->
<!-- START_6be3601e0e26cb2c00bffdad74949b0e -->
<h2>{DELETE} {address}/addresses/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/addresses/68?active_status=" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/addresses/68"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
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
    "message": "Address Deleted"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/v1/addresses/{address}</code></p>
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
<td><code>address</code></td>
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
<!-- END_6be3601e0e26cb2c00bffdad74949b0e -->
<!-- START_93ba76c197fcd047956439e485c4294d -->
<h2>{GET} addtags/tags/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/tags/addtags?include_disabled_objects=&amp;include_details=2&amp;details_offset=0&amp;details_limit=5&amp;limit=10&amp;offset=0" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/tags/addtags"
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
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
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
    "Tag": {
        "Allow_Duplicate_Tagging - 1": {
            "id": "1",
            "name": "Allow_Duplicate_Tagging",
            "company_id": null,
            "object_table_name": "Tags",
            "active_status": "1"
        },
        "Staff - 56": {
            "id": "56",
            "name": "Staff",
            "company_id": "1",
            "object_table_name": "Tags",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
            "Tags_Have_Roles": [
                {
                    "tag_id": "56",
                    "role_id": "102",
                    "get": "0",
                    "destroy": "1",
                    "post": "1",
                    "Tags": {
                        "id": "56",
                        "name": "Staff",
                        "company_id": "1",
                        "object_table_name": "Tags",
                        "active_status": "1"
                    },
                    "Company_Roles": {
                        "id": "102",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                }
            ]
        },
        "Staff - 60": {
            "id": "60",
            "name": "Staff",
            "company_id": "1",
            "object_table_name": "Tags",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
        "Staff - 68": {
            "id": "68",
            "name": "Staff",
            "company_id": "1",
            "object_table_name": "Tags",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
            "Tags_Have_Roles": [
                {
                    "tag_id": "68",
                    "role_id": "102",
                    "get": "1",
                    "destroy": "1",
                    "post": "1",
                    "Tags": {
                        "id": "68",
                        "name": "Staff",
                        "company_id": "1",
                        "object_table_name": "Tags",
                        "active_status": "1"
                    },
                    "Company_Roles": {
                        "id": "102",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                }
            ]
        },
        "Staff - 72": {
            "id": "72",
            "name": "Staff",
            "company_id": "1",
            "object_table_name": "Tags",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
        "Staff - 74": {
            "id": "74",
            "name": "Staff",
            "company_id": "1",
            "object_table_name": "Tags",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
        "Staff - 78": {
            "id": "78",
            "name": "Staff",
            "company_id": "1",
            "object_table_name": "Tags",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
            "Tags_Have_Roles": [
                {
                    "tag_id": "78",
                    "role_id": "102",
                    "get": "0",
                    "destroy": "1",
                    "post": "1",
                    "Tags": {
                        "id": "78",
                        "name": "Staff",
                        "company_id": "1",
                        "object_table_name": "Tags",
                        "active_status": "1"
                    },
                    "Company_Roles": {
                        "id": "102",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                }
            ]
        },
        "Staff - 80": {
            "id": "80",
            "name": "Staff",
            "company_id": "1",
            "object_table_name": "Tags",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
            "Tags_Have_Roles": [
                {
                    "tag_id": "80",
                    "role_id": "102",
                    "get": "0",
                    "destroy": "1",
                    "post": "1",
                    "Tags": {
                        "id": "80",
                        "name": "Staff",
                        "company_id": "1",
                        "object_table_name": "Tags",
                        "active_status": "1"
                    },
                    "Company_Roles": {
                        "id": "102",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                }
            ]
        },
        "Staff - 90": {
            "id": "90",
            "name": "Staff",
            "company_id": "1",
            "object_table_name": "Tags",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
            "Tags_Have_Roles": [
                {
                    "tag_id": "90",
                    "role_id": "102",
                    "get": "0",
                    "destroy": "1",
                    "post": "1",
                    "Tags": {
                        "id": "90",
                        "name": "Staff",
                        "company_id": "1",
                        "object_table_name": "Tags",
                        "active_status": "1"
                    },
                    "Company_Roles": {
                        "id": "102",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                }
            ]
        },
        "Staff - 92": {
            "id": "92",
            "name": "Staff",
            "company_id": "1",
            "object_table_name": "Tags",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
            "Tags_Have_Roles": [
                {
                    "tag_id": "92",
                    "role_id": "102",
                    "get": "0",
                    "destroy": "1",
                    "post": "1",
                    "Tags": {
                        "id": "92",
                        "name": "Staff",
                        "company_id": "1",
                        "object_table_name": "Tags",
                        "active_status": "1"
                    },
                    "Company_Roles": {
                        "id": "102",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                }
            ]
        }
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/v1/tags/addtags</code></p>
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
<!-- END_93ba76c197fcd047956439e485c4294d -->
<!-- START_04ed91a4bb961c4db46a890d3181d2b3 -->
<h2>{POST} addtags/tags/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://project.dsfellowship.com/api/v1/tags/addtags" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV" \
    -H "Content-Type: application/json" \
    -d '{"tag_name":"Staff"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/tags/addtags"
);

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
};

let body = {
    "tag_name": "Staff"
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
    "message": "Tag Tag Created",
    "Tag_Tag": {
        "id": 120,
        "name": "Staff",
        "company_id": 1,
        "object_table_name": "Tags",
        "active_status": 1
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/v1/tags/addtags</code></p>
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
<td><code>tag_name</code></td>
<td>string</td>
<td>required</td>
<td>{string}</td>
</tr>
</tbody>
</table>
<!-- END_04ed91a4bb961c4db46a890d3181d2b3 -->
<!-- START_c3cc82d329974e51069a7f97b4e48872 -->
<h2>{GET} roles/{tag}/tags/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/tags/120/roles?include_disabled_objects=&amp;include_details=2&amp;details_offset=0&amp;details_limit=5&amp;limit=10&amp;offset=0" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/tags/120/roles"
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
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
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
    "Tag": {
        "Staff - 120": {
            "id": "120",
            "name": "Staff",
            "company_id": "1",
            "object_table_name": "Tags",
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
                        "id": "9",
                        "company_id": "1",
                        "role_name": "5ebdde4d53e93",
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
            "Tags_Have_Roles": [
                {
                    "tag_id": "120",
                    "role_id": "102",
                    "get": "1",
                    "destroy": "1",
                    "post": "1",
                    "Tags": {
                        "id": "120",
                        "name": "Staff",
                        "company_id": "1",
                        "object_table_name": "Tags",
                        "active_status": "1"
                    },
                    "Company_Roles": {
                        "id": "102",
                        "company_id": "1",
                        "role_name": "master",
                        "active_status": "1"
                    }
                }
            ]
        }
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/v1/tags/{tag}/roles</code></p>
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
<td><code>tag</code></td>
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
<!-- END_c3cc82d329974e51069a7f97b4e48872 -->
<!-- START_766f9fdd8bfcb7fc89e739ac4fb0f32f -->
<h2>{POST} roles/{tag}/tags/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://project.dsfellowship.com/api/v1/tags/120/roles" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV" \
    -H "Content-Type: application/json" \
    -d '{"role":102,"get":false,"post":true,"destroy":true}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/tags/120/roles"
);

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
};

let body = {
    "role": 102,
    "get": false,
    "post": true,
    "destroy": true
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
    "message": "Role added to Tag",
    "Tags_Have_Role": {
        "tag_id": "120",
        "role_id": "102",
        "get": "1",
        "destroy": "1",
        "post": "1"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/v1/tags/{tag}/roles</code></p>
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
<td><code>tag</code></td>
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
<td><code>role</code></td>
<td>int</td>
<td>required</td>
<td>{int}</td>
</tr>
<tr>
<td><code>get</code></td>
<td>bool</td>
<td>optional</td>
<td>{bool}</td>
</tr>
<tr>
<td><code>post</code></td>
<td>bool</td>
<td>optional</td>
<td>{bool}</td>
</tr>
<tr>
<td><code>destroy</code></td>
<td>bool</td>
<td>optional</td>
<td>{bool}</td>
</tr>
</tbody>
</table>
<!-- END_766f9fdd8bfcb7fc89e739ac4fb0f32f -->
<!-- START_8d2a86273bb4d838f46ad0571ede504a -->
<h2>{GET} addtags/{tag}/tags/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://project.dsfellowship.com/api/v1/tags/121/addtags?include_disabled_objects=&amp;include_details=2&amp;details_offset=0&amp;details_limit=5&amp;limit=10&amp;offset=0" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/tags/121/addtags"
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
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
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
    "Tag": []
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/v1/tags/{tag}/addtags</code></p>
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
<td><code>tag</code></td>
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
<!-- END_8d2a86273bb4d838f46ad0571ede504a -->
<!-- START_e3850bd820997753dda72980a67e3564 -->
<h2>{POST} addtags/{tag}/tags/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://project.dsfellowship.com/api/v1/tags/121/addtags" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV" \
    -H "Content-Type: application/json" \
    -d '{"addtag":120}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/tags/121/addtags"
);

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
};

let body = {
    "addtag": 120
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
    "message": "Tag Added To Tag",
    "Tag": {
        "id": "121",
        "name": "5ebf8aa6d0bef",
        "company_id": "1",
        "object_table_name": "Customers",
        "active_status": "1"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/v1/tags/{tag}/addtags</code></p>
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
<td><code>tag</code></td>
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
<td><code>addtag</code></td>
<td>int</td>
<td>required</td>
<td>{int}</td>
</tr>
</tbody>
</table>
<!-- END_e3850bd820997753dda72980a67e3564 -->
<!-- START_c17148e08d32207746fc0024ea0634d8 -->
<h2>{DELETE} {addtag}/addtags/{tag}/tags/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/tags/121/addtags/1?active_status=" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV" \
    -H "Content-Type: application/json" \
    -d '{"addtag":120}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/tags/121/addtags/1"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
};

let body = {
    "addtag": 120
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Tag Removed From Tag",
    "Tag": {
        "id": "121",
        "name": "5ebf8aa6d0bef",
        "company_id": "1",
        "object_table_name": "Customers",
        "active_status": "1"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/v1/tags/{tag}/addtags/{addtag}</code></p>
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
<td><code>tag</code></td>
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
<td><code>addtag</code></td>
<td>int</td>
<td>required</td>
<td>{int}</td>
</tr>
</tbody>
</table>
<!-- END_c17148e08d32207746fc0024ea0634d8 -->
<!-- START_aaa5e36553cce24effd9aaf60f05be34 -->
<h2>{DELETE} {role}/roles/{tag}/tags/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/tags/120/roles/1?active_status=" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV" \
    -H "Content-Type: application/json" \
    -d '{"role":102,"get":false,"post":true,"destroy":true}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/tags/120/roles/1"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
};

let body = {
    "role": 102,
    "get": false,
    "post": true,
    "destroy": true
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Role Removed From Tag"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/v1/tags/{tag}/roles/{role}</code></p>
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
<td><code>tag</code></td>
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
<td><code>role</code></td>
<td>int</td>
<td>required</td>
<td>{int}</td>
</tr>
<tr>
<td><code>get</code></td>
<td>bool</td>
<td>optional</td>
<td>{bool}</td>
</tr>
<tr>
<td><code>post</code></td>
<td>bool</td>
<td>optional</td>
<td>{bool}</td>
</tr>
<tr>
<td><code>destroy</code></td>
<td>bool</td>
<td>optional</td>
<td>{bool}</td>
</tr>
</tbody>
</table>
<!-- END_aaa5e36553cce24effd9aaf60f05be34 -->
<!-- START_bc9cb4c2371521e7e1379696effcfa43 -->
<h2>{PUT} {tag}/tags/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://project.dsfellowship.com/api/v1/tags/120" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV" \
    -H "Content-Type: application/json" \
    -d '{"tag_name":"5ebf8aa78c293"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/tags/120"
);

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
};

let body = {
    "tag_name": "5ebf8aa78c293"
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
    "message": "Tag Updated",
    "Tag": {
        "id": "120",
        "name": "5ebf8aa78c293",
        "company_id": "1",
        "object_table_name": "Tags",
        "active_status": "1"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/v1/tags/{tag}</code></p>
<p><code>PATCH api/v1/tags/{tag}</code></p>
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
<td><code>tag</code></td>
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
<td><code>tag_name</code></td>
<td>string</td>
<td>required</td>
<td>{string}</td>
</tr>
</tbody>
</table>
<!-- END_bc9cb4c2371521e7e1379696effcfa43 -->
<!-- START_a5d0790b7aa15c5f66eac1ae30c9a136 -->
<h2>{DELETE} {tag}/tags/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/tags/120?active_status=" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/tags/120"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
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
    "message": "Tag Deleted"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/v1/tags/{tag}</code></p>
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
<td><code>tag</code></td>
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
<!-- END_a5d0790b7aa15c5f66eac1ae30c9a136 -->
<!-- START_18dce138f62ceade24d48d10e034bdf8 -->
<h2>{PUT} {phonenumber}/phonenumbers/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://project.dsfellowship.com/api/v1/phonenumbers/35" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV" \
    -H "Content-Type: application/json" \
    -d '{"description":"cell","area_code":"503","prefix":"828","suffix":"7180","ext":"1234","country_code":"1"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/phonenumbers/35"
);

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (201):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Phone Number Updated",
    "Phone Number": {
        "id": "35",
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/v1/phonenumbers/{phonenumber}</code></p>
<p><code>PATCH api/v1/phonenumbers/{phonenumber}</code></p>
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
<td><code>phonenumber</code></td>
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
<td><code>description</code></td>
<td>string</td>
<td>optional</td>
<td>{string}</td>
</tr>
<tr>
<td><code>area_code</code></td>
<td>int</td>
<td>optional</td>
<td>{int}</td>
</tr>
<tr>
<td><code>prefix</code></td>
<td>int</td>
<td>optional</td>
<td>{int}</td>
</tr>
<tr>
<td><code>suffix</code></td>
<td>int</td>
<td>optional</td>
<td>{int}</td>
</tr>
<tr>
<td><code>ext</code></td>
<td>int</td>
<td>optional</td>
<td>{int}</td>
</tr>
<tr>
<td><code>country_code</code></td>
<td>int</td>
<td>optional</td>
<td>{int}</td>
</tr>
</tbody>
</table>
<!-- END_18dce138f62ceade24d48d10e034bdf8 -->
<!-- START_f6d874671d4ebba08364ec4dca2ff7af -->
<h2>{DELETE} {phonenumber}/phonenumbers/v1/api</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://project.dsfellowship.com/api/v1/phonenumbers/35?active_status=" \
    -H "Accept: application/json" \
    -H "client-id: 2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7" \
    -H "User-Access-Token: taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://project.dsfellowship.com/api/v1/phonenumbers/35"
);

let params = {
    "active_status": "",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "client-id": "2spsZ5sv80r98g=VEI7XmmEwq6xMJNm7",
    "User-Access-Token": "taYC7bvL0xoEJlkLFM8m?3N5cNoXZvlL?tbJMEJgq+NsV",
    "Content-Type": "application/json",
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
    "message": "Phone Number Deleted"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/v1/phonenumbers/{phonenumber}</code></p>
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
<td><code>phonenumber</code></td>
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
<!-- END_f6d874671d4ebba08364ec4dca2ff7af -->
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