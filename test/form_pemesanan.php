<!DOCTYPE html>
<html>

<head>
    <title>Form HTML</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container shadow-lg mt-4 p-4">
        <h2 class="text-center pb-3">Form Pemesanan Tiket Kereta Api</h2>
        <form action="proses_pemesanan.php" method="POST">
            <div class="mb-0 row">
                <label class="col-sm-4 col-form-label">Nama:</label>
                <div class="col-sm-4">
                    <input type="text" name="nama" size="30" placeholder="Masukan Nama Sesuai KTP" /><br />
                </div>
            </div>
            <div class="mb-0 row">
                <label class="col-sm-4 col-form-label">Tanggal Berangkat:</label>
                <div class="col-sm-4">
                    <input type="date" name="tanggal" /><br />
                </div>
            </div>
            <div class="mb-0 row">
                <label class="col-sm-4 col-form-label">Jenis Kelamin:</label>
                <div class="col-sm-4">
                    <input type="radio" name="jk" value="L" checked /> Laki-laki
                    <input type="radio" name="jk" value="P" /> Perempuan<br />
                </div>
            </div>
            <div class="mb-0 row">
                <label class="col-sm-4 col-form-label">Jenis Kursi:</label>
                <div class="col-sm-4">
                    <select name="jenis_kursi" id="kursi"></select><br />
                </div>
            </div>
            <div class="mb-0 row">
                <label class="col-sm-4 col-form-label">Harga</label>
                <div class="col-sm-4">
                    <input type="text" name="harga" size="10" id="harga" readonly /><br />
                </div>
            </div>
            <div class="mb-0 row">
                <label class="col-sm-4 col-form-label">Jumlah Penumpang</label>
                <div class="col-sm-4">
                    <input type="number" name="jumlah_penumpang" value="0" min="0" max="10" id="penumpang" /><br />
                </div>
            </div>
            <div class="mb-0 row">
                <label class="col-sm-4 col-form-label">Total Harga:</label>
                <div class="col-sm-8">
                    <input type="text" name="total" size="12" id="total" readonly />
                    <input type="button" id="hitung" value="Hitung Total Harga"><br />
                </div>
            </div>
            <div class="form-check">
                <input type="checkbox" name="persetujuan" id="persetujuan" class="form-check-input" /> Saya menyatakan setuju
                dengan semua ketentuan yang berlaku<br />
            </div>
            <div class="mb-0 row">
                <label class="col-sm-4 col-form-label"></label>
                <div class="col-sm-4">
                    <input type="submit" name="submit" id="pesan" value="Pesan" class="btn btn-primary">
                    <input type="reset" name="batal" value="Reset" class="btn btn-danger">
                    <input type="button" name="back" id="back" value="Kembali" class="btn btn-warning">
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script>
        const dataKursi = {
            "Ekonomi": 50000,
            "Bisnis": 100000,
            "Eksekutif": 150000,
            "Premium": 200000
        };
        //Mengisi Elemen Select ID kursi dengan data dari Array Object
        const cmbKursi = document.querySelector("#kursi");
        for (const key in dataKursi) {
            const opt = document.createElement("option");
            opt.text = key;
            opt.value = key; //<option value="opt.valuey">opt.text</option>
            cmbKursi.add(opt);
        }

        //Memberikan aksi agar harga terisi sesuai jenis kursi yang dipilih
        const txtHarga = document.querySelector("#harga");
        txtHarga.value = dataKursi[cmbKursi.options[0].value]; //Inisialisasi Harga
        let tempHarga = dataKursi["Ekonomi"]; //Inisialisasi temporary harga
        cmbKursi.addEventListener('change', function(event) { //Ketika kursi diubah
            const key = cmbKursi.options[cmbKursi.selectedIndex].value;
            txtHarga.value = dataKursi[key];
            tempHarga = dataKursi[key];
        });

        //Menghitung Total Harga
        const txtTotalHarga = document.querySelector("#total");
        txtTotalHarga.value = 0; //Inisialisasi text total harga
        const btnHitung = document.querySelector("#hitung");
        btnHitung.addEventListener('click', function(event) { //Ketika Button Hitung di klik
            const txtPenumpang = document.querySelector("#penumpang");
            console.log(txtPenumpang.value + " " + tempHarga);
            let total = tempHarga * txtPenumpang.value;
            txtTotalHarga.value = total;
        });

        //Tombol ”Pesan” akan aktif juka checkbox persetujuan di ceklis dan sebaliknya
        const btnPesan = document.querySelector("#pesan");
        btnPesan.disabled = true; //Kondisi Button Pesan di awal disable
        const cekSetuju = document.querySelector("#persetujuan");
        cekSetuju.addEventListener("click", function(event) { //Ketika Checkbox Persetujuan di klik
            if (cekSetuju.checked === true) {
                btnPesan.disabled = false;
            } else {
                btnPesan.disabled = true;
            }
        });

        // Tombol "kembali"
        const btnKembali = document.querySelector("#back");
        btnKembali.addEventListener("click", function(event) {
            location.href = "/";
        });
    </script>
</body>

</html>