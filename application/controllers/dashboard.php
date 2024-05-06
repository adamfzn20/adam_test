<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role_id') != '2') {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
            );
            redirect('auth/login');
        }
    }

    public function add_to_cart($id)
    {
        $barang = $this->model_barang->find($id);
        $data = array(
            'id'      => $barang->id_brg,
            'qty'     => 1,
            'price'   => $barang->harga,
            'name'    => $barang->nama_brg
        );

        $this->cart->insert($data);
        redirect('welcome');
    }

    public function detail_cart()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('cart');
        $this->load->view('templates/footer');
    }

    public function remove_from_cart($id)
    {
        // $id = $this->url->segmen(3);
        $this->cart->remove($id);
        redirect('dashboard/detail_cart');
    }

    public function remove_cart()
    {
        $this->cart->destroy();
        redirect('welcome');
    }

    public function checkout()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('checkout');
        $this->load->view('templates/footer');
    }

    public function process()
    {
        $is_processed = $this->model_invoice->index();
        if ($is_processed) {
            $this->cart->destroy();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('process');
            $this->load->view('templates/footer');
        } else {
            echo 'Maaf Pesanan Anda Gagal diproses!!';
        }
    }

    public function detail($id_brg)
    {
        $data['barang'] = $this->model_barang->detail_brg($id_brg);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_barang', $data);
        $this->load->view('templates/footer');
    }

    public function history_payment($id_user)
    {
        $data['pesanan'] = $this->model_invoice->get_id_pesanan_by_user($id_user);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('history_payment', $data);
        $this->load->view('templates/footer');
    }
}
