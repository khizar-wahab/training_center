<!-- Header start -->
<header id="header" class="header header-classic">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- logo-->
            <a class="navbar-brand" href="/Home">
                <img src="assets/images/logos/logo-v3.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="icon icon-menu"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="ts-scroll" href="#Main">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="ts-scroll" href="#AboutUs">عن الملتقى</a>
                    </li>


                    <li class="nav-item">
                        <a class="ts-scroll" href="#Contact">للتواصل</a>
                    </li>
                    <li class="nav-item">
                        <a class="  " href="{{ route('register-company') }}">تسجيل الشركة</a>
                    </li>

                    

                    <li class="header-ticket nav-item">
                        <a href="#popup_DeptRegister" class="ticket-btn btn ts-image-popup" data-effect="mfp-zoom-in">
                            تسجيل الجهات
                        </a>
                    </li>

                </ul>
        
            </div>
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('assets/images/logos/MFTC-logo.png') }}" alt="">
            </a>
    
        </nav>
    </div><!-- container end-->
</header>
<!--/ Header end -->

<div id="popup_DeptRegister" class="container ts-event-popup mfp-hide">
    <div class="register-form" style="text-align:center">
        <p style="color: #a91c1c; font-weight:500; font-size:30px; text-align: center">

            للحصول على الدليل التعريفي بالملتقى
        </p>
        <p style="color: #a91c1c; font-weight:500; font-size:30px; text-align: center">

            (خاص للجهات والمؤسسات)
        </p>
        
        
        <br />
        <a style="color: #073969; font-size:35px" href="mailto:fsalzahrani@waqf.org.sa">fsalzahrani@waqf.org.sa</a>

    </div>

</div>