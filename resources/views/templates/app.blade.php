<!DOCTYPE html>
<html lang="en">
    <head>
        @include('components.header')
    </head>
    <body>
        <div class="wrapper">
            <!-- Sidebar -->
            @include('components.sidebar')

            <div class="main-panel">
                <!-- Navbar -->
                @include('components.navbar')

                <div class="container">
                    <div class="page-inner">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                <b>Success!</b> : {{session('success')}}
                            </div>
                        @endif
                        <!-- Content -->
                        @yield('content')
                    </div>
                </div>

                <!-- Footer -->
                @include('components.footer')
            </div>

        </div>
        <!-- Script -->
        @include('components.script')
    </body>
</html>
