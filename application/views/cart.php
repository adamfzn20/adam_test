<div class="container-fluid">
    <h4>Shopping Cart</h4>

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Sub-Total</th>
            <th>Action</th>
        </tr>

        <?php
        $no = 1;
        foreach ($this->cart->contents() as $items) : ?>

            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $items['name'] ?></td>
                <td><?php echo $items['qty'] ?></td>
                <td align="right">Rp. <?php echo number_format($items['price'], 0, ',', '.') ?></td>
                <td align="right">Rp. <?php echo number_format($items['subtotal'], 0, ',', '.') ?></td>
                <td>
                    <a href="<?php echo base_url('dashboard/remove_from_cart/' . $items['rowid']); ?>">
                        <div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4"></td>
            <td align="right">Rp. <?php echo number_format($this->cart->total(), 0, ',', '.') ?></td>
        </tr>

    </table>

    <div align="right">
        <a href="<?php echo base_url('dashboard/remove_cart') ?>">
            <div class="btn btn-sm btn-danger">Remove Cart</div>
        </a>
        <a href="<?php echo base_url('welcome') ?>">
            <div class="btn btn-sm btn-primary">Continue Shopping</div>
        </a>
        <a href="<?php echo base_url('dashboard/checkout') ?>">
            <div class="btn btn-sm btn-success">Checkout</div>
        </a>
    </div>
</div>