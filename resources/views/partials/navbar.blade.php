
<nav class="navbar navbar-expand-lg navbar-dark btn-primary">
<div class="container">
    <a class="navbar-brand" href="/">My Awesome App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse small" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
                @if(!Auth::user())
            <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}" tabindex="-1" aria-disabled="true"> <i class="fas fa-sign-in-alt"></i>SingIn</a>
            </li>
                    @else
                    <li class="nav-item">
                        <a href="{{route('dashboard')}}" class="nav-link">
                            <i class="fas fa-tachometer-alt"></i>Dashboard
                        </a>
                    </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class=" fas fa-user-circle"></i>{{Auth::user()->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="{{route('setting')}}"><i class="fas fa-cog"></i>Setting</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i>Logout</a>
                    </div>



                    @endif
        </ul>

    </div>
</div>

</nav>