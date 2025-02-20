<?php
include('Petshop.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID = $_POST['id'] ?? "";
    $namaProduk = $_POST['namaProduk'] ?? "";
    $kategori = $_POST['kategori'] ?? "";
    $harga = $_POST['harga'] ?? "";
    $gambar = $_POST['gambar'] ?? "";
    $user = new Petshop($ID, $namaProduk, $kategori, $harga, $gambar);
    $_SESSION['data'][] = $user;
}
$data = $_SESSION['data'] ?? [];
if (isset($_GET['reset'])) {
    session_destroy();
    header("Location: main.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DPBO Petshop By Nipqt</title>
    </head>
<style>
table, th, td {
    border: 1px solid;
}
</style>
<body>
    <h1>Welcome To Nipqt Petshop</h1>
    
    <h2 id="top">Add</h2>
    <form method="POST">
        ID          : <input type="text" name="id" id=""> </br> </br>
        Nama Produk :<input type="text" name="namaProduk" id=""> </br> </br>
        Kategori    : <input type="text" name="kategori" id=""> </br> </br>
        Harga       :<input type="text" name="harga" id=""> </br> </br>
        <button type="submit">Submit</button>
    </form>

    <h2 id="top">Show</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
        </tr>
    <?php
        foreach ($data as $tampil) {
    ?>
        <tr>
            <td><?= $tampil->getID()?></td>
            <td><?= $tampil->getnamaProduk()?></td>
            <td><?= $tampil->getkategori()?></td>
            <td><?= $tampil->getharga()?></td>
        </tr>
    <?php
        }
    ?>
    </table>
    </br>
    <a href="main.php?reset=true">Reset</a>
</body>
</html>