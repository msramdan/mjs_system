
<?php
foreach ($recap_data_list as $key => $value) {
    ?>
    <tr>
        <td>
            <?php echo $value->nama_karyawan ?>
        </td>
        <td><?php echo $value->Januari ?></td>
        <td><?php echo $value->Februari ?></td>
        <td><?php echo $value->Maret ?></td>
        <td><?php echo $value->April ?></td>
        <td><?php echo $value->Mei ?></td>
        <td><?php echo $value->Juni ?></td>
        <td><?php echo $value->Juli ?></td>
        <td><?php echo $value->Agustus ?></td>
        <td><?php echo $value->September ?></td>
        <td><?php echo $value->Oktober ?></td>
        <td><?php echo $value->November ?></td>
        <td><?php echo $value->Desember ?></td>
    </tr>
    
    <?php   
}

$arr = array(
	'data' => $recap_data_list
)L

echo json_encode($arr);
?>