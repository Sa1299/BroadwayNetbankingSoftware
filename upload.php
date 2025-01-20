<?php
// upload.php
$id = $_GET['id'];
// Ensure the uploads directory exists
$uploadDir = 'uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Check if a file has been uploaded
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['fileToUpload']['tmp_name'];
        $fileName = basename($_FILES['fileToUpload']['name']);
        $fileSize = $_FILES['fileToUpload']['size'];
        $fileType = $_FILES['fileToUpload']['type'];

        // Extract file extension
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Validate file type (only PDF allowed)
        if ($fileExtension === 'pdf') {
            // Define the upload path
            $destinationFilePath = $uploadDir . $fileName;

            // Move the file to the uploads directory
            if (move_uploaded_file($fileTmpPath, $destinationFilePath)) {
                //echo "<p>File successfully uploaded: <a href='$destinationFilePath'>$fileName</a></p>";
                include 'connection.php';
                $id = $_GET['id'];
                $date = date("Y-m-d");
                $sql = "INSERT INTO `tbl_upload`(`uid`, `file`, `date`) VALUES ('$id','$fileName','$date')";
                $result = $conn->query($sql);
                if($result){
                    header("location:upload_pdf.php?id=$id&msg=insert");
                }
            } else {
                echo "<p>Error moving the file to the upload directory.</p>";
            }
        } else {
            echo "<p>Only PDF files are allowed. Please upload a valid PDF file.</p>";
        }
    } else {
        echo "<p>No file uploaded or there was an error during the upload process.</p>";
    }
} else {
    echo "<p>Invalid request method.</p>";
}
header("location:upload_pdf.php?id=$id&msg=insert");
?>
