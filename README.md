## Prerequisites
<ul>
    <li>The project is created in Laravel 9 with PHP 8 to handle api requests</li>
    <li>The Composition API in Vue 3 is used to speed up development and improve code readability.</li>
    <li>No components were created since this is such a small project.</li>
    <li>No virtual domains were setup, this application runs purely on the virtual servers that Laravel and Vue setup.</li>
</ul>

## Installation
<ul>
    <li>Fork this project.</li>
    <li>Rename the <code>.env.example</code> file to just <code>.env</code>.</li>
    <li>You might need to run <code>php artisan key:generate</code></li>
    <li>Inside the root laravel installation run <code>composer install</code></li>
    <li>Inside the <code>/frontend/</code> folder run <code>npm install</code></li>
    <li>Run the Laravel server with <code>php artisan serve</code> (inside the root Laravel folder) which should run on http://127.0.0.1:8000, the frontend application presumes this is the base uri for the api.</li>
    <li>CD into the <code>/frontend/</code> folder and run <code>npm run dev</code> to start the frontend application. If you run this outside of the frontend folder you will just see the Vite startup window and not the application.</li>
    <li>The application should start with the 2022 public holidays showing by default.</li>
</ul>




