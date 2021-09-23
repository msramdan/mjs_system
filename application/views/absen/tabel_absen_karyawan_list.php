<table id="tbl-absen-list" class="table table-bordered table-hover table-td-valign-middle text-white">
    <thead>
        <tr>
            <th width="1%">No</th>
            <th>NIK</th>
            <th>Nama Karyawan</th>
            <th>No Hp</th>
            <th>Status</th>
            <th>Alasan</th>
            <th>Lampiran</th>
            <th hidden="">Jam Masuk</th>
            <th hidden="">Jam Keluar</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
            foreach ($karyawan as $karyawan)
            {
                ?>
                <tr id="<?php echo encrypt_url($karyawan->karyawan_id) ?>">
                    <td><?= $no++?></td>
                    <td><?php echo $karyawan->nik ?></td>
                    <td><?php echo $karyawan->nama_karyawan ?></td>
                    <td><?php echo $karyawan->no_hp ?></td>
                    <td style="text-align:center">
                        <div class="form-group">
                            <select class="form-control select_status" id="select_status" name="select_status[]" style="width: 94px;">
                                <?php

                                $cek = $classnyak->deteksiKehadiran($lokasi_id, $date, $karyawan->karyawan_id);

                                $dataKehadiran = $classnyak->get_dataKehadiran($lokasi_id, $date, $karyawan->karyawan_id);

                                $arr = ['-','Masuk','Sakit','Izin','Alfa'];

                                foreach($arr as $l) {
                                    ?>
                                        <option value="<?php echo $l ?>" <?php if ($cek == $l) {
                                            echo 'selected';
                                        } ?> style="color: black"><?php echo $l ?></option>
                                    <?php       
                                }
                                ?>
                            </select>
                        </div>
                    </td>

                    <?php

                    if ($dataKehadiran) {
                        if ($cek === 'Masuk' || $cek === 'Alfa') {
                            ?>
                                <td>N/A</td>
                                <td>N/A</td>
                            <?php
                        } else {
                            ?>
                                <td><input type="text" name="alasan[]" value="enter something here" required=""></td>
                                <td><input type="file" name="lampiran[]"  required=""></td>
                            <?php
                        }
                        ?>
                        <td hidden=""><?php echo $dataKehadiran[0]->jam_masuk ?></td>
                        <td hidden=""><?php echo $dataKehadiran[0]->jam_pulang ?></td>
                        <?php
                    }
                    else
                    {
                        ?>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td hidden=""><input type="text" name="jam_masuk[]" value="enter something here" required=""></td>
                        <td hidden=""><input type="text" name="jam_keluar[]" value="enter something here" required=""></td>
                        <?php
                    }

                    ?>
                    <td hidden="hidden">
                        <input type="text" name="karyawan_id[]" value="<?php echo $karyawan->karyawan_id ?>">
                    </td>
                </tr>
        <?php } ?>
    </tbody>
</table>
<a style="margin: 5px; float: right;" href="<?php echo site_url('absen') ?>" class="btn btn-info"><i class="fas fa-undo"></i> Kembali</a></td></tr>
<button type="button" class="btn btn-danger" id="btn-save-absen" style="margin: 5px; float: right;"><i class="fas fa-save"></i> Simpan Data</button>