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

        .btn-style-four {
            border: 1px solid #ef4023;
        }

        @media (max-width: 480px) {
            .page-title {
                padding: 20px 0 0px;
            }
        }
    </style>

    <section class="page-title" style="background-image:url(/common/images/background/5.jpg);">
        <div class="shape-layers">
            <span class="shape-layer-1"></span>
            <span class="shape-layer-2"></span>
        </div>
        <div class="auto-container">
            <h1>প্রাক-নিবন্ধন</h1>
        </div>
    </section>

    <section class="contact-form-section">
        <div class="auto-container">
            <div class="sec-title style-two">
                {{-- <span class="title">অংশ নিতে রেজিস্ট্রেশন করুন </span>--}}
                <h2> নিবন্ধন করতে নিচের তথ্য গুলো পূরণ করে সাবমিট করুন</h2>
            </div>
            <div class="row">
                <div class="form-column col-lg-6 col-md-12 col-sm-12 mx-auto">
                    <div class="inner-column">
                        <div class="contact-form default-form">
                            <form method="post" action="/get-ticket/save"
                                  id="contact-form">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="পুরো নাম*" required="" value="{{ old('name') }}">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="phone_number" placeholder="মোবাইল নম্বর (১১ ডিজিট ইংরেজিতে )*"
                                           id="phone_number" required="" onchange="checkNumber()" value="{{ old('phone_number') }}">
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email" placeholder="ই-মেইল" required="" value="{{ old('email') }}">
                                </div>

                                <div class="form-group">
                                    <select class="form-select" name="age" id="age">
                                        <option value="">বয়স*</option>
                                        <option>১২-১৮</option>
                                        <option>১৯-২৫</option>
                                        <option>২৬-৩৫</option>
                                        <option>৩৬-৪৫</option>
                                        <option>৪৫ এবং তদুর্ধ</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select class="form-select" name="gender" id="gender">
                                        <option value="">লিঙ্গ*</option>
                                        <option>পুরুষ</option>
                                        <option>নারী</option>
                                        <option>অন্যান্য</option>
                                    </select>
                                </div>

                                <div class="form-group ">
                                    <button class="theme-btn btn-style-three" type="submit">সাবমিট</button>
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

        function checkNumber() {
            let val = document.getElementById("phone_number").value;
            document.getElementById("phone_number").value = replaceNumbers(val);
        }


    </script>

@endsection
