<div class="container mt-5">
    <h2>Edit Data Buku</h2>
    <?php if (isset($validation)) : ?>
        <div class="alert alert-danger">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>
    <form action="<?= base_url('/buku/edit/' . $buku['id']) ?>" method="post">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="<?= set_value('judul', $buku['judul']) ?>">
        </div>
        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" class="form-control" id="penulis" name="penulis" value="<?= set_value('penulis', $buku['penulis']) ?>">
        </div>
        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= set_value('penerbit', $buku['penerbit']) ?>">
        </div>
        <div class="mb-3">
            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
            <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?= set_value('tahun_terbit', $buku['tahun_terbit']) ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= base_url('/buku') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>