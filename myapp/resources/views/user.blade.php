@extends('layouts.default')

@section('title', 'User title')

@section('content')

@empty($user)
    Minha compra foi zero
@endempty

@endsection
