
$(document).ready(function()
 {
   getCountry_name();
   display_salesman();
 showsalesmaninfotable();

   var ruleSet1 = {
     required:true,
                     minlength: 2,
                     lettersonly: true
                  };
  var ruleSet9 = {
    required:{
        depends:function(){
$(this).val($.trim($(this).val()));
return true;
}
},
                     minlength: 4,
                    lettersonly: true
                  };

   var ruleSet2 = {
     required:true
                  };

  var ruleSet3 = {
    required:{
       depends:function(){
$(this).val($.trim($(this).val()));
return true;
}
},
                   digits:true,
                   minlength:10,
                   maxlength: 10,
                   pattern:"[789][0-9]{9}"
                 };
                 var ruleSet21= {
                                  digits:true,
                                  minlength:10,
                                  maxlength: 10,
                                  pattern:"[789][0-9]{9}"
                                };
                 var ruleSet7= {
                   required:{
        depends:function(){
$(this).val($.trim($(this).val()));
return true;
}
},
                                 minlength:6,
                                 maxlength: 6,
                                 digits:true
                               };

  var  ruleSet4 = {
                    required:"Enter Person First Name",
                    minlength:"Name must be at least Two characters long",
                    lettersonly:"This field can only contain characters"
                 };
                 var  ruleSet10 = {
                                   required:"Enter Person Last Name",
                                   minlength:"Name must be at least Two characters long",
                                   lettersonly:"this field can only contain characters"
                                };
  // var ruleSet5 = {
  //                  required: "This Field is Required"
  //                };
    var ruleSet6 = {
                      required: "Enter Person Mobile Number ",
                      digits:"Enter Only Digits",
                      minlength: "Enter Only Ten Digits",
                      maxlength: "Check Mobile Number",
                      pattern:"Mobile Number Should Start With 7,8,or 9"
                   };
                   var ruleSet22= {
                     digits:"Enter Only Digits",
                     minlength: "Enter Only Ten Digits",
                     maxlength: "Check Mobile Number",
                     pattern:"Mobile Number Should Start With 7,8,or 9"
                                  };
   var ruleSet8 = {
                   required: "Enter Zip Code For Region",
                   digits:"Enter Only Digits",
                   minlength: "Enter Valid Six Digits Zip Code",
                    maxlength: "Please Enter Valid Zip Code For Region ex.411002"
                 };

                 var ruleSetMsgForEmail = {
                                  required: "Please Enter Email"
                                };
                 var ruleSetMsgForBdate = {
                                  required: "Please Enter Birth Date"
                                };
                  var ruleSetMsgForGender = {
                                  required: "Please Enter Gender"
                                };
                  var ruleSetMsgForStatus = {
                                  required: "Please Enter Status"
                                };
                  var ruleSetMsgForCountry = {
                                  required: "Please Enter Country"
                                };
                  var ruleSetMsgForState = {
                                  required: "Please Enter State"
                                };
                  var ruleSetMsgForCity = {
                                  required: "Please Enter City"
                                };
                  var ruleSetMsgForAddress = {
                                  required: "Please Enter Address"
                                };

   $("form[name='formsubmit']").validate({
     rules: {
                   firstname: ruleSet1,
                   lastname:  ruleSet9,
                   emailid:   ruleSet2,
                   mobileno:  ruleSet3,
                   mobileno1: ruleSet21,
                   birthdate: ruleSet2,
                   gender:    ruleSet2,
                   status:    ruleSet2,
                   country:ruleSet2,
                   state:ruleSet2,
                   city:ruleSet2,
                   salespincode:ruleSet7,
                   address:   ruleSet2
           },
   messages: {
                firstname:  ruleSet4,
                lastname:   ruleSet10,
                emailid:    ruleSetMsgForEmail,
                mobileno:   ruleSet6,
                mobileno1:  ruleSet22,
                birthdate:  ruleSetMsgForBdate,
                gender:     ruleSetMsgForGender,
                status:     ruleSetMsgForStatus,
                country:ruleSetMsgForCountry,
                state:ruleSetMsgForState,
                city:ruleSetMsgForCity,
                salespincode:ruleSet8,
                address:    ruleSetMsgForAddress
        },
        submitHandler: function(form,event)
        {
          event.preventDefault();
          var formData = new FormData(form);
          var city=document.getElementById("city").value;
          var address=document.getElementById("address").value;
          var pincode=document.getElementById("salespincode").value;
          var salesaddress= city + address + pincode;
          var button = document.getElementById("salesid").value;
          var button1 = document.getElementById("salesmanid").value;
          var emp_id = document.getElementById("emp_id").value;

          var geocoder = new google.maps.Geocoder();
geocoder.geocode({ 'address': salesaddress }, function (results, status) {
     if (status != google.maps.GeocoderStatus.OK) {
                         let msg1= "<div class='alert alert-warning text-center' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='green'>Address Location Not Found Please Enter Correct ZIP COD Permanent Address!</strong></font></div>";
                           $('#msg1').html(msg1);
                    }
               else {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();
                    formData.append('lat', latitude);
                    formData.append('long', longitude);

            $.ajax({
                   url:"../src/salesRegistration",
          	       type:"POST",
                   dataType:'json',
            	     data: formData,
                   contentType: false,
                   processData:false,
                
          	       success:function(data)
                   {
          		         if(data['value'] === 'insert')
                       {
                         var msg= "<div class='alert alert-success text-center' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='green'> Salesman Registered Successfully!</strong></font></div>";
                           $('#msg').html(msg);
                           window.setTimeout(function() {
                             $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                 $(this).remove();
                             });
                         }, 3000);
                        $("#submitformdata")[0].reset();
                        $("#gender").select2("val", "");
                          $("#country").select2("val", "");
                          $("#state").select2("val", "");
                          $("#city").select2("val", "");

                        $("#status").select2("val", "");
                        window.location.reload();
                      }
                      else if(data['value'] === 'update') {

                        let msg= "<div class='alert alert-success text-center' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='green'> Salesman Updated Successfully!</strong></font></div>";
                          $('#msg').html(msg);
                          window.setTimeout(function() {
                            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                $(this).remove();
                            });
                        }, 3000);
                           $("#submitformdata")[0].reset();
                           $("#gender").select2("val", "");
                           $("#status").select2("val", "");
                           $("#country").select2("val", "");
                           $("#state").select2("val", "");
                           $("#city").select2("val", "");

                           window.location.reload();
                          }
                          else
                          {
                          let msg= "<div class='alert alert-danger text-center' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='red'> Salesman Not Registered Try Again!</strong></font></div>";
                            $('#msg').html(msg);
                            window.setTimeout(function() {
                              $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                  $(this).remove();
                              });
                          }, 3000);
                        }
                    }
                    // complete:function(data){
                    //       user.button('reset');
                    //   }
                      });
                    }
                 
      });
    }
 });
 });
