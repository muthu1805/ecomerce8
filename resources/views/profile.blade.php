@extends('dashboard')
@section('content') 
<h3 style="text-align: center;">Welcome {{ ucfirst(Auth()->user()->name) }}</h3>
@endsection