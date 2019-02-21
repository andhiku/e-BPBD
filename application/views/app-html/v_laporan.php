<section class="content-header">
    <h1><small><b>Laporan Bencana</b></small></h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('laporan'); ?>"><i class="fa fa-file-o"></i> Laporan Bencana</a></li>
        <!--<li class="active">Album Foto</li>-->
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Laporan Data Bencana</h3>
                    <div class="box-tools">
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-striped table-hover" id="arsipbuku" width="100%">
                        <thead class="mini-font">
                            <tr>
                                <th rowspan="3" class="text-center">#</th>
                                <th rowspan="3" class="text-center">Waktu</br>Kejadian</th>
                                <th colspan="3" class="text-center">Lokasi</th>
                                <th colspan="3" class="text-center">Bencana</th>
                                <th colspan="2" class="text-center">Korban</th>
                                <th colspan="3" class="text-center">Kerusakan</th>
                                <th colspan="3" class="text-center">Fasilitas Umum</th>
                                <th rowspan="3" class="text-center">Kerugian</th>
                                <th rowspan="3" class="text-center">Tim Petugas Lapangan</th>
                                <th rowspan="3" class="text-center" style="width: 80px">Aksi</th>
                            </tr>
                            <tr>
                                <th rowspan="2" class="text-center">Alamat</th>
                                <th rowspan="2" class="text-center">Kelurahan</th>
                                <th rowspan="2" class="text-center">Kecamatan</th>
                                <th rowspan="2" class="text-center">Jenis</th>
                                <th rowspan="2">Luas</th>
                                <th rowspan="2" class="text-center">Penyebab</th>
                                <th rowspan="2">KK</th>
                                <th rowspan="2">Jiwa</th>
                                <th rowspan="2">RR</th>
                                <th rowspan="2">RS</th>
                                <th rowspan="2">RB</th>
                                <th rowspan="2">Sr.Pd</th>
                                <th rowspan="2">Sr.Ibd</th>
                                <th rowspan="2">Sr.Lain</th>
                            </tr>
                        </thead>
                        <tbody class="mini-font">
                            <?php
                            $no = (!$this->input->get('page')) ? 0 : $this->input->get('page');

                            foreach ($data_bencana as $row) :
                                $waktu = explode(':', $row->waktu);
                                $desa = $this->bpn->desa($row->id_desa);
                                $kec = $this->bpn->kecamatan($row->id_kecamatan);
                                $jenis = $this->bpn->hak($row->id_jenis);
                                $team = explode(',', $row->id_tim);
                                $tim = $this->bpn->tim($row->id_tim);
                                ?>
                                <tr>
                                    <td><?= ++$no; ?>.</td>
                                    <td class="text-center"><?= ($waktu[0] . ':' . $waktu[1]); ?> </br>
                                        <?= tgl_indo($row->tanggal); ?></td>
                                    <td><?= strtoupper($row->alamat); ?></td>
                                    <td><?= (!$row->id_kecamatan) ? '-' : strtoupper($kec); ?></td>
                                    <td><?= (!$row->id_desa) ? '-' : strtoupper($desa); ?></td>
                                    <td><?= (!$row->id_jenis) ? '-' : strtoupper($jenis); ?></td>
                                    <td> &plusmn;<?= strtoupper($row->luas); ?>M<sup>2</sup></td>
                                    <td><?= strtoupper($row->sebab); ?></td>
                                    <td><?= ($row->kk); ?></td>
                                    <td><?= ($row->jiwa); ?></td>
                                    <td><?= ($row->rusak_ringan); ?></td>
                                    <td><?= ($row->rusak_sedang); ?></td>
                                    <td><?= ($row->rusak_berat); ?></td>
                                    <td><?= ($row->f_pendidikan); ?></td>
                                    <td><?= ($row->f_peribadatan); ?></td>
                                    <td><?= ($row->f_kesehatan); ?></td>
                                    <td class="text-center">&plusmn;<?= number_format_short($row->kerugian); ?></td>
                                    <td><?php
                                        foreach ($team as $value) {
                                            echo tempel('tb_tim', 'nama_tim', "id_tim = '$value'") . ', ';
                                        }
                                        ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url("laporan/foto/{$row->id_bencana}") ?>" class="btn btn-xs btn-success" title="Lihat Album Foto"><i class="fa fa-eye"></i></a>
                                        <a href="#" onclick="delete_bencana('<?= $row->id_bencana; ?>');" class="btn btn-xs btn-danger" title="Hapus"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="col-md-12">
                        <?= $this->pagination->create_links(); ?>
                    </div> 
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="callout callout-default">
                        <h5>Keterangan :</h5>
                        <table>
                            <tr>
                                <td>KK</td>
                                <td class="text-center" width="15px;">:</td>
                                <td>Kepala Keluarga</td>
                            </tr>
                            <tr>
                                <td>Jiwa</td>
                                <td class="text-center" width="15px;">:</td>
                                <td>Korban Jiwa</td>
                            </tr>
                            <tr>
                                <td>RR</td>
                                <td class="text-center" width="15px;">:</td>
                                <td>Rusak Ringan</td>
                            </tr>
                            <tr>
                                <td>RS</td>
                                <td class="text-center" width="15px;">:</td>
                                <td>Rusak Sedang</td>
                            </tr>
                            <tr>
                                <td>RB</td>
                                <td class="text-center" width="15px;">:</td>
                                <td>Rusak Berat</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- box-footer -->
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->
<style type="text/css">
    .top { margin-top:20px; }
    .mini-font { font-size:11px; }
</style>

<!-- Hapus -->
<div class="modal modal-default" id="delete_bencana" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus data?</h4>
            </div>
            <div class="modal-body">
                <p><font color="red">Foto dokumentasi</font> yang berkaitan dengan data bencana ini akan terhapus</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default pull-left" data-dismiss="modal">Tidak</a>
                <div id="del_bencana"></div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    function delete_bencana(id) {
        $('#delete_bencana').modal('show');
        $('#del_bencana').html('<a href="' + base_domain + '/laporan/set_bencana?method=delete&id=' + id + '" class="btn btn-danger">Hapus</a>');
        return false;
    }
    function edit_foto(id, bencana) {
        $.ajax({
            url: base_domain + '/laporan/get_foto/' + id,
            dataType: 'json',
            success: function (response) {
                if (response['status']) {
                    var item = response['result'][0];
                    $('#edit_foto').modal('show');
                    $('#nama_foto').val(item['file_name']);
                    $('#form_edit_foto').attr('action', base_domain + '/laporan/set_foto?id=' + id + '&method=update&bencana=' + bencana);
                } else {
                    alert('ERROR!');
                }
            },
            error: function () {
                alert('ERROR!');
            }
        });
        return false;
    }

    function delete_foto(id, bencana) {
        $('#delete_foto').modal('show');
        $('#del_foto').html('<a href="' + base_domain + '/laporan/set_foto?method=delete&id=' + id + '&bencana=' + bencana + '" class="btn btn-danger">Hapus</a>');
        return false;
    }
</script>