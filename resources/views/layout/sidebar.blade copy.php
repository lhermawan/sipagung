<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 148, 'stickySetTop': '-145px', 'stickyChangeLogo': true}">
    <div class="header-body border-color-primary border-top-0 box-shadow-none set-bg " data-setbg="{{URL::to('asset/img/bg.jpg') }}">

        {{-- <div class="header-top header-top-default border-bottom-0 border-top-0">
            <div class="container">
                <div class="header-row py-2">
                    <div class="header-column justify-content-start">
                        <div class="header-row">
                            <nav class="header-nav-top">
                                <ul class="nav nav-pills text-uppercase text-2">
                                    <li class="nav-item nav-item-anim-icon">
                                        <a class="nav-link pl-0" href="about-us.html"><i class="fas fa-angle-right"></i> About Us</a>
                                    </li>
                                    <li class="nav-item nav-item-anim-icon">
                                        <a class="nav-link" href="contact-us.html"><i class="fas fa-angle-right"></i> Contact Us</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header-column justify-content-end">
                        <div class="header-row">
                            <ul class="header-social-icons social-icons d-none d-sm-block social-icons-clean">
                                <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="header-container container z-index-2" >
            <div class="header-row py-2">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo header-logo-sticky-change">
                            <a href="{{ URL::to('/') }}">
                                <img class="header-logo-sticky opacity-0" alt="Porto" width="290" height="70" data-sticky-width="210" data-sticky-height="55" data-sticky-top="130" src="{{ URL::to('asset/img/cira-porprov.png') }}">
                                <img class="header-logo-non-sticky opacity-0" alt="Porto" width="290" height="100"  src="{{ URL::to('asset/img/cira-porprov.png') }}">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <img class="header-logo-sticky img-fluid rounded mb-4 d-none d-md-block mr-3 mr-lg-0 opacity-0" alt="Porto" width="600" height="100" src="{{ URL::to('asset/img/Banner-Web-Porprov.png') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="header-nav-bar " style="background: linear-gradient(90deg, rgba(248,199,7,1) 0%, rgba(82,40,136,1) 36%, rgba(64,31,86,1) 100%);" data-sticky-header-style="{'minResolution': 1500}" data-sticky-header-style-active="{'background-color': ''}" data-sticky-header-style-deactive="{'background-color': '#0088cc'}">
            <div class="container">
                <div class="header-row">
                    <div class="header-column">
                        <div class="header-row justify-content-end">
                            <div class="header-nav header-nav-force-light-text justify-content-start py-2 py-lg-3" data-sticky-header-style="{'minResolution': 1500}" data-sticky-header-style-active="{'margin-left': '210px'}" data-sticky-header-style-deactive="{'margin-left': '0'}">
                                <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
