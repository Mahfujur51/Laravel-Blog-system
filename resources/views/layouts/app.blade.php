<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            @if (Auth::Check())
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                </ul>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('category') }}">Category</a>
                    </li>
                </ul>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('post.create') }}">Create Post</a>
                    </li>
                </ul>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('category.create') }}">Create Category</a>
                    </li>
                </ul>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('post') }}">Show Post</a>
                    </li>
                </ul>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('tag') }}">Show All Tag</a>
                    </li>
                </ul>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('tag.create') }}">Create Tags</a>
                    </li>
                </ul>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('post.trushed') }}">Show Trushed Post</a>
                    </li>
                </ul>
                @if (Auth::user()->admin)
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('user') }}">Show User</a>
                    </li>
                </ul>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('user.create') }}">Add User</a>
                    </li>
                </ul>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('profile.index') }}">Edit Profile</a>
                    </li>
                </ul>
                 <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('settings.index') }}"> Settings</a>
                    </li>
                </ul>
                {{-- expr --}}
                @endif

            </div>
            @endif

            <div class="col-md-8">
               @yield('content')
           </div>
       </div>
   </div>


</div>
<script src="{{asset('js/toastr.min.js')}}"></script>
<script>
    @if (Session::has('success'))
    toastr.success("{{Session::get('success')}}")
    {{-- expr --}}
    @endif
    @if (Session::has('info'))
    toastr.info("{{Session::get('info')}}")
    {{-- expr --}}
    @endif

</script>
<script>
    $(document).ready(function() {
  $('#summernote').summernote();
});
</script>

</body>
</html>
