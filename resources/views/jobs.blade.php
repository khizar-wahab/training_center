@extends('layouts.app')

@section('content')

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


<div class="container">
    <div class="row">
        <div class="col-12">
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="row g-0 about-bg rounded overflow-hidden">
                            <div class="col-9 text-start">
                                <img class="img-fluid img-thumbnail w-100" src="https://picsum.photos/700">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4">We Help To Get The Best Job And Find A Talent</h1>
                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                        <p>Tempor erat elitr rebum at clita</p>

                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Jobs Start -->
        <div class="container-xxl py-3">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">

                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded mx-3" src="https://picsum.photos/80" alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">Software Engineer</h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary mx-2"></i>New York, USA</span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary mx-2"></i>Full Time</span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary mx-2"></i>$123 - $456</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            
                                            <a class="btn btn-primary" href="">Apply Now</a>
                                        </div>
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary mx-2"></i>Date Line: 01 Jan, 2045</small>
                                    </div>
                                </div>
                            </div>
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded mx-3" src="https://picsum.photos/80" alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">Marketing Manager</h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary mx-2"></i>New York, USA</span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary mx-2"></i>Full Time</span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary mx-2"></i>$123 - $456</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            
                                            <a class="btn btn-primary" href="">Apply Now</a>
                                        </div>
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary mx-2"></i>Date Line: 01 Jan, 2045</small>
                                    </div>
                                </div>
                            </div>
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded mx-3" src="https://picsum.photos/80" alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">Product Designer</h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary mx-2"></i>New York, USA</span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary mx-2"></i>Full Time</span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary mx-2"></i>$123 - $456</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            
                                            <a class="btn btn-primary" href="">Apply Now</a>
                                        </div>
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary mx-2"></i>Date Line: 01 Jan, 2045</small>
                                    </div>
                                </div>
                            </div>
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded mx-3" src="https://picsum.photos/80" alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">Creative Director</h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary mx-2"></i>New York, USA</span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary mx-2"></i>Full Time</span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary mx-2"></i>$123 - $456</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            
                                            <a class="btn btn-primary" href="">Apply Now</a>
                                        </div>
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary mx-2"></i>Date Line: 01 Jan, 2045</small>
                                    </div>
                                </div>
                            </div>
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded mx-3" src="https://picsum.photos/80" alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">Wordpress Developer</h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary mx-2"></i>New York, USA</span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary mx-2"></i>Full Time</span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary mx-2"></i>$123 - $456</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            
                                            <a class="btn btn-primary" href="">Apply Now</a>
                                        </div>
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary mx-2"></i>Date Line: 01 Jan, 2045</small>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jobs End -->
        </div>
    </div>
</div>
@endsection