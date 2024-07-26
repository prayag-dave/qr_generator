function submit_form(event) {
    event.preventDefault(); // Prevent the form from submitting the traditional way

    const url = $('#url').val(); // Get the URL from the input field

    $.ajax({
        url: "php/qr_generator.php", // The page containing PHP script
        type: "post", // Request type
        data: { url: url }, // Data to be sent to the server
        success: function(result) {
            $('#qrCodeResult').html(result); // Display the QR code in the result div

            // Extract base64 image data
            const img = $('#qrCodeResult img');
            const src = img.attr('src');

            // Set the download links
            const downloadImage = $('#downloadImage');
            downloadImage.attr('href', src);
            downloadImage.show();

            const downloadPdf = $('#downloadPdf');
            downloadPdf.show();
            
            // Generate PDF when the PDF download button is clicked
            downloadPdf.off('click').on('click', function(event) {
                event.preventDefault();
                generatePDF();
            });
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error); // Handle errors here
        }
    });
}

function generatePDF() {
    // Capture the QR code image as a canvas
    html2canvas(document.getElementById('qrCodeResult')).then(canvas => {
        // Convert canvas to image data
        const imgData = canvas.toDataURL('image/png');

        // Create a new PDF
        PDFLib.PDFDocument.create().then(pdfDoc => {
            const page = pdfDoc.addPage([canvas.width, canvas.height]);
            pdfDoc.embedPng(imgData).then(pngImage => {
                page.drawImage(pngImage, {
                    x: 0,
                    y: 0,
                    width: canvas.width,
                    height: canvas.height
                });

                // Save and download the PDF
                pdfDoc.save().then(pdfBytes => {
                    const blob = new Blob([pdfBytes], { type: 'application/pdf' });
                    const url = URL.createObjectURL(blob);
                    const link = document.createElement('a');
                    link.href = url;
                    link.download = 'qrcode.pdf';
                    link.click();
                });
            });
        });
    });
}
