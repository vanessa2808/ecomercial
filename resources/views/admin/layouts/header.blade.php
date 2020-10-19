<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">@lang('messages.admin_layouts.home')</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">@lang('messages.admin_layouts.contact')</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="admin_layouts/dist/img/user1-128x128.jpg" alt="User Avatar"
                             class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="admin_layouts/dist/img/user8-128x128.jpg" alt="User Avatar"
                             class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="admin_layouts/dist/img/user3-128x128.jpg" alt="User Avatar"
                             class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown dropdown-notifications">
            <a class="nav-link"  data-toggle="dropdown" href="#notifications-panel">
                <i class="far fa-bell"></i>
                <span data-count="0" id="notification-count-1" class="badge badge-warning navbar-badge">{{Auth()->user()->Notifications->count()}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header ">Notifications (<span id="notification-count-2" class="notif-count">{{Auth()->user()->Notifications->count()}}</span>)</span>
                <div class="dropdown-container">
                    <div id="create-scroll">
                        @foreach(Auth()->user()->Notifications as $notification)
                            <div class="media">
                                <div class="media-left">
                                    <div class="media-object">
                                        <img src="{{config('const.pathDefaultImage.image')}}" class="img-circle"
                                             alt="50x50" id="avatar">
                                    </div>
                                </div>
                                <div class="media-body">
                                    <strong class="notification-title">@lang('messages.order.message')</strong>
                                    <p class="notification-desc">{{$notification->data['user']['user_name']}} @lang('messages.order.order')</p>
                                    <div class="notification-meta">
                                        <small class="timestamp">{{ $notification->created_at }}</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="dropdown-footer text-center">
                        <a href="#">@lang('messages.order.view')</a>
                    </div>
                </div>
                </a>
            </div>
        </li>
        <li><a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                @lang('messages.logout')
            </a>
        </li>
    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>
    </li>
    <li class="nav-item nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
        </a>
    </li>
    </ul>
</nav>
