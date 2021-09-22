<div class="form-group">
    <select class="form-control">
    	<?php

    	$cek = $classnyak->deteksiKehadiran($lokasi_id, $date, encrypt_url($karyawan->karyawan_id));

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