<div id="content" class="app-content">

  <div class="row">

<div class="col-xl-6 ui-sortable">

<div class="panel panel-inverse" data-sortable-id="tree-view-1">
<div class="panel-heading ui-sortable-handle">
<h4 class="panel-title">Input Data COA</h4>
<div class="panel-heading-btn">
<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
</div>
</div>
<div class="panel-body">
  <form method="post" id="treeview_form">
            
            <table class="table  table-bordered table-hover table-td-valign-middle">
            <thead>
              <tr><td >Parent COA <?php echo form_error('parent_coa_id') ?></td><td>
                       <select name="parent_coa_id" id="parent_coa_id" class="form-control"></select>

              </td></tr>

              <tr><td >Kode COA <?php echo form_error('kd_coa') ?></td><td><input type="number" class="form-control" name="kd_coa" id="kd_coa" placeholder="Kode COA" value="" /></td></tr>

              <tr><td >Nama COA <?php echo form_error('coa_name') ?></td><td><input type="text" class="form-control" name="coa_name" id="coa_name" placeholder="Nama COA" value="" /></td></tr>

              <tr><td></td>
                <td>
                  <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> Create</button> 
            </td>
            </tr>
          </thead>
        </table>
</form> 


</div>
</div>

</div>


<div class="col-xl-6 ui-sortable">

<div class="panel panel-inverse" data-sortable-id="tree-view-2">
<div class="panel-heading ui-sortable-handle">
<h4 class="panel-title">List Data COA</h4>
<div class="panel-heading-btn">
<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
</div>
</div>
<div class="panel-body">
  <div id="jstree-default">

    <?php
    $sql = "select * from coa where parent_coa_id=0";
    $data = $this->db->query($sql)->result();
    ?>

    <?php foreach ($data as $a) { ?>
      <ul>
       <li data-jstree='{"opened":true}'>
         <a><?= $a->kd_coa ?> - <?= $a->coa_name ?> </a>
          <!-- looping lagi -->
          <?php $classnyak->looping_lagi($a->coa_id); ?>
       </li>
     </ul>

    <?php } ?>
  
</div>

</div>






</div>

</div>

</div>
</div>


<script>
 $(document).ready(function(){

  fill_parent_category();

  function fill_parent_category()
  {
   $.ajax({
    url:'<?= base_url() ?>coa/data_parent',
    success:function(data){
     $('#parent_coa_id').html(data);
    }
   });
   
  }

  $('#treeview_form').on('submit', function(event){
   event.preventDefault();
   $.ajax({
    url:'<?= base_url() ?>coa/add',
    method:"POST",
    data:$(this).serialize(),
    success:function(data){
      location.href='<?=site_url('coa') ?>'
    }
   })
  });
 });

  $("#jstree-default").jstree({
    "plugins": ["types"],
    "core": {
      "themes": { "responsive": false  }            
      },
    "types": {
      "default": { "icon": "fa fa-folder text-warning fa-lg" },
      "file": { "icon": "fa fa-file text-inverse fa-lg" }
    }
  });
</script>