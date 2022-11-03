<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Title</title>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>


</head>
<body>
{{QrCode::size(500)->generate($qr_code, public_path('qr/'.$qr_code.'.svg') )}}


<div class="container" style="padding: 25px">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <img src="{{ asset('qr/'.$qr_code.'.svg') }}" class="w-100"/>

            <br>
            <br>
            <a href="{{ asset('qr/'.$qr_code.'.svg') }}" download class="btn btn-primary">Download</a>
        </div>
    </div>
</div>


{{--{{QrCode::size(500)->format("png")->generate('Welcome to Makitweb', public_path('qr/1.png') )}}

<a href="{{ asset('qr/1.png') }}" class="btn btn-alt-info" download>Download</a>--}}


</body>
</html>
