
<p><small><span style="color: red;">*</span> Sudah terabsen</small></p>
<form id="form_absensi_list" method="post" enctype="multipart/form-data">
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
                            <div class="form-group" style="display: flex;">
                                <select class="form-control select_status" id="select_status" name="select_status[]" style="width: 94px;">
                                    <?php

                                    $cek = $classnyak->deteksiKehadiran($lokasi_id, $date, $karyawan->karyawan_id);

                                    $dataKehadiran = $classnyak->get_dataKehadiran($lokasi_id, $date, $karyawan->karyawan_id);

                                    $arr = ['Masuk','Sakit','Izin','Alfa','Cuti'];

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
                            if ($cek == 'Masuk' || $cek == 'Alfa') {
                                ?>
                                    <td>N/A<input type="hidden" name="alasan[]" class="alasan" placeholder="Masukan alasan..."></td>
                                    <td>N/A<input type="file" name="lampiran[]" accept="image/*,.pdf" class="lampiran" style="visibility: hidden;"></td>
                                <?php
                            } else {
                                ?>
                                    <td><input type="text" name="alasan[]" class="alasan" placeholder="Masukan alasan..." required="" value="<?php echo $dataKehadiran[0]->alasan ?>"></td>
                                    <?php
                                    if ($dataKehadiran[0]->lampiranabsen) {
                                        ?>
                                        <td><input type="hidden" name="photolama" id="photolama" value="<?php echo $dataKehadiran[0]->lampiranabsen ?>"><a class="btn btn-primary" href="<?php echo base_url().'assets/assets/img/absen_files/'.$dataKehadiran[0]->lampiranabsen ?>" rel="noopener noreferrer" target="_blank"><i class="fas fa-eye"></i> Lihat/Unduh</a></td>
                                        <?php
                                    } else {
                                        ?>
                                        <td><input type="file" name="lampiran" accept="image/*,.pdf" class="lampiran" required=""></td>
                                        <?php
                                    }
                                    ?>
                                <?php
                            }
                            ?>
                            <td hidden=""><input type="text" name="jam_masuk[]" required="" value="<?php echo $dataKehadiran[0]->jam_masuk ?>"></td>
                            <td hidden=""><input type="text" name="jam_pulang[]" required="" value="<?php echo $dataKehadiran[0]->jam_pulang ?>"></td>
                            <?php
                        }
                        else
                        {
                            ?>
                            <td>N/A<input type="hidden" name="alasan[]" class="alasan" placeholder="Masukan alasan..."></td>
                            <td>N/A<input type="file" name="lampiran[]" accept="image/*,.pdf" class="lampiran" style="visibility: hidden;"></td>
                            <td hidden=""><input type="text" name="jam_masuk[]" value="09:00" required=""></td>
                            <td hidden=""><input type="text" name="jam_keluar[]" value="18:00" required=""></td>
                            <?php
                        }

                        ?>
                        <td hidden="hidden">
                            <input type="number" name="karyawan_id" id="karyawan_id" value="<?php echo $karyawan->karyawan_id ?>">
                        </td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
    <div style="display: flex;
position: sticky;
bottom: 0;
flex-direction: row-reverse;">
        <!-- <?php
            if ($terabsensemua == 'yes') {
                echo "";
            } else {
                echo "";

            }
        ?> -->

        <a style="margin: 5px;" href="<?php echo site_url('absen') ?>" class="btn btn-info"><i class="fas fa-undo"></i> Kembali</a></td></tr>
        <button type="submit" class="btn btn-danger" id="btn-save-absen" style="margin: 5px; float: right;" value="Simpan"><i class="fas fa-save"></i></button>
    </div>
</form>