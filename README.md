# Todo List Management 

## Simple example package to add todo list feature to your existing Laravel application.

### Prerequisites:

* Bootstrap
* jQuery
* FontAwesome


Add ``` @include('todolist::js') ``` right after you call jQuery in script tags.
#### Example: ####

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>

<div class="container">
    <p>Welcome to my website...</p>
</div>

<script src="//code.jquery.com/jquery.js"></script>
@include('todolist::js')
<script src="app.js"></script>

</body>
</html>
```
Run ``` php artisan vendor:publish --provider='Thekavish\Todolist\TodolistServiceProvider' ``` and modify published views as you see fit for your application.

More features coming soon. :collision:
