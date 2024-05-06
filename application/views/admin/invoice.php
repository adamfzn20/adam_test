<div class="container-fluid">
    <h4>Invoice Pemesanan</h4>
    <?php if (!empty($invoice)) : ?>
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <th>Id Invoice</th>
                <th>Nama Pemesan</th>
                <th>No HP</th>
                <th>Alamat Pengiriman</th>
                <th>Tanggal Pemesanan</th>
                <th>Batas Pembayaran</th>
                <th>Action</th>
            </tr>

            <?php foreach ($invoice as $inv) : ?>

                <tr>
                    <td><?php echo $inv->id ?></td>
                    <td><?php echo $inv->nama ?></td>
                    <td><?php echo $inv->no_hp ?></td>
                    <td><?php echo $inv->alamat ?></td>
                    <td><?php echo $inv->tgl_pesan ?></td>
                    <td><?php echo $inv->batas_bayar ?></td>
                    <td><?php echo anchor(
                            'admin/invoice/detail/' . $inv->id,
                            '<div class="btn btn-sm btn-primary">Detail</div>'
                        ) ?>
                    </td>
                </tr>

            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p>Tidak ada pesanan yang ditemukan.</p>
    <?php endif; ?>
</div>