<header class="header-desktop" style="left: 0px">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="login-logo pt-4">
                                <a href="/">
                                    <img src="{{ asset('theme/images/icon/logoipsum.svg') }}" alt="">
                                </a>
                            </div>
                            @if (Auth::user())
                                <div class="header-button">
                                    <div class="account-wrap">
                                        <div class="account-item clearfix js-item-menu">
                                            <div class="image">
                                                <img src="http://127.0.0.1:8000/theme/images/icon/avatar-01.jpg" alt="John Doe">
                                            </div>
                                            <div class="content">
                                                
                                                    <a class="js-acc-btn" href="#">
                                                        {{Auth::user()->name}} 
                                                        @role('admin')
                                                        (admin)
                                                        @else
                                                        (employee)
                                                        @endrole
                                                    </a>
                                            </div>
                                            <div class="account-dropdown js-dropdown">
                                                <div class="info clearfix">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="http://127.0.0.1:8000/theme/images/icon/avatar-01.jpg" alt="John Doe">
                                                        </a>
                                                    </div>
                                                    <div class="content">
                                                        <h5 class="name">
                                                            <a href="#">{{Auth::user()->name}}</a>
                                                        </h5>
                                                        <span class="email">{{Auth::user()->email}}</span>
                                                    </div>
                                                </div>
                                                
                                                <div class="account-dropdown__footer">
                                                    <a>
                                                        <form action="/logout" method='post'>
                                                        @csrf
                                                            <button type="submit">
                                                            <i class="zmdi zmdi-power"></i>
                                                            Logout
                                                            </button>
                                                        </form>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="header-button">
                                    <div class="col-sm">
                                        <a href="/login" style="text-decoration: none">
                                            <button type="" class="btn btn-primary">
                                                <i class="fa fa-laptop"></i> Login
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-sm">
                                        <a href="/register" style="text-decoration: none">
                                            <button type="" class="btn btn-primary">
                                                <i class="fa fa-user"></i> Register
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </header>