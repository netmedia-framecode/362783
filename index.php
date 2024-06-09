<?php require_once("controller/visitor.php");
require_once("templates/top.php"); ?>

<div id="slides" class="section banner">
  <ul class="slides-container">
    <li>
      <img src="assets/img/banner-page.jpg" alt="">
      <div class="overlay-bg"></div>
      <div class="container">
        <div class="wrap-caption">
          <h2 class="caption-heading">
            PT Mitra Agung Malaka
          </h2>
          <p class="excerpt">Perusahaan jasa konstruksi yang membangun proyek jalan, jembatan dan lainnya</p>
          <a href="#tentang" class="btn btn-primary" title="Lihat Lebih">Lihat Lebih</a> <a href="#kontak" class="btn btn-secondary" title="Kontak">Kontak</a>
        </div>
      </div>
    </li>
  </ul>
</div>

<div class="section feature" id="tentang">
  <div class="container">

    <!-- <div class="row">
      <div class="col-sm-12 col-md-12">
        <div class="row overlap feature-gutter">
          <div class="col-sm-4 col-md-4 border-right">
            <div class="feature-box-8">
              <div class="media">
                <img src="images/why-thumb-1.jpg" alt="rud" class="img-responsive">
              </div>
              <div class="body">
                <a href="services-detail.html" class="title">Technology &amp; Innovation</a>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed</p>
                <a href="services-detail.html" class="readmore">READ MORE</a>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4 border-right">
            <div class="feature-box-8">
              <div class="media">
                <img src="images/why-thumb-2.jpg" alt="rud" class="img-responsive">
              </div>
              <div class="body">
                <a href="services-detail.html" class="title">Our Operations</a>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed</p>
                <a href="services-detail.html" class="readmore">READ MORE</a>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4">
            <div class="feature-box-8">
              <div class="media">
                <img src="images/why-thumb-3.jpg" alt="rud" class="img-responsive">
              </div>
              <div class="body">
                <a href="services-detail.html" class="title">The Great Teamwork</a>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed</p>
                <a href="services-detail.html" class="readmore">READ MORE</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    <div class="row">
      <div class="spacer-70"></div>
      <div class="col-sm-5 col-md-5">
        <div class="jumbo-heading">
          <h2>MEMIMPIN JALAN DALAM BANGUNAN DAN KONSTRUKSI SIPIL</h2>
        </div>
        <?php foreach ($views_tentang as $data) {
          echo $data['deskripsi'];
        } ?>
        <div class="spacer-30"></div>
      </div>
      <div class="col-sm-7 col-md-7">
        <div class="about-img">
          <div class="about-img-top">
            <div class="hover-img">
              <img src="assets/img/about-img-2.jpg" alt="" class="img-responsive">
            </div>
          </div>
          <div class="about-img-bottom">
            <div class="hover-img">
              <img src="assets/img/about-img-1.jpg" alt="" class="img-responsive">
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="spacer-70"></div>
    </div>
  </div>
</div>

<div class="section services" id="material">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12">
        <h2 class="section-heading center">
          Daftar Meterial
        </h2>
        <p class="text-center" style="margin-top: -40px;">Pilihan bahan material dengan detail yang dapat kamu tentukan sebelum menggunakan jasa kontraktor kami.</p>
      </div>
    </div>
    <div class="row list-services">
      <div class="table-responsive">
        <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="text-center">Nama Material</th>
              <th class="text-center">Status</th>
              <th class="text-center">Jumlah Stok</th>
              <th class="text-center">Satuan</th>
              <th class="text-center">Biaya (per satuan)</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th class="text-center">Nama Material</th>
              <th class="text-center">Status</th>
              <th class="text-center">Jumlah Stok</th>
              <th class="text-center">Satuan</th>
              <th class="text-center">Biaya (per satuan)</th>
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
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div id="kontak"></div>

<div class="section info overlap-bottom">
  <div class="container">
    <div class="row gutter-20">
      <div class="col-sm-5 col-md-5">
        <div class="box-icon-4">
          <div class="icon"><i class="bi bi-telephone"></i></div>
          <div class="body-content">
            <div class="heading">Telp. Kami</div>
            Office: +62 <br>
            Mobile: +62
          </div>
        </div>
        <div class="box-icon-4">
          <div class="icon"><i class="bi bi-geo-alt"></i></div>
          <div class="body-content">
            <div class="heading">Alamat</div>
            ALKANI DESA ALKANI KEC. WEWIKU - MALAKA, Nusa Tenggara Timur
          </div>
        </div>
      </div>
      <div class="col-sm-7 col-md-7">
        <h3 class="section-heading-2">
          Contact Details
        </h3>
        <form action="#" method="post">
          <div class="form-group">
            <input type="text" name="username" class="form-control" id="username" placeholder="Nama" required="">
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" id="email" placeholder="Email" required="">
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <input type="number" name="phone" class="form-control" id="phone" placeholder="Telp" required="">
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <textarea id="pesan" class="form-control" rows="6" placeholder="Tulis pensan kamu disini..."></textarea>
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <div id="success"></div>
            <button type="submit" name="add_kontak" class="btn btn-info">Kirim</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require_once("templates/bottom.php"); ?>