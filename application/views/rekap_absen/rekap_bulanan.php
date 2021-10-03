<style type="text/css">
.calendar_header{
    position: relative;
}

.prev-month{ left: 1px; }
.next-month{ right: 1px; }
.month-year h3{
    font-size: 40px;
    margin-top: 10px;
    border: 1px solid #ddd;
    margin-bottom: 0;
    padding: 5px 0;
    background: #eee;
}
.currentMonth{background: rgba(0,0,0,0.04);}
.container {
    margin-top: 10px;
}

.calendar-single.container table tr thead th {
    background: #faffe0;
    border-bottom: 4px double #ddd !important;
    font-size: 20px;
    height: 30px;
    text-align: center;
    font-weight: 700;
}

.calendar-single.container table tr tbody td {
    font-size: 20px;
    background: rgba(0,0,0,0.02);
    height: 100px;
}
.calendar-single.container table tr tbody td.empty{background: #fff;}

.today {
    font-weight: bold;
    color: #fff;
    background-color: gray;
}

.calendar-single.container table tr thead th:nth-of-type(7), .calendar-single.container table tr tbody td:nth-of-type(7) {
    font-weight: bold;
}

.calendar-single.container table tr thead th:nth-of-type(1), .calendar-single.container table tr tbody td:nth-of-type(1) {
    font-weight: bold;
}
</style>


<div id="content" class="app-content">
            <div class="panel panel-inverse">
              <div class="panel-heading">
                <h4 class="panel-title">Rekap Absensi Bulanan</h4>
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
                                    <div class="row">
                                        <table id="tabel-rekap-absensi" class="table table-bordered table-hover table-td-valign-middle">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">Nama Karyawan</th>
                                                    <th colspan="5" style="text-align: center;"><?php echo date('F', mktime(0, 0, 0, $bulan, 10));  ?></th>
                                                </tr>
                                                <tr>
                                                    <th>M</th>
                                                    <th>S</th>
                                                    <th>I</th>
                                                    <th>A</th>
                                                    <th>C</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php 
                                                    foreach ($datakaryawan as $key => $v) {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $v->nama_karyawan ?>
                                                            </td>
                                                            <td><a href="#modal-<?php echo $v->karyawan_id ?>-masuk" data-bs-toggle="modal"><?php echo $classnyak->countMasuk($v->karyawan_id, $bulan, $tahun, $lokasi_id) ?></a></td>
                                                            <td><a href="#modal-<?php echo $v->karyawan_id ?>-sakit" data-bs-toggle="modal"><?php echo $classnyak->countSakit($v->karyawan_id, $bulan, $tahun, $lokasi_id) ?></a></td>
                                                            <td><a href="#modal-<?php echo $v->karyawan_id ?>-izin" data-bs-toggle="modal"><?php echo $classnyak->countIzin($v->karyawan_id, $bulan, $tahun, $lokasi_id) ?></a></td>
                                                            <td><a href="#modal-<?php echo $v->karyawan_id ?>-alpa" data-bs-toggle="modal"><?php echo $classnyak->countAlpa($v->karyawan_id, $bulan, $tahun, $lokasi_id) ?></a></td>
                                                            <td><a href="#modal-<?php echo $v->karyawan_id ?>-cuti" data-bs-toggle="modal"><?php echo $classnyak->countCuti($v->karyawan_id, $bulan, $tahun, $lokasi_id) ?></a></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
	        					</div>
        					</div>
        				</div>
        			</div>
        		</div>
            </div>
        </div>



    <?php 
    
    foreach ($datakaryawan as $key => $value) {
        ?>
        <div class="modal fade" id="modal-<?php echo $value->karyawan_id ?>-masuk">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Data Masuk</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
              </div>
              <div class="modal-body">
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?php echo $value->nama_karyawan ?></td>
                    </tr>
                </table>
                <div class="box-body">
                        <div class="calendar-single container">
                            <div class="calendar_header">
                                <div class="month-year text-center"></div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S</th>
                                        <th>M</th>
                                        <th>T</th>
                                        <th>W</th>
                                        <th>T</th>
                                        <th>F</th>
                                        <th>S</th>
                                    </tr>
                                </thead>
                                <tbody class="calendar_tbody"></tbody>
                            </table>
                        </div>
                </div>
              </div>
              <div class="modal-footer">
                <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Close</a>
                <a href="javascript:;" class="btn btn-success">Action</a>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="modal-<?php echo $value->karyawan_id ?>-sakit">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Data Sakit</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
              </div>
              <div class="modal-body">
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?php echo $value->nama_karyawan ?></td>
                    </tr>
                </table>
                <div class="box-body">
                        <div class="calendar-single container">
                            <div class="calendar_header">
                                <div class="month-year text-center"></div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S</th>
                                        <th>M</th>
                                        <th>T</th>
                                        <th>W</th>
                                        <th>T</th>
                                        <th>F</th>
                                        <th>S</th>
                                    </tr>
                                </thead>
                                <tbody class="calendar_tbody"></tbody>
                            </table>
                        </div>
                </div>
              </div>
              <div class="modal-footer">
                <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Close</a>
                <a href="javascript:;" class="btn btn-success">Action</a>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="modal-<?php echo $value->karyawan_id ?>-izin">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Data Izin</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
              </div>
              <div class="modal-body">
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?php echo $value->nama_karyawan ?></td>
                    </tr>
                </table>
                <div class="box-body">
                        <div class="calendar-single container">
                            <div class="calendar_header">
                                <div class="month-year text-center"></div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S</th>
                                        <th>M</th>
                                        <th>T</th>
                                        <th>W</th>
                                        <th>T</th>
                                        <th>F</th>
                                        <th>S</th>
                                    </tr>
                                </thead>
                                <tbody class="calendar_tbody"></tbody>
                            </table>
                        </div>
                </div>
              </div>
              <div class="modal-footer">
                <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Close</a>
                <a href="javascript:;" class="btn btn-success">Action</a>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="modal-<?php echo $value->karyawan_id ?>-alpa">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Data Alpa</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
              </div>
              <div class="modal-body">
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?php echo $value->nama_karyawan ?></td>
                    </tr>
                </table>
                <div class="box-body">
                        <div class="calendar-single container">
                            <div class="calendar_header">
                                <div class="month-year text-center"></div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S</th>
                                        <th>M</th>
                                        <th>T</th>
                                        <th>W</th>
                                        <th>T</th>
                                        <th>F</th>
                                        <th>S</th>
                                    </tr>
                                </thead>
                                <tbody class="calendar_tbody"></tbody>
                            </table>
                        </div>
                </div>
              </div>
              <div class="modal-footer">
                <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Close</a>
                <a href="javascript:;" class="btn btn-success">Action</a>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="modal-<?php echo $value->karyawan_id ?>-cuti">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Data Cuti</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
              </div>
              <div class="modal-body">
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?php echo $value->nama_karyawan ?></td>
                    </tr>
                </table>
                <div class="box-body">
                        <div class="calendar-single container">
                            <div class="calendar_header">
                                <div class="month-year text-center"></div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S</th>
                                        <th>M</th>
                                        <th>T</th>
                                        <th>W</th>
                                        <th>T</th>
                                        <th>F</th>
                                        <th>S</th>
                                    </tr>
                                </thead>
                                <tbody class="calendar_tbody"></tbody>
                            </table>
                        </div>
                </div>
              </div>
              <div class="modal-footer">
                <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Close</a>
                <a href="javascript:;" class="btn btn-success">Action</a>
              </div>
            </div>
          </div>
        </div>


        <?php
    }
    ?>
        <?php
        if (is_allowed_button($this->uri->segment(1),'read')<1) { ?>
            <script>
                    $('.read_data').css('display','none')
            </script>
        <?php } ?>

        <?php
        if (is_allowed_button($this->uri->segment(1),'create')<1) { ?>
            <script>
                    $('.tambah_data').css('display','none')
            </script>
        <?php } ?>

        <?php
        if (is_allowed_button($this->uri->segment(1),'export')<1) { ?>
            <script>
                    $('.export_data').css('display','none')
            </script>
        <?php } ?>

        <?php
        if (is_allowed_button($this->uri->segment(1),'update')<1) { ?>
            <script>
                    $('.update_data').css('display','none')
            </script>
        <?php } ?>

        <?php
        if (is_allowed_button($this->uri->segment(1),'delete')<1) { ?>
            <script>
                    $('.delete_data').css('display','none')
            </script>
        <?php } ?>


<!-- TESTING AREA -->

<script type="text/javascript">
        function myCalendar(curr_month = "curr") {
            var tbody_html = "";
            var td_class = "";
            var weekday_count = 1;
            var tr_count = 1;
            var td_count = 1;
            var offset_td = 0;
            var counter = 1;
            var month = 2; //atur
            // Getting The Months and Days of the Week
            var daysOfMonth = [31, febDays, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
            var months_full = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            var start_of_curr = master_data.day_start[curr_month];
            if(curr_month!=="curr"){
                if(master_data.months[curr_month]===11 && curr_month==="prev"){
                    year--;
                }
                if(master_data.months[curr_month]===0 && curr_month==="next"){
                    year++;
                }
            }
        
          // Displays the current month in Strings and the actual year 
          $('.month-year').html("<h3>"+months_full[month]+" "+year+"</h3>");

          //To build the calendar body
          while (counter <= daysOfMonth[month]) {
            if(weekday_count === 8){
                tbody_html += "</tr>";
                weekday_count = 1;
            }
            if(weekday_count === 1){
                tbody_html += "<tr>";
                tr_count++;
            }
            

        // prepend blank tds
            while(offset_td < start_of_curr){
                tbody_html += "<td class='empty'></td>";
                offset_td++;
                if(offset_td == 8){
                    tbody_html += "<tr>";
                    tbody_html += "</tr>";
                }
                td_count++;
            }

            if(month === d.getUTCMonth() && year === d.getUTCFullYear()){
                if(counter === date){
                    td_class = "today";
                } else {
                    td_class = "currentMonth";
                }
            }
            tbody_html += "<td class='"+td_class+"'>"+counter+"</td>";
            counter++;
            weekday_count++;
            td_count++;
          }
      // append blank tds
          while((td_count-1) < (tr_count-1)*7){
            tbody_html += "<td class='empty'></td>";
            td_count++;
          }
          $('.calendar_tbody').html(tbody_html);
      // setting master_data.months
          master_data.months.curr = month;
          master_data.months.prev = month === 0 ? 11 : month - 1;
          master_data.months.next = month === 11 ? 0 : month + 1;
          debug && console.log("prev "+master_data.months.prev+" -> "+start_of_curr+" - "+daysOfMonth[master_data.months.prev]+"%7 = "+(start_of_curr - daysOfMonth[master_data.months.prev]%7));
      // setting master_data.day_start
          master_data.day_start.curr = start_of_curr;
          var temp_prev_som = start_of_curr - daysOfMonth[master_data.months.prev]%7;
          if(temp_prev_som < 0){
            temp_prev_som = 7 + temp_prev_som;
          }
          master_data.day_start.prev = temp_prev_som;
          master_data.day_start.next = weekday_count === 8 ? 0 : weekday_count-1;
          //return prev_next;
          if(debug){
            console.log("    P   C   N   ");
            console.log(" m ", master_data.months.prev, " ", master_data.months.curr, " ", master_data.months.next);
            console.log(" d ", master_data.day_start.prev, " ", master_data.day_start.curr, " ", master_data.day_start.next);
          }
        }
        var d = new Date();
        var year = 2021;
        var day = d.getUTCDay();
        var date = d.getUTCDate();
        var month = d.getUTCMonth();
        // our global object
        var master_data = {
            day_start: {
                prev: 0, curr: day - (date%7 - 1) + 7, next: 0
            },
            months: {
                prev: month-1, curr: month, next: month+1
            }
        };
        //Getting February Days Including The Leap Year
        if ((year % 100!=0) && (year% 4==0) || (year%400 == 0 )) {
            var febDays = 29;
        } else {
            var febDays = 28;
        }

        var debug = true;
        $(document).ready(function(){
            console.clear();
            var d = new Date();
            myCalendar();
            var main_obj = master_data;
          //Navigation Buttons
          $('.prev-month').click(function(){
            myCalendar("prev"); 
          });

          $('.next-month').click(function(){
            myCalendar("next");
          });
        });
    

</script>