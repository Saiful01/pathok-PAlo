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


</head>
<body>

<div class="" id="capture" style="background: red; color: #ffffff; width: 200px;height: 500px">
    Hello World !
</div>


<button onclick="doCapture();">Capture</button>


<script>
    function doCapture() {
        window.scrollTo(0, 0);

        // Convert the div to image (canvas)
        html2canvas(document.getElementById("capture")).then(function (canvas) {

            window.scrollTo(0, 0);

            html2canvas(document.getElementById("capture")).then(function (canvas) {

                // Create an AJAX object
                var ajax = new XMLHttpRequest();
                // Setting method, server file name, and asynchronous
                ajax.open("POST", "/save-capture", true);

                // Setting headers for POST method
                ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                // Sending image data to server
                ajax.send("image=" + canvas.toDataURL("image/jpeg", 0.9));

                // Receiving response from server
                // This function will be called multiple times
                ajax.onreadystatechange = function () {

                    // Check when the requested is completed
                    if (this.readyState == 4 && this.status == 200) {

                        // Displaying response from server
                        console.log(this.responseText);
                    }
                };
            });
        });
    }
</script>
</body>
</html>
