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

  const quillConfig = {
    modules: {
      syntax: true,
      toolbar: toolbarOptions,
    },
    placeholder: "masukkan  text",
    theme: "snow",
  };

  var quill = new Quill("#soal-container", quillConfig);
  var quilla = new Quill("#opsiA-container", quillConfig);
  var quillb = new Quill("#opsiB-container", quillConfig);
  var quillc = new Quill("#opsiC-container", quillConfig);
  var quilld = new Quill("#opsiD-container", quillConfig);

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

  $("#carouselExampleIndicators").bind("slid", function () {
    currentIndex = $("div.active").index() + 1;

    $(".title-slide").html("" + currentIndex + "/" + totalItems + "");
  });

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
    $("#jenis-soal-input").val("");
    $("#kategori-soal-input").val("");
    $("#soal-container").html("");
    $("#opsiA-container").html("");
    $("#opsiB-container").html("");
    $("#opsiC-container").html("");
    $("#opsiD-container").html("");
    $("#jawaban-soal").val("");
    $("#status-soal").val("");
  }

  $("#cancel").on("click", function () {
    deleteInputValue();
  });


  var kategori = $("#kategori-soal-input");
  var jenis = $("#jenis-soal-input");
  var jawabanSoal = $("#jawaban-soal");
  var statusSoal = $("#status-soal");

  var btnTambahSoal = $("#tambahDataSoal");
  var btnUpdateSoal = $(".updateDataSoal");
  var btnHapusSoal = $(".hapusDataSoal");
  var labelFormSoal = $("#soal-modalLabel");

  var formSoal = $("#formSoal");
  var modalSoal = $("#soal-modal");

  btnTambahSoal.on("click", function () {
    labelFormSoal.html("Tambah Data Soal");
    modalSoal.modal("toggle");
    modalSoal.modal("show");
    formSoal.submit(function (event) {
      Swal.fire({
        title: "Yakin Tambah Data?",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#770042",
        confirmButtonText: "Save",
        cancelButtonText: "Cancel",
        buttonsStyling: true,
      }).then(function (result) {
        var formData = new FormData();
        if (result.isConfirmed) {
          formData.append("id_jenis", jenis.val());
          formData.append("id_kategori", kategori.val());
          formData.append("soal", quill.root.innerHTML);
          formData.append("opsi_a", quilla.root.innerHTML);
          formData.append("opsi_b", quillb.root.innerHTML);
          formData.append("opsi_c", quillc.root.innerHTML);
          formData.append("opsi_d", quilld.root.innerHTML);
          formData.append("jawaban", jawabanSoal.val());
          formData.append("status", statusSoal.val());
        }

        $.ajax({
          type: "POST",
          url: baseUrl("Dashboard/tambahSoal"),
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
            modalSoal.modal("hide");
            deleteInputValue();
            window.location.reload();
          },
          error: function (xhr) {
            // if error occured
            alert("Error karena" + xhr.statusText + xhr.responseText);
            modalSoal.modal("hide");
            deleteInputValue();
          },
          failure: function (response) {
            modalSoal.modal("hide");
            deleteInputValue();
            Swal.fire(
              "Error",
              "Oops, Data Anda Gagal Disimpan.", // had a missing comma
              "error"
            );
          },
        });

        modalSoal.modal("hide");
      });
      event.preventDefault();
    });
  });

  $("#daftar-soal tbody").on("click", "tr .updateDataSoal", function () {
    labelFormSoal.html("Update Data Soal");
    modalSoal.modal("toggle");
    modalSoal.modal("show");
    var id = $(this).data("id");
    var formData = new FormData();
    formData.append("id", id);
    $id = $(this).data()
    $.ajax({
      type: "POST",
      url: baseUrl("Dashboard/getSoal"),
      data: formData,
      contentType: false,
      processData: false,
      cache: false,
      success: function (response) {
        var data = JSON.parse(response);
        console.log(data);
        kategori.val(data.id_kategori);
        jenis.val(data.id_jenis);
        quill.root.innerHTML = data.soal;
        quilla.root.innerHTML = data.opsi_a;
        quillb.root.innerHTML = data.opsi_b;
        quillc.root.innerHTML = data.opsi_c;
        quilld.root.innerHTML = data.opsi_d;
        jawabanSoal.val(data.jawaban);
        statusSoal.val(data.status);

        formSoal.submit(function (event) {
          Swal.fire({
            title: "Yakin Update Data?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#770042",
            confirmButtonText: "Save",
            cancelButtonText: "Cancel",
            buttonsStyling: true,
          }).then(function (result) {
            var formData = new FormData();
            if (result.isConfirmed) {
              formData.append("id", id);
              formData.append("id_jenis", jenis.val());
              formData.append("id_jenis", jenis.val());
              formData.append("id_kategori", kategori.val());
              formData.append("soal", quill.root.innerHTML);
              formData.append("opsi_a", quilla.root.innerHTML);
              formData.append("opsi_b", quillb.root.innerHTML);
              formData.append("opsi_c", quillc.root.innerHTML);
              formData.append("opsi_d", quilld.root.innerHTML);
              formData.append("jawaban", jawabanSoal.val());
              formData.append("status", statusSoal.val());
            }

            $.ajax({
              type: "POST",
              url: baseUrl("Dashboard/tambahSoal"),
              data: formData,
              contentType: false,
              processData: false,
              cache: false,
              success: function (response) {
                Swal.fire({
                  position: "mid-center",
                  icon: "success",
                  title: "Data Telah DiUpdate",
                  showConfirmButton: false,
                  timer: 1500,
                });
                modalSoal.modal("hide");
                deleteInputValue();
                window.location.reload();
              },
              error: function (xhr) {
                // if error occured
                alert("Error karena" + xhr.statusText + xhr.responseText);
                modalSoal.modal("hide");
                deleteInputValue();
              },
              failure: function (response) {
                modalSoal.modal("hide");
                deleteInputValue();
                Swal.fire(
                  "Error",
                  "Oops, Data Anda Gagal Disimpan.", // had a missing comma
                  "error"
                );
              },
            });

            modalSoal.modal("hide");
          });
          event.preventDefault();
        });
      },
    });
  });

  $("#daftar-soal tbody").on("click", "tr .hapusDataSoal", function () {
    var id = $(this).data("id");
    var formData = new FormData();
    formData.append("id", id);
    Swal.fire({
      title: "Yakin Delete Data?",
      icon: "question",
      showCancelButton: true,
      confirmButtonColor: "#770042",
      confirmButtonText: "Save",
      cancelButtonText: "Cancel",
      buttonsStyling: true,
    }).then(function (result) {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: baseUrl("Dashboard/hapusSoal"),
          data: formData,
          contentType: false,
          processData: false,
          cache: false,
          success: function (response) {
            Swal.fire({
              position: "mid-center",
              icon: "success",
              title: "Data Telah Dihapus" + response,
              showConfirmButton: false,
              timer: 1500,
            });

            modalSoal.modal("hide");
            deleteInputValue();
            window.location.reload();
            console.log(response);
          },
          error: function (xhr) {
            // if error occured
            alert("Error karena" + xhr.statusText + xhr.responseText);
            modalSoal.modal("hide");
            deleteInputValue();
          },
          failure: function (response) {
            modalSoal.modal("hide");
            deleteInputValue();
            Swal.fire(
              "Error",
              "Oops, Data Anda Gagal Disimpan.", // had a missing comma
              "error"
            );
          },
        });
      }
      modalSoal.modal("hide");
    });
  });

  var btnTambahMahasiswa = $("#tambahDataMahasiswa");
  var btnUpdateMahasiswa = $(".updateDataMahasiswa");
  var btnHapusMahasiswa = $(".hapusDataMahasiswa");
  var labelFormMahasiswa = $("#modal-mahasiswa-modalLabel");

  var form = document.forms.namedItem("formMahasiswa");
  var formMahasiswa = $("#formMahasiswa");
  var modalMahasiswa = $("#mahasiswa-modal");

    $('#daftar-mahasiswa tbody').on("click","tr .hapusDataMahasiswa", function (event) {
      var id = $(this).data("id");
      var formData = new FormData();
      formData.append("id", id);
      Swal.fire({
        title: "Yakin Delete Data?",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#770042",
        confirmButtonText: "Save",
        cancelButtonText: "Cancel",
        buttonsStyling: true,
      }).then(function (result) {
        if (result.isConfirmed) {
          $.ajax({
            type: "POST",
            url: baseUrl("Dashboard/hapusMahasiswa"),
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            success: function (response) {
              Swal.fire({
                position: "mid-center",
                icon: "success",
                title: "Data Telah Dihapus" + response,
                showConfirmButton: false,
                timer: 1500,
              });

              modalMahasiswa.modal("hide");
              deleteInputValue();
              window.location.reload();
              console.log(response);
            },
            error: function (xhr) {
              // if error occured
              alert("Error karena" + xhr.statusText + xhr.responseText);
              modalMahasiswa.modal("hide");
              deleteInputValue();
            },
            failure: function (response) {
              modalMahasiswa.modal("hide");
              deleteInputValue();
              Swal.fire(
                "Error",
                "Oops, Data Anda Gagal Disimpan.", // had a missing comma
                "error"
              );
            },
          });
        }
        modalMahasiswa.modal("hide");
      });
    });

    $('#daftar-mahasiswa tbody').on("click","tr .updateDataMahasiswa", function (event) {
      console.log("modal mhs udpate");
      labelFormMahasiswa.html("Update Data Mahasiswa");
      modalMahasiswa.modal("toggle");
      modalMahasiswa.modal("show");
      var id = $(this).data("id");
      var formData = new FormData();
      formData.append("id", id);
      $.ajax({
        type: "POST",
        url: baseUrl("Dashboard/getMahasiswa"),
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        success: function (response) {
          var data = JSON.parse(response);
          console.log(data);
          console.log(data.nim);
          $("#NIM").val(data.nim);
          $("#nama").val(data.nama_mhs);
          $("#kelamin").val(data.jenis_kelamin);
          $("#prodi").val(data.prodi);
          $("#ttl").val(data.ttl);
          $("#email").val(data.email);
          $("#no_hp").val(data.no_hp);
          console.log(formData);
          formMahasiswa.submit(function (event) {
            Swal.fire({
              title: "Yakin Update Data?",
              icon: "question",
              showCancelButton: true,
              confirmButtonColor: "#770042",
              confirmButtonText: "Save",
              cancelButtonText: "Cancel",
              buttonsStyling: true,
            }).then(function (result) {
              if (result.isConfirmed) {
                var formData = new FormData();
                var file = $("#profile")[0].files;
                if (file.length > 0) {
                  formData.append("profile", file[0]);
                  formData.append("nim", $("#NIM").val());
                  formData.append("nama_mhs", $("#nama").val());
                  formData.append("password", $("#password").val());
                  formData.append(
                    "jenis_kelamin",
                    $("input[name='kelamin']:checked").val()
                  );
                  formData.append("prodi", $("#prodi").val());
                  formData.append("ttl", $("#ttl").val());
                  formData.append("email", $("#email").val());
                  formData.append("no_hp", $("#no_hp").val());
                  formData.append("id", id);
                  console.log(formData);
                }
                console.log(formData);
                $.ajax({
                  type: "POST",
                  url: baseUrl("Dashboard/updateMahasiswa"),
                  data: formData,
                  contentType: false,
                  processData: false,
                  cache: false,
                  success: function (response) {
                    Swal.fire({
                      position: "mid-center",
                      icon: "success",
                      title: "Data Telah DiUpdate" ,
                      showConfirmButton: false,
                      timer: 1500,
                    });

                    modalMahasiswa.modal("hide");
                    deleteInputValue();
                    window.location.reload();
                    console.log(response);
                  },
                  error: function (xhr) {
                    // if error occured
                    alert("Error karena" + xhr.statusText + xhr.responseText);
                    modalMahasiswa.modal("hide");
                    deleteInputValue();
                  },
                  failure: function (response) {
                    modalMahasiswa.modal("hide");
                    deleteInputValue();
                    Swal.fire(
                      "Error",
                      "Oops, Data Anda Gagal Disimpan.", // had a missing comma
                      "error"
                    );
                  },
                });
              }
              modalMahasiswa.modal("hide");
            });
            event.preventDefault();
          });
        },
        error: function (xhr) {
          // if error occured
          modalMahasiswa.modal("hide");
          deleteInputValue();
          alert("Error karena" + xhr.statusText + xhr.responseText);
        },
        failure: function (response) {
          modalMahasiswa.modal("hide");
          deleteInputValue();
          Swal.fire(
            "Error",
            response.statusText + response.responseText, // had a missing comma
            "error"
          );
        },
      });
    });

  btnTambahMahasiswa.on("click", function () {
    console.log("button tambah mhs di klik");

    console.log("modal mhs tambah");
    labelFormMahasiswa.html("Tambah Data Mahasiswa");
    modalMahasiswa.modal("toggle");
    modalMahasiswa.modal("show");
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
            formData.append(
              "jenis_kelamin",
              $("input[name='kelamin']:checked").val()
            );
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
              modalMahasiswa.modal("hide");
              deleteInputValue();
              window.location.reload();
            },
            error: function (xhr) {
              // if error occured
              alert("Error karena" + xhr.statusText + xhr.responseText);
              modalMahasiswa.modal("hide");
              deleteInputValue();
            },
            failure: function (response) {
              modalMahasiswa.modal("hide");
              deleteInputValue();
              Swal.fire(
                "Error",
                "Oops, Data Anda Gagal Disimpan.", // had a missing comma
                "error"
              );
            },
          });
        }
        modalMahasiswa.modal("hide");
      });
      event.preventDefault();
    });
  });
});
