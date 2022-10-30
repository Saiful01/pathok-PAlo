@extends("layouts.admin")
@section('title', 'Admin Panel')
@section("content")
    <link href="/common/css/ticket.css" rel="stylesheet">

    {{--    <button onclick="convert()">Convert me to jpg image</button>--}}


    <button class="btn btn-outline-primary mt-2 mb-3" onclick="doCapture();">Generate</button>

    @if($guest->ticket!=null)
        <a href="/{{$guest['ticket']}}" class="btn btn-outline-primary mt-2 mb-3" download
           id="download">Download</a>
    @endif
   {{-- <button type="button" class="btn btn-sm btn-secondary js-bs-tooltip-enabled"
            onclick="copyToClipBoard('{{Url("/profile")."/".$qr_code}}')">
        <i class="fa fa-copy"></i>
    </button>--}}


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>


    <div class="ticket-area" id="ticket_area">

        <div class="ticket-content">

            <div class="row">
                <div class="col-3">
                    <img src="{{$guest->picture}}" class="profile-pic" alt="logo">
                </div>
                <div class="col-9">
                    <p style="">Dear {{getEnglishName($guest->name)}}<br>

                        With much excitement
                        we are delighted to announce
                        the 1st anniversary of chorki
                        &
                        We cordially request
                        your esteemed presence
                        to celebrate the very first
                    </p style="">
                </div>
            </div>


            <div class="row venue-area">
                <div class="col-8">
                    <center>
                        <img src="/images/logo.png" style="width: 295px;
    margin-left: 92px;
}" alt="logo">
                    </center>
                </div>
                <div class="col-4">
                    <span style="    background: #fff;
    float: right;
    border: 1px solid #d2d2d2;
    padding: 5px;"> {!! QrCode::generate($qr_code); !!} </span>
                </div>
            </div>


            <p class="join"> Please Join us for a night of joyous celebration

            </p>

            <div class="row venue-area">
                <div class="col-6">

                    <p class="schedule">
                        <span class="lite"> Time</span>
                        <br>

                        Saturday 8th October 2022
                        <br>
                        06:00pm <span class="lite">to</span> 10:00pm

                        <br>
                        <span class="lite">Venue</span>
                        <br>
                        Chef's Table Courtside
                        <br>

                        <span class="lite">
                    United City, Madani Avenue (100 feet) Dhaka.
                </span>
                    </p>
                </div>

                <div class="col-6">

                    <div class="signature-area">
                        <img src="/uploads/signature.png" height="80" alt=""/>
                        <p class="schedule">REDOAN RONY
                            <br>
                            <span class="lite">  COO, Chorki</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        /*const div = document.querySelector("#ticket_area");
        const result = document.querySelector(".result");

        function convert() {
            html2canvas(div, {
                allowTaint: true,
                useCORS: true
            }).then(function (canvas) {
                result.appendChild(canvas);
                let cvs = document.querySelector("canvas");
                let dataURI = cvs.toDataURL("image/jpeg");
                let downloadLink = document.querySelector(".result>a");
                downloadLink.href = dataURI;
                downloadLink.download = "div2canvasimage.jpg";
                //console.log(dataURI);
            });
            result.style.display = "block";

        }*/


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
                ajax.send("image=" + canvas.toDataURL("image/jpeg", 0.9) + "&qr_code={{$qr_code}}" + "&name={{$guest->name}}");

                // Receiving response from server
                // This function will be called multiple times
                ajax.onreadystatechange = function () {

                    // Check when the requested is completed
                    if (this.readyState == 4 && this.status == 200) {

                        // Displaying response from server
                        console.log(this.responseText);
                        //document.getElementById("download").style.display = "block";
                        location.reload();
                    }
                };
            });

        }

        @if($guest->ticket==null)
        $(document).ready(function () {
            doCapture();
        });
        @endif


    </script>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script>

        function copyToClipBoard(qr_code) {
            navigator.clipboard.writeText(qr_code);
            // alert("Copied");
            toastr.info('Copied to Clipboard');
        }


    </script>
@endsection

