jQuery(document).ready(function($){
    jQuery('time.timeago').timeago();
});
$(document).ready(function() {
    $('#cek_hak').change( function () {
       cek_hak($(this).val());
    });


    if ( $('#cari_tanggugan').val() == '') {
        $('#tampil_desa').show();
        $('#tampil_thn').hide();
    } else if($('#cari_tanggugan').val() ==5) {
        $('#tampil_desa').hide();
    } else {
        cari_tanggungan($(this).val());
    }
    $('#cari_tanggugan').change( function () {
       cari_tanggungan($(this).val());
    });

    loadKecamatan('#list_kecamatan');
    $('#list_kecamatan').change(function(){
        $('#list_desa').show();
        var idkecamatan = $('#list_kecamatan').val();
        var data_kecamatan = $('#list_kecamatan').find(':selected');
        loadDesa(idkecamatan,'#list_desa');
        console.log(data_kecamatan);
    });
    $('#list_desa').change(function(){
        $('#data').show();
        var iddesa = $('#list_kecamatan').val();
        var data_desa = $('#list_desa').find(':selected');
         console.log(data_desa);
    });
    $('#list_foto').change(function(){
        $('#data').show();
        var iddesa = $('#list_bencana').val();
        var data_desa = $('#list_foto').find(':selected');
         console.log(data_desa);
    });
});

function loadKecamatan(selector) {
    $(selector).html('loading...');
    $.ajax({
        url: base_domain + '/api/showkecamatan',
        dataType:'json',
        success:function(response){
            $(selector).html('<option value="">- PILIHAN -</option>');
            kecamatan = '';
                $.each(response['results'], function(i,item){
                    var selected = ($(selector).data('kecamatan') == item['id_kecamatan'] ) ? 'selected' : '';
                    kecamatan = '<option value="'+item['id_kecamatan']+'" '+selected+'>'+item['nama_kecamatan']+'</option>';
                    kecamatan = kecamatan + '';
                    $(selector).append(kecamatan);
                });
        },
        error:function(){
            $(selector).html('ERROR!');
        }
    });
}

function loadDesa(param, selector) {
    $(selector).html('loading...');
    $.ajax({
        url:base_domain + '/api/showdesa/' + param,
        dataType:'json',
        success:function(response){
            $(selector).html('<option value="">- PILIHAN -</option>');
            desa = '';
            desa = '<option value="">- PILIHAN -</option>';
            $.each(response['results'], function(i,item){
                desa = '<option value="'+item['id_desa']+'">'+item['nama_desa']+'</option>';
                desa = desa + '';
                $(selector).append(desa);
            });
        },
        error:function(){
            $(selector).html('ERROR');
        }
    });
}

function loadFoto(param, selector) {
    $(selector).html('loading...');
    $.ajax({
        url:base_domain + '/api/showfoto/' + param,
        dataType:'json',
        success:function(response){
            $(selector).html('<option value="">- PILIHAN -</option>');
            foto = '';
            foto = '<option value="">- PILIHAN -</option>';
            $.each(response['results'], function(i,item){
                foto = '<option value="'+item['id_foto']+'">'+item['file_name']+'</option>';
                foto = foto + '';
                $(selector).append(foto);
            });
        },
        error:function(){
            $(selector).html('ERROR');
        }
    });
}

function cek_hak(id) {
    $.ajax({
        url:base_domain + '/api/cek_jenis_hak?hak=' + id,
        dataType:'json',
        success:function(response){
            if (response['status']) {
                $('#label_hak').html('Nilai :');
                    $('#list_kecamatan').attr('disabled','');
                    $('#list_desa').attr('disabled','');
            } else {
                $('#label_hak').html('Luas :');
                document.getElementById('list_kecamatan').removeAttribute('disabled');
                document.getElementById('list_desa').removeAttribute('disabled');
            }
        },
        error:function(){
            alert('ERROR');
        }
    });
}


