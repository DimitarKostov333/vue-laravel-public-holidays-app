## Prerequisites
<ul>
    <li>This project uses the Composition API in Vue 3 to speed up development.</li>
    <li>No virtual domains were setup, this application runs purely on the virtual servers that Laravel and Vue setup.</li>
</ul>

## Installation
<ul>
    <li>Fork this project.</li>
    <li>Inside the root laravel installation run <code>composer install</code></li>
    <li>Inside the <code>/frontend/</code> folder run <code>npm install</code></li>
    <li>Run the Laravel server with <code>php artisan serve</code> which should run on http://127.0.0.1:8000, the frontend application presumes this is the base uri for the api.</li>
    <li>Inside the <code>/frontend/</code> folder run <code>npm run dev</code> to start the frontend application</li>
    <li>The application should start with the 2022 public holidays showing by default.</li>
</ul>




