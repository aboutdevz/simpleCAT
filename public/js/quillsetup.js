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

const  quillConfig = {
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
};


var quill = new Quill('#soal-container', quillConfig );
var quilla = new Quill('#opsiA-container', quillConfig );
var quillb = new Quill('#opsiB-container', quillConfig );
var quillc = new Quill('#opsiC-container', quillConfig );
var quilld = new Quill('#opsiD-container', quillConfig );

var formData = new FormData();
var form = $('#form-soal-tambah');
var kategori = $('#kategori-soal-input');
var jenis = $('#jenis-soal-input');
var soal = $('#soal');
var opsiA = $('#opsiA');
var opsiB = $('#opsiB');
var opsiC = $('#opsiC');
var opsiD = $('#opsiD');
var jawabanSoal = $('#jawaban-soal');
var statusSoal = $('#status-soal');

// opsiA.val(JSON.stringify(quilla.getContents()) ); 
// opsiB.val(JSON.stringify(quillb.getContents()) ); 
// opsiC.val(JSON.stringify(quillc.getContents()) ); 
// opsiD.val(JSON.stringify(quilld.getContents()) ); 

var form  = $('#form-soal-tambah');
form.submit(function(event) {
    event.preventDefault();
    soal.val (JSON.stringify(quill.getContents(),null,2) );
    // formData.append('kategori',kategori.val());
    // formData.append('jenis',jenis.val());
    // formData.append('soal',soal.val());
    // formData.append('opsi_a',opsiA.val());
    // formData.append('opsi_b',opsiB.val());
    // formData.append('opsi_c',opsiC.val());
    // formData.append('opsi_d',opsiD.val());
    // formData.append('opsi_d',opsiD.val());
    // formData.append('jawaban',jawabanSoal.val());
    // formData.append('status',statusSoal.val());

    console.log(kategori.val());
    console.log(jenis.val());
    console.log(soal.val());
    console.log(opsiA.val());
    console.log(opsiB.val());
    console.log(opsiC.val());
    console.log(opsiD.val());
    console.log(jawabanSoal.val());
    console.log(statusSoal.val());

    quilla.setContents( JSON.parse(soal.val()) );
    quillb.setContents( JSON.parse(soal.val()) );
    quillc.setContents( JSON.parse(soal.val()) );
    quilld.setContents( JSON.parse(soal.val()) );

    console.log(JSON.stringify(quill.getContents())) ;
    console.log(JSON.stringify(quilla.getContents())) ;
    console.log(JSON.stringify(quillb.getContents())) ;
    console.log(JSON.stringify(quillc.getContents())) ;
    console.log(JSON.stringify(quilld.getContents())) ;

    console.log('submitted',form.serialize(),form.serializeArray());

});