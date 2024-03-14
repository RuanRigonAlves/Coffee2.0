<html>

    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
        <link rel="icon" href="{{ asset('coffee-icon.svg') }}">

        <title>Coffee - @yield('title')</title>

        @yield('head')

        <script src="{{ asset('js/flash-messages.js') }}"></script>


        @vite('resources/css/app.css')


    </head>

    <body class="secondary-bg">

        <header class="text-xl">
            <div class="main-bg py-2 px-12 mt-4 mx-4 rounded-t-lg border-b border-amber-500 flex justify-between">

                <ul class="flex items-center gap-4">
                    <li>
                        <a href="/" class="btn w-52 text-center flex items-center">
                            <x-icons.coffee-icon class="h-10 stroke-amber-500 " />
                            <p class="text-center w-full">
                                Home
                            </p>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('products.index') }}" class="btn px-4">Products</a>
                    </li>
                    @if (auth()->check())
                        <li>
                            <a class="btn px-4" href="{{ route('cart.index') }}">Cart</a>
                        </li>

                        <li>
                            <a class="btn px-4" href="{{ route('order.index') }}">My Orders</a>
                        </li>
                    @endif

                </ul>

                <ul class="flex items-center gap-4">

                    @if (!auth()->check())
                        <li>
                            <a class="btn px-4" href="{{ route('login.index') }}">Login</a>
                        </li>
                    @else
                        <li>
                            <form action="{{ route('login.logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="btn px-4">Logout</button>
                            </form>
                        </li>

                        <li>
                            <a class="btn px-4" href="{{ route('user.show') }}">{{ auth()->user()->name }}</a>
                        </li>
                    @endif

                </ul>

            </div>
        </header>


        <section class="main-bg mx-4 px-12 rounded-b-lg h-90">
            @yield('content')
        </section>
    </body>

</html>
