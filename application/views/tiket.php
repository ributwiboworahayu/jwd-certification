<?php if ($pemesan != null) : ?>
    <div class="container-fluid">
        <div class="display-5 pt-5 pb-5"></div>
        <div class="card-deck mb-5">

            <div class="card col-md-8 mx-auto shadow">
                <div class="card-header text-center bg-info text-white pt-2 pb-2">
                    <h5>Tiket Wisata</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <label class="card-text col-md-5">Nama Pemesan</label>
                        <div class="col-md-4">
                            <p> : <?= $pemesan->nama ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <label class="card-text col-md-5">Nomor Identitas</label>
                        <div class="col-md-4">
                            <p> : <?= $pemesan->no_id ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <label class="card-text col-md-5">No. HP</label>
                        <div class="col-md-4">
                            <p> : <?= $pemesan->no_hp ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <label class="card-text col-md-5"> Tempat Wisata</label>
                        <div class="col-md-4">
                            <p> : <?= $pemesan->tempat_wisata ?> </p>
                        </div>
                    </div>
                    <div class="row">
                        <label class="card-text col-md-5">Pengunjung Dewasa</label>
                        <div class="col-md-4">
                            <p> : <?= $pemesan->pengunjung_dewasa ?> Orang</p>
                        </div>
                    </div>
                    <div class="row">
                        <label class="card-text col-md-5">Pengunjung Anak-anak</label>
                        <div class="col-md-4">
                            <p> : <?= $pemesan->pengunjung_anak ?> Orang</p>
                        </div>
                    </div>
                    <div class="row">
                        <label class="card-text col-md-5">Harga Tiket</label>
                        <div class="col-md-4">
                            <p> : Rp. <?= $pemesan->hargatiket ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <label class="card-text col-md-5">Total Bayar</label>
                        <div class="col-md-4">
                            <p> : Rp. <?= $pemesan->total_bayar ?></p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
<?php else : ?>
    <h5 class="text-center">No Data Here!</h5>
<?php endif ?>