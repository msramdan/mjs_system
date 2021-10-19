<div id="content" class="app-content">
            <h1 class="page-header">KELOLA DATA RECEIPTS</h1>  
            <div class="panel panel-inverse">
              <div class="panel-heading">
                <h4 class="panel-title"></h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">        
                                <div class="box-body">
                                    <div class='row'>
                                        <div class='col-md-9'>
    
        </div>    
        <div class="box-body">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-4">
                    <a href="#" class="widget-card rounded mb-20px" data-id="widget">
                    <div class="widget-card-cover rounded" style="background-image: url(<?= base_url() ?>/assets/assets/img/gallery/gallery-portrait-11-thumb.jpg)"></div>
                    <div class="widget-card-content">
                    </div>
                    <div class="widget-card-content bottom">
                    <i class="fab fa-pushed fa-5x text-indigo"></i>
                    <h4 class="text-white mt-10px"><b>No. PO2110130002<br>Final Price : Rp 710.000</b></h4>
                    <h5 class="fs-12px text-white-transparent-7 mb-0"><b>Tanggal : 2021-10-13</b></h5>
                    </div>
                    </a>
                </div>              
            </div>

        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>

                    <?php
        if (is_allowed_button($this->uri->segment(1),'read')<1) { ?>
            <script type="text/javascript">
                    $('.read_data').css('display','none')

            </script>
        <?php } ?>

        <?php
        if (is_allowed_button($this->uri->segment(1),'create')<1) { ?>
            <script type="text/javascript">
                    $('.tambah_data').css('display','none')
            </script>
        <?php } ?>

        <?php
        if (is_allowed_button($this->uri->segment(1),'export')<1) { ?>
            <script type="text/javascript">
                    $('.export_data').css('display','none')
            </script>
        <?php } ?>

        <?php
        if (is_allowed_button($this->uri->segment(1),'update')<1) { ?>
            <script type="text/javascript">
                    $('.update_data').css('display','none')
            </script>
        <?php } ?>

        <?php
        if (is_allowed_button($this->uri->segment(1),'delete')<1) { ?>
            <script type="text/javascript">
                    $('.delete_data').css('display','none')
            </script>
        <?php } ?>