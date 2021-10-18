<!DOCTYPE html>
 <html><head>
    <title>Laporan Purchase Order</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
            .word-table {
                border:1px solid black !important;
                width: 100%;
            }

            .table {
                border:1px solid black !important; 
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 1px 2px;
            }

            .word-table-no-border {
                border:1px solid black !important; 
                width: 100%;
            }
            .word-table-no-border tr td, .word-table-no-border tr td{
                padding: 2px 3px;

            }
            
            #footer {
                position: fixed; 
                bottom: -60px; 
                left: 0px; 
                right: 0px;
                height: 50px; 
                text-align: right;
                line-height: 35px;
            }
        </style>
</head><body >
    <table border="0" cellpadding="0" align="center">
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
    <hr>
    <h4 style="text-align: center;">PURCHASE ORDER</h4>
     <table class="word-table-no-border">
        <tr style="border-right: 1px"> 
          <td style="width: 50%;border-right: 1px solid black !important; ">
            <table style="line-height: 15px; font-size: 12px">
                            <tr>
                                <td width="80px">To</td>
                                <td>: </td>
                                <td><?php echo $nama_supplier; ?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>: </td>
                                <td><?php echo $alamat; ?></td>
                            </tr>
                            <tr>
                                <td>Attn.</td>
                                <td>: </td>
                                <td><?php echo $attn; ?></td>
                            </tr>
                        </table>
                    </td>
            <td style="width: 50%;">
                <table style="line-height: 15px; font-size: 12px">
                            <tr>
                                <td style="vertical-align: top;">Date</td>
                                <td style="vertical-align: top;">: </td>
                                <td style="vertical-align: top;"><?php echo $tanggal; ?></td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top;">No PO</td>
                                <td style="vertical-align: top;">: </td>
                                <td style="vertical-align: top;"><?php echo $no_purchase; ?></td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top;">Addres</td>
                                <td style="vertical-align: top;">: </td>
                                <td style="text-align: justify;style="vertical-align: top;"">3rd Floor, Bakri Tower, Komplek Rasuna Epicentrum, Jalan Haji R Rasuna Said, Kel Kuningan Timur, Jakarta, Indonesia</td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top;">Phone</td>
                                <td style="vertical-align: top;">: </td>
                                <td style="vertical-align: top;">089644880850</td>
                            </tr>
                        </table>
            </td>
        </tr>
    </table>
    
    <table class="table" style="margin-top: 10px;line-height: 20px; height: 300px; padding: 5px" >
       <tr> 
            <th style="text-align: left;">No</th>
            <th style="text-align: left;">Barang / Jasa</th>
            <th style="text-align: left;">Satuan</th>
            <th style="text-align: left;">Harga</th>
            <th style="text-align: left;">QTY</th>
            <th style="text-align: left;">Sub Total</th>
        </tr>
        <?php
                $no=0;
                foreach ($detail as  $row):
                $no++;  
                ?>
                  <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row->nama_item ?></td>
                            <td><?php echo $row->nama_unit ?></td>
                            <td><?php echo rupiah($row->price) ?></td>
                            <td><?php echo $row->qty ?></td>
                            <td><?php echo rupiah($row->total) ?></td>
                  </tr>
                <?php endforeach; ?>

    </table>
    <table class="word-table-no-border" style="line-height: 25px;">
       <tr> 
            <th style="text-align: left;">Total : <?php echo rupiah($grandtotal) ?> </th>
        </tr> 
        <tr > 
            <th style="text-align: left;">Terbilang : <?php echo ucfirst(terbilang($grandtotal))  ?></th>
        </tr>     
    </table>

    <table class="" style="margin-top: 30px; width: 200px;text-align: center; margin-left: 375px">
        <tr> 
          <td width="200px">Jakarta, <?= date('d F Y') ?></td> 
        </tr>
        <tr>
          <td style="height: 70px;"><img style="margin-left: 50px" src="assets/img/ttd.png" width="110px"></td>
        </tr>
        <tr>
          <td><?php echo $nama_user; ?></td>
        </tr>
                
    </table>




<table id="footer" width="100%">
  <tr>
    <td width="100%"><b><?= $sett_apps->company ?> </b> || <?= $sett_apps->alamat ?></td>
  </tr>
</table>