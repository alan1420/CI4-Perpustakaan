<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <h2>Daftar Anggota</h2>
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
                        <th scope="col">Member ID</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">No. Telp</th>
                        <th scope="col">Email</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Tanggal Registrasi</th>
                        <th scope="col" colspan="2" >Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 0; 
                    foreach ($anggota as $anggota):?>
                    <tr>
                        <th scope="row"><?= $counter += 1 ?></th>
                        <td><?= $anggota['id']; ?></td>
                        <td><?= $anggota['nik']; ?></td>
                        <td><?= $anggota['fullname']; ?></td>
                        <td><?= $anggota['phone']; ?></td>
                        <td><?= $anggota['email']; ?></td>
                        <td><?= $anggota['alamat']; ?></td>
                        <td><?= $anggota['created_at']; ?></td>
                        <td><a href="edit/<?=$anggota['id'];?>" class="btn btn-success">Edit</a></td>
                        <td><a href="delete/<?=$anggota['id'];?>" class="btn btn-danger">Delete</a></td>
                    </tr>    
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
    
</div>