<header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    <div class="nav-item dropdown">
        <a class="dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            {{ Auth::user()->name }}
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
                <a class="dropdown-item" href="javascript:;" onclick="document.getElementById('logout-form').submit();">
                    {{ __('Cerrar sesión') }}
                </a>
            </li>
        </ul>
    </div>
</header>
<div class="l-navbar" id="nav-bar">
    <nav class="nav text-center">
        <div>
            <div class="nav_logo">
                <i class='bx bx-dollar-circle nav_logo-icon'></i>
                <span class="nav_logo-name">PRECIOS<br>LIBRO$</span>
            </div>
            <div class="nav_list">
                <a href="/books" class="nav_link">
                    <i class='bx bx-book nav_icon'></i>
                    <span class="text-light">Libros</span>
                </a>
                <a href="/authors" class="nav_link">
                    <i class='bx bx-user-circle nav_icon'></i>
                    <span class="text-light">Autores</span>
                </a>
                <a href="/bookshops" class="nav_link">
                    <i class='bx bx-store nav_icon'></i>
                    <span class="text-light">Librerías</span>
                </a>
                @if(Auth::user()->hasRole()=="admin" || Auth::user()->hasRole()=="bookshop")
                    <a href="/categories" class="nav_link">
                        <i class='bx bx-category nav_icon'></i>
                        <span class="text-light">Categorías</span>
                    </a>
                @endif
                @if(Auth::user()->hasRole()=="admin")
                    <a href="/suscribers" class="nav_link">
                        <i class='bx bx-book-reader nav_icon'></i>
                        <span class="text-light">Suscriptores</span>
                    </a>
                    <a href="/users" class="nav_link">
                        <i class='bx bx-user-plus nav_icon'></i>
                        <span class="text-light">Usuarios</span>
                    </a>
                @endif

            </div>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            <a href="javascript:;" class="nav_link" onclick="document.getElementById('logout-form').submit();">
                <i class='bx bx-log-out nav_icon'></i>
                <span class="text-light">Cerrar sesión</span>
            </a>
            @csrf
        </form>
    </nav>
</div>

@section('js-header')
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            const showNavbar = (toggleId, navId, bodyId, headerId) => {
                const toggle = document.getElementById(toggleId),
                    nav = document.getElementById(navId),
                    bodypd = document.getElementById(bodyId),
                    headerpd = document.getElementById(headerId)

                // Validate that all variables exist
                if (toggle && nav && bodypd && headerpd) {
                    if (getCookie("open") == "true"){
                        nav.classList.toggle('showBar')
                        toggle.classList.toggle('bx-x')
                        bodypd.classList.toggle('body-pd')
                        headerpd.classList.toggle('body-pd')
                    }

                    toggle.addEventListener('click', () => {
                        // show navbar
                        nav.classList.toggle('showBar')
                        // change icon
                        toggle.classList.toggle('bx-x')
                        // add padding to body
                        bodypd.classList.toggle('body-pd')
                        // add padding to header
                        headerpd.classList.toggle('body-pd')
                    })
                }
            }
            showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')
        });

        document.getElementById("header-toggle").addEventListener("click",toggleCookie);

        function toggleCookie(){
            var openToggle = getCookie("open")
            if (openToggle == "true")
                document.cookie = "open = false; path=/;"
            else
                document.cookie = "open = true; path=/;"
        }

        function getCookie(cname) {
            let name = cname + "=";
            let decodedCookie = decodeURIComponent(document.cookie);
            let ca = decodedCookie.split(';');
            for(let i = 0; i <ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') {
                c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
                }
            }
            return "";
        }
    </script>
    @parent
@endsection
