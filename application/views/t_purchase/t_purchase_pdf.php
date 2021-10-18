<!DOCTYPE html>
 <html><head>
    <title>Purchase Order</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
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
    <table >
        
    </table>

    <table class="word-table" style="line-height: 22px; padding: 3px">
    </table>

    <table class="" style="margin-top: 30px; width: 200px;text-align: center; margin-left: 375px">
        <tr> 
          <td width="200px">Jakarta, <?= date('d F Y') ?></td> 
        </tr>
        <tr>
          <td style="height: 80px;"></td>
        </tr>
        <tr>
          <td>Manager HRGA</td>
        </tr>
                
</table>



<table id="footer" width="100%">
  <tr>
    <td width="100%"><b><?= $sett_apps->company ?> </b> || <?= $sett_apps->alamat ?></td>
  </tr>
</table>