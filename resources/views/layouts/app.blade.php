<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('profile.show') }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

      <!-- Your JavaScript code -->
        <!-- <script>
            document.getElementById('logout-form').addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission
                
                fetch(this.action, {
                    method: this.method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    // If needed, you can include additional data here
                }).then(response => {
                    if (response.ok) {
                        // Redirect to the home page or perform any other action
                        window.location.href = "{{ route('home') }}";
                    } else {
                        // Handle errors
                    }
                }).catch(error => {
                    console.error('Error:', error);
                });
            });
        </script> -->

        <script>
    document.getElementById('logout-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        axios.post(this.action, {
            _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }).then(response => {
            if (response.data.success) {
                // Redirect to the home page or perform any other action
                window.location.href = "{{ route('home') }}";
                
            } else {
                // Handle errors
            }
        }).catch(error => {
            console.error('Error:', error);
        });
    });

     // // Handle login redirection
    // if (window.session && window.session.status) {
    //     window.location.href = "{{ url('/') }}";
    // }
    if (window.session && window.session.status) {
        window.location.href = "{{ route('login') }}";
    }
 </script>
    </div>
    
</body>
</html>
