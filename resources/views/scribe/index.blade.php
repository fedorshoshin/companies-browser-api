<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.5.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.5.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-houses">
                                <a href="#endpoints-GETapi-houses">GET api/houses</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-organizations" class="tocify-header">
                <li class="tocify-item level-1" data-unique="organizations">
                    <a href="#organizations">Organizations</a>
                </li>
                                    <ul id="tocify-subheader-organizations" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="organizations-GETapi-organizations">
                                <a href="#organizations-GETapi-organizations">List all organizations

Returns a list of all organizations with their houses, phones, and occupations.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="organizations-GETapi-organizations-search-by-occupation-name">
                                <a href="#organizations-GETapi-organizations-search-by-occupation-name">Search organizations by occupation name

Returns organizations linked to an occupation name and its children.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="organizations-GETapi-organizations-search-by-name">
                                <a href="#organizations-GETapi-organizations-search-by-name">Search organizations by name</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="organizations-GETapi-organizations-by-location">
                                <a href="#organizations-GETapi-organizations-by-location">Search organizations by geographic location

Returns organizations within a given radius from a point.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="organizations-GETapi-organizations--id-">
                                <a href="#organizations-GETapi-organizations--id-">Get organization by ID</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="organizations-GETapi-organizations-by-house--id-">
                                <a href="#organizations-GETapi-organizations-by-house--id-">List organizations in a specific house</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="organizations-GETapi-organizations-by-occupation--occupation-">
                                <a href="#organizations-GETapi-organizations-by-occupation--occupation-">Search organizations by occupation ID

Returns all organizations linked to a specific occupation.</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: October 26, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-houses">GET api/houses</h2>

<p>
</p>



<span id="example-requests-GETapi-houses">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/houses" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/houses"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-houses">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;address&quot;: &quot;4579 Connelly Crest Suite 009&quot;,
        &quot;latitude&quot;: &quot;62.85&quot;,
        &quot;longitude&quot;: &quot;28.61&quot;,
        &quot;created_at&quot;: &quot;2025-10-26T15:12:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-10-26T15:12:11.000000Z&quot;
    },
    {
        &quot;id&quot;: 2,
        &quot;address&quot;: &quot;9616 Nelson Crest Suite 795&quot;,
        &quot;latitude&quot;: &quot;17.34&quot;,
        &quot;longitude&quot;: &quot;-102.78&quot;,
        &quot;created_at&quot;: &quot;2025-10-26T15:12:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-10-26T15:12:11.000000Z&quot;
    },
    {
        &quot;id&quot;: 3,
        &quot;address&quot;: &quot;337 Jermey Avenue Apt. 961&quot;,
        &quot;latitude&quot;: &quot;-86.18&quot;,
        &quot;longitude&quot;: &quot;59.15&quot;,
        &quot;created_at&quot;: &quot;2025-10-26T15:12:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-10-26T15:12:11.000000Z&quot;
    },
    {
        &quot;id&quot;: 4,
        &quot;address&quot;: &quot;2100 Mueller Dam Apt. 284&quot;,
        &quot;latitude&quot;: &quot;-29.07&quot;,
        &quot;longitude&quot;: &quot;104.33&quot;,
        &quot;created_at&quot;: &quot;2025-10-26T15:12:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-10-26T15:12:11.000000Z&quot;
    },
    {
        &quot;id&quot;: 5,
        &quot;address&quot;: &quot;207 Cole Locks Suite 818&quot;,
        &quot;latitude&quot;: &quot;-86.32&quot;,
        &quot;longitude&quot;: &quot;174.08&quot;,
        &quot;created_at&quot;: &quot;2025-10-26T15:12:11.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-10-26T15:12:11.000000Z&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-houses" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-houses"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-houses"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-houses" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-houses">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-houses" data-method="GET"
      data-path="api/houses"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-houses', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-houses"
                    onclick="tryItOut('GETapi-houses');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-houses"
                    onclick="cancelTryOut('GETapi-houses');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-houses"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/houses</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-houses"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-houses"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="organizations">Organizations</h1>

    

                                <h2 id="organizations-GETapi-organizations">List all organizations

Returns a list of all organizations with their houses, phones, and occupations.</h2>

<p>
</p>



<span id="example-requests-GETapi-organizations">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/organizations" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/organizations"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-organizations">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Parker Inc&quot;,
        &quot;house_id&quot;: 3,
        &quot;phones&quot;: [
            {
                &quot;number&quot;: &quot;123-456&quot;
            },
            {
                &quot;number&quot;: &quot;789-012&quot;
            }
        ],
        &quot;occupations&quot;: [
            {
                &quot;name&quot;: &quot;Food&quot;
            },
            {
                &quot;name&quot;: &quot;Beverages&quot;
            }
        ],
        &quot;house&quot;: {
            &quot;id&quot;: 3,
            &quot;address&quot;: &quot;123 Main St&quot;,
            &quot;latitude&quot;: 40.12,
            &quot;longitude&quot;: 44.56
        }
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-organizations" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-organizations"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-organizations"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-organizations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-organizations">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-organizations" data-method="GET"
      data-path="api/organizations"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-organizations', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-organizations"
                    onclick="tryItOut('GETapi-organizations');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-organizations"
                    onclick="cancelTryOut('GETapi-organizations');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-organizations"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/organizations</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-organizations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-organizations"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="organizations-GETapi-organizations-search-by-occupation-name">Search organizations by occupation name

Returns organizations linked to an occupation name and its children.</h2>

<p>
</p>



<span id="example-requests-GETapi-organizations-search-by-occupation-name">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/organizations/search/by-occupation-name?q=architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"q\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/organizations/search/by-occupation-name"
);

