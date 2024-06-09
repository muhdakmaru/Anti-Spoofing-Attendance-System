<nav class="sidebar close">

    <x-header2></x-header2>

    <div class="menu-bar">
        <div class="menu">

            <li class="search-box">
                <i class='bx bx-search icon'></i>
                <input type="text" placeholder="Search...">
            </li>

            <li class="nav-link">
                <x-nav-link href="/testing" :active="request()->is('/')">
                    <i class='bx bx-home-alt icon' ></i>
                    <span class="text nav-text">Home Page</span>
                </x-nav-link>
            </li>

                <li class="nav-link">
                    <x-nav-link href="/registerStudent" :active="request()->is('/')">
                        <i class='bx bx-bell icon'></i>
                        <span class="text nav-text">Register Student</span>
                    </x-nav-link>
                </li>

                <li class="nav-link">
                    <x-nav-link href="/student" :active="request()->is('/')">
                        <i class='bx bx-box icon' ></i>
                        <span class="text nav-text">Students</span>
                    </x-nav-link>
                </li>

            <li class="nav-link">
                <x-nav-link href="/generateReport" :active="request()->is('/')">
                    <i class='bx bx-bar-chart-alt-2 icon' ></i>
                    <span class="text nav-text">Generate Report</span>
                </x-nav-link>
            </li>

            </ul>
        </div>

        <div class="bottom-content">
            <li class="">
                <x-nav-link href="/logout" :active="request()->is('/')">
                    <i class='bx bx-log-out icon' ></i>
                    <span class="text nav-text">Logout</span>
                </x-nav-link>
            </li>

            <li class="mode">
                <div class="sun-moon">
                    <i class='bx bx-moon icon moon'></i>
                    <i class='bx bx-sun icon sun'></i>
                </div>
                <span class="mode-text text">Dark mode</span>

                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li>

        </div>
    </div>

</nav>
