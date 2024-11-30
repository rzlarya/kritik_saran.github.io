<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_wisata";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $asal = $_POST['asal'];
    $berapa_kali = $_POST['berapa_kali'];
    $info = $_POST['info'];
    $fav = $_POST['fav'];
    $rating = $_POST['rating'];
    $kritik_saran = $_POST['kritik_saran'];

    $sql = "INSERT INTO kritik_saran (nama, no_hp, email, asal, berapa_kali, info, fav, rating, kritik_saran) VALUES ('$nama', '$no_hp', '$email', '$asal', '$berapa_kali', '$info', '$fav', '$rating', '$kritik_saran')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Terimakasih atas kritik dan saran anda!</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
header("location:../done.html");
?>
<div id="header"></div>