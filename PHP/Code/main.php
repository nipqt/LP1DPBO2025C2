<?php
include('Petshop.php');
$access = new Petshop();

if (!isset($_SESSION['datashop'])) {
    $_SESSION['datashop'] = [];
}

if (isset($_POST['pilihan'])) {
    $_SESSION['pilih'] = $_POST['pilih'];
    unset($_SESSION['searchID']);
}

if (isset($_POST['search'])) {
    $_SESSION['searchID'] = $_POST['searchID'];
}

$pilihan = $_SESSION['pilih'] ?? "";
$searchID = $_SESSION['searchID'] ?? "";
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
    0 | Exit </br>
    </h2>
    +===============================+ </br>
    <form action="" method="post">
        Pilih Opsi diatas : <input type="text" name="pilih" id="">
        <button type="submit" name="pilihan">Submit</button>
    </form>
    <?php
        switch ($pilihan) {
            case 1:
    ?>
        <h1>Show</h1>
        <hr> </br>
        <table>
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
                <td><img src="<?= $data['gambar'] ?>" alt="" width="200" height="200"></td>
            </tr>
    <?php
        }
        break;
    ?>
    </table>
    <?php
        case 2:
    ?>
        <h1>Add</h1>
        <hr> </br>
        <form action="" method="post" enctype="multipart/form-data">
            ID : <input type="text" name="id" id="" required> </br> </br>
            Nama Produk : <input type="text" name="namaProduk" id="" required> </br> </br>
            Kategori : <input type="text" name="kategori" id="" required> </br> </br>
            Harga : <input type="text" name="harga" id="" required> </br> </br>
            Gambar : <input type="file" name="gambar" id=""> </br> </br>
            <button type="submit" name="add">Add</button>
        </form>
    <?php
        if (isset($_POST['add'])) {
            $id = $_POST['id'] ?? "";
            $namaProduk = $_POST['namaProduk'] ?? "";
            $kategori = $_POST['kategori'] ?? "";
            $harga = $_POST['harga'] ?? "";
            $gambar = $_FILES['gambar'] ?? "";
            $test = $access->addData($id, $namaProduk, $kategori, $harga, $gambar);
            if ($test == 1) {
                echo "</br>" . "Data berhasil ditambahkan!";
            } else {
                echo "</br>" . "ERROR : id yang dimasukkan sama";
            }
        }
        break;

        case 3:
    ?>
        <h1>Change</h1>
        <hr> </br>
        <form action="" method="post">
            Pilih ID yang ingin diubah : <input type="text" name="searchID" id="">
            <button type="submit" name="search">Cari</button>
        </form>
    <?php
        $i = 0;
        $stop = 0;
        $fail = 0;
        while (($stop == 0) && ($i < count($_SESSION['datashop']))) {
            if ($_SESSION['datashop'][$i]['id'] == $searchID) {

    ?>
        </br>
        <form action="" method="post" enctype="multipart/form-data">
            ID : <input type="text" name="id" id="" required> </br> </br>
            Nama Produk : <input type="text" name="namaProduk" id="" required> </br> </br>
            Kategori : <input type="text" name="kategori" id="" required> </br> </br>
            Harga : <input type="text" name="harga" id="" required> </br> </br>
            Gambar : <input type="file" name="gambar" id=""> </br> </br>
            <button type="submit" name="commit">Commit</button>
        </form>  
    <?php
                if (isset($_POST['commit'])) {
                    $id = $_POST['id'] ?? "";
                    $namaProduk = $_POST['namaProduk'] ?? "";
                    $kategori = $_POST['kategori'] ?? "";
                    $harga = $_POST['harga'] ?? "";
                    $gambar = $_FILES['gambar'] ?? "";
                    $test = $access->changeData($i, $id, $namaProduk, $kategori, $harga, $gambar);
                    if ($test == 1) {
                        echo "</br>" . "Data berhasil Diubah!";
                    } else {
                        echo "</br>" . "ERROR : id yang dimasukkan sama";
                    }
                }
                $stop = 1;
            }
            $i++;
        }
        if (($stop == 0) && ($searchID != "")) {
            $fail = 1;
        }
        if ($fail == 1) {
            echo "Data Tidak Ada!";
        }
        break;

        case 4:
    ?>
        <h1>Delete</h1>
        <hr> </br>
        <form action="" method="post">
            Pilih ID yang ingin diubah : <input type="text" name="searchID" id="">
            <button type="submit" name="search">Cari</button>
        </form>
    <?php
        $i = 0;
        $stop = 0;
        $fail = 0;
        while (($stop == 0) && ($i < count($_SESSION['datashop']))) {
            if ($_SESSION['datashop'][$i]['id'] == $searchID) {
                unset($_SESSION['datashop'][$i]);
                echo "Data berhasil dihapus!";
                $stop = 1;
            }
            $i++;
        }
        if (($stop == 0) && ($searchID != "")) {
            $fail = 1;
        }
        if ($fail == 1) {
            echo "Data tidak ditemukan!";
        }
        break;
        
        case 5:
    ?>
        <h1>Search</h1>
        <hr> </br>
        <form action="" method="post">
            Pilih ID yang ingin diubah : <input type="text" name="searchID" id="">
            <button type="submit" name="search">Cari</button>
        </form>
    <?php
        $i = 0;
        $stop = 0;
        $fail = 0;
        while (($stop == 0) && ($i < count($_SESSION['datashop']))) {
            if ($_SESSION['datashop'][$i]['id'] == $searchID) {
    ?>
            <table>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Gambar</th>
            </tr>
            <tr>
                <td><?= $_SESSION['datashop'][$i]['id'] ?></td>
                <td><?= $_SESSION['datashop'][$i]['namaProduk'] ?></td>
                <td><?= $_SESSION['datashop'][$i]['kategori'] ?></td>
                <td><?= $_SESSION['datashop'][$i]['harga'] ?></td>
                <td><img src="<?= $_SESSION['datashop'][$i]['gambar'] ?>" alt="" width="200" height="200"></td>
            </tr>
    <?php
                echo "Data berhasil ditemukan!";
                $stop = 1;
            }
            $i++;
        }
        if (($stop == 0) && ($searchID != "")) {
            $fail = 1;
        }
        if ($fail == 1) {
            echo "Data tidak ditemukan!";
        }
        break;

        case 0:
            session_destroy();
    
            if (ini_get("session.use_cookies")) {
                setcookie(session_name(), '', time() - 42000, '/'); // Hapus cookie session
            }
            
            header("Location: main.php"); // Redirect ke halaman utama
            exit();
        break;
    }
    ?>
</body>
</html>
