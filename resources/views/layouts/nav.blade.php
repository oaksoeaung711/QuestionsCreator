<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Fifth navbar example">
    <div class="container-fluid">
        <a class="navbar-brand fw-bolder d-flex align-items-center gap-2" href="{{ route('admin.home') }}">
            <img src="{{ asset('assets/imgs/icons/question.png') }}" width="30" height="auto" />
            <span class="">Questions Creator</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#konohanavbars" aria-controls="konohanavbars" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="konohanavbars">
            <ul class="navbar-nav ms-auto me-5 mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link active me-3" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="fw-bold d-flex align-items-center gap-2 ">
                            <img src="{{ asset('assets/imgs/icons/user1.png') }}" width="30" height="auto" />
                            <span>{{ Auth::user()->name }}</span>
                            <i class="fa-solid fa-caret-down"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-dark" href="{{ route('admin.home') }}"><i class="fa-solid fa-house"></i> Home</a></li>

                        <li><a class="dropdown-item text-dark" href="{{ route('admin.logout') }}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>