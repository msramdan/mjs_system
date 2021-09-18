<div class="modal fade" id="dissaprove-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="POST" action="<?php echo site_url('request_queue/disapprove') ?>" enctype="multipart/form-data">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel2">Tolak Request</h4>
					<button type="button" class="btn-close" data-dismiss="modal" aria-hidden="true"></button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="kd_form_request" id="kd_form_request" value="<?php echo $kd_form_request ?>">
					<input type="hidden" name="request_form_id" id="request_form_id" value="<?php echo $request_form_id ?>">
					<input type="hidden" name="categori_request_id" id="categori_request_id" value="<?php echo $categori_request_id ?>">
					<textarea name="disapprove_reason" id="disapprove_reason"></textarea>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times-circle"></i> Batal</button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>Approve</button>
				</div>
			</form>
    </div>
  </div>
</div>