<html>

    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">

        <title>Coffee - @yield('title')</title>
        @vite('resources/css/app.css')


    </head>

    <body class="bg-gradient-to-r from-cyan-900 to-teal-900">

        <header>
            <div
                class="bg-gradient-to-r from-cyan-800 to-teal-800 py-4 px-1 mt-4 mx-4 rounded-t border-b border-slate-500">
                <ul class="flex gap-4">
                    <li class="">
                        <a href="/" class="btn">Big Hoooooooooooome</a>
                    </li>

                    <li>
                        <a href="{{ route('products.index') }}" class="btn">Products</a>
                    </li>
                </ul>

            </div>
        </header>


        <section class="bg-gradient-to-r from-cyan-800 to-teal-800 mx-4 mb-4 ">
            @yield('content')
        </section>
    </body>

</html>
