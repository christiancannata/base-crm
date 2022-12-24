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
                                    <li class="list-group-item main-grid active">
                                        <a
                                            @if($link['route'])
                                                href="{{route($link['route'])}}"
                                            @else
                                                href="#"
                                            @endif
                                            class="
                                            @if(count($link['submenu'])>0)  has-arrow @endif
                                          box-style d-flex align-items-center"
                                            aria-expanded="false">
                                            <div class="icon">
                                                <img src="/assets/images/icon/element.svg" alt="element">
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
