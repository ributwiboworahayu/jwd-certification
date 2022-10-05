
const tempatWisata = {
    "Raja Ampat": 50000,
    "Puncak": 15000,
    "Monas": 30000
};

$(function () {
    $.each(tempatWisata, function (key, value) {
        $('#wisata').append($('<option>', {
            value: key,
            text: key
        }));
    });

    $('#wisata').on('change', function () {
        $('#harga').val(tempatWisata[$('#wisata').val()]);
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

});