let tempatWisata;
let whereKey;
let idPesan = $('#ideditpesan').val();
$(function () {

    if (idPesan != undefined) {
        $.ajax({
            url: 'http://jwd.co.id/main/geteditpesan/' + idPesan,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                whereKey = data.tempat_wisata;
                dataTempat();
            }
        });
    } else {
        dataTempat();
    }

    $('#wisata').on('change', function () {
        $('#harga').val(tempatWisata[$('#wisata').val()]);
        totalHarga();
    });

    $('#checklis').on('click', function () {
        if ($(this).prop('checked') == true) {
            $('#pesan').prop('disabled', false);
        } else {
            $('#pesan').prop('disabled', true);
        }
    });

    $('#countAll').on('click', function () {
        if ($('#harga').val() != '' && $('#dewasa').val() != 0 || $('#anak').val() != 0) {
            let total = 0.5 * $('#harga').val() * $('#anak').val() + $('#harga').val() * $('#dewasa').val();
            $('#total').val(total);
        } else {
            $('.alert-wisata').prop('hidden', false);
            setTimeout(function () {
                $('.alert-wisata').prop('hidden', true);
            }, 1000);
        }
    });

    $('#dewasa').on('keyup', function () {
        totalHarga();
    });

    $('#anak').on('keyup', function () {
        totalHarga();
    });

    $('.btn-edit-tempat').on('click', function () {
        $('.form-tambah-tempat').prop('hidden', false);
        $('.title-form-tempat h4').text('FORM EDIT TEMPAT WISATA');
        $('#tambah').val('Edit');
        $('.tabel-tempat-wisata').prop('hidden', true);
        $('#form-wisata').attr('action', 'http://jwd.co.id/main/simpanEditWisata/' + $(this).data('id'));
        $.ajax({
            url: 'http://jwd.co.id/main/getwisata/' + $(this).data('id'),
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#tempat').val(data.tempat_wisata);
                $('#harga').val(data.hargatiket);
            }
        });
    });

    $('.btn-form-tempat').on('click', function () {
        $('.form-tambah-tempat').prop('hidden', false);
        $('.tabel-tempat-wisata').prop('hidden', true);
    });

    $('.btn-cancel-tempat').on('click', function () {
        $('.form-tambah-tempat').prop('hidden', true);
        $('.tabel-tempat-wisata').prop('hidden', false);
    });

});

function totalHarga() {
    let total = 0.5 * $('#harga').val() * $('#anak').val() + $('#harga').val() * $('#dewasa').val();
    $('#total').val(total);
}

function dataTempat() {

    $.ajax({
        url: 'http://jwd.co.id/main/getwisata',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            tempatWisata = data.reduce((tmpt, current) => {
                tmpt[current.tempat_wisata] = current.hargatiket;
                return tmpt;
            }, {});
            $.each(tempatWisata, function (key, value) {
                if (key == whereKey) {
                    $('#wisata').append(
                        `<option selected value="` + key + `" > ` + key + `</option>`
                    );
                    $('#harga').val(tempatWisata[$('#wisata').val()]);
                    totalHarga();
                } else {
                    $('#wisata').append(
                        `<option value="` + key + `" > ` + key + `</option>`
                    );
                }
            });
        }
    });
}