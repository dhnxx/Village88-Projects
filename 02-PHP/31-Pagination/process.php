<?php
ini_set('auto_detect_line_endings', TRUE);



function upload_csv() {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $errors = [];
    $message = [];

    $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    //* Check if the file is a CSV
    if ($file_extension !== "csv") {
        $errors[] = "Sorry, only CSV files are allowed.";
    }

    //* Check if file already exists
    if (file_exists($target_file)) {
        $errors[] = "Sorry, file already exists.";
    }

    //* Attempt to move the uploaded file
    if (empty($errors)) {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $message[] = "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            $errors[] = "Sorry, there was an error uploading your file.";
        }
    }
    $message = $errors;
    return $message;
}

function fetch_csv() {
    $target_dir = "uploads/";
    $csv_files = glob($target_dir . "*.csv");
    $file_list = [];

    foreach ($csv_files as $file) {
        $file_list[] = basename($file);
    }

    return $file_list;
}



//* Check if submit button is pressed
if (isset($_POST["submit"])) {
    $messages = upload_csv();
    foreach ($messages as $message) {
        echo "{$message} <br>";
    }
}

//* Reference to the linked clicked 
if (isset($_GET['file'])) {
    $clicked_file = urldecode($_GET['file']);

    //* Check the max int to know the csv's rows without opening
    $file = new SplFileObject("uploads/$clicked_file", 'r');
    $file->seek(PHP_INT_MAX);
    $est_total_row = ($file->key() - 1) / 50;
} else {
    $clicked_file = "Default File";
}
