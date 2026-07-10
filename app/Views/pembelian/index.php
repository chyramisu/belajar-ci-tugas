<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<table class="table datatable">
<thead>
<tr>
    <th>ID</th>
    <th>Pembeli</th>
    <th>Tanggal</th>
    <th>Total</th>
    <th>Alamat</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>

<?php foreach($transactions as $trx): ?>

<tr>

<td><?= $trx['id'] ?></td>

<td><?= $trx['username'] ?></td>

<td><?= $trx['created_at'] ?></td>

<td><?= number_to_currency($trx['total_harga'],'IDR') ?></td>

<td><?= $trx['alamat'] ?></td>

<td>

<?php if($trx['status']==0): ?>

<span class="badge bg-warning">
Belum Selesai
</span>

<?php else: ?>

<span class="badge bg-primary">
Sudah Selesai
</span>

<?php endif; ?>

</td>

<td>
    <button
        class="btn btn-info"
        data-bs-toggle="modal"
        data-bs-target="#detailModal-<?= $trx['id'] ?>">
        Detail
    </button>

    <button
        class="btn btn-success"
        data-bs-toggle="modal"
        data-bs-target="#statusModal-<?= $trx['id'] ?>">
        Ubah Status
    </button>
</td>

</tr>

<?php endforeach ?>

</tbody>

</table>

<?= $this->include('pembelian/modal_detail') ?>
<?= $this->include('pembelian/modal_status') ?>
<?= $this->endSection() ?>