function cari_tanggungan(id) {
    $.ajax({
        url:base_domain + '/api/cek_jenis_hak?hak=' + id,
        dataType:'json',
        success:function(response){
            if (response['status']) {
               $('#tampil_thn').show();
               $('#tampil_desa').hide();
            } else {
               $('#tampil_desa').show();
               $('#tampil_thn').hide();
            }
        },
        error:function(){
            alert('ERROR');
        }
    });
}


function get_buku_masuk(nohak) {
    $.ajax({
        type :'GET',
        url  : base_domain + '/api/get/'+ nohak,
        success: function (data) {
            if(data.status) {
                var item = data['result'];
                var storage = data['storage'];
                $('#modal-buku_masuk').modal('show');
                var code = '<tr>\n';
                code += '<td><strong>Jenis Hak</strong></td>\n';
                code += '<td width="10" class="text-center">:</td>\n';
                code += '<td>'+item['jenis_hak']+'</td><td width="30"></td>\n';
                code += '<td><strong>No 208</strong></td>\n';
                code += '<td width="10" class="text-center">:</td><td>'+item['no208']+'</td>\n';
                code += '</tr>\n';
                code += '<tr>\n';
                code += '<td><strong>No Hak</strong></td>\n';
                code += '<td width="10" class="text-center">:</td>\n';
                code += '<td>'+item['no_hakbuku']+'</td><td width="30"></td>\n';
                code += '<td><strong>Tahun</strong></td>\n';
                code += '<td width="10" class="text-center">:</td><td>'+item['tahun']+'</td>\n';
                code += '</tr>\n';
                code += '<tr>\n';
                code += '<td><strong>Kecamatan</strong></td>\n';
                code += '<td width="10" class="text-center">:</td>\n';
                code += '<td>'+item['kecamatan']+'</td><td width="30"></td>\n';
                code += '<td><strong>Luas</strong></td>\n';
                code += '<td width="30" class="text-center">:</td><td>'+item['luas']+'</td>\n';
                code += '</tr>\n';
                code += '<tr>\n';
                code += '<td><strong>Desa</strong></td>\n';
                code += '<td width="10" class="text-center">:</td>\n';
                code += '<td>'+item['desa']+'</td><td width="30"></td>\n';
                code += '<td><strong>Status</strong></td>\n';
                code += '<td width="10" class="text-center">:</td><td>'+item['status']+'</td>\n';
                code += '</tr>';
                code += '<tr><td colspan="5" style="padding:20px;">Data Penyimpanan :</td></tr><tr>\n';
                code += '<td><strong>Lemari</strong></td>\n';
                code += '<td width="10" class="text-center">:</td>\n';
                code += '<td>'+storage['lemari']+'</td><td width="30"></td>\n';
                code += '<td><strong>Rak</strong></td>\n';
                code += '<td width="10" class="text-center">:</td><td>'+storage['rak']+'</td>\n';
                code += '</tr>';
                code += '<tr>\n';
                code += '<td><strong>Album</strong></td>\n';
                code += '<td width="10" class="text-center">:</td>\n';
                code += '<td>'+storage['album']+'</td><td width="30"></td>\n';
                code += '<td><strong>Halaman</strong></td>\n';
                code += '<td width="10" class="text-center">:</td><td>'+storage['halaman']+'</td>\n';
                code += '</tr>';
                $('#data_buku_notif').html(code);
                var button = '<a href="'+base_domain+'/apps/app_buku/approve/'+ nohak +'?method=tolak&ref='+current_url+'" class="btn btn-danger"><i class="fa fa-times"></i> Tolak</a>';
                button += '<a href="'+base_domain+'/apps/app_buku/approve/'+ nohak +'?method=terima&ref='+current_url+'" class="btn btn-primary"><i class="fa fa-check"></i> Terima</a>';
                $('#button_approve').html(button);
            } else {
                alert('Tidak Bisak Mengambil Data!');
            }
        },
        error: function() {
            alert('Tidak Bisak Mengambil Data!');
        }
    });
    return false;
}

$(".fancybox").fancybox({ openEffect: "none", closeEffect: "none" });

