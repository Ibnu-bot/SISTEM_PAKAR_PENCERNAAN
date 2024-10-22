<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('/assets/landing/images/logo-sispakcer.png') }}"></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                @guest
                    <div class="d-flex gap-2">
                        <a class="nav-item nav-link btn btn-primary rounded px-3" style="background-color : #FF8549;"
                            href="{{ route('login') }}">Login</a>
                    </div>
                @else
                    <div class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                            <div class="avatar-sm">
                                <img src="{{ asset('assets/img/profile.jpg') }}" alt="Profile Picture"
                                    class="avatar-img rounded-circle">
                            </div>
                            <span class=" user-greeting ml-2">Hai, {{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a href="{{ route('user.riwayat') }}" class="dropdown-item">Riwayat Diagnosis</a>
                            <button id="logout-button" class="dropdown-item">Logout</button>
                            <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>


<style>
    .profile-pic {
        display: flex;
        align-items: center;
        text-decoration: none;
        border: 2px solid white;
        border-radius: 5px;
        padding: 2px 6px;
    }

    .avatar-sm {
        width: 40px;
        height: 40px;
        overflow: hidden;
    }

    .avatar-img {
        width: 100%;
        height: auto;
    }

    .user-greeting {
        margin-left: 10px;
        font-size: 16px;
        color: white;

    }

    .dropdown-menu {
        margin-top: 10px;
    }
</style>
