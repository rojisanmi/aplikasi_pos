<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pengguna</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/adminlte/plugins/sweetalert2/sweetalert2.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
  <?php $this->load->view('partials/head'); ?>
  <?php $this->load->view('includes/link_favicon'); ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php $this->load->view('includes/nav'); ?>

  <?php $this->load->view('includes/aside'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
          <?php
            if ($this->session->flashdata('simpan')) {?>
              <div class="alert alert-success">
                <?php echo $this->session->flashdata('simpan'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
          <?php }
          ?>

          <?php
            if ($this->session->flashdata('update')) {?>
              <div class="alert alert-success">
                <?php echo $this->session->flashdata('update'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
          <?php }
          ?>

          <?php
            if ($this->session->flashdata('delete')) {?>
              <div class="alert alert-danger">
                <?php echo $this->session->flashdata('delete'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
          <?php }
          ?>
          <br>
        <div class="row mb-2">
          <div class="col">
            <h1 class="m-0 text-dark">Pengguna</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <button class="btn btn-success" data-toggle="modal" data-target="#modal" onclick="add()">Add</button>
          </div>
          <div class="card-body">
            <table class="table w-100 table-bordered table-hover" id="pengguna">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Photo User</th>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Aksi</th>
                </tr>
              </thead>

              <tbody>
                <?php 
                  $no = 1;
                  foreach ($data_user->result() as $row) {?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td>
                        <a href="<?php echo base_url()?>assets/image/photo_user/<?php echo $row->photo_user;?>" target="_blank">
                          <img src="<?php echo base_url()?>assets/image/photo_user/<?php echo $row->photo_user;?>" width="70px;">
                        </a>
                      </td>
                      <td><?php echo $row->username;?></td>
                      <td><?php echo $row->nama;?></td>

                      <td>
                        <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit-user<?php echo $row->id;?>"><font style="color: white;">Edit</font></a>
                        <a href="<?php echo base_url()?>Pengguna/delete/<?php echo $row->id;?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Menghapus?')">Delete</a>
                      </td>
                    </tr>
                <?php }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>

<!-- Modal Edit -->

<?php 
  foreach ($data_user->result() as $data) {
    $id = $data->id;
    $username = $data->username;
    $password = $data->password;
    $nama = $data->nama;
    $photo_user = $data->photo_user;
    ?>

    <div class="modal fade" id="edit-user<?php echo $data->id;?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-tittle"> Edit Pengguna </h5>
            <button class="close" data-dismiss="modal">
              <span> &times; </span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url()?>pengguna/edit/" method="post" enctype="multipart/form-data">
                <div class="box-body" hidden>
                  <div class="form-group">
                    <label class="col-md-3 control-label">ID Pengguna</label>
                    <div class="col-md-9">
                      <input type="text" name="id" class="form-control" value="<?php echo $id;?>">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" value="<?php echo $username;?>" required>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" value="<?php echo $password;?>" name="password" required>
                </div>
                <div class="form-group">
                  <label>Nama Pengguna</label>
                  <input type="text" name="nama" class="form-control" value="<?php echo $nama;?>" required>
                </div>
                <div class="form-group">
                  <label>Photo User</label>
                  <input type="file" name="photo_user" class="form-control" value="<?php echo $photo_user;?>" required>
                </div>
              <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Edit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  <?php }
?>

<!-- Modal Add -->

<div class="modal fade" id="modal">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title">Add Data</h5>
    <button class="close" data-dismiss="modal">
      <span>&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form id="form" action="<?php echo base_url()?>pengguna/add/" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id">
      <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" placeholder="Username" name="username" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password" required>
      </div>
      <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" placeholder="Nama" name="nama" required>
      </div>
      <div class="form-group">
        <label>Photo</label>
        <input type="file" name="photo_user" class="form-control" required>
      </div>
      <button class="btn btn-success" type="submit">Add</button>
      <button class="btn btn-danger" data-dismiss="modal">Close</button>
    </form>
  </div>
</div>
</div>
</div>

<!-- ./wrapper -->
<?php $this->load->view('includes/footer'); ?>
<?php $this->load->view('partials/footer'); ?>
<script src="<?php echo base_url('assets/vendor/adminlte/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/adminlte/plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/adminlte/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<script>
  var addUrl = '<?php echo site_url('pengguna/add') ?>';
  var deleteUrl = '<?php echo site_url('pengguna/delete') ?>';
  var editUrl = '<?php echo site_url('pengguna/edit') ?>';
  var getPenggunaUrl = '<?php echo site_url('pengguna/get_pengguna') ?>';
</script>
<script src="<?php echo base_url('assets/js/pengguna.min.js') ?>"></script>
</body>
</html>