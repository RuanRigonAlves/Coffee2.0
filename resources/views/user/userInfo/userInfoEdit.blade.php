@extends('layouts.app')

@section('title', 'User Info Edit')

@section('content')

    <x-user.user-info-edit :user="$user" />

@endsection
