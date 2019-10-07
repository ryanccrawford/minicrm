<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'CRM') }}
            </a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>


    <div class="collapse navbar-collapse justify-content-end" id="navbar">

         <ul class="navbar-nav">

                @guest
                    <li class="nav-item active"><a class="nav-link text-white btn-outline-light mr-2 btn-sm" href="{{ route('login') }}">Login</a></li>
                @else
                    <li class="nav-item"><a class="nav-link btn text-white btn-outline-light mr-2 btn-sm" href ="{{ route('companies.index') }}">{{trans('company.list')}}</a></li>
                    <li class="nav-item"><a class="nav-link btn text-white btn-outline-light mr-2 btn-sm" href ="{{ route('employees.index') }}">{{trans('employee.list')}}</a></li>
                    <li class="nav-item"><a class="nav-link btn text-white btn-outline-light mr-2 btn-sm" href="{{ route('logout') }}" onclick="logout(this)">Logout</a></li>

                @endguest
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
            </form>
        </div>
</nav>
