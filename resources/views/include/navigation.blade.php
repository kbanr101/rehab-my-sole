{{-- @if (empty($transparentClass)) --}}
<header class="main-header {{ empty($transparentClass) ? 'solidHeader' : 'transparent' }}">
    <div class="header-container custom-container">
        <div class="brand-logo logo">
            <div class="mobile_hamburger" hidden><i class="fa-solid fa-bars"></i></div>
            <a href="{{ url('/') }}" class="d-inline"><img src="{{ asset('assets/media/RehabMySole-logo.svg') }}"
                    alt="RehabMySolo" class="img-fluid w-100" /></a>
        </div>
        <div class="main-navigation">
            {{-- New Nevbar Section --}}
            <ul class="navbar-block menubar">
                {{-- <li style="display: none;" class="mobile_menu_bar"><i class="fa fa-times"></i></li> --}}
                <li><a href="{{ route('aboutusPage') }}">About us</a></li>
                <li class="dropdown-list"><a href="{{ route('comingSoonPage') }}">Services</a>
                    <i class="drop-plus" hidden></i>
                    <ul class="sublist">
                        <li><a href="{{ route('comingSoonPage') }}">Repair</a></li>
                        <li><a href="{{ route('comingSoonPage') }}">Cleaning</a></li>
                        <li><a href="{{ route('comingSoonPage') }}">Restoration</a></li>
                        <li><a href="{{ route('comingSoonPage') }}">Customization</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('comingSoonPage') }}">How it works</a></li>
                <li><a href="{{ route('comingSoonPage') }}">FAQ's</a></li>
                <li><a href="{{ route('blogListPage') }}">Blogs</a></li>
                <li><a href="{{ route('contactus') }}">Contact us</a></li>
            </ul>
            {{-- New Nevbar Section End --}}
        </div>
        <div class="header-action">

            @php
                $user = session('user');
            @endphp
            @if ($user)
                <div class="headeNote"><i class="fa-regular fa-bell"></i><span class="headeNote-count d-none">0</span></div>
                <div class="userControl dropContainer">
                    <label class="defaultBtnClass dropBtn"><i class="fa-regular fa-user"></i></label>
                    <div class="userDropcontent">
                        <span class="d-block">Hi <i><b>{{ $user['name'] }}</b></i></span>
                        <span class="d-block"><a href="{{ route('user.logout') }}"><i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;Logout</a></span>
                    </div>
                </div>
            @else
                <div class="headeNote"><i class="fa-regular fa-bell"></i><span class="headeNote-count d-none">0</span></div>
                <a href="{{ route('login') }}" class="defaultBtnClass">Login</a>
            @endif
        </div>
    </div>
