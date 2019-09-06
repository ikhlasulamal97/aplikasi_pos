<?php 
    session_start();
    $koneksi=mysqli_connect("localhost","root","","db_pos");
    if (isset($_POST['signin'])) {
        $user=$_POST['username'];
        $pass=$_POST['password'];
        $sql=mysqli_query($koneksi,"SELECT * FROM tb_pengguna WHERE username='$user' AND password='$pass' ");
        $data=mysqli_fetch_array($sql);
        if ($data['level']=='Admin') {
            $_SESSION['admin']= $data['id'];
            echo "
                <script>
                    window.location.href='index.php'
                </script>
            ";
        }elseif ($data['level']=='Kasir') {
            $_SESSION['kasir']= $data['id'];
            echo "
                <script>
                    window.location.href='index.php'
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Data Tidak Ditemukan');
                    window.location.href='login.php'
                </script>
            ";
        }
    }
 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
   <!--  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css"> -->
    <link rel="stylesheet" type="text/css" href="css/material-icons.css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="card">
            <div class="body">
                <form id="sign_in" action="" method="post">
                    <div class="msg"><h4>Masukkan Username Dan Password</h4></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">account_box</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8"></div>
                        <div class="col-xs-4">
                            <!-- <input type="submit" name="signin" value="SIGN IN"> -->
                            <button class="btn btn-block bg-pink waves-effect" name="signin" type="submit"> SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="Registrasi.php">Register Now!</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>
</html>