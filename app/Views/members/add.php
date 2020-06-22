<div class="container">
  <div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
      <div class="container">
        <h3>Tambah Anggota</h3>
        <hr>
        <?php if (session()->get('success')): ?>
          <div class="alert alert-success" role="alert">
            <?= session()->get('success') ?>
          </div>
        <?php endif; ?>
        <form class="" action="add" method="post">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
               <label for="nik">NIK</label>
               <input type="number" class="form-control" name="nik" id="nik" value="<?= set_value('nik') ?>">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
               <label for="fullname">Nama Lengkap</label>
               <input type="text" class="form-control" name="fullname" id="fullname" value="<?= set_value('fullname') ?>">
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <div class="form-group">
               <label for="phone">No. Telp</label>
               <input type="tel" class="form-control" name="phone" id="phone" value="<?= set_value('phone') ?>">
              </div>
            </div>
            <div class="col-12 col-sm-8">
              <div class="form-group">
               <label for="email">Email address</label>
               <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>">
              </div>
            </div>
            <div class="col-12">
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" rows="2"></textarea>
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
              <button type="submit" class="btn btn-primary">Tambah</button>
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
