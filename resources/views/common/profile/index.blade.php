@extends("layouts.common")
@section("content")
    <style>
        #new-profile {
            margin-top: 100px;
        }
        .download-app .client-block .content {
            padding-left: 0px;
        }
    </style>


    <section class="about-section-two" id="new-profile">
        <div class="{{--anim-icons--}}">
            <span class="icon icon-shape-3"></span>
        </div>

        <div class="auto-container">
            <div class="row">
                <!-- Content Column -->
                <div class="content-column col-lg-12 col-md-12 col-sm-12 order-2">
                    <div class="inner-column">
                        <div class="sec-title style-two">
                            {{-- <span class="title">পাঠক সমাবেশ</span>--}}
                            {{--  <h2>প্রথম আলোর ২৪তম প্রতিষ্ঠাবার্ষিকী উপলক্ষে পাঠক উৎসব</h2>--}}
                        </div>
                        <div class="row">
                            {{-- <img src="/images/pathok.svg" class="pathok-class" />--}}
                            <div class="details">
                                <p>
                                    প্রিয় পাঠক, প্রথম আলোর ২৪তম প্রতিষ্ঠাবার্ষিকী উপলক্ষে আয়োজিত ‘পাঠক উৎসব’–এ অংশ
                                    নেওয়ার জন্য আন্তরিক ধন্যবাদ। আপনার অংশগ্রহণ পাঠক উৎসবকে করেছে বর্ণিল ও আনন্দমুখর।
                                    উপহার হিসেবে আপনার জন্য রয়েছে ই–প্রথম আলোর ১৫ দিন এবং চরকির ৩ দিনের সাবস্ক্রিপশন।
                                    সাবস্ক্রিপশন অ্যাকটিভ করার শেষ সময় ১২ নভেম্বর ২০২২
                                </p>


                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!--End About Section -->

    <section class="sponsors-section ">
        <div class="auto-container">
            <div class="row">
                <!-- Client Block -->
                <div class="client-block col-lg-6 col-md-12 col-sm-12 wow fadeInUp animated"
                     style="visibility: visible; animation-name: fadeInUp;">
                    <div class="inner-box">
                        <div class="content">
                            <div class="icon-box"><span class="flaticon-team"></span></div>
                            <h4><a href="sponsor-detail.html">Main Sponsor</a></h4>
                            <div class="text">Butty some dodgy chav James Bond Eaton well blower vagabond.!</div>
                            <div class="btn-box">
                                <a href="/chorki" class="theme-btn btn-style-five"><span class="btn-title">সাবস্ক্রিপশনের জন্য ক্লিক করুন </span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Client Block -->
                <div class="client-block col-lg-6 col-md-12 col-sm-12 wow fadeInUp animated" data-wow-delay="400ms"
                     style="visibility: visible; animation-delay: 400ms; animation-name: fadeInUp;">
                    <div class="inner-box">
                        <div class="content">
                            <div class="icon-box"><span class="flaticon-key-1"></span></div>
                            <h4><a href="sponsor-detail.html">Platinum Sponsor</a></h4>
                            <div class="text">Butty some dodgy chav James Bond Eaton well blower vagabond.!</div>
                            <div class="btn-box">
                                <a href="/chorki" class="theme-btn btn-style-five"><span class="btn-title">সাবস্ক্রিপশনের জন্য ক্লিক করুন </span></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </section>
    <!-- Event Info Section -->

    <section class="sponsors-section download-app">
        <div class="auto-container">
            <div class="row">
                <!-- Client Block -->
                <div class="client-block col-lg-6 col-md-12 col-sm-12 wow fadeInUp animated"
                     style="visibility: visible; animation-name: fadeInUp;">
                    <div class="inner-box">
                        <div class="content">
                            <div class="image-logo">
                                <img src="/images/p_alo.png">
                            </div>

                            <div class="btn-box">
                                <a href="/chorki" class="theme-btn btn-style-five"><span class="btn-title">ডাউনলোড করুন </span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Client Block -->
                <div class="client-block col-lg-6 col-md-12 col-sm-12 wow fadeInUp animated" data-wow-delay="400ms"
                     style="visibility: visible; animation-delay: 400ms; animation-name: fadeInUp;">
                    <div class="inner-box">
                        <div class="content">
                            <div class="image-logo">
                                <img class="chorki-logo" src="/images/chorki.png">
                            </div>

                            <div class="btn-box">
                                <a href="/chorki" class="theme-btn btn-style-five"><span class="btn-title">ডাউনলোড করুন </span></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </section>
    <!-- Event Info Section -->
    <section class="event-info-section" id="location">
        <div class="auto-container">
            <div class="row">
                <!-- Info Column -->
                <div class="info-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title style-two">
                            <span class="title">অনুষ্ঠানের স্থান, তারিখ ও সময়</span>
                            {{--  <h2>অনুষ্ঠানের স্থান, তারিখ ও সময় </h2>--}}
                            <ul class="info-list">

                                <li><span class="icon icon_pin_alt"></span>
                                    <h2 style="font-size: 20px"> বাংলা একাডেমি প্রাঙ্গণ, ঢাকা</h2></li>
                                <li><span class="icon icon_clock_alt"></span> ৪ নভেম্বর ২০২২, শুক্রবার সকাল ৮টা থেকে
                                    বিকেল ৫.৩০টা পর্যন্ত
                                </li>
                                {{-- <li><span class="icon icon_clock"></span>সকাল ৮টা থেকে বিকেল ৫.৩০টা পর্যন্ত</li>--}}

                            </ul>
                        </div>
                    </div>
                </div>


                <!-- Map Column -->
                <div class="map-column col-lg-6 col-md-12 col-sm-12">
                    <div class="">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.4866008191398!2d90.39527945120133!3d23.730021195394457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8e8df10a013%3A0x3b53945df2e624cb!2sBangla%20Academy!5e0!3m2!1sen!2sbd!4v1666555755829!5m2!1sen!2sbd"
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>


                    </div>


                </div>


            </div>
        </div>

    </section>
    <!--End Event Info Section -->

@endsection
