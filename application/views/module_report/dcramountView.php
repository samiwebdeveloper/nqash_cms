<?php
error_reporting(0);
$this->load->view('inc/header');
?>

<script type="text/javascript">
$(document).ready(function(){ 
var table =$('#myTable').DataTable( {
"lengthMenu": [[ -1, 10, 25, 50], [ "All", 10, 25, 50]],     
fixedHeader: true,
"searching": true,
"paging":   true,
"ordering": true,
"bInfo": true,
dom: 'Blfrtip',
buttons: [
{
extend: 'pdfHtml5',
orientation: 'Portrait',
pageSize: 'A4',
footer: 'true',
title:"DCR Report",
text:"<i class='fs-14 pg-download'></i> PDF",
titleAttr: 'PDF',
message:"Delivery Express\n  Powered By SaimTech \n Date:<?php echo ''.$start_date." - ".$end_date; ?> \n DCR Report \n "
},
{
extend: 'excelHtml5',
text:"<i class='fs-14 pg-form'></i> Excel",
titleAttr: 'Excel',
sheetName:'DCR Report <?php echo ''.$start_date." - ".$end_date; ?>',
exportOptions: {
modifier: { page: 'current'}
}
},
{
extend: 'copyHtml5',
footer: 'true',
text:"<i class='fs-14 pg-note'></i> Copy",
titleAttr: 'Copy'
},
{
extend: 'print',
text:"<i class='fs-14 pg-ui'></i> Print",
titleAttr: 'Print',
footer: 'true',
title:"DCR Report",
message:"Delivery Express <br> System Developer M.Saim <br>Date:<?php echo ''.$start_date." - ".$end_date; ?> <br>  <br>DCR Report<br>"
}
]       
});




 });
</script>
 <!-- START PAGE CONTENT WRAPPER -->
      <div class="page-content-wrapper">
        <!-- START PAGE CONTENT -->
        <div class="content">
          <!-- START JUMBOTRON -->
          <div class="jumbotron" data-pages="parallax">
            <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
              <div class="inner">
                <!-- START BREADCRUMB -->
                 <ol class="breadcrumb">
                  <li class="breadcrumb-item">Dashborad</li>
                  <li class="breadcrumb-item">DCR Amount Data</li>
                  <li class="breadcrumb-item"><mark><?php echo ''.$start_date." - ".$end_date; ?></mark></li>
                </ol>
                <!-- END BREADCRUMB --> 
              </div>
            </div>
          </div>
          <!-- END JUMBOTRON -->
          <!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg">
            <!-- BEGIN PlACE PAGE CONTENT HERE -->
<div class="pgn-wrapper" data-position="top" style="top: 48px;" id="msg_div"></div>
<div class="row">
   
           

                  <div class="col-xl-12 col-lg-12" >

                <!-- START card -->
               
                    
               <div class=" container-fluid   container-fixed-lg bg-gray"  >
<div class="row">

<div class="col-md-12">
  <div class="card m-t-10">
  
<div class="col-md-4">
    <div class="card-header  separator">
    <div class="card-title">
      
    <h1>DSR Amount Data</h1>
   
    </div>

    </div>


<div class="card-body">

<div class="card card-default">
<div class="card-body bg-info">

<form role="form" method="post" action="<?php echo base_url(); ?>Archive/dcr_report_submit">
<div class="form-group">
<label class="text-white">Start Date</label>
<input type="date" class="form-control" id="start_date" value="<?php echo $start_date; ?>" name="start_date" required="">
</div>
<div class="form-group">
<label class="text-white">End Date</label>
<input type="date" class="form-control" id="end_date" value="<?php echo $end_date; ?>" name="end_date" required="">
</div>
<div class="form-group">
<input type="submit"  value="GO" class='btn btn-danger' >
</div>

</form>
</div>
</div>
</div>

</div>




<div class="card-body">     
<div class="table-responsive m-t-10">
 <table class="table table-bordered" id="myTable">
  <thead>
    <th>Sr</th>
    <th>Date</th>
    <th>Sheet Code</th>
    <th>Shipper</th>
    <th>Origin</th>
    <th>Destination</th>
    <th>CN</th>
    <th>Weight</th>
    <th>Status</th>
    <th>Delivery Date</th>
    <th>COD</th>
    <th>SC</th>
    <th>GST</th>
    <th>Net</th>
    <th>Invoice</th>
    <th>Invoice Date</th>
    <th>Payment TID</th>
    </thead>
  <tbody>
  <?php 
  $i=0;
  if(!empty($cn_data)){
  foreach($cn_data as $rows){ 
  $i=$i+1;  
  echo("<tr>");
  echo("<td>".$i."</td>");
  echo("<td>".date('d/m/Y',strtotime($rows->deliverdate))."</td>");
  echo("<td>".$rows->on_route_id."</td>");
  echo("<td>".$rows->shipper."</td>");
  echo("<td>".$rows->origin."</td>");
  echo("<td>".$rows->city."</td>");
  echo("<td>".$rows->shipments."</td>");
  echo("<td>".$rows->weight."</td>");
  echo("<td>".$rows->order_status."</td>");
  echo("<td>".date('d/m/Y',strtotime($rows->deliverdate))."</td>");
  if($rows->order_status!="RTS"){
  echo("<td>".number_format($rows->amount)."</td>");
  } else {echo("<td>0</td>");}
  echo("<td>".number_format($rows->sc)."</td>");
  echo("<td>".number_format($rows->gst)."</td>");
  if($rows->order_status!="RTS"){
  echo("<td>".number_format(($rows->sc + $rows->gst)-$rows->amount )."</td>");
  } else {
  echo("<td>".number_format(($rows->sc + $rows->gst)-0 )."</td>");}
  echo("<td>".$rows->invoice_code."</td>");
  echo("<td>".date('d/m/Y',strtotime($rows->invdate))."</td>");
  echo("<td>".$rows->payment_tid."</td>");
  echo("</tr>");  

  }} ?>
  </tbody> 
 </table> 
</div>


</div>


</div>

</div>
         <!-- END card -->
              </div>

            </div>
            <!-- END PLACE PAGE CONTENT HERE -->
          </div>
          <!-- END CONTAINER FLUID -->
        </div>
        <!-- END PAGE CONTENT -->




</div>

</div>

<?php
$this->load->view('inc/footer');
?>      