<?php require_once("../controller/dashboard.php");
$_SESSION["project_mitra_agung_malaka"]["name_page"] = "";
require_once("../templates/views_top.php"); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  <div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Bahan Material</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= mysqli_num_rows($view_bahan_material) ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-snowplow fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Stok Material</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= mysqli_num_rows($view_stok_material) ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dolly-flatbed fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                Material Keluar</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= mysqli_num_rows($view_material_keluar) ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dolly fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                Kontak</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= mysqli_num_rows($views_kontak) ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">

    <!-- Chart Line -->
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Pendapatan</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="stok-material">Stok Material</a>
              <a class="dropdown-item" href="material-keluar">Material Keluar</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <?php
            $chart_material_keluar = "SELECT 
                        MONTH(material_keluar.created_at) as bulan,
                        SUM(material_keluar.jumlah_keluar) as total_material_keluar,
                        SUM(material_keluar.biaya) as total_pendapatan
                        FROM material_keluar 
                        JOIN stok_material ON material_keluar.id_sm = stok_material.id_sm 
                        JOIN bahan_material ON stok_material.id_bm = bahan_material.id_bm 
                        GROUP BY MONTH(material_keluar.created_at)";
            $view_chart_material_keluar = mysqli_query($conn, $chart_material_keluar);
            $bulan = [];
            $total_material_keluar = [];
            $total_pendapatan = [];
            while ($row = mysqli_fetch_assoc($view_chart_material_keluar)) {
              $bulan[] = $row['bulan'];
              $total_material_keluar[] = $row['total_material_keluar'];
              $total_pendapatan[] = $row['total_pendapatan'];
            }
            ?>
            <canvas id="chartMaterialKeluar"></canvas>
            <script>
              var bulan = <?php echo json_encode($bulan); ?>;
              var total_material_keluar = <?php echo json_encode($total_material_keluar); ?>;
              var total_pendapatan = <?php echo json_encode($total_pendapatan); ?>;
              var bulanLabels = bulan.map(function(item) {
                const bulanNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                return bulanNames[item - 1];
              });
              var ctx = document.getElementById('chartMaterialKeluar').getContext('2d');
              var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                  labels: bulanLabels,
                  datasets: [{
                      label: 'Total Material Keluar',
                      data: total_material_keluar,
                      backgroundColor: 'rgba(75, 192, 192, 0.2)',
                      borderColor: 'rgba(75, 192, 192, 1)',
                      borderWidth: 1
                    },
                    {
                      label: 'Total Pendapatan',
                      data: total_pendapatan,
                      backgroundColor: 'rgba(153, 102, 255, 0.2)',
                      borderColor: 'rgba(153, 102, 255, 1)',
                      borderWidth: 1
                    }
                  ]
                },
                options: {
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  }
                }
              });
            </script>
          </div>
        </div>
      </div>
    </div>

    <!-- Chart Pie -->
    <div class="col-xl-4 col-lg-5">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Bahan Material</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="bahan-material">List Material</a>
              <a class="dropdown-item" href="stok-material">Detail Material</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="chart-pie pt-4 pb-2">
            <?php
            $chart_stok_material = "SELECT bahan_material.nama_material, stok_material.jumlah
                                            FROM stok_material
                                            JOIN bahan_material ON stok_material.id_bm = bahan_material.id_bm";
            $view_chart_stok_material = mysqli_query($conn, $chart_stok_material);
            if (!$view_chart_stok_material) {
              die("Query gagal: " . mysqli_error($conn));
            }
            $data = array();
            while ($row = mysqli_fetch_assoc($view_chart_stok_material)) {
              $data[] = $row;
            }
            $labels = array();
            $jumlah_stok = array();
            foreach ($data as $item) {
              $labels[] = $item['nama_material'];
              $jumlah_stok[] = $item['jumlah'];
            }
            $labels_json = json_encode($labels);
            $jumlah_stok_json = json_encode($jumlah_stok);
            ?>
            <canvas id="pieStokMaterial"></canvas>
            <script>
              const labels = <?php echo $labels_json; ?>;
              const data = <?php echo $jumlah_stok_json; ?>;
              const backgroundColors = [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
              ];
              const borderColors = [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
              ];
              const pieCtx = document.getElementById('pieStokMaterial').getContext('2d');
              const myPieChart = new Chart(pieCtx, {
                type: 'pie',
                data: {
                  labels: labels,
                  datasets: [{
                    data: data,
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 1
                  }]
                },
                options: {
                  responsive: true,
                  plugins: {
                    legend: {
                      position: 'top',
                    },
                    tooltip: {
                      callbacks: {
                        label: function(tooltipItem) {
                          return labels[tooltipItem.dataIndex] + ': ' + data[tooltipItem.dataIndex];
                        }
                      }
                    }
                  }
                }
              });
              var legendHtml = '';
              labels.forEach((label, index) => {
                legendHtml += `<span class="mr-2">
                                            <i class="fas fa-circle" style="color:${borderColors[index]}"></i> ${label}
                                           </span>`;
              });
              document.getElementById('legendPieChart').innerHTML = legendHtml;
            </script>
          </div>
          <div id="legendPieChart" class="mt-4 text-center small"></div>
        </div>
      </div>
    </div>

  </div>

  <div class="row">

    <?php if ($id_role == 1 || $id_role == 2) { ?>
      <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Material Keluar</h6>
          </div>
          <form action="" method="post">
            <div class="card-body">
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
            <div class="card-footer justify-content-center border-top-0">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
              <button type="submit" name="add_material_keluar" class="btn btn-primary btn-sm">Tambah</button>
            </div>
          </form>
        </div>
      </div>
    <?php } ?>

    <?php if ($id_role == 1 || $id_role == 2) { ?>
      <div class="col-xl-8 col-lg-7">
      <?php } else if ($id_role == 3 || $id_role == 4) { ?>
        <div class="col-xl-12 col-lg-12">
        <?php } ?>
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Material Keluar</h6>
            <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Action :</div>
                <a class="dropdown-item" href="material-keluar">Lihat Detail</a>
              </div>
            </div>
          </div>
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
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        </div>

      </div>

  </div>
  <!-- /.container-fluid -->

  <?php require_once("../templates/views_bottom.php") ?>