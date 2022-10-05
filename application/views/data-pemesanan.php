<div class="container mt-4">
    <div class="col mx-auto">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="card-title text-center pb-2">Data Pemesanan</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">No. Identitas</th>
                            <th scope="col">No. HP</th>
                            <th scope="col">Tempat Wisata</th>
                            <th scope="col">Pengunjung</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Total Bayar</th>
                            <th scope="col" colspan="3" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($pemesanan as $pem) :
                        ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><?= $pem->nama ?></td>
                                <td><?= $pem->no_id ?></td>
                                <td><?= $pem->no_hp ?></td>
                                <td><?= $pem->tempat_wisata ?></td>
                                <td><?= $pem->pengunjung_anak + $pem->pengunjung_dewasa ?> Orang</td>
                                <td>Rp. <?= $pem->hargatiket ?></td>
                                <td>Rp. <?= $pem->total_bayar ?></td>
                                <td>
                                    <a href="<?= base_url('main/editpemesanan/' . $pem->id) ?>" class="btn btn-sm btn-secondary">edit</a>
                                </td>
                                <td>
                                    <a href="<?= base_url('main/hapuspemesanan/' . $pem->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('yakin?');">hapus</a>
                                </td>
                                <td>
                                    <a href="<?= base_url('main/tiket?nama=' . $pem->nama . '&tglkunjung=' . $pem->tglkunjung) ?>" class="btn btn-sm btn-warning text-light">Tiket</a>
                                </td>
                            </tr>
                            <?php $i++ ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>