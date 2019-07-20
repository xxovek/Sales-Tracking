<?php
session_start();
if(isset($_SESSION['admin_id'])){
	 ?>
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Dashboard-Admin Track The Sales Information</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
		<meta name="author" content="JSOFT.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
  <link rel="icon" type="image/png" sizes="16x16" href="../img/logo/sales.png">
		<!-- Specific Page Vendor CSS -->

		<!-- <link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="assets/vendor/morris/morris.css" /> -->

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
			<script src="assets/vendor/jquery/jquery.js"></script>
		<style>
	            [data-toggle="popover"]{
	            cursor: pointer;
	            display:inline-block; /* chrome-fix */
	        }
	     </style>
	</head>



	<body>
		<section class="body">
			<!-- start: header -->
      <?php include 'header.php';?>
      <!-- end: header -->
			<div class="inner-wrapper">
				<!-- start: sidebar -->
      <?php include 'left_side_bar.php';?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">

					<header class="page-header">
						<h2>Dashboard</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="#">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

						<!-- <div class="row">
						<div class="col-md-6">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Shops List  <span class="badge badge-pill badge-info" id="countshoplist"> </span></h2>
									<p class="panel-subtitle"> No Of Shops Available On Your Software.</p>
								</header>
								<div class="panel-body">

									<div id="shopList" style=" height: 500px; position: relative; overflow: auto;">
									</div>


								</div>
							</section>
						</div>
						<div class="col-md-6">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>
									<h2 class="panel-title">Sales Mans List  <span class="badge badge-pill badge-info" id="countsalesman"> </span></h2>
									<p class="panel-subtitle"> No Of Sales Available On Your Software. </p>
								</header>
								<div class="panel-body">
									<div id="salesManList" style=" height: 500px; position: relative; overflow: auto;">
									</div>


								</div>
							</section>
						</div>
					</div> -->

					<div class="row" id="livetrackmapDiv" style="display:none;">
			 	 <div class="col-md-12"  >
			 		 <section class="panel" >
			 			 <header class="panel-heading">
			 				 <div class="panel-actions">
			 					 <a href="#" class="fa fa-caret-down"></a>
			 					 <a href="#" class="fa fa-times"></a>
			 				 </div>

			 				 <h2 class="panel-title">Live Tracking <span class="badge badge-pill badge-info" id="countlivesalesman"> </span></h2>
			 				 <p class="panel-subtitle">Continously Update Every SalesMans Location</p>
			 			 </header>
			 			 <div class="panel-body">
			 				 <!-- <input type="hidden" id="arraymappoint"/> -->
			 				 <div id="livetrackmap" style=" height: 500px; position: relative; overflow: auto;">
			 				 </div>


			 			 </div>
			 		 </section>
			 	 </div>

			  </div>


				<div class="row">
				<div class="col-md-6">

				<section class="panel" id="ShopsListTableTblDiv" >
		 		 <header class="panel-heading">
		 			 <div class="panel-actions">
		 				 <a href="#" class="fa fa-caret-down"></a>
		 				 <a href="#" class="fa fa-times"></a>
		 			 </div>
		 			 <h2 class="panel-title">Shops List</h2>
		 		 </header>
		 		 <div class="panel-body">
		 			 <table class="table table-bordered table-striped mb-none" id="ShopsListTable">
		 				 <thead>
		 					 <tr>
		 						<th class="text-center" >ShopID</th>
		 						<th class="text-center">Contact Person</th>
		 					<th class="text-center">Address</th>
		 					</tr>
		 				 </thead>
		 				 <tbody id="ShopsListTableData"></tbody>
		 			 </table>
		 		 </div>
		 	 </section>

		 </div>

		 <div class="col-md-6">
			 <section class="panel" id="SalesmanListTableTblDiv" >
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="fa fa-caret-down"></a>
						<a href="#" class="fa fa-times"></a>
					</div>
					<h2 class="panel-title">Sales Mans List</h2>
				</header>
				<div class="panel-body">
					<table class="table table-bordered table-striped mb-none" id="SalesmanListTable">
						<thead>
							<tr>
							 <th class="text-center" >EmpID</th>
							 <th class="text-center">Salesman Name</th>
							 <th class="text-center">Address</th>
						 </tr>
						</thead>
						<tbody id="SalesmanListTableData"></tbody>
					</table>
				</div>
			</section>

		 </div>
	 </div>






					<!-- end: page -->
				</section>
			</div>

		<?php include "rightSidebar.php" ?>
		</section>

		<!-- Vendor -->
	
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		<script src="assets/vendor/pnotify/pnotify.custom.js"></script>
		<!-- Specific Page Vendor -->
		<!-- <script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="assets/vendor/jquery-appear/jquery.appear.js"></script>
		<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
		<script src="assets/vendor/flot/jquery.flot.js"></script>
		<script src="assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
		<script src="assets/vendor/flot/jquery.flot.pie.js"></script>
		<script src="assets/vendor/flot/jquery.flot.categories.js"></script>
		<script src="assets/vendor/flot/jquery.flot.resize.js"></script>
		<script src="assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
		<script src="assets/vendor/raphael/raphael.js"></script>
		<script src="assets/vendor/morris/morris.js"></script>
		<script src="assets/vendor/gauge/gauge.js"></script>
		<script src="assets/vendor/snap-svg/snap.svg.js"></script>
		<script src="assets/vendor/liquid-meter/liquid.meter.js"></script>
		<script src="assets/vendor/jqvmap/jquery.vmap.js"></script>
		<script src="assets/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
		<script src="assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script> -->
		<script src="assets/vendor/select2/select2.js"></script>
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
	  <script src="assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
	  <script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>

		<script src="assets/javascripts/theme.js"></script>
		<script src="assets/javascripts/theme.custom.js"></script>
		<script src="assets/javascripts/theme.init.js"></script>

			<script src="https://cdnjs.cloudflare.com/ajax/libs/nosleep/0.6.0/NoSleep.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/nosleep/0.6.0/NoSleep.min.js"></script>
		<!-- <script src="assets/javascripts/dashboard/examples.dashboard.js"></script> -->

		<!-- <script src="assets/javascripts/ui-elements/examples.lightbox.js"></script> -->

		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDh2sgKfwvLeTx36tIEj81_BVEC6hv0JkA"
		type="text/javascript">
		</script>

				<script src="../js/DashboardFunctions.js"></script>
	</body>
</html>
<?php
}else {
	header('Location:../index.php');
}
?>
