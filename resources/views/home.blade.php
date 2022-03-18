@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html lang="en">


<head>
    <title>Google Homepage</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

</head>

<body>


<!-- GOOGLE IMG -->
<div class="google">
    <a href="#" id="google_logo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Google_2011_logo.png/640px-Google_2011_logo.png" alt=" photo google-logo_zpspkcztsjo.png"/></a>
</div>

<!-- FORM SEARCH -->
<div class="form">
    <form method="POST" action="/products/search">
        @csrf
        <label for="form-search"></label>
        <input type="text" id="form-search" placeholder="Search Google or type URL" name="search">
        <input type="submit" value="Google Search" id="google_search">

    </form>
</div>

<script>
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>
@endsection
