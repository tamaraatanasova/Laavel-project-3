<nav class="navbar navbar-expand-lg bg-yellow ">
    <div class="container">

        <li class="nav-item ms-3">
            @if (session()->has('admin_id'))
            <a class="navbar-brand d-flex flex-column align-items-center" href="{{ url('/admin/dashboard') }}">
                <img src="{{ asset('images/logo_footer_black.png') }}" alt="Logo" class="logo mb-1">
                <span class="brand-text">Brainster</span>
            </a>
            @else
            <a class="navbar-brand d-flex flex-column align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('images/logo_footer_black.png') }}" alt="Logo" class="logo mb-1">
                <span class="brand-text">Brainster</span>
            </a>
            @endif
        </li>

        

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown me-4 akademii-dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="akademii" role="button"
                        aria-expanded="false">
                        Академии
                    </a>
                    <ul class="dropdown-menu bg-yellow" aria-labelledby="akademii">
                        @include('partials.ul_academy')
                    </ul>
                </li>

                <li class="nav-item me-4">
                    <a class="nav-link" href="https://brainster.co/"
                        target="_blank">Блог</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#companyContactModal">
                        Вработи наши студенти
                    </a>
                </li>
                
                <li class="nav-item ms-3">
                    @if (session()->has('admin_id'))
                        <a class="nav-link" href="{{ route('admin.logout') }}">
                            <i class="fa-solid fa-right-from-bracket"></i> 
                        </a>
                    @else
                        <a class="nav-link" href="{{ route('admin.loginForm') }}">
                            <i class="fa-solid fa-right-to-bracket"></i> 
                        </a>
                    @endif
                </li>
                
            </ul>
        </div>
    </div>
</nav>


@include('partials.company_contact_modal')