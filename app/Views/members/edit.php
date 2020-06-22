<div class="container">
  <div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
      <div class="container">
        <h3>Ubah Data Anggota</h3>
        <hr>
        <?php if (session()->get('success')): ?>
          <div class="alert alert-success" role="alert">
            <?= session()->get('success') ?>
          </div>
        <?php endif; ?>
        <form class="" action="<?= current_url() ?>" method="post">
          <input type="hidden" name="id" value="<?= set_value('id', $user['id']) ?>">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
               <label for="nik">NIK</label>
               <input type="number" class="form-control" name="nik" id="nik" value="<?= set_value('nik', $user['nik']) ?>">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
               <label for="fullname">Nama Lengkap</label>
               <input type="text" class="form-control" name="fullname" id="fullname" value="<?= set_value('fullname', $user['fullname']) ?>">
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <div class="form-group">
               <label for="phone">No. Telp</label>
               <input type="tel" class="form-control" name="phone" id="phone" value="<?= set_value('phone', $user['phone']) ?>">
              </div>
            </div>
            <div class="col-12 col-sm-8">
              <div class="form-group">
               <label for="email">Email address</label>
               <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email', $user['email']) ?>">
              </div>
            </div>
            <div class="col-12">
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" rows="2"><?= set_value('alamat', $user['alamat']) ?></textarea>
            </div>
            </div>
          <?php if (isset($validation)): ?>
            <div class="col-12">
              <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors() ?>
              </div>
            </div>
          <?php endif; ?>
          </div>

          <div class="row">
            <div class="col-12 col-sm-4">
              <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
            <div class="col-12 col-sm-8 text-right">
              <a href="../list">Kembali ke list</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="row">
      <span style="visibility: hidden">dddd</span>
  </div>
</div>