const params = {
    "q": "architecto",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "q": "architecto"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-organizations-search-by-occupation-name">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Parker Inc&quot;,
        &quot;house_id&quot;: 3,
        &quot;phones&quot;: [
            {
                &quot;number&quot;: &quot;123-456&quot;
            }
        ],
        &quot;occupations&quot;: [
            {
                &quot;name&quot;: &quot;Food&quot;
            },
            {
                &quot;name&quot;: &quot;Dairy&quot;
            }
        ],
        &quot;house&quot;: {
            &quot;id&quot;: 3,
            &quot;address&quot;: &quot;123 Main St&quot;,
            &quot;latitude&quot;: 40.12,
            &quot;longitude&quot;: 44.56
        }
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-organizations-search-by-occupation-name" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-organizations-search-by-occupation-name"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-organizations-search-by-occupation-name"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-organizations-search-by-occupation-name" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-organizations-search-by-occupation-name">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-organizations-search-by-occupation-name" data-method="GET"
      data-path="api/organizations/search/by-occupation-name"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-organizations-search-by-occupation-name', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-organizations-search-by-occupation-name"
                    onclick="tryItOut('GETapi-organizations-search-by-occupation-name');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-organizations-search-by-occupation-name"
                    onclick="cancelTryOut('GETapi-organizations-search-by-occupation-name');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-organizations-search-by-occupation-name"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/organizations/search/by-occupation-name</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-organizations-search-by-occupation-name"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-organizations-search-by-occupation-name"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>q</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="q"                data-endpoint="GETapi-organizations-search-by-occupation-name"
               value="architecto"
               data-component="query">
    <br>
<p>The occupation name to search Example: <code>architecto</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>q</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="q"                data-endpoint="GETapi-organizations-search-by-occupation-name"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="organizations-GETapi-organizations-search-by-name">Search organizations by name</h2>

<p>
</p>



<span id="example-requests-GETapi-organizations-search-by-name">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/organizations/search/by-name?q=architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"q\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/organizations/search/by-name"
);

