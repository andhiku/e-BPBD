<?php
$where = array(
    'id_jenis' => $this->input->get('jenisbencana'),
//    'kecamatan' => $this->input->get('kecamatan'),
//    'desa' => $this->input->get('desa'),
    'bln' => $this->input->get('bln'),
    'thn' => $this->input->get('thn'),
//      'thn_history' => $this->input->get('thn_history')
);
?>
<section class="content-header">
          <h1>
              <small><b>Laporan Bulanan Kejadian Bencana</b></small>
          </h1>
          <ol class="breadcrumb">
            <li>
              <a href="<?php echo base_url('laporan_history'); ?>"><i class="fa fa-dashboard"></i> Laporan Bulanan</a>
            </li>
            <li class="active">Laporan Bulanan</li>
          </ol>
        </section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Laporan Bulanan</h3>
                    <div class="box-tools">
                        <a href="<?php echo site_url("laporan_history/cetak?jenisbencana={$where['id_jenis']}&bln={$where['bln']}&thn={$where['thn']}"); ?>" class="btn btn-default" target="_blank"><i class="fa fa-print"></i> Cetak</a>
                        <!--<a href="< ?php echo site_url("laporan_history/cetak?jenisbencana={$where['id_jenis']}&thn={$where['thn']}&desa={$where['desa']}&thn_history={$where['thn_history']}&bln={$where['bln']}"); ?>" class="btn btn-default" target="_blank"><i class="fa fa-print"></i> Cetak</a>-->
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="" method="get">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jenis Bencana :</label>
                                <select class="form-control input-sm" name="jenisbencana">
                                    <option value="">- SEMUA BENCANA -</option>
                                    <?php foreach ($this->mbpn->jenis_hak() as $row) :
                                        $sama = ($where['id_jenis'] == $row->id_jenis) ? 'selected' : '';
                                        echo "<option value='{$row->id_jenis}' {$sama}>{$row->jenis_bencana}</option>";
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Bulan :</label>
                                <select class="form-control input-sm" style="width: 100%;" name="bln">
                                    <option value="">- SEMUA BULAN -</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei </option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tahun :</label>
                                <input type="text" name="thn" class="form-control input-sm" value="<?php echo $where['thn'] ?>" placeholder=" - SEMUA TAHUN - ">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                </br>
                                <button type="submit" class="btn btn-default right"><i class="fa fa-search"></i> Filter</button>
                                <a href="<?php echo site_url('laporan_history') ?>" class="btn btn-default right" style="margin-left: 10px;"><i class="fa fa-times"></i> Reset</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="mini-font">
                            <tr>
                                <th>No.</th>
                                <th>Jenis Bencana</th>
                                <th>Tanggal</th>
<!--                                <th>Bulan</th>
                                <th>Tahun</th>-->
                                <th>Kecamatan</th>
                                <th>Desa</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="mini-font">
                            <?php $no = ($this->input->get('page')) ? $this->input->get('page') : 0;
                            foreach ($data_history as $row) : ?>
                                <?php
                                $get_tanggal = $row->tanggal;
                                $date_arr = explode('-', $get_tanggal);
                                ?>
                                <tr>
                                    <td><?php echo ++$no; ?>.</td>
                                    <td><?php echo (!$row->id_jenis) ? '-' : $this->bpn->hak($row->id_jenis); ?></td>
                                    <td><?php echo $date_arr[2] . " " .  bulan($date_arr[1]) . " " . $date_arr[0]; ?></td>
                                    <td><?php echo (!$row->id_kecamatan) ? '-' : $this->bpn->kecamatan($row->id_kecamatan); ?></td>
                                    <td><?php echo (!$row->id_desa) ? '-' : $this->bpn->desa($row->id_desa); ?></td>
                                    <td><?php echo $row->ket; ?></td>
                                </tr>
<?php endforeach; ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
<?php echo $this->pagination->create_links(); ?>
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