<?= $this->extend('layout') ?>
<?= $this->section('content') ?> 
<!-- Table with stripped rows -->
<?php
if (session()->getFlashData('success')) {
?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>
<?php
if (session()->getFlashData('failed')) {
?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('failed') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
    Tambah Data
</button>

<table class="table datatable">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Nominal</th>
        <th scope="col"></th>
    </tr>
</thead>
<tbody>
    <?php foreach ($discounts as $index => $discount) : ?>
        <tr>
            <th scope="row"><?= $index + 1 ?></th>
            <td><?= $discount['tanggal'] ?></td>
            <td><?= number_to_currency($discount['nominal'], 'IDR') ?></td>
                <td>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal-<?= $discount['id'] ?>">
                        Ubah
                    </button>
                    <a href="<?= base_url('diskon/delete/' . $discount['id']) ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data ini ?')">
                        Hapus
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<!-- End Table with stripped rows --> 

<?= $this->include('discount/modal_add') ?>
<?= $this->include('discount/modal_edit') ?>

<?= $this->endSection() ?>