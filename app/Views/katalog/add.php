<div class="container">
  <div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-4 mb-4 pt-3 pb-3 bg-white from-wrapper">
      <div class="container">
        <h3>Tambah Buku</h3>
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
               <label for="ISBN">ISBN</label>
               <input type="number" class="form-control" name="ISBN" id="ISBN" value="<?= set_value('ISBN') ?>">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
               <label for="judul">Judul Buku</label>
               <input type="text" class="form-control" name="judul" id="judul" value="<?= set_value('judul') ?>">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
               <label for="pengarang">Pengarang</label>
               <input type="text" class="form-control" name="pengarang" id="pengarang" value="<?= set_value('pengarang') ?>">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
               <label for="penerbit">Penerbit</label>
               <input type="text" class="form-control" name="penerbit" id="penerbit" value="<?= set_value('penerbit') ?>">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
               <label for="tahun_terbit">Tahun Terbit</label>
               <input type="text" class="form-control" name="tahun_terbit" id="tahun_terbit" value="<?= set_value('tahun_terbit') ?>">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
               <label for="kategori">Kategori</label>
               <input type="text" class="form-control" name="kategori" id="kategori" value="<?= set_value('kategori') ?>">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
               <label for="eksemplar">Eksemplar</label>
               <input type="number" class="form-control" name="eksemplar" id="eksemplar" value="<?= set_value('eksemplar') ?>">
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
</div>
