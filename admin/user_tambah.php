<?php
    if(!$_SESSION['username']) header('Location: ../');
    
    if(isset($_POST['submit'])){
        $hash_password = sha1($_POST["password"]);
        $result = $conn->query('INSERT INTO users ( username, password, show_password) VALUES("'.$_POST['username'].'","'.$hash_password.'","'.$_POST['password'].'")');
    
        if($result){
            echo '<script>alert("User tambah berhasil")</script>';
        }else{
            echo '<script>alert("user tambah gagal")</script>';
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
              <li class="breadcrumb-item active">Tambah</li>
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
          <h3 class="card-title">User Tambah</h3>

          <div class="card-tools">                     
          </div>
        </div>
        <div class="card-body">

        <form method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>            
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>            
            </div>
            <a href="index.php?act=users" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-success" name="submit">Simpan</button>
        </form>

        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->