const params = {
    "q": "architecto",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "q": "architecto"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-organizations-search-by-name">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Parker Inc&quot;,
        &quot;house_id&quot;: 3,
        &quot;phones&quot;: [
            {
                &quot;number&quot;: &quot;123-456&quot;
            }
        ],
        &quot;occupations&quot;: [
            {
                &quot;name&quot;: &quot;Food&quot;
            }
        ],
        &quot;house&quot;: {
            &quot;id&quot;: 3,
            &quot;address&quot;: &quot;123 Main St&quot;,
            &quot;latitude&quot;: 40.12,
            &quot;longitude&quot;: 44.56
        }
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-organizations-search-by-name" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-organizations-search-by-name"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-organizations-search-by-name"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-organizations-search-by-name" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-organizations-search-by-name">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-organizations-search-by-name" data-method="GET"
      data-path="api/organizations/search/by-name"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-organizations-search-by-name', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-organizations-search-by-name"
                    onclick="tryItOut('GETapi-organizations-search-by-name');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-organizations-search-by-name"
                    onclick="cancelTryOut('GETapi-organizations-search-by-name');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-organizations-search-by-name"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/organizations/search/by-name</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-organizations-search-by-name"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-organizations-search-by-name"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>q</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="q"                data-endpoint="GETapi-organizations-search-by-name"
               value="architecto"
               data-component="query">
    <br>
<p>The search term for organization name Example: <code>architecto</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>q</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="q"                data-endpoint="GETapi-organizations-search-by-name"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="organizations-GETapi-organizations-by-location">Search organizations by geographic location

Returns organizations within a given radius from a point.</h2>

<p>
</p>



<span id="example-requests-GETapi-organizations-by-location">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/organizations/by-location?lat=4326.41688&amp;lng=4326.41688&amp;radius=4326.41688" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"lat\": 4326.41688,
    \"lng\": 4326.41688,
    \"radius\": 4326.41688
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/organizations/by-location"
);

