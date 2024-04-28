<!--start header -->
<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand gap-3">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>




            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center gap-1">


                    <li class="nav-item dark-mode d-none d-sm-flex">
                        <a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown dropdown-app">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"
                            href="javascript:;"><i class='bx bx-grid-alt'></i></a>
                        <div class="dropdown-menu dropdown-menu-end p-0">
                            <div class="app-container p-2 my-2">
                                <div class="row gx-0 gy-2 row-cols-3 justify-content-center p-2">
                                    <div class="col">
                                        <a href="{{ route('dashboard') }}">
                                            <div class="app-box text-center">
                                                <div class="app-icon">
                                                    <i class='bx bx-home-alt dashboard_icon_size'></i>
                                                </div>
                                                <div class="app-name">
                                                    <p class="mb-0 mt-1">Dashboard</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="{{ route('destinations.list') }}">
                                            <div class="app-box text-center">
                                                <div class="app-icon">
                                                    <i class='bx bx-map-pin dashboard_icon_size'></i>
                                                </div>
                                                <div class="app-name">
                                                    <p class="mb-0 mt-1">Destinations</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="{{ route('package.list') }}">
                                            <div class="app-box text-center">
                                                <div class="app-icon">
                                                    <i class='bx bx-package dashboard_icon_size'></i>
                                                </div>
                                                <div class="app-name">
                                                    <p class="mb-0 mt-1">Packages</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="{{ route('image.list') }}">
                                            <div class="app-box text-center">
                                                <div class="app-icon">
                                                    <i class='bx bx-images dashboard_icon_size'></i>
                                                </div>
                                                <div class="app-name">
                                                    <p class="mb-0 mt-1">Gallery</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="{{ route('testimonial.list') }}">
                                            <div class="app-box text-center">
                                                <div class="app-icon">
                                                    <i class='bx bx-message-dots dashboard_icon_size'></i>
                                                </div>
                                                <div class="app-name">
                                                    <p class="mb-0 mt-1">Testimonial</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="{{ route('bookings.list') }}">
                                            <div class="app-box text-center">
                                                <div class="app-icon">
                                                    <i class='bx bx-bookmark-alt dashboard_icon_size'></i>
                                                </div>
                                                <div class="app-name">
                                                    <p class="mb-0 mt-1">Bookings</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="{{ route('contact.list') }}">
                                            <div class="app-box text-center">
                                                <div class="app-icon">
                                                    <i class='bx bxs-contact dashboard_icon_size'></i>
                                                </div>
                                                <div class="app-name">
                                                    <p class="mb-0 mt-1">Contact</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="{{ route('plan.list') }}">
                                            <div class="app-box text-center">
                                                <div class="app-icon">
                                                    <i class='bx bx-paper-plane dashboard_icon_size'></i>
                                                </div>
                                                <div class="app-name">
                                                    <p class="mb-0 mt-1">Tour Plan</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>


                                </div>
                                <!--end row-->

                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            data-bs-toggle="dropdown"><span class="alert-count">{{ $booking_count }}</span>
                            <i class='bx bx-bookmark-alt'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Bookings</p>
                                    <p class="msg-header-badge">{{ $booking_count }} New</p>
                                </div>
                            </a>
                            <div class="header-notifications-list">
                                @foreach ($recent_bookings as $recent_booking)
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">

                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">{{ $recent_booking->name }}<span
                                                        class="msg-time float-end">{{ \Carbon\Carbon::parse($recent_booking->created_at)->format('Y-m-d') }}</span>
                                                </h6>
                                                <p class="msg-info">{{ $recent_booking->email }}</p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <a href="{{ route('bookings.list') }}">
                                <div class="text-center msg-footer">
                                    <button class="btn btn-primary w-100">View All Bookings</button>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span
                                class="alert-count">{{ $plan_count }}</span>
                            <i class='bx bx-paper-plane'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Tour Plans</p>
                                    <p class="msg-header-badge">{{ $plan_count }} New</p>
                                </div>
                            </a>
                            <div class="header-message-list">

                                @foreach ($recent_plans as $recent_plan)
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">

                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">{{ $recent_plan->name }}<span
                                                        class="msg-time float-end">{{ \Carbon\Carbon::parse($recent_plan->created_at)->format('Y-m-d') }}</span>
                                                </h6>
                                                <p class="msg-info">{{ $recent_plan->email }}</p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <a href="{{ route('plan.list') }}">
                                <div class="text-center msg-footer">
                                    <button class="btn btn-primary w-100">View All Tour Plans</button>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="user-box dropdown px-3">
                <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret"
                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset(Auth::user()->profile) }}" class="user-img object-fit-cover" alt="user avatar">
                    <div class="user-info">
                        <p class="user-name mb-0"> {{ Auth::user()->name }}</p>
                        <p class="designattion mb-0">Admin</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('profile') }}"><i
                                class="bx bx-user fs-5"></i><span>Profile</span></a>
                    </li>

                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('dashboard') }}"><i
                                class="bx bx-home-circle fs-5"></i><span>Dashboard</span></a>
                    </li>


                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>

                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="bx bx-log-out-circle"></i> {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!--end header -->
