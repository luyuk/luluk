<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
    body {
        font-family: sans-serif;
        background: #b32423;
    }

    .tulisan_login {
        text-align: center;
        /*membuat semua huruf menjadi kapital*/
        text-transform: uppercase;
    }

    .kotak_login {
        width: 350px;
        background: white;
        margin: 80px auto;
        padding: 30px 20px;
    }

    label {
        font-size: 11pt;
    }

    .form_login {
        /*membuat lebar form penuh*/
        box-sizing: border-box;
        width: 100%;
        padding: 10px;
        font-size: 11pt;
        margin-bottom: 20px;
    }

    .tombol_login {
        background: #4CAF50;
        color: white;
        font-size: 11pt;
        width: 100%;
        border: none;
        border-radius: 3px;
        padding: 10px 20px;
    }

    .link {
        color: #232323;
        text-decoration: none;
        font-size: 10pt;
    }

    .alert {
        background: #e44e4e;
        color: white;
        padding: 10px;
        text-align: center;
        border: 1px solid #b32929;
    }
</style>

<body>

    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
        }
    }
    ?>

    <div class="kotak_login">
        <p class="tulisan_login">Silahkan login</p>

        <form action="ceklogin.php" method="post">
            <label>Username</label>
            <input type="text" name="username" class="form_login" placeholder="Username .." required="required">

            <label>Password</label>
            <input type="password" name="password" class="form_login" placeholder="Password .." required="required">

            <p>Belum Punya Akun <a href="signup.html">Sign Up </a></p>


            <input type="submit" class="tombol_login" value="LOGIN">

            <br />
            <br />
        </form>

    </div>


</body>

</html>