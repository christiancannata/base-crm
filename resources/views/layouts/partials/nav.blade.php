<nav class="side-menu-area style-two">
    <nav class="sidebar-nav" data-simplebar="init">
        <div class="simplebar-wrapper">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset">
                    <div class="simplebar-content-wrapper"
                    >
                        <div class="simplebar-content">
                            <ul id="sidebar-menu" class="sidebar-menu metismenu">
                                @foreach(config('crm.menu') as $link)

                                    <li class="">
                                        <a href="{{route($link['route'])}}"
                                           class="
                                            @if(count($link['submenu'])>0)  has-arrow @endif
                                          box-style d-flex align-items-center"
                                           aria-expanded="false">
                                            <div class="icon">
                                                <img src="assets/images/icon/element.svg" alt="element">
                                            </div>
                                            <span class="menu-title">{{$link['text']}}</span>
                                        </a>
                                        @if(count($link['submenu'])>0)
                                            <ul class="sidemenu-nav-second-level mm-collapse">
                                                @foreach($link['submenu'] as $submenu)
                                                    <li>
                                                        <a href="{{route($submenu['route'])}}">
                                                            <span class="menu-title">{{$submenu['text']}}</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif

                                    </li>
                                @endforeach


                                <li>
                                    <a href="calendar.html" class="box-style d-flex align-items-center">
                                        <div class="icon">
                                            <img src="assets/images/icon/calendar.svg" alt="calendar">
                                        </div>
                                        <span class="menu-title">Calendar</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="chat.html" class="box-style d-flex align-items-center">
                                        <div class="icon">
                                            <img src="assets/images/icon/messages.svg" alt="messages">
                                        </div>
                                        <span class="menu-title">Chat</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="has-arrow box-style d-flex align-items-center">
                                        <div class="icon">
                                            <img src="assets/images/icon/document-copy.svg" alt="document-copy">
                                        </div>
                                        <span class="menu-title">File Manager</span>
                                    </a>

                                    <ul class="sidemenu-nav-second-level mm-collapse">
                                        <li>
                                            <a href="my-devices.html">
                                                <span class="menu-title">My Devices</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="recent.html">
                                                <span class="menu-title">Recent</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="important.html">
                                                <span class="menu-title">Important</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="deleted-files.html">
                                                <span class="menu-title">Deleted Files</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="documents.html">
                                                <span class="menu-title">Documents</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="images.html">
                                                <span class="menu-title">Images</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="videos.html">
                                                <span class="menu-title">Videos</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="audio.html">
                                                <span class="menu-title">Audio</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="contact-us.html" class="box-style d-flex align-items-center">
                                        <div class="icon">
                                            <img src="assets/images/icon/profile-2user.svg" alt="profile-2user">
                                        </div>
                                        <span class="menu-title">Contact</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="has-arrow box-style d-flex align-items-center">
                                        <div class="icon">
                                            <img src="assets/images/icon/email.svg" alt="email">
                                        </div>
                                        <span class="menu-title">Mail Box</span>
                                    </a>

                                    <ul class="sidemenu-nav-second-level mm-collapse">
                                        <li>
                                            <a href="inbox.html">
                                                <span class="menu-title">Inbox</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="starred.html">
                                                <span class="menu-title">Starred</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="drafts.html">
                                                <span class="menu-title">Drafts</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="important.html">
                                                <span class="menu-title">Important</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="trash.html">
                                                <span class="menu-title">Trash</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" class="has-arrow box-style d-flex align-items-center">
                                        <div class="icon">
                                            <img src="assets/images/icon/user-octagon.svg" alt="user-octagon">
                                        </div>
                                        <span class="menu-title">Authentication</span>
                                    </a>

                                    <ul class="sidemenu-nav-second-level mm-collapse">
                                        <li>
                                            <a href="login.html">
                                                <span class="menu-title">Login</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="register.html">
                                                <span class="menu-title">Register</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="profile.html">
                                                <span class="menu-title">Profile</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="edit-profile.html">
                                                <span class="menu-title">Edit Profile</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="forget-password.html">
                                                <span class="menu-title">Forget Password</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="screen-lock.html">
                                                <span class="menu-title">Screen Lock</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="error.html">
                                                <span class="menu-title">Error</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" class="has-arrow box-style d-flex align-items-center">
                                        <div class="icon">
                                            <img src="assets/images/icon/layer.svg" alt="layer">
                                        </div>
                                        <span class="menu-title">Pages</span>
                                    </a>

                                    <ul class="sidemenu-nav-second-level mm-collapse">
                                        <li>
                                            <a href="gallery.html">
                                                <span class="meni-title">Gallery</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="about-company.html">
                                                <span class="meni-title">About Company</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="services.html">
                                                <span class="meni-title">Services</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="gallery.html">
                                                <span class="meni-title">Gallery</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="faq.html">
                                                <span class="meni-title">FAQ,s</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="terms.html">
                                                <span class="meni-title">Terms</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="invoice.html">
                                                <span class="meni-title">Invoice</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="pricing-table.html">
                                                <span class="meni-title">Pricing Table</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="empty.html">
                                                <span class="meni-title">Empty</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="coming-soon.html">
                                                <span class="meni-title">Coming Soon</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blog.html">
                                                <span class="meni-title">Blog</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blog-details.html">
                                                <span class="meni-title">Blog Details</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="map.html">
                                                <span class="meni-title">Map</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" class="has-arrow box-style d-flex align-items-center">
                                        <div class="icon">
                                            <img src="assets/images/icon/diagram.svg" alt="diagram">
                                        </div>
                                        <span class="menu-title">Chart</span>
                                    </a>

                                    <ul class="sidemenu-nav-second-level mm-collapse">
                                        <li>
                                            <a href="apexcharts.html">
                                                <span class="menu-title">Apex Charts</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="chartsjs.html">
                                                <span class="menu-title">Charts JS</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" class="has-arrow box-style d-flex align-items-center">
                                        <div class="icon">
                                            <img src="assets/images/icon/shapes.svg" alt="shapes">
                                        </div>
                                        <span class="menu-title">Elements</span>
                                    </a>

                                    <ul class="sidemenu-nav-second-level mm-collapse">
                                        <li>
                                            <a href="alerts.html">
                                                <span class="menu-title">Alerts</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="buttons.html">
                                                <span class="menu-title">Buttons</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="colors.html">
                                                <span class="menu-title">Colors</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="avatar-square.html">
                                                <span class="menu-title">Avatar Square</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="avatar-rounded.html">
                                                <span class="menu-title">Avatar Rounded</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="avatar-radius.html">
                                                <span class="menu-title">Avatar Radius</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="drop-downs.html">
                                                <span class="menu-title">Drop Downs</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="list.html">
                                                <span class="menu-title">List</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="tags.html">
                                                <span class="menu-title">Tags</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="pagination.html">
                                                <span class="menu-title">Pagination</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="navigation.html">
                                                <span class="menu-title">Navigation</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="typography.html">
                                                <span class="menu-title">Typography</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="breadcrumbs.html">
                                                <span class="menu-title">Breadcrumbs</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="badges.html">
                                                <span class="menu-title">Badges</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="panels.html">
                                                <span class="menu-title">Panels</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="thumbnails.html">
                                                <span class="menu-title">Thumbnails</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" class="has-arrow box-style d-flex align-items-center">
                                        <div class="icon">
                                            <img src="assets/images/icon/advanced.svg" alt="advanced">
                                        </div>
                                        <span class="menu-title">Advanced Elements</span>
                                    </a>
                                    <ul class="sidemenu-nav-second-level mm-collapse">
                                        <li>
                                            <a href="media-object.html">
                                                <span class="menu-title">Media Object</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="accordion.html">
                                                <span class="menu-title">Accordion</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="tabs.html">
                                                <span class="menu-title">Tabs</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="modal.html">
                                                <span class="menu-title">Modal</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="tooltip-and-popover.html">
                                                <span class="menu-title">Tooltip and Popover</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="progress.html">
                                                <span class="menu-title">Progress</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="carousel.html">
                                                <span class="menu-title">Carousel</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" class="has-arrow box-style d-flex align-items-center">
                                        <div class="icon">
                                            <img src="assets/images/icon/fatrows.svg" alt="fatrows">
                                        </div>
                                        <span class="menu-title">Forms</span>
                                    </a>
                                    <ul class="sidemenu-nav-second-level mm-collapse">
                                        <li>
                                            <a href="form-layouts.html">
                                                <span class="menu-title">Form Layouts</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="input-group.html">
                                                <span class="menu-title">Input Group</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="form-editor.html">
                                                <span class="menu-title">Form Editor</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" class="has-arrow box-style d-flex align-items-center">
                                        <div class="icon">
                                            <img src="assets/images/icon/map.svg" alt="map">
                                        </div>
                                        <span class="menu-title">Maps</span>
                                    </a>

                                    <ul class="sidemenu-nav-second-level mm-collapse">
                                        <li>
                                            <a href="map.html">
                                                <span class="menu-title">Map</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" class="has-arrow box-style">
                                        <div class="icon">
                                            <img src="assets/images/icon/tables.svg" alt="tables">
                                        </div>
                                        <span class="menu-title">Tables</span>
                                    </a>

                                    <ul class="sidemenu-nav-second-level mm-collapse">
                                        <li>
                                            <a href="default-table.html">
                                                <span class="menu-title">Default Table</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="data-table.html">
                                                <span class="menu-title">Data Tables</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="dark-table.html">
                                                <span class="menu-title">Dark Tables</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" class="has-arrow box-style">
                                        <div class="icon">
                                            <img src="assets/images/icon/icon.svg" alt="icon">
                                        </div>
                                        <span class="menu-title">Icons</span>
                                    </a>

                                    <ul class="sidemenu-nav-second-level mm-collapse">
                                        <li>
                                            <a href="box-icon.html">
                                                <span class="menu-title">Box Icon</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="remix-icon.html">
                                                <span class="menu-title">Remix Icon</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: auto; height: 1460px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar simplebar-visible"
                 style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar simplebar-visible"
                 style="height: 126px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
        </div>
    </nav>
</nav>
