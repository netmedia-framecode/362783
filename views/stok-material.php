<?php require_once("../controller/stok-material.php");
$_SESSION["project_mitra_agung_malaka"]["name_page"] = "Stok Material";
require_once("../templates/views_top.php"); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $_SESSION["project_mitra_agung_malaka"]["name_page"] ?></h1>
    <div class="div">
      <?php if ($id_role == 1 || $id_role == 2) { ?>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambah"><i class="bi bi-plus-lg"></i> Tambah</a>
      <?php } ?>
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#export"><i class="bi bi-download"></i> Export</a>
    </div>
  </div>

  <div class="card shadow mb-4 border-0">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="text-center">Nama Material</th>
              <th class="text-center">Status</th>
              <th class="text-center">Jumlah Stok</th>
              <th class="text-center">Satuan</th>
              <th class="text-center">Biaya (per satuan)</th>
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
              <th class="text-center">Jumlah Stok</th>
              <th class="text-center">Satuan</th>
              <th class="text-center">Biaya (per satuan)</th>
              <th class="text-center">Tgl Masuk</th>
              <th class="text-center">Tgl Ubah</th>
              <?php if ($id_role == 1 || $id_role == 2) { ?>
                <th class="text-center">Aksi</th>
              <?php } ?>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($view_stok_material as $data) { ?>
              <tr>
                <td><?= $data['nama_material'] ?></td>
                <td><?= $data['status'] ?></td>
                <td><?= $data['jumlah'] ?></td>
                <td><?= $data['satuan_barang'] ?></td>
                <td>Rp. <?= number_format($data['biaya_satuan']) ?></td>
                <td><?php $created_at = date_create($data["created_at"]);
                    echo date_format($created_at, "d M Y"); ?></td>
                <td><?php $updated_at = date_create($data["updated_at"]);
                    echo date_format($updated_at, "d M Y"); ?></td>
                <?php if ($id_role == 1 || $id_role == 2) { ?>
                  <td class="text-center">
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubah<?= $data['id_sm'] ?>">
                      <i class="bi bi-pencil-square"></i> Ubah
                    </button>
                    <div class="modal fade" id="ubah<?= $data['id_sm'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header border-bottom-0 shadow">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah <?= $data['nama_material'] ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="" method="post">
                            <input type="hidden" name="id_sm" value="<?= $data['id_sm'] ?>">
                            <input type="hidden" name="nama_material" value="<?= $data['nama_material'] ?>">
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="id_bm">Bahan Material</label>
                                <select name="id_bm" class="form-control" id="id_bm" required>
                                  <option value="" selected>Pilih Bahan Material</option>
                                  <?php $id_bm = $data['id_bm'];
                                  foreach ($view_bahan_material as $data_select_bahan_material) {
                                    $selected = ($data_select_bahan_material['id_bm'] == $id_bm) ? 'selected' : ''; ?>
                                    <option value="<?= $data_select_bahan_material['id_bm'] ?>" <?= $selected ?>><?= $data_select_bahan_material['nama_material'] ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="id_ss">Status Stok</label>
                                <select name="id_ss" class="form-control" id="id_ss" required>
                                  <option value="" selected>Pilih Status Stok</option>
                                  <?php $id_ss = $data['id_ss'];
                                  foreach ($view_status_stok as $data_select_status_stok) {
                                    $selected = ($data_select_status_stok['id_ss'] == $id_ss) ? 'selected' : ''; ?>
                                    <option value="<?= $data_select_status_stok['id_ss'] ?>" <?= $selected ?>><?= $data_select_status_stok['status'] ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="row">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label for="jumlah">Jumlah Material</label>
                                    <input type="number" name="jumlah" value="<?= $data['jumlah'] ?>" class="form-control" id="jumlah" min="1" required>
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label for="id_sb">Satuan</label>
                                    <select name="id_sb" class="form-control" id="id_sb" required>
                                      <option value="" selected>Pilih Satuan</option>
                                      <?php $id_sb = $data['id_sb'];
                                      foreach ($view_satuan_barang as $data_select_satuan_barang) {
                                        $selected = ($data_select_satuan_barang['id_sb'] == $id_sb) ? 'selected' : ''; ?>
                                        <option value="<?= $data_select_satuan_barang['id_sb'] ?>" <?= $selected ?>><?= $data_select_satuan_barang['satuan_barang'] ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="biaya_satuan">Biaya Material (per satuan)</label>
                                <input type="number" name="biaya_satuan" value="<?= $data['biaya_satuan'] ?>" class="form-control" id="biaya_satuan" min="1000" required>
                              </div>
                            </div>
                            <div class="modal-footer justify-content-center border-top-0">
                              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                              <button type="submit" name="edit_stok_material" class="btn btn-warning btn-sm">Ubah</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $data['id_sm'] ?>">
                      <i class="bi bi-trash3"></i> Hapus
                    </button>
                    <div class="modal fade" id="hapus<?= $data['id_sm'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header border-bottom-0 shadow">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $data['nama_material'] ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="" method="post">
                            <input type="hidden" name="id_sm" value="<?= $data['id_sm'] ?>">
                            <input type="hidden" name="nama_material" value="<?= $data['nama_material'] ?>">
                            <div class="modal-body">
                              <p>Jika anda yakin ingin menghapus data ini, klik Hapus!</p>
                            </div>
                            <div class="modal-footer justify-content-center border-top-0">
                              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                              <button type="submit" name="delete_stok_material" class="btn btn-danger btn-sm">hapus</button>
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
          <h5 class="modal-title" id="tambahLabel">Tambah Stok Material</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label for="id_bm">Bahan Material</label>
              <select name="id_bm" class="form-control" id="id_bm" required>
                <option value="" selected>Pilih Bahan Material</option>
                <?php foreach ($view_bahan_material as $data_select_bahan_material) { ?>
                  <option value="<?= $data_select_bahan_material['id_bm'] ?>"><?= $data_select_bahan_material['nama_material'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="id_ss">Status Stok</label>
              <select name="id_ss" class="form-control" id="id_ss" required>
                <option value="" selected>Pilih Status Stok</option>
                <?php foreach ($view_status_stok as $data_select_status_stok) { ?>
                  <option value="<?= $data_select_status_stok['id_ss'] ?>"><?= $data_select_status_stok['status'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="jumlah">Jumlah Material</label>
                  <input type="number" name="jumlah" value="1" class="form-control" id="jumlah" min="1" required>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="id_sb">Satuan</label>
                  <select name="id_sb" class="form-control" id="id_sb" required>
                    <option value="" selected>Pilih Satuan</option>
                    <?php foreach ($view_satuan_barang as $data_select_satuan_barang) { ?>
                      <option value="<?= $data_select_satuan_barang['id_sb'] ?>"><?= $data_select_satuan_barang['satuan_barang'] ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="biaya_satuan">Biaya Material (per satuan)</label>
              <input type="number" name="biaya_satuan" value="1000" class="form-control" id="biaya_satuan" min="1000" required>
            </div>
          </div>
          <div class="modal-footer justify-content-center border-top-0">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
            <button type="submit" name="add_stok_material" class="btn btn-primary btn-sm">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="export" tabindex="-1" aria-labelledby="exportLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-bottom-0 shadow">
          <h5 class="modal-title" id="exportLabel">Export Stok Material</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label for="format_file">Format</label>
              <select name="format_file" id="format_file" class="form-select form-control" required>
                <option selected value="">Pilih Format</option>
                <option value="pdf">PDF</option>
                <option value="excel">Excel</option>
              </select>
            </div>
          </div>
          <div class="modal-footer justify-content-center border-top-0">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
            <button type="submit" name="export_stok_material" class="btn btn-primary btn-sm">Export</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php require_once("../templates/views_bottom.php") ?>