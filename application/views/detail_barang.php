<div class="container-fluid">
    <div class="card">
        <h5 class="card-header">Detail Produk</h5>
        <div class="card-body">

            <?php foreach ($barang as $brg) : ?>
                <div class="row">
                    <div class="col-md-4">
                        <img class="card-img-top" src="<?php echo base_url() . '/uploads/' . $brg->gambar ?>">
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td>Nama Produk</td>
                                <td><strong><?php echo $brg->nama_brg ?></strong></td>
                            </tr>
                            <tr>
                                <td>keterangan</td>
                                <td><strong><?php echo $brg->keterangan ?></strong></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td><strong><?php echo $brg->kategori ?></strong></td>
                            </tr>
                            <tr>
                                <td>stok</td>
                                <td><strong><?php echo $brg->stok ?></strong></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td><strong>
                                        <div class="btn btn-sm btn-success">Rp. <?php echo number_format($brg->harga, 0, ',', '.') ?></div>
                                    </strong></td>
                            </tr>
                        </table>

                        <?php echo anchor('dashboard/add_to_cart/' . $brg->id_brg, '<div class="btn btn-sm btn-primary">Add to Cart</div>') ?>
                        <?php echo anchor('dashboard/index/', '<div class="btn btn-sm btn-danger">Back</div>') ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>