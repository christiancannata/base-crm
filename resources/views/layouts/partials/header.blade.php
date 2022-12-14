<!-- Start Header Area -->
<div class="header-area">
    <div class="container-fluid">
        <div class="header-content-wrapper">
            <div class="header-content d-flex justify-content-between align-items-center">
                <div class="header-left-content d-flex">
                    <div class="responsive-burger-menu d-block d-lg-none">
                        <span class="top-bar"></span>
                        <span class="middle-bar"></span>
                        <span class="bottom-bar"></span>
                    </div>

                    <div class="main-logo">
                        <a href="/">
                            <img src="/images/{{config('crm.small_logo')}}" alt="main-logo" width="50">
                        </a>
                    </div>

                    @if(config('crm.search_enabled',false))
                        <form class="search-bar d-flex">
                            <img src="/assets/images/icon/search-normal.svg" alt="search-normal">

                            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        </form>

                        <div class="option-item for-mobile-devices d-block d-lg-none">
                            <i class="search-btn ri-search-line"></i>
                            <i class="close-btn ri-close-line"></i>

                            <div class="search-overlay search-popup">
                                <div class='search-box'>
                                    <form class="search-form">
                                        <input class="search-input" name="search" placeholder="Search" type="text">

                                        <button class="search-button" type="submit">
                                            <i class="ri-search-line"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>

                <div class="header-right-content d-flex align-items-center">

                    @if(config('crm.fullscreen_button',false))
                        <div class="header-right-option">
                            <a href="#" class="dropdown-item fullscreen-btn" id="fullscreen-button">
                                <img src="/assets/images/icon/maximize.svg" alt="maximize">
                            </a>
                        </div>
                    @endif


                    @if(config('crm.notification_button',false))
                        <div class="header-right-option notification-option messenger-option dropdown">
                            <div class="dropdown-item dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                 aria-haspopup="true" aria-expanded="false">
                                <div class="messages-btn">
                                    <img src="/assets/images/icon/message.svg" alt="message">
                                    <span class="badge">3</span>
                                </div>
                            </div>

                            <div class="dropdown-menu">
                                <div
                                    class="dropdown-header d-flex justify-content-between align-items-center bg-linear">
                                    <span class="title d-inline-block">5 New Message</span>
                                    <span class="mark-all-btn d-inline-block">Clear All</span>
                                </div>

                                <div class="dropdown-wrap" data-simplebar>
                                    <a href="chat.html" class="dropdown-item d-flex">
                                        <div class="icon">
                                            <img src="/assets/images/user/user-1.png" alt="user-1">
                                        </div>

                                        <div class="content">
                                            <span class="d-block">Alex Dew</span>
                                            <p class="m-0">Lorem ipsum dolor sit, amet consectetur</p>
                                            <p class="sub-text mb-0">2 sec ago</p>
                                        </div>
                                    </a>

                                    <a href="chat.html" class="dropdown-item d-flex">
                                        <div class="icon">
                                            <img src="/assets/images/user/user-2.png" alt="user-2">
                                        </div>

                                        <div class="content">
                                            <span class="d-block">Anne Kew</span>
                                            <p class="m-0">Lorem ipsum dolor sit, amet consectetur</p>
                                            <p class="sub-text mb-0">5 sec ago</p>
                                        </div>
                                    </a>

                                    <a href="chat.html" class="dropdown-item d-flex">
                                        <div class="icon">
                                            <img src="/assets/images/user/user-3.png" alt="user-3">
                                        </div>

                                        <div class="content">
                                            <span class="d-block">Huhon Smith</span>
                                            <p class="m-0">Lorem ipsum dolor sit, amet consectetur</p>
                                            <p class="sub-text mb-0">3 min ago</p>
                                        </div>
                                    </a>

                                    <a href="chat.html" class="dropdown-item d-flex">
                                        <div class="icon">
                                            <img src="/assets/images/user/user-4.png" alt="user-4">
                                        </div>

                                        <div class="content">
                                            <span class="d-block">Yelax Spin</span>
                                            <p class="m-0">Lorem ipsum dolor sit, amet consectetur</p>
                                            <p class="sub-text mb-0">7 min ago</p>
                                        </div>
                                    </a>

                                    <a href="chat.html" class="dropdown-item d-flex">
                                        <div class="icon">
                                            <img src="/assets/images/user/user-5.png" alt="user-5">
                                        </div>

                                        <div class="content">
                                            <span class="d-block">Steven</span>
                                            <p class="m-0">Lorem ipsum dolor sit, amet consectetur</p>
                                            <p class="sub-text mb-0">1 sec ago</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="dropdown-footer">
                                    <a href="chat.html" class="dropdown-item">View All</a>
                                </div>
                            </div>
                        </div>

                        <div class="header-right-option notification-option dropdown">
                            <div class="dropdown-item dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                 aria-haspopup="true" aria-expanded="false">
                                <div class="notification-btn">
                                    <img src="/assets/images/icon/notification.svg" alt="notification">
                                    <span class="badge">4</span>
                                </div>
                            </div>

                            <div class="dropdown-menu">
                                <div
                                    class="dropdown-header d-flex justify-content-between align-items-center bg-linear">
                                    <span class="title d-inline-block">6 New Notifications</span>
                                    <span class="mark-all-btn d-inline-block">Mark all as read</span>
                                </div>

                                <div class="dropdown-wrap" data-simplebar>
                                    <a href="inbox.html" class="dropdown-item d-flex align-items-center">
                                        <div class="icon">
                                            <i class='bx bx-message-rounded-dots'></i>
                                        </div>

                                        <div class="content">
                                            <span class="d-block">Just sent a new message!</span>
                                            <p class="sub-text mb-0">2 sec ago</p>
                                        </div>
                                    </a>

                                    <a href="inbox.html" class="dropdown-item d-flex align-items-center">
                                        <div class="icon">
                                            <i class='bx bx-user'></i>
                                        </div>

                                        <div class="content">
                                            <span class="d-block">New customer registered</span>
                                            <p class="sub-text mb-0">5 sec ago</p>
                                        </div>
                                    </a>

                                    <a href="inbox.html" class="dropdown-item d-flex align-items-center">
                                        <div class="icon">
                                            <i class='bx bx-layer'></i>
                                        </div>

                                        <div class="content">
                                            <span class="d-block">Apps are ready for update</span>
                                            <p class="sub-text mb-0">3 min ago</p>
                                        </div>
                                    </a>

                                    <a href="inbox.html" class="dropdown-item d-flex align-items-center">
                                        <div class="icon">
                                            <i class='bx bx-hourglass'></i>
                                        </div>

                                        <div class="content">
                                            <span class="d-block">Your item is shipped</span>
                                            <p class="sub-text mb-0">7 min ago</p>
                                        </div>
                                    </a>

                                    <a href="inbox.html" class="dropdown-item d-flex align-items-center">
                                        <div class="icon">
                                            <i class='bx bx-comment-dots'></i>
                                        </div>

                                        <div class="content">
                                            <span class="d-block">Steven commented on your post</span>
                                            <p class="sub-text mb-0">1 sec ago</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="dropdown-footer">
                                    <a href="inbox.html" class="dropdown-item">View All</a>
                                </div>
                            </div>
                        </div>

                    @endif


                    <div class="header-right-option dropdown profile-nav-item pt-0 pb-0">
                        <a class="dropdown-item dropdown-toggle avatar d-flex align-items-center" href="#"
                           id="navbarDropdown-4" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/assets/images/avatar.png" alt="avatar">
                            <div class="d-none d-lg-block d-md-block">
                                <h3>{{auth()->user()->full_name}}</h3>
                                <span>{{auth()->user()->roles()->pluck('name')->implode(", ")}}</span>
                            </div>
                        </a>

                        <div class="dropdown-menu">
                            <div class="dropdown-header d-flex flex-column align-items-center">
                                <div class="figure mb-3">
                                    <img src="/assets/images/avatar.png" class="rounded-circle" alt="avatar">
                                </div>

                                <div class="info text-center">
                                    <span class="name">{{auth()->user()->full_name}}</span>
                                    <p class="mb-3 email">
                                        <a href="#">{{auth()->user()->email}}</a>
                                    </p>
                                </div>
                            </div>

                            <div class="dropdown-wrap">
                                <ul class="profile-nav p-0 pt-3">
                                    <!--   <li class="nav-item">
                                           <a href="profile.html" class="nav-link">
                                               <i class="ri-user-line"></i>
                                               <span>Profilo</span>
                                           </a>
                                       </li>

                                       <li class="nav-item">
                                           <a href="inbox.html" class="nav-link">
                                               <i class="ri-mail-send-line"></i>
                                               <span>My Inbox</span>
                                           </a>
                                       </li>
   -->
                                    <li class="nav-item">
                                        <a href="{{route('user.edit',['user' => auth()->user()])}}" class="nav-link">
                                            <i class="ri-edit-box-line"></i>
                                            <span>Modifica profilo</span>
                                        </a>
                                    </li>
                                    @impersonating()

                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="{{ route('user.impersonate_leave',['user' => auth()->user()]) }}">Torna
                                            al tuo utente</a>
                                    </li>
                                    @endImpersonating

                                    <!--
                                                                        <li class="nav-item">
                                                                            <a href="edit-profile.html" class="nav-link">
                                                                                <i class="ri-settings-5-line"></i>
                                                                                <span>Settings</span>
                                                                            </a>
                                                                        </li>-->
                                </ul>
                            </div>

                            <div class="dropdown-footer">
                                <ul class="profile-nav">

                                    <li class="nav-item">

                                        <a href="{{route('logout')}}" class="nav-link">
                                            <i class="ri-login-circle-line"></i>
                                            <span>Esci</span>
                                        </a>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header Area -->
