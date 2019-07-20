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
					<header class="panel-heading">
				<h2 class="text-center">Salesman Registration</h2>
					</header>
					<div class="wizard-tabs">
						<ul class="wizard-steps">
							<li class="active">
								<a href="#" data-toggle="tab" class="text-center">
									<span class="badge " id="showsalesman" onclick="showsalesmaninfotable();">SHOW SALESMAN</span>
								</a>
							</li>
							<li >
								<a href="#" data-toggle="tab" class="text-center">
									<span class="badge" onclick="showsalesform();">ADD SALESMAN</span>
								</a>
							</li>
						</ul>
					</div>

					<div class="panel-body" id="salesform" style="display:none">
						<span id="msg"></span>
						<form name="formsubmit" id="submitformdata"  method="post" enctype="multipart/form-data"  >
						<div class="row form-group">
						</div>
						<div class="row form-group">
							<div class="col-lg-3">
								<div class="form-group">
									<!--Person First Name:&nbsp;<font color="red">*</font>-->
										<!--Person First Name:&nbsp;<span class="required"><font color="red">*</font></span>-->
										<label class="control-label">Person First Name:&nbsp;<span class="required"><font color="red">*</font></span></label>


									<input type="text" name="firstname" id="firstname" required placeholder="Enter First Name" class="form-control" required autocomplete="on" />
									<input type="hidden" name="emp_id" id="emp_id"/>
							</div>
						</div>
						<div class="mb-md hidden-lg hidden-xl"></div>

							<div class="col-lg-3">
								<div class="form-group ">
								 <!--Person	Last Name:&nbsp;<font color="red">*</font>-->
								 		<label class="control-label" >Person Last Name:&nbsp;<span class="required"><font color="red">*</font></span></label>
                                     <!--<div class="form-group has-error">-->
									<input type="text" name="lastname" id="lastname" required placeholder="Enter Last Name" class="form-control has-error" autocomplete="off" />
									<!--</div>-->
							</div>
						</div>

						<div class="mb-md hidden-lg hidden-xl"></div>
						<!-- <div class="col-lg-3">
							<div class="form-group">
										Mobile:&nbsp;<font color="red">*</font>
								<input type="text" name="mobileno" id="mobileno" placeholder="Mobile"  class="form-control" onblur="checkusermobilenoavailability();" autocomplete="off" />
								<span id="checkmobile"></span>
						</div>
					</div> -->
					<div class="col-lg-3">
						<div class="form-group">
						<!--Person Email-Id:&nbsp;<font color="red">*</font>-->
						<label class="control-label">Person Email-Id:&nbsp;<span class="required"><font color="red">*</font></span></label>
							<input type="email" name="emailid" id="emailid" maxlength="255" placeholder="Enter E-Mail" required class="form-control" onkeyup="checkuseremailavailability();" autocomplete="off" />
							<span id="checkemail"> </span>
					</div>
				</div>
				<div class="mb-md hidden-lg hidden-xl"></div>
					<!-- <div class="mb-md hidden-lg hidden-xl"></div> -->
				<div class="col-lg-3">
					<div class="form-group">
					<!--Person Birth Date:&nbsp;<font color="red">*</font>-->
					<label class="control-label">Person Birth Date:&nbsp;<span class="required"><font color="red">*</font></span></label>
							<input placeholder = "Add Birth Date" class ="form-control" style="padding-top:0px;" required type = "text" onfocus = "(this.type = 'date')" name="birthdate"  id="birthdate">
					</div>
				</div>
					</div>
						<div class="row form-group">
						</div>
						<div class="row form-group">
							<div class="col-lg-3">
								<div class="form-group">
										<!--Person Mobile Number:&nbsp;<font color="red">*</font>-->
											<label class="control-label">Person Mobile Number:&nbsp;<span class="required"><font color="red">*</font></span></label>
									<input type="text" name="mobileno" id="mobileno" placeholder="Enter Mobile" required class="form-control" onkeyup="checkusermobilenoavailability();" autocomplete="off" />
									<span id="checkmobile"></span>
							</div>
						</div>
						<div class="mb-md hidden-lg hidden-xl"></div>
						<div class="col-lg-3">
							<div class="form-group">
							<!--Alternate Mobile Number:&nbsp;<font color="red"></font>-->
							<label class="control-label">Alternate Mobile Number:&nbsp;</label>
							<input type="text" name="mobileno1" id="mobileno1" placeholder="Alternate Mobile Number"   class="form-control"  autocomplete="off" />
						</div>
						</div>

						<div class="mb-md hidden-lg hidden-xl"></div>

						<div class="col-lg-3">
							<div class="form-group">
									<!--Gender:&nbsp;<font color="red">*</font>-->
									<label class="control-label">Gender:&nbsp;<span class="required"><font color="red">*</font></span></label>
								<select data-plugin-selectTwo  name="gender" id="gender"  placeholder="Select Gender" required class="form-control populate" >
									<option value="">Select Gender</option>
									<option value="male">Male</option>
									<option value="female">Female</option>
								</select>
							</div>
						</div>
						<div class="mb-md hidden-lg hidden-xl"></div>

						<div class="col-lg-3">
							<div class="form-group">
							<!--Person Status:&nbsp;<font color="red">*</font>-->
							<label class="control-label">Person Status:&nbsp;<span class="required"><font color="red">*</font></span></label>
								<select data-plugin-selectTwo  name="status" id="status" placeholder="Select Status" required class="form-control populate" >
									<option value="">Select Status</option>
									<option value="Active">Active</option>
									<option value="Inactive">Inactive</option>
								</select>
							</div>
						</div>
						</div>
						<div class="row form-group">
						</div>
						<div class="row form-group">
										<div class="col-sm-9">
											<div class="form-group">
										<div class="checkbox-custom checkbox-default">
					<input type="checkbox" name="bankdetails" id="bankdetails" onclick="displaybankdetails();"/>
					<label for="bankdetails"><h5 style="font:bold">Bank Details</h5></label>
					</div>
				</div>
				</div>
					<div class="col-lg-3"></div>
					<div class="mb-md hidden-lg hidden-xl"></div>
				</div>

			 <div class="row form-group" id="bankInfoDiv" >
					<div class="col-lg-3">
						<div class="form-group">
							<!--Person Account No:&nbsp;<font color="red"></font>-->
							<label class="control-label">Person Account No:&nbsp;</label>
							<input type="text" name="account" id="account"  placeholder="Enter Account Number" class="form-control" autocomplete="off" style="display:none"/>
				</div>
			</div>
			<div class="mb-md hidden-lg hidden-xl"></div>

			<div class="col-lg-3">
				<div class="form-group">
	     <!--Bank IFSC:&nbsp;<font color="red"></font>-->
	     	<label class="control-label">Bank IFSC:&nbsp;</label>
					<input type="text" name="ifsc" id="ifsc"  placeholder="Enter IFSC" class="form-control" autocomplete="off" style="display:none" />
		</div>
	</div>
	<div class="mb-md hidden-lg hidden-xl"></div>
	<div class="col-lg-3">
		<div class="form-group">
			<!--Branch:&nbsp;<font color="red"></font>-->
				<label class="control-label">Branch:&nbsp;</label>
			<input type="text" name="branch" id="branch"  placeholder="Enter Branch" class="form-control" autocomplete="off" style="display:none" />
