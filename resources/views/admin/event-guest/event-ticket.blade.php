@extends("layouts.admin")
@section('title', 'Admin Panel')
@section("content")

    <style>
        .ticket-area {
            background: #ffffff;
            text-align: left;
            padding: 25px;
            width: 550px;
            box-shadow: 0 5px 10px rgba(154, 160, 185, 0.05), 0 15px 40px rgba(166, 173, 201, 0.2);
        }
        th {
            text-align: inherit;
            padding-right: 15px;
        }
    </style>

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

        <div class="row">
            <div class="col-8">
                <table>
                    <tr>
                        <th>পূর্ণ নাম: </th>
                        <td>{{$guest->name}}</td>
                    </tr>
                    <tr>
                        <th>ফোন: </th>
                        <td>{{$guest->phone_number}}</td>
                    </tr>
                    <tr>
                        <th>ইমেইল: </th>
                        <td>{{$guest->email}}</td>
                    </tr>
                    <tr>
                        <th>বয়স: </th>
                        <td>{{$guest->age}}</td>
                    </tr>
                </table>
            </div>
            <div class="col-4">
                <p class="" style="text-align: right"> {!! QrCode::size(75)->generate($qr_code); !!}</p>
            </div>
        </div>

        <hr>
        <div class="row">

            <div class="col-md-12">
                <p><strong>লোকেশন: </strong>কাওরানবাজার, ঢাকা</p>
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

