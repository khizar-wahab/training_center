@extends('layouts.app')

@section('content')
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

                    

                    <li class="header-ticket nav-item">
                        <a href="#popup_DeptRegister" class="ticket-btn btn ts-image-popup" data-effect="mfp-zoom-in">
                            تسجيل الجهات
                        </a>
                    </li>

                    <li class="header-ticket nav-item">
                        <a href="#popup_register" class="ticket-btn btn ts-image-popup" data-effect="mfp-zoom-in">
                            تسجيل الزوار
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div><!-- container end-->
</header>
<!--/ Header end -->
<section id="Main" class="hero-area centerd-item">
    <div class="banner-item" style="background-image:url(assets/images/hero_area/bannerKau.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="banner-content-wrap text-center">
                        <img class="img" src="assets/images/ALAMEER.png" alt="">
                        <p style="font-size:24px; color: #ffffff">
                            برعاية
                            <br />
                            صاحب السمو الملكي الأمير بدر بن سلطان بن عبدالعزيز
                        </p>
                        <p style="font-size: 22px;color: #b7a68f">نائب أمير منطقة مكة المكرمة</p>
                        <h1 class="banner-title">الملتقى المهني العاشر</h1>
                        <p class="banner-info">بجامعة الملك عبدالعزيز</p>
                        <p style="font-size: 18px;color: #ffffff">الرجال: 12-14 ربيع الثاني 1444 الموافق 06-08 نوفمبر 2022</p>
                        <p style="font-size: 18px;color: #ffffff">السيدات: 15-16 ربيع الثاني 1444 الموافق 09-10 نوفمبر 2022</p>
                        <div class="countdown">
                            <div class="counter-item">
                                <i class="icon icon-ring-1Asset-1"></i>
                                <span class="days">00</span>
                                <div class="smalltext">يوم</div>

                            </div>
                            <div class="counter-item">
                                <i class="icon icon-ring-4Asset-3"></i>
                                <span class="hours">00</span>
                                <div class="smalltext">ساعة</div>
                            </div>
                            <div class="counter-item">
                                <i class="icon icon-ring-3Asset-2"></i>
                                <span class="minutes">00</span>
                                <div class="smalltext">دقيقة</div>
                            </div>
                            <div class="counter-item">
                                <i class="icon icon-ring-4Asset-3"></i>
                                <span class="seconds">00</span>
                                <div class="smalltext">ثانية</div>
                            </div>
                        </div>
                        <!-- Countdown end -->
                        
                    </div>

                </div>

            </div>
        </div>

    </div>

</section>

<section class="ts-intro-item section-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="300ms">

                <img class="img-fluid" src="assets/images/vision.jpg" alt="">

            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="300ms">
                <div class="intro-left-content">
         

                    <p>
                        انطلاقًا من رؤية المملكة الطموحة 2030، وما انبثق عنها من برامج نوعية، يأتي برنامج تنمية القدرات البشرية كأحد أهم البرامج المستحدثة الهادفة إلى تطوير قدرات الشباب السعودي التي تُمكّنه من المشاركة في التنمية الاقتصادية والاجتماعية والثقافية، والمنافسة من خلال تعزيز القيم وتنمية المعارف، وتطوير مهارات المستقبل، واغتنام الفرص على المستويين المحلي والعالمي عبر منظومة تعليمية مرتبطة باحتياجات سوق العمل. كما يهدف البرنامج إلى تنمية وتمكين الخريجين وروّاد الأعمال وأصحاب المشاريع الصغيرة للانتقال إلى مربع الشركات الكبرى، بهدف الإسهـــام في تنويع الاقتصاد وتوليد فرص العمل للمواطنين.
                    </p>

                </div>
            </div><!-- col end-->
        </div>

    </div><!-- container end-->
   
</section>


<!-- ts intro end-->




<!-- ts sponsors start-->
<section class="ts-intro-sponsors" style="background-color: #f9fafc">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-title">

                    المنظمون
                </h2><!-- section title end-->
            </div><!-- col end-->
        </div><!-- row end-->
        <div class="row">
            <div class="col-lg-12">
                <div class="sponsors-logo text-center">
                    <a target="_blank" href="https://studentaffairs.kau.edu.sa/Pages-271777.aspx"><img src="assets/images/sponsors/sponsor2.png" alt=""></a>
                    <a target="_blank" href="https://waqf.kau.edu.sa/Default-808-AR"><img src="assets/images/sponsors/sponsor1.png" alt=""></a>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Slider main container -->

    
<section id="Contact" class="ts-map-direction wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="400ms">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <h2 class="column-title">

                    للتواصل
                </h2>

                <div class="ts-map-tabs">
                    <!-- Tab panes -->
                    <div class="tab-content direction-tabs">
                        <div role="tabpanel" class="tab-pane active" id="profile">
                            <div class="direction-tabs-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="contact-info-box">
                                            <p><strong>جوال:</strong> <a href="tel:0505565519">0505565519</a></p>
                                            <p><strong>جوال:</strong> <a href="tel:0501881731">0501881731</a></p>
                                            <p><strong>هاتف: </strong> <a href="tel:0126400000">0126400000</a> <strong>هاتف: </strong> 60362</p>
                                            <p><strong>البريد الإلكتروني: </strong><a href="mailto:dsa.alumni@kau.edu.sa">dsa.alumni@kau.edu.sa</a></p>
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="contact-info-box">
                                            <br />
                                            <h3>موقع الملتقى </h3>
                                            <p>جامعة الملك عبدالعزيز - مركز الملك فيصل للمؤتمرات</p>

                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="contact-info-box">
                                            <img src="~/assets/images/qr.png" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="ts-map">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d14849.322267367901!2d39.256248470292455!3d21.49476817196308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x15c3cdd75c3ba303%3A0x59e67edcd336802b!2z2YXYsdmD2LIg2KfZhNmF2YTZgyDZgdmK2LXZhCDZhNmE2YXYpNiq2YXYsdin2KrigK0!3m2!1d21.4925143!2d39.2415987!5e0!3m2!1sar!2ssa!4v1660549856740!5m2!1sar!2ssa"></iframe>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>
<div id="popup_register" class="container ts-event-popup mfp-hide">
    <div class="register-form">
        <form action="{{ route('user.register') }}" method="post">
            @csrf
            <input type="hidden" name="modal" value="popup_register">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>
            <button type="submit" class="btn btn-success">Register</button>
        </form>
    </div>
</div>

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


<!-- ts footer area start-->
<div class="footer-area">

    <!-- ts-book-seat start-->
    <section class="ts-book-seat" style="background-image: url(assets/images/book_seat_img.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="book-seat-content text-center mb-70">
                        <h1 class="section-title white">

                            للتسجيل في الملتقى المهني العاشر
                        </h1>
                        <a href="#popup_DeptRegister" class="ticket-btn btn ts-image-popup" data-effect="mfp-zoom-in">تسجيل الجهات</a>
                    </div><!-- book seat end-->
                </div><!-- col end-->

            </div><!-- row end-->

        </div><!-- container end-->
    </section>
    <!-- book seat  end-->
    <!-- footer start-->
    <footer class="ts-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="ts-footer-social text-center mb-30">
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>

                    <div class="copyright-text text-center">
                        <p>
                            جميع الحقوق محفوظة لوكالة عمادة شؤون الطلاب لشؤون الخريجين
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end-->
</div>

<script>
    @if (old('modal') === 'popup_register')
        document.querySelector('[href=#popup_register]').click();
    @endif
</script>
@endsection