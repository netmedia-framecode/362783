<?php require_once("../controller/material-keluar.php");
$_SESSION["project_mitra_agung_malaka"]["name_page"] = "Material Keluar";
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
              <th class="text-center">Nama Material</th>
              <th class="text-center">Status</th>
              <th class="text-center">Nama Pemesan</th>
              <th class="text-center">No. Telp</th>
              <th class="text-center">Alamat Pengiriman</th>
              <th class="text-center">Jumlah Keluar</th>
              <th class="text-center">Biaya</th>
              <th class="text-center">Tgl Masuk</th>
              <th class="text-center">Tgl Ubah</th>
              <?php if ($id_role == 1 || $id_role == 2) { ?>
                <th class="text-center" style="width: 200px;">Aksi</th>
              <?php } ?>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th class="text-center">Nama Material</th>
              <th class="text-center">Status</th>
              <th class="text-center">Nama Pemesan</th>
              <th class="text-center">No. Telp</th>
              <th class="text-center">Alamat Pengiriman</th>
              <th class="text-center">Jumlah Keluar</th>
              <th class="text-center">Biaya</th>
              <th class="text-center">Tgl Masuk</th>
              <th class="text-center">Tgl Ubah</th>
              <?php if ($id_role == 1 || $id_role == 2) { ?>
                <th class="text-center">Aksi</th>
              <?php } ?>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($view_material_keluar as $data) { ?>
              <tr>
                <td><?= $data['nama_material'] ?></td>
                <td>
                  <p><?= $data['status_keluar'] ?></p>
                  <span>
                    <p>Progress </p>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: <?= $data['progress'] ?>%;" aria-valuenow="<?= $data['progress'] ?>" aria-valuemin="0" aria-valuemax="100"><?= $data['progress'] ?>%</div>
                    </div>
                  </span>
                </td>
                <td><?= $data['nama_pemesan'] ?></td>
                <td><?= $data['no_telp'] ?></td>
                <td><?= $data['alamat_pengiriman'] ?></td>
                <td><?= $data['jumlah_keluar'] . ' ' . $data['satuan_barang'] ?></td>
                <td>Rp. <?= number_format($data['biaya']) ?></td>
                <td><?php $created_at = date_create($data["created_at"]);
                    echo date_format($created_at, "d M Y"); ?></td>
                <td><?php $updated_at = date_create($data["updated_at"]);
                    echo date_format($updated_at, "d M Y"); ?></td>
                <?php if ($id_role == 1 || $id_role == 2) { ?>
                  <td class="text-center">
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubah<?= $data['id_mk'] ?>">
                      <i class="bi bi-pencil-square"></i> Ubah
                    </button>
                    <div class="modal fade" id="ubah<?= $data['id_mk'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header border-bottom-0 shadow">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah <?= $data['nama_material'] ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="" method="post">
                            <input type="hidden" name="id_mk" value="<?= $data['id_mk'] ?>">
                            <input type="hidden" name="id_sm" value="<?= $data['id_sm'] ?>">
                            <input type="hidden" name="nama_material" value="<?= $data['nama_material'] ?>">
                            <input type="hidden" name="jumlah_keluarOld" value="<?= $data['jumlah_keluar'] ?>">
                            <input type="hidden" name="biayaOld" value="<?= $data['biaya'] ?>">
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="id_sk">Status Keluar</label>
                                <select name="id_sk" class="form-control" id="id_sk" required>
                                  <option value="" selected>Pilih Status Keluar</option>
                                  <?php $id_sk = $data['id_sk'];
                                  foreach ($view_status_keluar as $data_select_status_keluar) {
                                    $selected = ($data_select_status_keluar['id_sk'] == $id_sk) ? 'selected' : ''; ?>
                                    <option value="<?= $data_select_status_keluar['id_sk'] ?>" <?= $selected ?>><?= $data_select_status_keluar['status_keluar'] ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="nama_pemesan">Nama Pemesan</label>
                                <input type="text" name="nama_pemesan" value="<?= $data['nama_pemesan'] ?>" class="form-control" id="nama_pemesan" minlength="3" required>
                              </div>
                              <div class="form-group">
                                <label for="no_telp">No. Telp</label>
                                <input type="number" name="no_telp" value="<?= $data['no_telp'] ?>" class="form-control" id="no_telp" min="11" required>
                              </div>
                              <div class="form-group">
                                <label for="alamat_pengiriman">Alamat Pengiriman</label>
                                <input type="text" name="alamat_pengiriman" value="<?= $data['alamat_pengiriman'] ?>" class="form-control" id="alamat_pengiriman" minlength="3" required>
                              </div>
                              <div class="form-group">
                                <label for="jumlah_keluar">Jumlah Material Keluar</label>
                                <input type="number" name="jumlah_keluar" value="<?= $data['jumlah_keluar'] ?>" value="1" class="form-control" id="jumlah_keluar" min="1" required>
                              </div>
                            </div>
                            <div class="modal-footer justify-content-center border-top-0">
                              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                              <button type="submit" name="edit_material_keluar" class="btn btn-warning btn-sm">Ubah</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $data['id_mk'] ?>">
                      <i class="bi bi-trash3"></i> Hapus
                    </button>
                    <div class="modal fade" id="hapus<?= $data['id_mk'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header border-bottom-0 shadow">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $data['nama_material'] ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="" method="post">
                            <input type="hidden" name="id_mk" value="<?= $data['id_mk'] ?>">
                            <input type="hidden" name="id_sm" value="<?= $data['id_sm'] ?>">
                            <input type="hidden" name="nama_material" value="<?= $data['nama_material'] ?>">
                            <input type="hidden" name="jumlah_keluar" value="<?= $data['jumlah_keluar'] ?>">
                            <div class="modal-body">
                              <p>Jika anda yakin ingin menghapus data ini, klik Hapus!</p>
                            </div>
                            <div class="modal-footer justify-content-center border-top-0">
                              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                              <button type="submit" name="delete_material_keluar" class="btn btn-danger btn-sm">hapus</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </td>
                <?php } ?>
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
          <h5 class="modal-title" id="tambahLabel">Tambah Material Keluar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label for="id_sm">Material</label>
              <select name="id_sm" class="form-control" id="id_sm" required>
                <option value="" selected>Pilih Material</option>
                <?php foreach ($view_stok_material as $data_select_stok_material) { ?>
                  <option value="<?= $data_select_stok_material['id_sm'] ?>"><?= $data_select_stok_material['nama_material'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="id_sk">Status Keluar</label>
              <select name="id_sk" class="form-control" id="id_sk" required>
                <option value="" selected>Pilih Status Keluar</option>
                <?php foreach ($view_status_keluar as $data_select_status_keluar) { ?>
                  <option value="<?= $data_select_status_keluar['id_sk'] ?>"><?= $data_select_status_keluar['status_keluar'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="nama_pemesan">Nama Pemesan</label>
              <input type="text" name="nama_pemesan" class="form-control" id="nama_pemesan" minlength="3" required>
            </div>
            <div class="form-group">
              <label for="no_telp">No. Telp</label>
              <input type="number" name="no_telp" class="form-control" id="no_telp" min="11" required>
            </div>
            <div class="form-group">
              <label for="alamat_pengiriman">Alamat Pengiriman</label>
              <input type="text" name="alamat_pengiriman" class="form-control" id="alamat_pengiriman" minlength="3" required>
            </div>
            <div class="form-group">
              <label for="jumlah_keluar">Jumlah Material Keluar</label>
              <input type="number" name="jumlah_keluar" value="1" class="form-control" id="jumlah_keluar" min="1" required>
            </div>
          </div>
          <div class="modal-footer justify-content-center border-top-0">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
            <button type="submit" name="add_material_keluar" class="btn btn-primary btn-sm">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php require_once("../templates/views_bottom.php") ?>