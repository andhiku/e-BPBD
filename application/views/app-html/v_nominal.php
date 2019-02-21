<section class="content-header">
    <h1>
        <small><b>Laporan Bencana</b></small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="<?= base_url('nominal'); ?>"><i class="fa fa-dashboard"></i> Nominal</a>
        </li>
        <li class="active">Nominal</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Nominal</h3>
                </div>
                <?php
                echo validation_errors();
                echo form_open('nominal');
                ?>
                <div class="box-body">
                    <div class="tab-pane">
                        <div class="col-md-12 form-horizontal">
                            <div class="form-group">
                                <label class="col-lg-1 col-xs-12 control-label">Nominal :</label>
                                <div class="col-lg-11 col-xs-7">
                                    <input type="text" class="form-control" name="nom" />
                                    <small><font color="blue">Tanpa spesial karakter</font> dan <font color="red">pisahkan nominal dengan spasi</font></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-success btn-lg" name="submit">
                            <i class="fa fa-save"></i> Submit</button>
                    </div>
                </div>
                <?= form_close(); ?>
                <div class="box-body table-responsive">
                    <table class="table table-striped table-hover" id="nom" width="100%">
                        <thead class="mini-font">
                            <tr>
                                <th rowspan="3" class="text-center">Hasil</th>
                            </tr>
                        </thead>
                        <tbody class="mini-font">
                            <?php
                            $no = 1;
                            $ulang = count($pecah);
                            for ($i = 0; $i < $ulang; $i++) {
                                ?>
                                <tr>
                                    <td><?= "Angsuran bulan " . $no++ . " sebesar " . rph($pecah[$i]) . ",- (" . terbilang($pecah[$i]) . " rupiah)."; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>