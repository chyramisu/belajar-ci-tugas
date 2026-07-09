<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php
if (session()->getFlashData('success')) {
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>

<?php if ($discount): ?>
    <div class="alert alert-success">
        Hari ini ada diskon
        <strong><?= number_to_currency($discount['nominal'], 'IDR') ?></strong>
        per item.
    </div>
<?php endif; ?>

<!-- Table with stripped rows -->
<div class="row">
    <?php foreach ($products as $key => $item) : ?>     
        <?php
        $hargaDiskon = $item['harga'];

        if ($discount) {
            $hargaDiskon = $item['harga'] - $discount['nominal'];

            if ($hargaDiskon < 0) {
                $hargaDiskon = 0;
            }
        }

        ?>   
            <div class="col-lg-6">
            <?= form_open('keranjang') ?>
            <?= form_hidden([
                    'id'    => $item['id'],
                    'nama'  => $item['nama'],
                    'harga' => $item['harga'],
                    'foto'  => $item['foto']]) ?>


                <div class="card">
                    <div class="card-body">
                        <img src="<?= base_url() . "img/" . $item['foto'] ?>" alt="..." width="50%">
                        <h5 class="card-title">
                            <?= $item['nama'] ?><br>

                            <?php if ($discount): ?>
                            <small class="text-danger">
                                <del><?= number_to_currency($item['harga'], 'IDR') ?></del>
                            </small><br>

                            <?= number_to_currency($hargaDiskon, 'IDR') ?>

                        <?php else: ?>

                            <?= number_to_currency($item['harga'], 'IDR') ?>

                        <?php endif; ?>
                        </h5>
                        <button type="submit" class="btn btn-info rounded-pill">Beli</button>
                    </div>
                </div>


                <?= form_close() ?>
            </div>
    <?php endforeach ?>
</div>
<!-- End Table with stripped rows -->
<?= $this->endSection() ?>
