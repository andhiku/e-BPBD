        <section class="content">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-warning">
              <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="<?php if($data->foto !='') : echo base_url("assets/user/{$data->foto}");  else : echo base_url('assets/dist/img/no-images.PNG'); endif; ?>" alt="User profile picture">
                <h3 class="profile-username text-center"><?php echo $data->nama_lengkap; ?></h3>
                <p class="text-muted text-center">Username : <?php echo $data->username; ?></p>
                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b>Level Akses</b> <span class="pull-right"> <?php echo level_akses($data->level_akses); ?> </span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="nav-tabs-custom tab-warning">
              <ul class="nav nav-tabs">
                <!--<li class="< ?php echo ($this->input->get('data')=='history') ? 'active' : ''; ?>"><a href="?data=history">Aktivitas</a></li>-->
                <li class="<?php echo ($this->input->get('data')=='update') ? 'active' : ''; ?>"><a href="?data=update">Ubah Data</a></li>
                <li class="<?php echo ($this->input->get('data')=='security') ? 'active' : ''; ?>"><a href="?data=security">Ganti Password</a></li>
              </ul>
              <div class="tab-content">
<!--                <div class="tab-pane < ?php echo ($this->input->get('data')=='history') ? 'active' : ''; ?>" id="activity">
                < ?php if(!count($data_history)) : ?>
                  <div class="alert alert-default bg-gray alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-smile-o"></i> Tidak ada Hal yang anda lakukan hari ini</h4>
                    Data ini akan terisi jika anda melakukan suatu hal seperti : Menambahkan Data, melakukan pencarian data, atau melakukan perubahan dan semua yang berkaitan pada data yang ada pada Database.
                  </div>
                < ?php else : ?>

                    <table class="table table-bordered">
                      <thead class="mini-font">
                        <tr>
                          <th width="10">No.</th>
                          <th>Waktu</th>
                          <th>Jenis Hak</th>
                          <th>Nomor Hak</th>
                          <th>Nomor 208</th>
                          <th>Tahun</th>
                          <th>Kelurahan</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody class="mini-font">
                        < ?php $no=(!$this->input->get('page')) ? 1 : $this->input->get('page'); foreach($data_history as $row) : ?>
                        <tr>
                          <td>< ?php echo $no++; ?>.</td>
                          <td>< ?php echo $row->time; ?> <small><i><time class="timeago" datetime="< ?php echo $row->time; ?>">< ?php echo $row->time; ?></time></i></small></td>
                          <td>< ?php echo $this->bpn->hak($row->id_hak); ?></td>
                          <td>< ?php echo $row->no_hakbuku; ?></td>
                          <td>< ?php echo $row->no208; ?></td>
                          <td>< ?php echo $row->tahun; ?></td>
                          <td>< ?php echo (!$row->id_desa) ? '-' : $this->bpn->desa($row->id_desa); ?></td>
                          <td>< ?php echo $row->deskripsi; ?></td>
                        </tr>
                        < ?php endforeach; ?>
                      </tbody>
                    </table>
                < ?php endif; ?>
                  <div class="row">
                  <hr>
                    <div class="col-md-12">
                      < ?php echo $this->pagination->create_links(); ?>
                    </div>
                  </div>
                </div>-->
                <div class="tab-pane <?php echo ($this->input->get('data')=='update') ? 'active' : ''; ?>" id="settings">
                <form action="<?php echo site_url('setting/profile/update') ?>" id="add_buku" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Nama lengkap</label>
                      <div class="col-sm-10">
                        <input name="nama" type="text" value="<?php echo $data->nama_lengkap; ?>" class="form-control" placeholder="*Nama Lengkap..." required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Username<span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <input name="username" type="text" value="<?php echo $data->username; ?>" class="form-control" placeholder="*Username...">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Foto</label>
                      <div class="col-sm-10">
                        <input name="img" type="file">
                        <input type="hidden" name="no_file" value="<?php echo $data->foto; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-11">
                        <input type="submit" class="btn btn-primary pull-right" value="Simpan">
                      </div>
                    </div>
                  <hr>
                </form>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane <?php echo ($this->input->get('data')=='security') ? 'active' : ''; ?>" id="pass">
                  <form class="form-horizontal" action="<?php echo site_url('setting/profile/update_pass') ?>" id="form_ganti_pass" method="post">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Password Lama</label>
                      <div class="col-sm-10">
                        <input name="lama" type="password" class="form-control" placeholder="*Masukkan password lama..." required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Password Baru</label>
                      <div class="col-sm-10">
                        <input name="password" type="password" class="form-control" placeholder="*Masukkan password baru..." required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-11">
                        <input type="submit" class="btn btn-primary pull-right" value="Simpan">
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        </section>
<style>.mini-font { font-size:11px; }</style>
