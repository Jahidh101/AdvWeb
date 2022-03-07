<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>

    <body>
        @if(!Session::has('username'))
            <div id="header">
            <a href="{{route('loginUser')}}">Login</a>
            <a href="{{route('register')}}">Register</a>
        @endif
        @if(Session::get('userType') == 'admin')
            <a href="{{route('admin.addUserType')}}">AddUserTypes</a>
            <a href="{{route('admin.UserType.list')}}">UserTypeList</a> <br>
            <a href="{{route('admin.addUser.form')}}">AddUser</a>
            <a href="{{route('admin.login.history.all')}}">LoginHistory</a>
            
        @endif
        @if(Session::has('username'))
            <a href="{{route('logout')}}">Logout</a>
            </div>
        @endif

        @yield('content')
        @yield('demo0')
    </body>
</html>