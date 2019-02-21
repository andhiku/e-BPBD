        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-warning">
                <div class="box-header with-border">
                  <a href="#" class="btn btn-default" title="Pemekaran Kecamatan" data-toggle="modal" data-target="#add_kecamatan"><i class="fa fa-plus"></i> Tambah kecamatan</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                  <div class="col-md-12">
                    <table class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th style="width: 50px">#</th>
                        <th>Nama Kecamatan</th>
                        <th>Jumlah Desa</th>
                        <th>Jumlah Dokumen</th>
                        <th style="width: 100px"></th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $prov = $this->db->get_where('tb_kecamatan', array('id_kecamatan' => 7))->row(); 
                      $kab = $this->db->get_where('tb_desa', array('id_kecamatan' =>7 ))->row();
                      ?>
                      <tr class="bg-danger">
                        <td><i class="fa fa-map"></i></td>
                        <td><?php echo strtoupper($prov->nama_kecamatan); ?></td>
                        <td><?php echo strtoupper($kab->nama_desa); ?></td>
                        <td></td>
                        <!--<td>< ?php echo $this->db->get_where('tb_bencana', array('id_kecamatan'=>$prov->id_kecamatan))->num_rows(); ?></td>-->
                        <td class="text-center">
                            <a href="#" data-toggle="modal" data-target="#edit_prop" class="btn btn-xs btn-primary" title="Edit"><i class="fa fa-edit"></i></a>
                        </td>
                      </tr>
                      <?php 
                      $no = (!$this->input->get('page')) ? 0 : $this->input->get('page'); foreach($data_kecamatan as $row) :  
                      if($row->id_kecamatan==7) : continue; endif; ?>
                        <tr>
                          <td><?php echo ++$no; ?>.</td>
                          <td><?php echo strtoupper($row->nama_kecamatan); ?></td>
                          <td><?php echo $this->db->get_where('tb_desa', array('id_kecamatan'=>$row->id_kecamatan))->num_rows(); ?></td>
                          <td><?php echo $this->db->get_where('tb_bencana', array('id_kecamatan'=>$row->id_kecamatan))->num_rows(); ?></td>
                          <td class="text-center">
                            <a href="<?php echo site_url("setting/cwilayah/desa/{$row->id_kecamatan}") ?>" class="btn btn-xs btn-success" title="Atur Desa"><i class="fa fa-eye"></i></a>
                            <a href="#" onclick="edit_kecamatan('<?php echo $row->id_kecamatan; ?>');" class="btn btn-xs btn-primary" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="#" onclick="delete_kecamatan('<?php echo $row->id_kecamatan; ?>');" class="btn btn-xs btn-danger" title="Hapus"><i class="fa fa-trash-o"></i></a>
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

            <div class="modal modal-default" id="add_kecamatan" tabindex="-1" data-backdrop="static" data-keyboard="false">
              <div class="modal-dialog">
                <form action="<?php echo site_url("setting/cwilayah/set_kecamatan?method=add"); ?>" method="post">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Menambahkan Kecamatan</h4>
                  </div>
                  <div class="modal-body">
                  <label>Kecamatan :</label>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input name="kecamatan" type="text" class="form-control" placeholder="*Masukkan Nama Kecamatan..." required>
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

            <div class="modal modal-default" id="edit_kecamatan" tabindex="-1" data-backdrop="static" data-keyboard="false">
              <div class="modal-dialog">
                <form action="" id="form_edit_kecamatan" method="post">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"> Update Kecamatan</h4>
                  </div>
                  <div class="modal-body">
                  <label>Kecamatan :</label>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input name="kecamatan" id="nama_kecamatan" type="text" class="form-control" placeholder="*Masukkan Nama Kecamatan..." required>
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
        <div class="modal modal-default" id="delete_kecamatan" tabindex="-1" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus kecamatan?</h4>
              </div>
              <div class="modal-body">
                <p>Data yang berkaitan dengan kecamatan akan secara otomatis terhapus, termasuk dokumen buku, dan warkah.</p>
              </div>
              <div class="modal-footer">
                <a href="#" class="btn btn-default pull-left" data-dismiss="modal">Tidak</a>
                <div id="del_kecamatan"></div>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


            <div class="modal modal-default" id="edit_prop" tabindex="-1" data-backdrop="static" data-keyboard="false">
              <div class="modal-dialog">
                <form action="<?php echo site_url("setting/cwilayah/update_prop/{$prov->id_kecamatan}") ?>" id="form_edit_kecamatan" method="post">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"> Update Propinsi dan Kabupaten</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Nama Propinsi :</label>
                          <input name="prop" id="prop" type="text" class="form-control" value="<?php echo $prov->nama_kecamatan; ?>" placeholder="*Masukkan Nama Propinsi..." required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Nama Kabupaten / Kota :</label>
                          <input name="kab" id="kab" type="text" class="form-control" value="<?php echo $kab->nama_desa; ?>" placeholder="*Masukkan Nama Kabupaten / Kota..." required>
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