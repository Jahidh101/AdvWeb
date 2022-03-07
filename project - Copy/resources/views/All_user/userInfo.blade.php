@extends('layouts/header')
@section('content')
<body>
<form>
    <h1>User Info</h1>

    <label><b>Username :</b></label><br>
    {{$info->username}}<br>

    <label><b>Full name :</b></label><br>
    {{$info->name}}<br>

    <label><b>User type :</b></label><br>
    {{$info->user_types->type}}<br>

    <label><b>Email :</b></label><br>
    {{$info->email}}<br>

    <label><b>Phone :</b></label><br>
    {{$info->phone}}<br>


</form>
</body>
@endsection