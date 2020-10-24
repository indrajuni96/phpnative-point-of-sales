<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Jenis Kue</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Jenis Kue</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->

    <div id="msg">
    </div>
  </section>


  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Table Jenis Kue</h3>

        <div class="card-tools">
          <!-- <a href="laporan_data_kue.php" class="btn btn-outline-secondary mr-2"><i class="fas fa-print"></i> Print</a> -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahJenis">
            Tambah
          </button>
        </div>
      </div>
      <div class="card-body" id="tbl_jenis_kue">

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->


    <!-- modal edit-->

    <div class="modal fade" id="editJenis" tabindex="-1" aria-labelledby="lableEditJenis" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="lableEditJenis">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <form method="post" id="update_jenis">
                <input type="hidden" class="form-control" id="edit_id" name="id" placeholder="Jenis Kue" required>
                <div class="form-group">
                  <label for="jenis">Jenis Kue</label>
                  <input type="text" class="form-control" id="edit_jenis" name="jenis" placeholder="Jenis Kue" required>
                </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal" id="close_update">Batal</button>
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- modal tambah-->

    <div class="modal fade" id="tambahJenis" tabindex="-1" aria-labelledby="lableTambahJenis" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="lableTambahJenis">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <form method="post" id="insert_jenis">
                <div class="form-group">
                  <label for="jenis">Jenis Kue</label>
                  <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis Kue" required>
                </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal" id="close_insert">Batal</button>
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- modal hapus-->

    <div class="modal fade" id="deleteJenis" tabindex="-1" aria-labelledby="lableTambahJenis" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <!-- <h5 class="modal-title" id="lableTambahJenis">Hapus data jenis barang</h5> -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h3>Yakin untuk hapus data jenis barang?</h3>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal" id="close_delete">Batal</button>
              <button type="submit" class="btn btn-success" id="delete_jenis">Hapus</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->