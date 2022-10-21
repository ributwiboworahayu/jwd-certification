<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('main');
        $this->load->view('templates/footer');
    }

    public function pemesanan()
    {
        $nama = htmlspecialchars($this->input->post('nama', true));
        $nomorid = $this->input->post('nomorid');
        $nohp = $this->input->post('nohp');
        $wisata = $this->input->post('wisata');
        $tglkunjung = $this->input->post('tglkunjung');
        $dewasa = $this->input->post('dewasa');
        $anak = $this->input->post('anak');
        $harga = $this->input->post('harga');
        $total = $this->input->post('total');

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama Harus Diisi!'
        ]);
        $this->form_validation->set_rules('nomorid', 'Noid', 'required', [
            'required' => 'Nomor Identitas Harus Diisi!'
        ]);
        $this->form_validation->set_rules('nohp', 'nohp', 'required|trim', [
            'required' => 'No HP Harus Diisi!'
        ]);
        $this->form_validation->set_rules('wisata', 'wisata', 'required|trim', [
            'required' => 'Tempat Wisata Harus Diisi!'
        ]);
        $this->form_validation->set_rules('tglkunjung', 'tglkunjung', 'required|trim', [
            'required' => 'Tanggal Kunjungan Harus Diisi!'
        ]);
        if ($dewasa == 0 || $anak == 0 && $total == 0) {
            $this->form_validation->set_rules('pengunjung', 'pengunjung', 'required|trim', [
                'required' => 'Pengunjung Harus Diisi Salah Satu!'
            ]);
            $this->form_validation->set_rules('totalbayar', 'total', 'required|trim', [
                'required' => 'Total Bayar Harus Dihitung Terlebih Dahulu!'
            ]);
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('pemesanan');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => $nama,
                'no_id' => $nomorid,
                'no_hp' => $nohp,
                'tglkunjung' => $tglkunjung,
                'tempat_wisata' => $wisata,
                'pengunjung_dewasa' => $dewasa,
                'pengunjung_anak' => $anak,
                'hargatiket' => $harga,
                'total_bayar' => $total
            ];

            $this->db->insert('data_pemesanan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Tiket Berhasil Dipesan!
            </div>');
            redirect(base_url('main/tiket?nama=' . $nama . '&tglkunjung=' . $tglkunjung));
        }
    }

    public function dataPemesanan()
    {
        $data['pemesanan'] = $this->db->get('data_pemesanan')->result();

        $this->load->view('templates/header');
        $this->load->view('data-pemesanan', $data);
        $this->load->view('templates/footer');
    }

    public function editPemesanan($id)
    {
        $data['pemesanan'] = $this->db->get_where('data_pemesanan', ['id' => $id])->row();
        $nama = htmlspecialchars($this->input->post('nama', true));
        $nomorid = $this->input->post('nomorid');
        $nohp = $this->input->post('nohp');
        $wisata = $this->input->post('wisata');
        $tglkunjung = $this->input->post('tglkunjung');
        $dewasa = $this->input->post('dewasa');
        $anak = $this->input->post('anak');
        $harga = $this->input->post('harga');
        $total = $this->input->post('total');

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama Harus Diisi!'
        ]);
        $this->form_validation->set_rules('nomorid', 'Noid', 'required', [
            'required' => 'Nomor Identitas Harus Diisi!'
        ]);
        $this->form_validation->set_rules('nohp', 'nohp', 'required|trim', [
            'required' => 'No HP Harus Diisi!'
        ]);
        $this->form_validation->set_rules('wisata', 'wisata', 'required|trim', [
            'required' => 'Tempat Wisata Harus Diisi!'
        ]);
        $this->form_validation->set_rules('tglkunjung', 'tglkunjung', 'required|trim', [
            'required' => 'Tanggal Kunjungan Harus Diisi!'
        ]);
        if ($dewasa == 0 || $anak == 0 && $total == 0) {
            $this->form_validation->set_rules('pengunjung', 'pengunjung', 'required|trim', [
                'required' => 'Pengunjung Harus Diisi Salah Satu!'
            ]);
            $this->form_validation->set_rules('totalbayar', 'total', 'required|trim', [
                'required' => 'Total Bayar Harus Dihitung Terlebih Dahulu!'
            ]);
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('edit-pemesanan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => $nama,
                'no_id' => $nomorid,
                'no_hp' => $nohp,
                'tglkunjung' => $tglkunjung,
                'tempat_wisata' => $wisata,
                'pengunjung_dewasa' => $dewasa,
                'pengunjung_anak' => $anak,
                'hargatiket' => $harga,
                'total_bayar' => $total
            ];

            $this->db->where('id', $id);
            $this->db->update('data_pemesanan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Tiket Berhasil Diedit!
            </div>');
            redirect(base_url('main/datapemesanan'));
        }
    }

    public function hapusPemesanan($id)
    {
        $this->db->delete('data_pemesanan', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Tiket Berhasil Dihapus!
        </div>');
        redirect(base_url('main/datapemesanan'));
    }

    public function tiket()
    {
        $nama = $this->input->get('nama');
        $tglkunjung =  $this->input->get('tglkunjung');

        $data['pemesan'] = $this->db->get_where('data_pemesanan', ['nama' => $nama, 'tglkunjung' => $tglkunjung])->row();
        $this->load->view('templates/header');
        $this->load->view('tiket', $data);
        $this->load->view('templates/footer');
    }

    public function tempatWisata()
    {
        $wisata = htmlspecialchars($this->input->post('tempat', true));
        $harga = $this->input->post('harga');

        $data['tempat'] = $this->db->get_where('tempat_wisata')->result();

        if (!isset($_POST['tempat'])) {
            $this->load->view('templates/header');
            $this->load->view('data-tempat', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'tempat_wisata' => $wisata,
                'hargatiket' => $harga
            ];

            $this->db->insert('tempat_wisata', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Tempat Wisata Berhasil Ditambah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect(base_url('main/tempatwisata'));
        }
    }

    public function hapusTempat($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tempat_wisata');
    }

    public function getWisata($id = null)
    {
        if ($id == null) {
            $data = $this->db->get('tempat_wisata')->result();
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        } else {
            $data = $this->db->get_where('tempat_wisata', ['id' => $id])->row();
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    public function getEditPesan($id)
    {
        $data = $this->db->get_where('data_pemesanan', ['id' => $id])->row();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function simpanEditWisata($id)
    {
        $wisata = htmlspecialchars($this->input->post('tempat', true));
        $harga = $this->input->post('harga');

        $data = [
            'tempat_wisata' => $wisata,
            'hargatiket' => $harga
        ];

        $this->db->where('id', $id);
        $this->db->update('tempat_wisata', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Tempat Wisata Berhasil Diedit!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect(base_url('main/tempatwisata'));
    }
}
