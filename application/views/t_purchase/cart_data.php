<?php $no = 1;
if ($cart->num_rows() >0) {
	foreach ($cart->result() as $c => $data) { ?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $data->kd_internal_item?></td>
			<td><?= $data->item_name ?></td>
			<td><?= $data->deskripsi ?></td>
			<td class="text-right"><?= rupiah($data->cart_price) ?></td>
			<td class="text-center"><?= $data->qty ?></td>
			<td class="text-center"><?= $data->nama_unit ?></td>
			<td class="text-right" id="total123" ><?= $data->total  ?></td>

			<td class="text-center" width="160px">
				<button id="update_cart" data-toggle="modal" data-target="#modal-item-edit"
				data-cartid="<?=$data->cart_id ?>"
				data-kd_internal_item="<?=$data->kd_internal_item ?>"
				data-product="<?=$data->item_name ?>"
				data-price="<?=$data->cart_price ?>"
				data-qty="<?=$data->qty ?>"
				data-total="<?=$data->total ?>"
				class="btn btn-xs btn-primary">
				<i class="fa fa-pencil"></i><i class="fas fa-pencil-alt" aria-hidden="true"></i>
				</button>
				<button id="del_cart" data-cartid="<?=$data->cart_id ?>" class="btn btn-xs btn-danger">
					<i class="fas fa-trash-alt" aria-hidden="true"></i>				
				</button>
			</td>
		</tr>
		<?php
	}
}else{
	echo '<tr>
	<td colspan="8" class="text-center">Tidak ada Item<td>
	</tr>';
}

?>