<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Membuat Captcha dengan PHP</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
<?php
$pesan='';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['input'])) {
            if ($_SESSION['captcha']!=$_POST['input']){
                $pesan="<div class='alert alert-danger'><strong>Gagal</strong></div>";
                session_destroy();
            }else {
                $pesan="<div class='alert alert-success'><strong>Sukses</strong></div>";
            }
        }
}
?>
<div class="container">
    <br>
<h4>Testing captcha</h4>
    <hr>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
    <div class="form-group">
        <img src="captcha.php" width="150" height="80"/>
    </div>
    <div class="form-group">
        <label>Input Captcha</label>
        <input type="text" name="input" maxlength="6" class="form-control" placeholder="Masukan kode disini" required/>
    </div>
    <?php echo $pesan; ?>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>