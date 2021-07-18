$(function () {
    var table = $("#daftar-mahasiswa").DataTable();
    var modalProfile = new bootstrap.Modal($('#profilModalDash'), {
        keyboard: false
      })
    
      $('#daftar-mahasiswa tbody').on('click',' tr td:not(#action)', function () {
        var data = table.row( this ).data();
        $('.nimPDash').html(data[1]);
        $('.namaPDash').html(data[2]);
        $('.JkPDash').html((data[3] === "P") ? ('Perempuan') : ('Laki-Laki') );
        $('.prodiPDash').html(data[4]);
        $('.ttlPDash').html(data[7]);
        $('.emailPDash').html(data[5]);
        $('.hpPDash').html(data[8]);
        $('.fotoPDash').attr('src',data[9]);
        modalProfile.toggle();
    } );
});
