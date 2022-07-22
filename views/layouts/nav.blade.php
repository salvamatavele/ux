<!-- NAV -->
<div class="nav" uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky" data-uk-sticky="cls-active: uk-background-primary uk-box-shadow-medium; top: 100vh; animation: uk-animation-slide-top">
    <div class="">
        <nav class="uk-navbar uk-navbar-container " data-uk-navbar>
            <div class="uk-navbar-left">
                <div class="uk-navbar-item uk-padding-remove-horizontal">
                    <a class="uk-logo uk-text-default" title="Logo" href="{{$router->route('home')}}"><img src="" alt="">UX|Contact</a>
                </div>
            </div>
            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav ">
                    <li class="uk-active"><a href="{{ $router->route('home') }}" uk-icon="home"></a></li>
                    <li class="uk-button uk-button-link"><a href="{{ $router->route('panel') }}" >Panel</a> </li>
                </ul>
                
            </div>
        </nav>
    </div>
</div>
<!-- /NAV -->