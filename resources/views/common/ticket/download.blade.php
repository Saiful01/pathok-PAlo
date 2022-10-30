@extends("layouts.common")
@section("content")

    <style>
        /* .main-menu .navigation > li > a {
             color: #fff !important;
         }*/

        .main-header {
            background: #fff;
            max-height: 100px;
        }

        .page-title {
            padding: 120px 0 0px;
        }

        .page-title h1 {
            font-size: 30px !important;
        }

        .sec-title h2 {
            font-size: 18px;
        }

        .default-form .form-group input[type="text"], .default-form .form-group input[type="email"], .default-form .form-group input[type="tel"], .default-form .form-group input[type="url"], .default-form .form-group textarea, .default-form .form-group select {
            font-size: 16px;
            line-height: 0px;
            height: 50px;
            padding: 15px 20px;
        }
        .btn-style-three {
            padding: 5px 25px !important;
        }
        @media (max-width: 480px) {
            .page-title {
                padding: 20px 0 0px;
            }
        }
        .btn-style-four {
            border: 1px solid #ef4023;
        }
    </style>

    <section class="page-title" style="background-image:url(/common/images/background/5.jpg);">
        <div class="shape-layers">
            <span class="shape-layer-1"></span>
            <span class="shape-layer-2"></span>
        </div>
        <div class="auto-container">
            <h1>টিকেট ডাউনলোড</h1>
        </div>
    </section>

    <section class="contact-form-section">
        <div class="auto-container">
            <div class="sec-title style-two">
                {{-- <span class="title">অংশ নিতে রেজিস্ট্রেশন করুন </span>--}}
                <h2> পূর্বে রেজিস্ট্রেশন করা থাকলে ফোন নাম্বার দিয়ে টিকেট ডাউনলোড করুন। </h2>
            </div>
            <div class="row">
                <div class="form-column col-lg-4 col-md-12 col-sm-12 mx-auto">
                    <div class="inner-column">
                        <div class="contact-form default-form ">
                            <form method="post" action="/ticket-download"
                                  id="contact-form">
                                @csrf

                                <div class="form-group">
                                    <input type="text" name="phone_number" placeholder="মোবাইল নম্বর (ইংলিশ)*"  id="phone_number" required="" onchange="checkNumber()">
                                    <input name="name" value="Dummy Name" type="hidden">
                                </div>
                                <div class="form-group ">
                                    <button class="theme-btn btn-style-three w-100" type="submit">ডাউনলোড</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>

        var numbers = {
            '০': 0,
            '১': 1,
            '২': 2,
            '৩': 3,
            '৪': 4,
            '৫': 5,
            '৬': 6,
            '৭': 7,
            '৮': 8,
            '৯': 9
        };

        function replaceNumbers(input) {
            var output = [];
            for (var i = 0; i < input.length; ++i) {
                if (numbers.hasOwnProperty(input[i])) {
                    output.push(numbers[input[i]]);
                } else {
                    output.push(input[i]);
                }
            }
            return output.join('');
        }

        function checkNumber(){
            let val=document.getElementById("phone_number").value;
            document.getElementById("phone_number").value=replaceNumbers(val);
        }



    </script>

@endsection
