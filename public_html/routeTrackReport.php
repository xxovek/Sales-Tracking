<?php
include '../config/connection.php';
session_start();
if(isset($_SESSION['admin_id']))
{
	$admin_id = $_SESSION['admin_id'];
?>

<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">
		<!-- <title>Blank Page | Okler Themes | Porto-Admin</title> -->
		<title> Salesman Customer </title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<!-- Web Fonts  -->
		  <link rel="icon" type="image/png" sizes="16x16" href="../img/logo/sales.png">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="assets/stylesheets/datatables/CSS/buttons.bootstrap4.min.css" />
		<link rel="stylesheet" href="assets/stylesheets/datatables/CSS/dataTables.bootstrap4.min.css" />

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />

		 <!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />
		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />
		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">
		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>
		  <link href="TableStyle.css" rel="stylesheet" type="text/css">
			<script src="assets/vendor/jquery/jquery.js"></script>
	</head>
<style>
table.table td:nth-child(6){
     max-width: 100px;
     overflow: hidden;
     text-overflow: ellipsis;
     white-space: nowrap;
}
table.table td:nth-child(6):hover{
    overflow: visible;
    white-space: normal;
    height:auto;
}
</style>

	<body>
		<section class="body">
			<!-- start: header -->
			<?php include 'header.php';?>
			<!-- end: header -->
			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php include 'left_side_bar.php';?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Salesmans</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Salesman Registration</span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<!-- start: page -->
													 <section class="panel"  >
														<header class="panel-heading">
															<div class="panel-actions">
																<a href="#" class="fa fa-caret-down"></a>
																<a href="#" class="fa fa-times"></a>
															</div>
															<h2 class="panel-title">Route Details</h2>
														</header>
														<div class="panel-body table-responsive">
															<table class="table table-bordered table-striped mb-none" style="width:100%;" id="datatable-default1">
																<thead>
																	<tr>
                                    		<th class="text-center">Sr No</th>
																		<th class="text-center">Location </th>
                                    <!-- <th class="text-center">Time </th> -->

																		<th class="text-center">Action</th>
																	</tr>
																</thead>
																<tbody id="trackrouteinfodata"></tbody>
															</table>
														</div>
													</section>
                          <div id="map"></div>


					<!-- end: page -->
				</section>
				<?php include 'rightSidebar.php';?>
			</div>
			<!-- </div> -->
		</section>
		<!-- Vendor -->
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<!-- DataTables -->

		<script src="assets/stylesheets/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/stylesheets/datatables/dataTables.bootstrap4.min.js"></script>
		<script src="assets/stylesheets/datatables/dataTables.buttons.min.js"></script>
		<script src="assets/stylesheets/datatables/buttons.bootstrap4.min.js"></script>
		<script src="assets/stylesheets/datatables/jszip.min.js"></script>
		<script src="assets/stylesheets/datatables/pdfmake.min.js"></script>
		<script src="assets/stylesheets/datatables/vfs_fonts.js"></script>
		<script src="assets/stylesheets/datatables/buttons.html5.min.js"></script>
		<script src="assets/stylesheets/datatables/buttons.print.min.js"></script>
		<script src="assets/stylesheets/datatables/buttons.colVis.min.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		<script src="assets/vendor/select2/select2.js"></script>
		<script src="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>
		<script src="../js/validate.js" type="text/javascript"></script>
		<script src="../js/additional-methods.js" type="text/javascript" ></script>
		<script src="../js/rules.js" type="text/javascript" ></script>
	 <!-- <script src="../js/all_function.js" type="text/javascript" ></script>
			<script src="../js/country_state_city.js" type="text/javascript" ></script> -->
		<!-- <script src="../js/availability.js" type="text/javascript" ></script> -->
    <script src="../js/mdtimepicker.js"></script>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDh2sgKfwvLeTx36tIEj81_BVEC6hv0JkA" type="text/javascript"></script>

		<script>
     display_routes();




    function display_routes()
    {
        $.ajax({
            type: "POST",
           dataType:"json",
            url: "../src/routeTrackReport",
              data: {assignsalesId:<?php echo $_REQUEST['assignid']; ?>},
        }).done(function(data) {
         if(!(data)){
           $("#trackrouteinfodata").html('<tr ><td></td><td></td><td></td><td></td><td  style="color:black;">No data available in table</td></tr>');
         }
         else
         {
            var count = Object.keys(data).length;

            for (var i = 0; i < count; i++)
             {

                    // geocodeLatLng(data[i].latitude,data[i].longitude);

               $('#trackrouteinfodata').append('<tr><td class=" text-center">' +(i+1)+'<td class=" text-center">' + data[i].address +
               '</td><td class=" text-center">' + data[i].created_at + '</td></tr>');
            }
           }

         $("#datatable-default1").DataTable({

            bPaginate: $('#datatable-default1 tbody tr').length>10,
             order: [],
             columnDefs: [ { orderable: false, targets: [0,1,2] } ],
             dom: 'Bfrtip',
                 buttons: [
                   {
                      extend: 'collection',
                      text: 'Export',
                      buttons: ['copy', 'excel', 'pdf','print']
                   }
                ]
           });
        }).fail(function(jqXHR, textStatus) {
            alert('Request Failed');
      })
    }

		</script>
	</body>
</html>
<?php
}
else {
	header("Location:pages-signin.php");
}
?>
