@extends("layouts.common")
@section("content")

    <!-- Banner Conference -->
    <section class="banner-conference">

        <!-- Shape Layers -->
        <div class="shape-layers">
            <div class="shape-1" style="background-image: url(/common/images/main-slider/shape-1.png);"></div>
            <div class="shape-2" style="background-image: url(/common/images/main-slider/shape-2.png);"></div>
        </div>

        <!-- Parallax Icons -->
        <div class="parallax-scene parallax-scene-1 anim-icons">
            <span data-depth="0.20" class="parallax-layer icon icon-dots-2"></span>
            <span data-depth="0.80" class="parallax-layer icon icon-speaker-3"></span>
            <span data-depth="0.30" class="parallax-layer icon twist-line-4"></span>
            <span data-depth="0.40" class="parallax-layer icon icon-square"></span>
            <span data-depth="0.20" class="parallax-layer icon icon-circle-3"></span>
            <span data-depth="0.40" class="parallax-layer icon icon-cross"></span>
        </div>

        <div class="auto-container">
            <div class="row">
                <!-- Contant Column -->
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <span class="title">পাঠক উৎসব </span>
                        <h2>আসুন,<br>সারা দিন আনন্দে ভাসুন</h2>
                        <span class="desktop-view">প্রথম আলোর ২৪তম প্রতিষ্ঠাবার্ষিকী উপলক্ষে পাঠকদের সঙ্গে কর্মীদের<br>সরাসরি অভিজ্ঞতা বিনিময়ের জন্য এই আয়োজন। </span>
                        <span class="mobile-view">প্রথম আলোর ২৪তম প্রতিষ্ঠাবার্ষিকী উপলক্ষে পাঠকদের সঙ্গে কর্মীদের সরাসরি অভিজ্ঞতা বিনিময়ের জন্য এই আয়োজন। </span>

                        <ul class="conference-info clearfix">
                            <li><span class="icon icon_clock_alt"></span> ৪ নভেম্বর ২০২২, শুক্রবার সকাল ৮টা থেকে বিকেল
                                ৫.৩০টা পর্যন্ত
                            </li>


                            {{-- <li><span class="icon icon_clock"></span>সকাল ৮টা থেকে বিকেল ৫.৩০টা পর্যন্ত</li>--}}
                            <li><span class="icon icon_pin_alt"></span> বাংলা একাডেমি, ঢাকা</li>
                        </ul>

                        <div class="btn-box">
                            <a href="/get-ticket" class="theme-btn btn-style-three">অংশ নি‌তে নিবন্ধন করুন</a>
                        </div>

                    </div>
                </div>

                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="image-box wow fadeInRight" data-wow-delay="400ms">
                        {{--  <figure class="image"><img src="/common/images/main-slider/content-img-1.png" alt=""></figure> --}}
                        <figure class="image"><img src="/images/1.jpeg" class="right-img"
                                                   style="    border-radius: 15px;" alt=""></figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Banner Section -->

    <!-- Countdown Section Two -->
    {{--    <section class="countdown-section-two" style="background-image: url(/common/images/background/1.jpg);">
            <div class="auto-container">
                <div class="sec-title light text-center style-two">
                    <span class="title">অংশ নিন </span>
                    <div class="btn-box">
                        <a href="/get-ticket" class="theme-btn btn-style-three">রেজিষ্ট্রেশন করুন </a>
                    </div>
                </div>

            </div>
        </section>--}}

    <!-- About Section Two -->
    <section class="about-section-two">
        <div class="{{--anim-icons--}}">
            <span class="icon icon-shape-3"></span>
        </div>

        <div class="auto-container" id="about">
            <div class="row">
                <!-- Content Column -->
                <div class="content-column col-lg-7 col-md-12 col-sm-12 order-2">
                    <div class="inner-column">
                        <div class="sec-title style-two">
                            {{-- <span class="title">পাঠক সমাবেশ</span>--}}
                            {{--  <h2>প্রথম আলোর ২৪তম প্রতিষ্ঠাবার্ষিকী উপলক্ষে পাঠক উৎসব</h2>--}}
                        </div>
                        <div class="row">
                            {{-- <img src="/images/pathok.svg" class="pathok-class" />--}}
                            <div class="details">
                               {{-- <p>
                                    প্রথম আলোর ২৪তম প্রতিষ্ঠাবার্ষিকী উপলক্ষে পাঠকদের সঙ্গে কর্মীদের সরাসরি অভিজ্ঞতা
                                    বিনিময়ের জন্য এই আয়োজন।
                                </p>--}}

                                <h4> নিবন্ধন নিয়মাবলি:</h4>
                                <ul class="list-style-two">
                                    <li> আগত পাঠকদের অনুষ্ঠানে অংশগ্রহণের জন্য এই ওয়েবসাইটে <a href="/get-ticket">প্রাক্-নিবন্ধন</a> করতে হবে।</li>
                                    <li>১২ বছরের কম বয়সী শিশু পিতা বা মাতার সঙ্গে প্রবেশ করতে পারবে, আলাদা নিবন্ধন করতে হবে না।</li>
                                    <li>
                                        নিবন্ধনের পর একটি নিবন্ধন নম্বর, একটি কিউআর কোডসহ প্রবেশপত্র পাবেন। এটির প্রিন্টআউট নিয়ে আসতে হবে অথবা মোবাইল ফোনের স্ক্রিনে দেখিয়ে প্রবেশ করতে পারবেন।
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-column col-lg-5 col-md-12 col-sm-12 order-2">
                    <div class="inner-column">
                        <div class="sec-title style-two">
                            <span class="title">অনুষ্ঠান প্রাঙ্গণে যা যা থাকবে</span>
                            {{-- <h2>প্রথম আলোর ২৪তম প্রতিষ্ঠাবার্ষিকী উপলক্ষে পাঠক উৎসব</h2>--}}
                        </div>

                        <div class="row">

                            <div class="details">
                                <ul class="list-style-two">

                                    <li>গোল্লাছুট কর্নার</li>
                                    <li>ম্যাগাজিন জোন</li>
                                    <li>ফিচার জোন</li>
                                    <li>সম্পাদকীয়, বার্তা ও ক্রীড়াকক্ষ</li>
                                    <li>ডিজিটাল জোন</li>
                                    <li>বন্ধুসভা কর্নার</li>
                                    <li>প্রথম আলো ট্রাস্ট</li>
                                    <li>চরকির প্রদর্শনী</li>
                                    <li>প্রথমা প্রকাশন</li>
                                    <li>মূলমঞ্চ</li>
                                    <li>পাঁচমিশালিমঞ্চ</li>


                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End About Section -->

    @include('common.home.schedule')
    <!-- Event Info Section -->
    <section class="event-info-section" id="location">
        <div class="auto-container">
            <div class="row">
                <!-- Info Column -->
                <div class="info-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title style-two">
                            {{--   <span class="title">ভেন্যু</span>--}}
                            <h2>অনুষ্ঠানের স্থান, তারিখ ও সময় </h2>
                            <ul class="info-list">

                                <li><span class="icon icon_pin_alt"></span> বাংলা একাডেমি প্রাঙ্গণ, ঢাকা</li>
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
                    <div class="map-outer wow fadeIn">
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
