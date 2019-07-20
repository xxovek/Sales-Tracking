
getRoute_name();
function showsalesform()
{
 $("#salesform").show();
 $("#salesmanid").hide();
 $("#salesid").show();
 $("#salestable").hide();
 $("#profilePic").html(' ');
}

function getRoute_name(){
    $.ajax({
              type: "POST",
              url: "../src/get_route",
              success: function(msg)
             {
                    $("#source").html(msg);
              }
            });
}

function setAddress1(f)
{
	if(f.checkaddress.checked === true) {
    f.address2.value = f.address.value;
  }
	else {
		f.address2.value = '';

	}
}

function clear_all()
{
    $('#previewimg').hide();
  $("#gender").select2("val","");
  $("#country").select2("val","");
  $("#state").select2("val","");
  $("#city").select2("val","");
  $("#status").select2("val","");
  var validator = $("#submitformdata").validate();
 //Iterate through named elements inside of the form, and mark them as error free
 $('[name]','#submitformdata').each(function(){
   validator.successList.push(this);//mark as error free
   validator.showErrors();//remove error messages if present
 });
 validator.resetForm();//remove error class on name elements and clear history
 validator.reset();//remove all error and success data
}

function clear_info()
{
  $("#country").select2("val","");
  $("#state").select2("val","");
  $("#city ").select2("val","");
  var validator = $("#submitshopkeeperformdata").validate();
  //Iterate through named elements inside of the form, and mark them as error free
  $('[name]','#submitshopkeeperformdata').each(function(){
   validator.successList.push(this);//mark as error free
   validator.showErrors();//remove error messages if present
  });
  validator.resetForm();//remove error class on name elements and clear history
  validator.reset();//remove all error and success data
}

