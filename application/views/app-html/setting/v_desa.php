<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Kecamatan : <?php echo $this->bpn->kecamatan($this->uri->segment(4)) ?></h3>
                    <a href="#" class="btn btn-default pull-right" title="Pemekaran Kecamatan" data-toggle="modal" data-target="#add_desa"><i class="fa fa-plus"></i> Tambah Desa</a>
                </div>
                <div class="box-body table-responsive">
                    <div class="col-md-12">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 50px">#</th>
                                    <th>Nama Desa</th>
                                    <th>Jumlah Dokumen</th>
                                    <th style="width: 100px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = (!$this->input->get('page')) ? 0 : $this->input->get('page');
                                foreach ($data_desa as $row) : ?>
                                    <tr>
                                        <td><?php echo ++$no; ?>.</td>
                                        <td><?php echo $row->nama_desa; ?></td>
                                        <td><?php echo $this->db->get_where('tb_bencana', array('id_desa' => $row->id_desa))->num_rows(); ?></td>
                                        <td class="text-center">
                                            <a href="#" onclick="edit_desa('<?php echo $row->id_desa; ?>', '<?php echo $row->id_kecamatan ?>');" class="btn btn-xs btn-primary" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="#" onclick="delete_desa('<?php echo $row->id_desa; ?>', '<?php echo $row->id_kecamatan ?>');" class="btn btn-xs btn-danger" title="Hapus"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="col-md-12">
                            <?php echo $this->pagination->create_links(); ?> 
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">

                </div>
            </div>
            <!-- /.box -->
        </div>
    </div><!--./row-->
</section>

<div class="modal modal-default" id="add_desa" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <form action="<?php echo site_url("setting/cwilayah/set_desa?method=add&kecamatan={$this->uri->segment(4)}"); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Menambahkan Desa / Kelurahan</h4>
                </div>
                <div class="modal-body">
                    <label>Desa / Kelurahan :</label>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input name="desa" type="text" class="form-control" placeholder="*Masukkan Nama Desa / Kelurahan..." required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary"> Tambahkan</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal modal-default" id="edit_desa" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <form action="" id="form_edit_desa" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"> Update Desa / Kelurahan</h4>
                </div>
                <div class="modal-body">
                    <label>Desa / Kelurahan :</label>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input name="desa" id="nama_desa" type="text" class="form-control" placeholder="*Masukkan Nama Desa / Kelurahan..." required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary"> Update</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Hapus -->
<div class="modal modal-default" id="delete_desa" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus desa?</h4>
            </div>
            <div class="modal-body">
                <p>Data yang berkaitan dengan desa akan secara otomatis terhapus, termasuk dokumen buku, dan warkah.</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default pull-left" data-dismiss="modal">Tidak</a>
                <div id="del_desa"></div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->