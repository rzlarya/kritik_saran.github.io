<?php
if (isset($_POST['download_csv'])) {
    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_wisata";

    // Buat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Memberikan nama file
    $filename = "Kritik Saran " . date('d-m-Y') . ".csv";

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    $output = fopen('php://output', 'w');

    $result = $conn->query("SELECT * FROM kritik_saran");

    $fields = mysqli_fetch_fields($result);
    $fieldNames = [];
    foreach ($fields as $field) {
        $fieldNames[] = $field->name;
    }
    fputcsv($output, $fieldNames);

    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }

    fclose($output);
    $conn->close();
    exit;
}
?>