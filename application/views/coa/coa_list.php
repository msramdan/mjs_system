<div id="content" class="app-content">
            <h1 class="page-header">KELOLA DATA COA</h1>  
           <div class="row">

<div class="col-xl-6 ui-sortable">

<div class="panel panel-inverse" data-sortable-id="tree-view-1">
<div class="panel-heading ui-sortable-handle">
<h4 class="panel-title">Default Tree</h4>
<div class="panel-heading-btn">
<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
</div>
</div>
<div class="panel-body">
  <form method="post" id="treeview_form">
      <div class="form-group">
       <input name="parent_category" id="parent_category" class="form-control">
       
       </input>
      </div>
      <div class="form-group">
       <input type="text" name="category_name" id="category_name" class="form-control">
      </div>
      <div class="form-group">
       <input type="submit" name="action" id="action" value="Add" class="btn btn-info" />
      </div>
     </form>


</div>

</div>

</div>


<div class="col-xl-6 ui-sortable">

<div class="panel panel-inverse" data-sortable-id="tree-view-2">
<div class="panel-heading ui-sortable-handle">
<h4 class="panel-title">Checkable Tree</h4>
<div class="panel-heading-btn">
<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
</div>
</div>
<div class="panel-body">

</div>


</div>

</div>

</div>


<script>
 $(document).ready(function(){

  $('#treeview_form').on('submit', function(event){
   event.preventDefault();
   $.ajax({
    url:"<?= base_url() ?>coa/add",
    method:"POST",
    data:$(this).serialize(),
    success:function(data){
     $('#treeview_form')[0].reset();
     alert(data);
    }
   })
  });
 });
</script>
