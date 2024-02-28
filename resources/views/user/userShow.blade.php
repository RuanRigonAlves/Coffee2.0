@extends('layouts.app')

@section('title', $user->name)

@section('content')

    <section>

        <x-user.user-card :user="$user" />

    </section>

@endsection
