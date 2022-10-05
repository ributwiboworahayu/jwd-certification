<div class="container shadow-lg mt-5 pt-5 pb-5 mb-5">
    <div class="col-md-9 mx-auto pb-2 mt-3">
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('main/editpemesanan/' . $pemesanan->id) ?>" method="POST">
            <div class="pb-3 text-center mb-5">
                <h4>FORM PEMESANAN</h4>
            </div>
            <div class="row">
                <label for="nama" class="col-sm-4">Nama Lengkap</label>
                <div class="form-group  col-sm-8">
                    <input type="text" name="nama" class="form-control" id="nama" value="<?= $pemesanan->nama ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="row">
                <label for="nomorid" class="col-sm-4">Nomor Identitas</label>
                <div class="form-group  col-sm-8">
                    <input type="text" name="nomorid" class="form-control" id="nomorid" value="<?= $pemesanan->no_id ?>">
                    <?= form_error('nomorid', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="row">
                <label for="nohp" class="col-sm-4">No. HP</label>
                <div class="form-group  col-sm-8">
                    <input type="number" name="nohp" class="form-control" id="nohp" value="<?= $pemesanan->no_hp ?>">
                    <?= form_error('nohp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="row">
                <label for="tempat" class="col-sm-4">Tempat Wisata</label>
                <div class="form-group col-sm-8">
                    <select class="custom-select custom-select-sm" name="wisata" id="wisata">
                        <option selected disabled> -- Pilih --- </option>
                    </select>
                    <small class="text-danger pl-3 alert-wisata" hidden>Pilih Tempat Wisata Terlebih Dahulu!</small>
                    <?= form_error('wisata', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="row">
                <label for="tglkunjung" class="col-sm-4">Tanggal Kunjungan</label>
                <div class="form-group  col-sm-8">
                    <input type="date" class="form-control" id="tglkunjung" name="tglkunjung" value="<?= $pemesanan->tglkunjung ?>">
                    <?= form_error('tglkunjung', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class=" row ">
                <label for=" dewasa" class="col-sm-4">Pengunjung Dewasa</label>
                <div class=" form-group col-sm-8">
                    <input type="number" class="form-control" id="dewasa" name="dewasa" min="0" value="<?= $pemesanan->pengunjung_dewasa ?>">
                    <?= form_error('pengunjung', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="row">
                <label for="anak" class="col-sm-4">Pengunjung Anak-anak<br><small class="text-muted">Usia di bawah 12 tahun</small></label>
                <div class="form-group  col-sm-8">
                    <input type="number" class="form-control" id="anak" name="anak" min="0" value="<?= $pemesanan->pengunjung_anak ?>">
                    <?= form_error('pengunjung', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="row">
                <label for="harga" class="col-sm-4">Harga Tiket</label>
                <div class="form-group  col-sm-8">
                    <input type="text" class="form-control" id="harga" name="harga" readonly>
                </div>
            </div>
            <div class="row">
                <label for="total" class="col-sm-4">total Bayar</label>
                <div class="form-group  col-sm-8">
                    <input type="text" class="form-control" id="total" name="total" readonly>
                    <?= form_error('totalbayar', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="checklis">
                <label class="form-check-label" for="checklis">Saya dan/atau rombongan telah membaca, memahami dan setuju berdasarkan syarat dan ketentuan yang telah ditetapkan,</label>
            </div>
            <div class="text-center">
                <input type="button" class="btn btn-danger col-md-3" id="countAll" value="Hitung Total Bayar"></input>
                <input type="submit" class="btn btn-danger col-md-3" disabled id="pesan" value="Edit Tiket"></input>
                <a href="<?= base_url('main/datapemesanan') ?>" class="btn btn-danger col-md-3">Batal</a>
            </div>
        </form>

    </div>
</div>