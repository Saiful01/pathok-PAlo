@extends("layouts.common2")
@section("content")
    <style>


        .download-app .client-block .content {
            padding-left: 0px;
        }

        .news-section {

            padding: 0px 0 50px;
        }

        .sponsors-section {

            padding: 50px 0 50px;
        }

        .gallery-section {

            padding: 0px 0 50px;
        }

        .client-block .content {
            text-align: center;
            padding-left: 0px;
        }

        .coupon {
            padding: 15px;
            background: #cbc6c6;
            font-size: 43px;
            line-height: 40px;
            width: 100%;
            text-align: center;
            color: black;
            cursor: pointer;
        }

    </style>


    <section class="about-section-two" id="new-profile">
        <div class="{{--anim-icons--}}">
            <span class="icon icon-shape-3"></span>
        </div>

        <div class="auto-container">
            <div class="row">
                <!-- Content Column -->
                <div class="content-column col-lg-8 col-md-12 col-sm-12 order-2 mx-auto">
                    <div class="inner-column">
                        <div class="sec-title style-two">
                            {{-- <span class="title">পাঠক সমাবেশ</span>--}}
                            {{--  <h2>প্রথম আলোর ২৪তম প্রতিষ্ঠাবার্ষিকী উপলক্ষে পাঠক উৎসব</h2>--}}
                        </div>
                        <div class="row">
                            {{-- <img src="/images/pathok.svg" class="pathok-class" />--}}
                            <div class="details">
                                <p>
                                    প্রিয় {{$guest->name}}, প্রথম আলোর ২৪তম প্রতিষ্ঠাবার্ষিকী উপলক্ষে আয়োজিত ‘পাঠক উৎসব’–এ অংশ
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


    <section class="about-section-two" id="about" style="background: #fff;">
        <div class="">
            <span class="icon icon-shape-3"></span>
        </div>
        <div class="auto-container">
            <div class="row">

                <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
                    <div class="inner-column">
                        <div class="sec-title style-two"></div>
                        <div class="row">
                            <div class="sec-title text-center style-two">
                                <span class="title"> ই–পেপার </span>
                                <h2> ‘প্রোমো কোড’</h2>
                            </div>

                            <div class="coupon" onclick="copyToClipBoard('{{$prothomalo_coupon}}')">
                                <span id="palo_code">{{$prothomalo_coupon}}</span>
                            </div>

                            <div class="details">
                                <h4> যেভাবে ‘প্রোমো কোড’ ব্যবহার করবেন</h4>
                                <ul class="list-style-two">
                                    <li> ১.কার্ডে থাকে QR কোডটি স্ক্যান করে Login/রেজিস্ট্রেশন সম্পন্ন করুন।</li>
                                    <li> ২. Have a promo code ঘরে প্রাপ্ত প্রোমো কোডটি টাইপ করে Apply বাটনে ক্লিক
                                        করুন।
                                    </li>
                                    <li> ৩.এরপর Pay বাটনে ক্লিক করে উপভোগ করুন প্রথম আলো ই–পেপার।</li>
                                    <li> ৫. ই–পেপারসংক্রান্ত যেকোনো প্রয়োজনে কল করুন ০১৭০৮ ৪১১৯৯৭ (সকাল ১০টা– সন্ধ্যা
                                        ৬টা)
                                    </li>
                                    <li> ৬. কার্ডটি ব্যবহারের শেষ তারিখ ১২ নভেম্বর ২০২২।</li>
                                </ul>

                                <p>প্লে-স্টোর বা অ্যাপল স্টোর থেকে <a
                                        href="https://play.google.com/store/apps/details?id=com.mcc.prothomalo&hl=en&gl=US">PROTHOM
                                        ALO</a> অ্যাপ <a
                                        href="https://play.google.com/store/apps/details?id=com.prothomalo&hl=en&gl=US">ডাউনলোড</a>
                                    করুন।</p>

                                <div class="btn-box">
                                    <a href="https://epaper.prothomalo.com/Home/Checkout?rateid=102&utm_source=subscription_card&utm_medium=qrcode&utm_campaign=15_days_offer&utm_id=102"
                                       target="_blank" class="theme-btn btn-style-three"><span class="">সাবস্ক্রিপশনের জন্য ক্লিক করুন </span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
                    <div class="inner-column">
                        <div class="sec-title style-two"></div>
                        <div class="row">

                            <div class="sec-title text-center style-two">
                                <span class="title"> চরকি </span>
                                <h2> ‘প্রোমো কোড’</h2>
                            </div>

                            <div class="coupon" onclick="copyToClipBoard('{{$chorki_coupon}}')">
                                <span id="chorki_id">{{$chorki_coupon}}</span>
                            </div>

                            <div class="details">
                                <h4> যেভাবে ‘প্রোমো কোড’ ব্যবহার করবেন</h4>
                                <ul class="list-style-two">

                                    <li> ধাপ ১: <a href="https://www.chorki.com/redeem" target="_blank">https://www.chorki.com/redeem</a>
                                        অথবা <a href="https://www.chorki.com/redeem" target="_blank">CHORKI</a> মোবাইল
                                        অ্যান্ড্রয়েড অ্যাপে লগইন করে মেনু থেকে 'রিডিম' / 'রিডিম কোড' অপশনে ক্লিক করুন।
                                    </li>

                                    <li> ধাপ ২: টেক্সট বক্সে আপনার কোডটি লিখুন এবং সেটি যাচাই করতে VALIDATE বাটনে ক্লিক
                                        করুন।
                                    </li>

                                    <li> ধাপ ৩: কোডটি সক্রিয় করতে REDEEM বাটনে ক্লিক করুন।</li>

                                    <li> ধাপ ৪: উপভোগ করুন</li>

                                    <li> দ্রষ্টব্য: অ্যাপল ব্যবহারকারীরা ব্রাউজার থেকে কোডটি সক্রিয় করুন।</li>

                                    <li> ভিজিট করুন CHORKI.COM</li>

                                </ul>


                                <p>

                                    প্লে-স্টোর বা অ্যাপল স্টোর থেকে <a
                                        href="https://play.google.com/store/apps/details?id=com.prothomalo&hl=en&gl=US">CHORKI</a>
                                    অ্যাপ <a
                                        href="https://play.google.com/store/apps/details?id=com.prothomalo&hl=en&gl=US">ডাউনলোড</a>
                                    করুন।
                                    আপনার যেকোনো অনুসন্ধানের জন্য যোগাযোগ করুন চরকির ফেসবুক ম্যাসেঞ্জার, চরকি অ্যাপ বা
                                    ওয়েবসাইটের চ্যাটবক্স অথবা মেইল করুন support@chorki.com-এ।
                                    থাকুন চরকির সঙ্গে
                                    থাকুন 'ফিল্ম, ফান, ফুর্তি'তে!
                                </p>
                                <div class="btn-box">
                                    <a href="https://www.chorki.com/redeem" target="_blank"
                                       class="theme-btn btn-style-three"><span
                                            class="">সাবস্ক্রিপশনের জন্য ক্লিক করুন </span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    {{--
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
                                    <a href="/chorki" class="theme-btn btn-style-three"><span
                                            class="">ডাউনলোড করুন </span></a>
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
                                    <a href="/chorki" class="theme-btn btn-style-three"><span
                                            class="">ডাউনলোড করুন </span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </section>

    --}}

    @if(count($posts)>0)
    <section class="news-section" style="    padding: 50px 0 50px;
    background: #ebe7e7;">
        <div class="auto-container">
            <div class="sec-title style-two text-center">
                <h2>ইভেন্ট সম্পর্কিত খবর</h2>
            </div>

            <div class="row">
                <!-- News Block -->
                @foreach($posts as $res)
                    <div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp animated"
                         style="visibility: visible; animation-name: fadeInUp;">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href="{{$res->link}}"><img src="{{$res->featured_image}}"
                                                                                    alt=""></a></figure>
                            </div>
                            <div class="lower-content">

                                <h3><a target="_blank" href="{{$res->link}}">{{$res->post_title}}</a></h3>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    @endif

    @if(count($images)>0)
        <section class="gallery-section" style="">
            <div class="auto-container">
                <div class="sec-title text-center style-two">
                    <h2>ইভেন্ট এর ছবি</h2>
                </div>
                <div class="outer-box clearfix">
                    <!-- Gallery Item -->
                    @foreach($images as $res)
                        <div class="gallery-item width-30 wow fadeIn animated"
                             style="visibility: visible; animation-name: fadeIn;">
                            <div class="inner">
                                <div class="image-layer" style="background-image: url({{$res->featured_image}});"></div>
                                <div class="image-box">
                                    <figure class="image"><img src="{{$res->featured_image}}" alt=""></figure>
                                </div>
                                <div class="overlay-box">
                                    <a href="{{$res->featured_image}}" class="lightbox-image"
                                       data-fancybox="gallery"><span
                                            class="icon icon_plus"></span></a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </section>
    @endif


    @if(count($videos)>0)
        <section class="news-section">
            <div class="auto-container">
                <div class="sec-title style-two text-center">
                    <h2>ভিডিও</h2>
                </div>

                <div class="row">
                    @foreach($videos as $res)
                        <div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp animated"
                             style="visibility: visible; animation-name: fadeInUp;">
                            <div class="inner-box">
                                <iframe class="w-100" height="315" src="https://www.youtube.com/embed/{{$res->link}}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </section>
    @endif

    <!-- Event Info Section -->
    <section class="event-info-section" id="location">
        <div class="auto-container">
            <div class="row">
                <!-- Info Column -->
                <div class="info-column col-lg-8 mx-auto col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title style-two">
                              <h2>ভি.আর এক্সপেরিয়েন্স নিতে এই <a href="https://pathokutsob.pro/" target="_blank">লিংকে</a>  যান </h2>
                            <span class="title"></span>

                        </div>
                    </div>
                </div>


            </div>
        </div>

    </section>
    <!--End Event Info Section -->


    <script>

        function copyToClipBoard(qr_code) {
            navigator.clipboard.writeText(qr_code);
            toastr.success('Copied to clipboard', 'Copied')

        }

    </script>
@endsection
