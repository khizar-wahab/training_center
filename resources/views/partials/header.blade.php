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
                        <a class="" href="{{ route('register-company') }}">تسجيل الشركة</a>
                    </li>

                    
                    @unless(auth()->guard('web')->check())
                    <li class="header-ticket nav-item">
                        <a href="#popup_DeptRegister" class="ticket-btn btn ts-image-popup" data-effect="mfp-zoom-in">
                            تسجيل الجهات
                        </a>
                    </li>
                    @endunless

                    @auth('web')
                    <li class="header-ticket nav-item">
                        <a href="{{ route('user.logout') }}" class="ticket-btn btn">تسجيل خروج</a>
                    </li>
                    @endauth

                    <li class="header-ticket nav-item">
                        <a href="#popup_qrscanner" class="btn ts-image-popup d-flex justify-content-center align-items-center" data-effect="mfp-zoom-in">
                            <i class="fa fa-qrcode fa-2x"></i>
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

<!-- Modal for qr code scaner -->
<div id="popup_qrscanner" class="container ts-event-popup mfp-hide">
    <div class="register-form" style="text-align:center">
        <p style="color: #a91c1c; font-weight:500; font-size:30px; text-align: center">

            للحصول على الدليل التعريفي بالملتقى
        </p>

        <!-- main code starts here -->
        <div class="row">
            <div class="col py-4 my-4">
                <div class="d-flex justify-content-center">
                    <script src="/assets/js/html5-qrcode.min.js"></script>
                    <div id="qr-reader" style="width:500px"></div>
                    <div id="qr-reader-results"></div>
                    <script>
                        var resultContainer = document.getElementById('qr-reader-results');
                        var lastResult, countResults = 0;

                        function onScanSuccess(decodedText, decodedResult) {
                            if (decodedText !== lastResult) {
                                ++countResults;
                                lastResult = decodedText;
                                // Handle on success condition with the decoded message.
                                console.log(`Scan result ${decodedText}`);
                                console.log(decodedResult);

                                if(null != lastResult && undefined != lastResult && typeof(lastResult) == 'string'){
                                    let type = lastResult[0];
                                    if(type == '0'){
                                        //alert('scanned id: ' + lastResult);
                                        window.location.href = '/details/' + lastResult;
                                    }else if(type == '1'){
                                        //for company jobs
                                        window.location.href = '/jobs/' + lastResult;

                                    }else if(type == '2'){
                                        // for course details
                                        window.location.href = '/ticket-detail/' + lastResult;
                                    }
                                    else {
                                        alert("Could not scan qrcode");
                                    }

                                }
                            }
                        }

                        var html5QrcodeScanner = new Html5QrcodeScanner(
                            "qr-reader", { fps: 10, qrbox: 250 });
                            html5QrcodeScanner.render(onScanSuccess);
                    </script>
                </div>
            </div>
        </div>
        
        
        <br />
        <a style="color: #073969; font-size:35px" href="mailto:fsalzahrani@waqf.org.sa">fsalzahrani@waqf.org.sa</a>

    </div>

</div>