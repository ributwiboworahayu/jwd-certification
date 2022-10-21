<div class="container mt-4 tabel-tempat-wisata">
    <div class="col mx-auto">
        <div class="card shadow">
            <div class="card-body">
                <?= $this->session->flashdata('message'); ?>
                <div class="card-header">
                    <a href="#" class="btn btn-sm btn-primary btn-form-tempat">Tambah</a>
                </div>
                <h4 class="card-title text-center pb-2 pt-2">Data Pemesanan</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tempat Wisata</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($tempat as $tmp) :
                            ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $tmp->tempat_wisata ?></td>
                                    <td>Rp. <?= $tmp->hargatiket ?></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-secondary btn-edit-tempat" data-id="<?= $tmp->id ?>">edit</a>
                                        <a href="<?= base_url('main/hapustempat/' . $tmp->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('yakin?');">hapus</a>
                                    </td>
                                </tr>
                                <?php $i++ ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container shadow-lg col-md-10 mt-5 pt-5 pb-5 mb-5 form-tambah-tempat" hidden>
    <div class="col-md-9 mx-auto pb-2 mt-3">
        <form action="<?= base_url('main/tempatwisata') ?>" id="form-wisata" method="POST">
            <div class="pb-3 text-center mb-5 title-form-tempat">
                <h4>FORM TAMBAH TEMPAT WISATA</h4>
            </div>
            <div class="row">
                <label for="tempat" class="col-sm-4">Nama Tempat Wisata</label>
                <div class="form-group  col-sm-8">
                    <input type="text" class="form-control" id="tempat" name="tempat" required oninvalid="this.setCustomValidity('Harus Diisi!')">
                </div>
            </div>
            <div class="row">
                <label for="harga" class="col-sm-4">Harga Tiket</label>
                <div class="form-group  col-sm-8">
                    <input type="number" minlength="4" class="form-control" id="harga" name="harga" required oninvalid="this.setCustomValidity('Harus Diisi!')">
                </div>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary col-md-3" id="tambah" value="Tambah"></input>
                <input type="reset" class="btn btn-secondary col-md-3 btn-cancel-tempat" value="Batal"></input>
            </div>
        </form>
    </div>
</div>