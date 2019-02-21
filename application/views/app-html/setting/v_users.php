<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <div class="col-md-5">
                        <a href="" class="btn btn-default" title="Tambahkan User" data-toggle="modal" data-target="#addUser"><i class="fa fa-user-plus"></i> Tambahkan User</a>
                    </div>
                    <div class="col-md-7">
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-bordered">
                        <tr>
                            <th width="10px;"><i class="fa fa-laptop"></i></th>
                            <th width="10px;">#</th>
                            <th>Username</th>
                            <th>Nama Lengkap</th>
                            <th>Level Akses</th>
                            <th>Status</th>
                            <th width="100px;"></th>
                        </tr>
                        <?php $no = (!$this->input->get('page')) ? 0 : $this->input->get('page');
                        foreach ($data_users as $row) : ?>
                            <tr>
                                <td><?php if ($row->status == 'online') {
                                echo '<i class="fa fa-circle text-green" title="Sedang Aktif"></i>';
                            } else {
                                echo '<i class="fa fa-circle text-gray" title="Tidak Aktif"></i>';
                            } ?></td>
                                <td><?php echo ++$no; ?>.</td>
                                <td><?php echo $row->username; ?></td>
                                <td><?php echo $row->nama_lengkap; ?></td>
                                <td><?php
                                if ($row->level_akses == 'admin') : echo 'Administrator';
                                elseif ($row->level_akses == 'operator') : echo 'Operator';
                                elseif ($row->level_akses == 'viewer') : echo "Kepala Pelaksana";
                                elseif ($row->level_akses == 'super_admin') : echo "Administrator";
                                else : echo "-";
                                endif;
                                ;
                            ?></td>
                                <td><?php echo ($row->status_user == 'valid') ? 'Aktif' : 'Tidak Aktif'; ?></td>
                                <td>
                            <?php if ($row->status_user == 'valid') : ?>
                                        <a href="<?php echo site_url("setting/cusers/block/{$row->id}?method=valid") ?>" class="btn btn-xs btn-default" title="Block User"><i class="fa fa-unlock text-green"></i></a>
                            <?php else : ?>
                                        <a href="<?php echo site_url("setting/cusers/block/{$row->id}?method=not") ?>" class="btn btn-xs btn-default" title="Unblock User"><i class="fa fa-lock text-warning"></i></a>
                            <?php endif; ?>
                                    <a href="#" onclick="delete_user('<?php echo $row->username; ?>');" class="btn btn-xs btn-default" title="Hapus User"><i class="fa fa-trash-o text-red"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                <?php echo $this->pagination->create_links(); ?> 
                </div>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<style>  .top { margin-top:20px; }</style>




<!--dialog area-->
<div class="modal fade modal-default" id="addUser" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-user-plus"></i> Menambahkan User Baru</h4>
            </div>
            <form action="<?php echo site_url('setting/cusers/add') ?>" id="form_add_user" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama Lengkap :</label>
                                    <input name="nama" type="text" class="form-control" placeholder="*Masukkan Nama Lengkap" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Username :</label>
                                    <input name="username" type="text" class="form-control" placeholder="*Masukkan Username" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Level Akses :</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="akses" value="super_admin" id="status1"> Administrator
                                        </label><br>
<!--                                        <label class="left">
                                            <input type="radio" name="akses" value="admin" id="status2"> Administrator
                                        </label><br>
                                        <label class="left">
                                            <input type="radio" name="akses" value="operator" id="status3"> Operator
                                        </label><br>-->
                                        <label class="left">
                                            <input type="radio" name="akses" value="viewer" id="status4"> Kepala Pelaksana
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password :</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </div>
                                        <input name="pass" type="password" class="form-control" placeholder="*Masukkan password" required>
                                    </div><!-- /.input group -->   
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ulangi Password :</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </div>
                                        <input name="again" type="password" class="form-control" placeholder="*Ulangi password" required>
                                    </div><!-- /.input group -->   
                                </div>
                            </div>
                        </div>  <!--./col-12-->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary"> Tambahkan</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--end dialog-->

<!-- Hapus -->
<div class="modal modal-default" id="delete_user" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus User ini?</h4>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default pull-left" data-dismiss="modal">Batal</a>
                <div id="del_user"></div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->