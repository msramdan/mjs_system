 <html><head>
    <title>Surat Keterangan Request</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
            .word-table {
                border:0px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:0px solid black !important; 
                padding: 0px 0px;
            }

            #footer {
                position: fixed; 
                bottom: -60px; 
                left: 0px; 
                right: 0px;
                height: 80px; 

                text-align: center;
                line-height: 16px;
            }
        </style>
</head><body >
    <table border="0" cellpadding="0" align="center" style="margin-top: -50px;">
                    <tr>
                        <td style="width: 20%;">
                            <img  width="150" height="100" src="assets/assets/img/logo/logo.png"  >
                        </td>
                        <td style="width: 80%;text-align: center;">
                            <h2><?= $sett_apps->company ?></h2>
                            <p style="padding: 5px"><?= $sett_apps->alamat ?></p>
                        </td>
                    </tr>
    </table>
    <table >
        
    </table>
    <hr>

    <h3 style="margin: 50px 0; text-align: center;">Surat Keterangan Request</h3>

    <table class="word-table" border="0" style="line-height: 22px; padding: 3px">
	    <tr><td style="padding: 2px">Kode RF</td><td>:</td><td style="padding: 2px"><?php echo $kode_request_form; ?></td></tr>
	    <!-- <tr><td style="padding: 2px">User Penginput</td><td>:</td><td style="padding: 2px"><?php echo $nama_user; ?></td></tr> -->
	    <tr><td style="padding: 2px">Tanggal RF</td><td>:</td><td style="padding: 2px"><?php echo $tanggal_request; ?></td></tr>
	    <tr><td style="padding: 2px">Categori RF</td><td>:</td><td style="padding: 2px"><?php echo $request; ?></td></tr>
	    <tr><td style="padding: 2px">Status RF</td><td>:</td><td style="padding: 2px"><?php 
	    if ($status == 'Dalam Review') {
	    	?>
	    	<button class="btn btn-xs btn-primary"><?php echo $status; ?></button>
	    	<?php
	    }

	    if ($status == 'Ditolak') {
	    	?>
	    	<button class="btn btn-xs btn-danger" data-bs-toggle="modal" href="#message-disapproved-dialog"><?php echo $status; ?></button>
	    	<?php
	    }

	    if ($status == 'Diterima') {
	    	?>
	    	<button class="btn btn-xs btn-success"><?php echo $status; ?></button>
	    	<?php
	    }
		?></td></tr>
	    <tr style="vertical-align: inherit"><td style="padding: 2px; ">Keterangan</td><td>:</td><td style="padding: 2px; text-align: justify;"><?php echo $keterangan; ?></td></tr>
	    <tr>
	    	<td style="padding: 2px">Attachment</td>
	    	<td>:</td>
	    	<td style="padding: 2px">
	    			<?php

			        	$lo = $classnyak->find_berkas_for_this_request_form($request_form_id);

			        	if ($lo) {
			        		foreach($lo as $k) {
			        			?>
						                - <?php echo $k->nama_berkas ?>
			        			<?php
			        		}
			        	} else {
			        		echo 'Tidak ada berkas';
			        	}
			        	?> 		
	    	</td>
		</tr>
	</table>

    <table class="" style="margin-top: 80px; width: 100%;text-align: center; margin-left: 10px">
        <tr> 
          <td width="25%" style="margin: 25px 0;">Jakarta, <?= date('d F Y') ?></td> 
        </tr>
        <tr>
        	<?php 
					$wh = json_decode($whoisreviewing, true);
					//print_r($wh);
					foreach ($wh as $key => $value) {
                           ?>
                           <td width="25%">Mengetahui</td>
                           <?php
					}
				?>
        </tr>
        <tr>
          <?php
          			foreach ($wh as $key => $value) {

          					?>
          					<td style="height: 80px;"><img width="100%" height="100%" src="assets/assets/img/file_rf/<?php echo $classnyak->get_signature($request_form_id, $kode_request_form, $value['user_id'])?>" /></td>

          					<?php
					}
          ?>
        </tr>
        <tr>
          <?php 
          			foreach ($wh as $key => $value) {
                           ?>
                           <td><?php echo explode(' ',$classnyak->getusername($value['user_id'])[0]->nama_user)[0]; ?></td>
                           <?php
					}
          ?>
        </tr>            
	</table>



<table id="footer" width="100%">
  <tr>
    <td width="100%"><b><?= $sett_apps->company ?> </b> || <?= $sett_apps->alamat ?></td>
  </tr>
</table>
</body></html>