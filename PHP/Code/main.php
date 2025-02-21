<?php
session_start();
include('Petshop.php');
$access = new Petshop();

if (!isset($_SESSION['datashop'])) {
    $_SESSION['datashop'] = [];
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
        border : 1px solid black;
    }
</style>
<body>
    <h1>Welcome To Nipqt Petshop</h1>
    +===============================+
    <h2>
    1 | Show </br>
    2 | Add </br>
    3 | Change </br>
    4 | Delete </br>
    5 | Search </br>
    </h2>
    +===============================+ </br> </br>
    <!-- <form action="" method="post">
        Pilih Opsi diatas : <input type="text" name="pilih" id="">
        <button type="submit">Submit</button>
    </form> -->
        <h1>Show</h1>
        <hr> </br>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Gambar</th>
            </tr>
    <?php
        foreach ($_SESSION['datashop'] as $data) {
    ?>
            <tr>
                <td><?= $data['id'] ?></td>
                <td><?= $data['namaProduk'] ?></td>
                <td><?= $data['kategori'] ?></td>
                <td><?= $data['harga'] ?></td>
            </tr>
    <?php
        }
    ?>
        </table>
        <h1>Add</h1>
        <hr> </br>
        <form action="" method="post" enctype="multipart/form-data">
            ID : <input type="text" name="id" id="" required> </br> </br>
            Nama Produk : <input type="text" name="namaProduk" id="" required> </br> </br>
            Kategori : <input type="text" name="kategori" id="" required> </br> </br>
            Harga : <input type="text" name="harga" id="" required> </br> </br>
            <button type="submit" name="add">Add</button>
        </form>
    <?php
        if (isset($_POST['add'])) {
            $id = $_POST['id'] ?? "";
            $namaProduk = $_POST['namaProduk'] ?? "";
            $kategori = $_POST['kategori'] ?? "";
            $harga = $_POST['harga'] ?? "";
            $access->addData($id, $namaProduk, $kategori, $harga);
            $_SESSION['datashop'][] = [
                "id" => $access->getID(),
                "namaProduk" => $access->getnamaProduk(),
                "kategori" => $access->getkategori(),
                "harga" => $access->getharga()
            ];
        }
    ?>
    <form method="post">
        <button type="submit" name="reset">Reset</button>
    </form>
    <?php
        if (isset($_POST['reset'])) {
            session_destroy();
    
            if (ini_get("session.use_cookies")) {
                setcookie(session_name(), '', time() - 42000, '/'); // Hapus cookie session
            }
            
            header("Location: main.php"); // Redirect ke halaman utama
            exit();
        }
    ?>
</body>
</html>