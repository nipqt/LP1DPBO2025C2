<h1>Test</h1>
<form action="" method="post">
    <button type="submit" name="submit1">Test1</button>
</form>
<?php
    if (isset($_POST["submit1"])) {
        echo "Tombol Submit 1 ditekan!";
    }
?>
<form action="" method="post">
    <button type="submit" name="submit2">Test2</button>
</form>
<?php
    if (isset($_POST["submit2"])) {
        echo "Tombol Submit 2 ditekan!";
    }
?>
