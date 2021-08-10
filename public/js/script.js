$(function () {
  async function initDatatable() {
    $("#daftar-mahasiswa").DataTable();
    $("#daftar-soal").DataTable();
    $("#daftar-tpa").DataTable();

  }

  initDatatable();

  
  function baseUrl(value) {
    return window.location.protocol + "//" + window.location.host + "/" + value;
  }
  
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

  
  var quill =  new Quill("#soal-container", quillConfig);
  var quilla = new Quill("#opsiA-container", quillConfig);
  var quillb = new Quill("#opsiB-container", quillConfig);
  var quillc = new Quill("#opsiC-container", quillConfig);
  var quilld = new Quill("#opsiD-container", quillConfig);
  var kategori = $("#kategori-soal-input");
  var jenis = $("#jenis-soal-input");
  var jawabanSoal = $("#jawaban-soal");
  var statusSoal = $("#status-soal");

  function ubahTanggal(tanggal) {
    const tanggalHasil = [];
    let [hari, bulan, tahun] = tanggal.split(' ');
    hari = (hari.length > 1) ? (hari) : (`0${hari}`);
    
    switch (bulan) {
        case "Januari":
            bulan = "01";
            break;
        case "Februari":
            bulan = "02";
            break;
        case "Maret":
            bulan = "03";
            break;
        case "April":
            bulan = "04";
            break;
        case "Mei":
            bulan = "05";
            break;
        case "Juni":
            bulan = "06";
            break;
        case "Juli":
            bulan = "07";
            break;
        case "Agustus":
            bulan = "08";
            break;
        case "September":
            bulan = "09";
            break;
        case "Oktober":
            bulan = "10";
            break;
        case "November":
            bulan = "11";
            break;
        case "Desember":
            bulan = "12";
            break;
    
        default:
            break;
    }
    tanggalHasil.push(hari, bulan, tahun);
    return tanggalHasil.reverse().join('-');
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
    quill.root.innerHtml = "";
    quilla.root.innerHtml= "";
    quillb.root.innerHtml= "";
    quillc.root.innerHtml= "";
    quilld.root.innerHtml= "";
    $("#jawaban-soal").val("");
    $("#status-soal").val("");
  }
  
  

  var btnTambahSoal = $("#tambahDataSoal");
  var btnUpdateSoal = $(".updateDataSoal");
  var btnHapusSoal = $(".hapusDataSoal");
  var labelFormSoal = $("#soal-modalLabel");

  var formSoal = $("#formSoal");
  var modalSoal = $("#soal-modal");
 
  btnTambahSoal.on("click", function () {
 
    deleteInputValue();
    labelFormSoal.html("Tambah Data Soal");
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
            modalSoal.modal("hide");
                deleteInputValue();
                Swal.fire(
                  "Error",
                  "Oops, Data Anda Gagal Disimpan.", // had a missing comma
                  "error"
                );
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
    deleteInputValue();
    labelFormSoal.html("Update Data Soal");
    modalSoal.modal("show");
    var id = $(this).data("id");
    var formData = new FormData();
    formData.append("id", id);
    $id = $(this).data();
    $.ajax({
      type: "POST",
      url: baseUrl("Dashboard/getSoal"),
      data: formData,
      contentType: false,
      processData: false,
      cache: false,
      success: function (response) {
        var data = JSON.parse(response);
        kategori.val(data.id_kategori);
        jenis.val(data.id_jenis);
        quill.root.innerHTML = data.soal;
        quilla.root.innerHTML = data.opsi_a;
        quillb.root.innerHTML = data.opsi_b;
        quillc.root.innerHTML = data.opsi_c;
        quilld.root.innerHTML = data.opsi_d;
        jawabanSoal.val(data.jawaban);
        let status = data.status;
        statusSoal.val(status.charAt(0).toUpperCase() + status.slice(1));

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
                modalSoal.modal("hide");
                deleteInputValue();
                Swal.fire(
                  "Error",
                  "Oops, Data Anda Gagal Disimpan.", // had a missing comma
                  "error"
                );
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
          },
          error: function (xhr) {
            modalSoal.modal("hide");
            deleteInputValue();
            Swal.fire(
              "Error",
              "Oops, Data Anda Gagal Disimpan.", // had a missing comma
              "error"
            );
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

  $("#daftar-mahasiswa tbody").on(
    "click",
    "tr td .hapusDataMahasiswa",
    function (event) {
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
            },
            error: function (xhr) {
              modalMahasiswa.modal("hide");
              deleteInputValue();
              Swal.fire(
                "Error",
                "Oops, Data Anda Gagal Disimpan.", // had a missing comma
                "error"
              );
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
    }
  );
  

  $("#daftar-mahasiswa tbody").on(
    "click",
    "tr td .updateDataMahasiswa",
    function (event) {
      
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
          const data = JSON.parse(response);
          $("#NIM").val(data.nim);
          $("#nama").val(data.nama_mhs);
          if (data.jenis_kelamin == "P") {
            $("#kelamin_P").prop("checked", true);
          } else {
            $("#kelamin_L").prop("checked", true);
          }
          $("#prodi").val(data.prodi);
          $("#password").val(data.password);
          $("#ttl").val(ubahTanggal(data.ttl));
          $("#email").val(data.email);
          $("#no_hp").val(data.no_hp);
          formMahasiswa.submit(function (event) {
            event.preventDefault();
            event.stopImmediatePropagation();
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
                }
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
                      title: "Data Telah DiUpdate",
                      showConfirmButton: false,
                      timer: 1500,
                    });

                    modalMahasiswa.modal("hide");
                    deleteInputValue();
                    window.location.reload();
                  },
                  error: function (xhr) {
                    modalMahasiswa.modal("hide");
                    deleteInputValue();
                    Swal.fire(
                      "Error",
                      "Oops, Data Anda Gagal Disimpan.", // had a missing comma
                      "error"
                    );
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
          modalMahasiswa.modal("hide");
          deleteInputValue();
          Swal.fire(
            "Error",
            response.statusText + response.responseText, // had a missing comma
            "error"
          );
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
    }
  );

  btnTambahMahasiswa.on("click", function () {
    deleteInputValue();
    
    labelFormMahasiswa.html("Tambah Data Mahasiswa");
    modalMahasiswa.modal("toggle");
    modalMahasiswa.modal("show");
    formMahasiswa.submit(function (event) {
      event.preventDefault();
      event.stopImmediatePropagation();
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
          var formDataTambah = new FormData();
          var file = $("#profile")[0].files;
          if (file.length > 0) {
            formDataTambah.append("profile", file[0]);
          }
            formDataTambah.append("nim", $("#NIM").val());
            formDataTambah.append("nama_mhs", $("#nama").val());
            formDataTambah.append("password", $("#password").val());
            formDataTambah.append(
              "jenis_kelamin",
              $("input[name='kelamin']:checked").val()
            );
            formDataTambah.append("prodi", $("#prodi").val());
            formDataTambah.append("ttl", $("#ttl").val());
            formDataTambah.append("email", $("#email").val());
            formDataTambah.append("no_hp", $("#no_hp").val());
          

          $.ajax({
            type: "POST",
            url: baseUrl("Dashboard/tambahMahasiswa"),
            data: formDataTambah,
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
              modalMahasiswa.modal("hide");
              deleteInputValue();
              Swal.fire(
                "Error",
                "Oops, Data Anda Gagal Disimpan.", // had a missing comma
                "error"
              );
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
  });

  $("#soal-submit").on("click", function () {
    soalData.forEach(function (item) {
      var res = allJawaban.find((o) => o.id == item.id);
      if (res.jawaban == item.value) {
        jawabanLogikaData.push(1);
      } else {
        jawabanLogikaData.push(0);
      }
    });

    for (var i = 0; i < jumlahSoalLogika; i++) {
      if (jawabanLogikaData[i] == 1) {
        jumlahBenarSoalLogika += 1;
      } else if (jawabanLogikaData[i] == undefined) {
        jawabanLogikaData.push(0);
      }
    }

    skorLogika = Math.round(
      (jumlahBenarSoalLogika / jumlahSoalLogika) * 600 + 200
    );

    soalData = [];
    var jumlahBenarAll =
      jumlahBenarSoalVerbal +
      jumlahBenarSoalKuantitatif +
      jumlahBenarSoalLogika;
    var skorAll = Math.round((jumlahBenarAll / jumlahSoalAll) * 600 + 200);
    var scp = undefined;
    var keterangan = undefined;
    if (skorVerbal > skorKuantitatif && skorVerbal > skorLogika) {
      scp = "Student Exchange Track";
      keterangan = "Skor tertinggi adalah skor Tes Verbal";
    } else if (skorKuantitatif > skorVerbal && skorKuantitatif > skorLogika) {
      scp = "Research Track";
      keterangan = "Skor tertinggi adalah skor Tes Kuantitatif";
    } else if (skorLogika > skorVerbal && skorLogika > skorKuantitatif) {
      scp = "Internship Track";
      keterangan = "Skor tertinggi adalah skor Tes Logika";
    } else if (skorLogika == skorKuantitatif && skorLogika == skorVerbal) {
      scp = "Student Exchange / Research / Internship Track";
      keterangan = "Skor Semua Sama";
    } else if (skorVerbal == skorKuantitatif) {
      scp = "Student Exchange / Research Track";
      keterangan = "Skor yang sama antara Skor Tes Verbal Dan Kuantitatif";
    } else if (skorKuantitatif == skorLogika) {
      scp = "Research / Internship Track";
      keterangan = "Skor yang sama antara Skor Tes Logika Dan Kuantitatif";
    } else if(skorVerbal == skorLogika) {
      scp = "Student Exchange / Internship Track";
      keterangan = "Skor yang sama antara Skor Tes Verbal Dan Logika";
    } else 
    {
      scp = "Internship Track";
    }
    var formData = new FormData();
    formData.append("verbal", skorVerbal);
    formData.append("kuantitatif", skorKuantitatif);
    formData.append("logika", skorLogika);
    formData.append("skor", skorAll);
    formData.append("scp", scp);
    formData.append("keterangan", keterangan);
    Swal.fire({
      title: "Yakin Ingin Menyelesaikan Ujian?",
      icon: "question",
      showCancelButton: true,
      confirmButtonColor: "#770042",
      confirmButtonText: "Ya",
      cancelButtonText: "Tidak",
      buttonsStyling: true,
    }).then(function (result) {
      if (result.isConfirmed) {
        $.ajax({
          type: "POST",
          url: baseUrl("Soal/selesai"),
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
            window.location.href = baseUrl("Selesai");
          },
          error: function (xhr) {
            // if error occured
            alert("Error karena" + xhr.statusText + xhr.responseText);
          },
          failure: function (response) {
            Swal.fire(
              "Error",
              "Oops, Data Anda Gagal Disimpan.", // had a missing comma
              "error"
            );
          },
        });
      }
    });
  });
  var Scrollbar = window.Scrollbar;


  if (window.location.href === baseUrl('Soal'));
  {
    
    var cardSoal = Scrollbar.init(document.querySelector('#cardSoal'));
  } 


  var soalData = [];
  var allJawaban = undefined;
  var jawabanVerbalData = [];
  var jawabanKuantitatifData = [];
  var jawabanLogikaData = [];
  var skorVerbal = 0;
  var skorKuantitatif = 0;
  var skorLogika = 0;
  var jumlahBenarSoalVerbal = 0;
  var jumlahBenarSoalKuantitatif = 0;
  var jumlahBenarSoalLogika = 0;
  var jumlahSoalVerbal = $(".soalVerbal > li").length;
  var jumlahSoalKuantitatif = $(".soalKuantitatif > li").length;
  var jumlahSoalLogika = $(".soalLogika > li").length;
  var jumlahSoalAll =
    jumlahSoalVerbal + jumlahSoalKuantitatif + jumlahSoalLogika;

 


  
  $.ajax({
    url: baseUrl("Soal/cekJawaban"),
    cache: false,

    success: function (response) {
      allJawaban = response;
    },
    error: function (xhr) {
      // if error occured
      alert("Error karena" + xhr.statusText + xhr.responseText);
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

  var carousel = $("#carouselExampleIndicators").carousel({
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
  $(".left").hide();
  var carouselAt = 1;
  if (carouselAt == 1) {
    timer = new easytimer.Timer();
    $(".title-soal").html("Soal Verbal");
    timer.start({ countdown: true, startValues: { minutes: 25 } });
    timer.addEventListener("secondsUpdated", function (e) {
      $(".timer").html(timer.getTimeValues().toString());
    });
    timer.addEventListener("targetAchieved", function (e) {
      $('.right').trigger('click');
    });
  }

  if (carouselAt == 2) {
      timer = new easytimer.Timer();
      $(".title-soal").html("Soal Kuantitatif");
      timer.start({ countdown: true, startValues: { minutes: 35 } });
      timer.addEventListener("secondsUpdated", function (e) {
        $(".timer").html(timer.getTimeValues().toString());
      });
      timer.addEventListener("targetAchieved", function (e) {
        $('.right').trigger('click');
      });
      cardSoal.scrollTop = 0;
    } else if (carouselAt == 3) {
      timer =new easytimer.Timer();
      $(".title-soal").html("Soal Logika");
      timer.start({ countdown: true, startValues: { minutes: 30 } });
      timer.addEventListener("secondsUpdated", function (e) {
        $(".timer").html(timer.getTimeValues().toString());
      });
      timer.addEventListener("targetAchieved", function (e) {
          $('#soal-submit').trigger('click');
      });
      cardSoal.scrollTop = 0;
    }

  $("#carouselExampleIndicators").on("slid.bs.carousel", function () {
    var control = $(".carousel-control");
    if (carouselAt == 2) {
      timer = new easytimer.Timer();
      $(".title-soal").html("Soal Kuantitatif");
      timer.start({ countdown: true, startValues: { minutes: 35 } });
      timer.addEventListener("secondsUpdated", function (e) {
        $(".timer").html(timer.getTimeValues().toString());
      });
      timer.addEventListener("targetAchieved", function (e) {
        $('.right').trigger('click');
      });
      cardSoal.scrollTop = 0;
    } else if (carouselAt == 3) {
      timer =new easytimer.Timer();
      $(".title-soal").html("Soal Logika");
      timer.start({ countdown: true, startValues: { minutes: 30 } });
      timer.addEventListener("secondsUpdated", function (e) {
        $(".timer").html(timer.getTimeValues().toString());
      });
      timer.addEventListener("targetAchieved", function (e) {
          $('#soal-submit').trigger('click');
      });
      cardSoal.scrollTop = 0;
    }

    $("#soal-submit").hide();

    if ($(".carousel-inner").children().last().hasClass("active")) {
      $(".right").hide();
      $("#soal-submit").show();
      carouselAt = 3;
    }
  });

  $(".right").on("click", function () {
    if (carouselAt == 1) {

      soalData.forEach(function (item) {
        var res = allJawaban.find((o) => o.id == item.id);
        if (res.jawaban == item.value) {
          jawabanVerbalData.push(1);
        } else {
          jawabanVerbalData.push(0);
        }
      });

      for (var i = 0; i < jumlahSoalVerbal; i++) {
        if (jawabanVerbalData[i] == 1) {
          jumlahBenarSoalVerbal += 1;
        } else if (jawabanVerbalData[i] == undefined) {
          jawabanVerbalData.push(0);
        }
      }
      skorVerbal = Math.round(
        (jumlahBenarSoalVerbal / jumlahSoalVerbal) * 600 + 200
      );
      soalData = [];
      cardSoal.scrollTop = 0;
    }
    if (carouselAt == 2) {
      soalData.forEach(function (item) {
        var res = allJawaban.find((o) => o.id == item.id);
        if (res.jawaban == item.value) {
          jawabanKuantitatifData.push(1);
        } else {
          jawabanKuantitatifData.push(0);
        }
      });

      for (var i = 0; i < jumlahSoalKuantitatif; i++) {
        if (jawabanKuantitatifData[i] == 1) {
          jumlahBenarSoalKuantitatif += 1;
        } else if (jawabanKuantitatifData[i] == undefined) {
          jawabanKuantitatifData.push(0);
        }
      }

      skorKuantitatif = Math.round(
        (jumlahBenarSoalKuantitatif / jumlahSoalKuantitatif) * 600 + 200
      );

      soalData = [];
      cardSoal.scrollTop = 0;
    }

    carouselAt += 1;
  });

  

  

  $("#cancel").on("click", function () {
    deleteInputValue();
  });

  

  $(".soal-container input:radio").change(function () {
    var soalOpsi = {
      id: $(this).prop("name"),
      value: $(this).val(),
    };

    if (soalData.length < 1) {
      soalData.push(soalOpsi);
    } else {
      var index = undefined;
      for (var i = 0; i < soalData.length; i++) {
        if (soalOpsi.id == soalData[i].id) {
          index = i;
        }
      }

      if (index != undefined && ~index) {
        var res = soalData.find((o) => o.id == soalOpsi.id);
        res.value = soalOpsi.value;
      } else {
        soalData.push(soalOpsi);
      }
    }

  });


  


});
