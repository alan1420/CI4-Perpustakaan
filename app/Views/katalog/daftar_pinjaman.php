<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <h2>Daftar Pinjaman</h2>
            <hr>
            <?php if (session()->get('success')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->get('success') ?>
            </div>
            <?php endif; ?>
            <?php if (session()->get('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->get('error') ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Peminjam</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Tanggal Kembali</th>
                    </tr>
                </thead>
                <tbody>                    
                    <?php $counter = 0; 
                    foreach ($pinjaman as $pinjaman):?>
                    <tr>
                        <th scope="row"><?= $counter += 1 ?></th>
                        <td><?= $pinjaman->fullname ?></td>
                        <td><?= $pinjaman->judul ?></td>
                        <td><?= $pinjaman->ISBN ?></td>
                        <td><?= $pinjaman->tanggal_pinjam ?></td>
                        <td><?= $pinjaman->tanggal_kembali ?></td>
                    </tr>    
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
    
</div>