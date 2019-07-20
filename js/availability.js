
$("#bankInfoDiv").hide();

function displaybankdetails(){
		var checkBox = document.getElementById("bankdetails");
		var text = document.getElementById("account");
		var text1 = document.getElementById("ifsc");
		var text2 = document.getElementById("branch");


		if (checkBox.checked === true){
			$("#bankInfoDiv").show();

				text.style.display = "block";
				text1.style.display = "block";
				text2.style.display = "block";
		}
		else {
			text.style.display = "none";
			text1.style.display = "none";
			text2.style.display = "none";
			checkBox.checked = false;
			$("#bankInfoDiv").hide();

	 }
}


function checkuseremailavailability()
{

	var useremail = document.getElementById("emailid").value;
	$.ajax({
			     url:"../src/checkAvailablityOfUser",
			     dataType:'json',
			     data:{email:useremail,tblName:"SalesManMaster"},
			     success:function(data)
			    {
			      	if(data['true'] == 'true')
				      {
					    $("#emailid").val('');
	 	           $("#checkemail").html("Email id already exists");

			   	    }
			 	   else {
				   	$("#checkemail").html(" ");
				    }
			    }
	    });
 }

function checkusermobilenoavailability()
{
	var usermobile = document.getElementById("mobileno").value;
	$.ajax({
			url:"../src/checkAvailablityOfMobile",
			dataType:'json',
			data:{mobile1:usermobile,tblName:"SalesManMaster"},
			success:function(data)
			{
				if(data['true'] == 'true')
				{
					$("#mobileno").val(' ');
	 			$("#checkmobile").html("Mobile number already exists");
				}
				else {
					$("#checkmobile").html(" ");
				}
			}
	   });
}
