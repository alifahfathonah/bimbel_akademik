$('#ketkuota').show();
$('#pilih_mapel').hide();
$('#viewNilai').hide();
// $('#view').hide();

var baseUrl = 'http://localhost/akademik/admin/';
var baseUrlTentor = 'http://localhost/akademik/tentor/';

// $('#load_mapel').click(function () {
//     var data = $('.form_jadwal').serialize();
//     $.ajax({
//         type: "POST",
//         url: baseUrl + 'Penjadwalan/add_jadwal',
//         data: data,
//         dataType: 'json',
//         beforeSend: function (e) {
//             if (e && e.overrideMimeType) {
//                 e.overrideMimeType("application/json;charset=UTF-8");
//             }
//         },
//         success: function (response) { // Ketika proses pengiriman berhasil
//             if (response.cek == 0) {
//                 $('#pilih_mapel').show();
//                 // $('#id_jadwal').val(response.html)
//             } else {
//                 alert(response.pesan);
//                 window.location.href = baseUrl + 'penjadwalan';
//             }
//             console.log(response.cek)
//         },
//         error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
//             alert(thrownError); // Munculkan alert error
//         }
//     });
// });

$('#rombel').change(function () {
    $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: baseUrl + 'Pendaftaran/cek_kuota', // Isi dengan url/path file php yang dituju
        data: { rombel: $("#rombel").val() }, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function (e) {
            if (e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
        },
        success: function (response) { // Ketika proses pengiriman berhasil
            if (response.html == 0 || response.html < 0) {
                $('#ketkuota').html('Maaf Kouta Rombel ini sudah penuh, Silahkan tambah kuota atau buat Rombel baru').addClass('text-danger').show();
                $('#rombel').val('');
            } else {
                $('#ketkuota').html('Rombel ini tersisa ' + response.html + ' Kuota').addClass('text-success').show();
            }
            console.log(response.html);
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
            alert(thrownError); // Munculkan alert error
        }
    });
})

$('#rombelNilai').change(function () {
    $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: baseUrlTentor + 'Nilai/load_siswa', // Isi dengan url/path file php yang dituju
        data: { rombel: $("#rombelNilai").val() }, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function (e) {
            if (e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
        },
        success: function (response) { // Ketika proses pengiriman berhasil
            $('#viewNilai').show().html(response.html);
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
            alert(thrownError); // Munculkan alert error
        }
    });
})


$(document).ready(function () {
    $("#keyword").keyup(function () {
        $.ajax({
            type: "POST",
            url: baseUrl + 'pembayaran/getData',
            data: {
                keyword: $("#keyword").val()
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('#DropdownCountry').empty();
                    $('#keyword').attr("data-toggle", "dropdown");
                    $('#DropdownCountry').dropdown('toggle');
                    console.log('sip');
                }
                else if (data.length == 0) {
                    $('#keyword').attr("data-toggle", "");
                    console.log('p');
                }
                $.each(data, function (key, value) {
                    if (data.length >= 0)
                        $('#DropdownCountry').append('<li role="displayCountries"><a style="margin-left: 20px;"  role="menuitem dropdownCountryli" class="dropdownlivalue">' + value['nama'] + '</a></li>');
                    console.log(value);
                });
            }
        });
    });
    $('ul.txtnama').on('click', 'li a', function () {
        $('#keyword').val($(this).text());
        $(this).attr("data-toggle", "");
    });
});

// $('#btn-search').click(function () {
//     $(this).html("SEARCHING...").attr("disabled", "disabled");
//     var data = $('#keyword').val();
//     $.ajax({
//         type: "POST",
//         url: baseUrl + 'pembayaran/search',
//         data: { keyword: data },
//         dataType: 'json',
//         beforeSend: function (e) {
//             if (e && e.overrideMimeType) {
//                 e.overrideMimeType("application/json;charset=UTF-8");
//             }
//         },
//         success: function (response) { // Ketika proses pengiriman berhasil
//             $('#view').show();
//             // $('#siswa').html(response.hasil);
//             $('#tagihan').html(response.hasil2);
//             $('#namaSiswa').html(response.hasil[0].nama);
//             $('#alamatSiswa').html(response.hasil[0].alamat);
//             $('#rombelSiswa').html(response.hasil[0].nama_rombel);
//             // var arrayku = response.spp;
//             // arrayku.forEach(ary => {
//             //     var data = document.write("<tr><td>" + ary['bulan'] + "</td></tr>")
//             //     // $('#bulan').html()
//             //     // console.log(ary['bulan'])
//             // });
//             // $('#bodyku').html(data)
//         },
//         error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
//             alert(thrownError); // Munculkan alert error
//         }
//     });
// });
