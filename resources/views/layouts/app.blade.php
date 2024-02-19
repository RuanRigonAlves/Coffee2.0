<html>

    <head>
        <title>Coffee - @yield('title')</title>
        @vite('resources/css/app.css')
    </head>

    <body class="bg-gradient-to-r from-cyan-800 to-teal-800">

        <header>
            <div class="bg-teal-400 py-4 px-2 mt-4 mx-4 mb-1 rounded">
                <ul class="flex gap-4">
                    <li>
                        <a href="/" class="btn">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('products.index') }}" class="btn">Products</a>
                    </li>
                </ul>

            </div>
        </header>


        <section class="bg-white mx-4">
            @yield('content')
        </section>
    </body>

</html>
