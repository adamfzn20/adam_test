<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn btn-sm btn-success">
                <?php
                $grand_total = 0;
                if ($carts = $this->cart->contents()) {
                    foreach ($carts as $item) {
                        $grand_total = $grand_total + $item['subtotal'];
                    }
                    echo "<h4>Cart Subtotal: Rp. " . number_format($grand_total, 0, ',', '.');

                ?>
            </div><br><br>

            <h3>Input Alamat Pengiriman dan Pembayaran</h3>
            <form action="<?php echo base_url() . 'dashboard/process' ?>" method="post">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="hidden" name="id_user" class="form-control" value="<?php echo $this->session->userdata('id') ?>">
                    <input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control" value="<?php echo $this->session->userdata('nama') ?>">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
                </div>
                <div class="form-group">
                    <label>No Hp</label>
                    <input type="text" name="no_hp" placeholder="No HP" class="form-control" value="<?php echo $this->session->userdata('no_hp') ?>">
                </div>
                <div class="form-group">
                    <label>Jasa Pengirim</label>
                    <select name="jasa_pengirim" class="form-control">
                        <option>JNE</option>
                        <option>JNT</option>
                        <option>NINJA</option>
                        <option>ANTER AJA</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Pilih Bank</label>
                    <select name="bank" class="form-control">
                        <option>BCA - XXXXXXXXXXX </option>
                        <option>BNI - XXXXXXXXXXX</option>
                        <option>BRI - XXXXXXXXXXX</option>
                        <option>MANDIRI - XXXXXXXXXXX</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Payment</button>
            </form>
        <?php
                } else {
                    echo "Cart Anda Kosong";
                }
        ?>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>