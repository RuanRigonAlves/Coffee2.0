@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <section>
        <div class="flex flex-col items-center p-4">

            @if (session('success'))
                <div class="text-green-500">
                    {{ session('success') }}
                </div>
            @endif


            <div class="border-4 rounded border-black w-fit p-6">

                <div>
                    @error('noMatch')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-6 items-center">
                    @csrf

                    <div>
                        <label for="email" class="block text-center">Email</label>
                        <input type="email" name="email" id="email"class="bg-gray-600" value="{{ old('email') }}">
                    </div>

                    <div>
                        <label for="password" class="block text-center">Password</label>
                        <input type="password" name="password" id="password"class="bg-gray-600">
                    </div>

                    <div>
                        <button type="submit" class="btn px-10">Login</button>
                    </div>
                </form>

                <div class="flex justify-center">
                    <a class="underline text-center" href="{{ route('register.index') }}">Register</a>
                </div>
            </div>
        </div>
    </section>

@endsection
