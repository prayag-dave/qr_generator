<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QR Code Generator</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="text-center">QR Code Generator</h1>
                <form id="qrForm" method="post" onsubmit="return submit_form(event);">
                    <div class="form-group">
                        <label for="url">Enter a URL:</label>
                        <input type="url" class="form-control" name="url" id="url" placeholder="https://example.com" pattern="https://.*" required />
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Generate QR Code</button>
                </form>
                <div id="qrCodeResult" class="text-center mt-4"></div>
                <div class="d-flex mt-3">
                    <a id="downloadImage" class="btn btn-primary mx-2" style="display: none;" download="qrcode.png">Download Image</a>
                    <button id="downloadPdf" class="btn btn-secondary mx-2" style="display: none;">Download PDF</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- html2canvas Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <!-- pdf-lib Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>
    <!-- Custom JS -->
    <script src="js/script.js"></script>
</body>
</html>
