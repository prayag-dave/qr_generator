<?php
// Include the qrlib file 
include '../phpqrcode/qrlib.php'; 

if (isset($_POST["url"])) {
    $text = $_POST["url"];

    // Output buffer to capture QR code image
    ob_start();
    QRcode::png($text, null, 'L', 10, 10);
    $imageString = base64_encode(ob_get_contents());
    ob_end_clean();

    // Return the image as a base64-encoded string
    echo "<img src='data:image/png;base64," . $imageString . "' alt='QR Code' />";
} else {
    echo "No URL provided";
}
?>
