$(function () {
  $("#daftar-mahasiswa").DataTable();
  $("#daftar-soal").DataTable();
  $("#daftar-tpa").DataTable();

  var toolbarOptions = [
    ["bold", "italic", "underline", "strike", "formula"], // toggled buttons
    ["blockquote", "code-block"],

    [{ header: 1 }, { header: 2 }], // custom button values
    [{ list: "ordered" }, { list: "bullet" }],
    [{ script: "sub" }, { script: "super" }], // superscript/subscript
    [{ indent: "-1" }, { indent: "+1" }], // outdent/indent
    [{ direction: "rtl" }], // text direction

    [{ size: ["small", false, "large", "huge"] }], // custom dropdown
    [{ header: [1, 2, 3, 4, 5, 6, false] }],

    [{ color: [] }, { background: [] }], // dropdown with defaults from theme
    [{ font: [] }],
    [{ align: [] }],

    ["clean"], // remove formatting button
    ["image"],
  ];

  var quill = new Quill("#editor-container", {
    modules: {
      syntax: true,
      toolbar: toolbarOptions,
    },
    placeholder: "masukkan  text",
    theme: "snow",
    imageUploader: {
      upload: (file) => {
        const fileReader = new FileReader();
      },
    },
  });

  $("#carouselExampleIndicators").carousel({
    interval: false,
    wrap: false,
  });

  var soalindex = 1;
  if ($(".carousel-inner").children().last().hasClass("active")) {
    $(".right").hide();
  } else if ($(".carousel-inner").children().first().hasClass("active")) {
    $(".left").hide();
  }

  $("#carouselExampleIndicators").on("slid.bs.carousel", function () {
    //alert("slid");
  });

  $("#soal-submit").hide();

  $("#carouselExampleIndicators").on("slid.bs.carousel", function () {
    var control = $(".carousel-control");
    $("#soal-submit").hide();
    control.show();
    if ($(".carousel-inner").children().last().hasClass("active")) {
      $(".right").hide();
      $("#soal-submit").show();
    } else if ($(".carousel-inner").children().first().hasClass("active")) {
      $(".left").hide();
    }
  });

  function baseUrl(value) {
    return window.location.protocol + "//" + window.location.host + "/" + value;
  }

  function deleteInputValue() {
    $("#profile").val("");
    $("#NIM").val("");
    $("#nama").val("");
    $("#password").val("");
    $("#kelamin").val("");
    $("#prodi").val("");
    $("#ttl").val("");
    $("#email").val("");
    $("#no_hp").val("");
  }

  $("#cancel").on("click", function () {
    deleteInputValue();
  });

  var buttonTambahMahasiswa = $("#dataMahasiswa");
  var labelForm = $("#modal-mahasiswa-modalLabel");
  
  var form = document.forms.namedItem("formMahasiswa");
  var formMahasiswa = $("#formMahasiswa");
  var modalMahasiswa = $("#mahasiswa-modal");

  buttonTambahMahasiswa.on("click", function () {


    if (buttonTambahMahasiswa.data("tipe") == "tambah") {
        labelForm.html('Tambah Data Mahasiswa');
        modalMahasiswa.modal('toggle');
        modalMahasiswa.modal('show');
        formMahasiswa.submit(function (event) {
            var urlTambahMhs = baseUrl("Admin/tambahMahasiswa");
            
            Swal.fire({
              title: "Yakin Tambah Data?",
              icon: "question",
              showCancelButton: true,
              confirmButtonColor: "#770042",
              confirmButtonText: "Save",
              cancelButtonText: "Cancel",
              buttonsStyling: true,
            }).then(function (result) {
              if (result.isConfirmed) {
                var formData = new FormData(form);
                var file = $("#profile")[0].files;
                if (file.length > 0) {
                  formData.append("profile", file[0]);
                  formData.append("nim", $("#NIM").val());
                  formData.append("nama_mhs", $("#nama").val());
                  formData.append("password", $("#password").val());
                  formData.append("kelamin", $("#kelamin").val());
                  formData.append("prodi", $("#prodi").val());
                  formData.append("ttl", $("#ttl").val());
                  formData.append("email", $("#email").val());
                  formData.append("no_hp", $("#no_hp").val());
                }
            
        
                $.ajax({
                  type: "POST",
                  url: baseUrl("Dashboard/tambahMahasiswa"),
                  data: formData,
                  contentType: false,
                  processData: false,
                  cache: false,
                  success: function (response) {
                    Swal.fire({
                      position: "mid-center",
                      icon: "success",
                      title: "Data Telah Disimpan",
                      showConfirmButton: false,
                      timer: 1500,
                    });
                    modalMahasiswa.dispose();
                    modalMahasiswa.hide();
                    deleteInputValue();
                    $(".modal-backdrop").hide();
                    modalMahasiswa.remove();
                    deleteInputValue();
                    console.log(response);
                  },
                  error: function (xhr) {
                    // if error occured
                    alert("Error karena" + xhr.statusText + xhr.responseText);
                    modalMahasiswa.hide();
                    modalMahasiswa.dispose();
                    deleteInputValue();
                    modalMahasiswa.remove();
                  },
                  failure: function (response) {
                    modalMahasiswa.hide();
                    modalMahasiswa.dispose();
                    deleteInputValue();
                    modalMahasiswa.remove();
                    Swal.fire(
                      "Error",
                      "Oops, Data Anda Gagal Disimpan.", // had a missing comma
                      "error"
                    );
                  },
                });
              }
              modalMahasiswa.hide();
            });
            event.preventDefault();
          });
        
    } elseif(buttonTambahMahasiswa.data("tipe") == "update") {
        labelForm.html('Tambah Data Mahasiswa');
        modalMahasiswa.modal('toggle');
        modalMahasiswa.modal('show');

        formMahasiswa.submit(function (event) {
            var urlTambahMhs = baseUrl("Admin/tambahMahasiswa");
            
            Swal.fire({
              title: "Yakin Tambah Data?",
              icon: "question",
              showCancelButton: true,
              confirmButtonColor: "#770042",
              confirmButtonText: "Save",
              cancelButtonText: "Cancel",
              buttonsStyling: true,
            }).then(function (result) {
              if (result.isConfirmed) {
                var formData = new FormData(form);
                var file = $("#profile")[0].files;
                if (file.length > 0) {
                  formData.append("profile", file[0]);
                  formData.append("nim", $("#NIM").val());
                  formData.append("nama_mhs", $("#nama").val());
                  formData.append("password", $("#password").val());
                  formData.append("kelamin", $("#kelamin").val());
                  formData.append("prodi", $("#prodi").val());
                  formData.append("ttl", $("#ttl").val());
                  formData.append("email", $("#email").val());
                  formData.append("no_hp", $("#no_hp").val());
                }
            
        
                $.ajax({
                  type: "POST",
                  url: baseUrl("Dashboard/tambahMahasiswa"),
                  data: formData,
                  contentType: false,
                  processData: false,
                  cache: false,
                  success: function (response) {
                    Swal.fire({
                      position: "mid-center",
                      icon: "success",
                      title: "Data Telah Disimpan",
                      showConfirmButton: false,
                      timer: 1500,
                    });
                    modalMahasiswa.dispose();
                    modalMahasiswa.hide();
                    deleteInputValue();
                    $(".modal-backdrop").hide();
                    modalMahasiswa.remove();
                    deleteInputValue();
                    console.log(response);
                  },
                  error: function (xhr) {
                    // if error occured
                    alert("Error karena" + xhr.statusText + xhr.responseText);
                    modalMahasiswa.hide();
                    modalMahasiswa.dispose();
                    deleteInputValue();
                    modalMahasiswa.remove();
                  },
                  failure: function (response) {
                    modalMahasiswa.hide();
                    modalMahasiswa.dispose();
                    deleteInputValue();
                    modalMahasiswa.remove();
                    Swal.fire(
                      "Error",
                      "Oops, Data Anda Gagal Disimpan.", // had a missing comma
                      "error"
                    );
                  },
                });
              }
              modalMahasiswa.hide();
            });
            event.preventDefault();
          });
    }
  });
  
});
