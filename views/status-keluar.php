<?php require_once("../controller/status-keluar.php");
$_SESSION["project_mitra_agung_malaka"]["name_page"] = "Status Keluar";
require_once("../templates/views_top.php"); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $_SESSION["project_mitra_agung_malaka"]["name_page"] ?></h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambah"><i class="bi bi-plus-lg"></i> Tambah</a>
  </div>

  <div class="card shadow mb-4 border-0">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="text-center">Status Keluar</th>
              <th class="text-center">Progress</th>
              <th class="text-center" style="width: 200px;">Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th class="text-center">Status Keluar</th>
              <th class="text-center">Progress</th>
              <th class="text-center">Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($view_status_keluar as $data) { ?>
              <tr>
                <td><?= $data['status_keluar'] ?></td>
                <td><?= $data['progress'] ?>%</td>
                <td class="text-center">
                  <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubah<?= $data['id_sk'] ?>">
                    <i class="bi bi-pencil-square"></i> Ubah
                  </button>
                  <div class="modal fade" id="ubah<?= $data['id_sk'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header border-bottom-0 shadow">
                          <h5 class="modal-title" id="exampleModalLabel">Ubah <?= $data['status_keluar'] ?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="" method="post">
                          <input type="hidden" name="id_sk" value="<?= $data['id_sk'] ?>">
                          <input type="hidden" name="status_keluarOld" value="<?= $data['status_keluar'] ?>">
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="status_keluar">Status Keluar</label>
                              <input type="text" name="status_keluar" value="<?= $data['status_keluar'] ?>" class="form-control" id="status_keluar" aria-describedby="emailHelp" minlength="3" required>
                            </div>
                            <div class="form-group">
                              <label for="progress<?= $data['id_sk'] ?>">Status Keluar</label>
                              <div class="row">
                                <div class="col-lg-10">
                                  <input type="range" name="progress" value="<?= $data['progress'] ?>" step="1" class="form-control" id="progress<?= $data['id_sk'] ?>" required>
                                </div>
                                <div class="col-lg-2 m-auto ml-0 pl-0">
                                  <span class="progress-value" id="progressValue<?= $data['id_sk'] ?>"><?= $data['progress'] ?>%</span>
                                  <script>
                                    const progressInput<?= $data['id_sk'] ?> = document.getElementById('progress<?= $data['id_sk'] ?>');
                                    const progressValue<?= $data['id_sk'] ?> = document.getElementById('progressValue<?= $data['id_sk'] ?>');
                                    progressInput<?= $data['id_sk'] ?>.addEventListener('input', function() {
                                      progressValue<?= $data['id_sk'] ?>.textContent = this.value + '%';
                                    });
                                  </script>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-center border-top-0">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                            <button type="submit" name="edit_status_keluar" class="btn btn-warning btn-sm">Ubah</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $data['id_sk'] ?>">
                    <i class="bi bi-trash3"></i> Hapus
                  </button>
                  <div class="modal fade" id="hapus<?= $data['id_sk'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header border-bottom-0 shadow">
                          <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $data['status_keluar'] ?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="" method="post">
                          <input type="hidden" name="id_sk" value="<?= $data['id_sk'] ?>">
                          <input type="hidden" name="status_keluar" value="<?= $data['status_keluar'] ?>">
                          <div class="modal-body">
                            <p>Jika anda yakin ingin menghapus data ini, klik Hapus!</p>
                          </div>
                          <div class="modal-footer justify-content-center border-top-0">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                            <button type="submit" name="delete_status_keluar" class="btn btn-danger btn-sm">hapus</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-bottom-0 shadow">
          <h5 class="modal-title" id="tambahLabel">Tambah Status Keluar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label for="status_keluar">Status Keluar</label>
              <input type="text" name="status_keluar" class="form-control" id="status_keluar" minlength="3" required>
            </div>
            <div class="form-group">
              <label for="progress">Status Keluar</label>
              <div class="row">
                <div class="col-lg-11">
                  <input type="range" name="progress" value="0" step="1" class="form-control" id="progress" required>
                </div>
                <div class="col-lg-1 m-auto ml-0 pl-0">
                  <span class="progress-value" id="progressValue">0%</span>
                  <script>
                    const progressInput = document.getElementById('progress');
                    const progressValue = document.getElementById('progressValue');
                    progressInput.addEventListener('input', function() {
                      progressValue.textContent = this.value + '%';
                    });
                  </script>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-center border-top-0">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
            <button type="submit" name="add_status_keluar" class="btn btn-primary btn-sm">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php require_once("../templates/views_bottom.php") ?>