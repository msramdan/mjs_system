<script src="<?= base_url() ?>assets/assets/js/signature.js"></script>


<div class="modal fade" id="approve-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="POST" action="<?php echo site_url('pengajuan_karyawan/approve') ?>" enctype="multipart/form-data">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel2">HR/GA Signature</h4>
					<button type="button" class="btn-close" data-dismiss="modal" aria-hidden="true"></button>
				</div>
				<div class="modal-body">
					<input hidden="hidden" type="text" name="kd_form_request" id="kd_form_request" value="<?php echo $kd_form_request ?>">
					<input type="hidden" name="signer" id="signer" value="<?php echo $this->session->userdata('userid') ?>">
					<p style="float: left;">Beri tanda tangan :</p>
					<button type="button" class="btn btn-danger" onclick="tandaTangan.clear()" style="float: right;">
						<i class="fa fa-eraser fa-fw"></i>Hapus
					</button>
					<br>
					<div id="canvas" style="margin-top: 25px; border: 1px #bbadad solid; border-radius: 2px;">
						Canvas is not supported.
					</div>

					<script>
						tandaTangan.capture();
					</script>
					<br />
					<img hidden="hidden" id="saveSignature" name="saveSignature" alt="Saved image png"/>
					<input hidden="hidden" type="text" name="image" id="image" value="">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times-circle fa-fw"></i> Batal</button>
					<button onclick="tandaTangan.save()" class="btn btn-primary"><i class="fa fa-check-circle fa-fw"></i>Disapprove</button>
				</div>
			</form>
    </div>
  </div>
</div>