</div>
</div>
<div class="mb-md hidden-lg hidden-xl"></div>
		</div>

				<div class="row form-group">

					<div class="mb-md hidden-lg hidden-xl"></div>
						<div class="col-lg-3">
					<div class="form-group">
						<!--Country:&nbsp;<font color="red">*</font>-->
						<label class="control-label">Country:&nbsp;<span class="required"><font color="red">*</font></span></label>
						<select data-plugin-selectTwo  name="country" id="country" placeholder="Select Country" required onclick="getState(this.value);" class="form-control populate" >
							<option value="">Select Country</option>
						</select>
					</div>
				</div>
				<div class="mb-md hidden-lg hidden-xl"></div>
				<div class="col-lg-3">
					<div class="form-group">
					<!--State:&nbsp;<font color="red">*</font>-->
					<label class="control-label">State:&nbsp;<span class="required"><font color="red">*</font></span></label>
					<select data-plugin-selectTwo  name="state" id="state" placeholder="Select State" required onclick="getCity(this.value);" class="form-control populate" >
						<option value="">Select State</option>
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
					<!--Address Zip Code<small>(Regional)</small>:&nbsp;<font color="red">*</font>-->
					<label class="control-label">Address Zip Code<small>(Regional)</small>:&nbsp;<span class="required"><font color="red">*</font></span></label>
					<input type="text" name="salespincode" id="salespincode"  placeholder="Enter Zip Code" required class="form-control" autocomplete="off"  />
				</div>
			</div>
				<div class="mb-md hidden-lg hidden-xl"></div>
				</div>

				<div class="row form-group"></div>
				<div class="row form-group">
					<div class="row form-group">
					</div>
					<div class="col-lg-3">
							<div class="form-group">
								Permanent Address:&nbsp;<font color="red">*</font>
								<!--<label class="control-label">Permanent Address:&nbsp;<span class="required"><font color="red">*</font></span></label>-->
						<textarea  name="address" id="address"  placeholder="Enter Permanent Address" required class="form-control" autocomplete="off"  ></textarea>
					</div>
					</div>

					<div class="mb-md hidden-lg hidden-xl"></div>

					<div class="col-lg-3">
						<div class="form-group">

							<div class="checkbox-custom chekbox-primary">
							    	<label for="checkaddress" class="control-label">Same as Permanent Address&nbsp;</label>
		                        <input type="checkbox"  name="checkaddress" id="checkaddress" onclick="setAddress1(this.form);"/>


		                   	</div>
		                    	 <textarea  name="address2" id="address2"  placeholder="Residential Address"  class="form-control" autocomplete="off" ></textarea>


						</div>
					</div>

					<div class="mb-md hidden-lg hidden-xl"></div>
					<div class="col-lg-3">
				<div class="form-group">
				 <label class="control-label">Person Profile Photo:&nbsp;</label>


						<div class="fileupload fileupload-new"  data-provides="fileupload"  >
							<div class="input-append" >
								<div class="uneditable-input" style="width: 100px;" >
									 <i class="fileupload-exists"></i>
									<span class="fileupload-preview" id="profile1"></span>
								</div>
								<span class="btn btn-default btn-file" >
									<span id="changeBtn" class="fileupload-exists">Change</span>
									<span  id="uploadBtn" class="fileupload-new">Upload Person's Photo</span>
									<input type="file" name="imgname" id="profile" onchange="readURL(this);" accept="image/*" >

								</span>
								   <!-- <a href="#" class="btn btn-default fileupload-exists" id="btnRemoveImage" onclick="readURL(this);" data-dismiss="fileupload">Remove</a> -->
									 <!-- <span id="btnRemoveImage" class="btn btn-default fileupload-exists" onclick="readURL(this);" data-dismiss="fileupload">Remove</span> -->
									 <span id="btnRemoveImage" class="btn btn-default fileupload-exists" onclick="removeImage(this);" data-dismiss="fileupload">Remove</span>

							</div>
						</div>


				</div>
			</div>

			<div class="mb-md hidden-lg hidden-xl"></div>

			<div class="col-lg-3" id="previewimg">
				<img id="profileimg" src="#" alt=" " />
			</div>
				</div>

				<div class="row form-group"></div>

				<footer class="panel-footer">
					<div class="row">
						<div class="col-lg-5"></div>
						<div class="col-lg-4">
							<input type="submit" class="btn btn-primary" value="Add" name="salesid" id="salesid"/>
							<input type="submit" class="btn btn-primary" value="Update" name="salesmanid" id="salesmanid" style="display:none;"/>

							<button type="reset" class="btn btn-default" onclick="clear_all();">Reset</button>
						</div>
						<div class="col-lg-3"></div>
						<div class="mb-md hidden-lg hidden-xl"></div>
					</div>
				</footer>
			</form>

					</div>
													 <section class="panel" id="salestable" style="display:none;" >
														<header class="panel-heading">
															<div class="panel-actions">
																<a href="#" class="fa fa-caret-down"></a>
																<a href="#" class="fa fa-times"></a>
															</div>
															<h2 class="panel-title">Salesmans Details</h2>
														</header>
														<div class="panel-body table-responsive">
															<table class="table table-bordered table-striped mb-none" style="width:100%;" id="datatable-default">
																<thead>
																	<tr>
																		<th class="text-center" style="width:10%;" >Profile Image</th>
																		<th class="text-center">Full Name</th>
																		<th class="text-center" >Email</th>
																		<th class="text-center">Mobile</th>
																		<th class="text-center">Status</th>
																		<th class="text-center" >Address</th>
																		<th class="text-center">Action</th>
																	</tr>
																</thead>
																<tbody id="salesmaninfodata"></tbody>
															</table>
														</div>
													</section>

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
		<script src="../js/all_function.js" type="text/javascript" ></script>
		<script src="../js/country_state_city.js" type="text/javascript" ></script>
		<script src="../js/availability.js" type="text/javascript" ></script>
    <script src="../js/mdtimepicker.js"></script>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDh2sgKfwvLeTx36tIEj81_BVEC6hv0JkA" type="text/javascript"></script>

		<script>
		function readURL(input) {
			// $('#btnRemoveImage').hide();
			$('#previewimg').hide();
					 if (input.files && input.files[0]) {
					     $('#previewimg').show();
							 var reader = new FileReader();
							 reader.onload = function (e) {
									 $('#profileimg').attr('src', e.target.result).width(100).height(100);
							 };
							 reader.readAsDataURL(input.files[0]);
					 }
					 else{
					       $('#previewimg').hide();
					 }
			 }

function removeImage(input){
	// alert(input);
	$('#uploadBtn').show();
	$('#changeBtn').hide();
	$('#btnRemoveImage').hide();
// debugger
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
