$(function () {

    
    $('#daftar-mahasiswa').DataTable();
    $('#daftar-soal').DataTable();
    $('#daftar-tpa').DataTable();
    

    var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike', 'formula'],        // toggled buttons
        ['blockquote', 'code-block'],

        [{ 'header': 1 }, { 'header': 2 }],               // custom button values
        [{ 'list': 'ordered' }, { 'list': 'bullet' }],
        [{ 'script': 'sub' }, { 'script': 'super' }],      // superscript/subscript
        [{ 'indent': '-1' }, { 'indent': '+1' }],          // outdent/indent
        [{ 'direction': 'rtl' }],                         // text direction

        [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

        [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
        [{ 'font': [] }],
        [{ 'align': [] }],

        ['clean'],                                 // remove formatting button
        ['image']
    ];


    var quill = new Quill('#editor-container', {
        modules: {
            syntax: true,
            toolbar: toolbarOptions
        },
        placeholder: 'masukkan  text',
        theme: 'snow',
        imageUploader: {
            upload: (file) => {
                const fileReader = new FileReader();
            },
        },
    });


    $('#carouselExampleIndicators').carousel({
        interval: false,
        wrap: false

    })







    if ($(".carousel-inner").children().last().hasClass("active")) {
        $(".right").hide();
    } else if ($(".carousel-inner").children().first().hasClass("active")) {
        $(".left").hide()
    }



    $('#carouselExampleIndicators').on('slid.bs.carousel', function () {
        //alert("slid");
    });

    $("#soal-submit").hide();
    $('#carouselExampleIndicators').on('slid.bs.carousel', function () {
        var control = $(".carousel-control");
        $("#soal-submit").hide();
        control.show();
        if ($(".carousel-inner").children().last().hasClass("active")) {
            $(".right").hide();
            $("#soal-submit").show();
        } else if ($(".carousel-inner").children().first().hasClass("active")) {
            $(".left").hide()
        }



    });

    $('#dash-form-soal-import').on('submit',function() {
        $formData = {

        };
    });



});