function display_salesman()
{
    $.ajax({
        type: "POST",
				dataType:"json",
        url: "../src/display_salesman",
    }).done(function(data) {
			if(!(data)){
				$("#salesmaninfodata").html('<tr ><td></td><td></td><td></td><td></td><td  style="color:black;">No data available in table</td></tr>');
			}
			else
			{
        var count = Object.keys(data).length;
        for (var i = 0; i < count; i++)
         {

            var sales_id = parseInt(data[i].Emp_id);
						var uploadimg = '<img src='+data[i].profilePic+' class="img-circle" alt="user profile" width="40" height="30">';
						          
					  $('#salesmaninfodata').append('<tr><td class="text-center">' + uploadimg + '</td><td class="text-center">' + data[i].fullname + '</td><td class="text-center">' + data[i].email + '</td><td class="text-center">'+ data[i].mobile +'</td><td class=" text-center">' + data[i].status +
						'</td><td class=" text-center">' + data[i].address + '</td><td class="actions center"><a data-toggle="collapse" title="Edit Salesman Information" data-target="#hidecustomerfield"  onclick="updatesalesinfo(' + sales_id + ');"><i class="fa fa-edit"></i></a><a  title="Remove Salesman" name="submit"  id="' + sales_id + '" onClick="removesalesman(' + sales_id + ');" ><i class="fa fa-trash-o"></i></a><a title="Assign Work" name="submit"  id="' + sales_id + '" onClick="Assignwork(' + sales_id + ');" ><i class="fa fa-thumbs-up"></i></a><a title="Track Report" name="submit"  id="' + sales_id + '" onClick="trackReport(' + sales_id + ');" ><i class="fa fa-eye"></i></a></td></tr>');
        }
       }

	    $("#datatable-default").DataTable({

				 bPaginate: $('#datatable-default tbody tr').length>10,
         order: [],
         columnDefs: [ { orderable: false, targets: [0,1,2,3,4,5,6] } ],
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


function updatesalesinfo (param){

$("#salesform").show();
$("#salestable").hide();
$("#salesmanid").show();
$("#salesid").hide();
$.ajax({
    url: "../src/fetchSalesInfo",
    method: "POST",
    dataType:"json",
    data: {saleinfo:param},
    success: function(data) {
      $("#firstname").val(data.efname);
      $("#lastname").val(data.elname);
      $("#emailid").val(data.eemail);
      $("#mobileno").val(data.emobile);
			$("#mobileno1").val(data.emobile1);
      $("#birthdate").val(data.edob);
      $("#emp_id").val(data.emp_id);

				document.getElementById("bankdetails").checked = true;
				document.getElementById("account").style.display = "block";
				document.getElementById("ifsc").style.display = "block";
				document.getElementById("branch").style.display = "block";
      $("#account").val(data.eAccountNo).show();
      $("#ifsc").val(data.eifscCode).show();
      $("#branch").val(data.ebranch).show();
      $("#address").val(data.eaddress);
			$("#address2").val(data.eaddress1);
			$("#salespincode").val(data.epincode);
			$("#gender").append("<option value=" + data.egender + " selected=selected>" + data.egender + "</option>").trigger('change');
			$("#status").append("<option value=" + data.estatus + " selected=selected>" + data.estatus + "</option>").trigger('change');
      $("#country").val(data.ecountry).trigger('change');
      // alert(data['estate']);
    //   $("#state").val(data.estate).trigger('change');
      // alert(data['ecity']);
    //   $("#city").val(data.ecity).trigger('change');

// 			$("#country").append("<option value=" + data.ecountry + " selected=selected>" + data.ecountry + "</option>").trigger('change');
// 			$("#state").append("<option value=" + data.estate + " selected=selected>" + data.estate + "</option>").trigger('change');
// 			$("#city").append("<option value=" + data.ecity + " selected=selected>" + data.ecity + "</option>").trigger('change');
// 		$("#country").append("<option value=" + data.ecountry + " selected=selected>" + data.ecountry + "</option>");
			$("#state").append("<option value=" + data.estate + " selected=selected>" + data.estate + "</option>").trigger('change');
			$("#city").append("<option value=" + data.ecity + " selected=selected>" + data.ecity + "</option>").trigger('change');
			var x = data.eprofilePic;
			var filename = x.replace(/^.*[\\\/]/, '');
  		document.getElementById("profile1").innerHTML = filename;
      // var
      if(filename !== "" ){
        $("#uploadBtn").hide();
        $("#changeBtn").show();
        $("#btnHideImage").show();
      }
    //   $("#profileimg").html('<img  src="'+data.eprofilePic+'" style="height:auto;width:100px;"  />');
    //   $("#profileimg").html(data['eprofilePic']);
      $('#profileimg').attr('src', data.eprofilePic).width(100).height(100);

			var firstaddress = document.getElementById("address").value;
			var secondaddress = document.getElementById("address2").value;
			if (firstaddress === secondaddress)
							document.getElementById("checkaddress").checked = true;
			else
							document.getElementById("checkaddress").checked = false;
    }
  });
}

function updateshopsinfo (param)
{
$("#shopkeeperform").show();
$("#shoptable").hide();
$("#shopmanid").show();
$("#shopid").hide();
$.ajax({
    url: "../src/fetchShopsInfo",
    method: "POST",
    dataType:"json",
    data: {shopinfo:param},
    success: function(data)
    {
      $("#contactperson").val(data.efname);
      $("#emailid").val(data.eemail);
      $("#mobileno").val(data.emobile);
			$("#mobileno1").val(data.emobile1);
      $("#shopkeeper_id").val(data.emp_id);
      $("#address").val(data.eaddress);
			$("#address2").val(data.eaddress1);
			$("#shoppincode").val(data.epincode);
			$("#country").append("<option value=" + data.ecountry + " selected=selected>" + data.ecountry + "</option>").trigger('change');
			$("#state").append("<option value=" + data.estate + " selected=selected>" + data.estate + "</option>").trigger('change');
			$("#city").append("<option value=" + data.ecity + " selected=selected>" + data.ecity + "</option>").trigger('change');
			var firstaddress = document.getElementById("address").value;
			var secondaddress = document.getElementById("address2").value;
			if (firstaddress === secondaddress)
							document.getElementById("checkaddress").checked = true;
			else
							document.getElementById("checkaddress").checked = false;
    }
  });
}

function showsalesmaninfotable()
{
$("#salestable").show();
$("#salesform").hide();
}


function removesalesman(param)
{
  var t = confirm("Do You want to delete the Salesman permanantly!");
  if (t == true) {
            $.ajax({
            url:"../src/removeDetails",
            async: false,
            cache: false,
            method:"POST",
            data:({id:param,tblName:'SalesManMaster',colName:'salesManId'}),
						dataType:'json',
            success:function(response)
            {
							if(response.true){
								$("#"+param).closest('tr').remove();
	                window.location.reload();
							}

            }
            });
          } else {

          }
}

function removeshopsman(param)
{
  var t = confirm("Do You want to delete the Salesman permanantly!");
  if (t == true) {
            $.ajax({
            url:"../src/removeDetails",
            async: false,
            cache: false,
            method:"POST",
            data:({id:param,tblName:'shopKeeperMaster',colName:'shopKeeperId'}),
						dataType:'json',
            success:function(response)
            {
							if(response.true){
								$("#"+param).closest('tr').remove();
	                window.location.reload();
							}

            }
            });
          } else {

          }
}
function Assignwork(shopId)
{
	window.location.href="assign_salesman";
}
function display_shopkeeper()
{
	$.ajax({
			type: "POST",
			dataType:"json",
			url: "../src/display_shopkeeper",
	}).done(function(data) {
		if(!(data)){
			$("#shopmaninfodata").html('<tr ><td></td><td></td><td></td><td></td><td  style="color:black;">No data available in table</td></tr>');
		}
		else
		{
			var count = Object.keys(data).length;
			for (var i = 0; i < count; i++)
			 {
					var shops_id = parseInt(data[i]['shop_id']);
	$('#shopmaninfodata').append('<tr><td class="text-center">'+(i+1)+'</td><td class="text-center">' + data[i]['fullname'] + '</td><td class="text-center">' + data[i]['email'] + '</td><td class="text-center">'+ data[i]['mobile'] +'</td><td class=" text-center">' + data[i]['city'] +
	'</td><td class=" text-center">' + data[i]['address'] + '</td><td class="actions center"><a data-toggle="collapse" title="Update Shopman Information" data-target="#hidecustomerfield"  onclick="updateshopsinfo(' + shops_id + ');"><i class="fa fa-edit"></i></a><a title="Remove Salesman" name="submit"  id="' + shops_id + '" onClick="removeshopsman(' + shops_id + ');" ><i class="fa fa-trash-o"></i></a></td></tr>');
			}
		 }
		// $("#datatable-default").DataTable({
		//  });

		  $("#datatable-default").DataTable({
       bPaginate: $('#datatable-default tbody tr').length>10,
       order: [],
       columnDefs: [ { orderable: false, targets: [0,1,2,3,4,5,6] } ],
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


function showshopkeepermaninfotable()
{
$("#shoptable").show();
$("#shopkeeperform").hide();
}

function showshopkeeperform()
{
	// $("#submitshopkeeperformdata")[0].reset();
	$("#gender").select2("val", "");
	$("#country").select2("val", "");
	$("#state").select2("val", "");
	$("#city").select2("val", "");
	$("#shopkeeperform").show();
	$("#shopmanid").hide();
	$("#shopid").show();
	$("#shoptable").hide();
}
function trackReport(salesId){
  window.location.href = 'trackReport.php?id='+salesId;
}