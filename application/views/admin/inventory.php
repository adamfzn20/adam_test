<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#add_item"><i class="fas fa-plus fa-sm"></i> Add Item</button>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Keterangan</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th colspan="2">Action</th>
        </tr>

        <?php
        $no = 1;
        foreach ($barang as $brg) : ?>

            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $brg->nama_brg ?></td>
                <td><?php echo $brg->keterangan ?></td>
                <td><?php echo $brg->kategori ?></td>
                <td><?php echo number_format($brg->harga, 0, ',', '.') ?></td>
                <td><?php echo $brg->stok ?></td>
                <td>
                    <?php echo anchor('admin/inventory/edit/' . $brg->id_brg, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?>
                </td>
                <td>
                    <?php echo anchor('admin/inventory/delete/' . $brg->id_brg, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?>
                </td>

            <?php endforeach; ?>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="add_item" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Add Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'admin/inventory/add_action'; ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_brg" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="kategori">
                            <option>Fashion Pria</option>
                            <option>Fashion Wanita</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" name="harga" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Stok</label>
                        <input type="text" name="stok" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Gambar Produk</label>
                        <input type="file" name="gambar" class="form-control">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>