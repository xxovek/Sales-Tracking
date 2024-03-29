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
		<title>Shop Keepers Bussiness Clients </title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
		<!-- Vendor CSS -->
			  <link rel="icon" type="image/png" sizes="16x16" href="../img/logo/sales.png">
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<!-- Theme CSS -->
		<!-- <link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" /> -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />
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
}</style>
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
						<h2>ShopKeepers</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>ShopKeepers Registration</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<!-- start: page -->
					<header class="panel-heading">
				<h2 class="text-center">ShopKeeper Registration</h2>
					</header>
					<div class="wizard-tabs">
						<ul class="wizard-steps">
							<li class="active">
								<a href="#" data-toggle="tab" class="text-center">
									<span class="badge " id="Shopkeeper" onclick="showshopkeepermaninfotable();">SHOW SHOPKEEPER</span>
								</a>
							</li>
							<li >
								<a href="#" data-toggle="tab" class="text-center">
									<span class="badge " onclick="showshopkeeperform();">ADD SHOPKEEPER</span>
								</a>
							</li>
						</ul>
					</div>
					<div class="panel-body" id="shopkeeperform" style="display:none">
						<span id="msg1"></span>
						<form name="submitshopkeeperform" id="submitshopkeeperformdata" method="post">
						<div class="row form-group">
						</div>
						<div class="row form-group">
							<div class="col-lg-3">
								<div class="form-group">
									<!--Contact Person Name:&nbsp;<font color="red">*</font>-->
										<label class="control-label">Contact Person Name:&nbsp;<span class="required"><font color="red">*</font></span></label>
									<input type="text" name="contactperson" id="contactperson"  placeholder="Enter FullName" required class="form-control" autocomplete="off" />
									<input type="hidden" name="shopkeeper_id" id="shopkeeper_id"/>
							</div>
						</div>
						<div class="mb-md hidden-lg hidden-xl"></div>

							<div class="col-lg-3">
								<div class="form-group">
									<!--Person Email-Id:&nbsp;<font color="red">*</font>-->
	                                <label class="control-label">Person Email-Id:&nbsp;<span class="required"><font color="red">*</font></span></label>
									<input type="email" name="emailid" id="emailid" maxlength="255" placeholder="Enter E-Mail" class="form-control" required onblur="checkshopemailavailability();" autocomplete="off" />
									<span id="checkemail"> </span>
							</div>
						</div>
						<div class="mb-md hidden-lg hidden-xl"></div>

							<div class="col-lg-3">
								<div class="form-group">
										<!--Person Mobile Number:&nbsp;<font color="red">*</font>-->
										<label class="control-label"></label>Person Mobile Number:&nbsp;<span class="required"><font color="red">*</font></span></label>
									<input type="text" name="mobileno" id="mobileno" placeholder="Enter Mobile" required class="form-control" onblur="checkshopmobilenoavailability();" autocomplete="off" />
									<span id="checkmobile"></span>
							</div>
						</div>
						<div class="mb-md hidden-lg hidden-xl"></div>
						<div class="col-lg-3">
							<div class="form-group">
								<!--Alternate Mobile Number:&nbsp;<font color="red"></font>-->
									<label class="control-label">Alternate Mobile Number:&nbsp;</label>
								<input type="text" name="mobileno1" id="mobileno1" placeholder="Alternate Mobile Number"  class="form-control" autocomplete="off" />

						</div>
					</div>
					</div>
						<div class="row form-group">
						</div>
						<div class="row form-group">

						<div class="mb-md hidden-lg hidden-xl"></div>

							<div class="col-lg-3">
								<div class="form-group">
									<!--Country:&nbsp;<font color="red">*</font>-->
	<label class="control-label">Country:&nbsp;<span class="required"><font color="red">*</font></span></label>
									<select data-plugin-selectTwo  name="country" id="country" placeholder="Select Country" required  onChange="getState(this.value);" class="form-control populate" >
										<option value="">Select Country</option>

									</select>
								</div>
							</div>
							<div class="mb-md hidden-lg hidden-xl"></div>

							<div class="col-lg-3">
								<div class="form-group">
									<!--State:&nbsp;<font color="red">*</font>-->
										<label class="control-label">State:&nbsp;<span class="required"><font color="red">*</font></span></label>

									<select data-plugin-selectTwo  name="state" id="state" placeholder="Select State" required onChange="getCity(this.value);" class="form-control populate" >
										<option value="">	Select State</option>

									</select>
								</div>
							</div>
							<div class="mb-md hidden-lg hidden-xl"></div>
							<div class="col-lg-3">
						<div class="form-group">
							<!--City:&nbsp;<font color="red">*</font>-->
								<label class="control-label">City:&nbsp;<span class="required"><font color="red">*</font></span></label>

								<select data-plugin-selectTwo  name="city" id="city" placeholder="Select City" required class="form-control populate" >
									<option value="">Select City</option>
								</select>
						</div>
					</div>
								<div class="mb-md hidden-lg hidden-xl"></div>
								<div class="col-lg-3">
									<div class="form-group">
									 <!--Shop Address Zip Code<small>(Regional)</small>:&nbsp;<font color="red">*</font>-->
									 	<label class="control-label">Shop Address Zip Code<small>(Regional)</small>:&nbsp;<span class="required"><font color="red">*</font></span></label>
									<input type="text" name="shoppincode" id="shoppincode"  placeholder=" Enter Zip Code" required class="form-control" autocomplete="off"  />
								</div>
								</div>
								
						</div>
						<div class="row form-group">
						</div>

				<div class="row form-group">

			<div class="mb-md hidden-lg hidden-xl"></div>

			<div class="col-lg-3">
				<div class="form-group">
					Permanent Address:&nbsp;<font color="red">*</font>
				<textarea  name="address1" id="address"  placeholder=" Enter Permanent Address" required class="form-control" autocomplete="off" ></textarea>
			</div>
			</div>
			<div class="mb-md hidden-lg hidden-xl"></div>
			<div class="col-lg-3">
			<div class="form-group">
				<div class="checkbox-custom chekbox-primary">
				    <label for="checkaddress" class="control-label">Same as Permanent Address&nbsp;</label>
			<input type="checkbox"  name="checkaddress" id="checkaddress" onclick="setAddress1(this.form);"/>
			<!--<label for="checkaddress"><h5 style="font:bold">Same as permanent address</h5></label>-->
			</div>
				<textarea  name="address2" id="address2"  placeholder="Residential Address"  class="form-control" autocomplete="off" ></textarea>
			</div>
		</div>
			<div class="mb-md hidden-lg hidden-xl"></div>
					<!--	<div class="col-lg-3">-->
					<!--		<div class="form-group">-->
					<!--			Shop Route:&nbsp;<font color="red">*</font>-->
								<!--<label class="control-label">Shop Route:&nbsp;<span class="required"><font color="red">*</font></span></label>-->
					<!--			<input type="hidden" name="w_id" id="w_id" class="form-control" />-->
					<!--			<select data-plugin-selectTwo  name="source" id="source" onchange="load_shops(this);" class="form-control populate" >-->
					<!--				<option value="">Select	Route</option>-->
					<!--			</select>-->
					<!--	</div>-->
					<!--</div>-->