$('table').tableCheckbox({
    selectedRowClass: 'danger',
    checkboxSelector: 'td:first-of-type input[type="checkbox"],th:first-of-type input[type="checkbox"]',
    isChecked: function($checkbox) {
        return $checkbox.is(':checked');
    }
});

$('#date').daterangepicker({ "singleDatePicker": true,  format: 'YYYY-MM-DD', });
$('#date2').daterangepicker({ "singleDatePicker": true,  format: 'YYYY-MM-DD', });
$('#date3').daterangepicker({ "singleDatePicker": true,  format: 'YYYY-MM-DD', });
$('#date4').daterangepicker({ "singleDatePicker": true,  format: 'YYYY-MM-DD', });

/*!======================== Create Form Aplication ========================*/
/*<!--function bersama-->*/
function getFormData($form){
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });
    return indexed_array;
}
/*<!--end function bersama-->*/

$('#import_dokumen').formValidation({
    excluded: [':disabled'],
    fields: {
        file_excel: { validators: { 
            notEmpty: {  message: 'Harap isi File.' },
            file: { extension: 'xls', maxSize: 2097152 }
        }  }
    }
}).on('success.form.fv', function(e) {
    e.preventDefault();
    var $form     = $(e.target);
    var form_asal  = $("#import_dokumen");
    var form    = getFormData(form_asal);
     $('#load').show();
    $.ajaxFileUpload({
        url             : base_domain + '/apps/import/insert_data', 
        secureuri       : false,
        fileElementId   : 'file_excel',
        data            : form,
        dataType        : 'jsonp',
        contentType     : 'text/javascript',
        beforeSend : function () {
            $('#load').show();
        },
        success : function (data) {
            var msg = JSON.parse(data);
            if(msg.status) {
                $("#upload_load").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><i class='fa fa-check'></i> Berhasil!</strong><p>" + msg.response + ".</p></div>").addClass('bounceIn');
                $form.formValidation('disableSubmitButtons', false).formValidation('resetForm', true); 
            } else {
                $('#upload_load').html('<div class="alert alert-danger"><strong>Gagal!</strong><br>' + msg.error + '</div>').addClass('bounce');
            }
        }, 
        complete : function (data) {
            $('#load').hide();
            var msg = JSON.parse(data);
            if(msg.status) {
                $("#upload_load").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><i class='fa fa-check'></i> Berhasil!</strong><p>" + msg.response + ".</p></div>").addClass('bounceIn');
                $form.formValidation('disableSubmitButtons', false).formValidation('resetForm', true); 
            } else {
                $('#upload_load').html('<div class="alert alert-danger"><strong>Gagal!</strong><br>' + msg.error + '</div>').addClass('bounce');
            }
        }
    });
});


$('#import_database').formValidation({
    excluded: [':disabled'],
    fields: {
        file: { validators: { 
            notEmpty: {  message: 'Harap isi File.' },
            file: { extension: 'sql', }
        }  }
    }
}).on('success.form.fv', function(e) {
    e.preventDefault();
    var $form     = $(e.target);
    var form_asal  = $("#import_database");
    var form    = getFormData(form_asal);
     $('#load').show();
    $.ajaxFileUpload({
        url             : base_domain + '/apps/export/insert_database', 
        secureuri       : false,
        fileElementId   : 'file',
        data            : form,
        dataType        : 'jsonp',
        contentType     : 'text/javascript',
        beforeSend : function () {
            $('#load').show();
        },
        success : function (data) {
            var msg = JSON.parse(data);
            if(msg.status===true ) {
                $("#upload_load").html("<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><i class='fa fa-check'></i> Berhasil!</strong><p>Mengimport Database baru</p></div>").addClass('bounceIn');
                $form.formValidation('disableSubmitButtons', false).formValidation('resetForm', true); 
            } else {
                $('#upload_load').html('<div class="alert alert-danger"><strong>Gagal!</strong><br>' + msg.error + '</div>').addClass('bounce');
            }
            $('#load').hide();
        },
    });
    return false;
});


$('.select').select2();

/* UPLOADING FILES */


//$('#upload_loading').html('<div class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar"aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:10%">10%</div></div>');