<header class="mb-4">
    <nav class="navbar fixed-top navbar-expand-sm navbar-dark" style="background-color:#33CCFF"><!--navbar-darkは背景がdark系の場合、白系はlight-->
        <a class="navbar-brand ml-3" href="/" style="font-size:30px">水族館図鑑</a><!--navbar-brandはブランドを表す-->
        
        <!--ハンバーガーメニュー-->
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if(Auth::check())
                    @if(Auth::user()->administrator_flag == 1)
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">メニュー</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                           <!-- <li class="dropdown-item">{!! link_to_route('users.show','MyPage',['id'=>Auth::id()]) !!}</li> -->
                            <!--<li class="dropdown-divider"></li>-->
                            <li class="dropdown-item">{!! link_to_route('aquariums.area','水族館追加') !!}</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">{!! link_to_route('logout.get','Logout') !!}</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">{!! link_to_route('user.delete','退会') !!}</li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">メニュー</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <!--<li class="dropdown-item">{!! link_to_route('users.show','MyPage',['id'=>Auth::id()]) !!}</li>-->
                            <li class="dropdown-item">{!! link_to_route('logout.get','Logout') !!}</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">{!! link_to_route('user.delete','退会') !!}</li>
                        </ul>
                    </li>
                    @endif
                @else
                    <li class="nav-item">{!! link_to_route('signup.get','Signup',[],['class'=>'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>