const params = {
    "lat": "4326.41688",
    "lng": "4326.41688",
    "radius": "4326.41688",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "lat": 4326.41688,
    "lng": 4326.41688,
    "radius": 4326.41688
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-organizations-by-location">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Parker Inc&quot;,
        &quot;house_id&quot;: 3,
        &quot;distance&quot;: 2.34,
        &quot;phones&quot;: [
            {
                &quot;number&quot;: &quot;123-456&quot;
            }
        ],
        &quot;occupations&quot;: [
            {
                &quot;name&quot;: &quot;Food&quot;
            }
        ],
        &quot;house&quot;: {
            &quot;id&quot;: 3,
            &quot;address&quot;: &quot;123 Main St&quot;,
            &quot;latitude&quot;: 40.12,
            &quot;longitude&quot;: 44.56
        }
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-organizations-by-location" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-organizations-by-location"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-organizations-by-location"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-organizations-by-location" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-organizations-by-location">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-organizations-by-location" data-method="GET"
      data-path="api/organizations/by-location"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-organizations-by-location', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-organizations-by-location"
                    onclick="tryItOut('GETapi-organizations-by-location');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-organizations-by-location"
                    onclick="cancelTryOut('GETapi-organizations-by-location');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-organizations-by-location"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/organizations/by-location</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-organizations-by-location"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-organizations-by-location"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>lat</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="lat"                data-endpoint="GETapi-organizations-by-location"
               value="4326.41688"
               data-component="query">
    <br>
<p>Latitude of center point Example: <code>4326.41688</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>lng</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="lng"                data-endpoint="GETapi-organizations-by-location"
               value="4326.41688"
               data-component="query">
    <br>
<p>Longitude of center point Example: <code>4326.41688</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>radius</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="radius"                data-endpoint="GETapi-organizations-by-location"
               value="4326.41688"
               data-component="query">
    <br>
<p>Radius in kilometers Example: <code>4326.41688</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>lat</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="lat"                data-endpoint="GETapi-organizations-by-location"
               value="4326.41688"
               data-component="body">
    <br>
<p>Example: <code>4326.41688</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>lng</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="lng"                data-endpoint="GETapi-organizations-by-location"
               value="4326.41688"
               data-component="body">
    <br>
<p>Example: <code>4326.41688</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>radius</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="radius"                data-endpoint="GETapi-organizations-by-location"
               value="4326.41688"
               data-component="body">
    <br>
<p>Example: <code>4326.41688</code></p>
        </div>
        </form>

                    <h2 id="organizations-GETapi-organizations--id-">Get organization by ID</h2>

<p>
</p>



<span id="example-requests-GETapi-organizations--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/organizations/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/organizations/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-organizations--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 1,
    &quot;name&quot;: &quot;Parker Inc&quot;,
    &quot;house_id&quot;: 3,
    &quot;phones&quot;: [
        {
            &quot;number&quot;: &quot;123-456&quot;
        }
    ],
    &quot;occupations&quot;: [
        {
            &quot;name&quot;: &quot;Food&quot;
        }
    ],
    &quot;house&quot;: {
        &quot;id&quot;: 3,
        &quot;address&quot;: &quot;123 Main St&quot;,
        &quot;latitude&quot;: 40.12,
        &quot;longitude&quot;: 44.56
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-organizations--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-organizations--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-organizations--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-organizations--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-organizations--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-organizations--id-" data-method="GET"
      data-path="api/organizations/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-organizations--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-organizations--id-"
                    onclick="tryItOut('GETapi-organizations--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-organizations--id-"
                    onclick="cancelTryOut('GETapi-organizations--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-organizations--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/organizations/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-organizations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-organizations--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-organizations--id-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the organization Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="organizations-GETapi-organizations-by-house--id-">List organizations in a specific house</h2>

<p>
</p>



<span id="example-requests-GETapi-organizations-by-house--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/organizations/by-house/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/organizations/by-house/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-organizations-by-house--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 2,
        &quot;name&quot;: &quot;Green Foods&quot;,
        &quot;house_id&quot;: 3,
        &quot;phones&quot;: [
            {
                &quot;number&quot;: &quot;555-123&quot;
            }
        ],
        &quot;occupations&quot;: [
            {
                &quot;name&quot;: &quot;Food&quot;
            }
        ],
        &quot;house&quot;: {
            &quot;id&quot;: 3,
            &quot;address&quot;: &quot;123 Main St&quot;,
            &quot;latitude&quot;: 40.12,
            &quot;longitude&quot;: 44.56
        }
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-organizations-by-house--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-organizations-by-house--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-organizations-by-house--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-organizations-by-house--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-organizations-by-house--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-organizations-by-house--id-" data-method="GET"
      data-path="api/organizations/by-house/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-organizations-by-house--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-organizations-by-house--id-"
                    onclick="tryItOut('GETapi-organizations-by-house--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-organizations-by-house--id-"
                    onclick="cancelTryOut('GETapi-organizations-by-house--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-organizations-by-house--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/organizations/by-house/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-organizations-by-house--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-organizations-by-house--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-organizations-by-house--id-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the house Example: <code>16</code></p>
            </div>
                    </form>

                    <h2 id="organizations-GETapi-organizations-by-occupation--occupation-">Search organizations by occupation ID

Returns all organizations linked to a specific occupation.</h2>

<p>
</p>



<span id="example-requests-GETapi-organizations-by-occupation--occupation-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/organizations/by-occupation/16" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/organizations/by-occupation/16"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-organizations-by-occupation--occupation-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Parker Inc&quot;,
        &quot;house_id&quot;: 3,
        &quot;phones&quot;: [
            {
                &quot;number&quot;: &quot;123-456&quot;
            }
        ],
        &quot;occupations&quot;: [
            {
                &quot;name&quot;: &quot;Food&quot;
            },
            {
                &quot;name&quot;: &quot;Dairy&quot;
            }
        ],
        &quot;house&quot;: {
            &quot;id&quot;: 3,
            &quot;address&quot;: &quot;123 Main St&quot;,
            &quot;latitude&quot;: 40.12,
            &quot;longitude&quot;: 44.56
        }
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-organizations-by-occupation--occupation-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-organizations-by-occupation--occupation-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-organizations-by-occupation--occupation-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-organizations-by-occupation--occupation-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-organizations-by-occupation--occupation-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-organizations-by-occupation--occupation-" data-method="GET"
      data-path="api/organizations/by-occupation/{occupation}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-organizations-by-occupation--occupation-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-organizations-by-occupation--occupation-"
                    onclick="tryItOut('GETapi-organizations-by-occupation--occupation-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-organizations-by-occupation--occupation-"
                    onclick="cancelTryOut('GETapi-organizations-by-occupation--occupation-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-organizations-by-occupation--occupation-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/organizations/by-occupation/{occupation}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-organizations-by-occupation--occupation-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-organizations-by-occupation--occupation-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>occupation</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="occupation"                data-endpoint="GETapi-organizations-by-occupation--occupation-"
               value="16"
               data-component="url">
    <br>
<p>The ID of the occupation Example: <code>16</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
