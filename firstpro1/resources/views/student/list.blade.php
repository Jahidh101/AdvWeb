@extends('layouts/loggedin')
@section('content')
<h1>list</h1>

<table border="1">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Dept</th>
    </tr>
    @foreach($students as $s)
    <tr>
        <td>{{$s->id}}</td>
        <td>{{$s->name}}</td>
        <td>{{$s->dept}}</td>
    </tr>
    @endforeach
</table>
@endsection