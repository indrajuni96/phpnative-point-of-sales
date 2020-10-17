<?php
require_once('../db/koneksi.php');
if(!$_SESSION['username']) header('Location: ../');

if($_GET['id']){
    $id = $_GET['id'];
    $result = $conn->query('SELECT * FROM users WHERE id="'.$id.'"');

    if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $username = $row['username'];
            $password = $row['show_password'];
    }
}else{
    header('Location: index.php?act=users');
}

if(isset($_POST['submit'])){
    $hash_password = sha1($_POST["password"]);
    $result = $conn->query('UPDATE users SET username="'.$_POST['username'].'", password="'.$hash_password.'", show_password="'.$_POST['password'].'" WHERE id="'.$id.'"');

    if($result){
        echo '<script>
                    alert("User ubah berhasil");
                    window.location.href="index.php?act=users";
               </script>';
    }else{
        echo '<script>
                alert("User ubah gagal");
                window.location.href="index.php?act=users";
              </script>';
    }
}
?> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Dashboard</li>
              <li class="breadcrumb-item">Users</li>
              <li class="breadcrumb-item active">Ubah</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">User Ubah</h3>

          <div class="card-tools">                     
          </div>
        </div>
        <div class="card-body">

        <form method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $username?>" required>            
            </div>

            <div class="input-group mb-3">
                <input type="password" class="form-control" value="<?= $password ?>" name="password" placeholder="Password">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                    </span>
                </div>
            </div>
            <a href="index.php?act=users" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-success" name="submit">Ubah</button>
        </form>

        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <Script>
        $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password input').attr("type") == "text"){
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass( "fa-eye-slash" );
                $('#show_hide_password i').removeClass( "fa-eye" );
            }else if($('#show_hide_password input').attr("type") == "password"){
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass( "fa-eye-slash" );
                $('#show_hide_password i').addClass( "fa-eye" );
            }
        });
    });
  </Script>