</header>
{{-- @endif --}}
<style>
    .dropContainer {
        position: relative;
    }
    .userDropcontent {
        position: absolute;
        width: 100%;
        top: 150%;
        min-width: 150px;
        border-radius: 5px;
        right: 0;
        background: rgb(var(--color-whiteG));
        box-shadow: var(--box-shadow) rgb(var(--color-blackG) / 20%);
        padding: 8px;
        border: 1px solid rgb(var(--color-blackG) / 15%);
        opacity: 0;
        visibility: hidden;
        transition: var(--transition);
    }
    .userControl > label {
        border-radius: 50px;
        width: 40px;
        height: 40px;
        text-align: center;
        padding: 0 0;
        background-color: rgb(var(--color-brownNH));
    }
    .dropContainer.active > .userDropcontent{
        visibility: visible;
        opacity: 1;
        top: 110%;
    }
    .userDropcontent a {
        color: rgb(var(--color-brownDA));
        padding: 10px 0px 5px;
        display: block;
    }
    ul.navbar-block.menubar {
        display: inline-block;
        list-style: none;
        margin: 0 0;
    }

    .menubar>li,
    .header-left_wrape ul li {
        display: inline-block;
        margin: 10px auto;
        position: relative;

    }

    .menubar>li>a:hover,
    .header-left_wrape>ul>li>a:hover {
        color: rgb(var(--color-blue));
    }

    .menubar>li>a {
        -webkit-transition: var(--transition);
        transition: var(--transition);
        position: relative;
        padding: 0px 8px;
        border-right: none;
        text-transform: capitalize;
        letter-spacing: 0.5px;
        font: 500 14px/normal var(--font-one);
        color: rgb(var(--color-grayD));
        text-decoration: none;
    }

    /* Navigation bar dropdown */
    .sublist {
        visibility: hidden;
        opacity: 0;
        position: absolute;
        z-index: 2;
        background-color: rgb(var(--color-whiteG));
        width: 200px;
        box-shadow: var(--box-shadow) rgb(var(--color-blackG)/30%);
        border-radius: 4px;
        top: 130%;
        transition: var(--transition);
        text-align: left;
        border: 1px solid rgb(var(--color-blackG)/10%);
        margin: 0 0;
        padding: 0 0;
        list-style: none;
        overflow: hidden;
    }

    .sublist a {
        display: block;
        font: 400 14px/22px var(--font-one);
        padding: 4px 8px;
        color: rgb(var(--color-grayNA));
        transition: var(--transition);
        transition: var(--transition);
        border-bottom: 1px solid rgb(var(--color-blackG)/5%);
    }

    .sublist a:active,
    .sublist a:hover {
        color: rgb(var(--color-whiteG));
        background: rgb(var(--color-grayNH));
    }

    .sublist a:active {
        background: rgb(var(--color-grayNA));
    }

    ul.sublist.active-list {
        visibility: visible;
        opacity: 1;
    }

    .header-contaner ul.sublist li {
        display: block;
        padding: 0px 0px;
        position: relative;
        margin: auto 0;
    }

    ul.sublist ul.sublist {
        left: 100%;
        top: 0;
        margin: 0 0;
        border: 1px solid rgb(var(--color-black) / 10%);
        box-shadow: 0px 0px 8px 4px rgb(var(--color-black) / 10%);
    }

    .sublist li.dropdown-list:after,
    li.dropdown-list:after {
        content: '\f107';
        font-family: 'FontAwesome';
        transition: var(--transition);
    }

    .sublist li.dropdown-list:after {
        position: absolute;
        right: 10px;
        top: 8px;
    }

    .sublist li.dropdown-list:hover:after {
        transform: rotate(-90deg);
    }

    li.dropdown-list:hover:after {
        transform: rotate(-90deg);
    }

    .sublist li {
        position: relative;
    }

    .sublist .dropdown-list a {
        padding: 6px 10px;
        display: block;
        text-align: left;
        color: rgb(var(--color-black));
        font: 500 14px/normal var(--font-one);
    }

    .sublist li.dropdown-list:hover:after {
        filter: invert(1) brightness(1)
    }

    .sublist .dropdown-list a:hover {
        background: rgb(var(--color-black) / 50%);
        color: rgb(var(--color-white));
    }

    @media (max-width: 768px) {
        i.drop-plus {
            display: block !important;
            position: absolute;
            right: 10px;
            top: 0px;
            height: auto;
            width: 25px;
            text-align: center;
            line-height: normal;
            color: rgb(var(--color-dgreen));
            font-weight: 700;
            font-size: 28px;
            padding: 0px 0;
            background-color: rgb(var(--green-color));
        }

        .sublist .dropdown-list a {
            padding: 8px 10px
        }

        .sublist {
            position: relative;
            display: none;
            width: 100%;
            top: 100%;
            margin: 0px 0 0 !important;
            transition: var(--transition);
        }

        ul.sublist ul.sublist {
            left: 0 !important;
            margin: 0 0 !important;
            background: none;
            box-shadow: none;
            border: none;
        }

        .sublist li.dropdown-list:after,
        li.dropdown-list:after,

        .sublist li.dropdown-list:after {
            display: none;
        }

        ul.sublist.active {
            display: block;
            opacity: 1;
            visibility: visible;
        }

        .menubar>li>a {
            padding: 8px 10px;
            display: block;
        }
    }

    @media (min-width: 768px) {

        li.dropdown-list:hover>ul.sublist,
        li.dropdown-list:hover ul.sublist>ul.sublist,
        ul.sublist.active-list {
            visibility: visible;
            opacity: 1;
        }
    }

    /* Navigation bar dropdown End */
</style>
<script>
    // Navigation bar dropdown
    document.addEventListener('DOMContentLoaded', () => {
        // Code here runs after DOM content is fully loaded
        const dropdowns = document.querySelectorAll('.dropdown-list');
        dropdowns.forEach(dropdown => {
            const toggleBtn = dropdown.querySelector('.drop-plus');
            const sublist = dropdown.querySelector('.sublist');
            dropdown.addEventListener("mouseover", (event) => {
                const isDropdown = event.currentTarget === event.target;
                if (isDropdown) {
                    sublist.classList.add('active-list');
                }
            });
            dropdown.addEventListener("mouseleave", () => {
                sublist.classList.remove('active-list');
            });
            if (toggleBtn && sublist) {
                toggleBtn.addEventListener('click', (event) => {
                    sublist.classList.toggle('active');
                    toggleBtn.textContent = sublist.classList.contains('active') ? '-' : '+';
                    event.stopPropagation(); // Prevent event from bubbling up
                });
            } else {
                console.error('Toggle button or sublist not found in dropdown:', dropdown);
            }
            // Close dropdown when clicking outside
            document.addEventListener('click', () => {
                if (sublist) {
                    sublist.classList.remove('active');
                    toggleBtn.textContent = '+';
                }
            });
            // Prevent closing dropdown when clicking inside
            dropdown.addEventListener('click', (event) => {
                event.stopPropagation();
            });
        });
    });
    // Navigation bar dropdown End
</script>
