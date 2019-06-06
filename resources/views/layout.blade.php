<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title', 'my website')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
        <style>
            .is-complete
            {
                text-decoration: line-through;
            }
        </style>
    </head>
    <body>
        

{{--         <ul>
        	<li><a href="about">about</a></li>
        	<li><a href="contact">contact</a></li>
        	<li><a href="/">home</a></li>
        </ul> --}}

        <div class="container">
            @yield('content')
        </div>
        
    </body>
</html>