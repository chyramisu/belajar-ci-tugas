<?php foreach ($transactions as $trx) : ?>

<div class="modal fade" id="detailModal-<?= $trx['id'] ?>" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    Detail Pembelian #<?= $trx['id'] ?>
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body">

                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Diskon</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php
                    if (isset($products[$trx['id']])) :
                        foreach ($products[$trx['id']] as $item) :
                    ?>

                        <tr>

                            <td><?= $item['nama'] ?></td>

                            <td><?= $item['jumlah'] ?></td>

                            <td><?= number_to_currency($item['diskon'], 'IDR') ?></td>

                            <td><?= number_to_currency($item['subtotal_harga'], 'IDR') ?></td>

                        </tr>

                    <?php
                        endforeach;
                    endif;
                    ?>

                    </tbody>

                </table>

            </div>

        </div>
    </div>
</div>

<?php endforeach; ?>