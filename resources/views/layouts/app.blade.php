<html>

    <head>
        <title>Coffee - @yield('title')</title>
        @vite('resources/css/app.css')
    </head>

    <body class="bg-gradient-to-r from-cyan-800 to-teal-800">

        <header>
            <div class="bg-teal-50 py-4 px-2 mt-4 mx-4 mb-1 rounded">
                <h2>Home</h2>
            </div>
        </header>


        <section class="bg-white mx-4">
            @yield('content')
        </section>
    </body>

</html>
