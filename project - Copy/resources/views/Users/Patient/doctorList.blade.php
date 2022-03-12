@extends('layouts/header')
@section('content')
<h1>Doctors</h1>
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
        @endif
    @endforeach
</div>
<div>
    @foreach($infoAll as $info)
    <div class="some-class divBorder">
        <form>
            <img src="{{asset($info->profile_pic)}}" width="100px" height="100px"><br>
            <label><b>Username :</b></label>
            {{$info->username}}<br>

            <label><b>Full name :</b></label>
            {{$info->name}}<br>

            <label><b>Gender :</b></label>
            {{$info->gender}}<br>

            <label><b>Email :</b></label>
            {{$info->email}}<br>

            <label><b>Phone :</b></label>
            @if($info->phone == null)
            -<br>
            @else
            {{$info->phone}}<br>
            @endif

            <label><b>Address :</b></label>
            {{$info->address}}<br>

            @if(Session::get('userType') =='admin')
            @else
            <a href="{{route('user.profile.edit')}}"><button type="button" class="btn btn-info">View profile</button></a>
            @endif
            <a href="{{route('chat', ['receiverUsername'=>$info->username])}}"><button type="button" class="btn btn-info">Chat</button></a><br>
        </form>
    </div>
    @endforeach
</div>
@endsection