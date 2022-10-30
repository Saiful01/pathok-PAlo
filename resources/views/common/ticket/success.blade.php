@extends("layouts.common")
@section("content")

    <style>
        .main-header {
            background: #fff;
        }

        .error-section {
            position: relative;
            text-align: center;
            padding: 145px 0px 75px;
            background: #f6f6f6;
        }

        .ticket-area {
            background: #FEFEF2;
            border: 1px solid #ededed;
            width: 795px;
            height: auto;
            padding: 30px 50px;
            margin-top: 10px;
        }

        th {
            text-align: inherit;
            padding-right: 15px;
        }

        .btn-style-four {
            color: #ffffff;
            background-color: #EF4023;
        }

        body {
            font-size: 16px;
            line-height: 26px;
            color: #3f4161;
            font-weight: 400;
        }

        .list-style-two li {
            padding-left: 15px;
        }

        tr {
            font-size: 20px;
            line-height: 25px;
        }

        .pr-15 {
            padding-right: 15px;
        }

        .regenrate {
            cursor: pointer;
            position: relative;
            padding-left: 10px;
            background: none;
            color: #ef4023;
            bottom: 15px;
        }

        .error-section {
            padding: 130px 0px 75px;
        }

        .btn-style-six {
            padding: 5px 25px;
        }

        .btn-style-four {
            border: 1px solid #ef4023;
        }

        @media (max-width: 480px) {
            .regenrate {
                cursor: pointer;
                position: relative;
                padding-left: 10px;
                background: none;
                color: #ef4023;
                bottom: 15px;
            }

            .error-section {
                padding: 0px 0px 75px;
            }

            .btn-style-six {
                padding: 5px 25px;
            }
        }

        /*svg{
            border: 1px solid #f4f4f4;
            padding: 7px;
            background: white;
            border-radius: 5px;
        }
*/
        #loading {
            position: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0.7;
            background-color: #fff;
            z-index: 99;
        }

        .loader {
            border: 7px solid #f3f3f3;
            border-radius: 50%;
            border-top: 7px solid #ef4023;
            width: 60px;
            height: 60px;
            -webkit-animation: spin 2s linear infinite; /* Safari */
            animation: spin 2s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        .gs li {
            margin-left: 15px;
            font-size: 17px;
            color: #494646;
        }

    </style>

    @if($guest->ticket==null)
        <div id="loading">
            <div class="loader"></div>
        </div>
    @endif

    <section class="error-section">
        <div class="auto-container">


            {{--<h4>আপনার টিকেট ডাউনলোড করুন </h4>--}}
            {{--<div class="text">আপনার টিকেট ডাউনলোড করুন</div>--}}
            {{-- <div class="mobile-view">
                 @if($guest->ticket!=null)
                     <a href="/{{$guest['ticket']}}" class="theme-btn btn-style-six mt-5" download
                        id="download"><span class="icon icon_download"></span> ডাউনলোড</a>
                 @endif

                 <button type="button" class="regenrate" onclick="regenerate()">রিফ্রেশ</button>
             </div>--}}

            <div class="col-md-12 mx-auto" style="    overflow-x: scroll;
    overflow-y: auto;">

                <div class="row">
                    <div class="col-md-9 mx-auto">
                       {{-- <p class="mt-2">অনুষ্ঠানস্থলে প্রবেশের সময় ই–কার্ডটির প্রিন্ট আউট নিয়ে আসতে হবে অথবা মোবাইল ফোনের স্ক্রিনে দেখিয়ে
                            প্রবেশ করতে হবে। ই–কার্ডটি আপনার ইমেইলে পাঠিয়ে দেওয়া হয়েছে

                            <?PHP

                            $ticket = "/ticket/" . $guest->qr_code . ".jpeg";
                            ?>
                            <span id="download_ticket"> অথবা এখান থেকে <a
                                    href="{{$ticket}}" download id="download"><span
                                        class="icon icon_download"></span> ডাউনলোড</a> করতে
                            পারেন</span>


                            ।</p>--}}


                        <p class="mt-2">অনুষ্ঠানস্থলে প্রবেশের সময় কিউআর কোডসহ প্রবেশপত্রটি প্রিন্ট আউট নিয়ে আসতে হবে অথবা মোবাইল ফোনের স্ক্রিনে দেখিয়ে প্রবেশ করতে হবে।

                            <br>
                            প্রবেশপত্রটি
                            <?PHP
                            $ticket = "/ticket/" . $guest->qr_code . ".jpeg";
                            ?>
                            <span id="download_ticket"> এখান থেকে <a
                                    href="{{$ticket}}" download id="download"><span
                                        class="icon icon_download"></span> ডাউনলোড</a> করুন</span>।</p>
                    </div>
                </div>

                <div class="ticket-area mx-auto" id="ticket_area">
                    <div class="row d-inline-flex">
                        <center>
                            <img src="/images/p_alo.png" class="mb-4" style="height: 35px"/>
                        </center>
                    </div>

                    <div class="row">
                        <div class="col-md-9 mx-auto">

                            <div class="row">
                                <div class="col-8 text-left">
                                    <img src="/images/mnemonic.png" style="height: 120px"/>

                                    <ul class="text-left">
                                        <li><span class="icon icon_pin_alt"></span> বাংলা একাডেমি প্রাঙ্গণ, ঢাকা</li>
                                        <li><span class="icon icon_calendar"></span> ৪ নভেম্বর ২০২২,</li>
                                        <li><span class="icon icon_clock_alt"></span> শুক্রবার সকাল ৮টা থেকে বিকেল
                                            ৫.৩০টা পর্যন্ত
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-4">
                                    <p class=""
                                       style="text-align: right"> {!! QrCode::size(140)->generate($qr_code); !!}</p>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row mt-3" style="margin-left: 30px;">

                        <table class="text-start text-left">
                            <tr>
                                <td class="pr-15">নাম</td>
                                <td class="pl-15"> : {{$guest->name}}</td>
                            </tr>
                            <tr>
                                <td class="pr-15">ফোন নাম্বার</td>
                                <td class="pl-15"> : {{$guest->phone_number}}</td>
                            </tr>
                            <tr>
                                <td class="pr-15">ই-মেইল</td>
                                <td class="pl-15"> : {{$guest->email}}</td>
                            </tr>
                            <tr>
                                <td class="pr-15">বয়স</td>
                                <td class="pl-15"> : {{$guest->age}}</td>
                            </tr>
                            <tr>
                                <td class="pr-15">লিঙ্গ</td>
                                <td class="pl-15"> : {{$guest->gender}}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="row mt-3" style="margin-left: 30px;">
                        <ul class="list-style-two text-left">
                            <li>অনুষ্ঠানস্থলে প্রবেশের সময় ই–কার্ডটির প্রিন্ট আউট নিয়ে আসতে হবে অথবা মোবাইল ফোনের
                                স্ক্রিনে দেখিয়ে প্রবেশ করতে হবে।
                            </li>
                            <li>পার্কিংয়ের কোনো ব্যবস্থা থাকবে না।</li>

                        </ul>
                    </div>
                    <div class="row">
                        <img src="/images/art.png"/>
                    </div>

                </div>

            </div>

            {{--<div class="desktop-view" id="desktop">
                @if($guest->ticket!=null)
                    <a href="/{{$guest['ticket']}}" class="theme-btn btn-style-six mt-5" download
                       id="download"><span class="icon icon_download"></span> ডাউনলোড</a>
                @endif

                <button type="button" class="regenrate" onclick="regenerate()">রিফ্রেশ</button>
            </div>--}}
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script>

        function doCapture() {
            window.scrollTo(0, 0);
            html2canvas(document.getElementById("ticket_area")).then(function (canvas) {

                // Create an AJAX object
                var ajax = new XMLHttpRequest();
                // Setting method, server file name, and asynchronous
                ajax.open("POST", "/save-capture", true);
                // Setting headers for POST method
                ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                // Sending image data to server
                ajax.send("image=" + canvas.toDataURL("image/jpeg", 0.9) + "&qr_code={{$qr_code}}" + "&name={{$guest->name}}" + "&email={{$guest->email}}");

                // Receiving response from server
                // This function will be called multiple times
                ajax.onreadystatechange = function () {
                    // Check when the requested is completed
                    if (this.readyState == 4 && this.status == 200) {

                        // Displaying response from server
                        //console.log(this.responseText);
                        document.getElementById("loading").style.display = "none";
                        console.log("Try to Hide");
                        //sendMail('{{$qr_code}}');
                        console.log("Generte");
                    }
                };
            });
        }

        function sendMail(qr_code) {
            console.log("/send-ticket?qr_code=" + qr_code);
            document.getElementById("loading").style.display = "none";
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.open("GET", "/send-ticket?qr_code=" + qr_code, false);
            xmlHttp.send(null);
            //return xmlHttp.responseText;
        }

        @if($guest->ticket==null)
        $(document).ready(function () {
            doCapture();
        });
        @endif

        function regenerate() {
            //console.log("oooo")
            doCapture();
        }

        /* window.onload = (event) => {

             setTimeout(function(){
                 document.getElementById("loading").style.display = "none";
             },10000);
         };
 */

    </script>


@endsection
