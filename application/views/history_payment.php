<div class="container-fluid">
    <h4>History</h4>
    <?php if (!empty($pesanan)) : ?>
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <th>Id Barang</th>
                <th>Nama Produk</th>
                <th>Jumlah Pesanan</th>
                <th>Harga Satuan</th>
                <th>Sub Total</th>

            </tr>

            <?php
            foreach ($pesanan as $psn) :
                $subtotal = $psn->jumlah * $psn->harga;
            ?>

                <tr>
                    <td><?php echo $psn->id_brg ?></td>
                    <td><?php echo $psn->nama_brg ?></td>
                    <td><?php echo $psn->jumlah ?></td>
                    <td><?php echo number_format($psn->harga, 0, ',', '.') ?></td>
                    <td><?php echo number_format($subtotal, 0, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p>Tidak ada pesanan yang ditemukan.</p>
    <?php endif; ?>

    <a href="<?php echo base_url('welcome') ?>">
        <div class="btn btn-sm btn-primary">Back</div>
    </a>
</div>