</div>
<div class="row form-group">
</div>

		<footer class="panel-footer">
			<div class="row">
				<div class="col-lg-5"></div>
				<div class="col-lg-4">
					<input type="submit" class="btn btn-primary" value="Add" name="shopid" id="shopid"/>
					<input type="submit" class="btn btn-primary" value="Update" name="shopmanid" id="shopmanid" style="display:none;"/>
					<button type="reset" id="resetbtn" class="btn btn-default" onclick="clear_info();">Reset</button>
				</div>
				<div class="col-lg-3"></div>
				<div class="mb-md hidden-lg hidden-xl"></div>

			</div>
		</footer>
			</form>

			<br>

		</div>
				<!-- <div class="panel-body" id="shoptable" style="display:none;">
					<div class="row form-group">
					</div>
					<div class="table-responsive">


					<table class="table table-bordered table-striped mb-none" id="datatable-default">
						<thead>
							<tr>
									<th class="text-center">Sr. No.</th>
								<th class="text-center" style="width:20%">Contact Person</th>
								<th class="text-center" style="width:10%" >Email</th>
								<th class="text-center" style="width:10%">Mobile</th>

								<th class="text-center" style="width:10%">city</th>
								<th class="text-center" style="width:40%">Address</th>
								<th class="text-center" style="width:10%">Action</th>
							</tr>
						</thead>
						<tbody id="shopmaninfodata" >
						</tbody>
					</table>
						</div>
				</div> -->


				<section class="panel" id="shoptable" style="display:none" >
			 	<header class="panel-heading">
			 		<div class="panel-actions">
			 			<a href="#" class="fa fa-caret-down"></a>
			 			<a href="#" class="fa fa-times"></a>
			 		</div>
			 		<h2 class="panel-title">Shops Details</h2>
			 	</header>
			 	<div class="panel-body table-responsive">
			 		<table class="table table-bordered table-striped mb-none" style="width:100%;" id="datatable-default">
			 			<thead>
			 				<tr>
								<th class="text-center" style="width:6%">Sr. No.</th>
							<th class="text-center" >Contact Person</th>
							<th class="text-center"  >Email</th>
							<th class="text-center">Mobile</th>
							<th class="text-center" >city</th>
							<th class="text-center">Address</th>
							<th class="text-center">Action</th>
			 				</tr>
			 			</thead>
			 			<tbody id="shopmaninfodata"></tbody>
			 		</table>
			 	</div>
			 </section>

					<!-- end: page -->
				</section>
			</div>

			<!-- </div> -->
			<?php include 'rightSidebar.php';?>

		</section>
		<!-- Vendor -->

		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<!-- <script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script> -->

		<!-- DataTables -->
		<link rel="stylesheet" href="assets/stylesheets/datatables/CSS/buttons.bootstrap4.min.css" />
		<link rel="stylesheet" href="assets/stylesheets/datatables/CSS/dataTables.bootstrap4.min.css" />
		<!-- <link rel="stylesheet" href="assets/stylesheets/datatables/CSS/bootstrap.css" /> -->

		<!-- <link rel="stylesheet" href="assets/stylesheets/datatables/css/jquery.dataTables.min.css"> -->
		<!-- <link rel="stylesheet" href="assets/stylesheets/datatables/css/buttons.dataTables.min.css"> -->
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
		<!-- <script src="assets/javascripts/tables/examples.datatables.default.js"></script> -->
		<script src="../js/validate.js" type="text/javascript"></script>
		<script src="../js/additional-methods.js" type="text/javascript" ></script>
		<script src="../js/shopvalidationrules.js" type="text/javascript" ></script>
		<script src="../js/country_state_city.js" type="text/javascript" ></script>

		<script src="../js/shopavailability.js" type="text/javascript" ></script>
		<script src="../js/all_function.js" type="text/javascript" ></script>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDh2sgKfwvLeTx36tIEj81_BVEC6hv0JkA"
		type="text/javascript"></script>
	</body>
	<script type="text/javascript">
getCountry_name();
showshopkeepermaninfotable();
display_shopkeeper();

	</script>
</html>
<?php
}
else {
	header("Location:./");
}
?>
