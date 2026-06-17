<div class="container mt-5">
    <h2>Data Buku</h2>
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    
    <div class="d-flex justify-content-between mb-3">
        <a href="<?= base_url('/buku/create') ?>" class="btn" style="background-color: #008000; color: white; border-color: #008000;">Tambah Data</a>
        <a href="<?= base_url('/logout') ?>" class="btn btn-danger">Logout</a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="text-white" style="background-color: #10B981;">
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($buku as $b) : ?>
                <tr>
                    <td><?= $b['id'] ?></td>
                    <td><?= $b['judul'] ?></td>
                    <td><?= $b['penulis'] ?></td>
                    <td><?= $b['penerbit'] ?></td>
                    <td><?= $b['tahun_terbit'] ?></td>
                    <td>
                        <a href="<?= base_url('/buku/edit/' . $b['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= base_url('/buku/delete/' . $b['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>