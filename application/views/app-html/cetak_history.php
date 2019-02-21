<html>
    <head></head>
    <body onload="window.print()"> <!--  onload="window.print()" -->
        <div class="wrapper">
            <div class="header">
                <div class="big-title">Data Kejadian Bencana</div>
            </div>
        </div>
        <div class="content">
            <table class="gridtable" width="100%">
                <thead>
                    <tr>
                        <th rowspan="3" class="text-center">#</th>
                        <th rowspan="3" class="text-center">Waktu Kejadian</th>
                        <th colspan="3" class="text-center">Lokasi</th>
                        <th colspan="3" class="text-center">Bencana</th>
                        <th colspan="2" class="text-center">Korban</th>
                        <th colspan="3" class="text-center">Kerusakan</th>
                        <th colspan="3" class="text-center">Fasilitas Umum</th>
                        <th colspan="2" class="text-center">Keterangan</th>
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
                        <th rowspan="2">Kerugian</th>
                        <th colspan="1" class="text-center">Petugas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach ($data_loop as $row) :
                        $waktu = explode(':', $row->waktu);
                        $team = explode(',', $row->id_tim);
                        ?> 
                        <tr>
                            <td><?php echo $no++; ?>.</td>
                            <td><?php echo ($waktu[0] . ':' . $waktu[1]); ?><br><?php echo tgl_short_indo($row->tanggal); ?></td>
                            <td><?php echo strtoupper($row->alamat); ?></td>
                            <td><?php echo (!$row->id_kecamatan) ? '-' : $this->bpn->desa($row->id_kecamatan); ?></td>
                            <td><?php echo (!$row->id_desa) ? '-' : $this->bpn->desa($row->id_desa); ?></td>
                            <td><?php echo $row->jenis_bencana;; ?></td>
                            <td> &plusmn; <?php echo strtoupper($row->luas); ?> M<sup>2</sup></td>
                            <td><?php echo strtoupper($row->sebab); ?></td>
                            <td><?php echo ($row->kk); ?></td>
                            <td><?php echo ($row->jiwa); ?></td>
                            <td><?php echo ($row->rusak_ringan); ?></td>
                            <td><?php echo ($row->rusak_sedang); ?></td>
                            <td><?php echo ($row->rusak_berat); ?></td>
                            <td><?php echo ($row->f_pendidikan); ?></td>
                            <td><?php echo ($row->f_peribadatan); ?></td>
                            <td><?php echo ($row->f_kesehatan); ?></td>
                            <td class="text-center">&plusmn;<?php echo number_format_short($row->kerugian); ?></td>
                            <td><?php
                                foreach ($team as $value) {
                                    echo tempel('tb_tim', 'nama_tim', "id_tim = '$value'") . ', ';
                                }
                                ?></td>

<!--                            <td><?php echo $row->jenis_bencana; ?></td>
                            <td><?php echo $row->no_hakbuku; ?></td>
                            <td><?php echo $row->no208; ?></td>
                            <td><?php echo $row->tahun; ?></td>
                            <td><?php echo (!$row->id_desa) ? '-' : $this->bpn->desa($row->id_desa); ?></td>
                            <td><?php echo $row->deskripsi; ?></td>-->
                        </tr>
<?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </body>
</html> 

<style>
    table { font-size:12px; font-family:'Arial'; }
    .header { width:100%; height:10%; text-align:center; font-weight:500;  }
    .big-title {  font-family:'Arial'; font-size:14px; letter-spacing:normal; font-weight:bold; }
    .small-title {  font-family:'Times New Roman'; font-size:13px; letter-spacing:normal; }
    .content { font-size:12px; font-family:'Arial'; margin-top:-20px;}
    .upper { text-transform: uppercase;  }
    .underline { text-decoration: underline; }
    .bold { font-weight:bold; }
    table.gridtable {
        border-width: 1px;
        border-color: black;
        border-collapse: collapse; 
        font-size:0.8em;
    }
    table.gridtable th {
        border-width: 1px;
        padding: 5px;
        border-style: solid;
        border-color: black;
    }
    table.gridtable td {
        border-width: 0.1px;
        border-top: 0px;
        padding: 0px 0px 0px 3px;
        border-style: solid;
        border-color: black;
    }
</style>

