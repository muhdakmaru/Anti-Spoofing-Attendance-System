<nav class="sidebar close">

    <x-adminHeader></x-adminHeader>

    <div class="menu-bar">
        <div class="menu">


                        <li class="nav-link">
                            <x-nav-link href="/registerLecturer" :active="request()->is('/')">
                                <i class='bx bx-bell icon'></i>
                                <span class="text nav-text">Students</span>
                            </x-nav-link>
                        </li>

                        <li class="nav-link">
                            <x-nav-link href="/lecturer" :active="request()->is('/')">
                                <i class='bx bx-bar-chart-alt-2 icon' ></i>
                                <span class="text nav-text">Edit Profile</span>
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


                    </div>
                </div>

            </nav>
