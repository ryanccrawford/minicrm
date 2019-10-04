@extends('layout')

@section('title')
About
@endsection

@section('navbar')
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">CRM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/about">About <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact Us</a>
                </li>
            </ul>
            <div class="form-inline mt-2 mt-md-0">
                @if (Route::has('login'))
                <div class="section">
                    @auth
                    <a href="{{ url('/home') }}">Home</a> @else
                    <a href="{{ route('login') }}">Login</a> @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a> @endif @endauth
                </div>
                @endif
                <button class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#loginBox">Login</button>
            </div>
        </div>
    </nav>
<div class="modal fade" id="loginBox" tabindex="-1" role="dialog" aria-labelledby="loginBoxCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginBoxCenterTitle">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-3 font-weight-normal">Please Enter You Email Address and Password.</p>
                    </form>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Login</button>
                    </form>
                </div>


            </div>
        </div>
    </div>

@endsection



@section('content')
<main class="container">
        <div class="jumbotron bg-primary rounded shadow-lg bg-image-hr">
            <h1 class="display-4 text-white">{{ $site_title }}</h1>
            <p class="lead text-white">Get to know us</p>
        </div>
        <div class="container">

            <div class="row">
            <div class="col-md-12">
                <h2>How we can help</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
               <h2>Our core values</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
               <h2>Change is good</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            </div>

        </div>

    <hr>

  </div>
</main>
@endsection

