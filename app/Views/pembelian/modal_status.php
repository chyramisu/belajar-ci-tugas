<?php foreach ($transactions as $trx) : ?>

<div class="modal fade" id="statusModal-<?= $trx['id'] ?>" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Ubah Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <?= form_open(base_url('pembelian/status/'.$trx['id'])) ?>

            <div class="modal-body">

                <div class="mb-3">

                    <label>Status</label>

                    <select name="status" class="form-control">

                        <option value="0"
                        <?= $trx['status']==0?'selected':'' ?>>
                            Belum Selesai
                        </option>

                        <option value="1"
                        <?= $trx['status']==1?'selected':'' ?>>
                            Sudah Selesai
                        </option>

                    </select>

                </div>

            </div>

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">
                    Close
                </button>

                <button
                    type="submit"
                    class="btn btn-primary">
                    Simpan
                </button>

            </div>

            <?= form_close() ?>

        </div>
    </div>
</div>

<?php endforeach ?>