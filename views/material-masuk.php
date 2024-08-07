<?php require_once("../controller/material-masuk.php");
$_SESSION["project_mitra_agung_malaka"]["name_page"] = "Material Masuk";
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
              <th class="text-center">Nama Pengantar</th>
              <th class="text-center">No. Plat Kendaraan</th>
              <th class="text-center">Nama Material</th>
              <th class="text-center">Status</th>
              <th class="text-center">Tgl Masuk</th>
              <th class="text-center">Tgl Ubah</th>
              <?php if ($id_role == 1 || $id_role == 2) { ?>
                <th class="text-center" style="width: 200px;">Aksi</th>
              <?php } ?>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th class="text-center">Nama Pengantar</th>
              <th class="text-center">No. Plat Kendaraan</th>
              <th class="text-center">Nama Material</th>
              <th class="text-center">Status</th>
              <th class="text-center">Tgl Masuk</th>
              <th class="text-center">Tgl Ubah</th>
              <?php if ($id_role == 1 || $id_role == 2) { ?>
                <th class="text-center">Aksi</th>
              <?php } ?>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($view_material_masuk as $data) { ?>
              <tr>
                <td><?= $data['nama_sopir'] ?></td>
                <td><?= $data['no_plat'] ?></td>
                <td><?= $data['nama_material'] ?></td>
                <td><?= $data['status'] ?></td>
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
                                <label for="id_sopir">Pengantar</label>
                                <select name="id_sopir" class="form-control" id="id_sopir" required>
                                  <option value="" selected>Pilih Pengantar</option>
                                  <?php $id_sopir = $data['id_sopir'];
                                  foreach ($view_sopir as $data_select_sopir) {
                                    $selected = ($data_select_sopir['id_sopir'] == $id_sopir) ? 'selected' : ''; ?>
                                    <option value="<?= $data_select_sopir['id_sopir'] ?>" <?= $selected ?>><?= $data_select_sopir['nama_sopir'] ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="modal-footer justify-content-center border-top-0">
                              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                              <button type="submit" name="edit" class="btn btn-warning btn-sm">Ubah</button>
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
                              <button type="submit" name="delete" class="btn btn-danger btn-sm">hapus</button>
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
          <h5 class="modal-title" id="tambahLabel">Tambah Material Masuk</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label for="id_sopir">Pengantar</label>
              <select name="id_sopir" class="form-control" id="id_sopir" required>
                <option value="" selected>Pilih Pengantar</option>
                <?php foreach ($view_sopir as $data_select_sopir) { ?>
                  <option value="<?= $data_select_sopir['id_sopir'] ?>"><?= $data_select_sopir['nama_sopir'] ?></option>
                <?php } ?>
              </select>
            </div>
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
            <button type="submit" name="add" class="btn btn-primary btn-sm">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php require_once("../templates/views_bottom.php") ?>