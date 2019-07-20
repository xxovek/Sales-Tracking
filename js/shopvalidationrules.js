jQuery(document).ready(function($)
 {

   var ruleSet1 = {
     required:true,
                     minlength: 2,
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
                 var ruleSet9 = {
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
                    required:"Please Enter Person FullName",
                    minlength:"Name must be at least Two characters long"
                 };
  // var ruleSet5 = {
  //                  required: "this field is required"
  //                };

    var ruleSet6 = {
                      required: "Enter Person Mobile Number ",
                      digits:"Enter Only Digits",
                      minlength: "Enter Only Ten Digits",
                      maxlength: "Check Mobile Number",
                      pattern:"Mobile Number Should Start With 7,8,or 9"
                   };
                   var ruleSet10= {
                     digits:"Enter Only Digits",
                     minlength: "Enter Only Ten Digits",
                     maxlength: "Check Mobile Number",
                     pattern:"Mobile Number Should Start With 7,8,or 9"
                                  };
   var ruleSet8={
     required: "Enter Zip Code For Region",
     digits:"Enter Only Digits",
     minlength: "Enter Valid Six Digits Zip Code",
      maxlength: "Please Enter Valid Zip Code For Region ex.411002"
                 };

                 var ruleSetMsgForEmail = {
                                  required: "Please Enter Person Email"
                                };
                  var ruleSetMsgForCountry = {
                                  required: "Please Enter Person Country"
                                };
                  var ruleSetMsgForState = {
                                  required: "Please Enter Person State"
                                };
                  var ruleSetMsgForCity = {
                                  required: "Please Enter Person City"
                                };
                  var ruleSetMsgForAddress = {
                                  required: "Please Enter Person Address"
                                };

   $("form[name='submitshopkeeperform']").validate({
     rules: {
                   contactperson: ruleSet1,
                   lastname:  ruleSet1,
                   emailid:   ruleSet2,
                   mobileno:  ruleSet3,
                   mobileno1:ruleSet9,
                   country:ruleSet2,
                   state:ruleSet2,
                   city:ruleSet2,
                   shoppincode:ruleSet7,
                   address1:   ruleSet2
           },
   messages: {
                contactperson:  ruleSet4,
                lastname:   ruleSet4,
                emailid:    ruleSetMsgForEmail,
                mobileno:   ruleSet6,
                mobileno1:ruleSet10,
                country:ruleSetMsgForCountry,
                state:ruleSetMsgForState,
                city:ruleSetMsgForCity,
                shoppincode:ruleSet8,
                address1: ruleSetMsgForAddress
        },
        submitHandler: function(form,event)
        {
          event.preventDefault();
          var formdata = $('#submitshopkeeperformdata').serialize();
          var shopkeeper_id = document.getElementById("shopkeeper_id").value;

          var city=document.getElementById("city").value;
          var address=document.getElementById("address").value;
          var pincode=document.getElementById("shoppincode").value;
          var shopaddress= city + address + pincode;
          var geocoder = new google.maps.Geocoder();
          
            geocoder.geocode({ 'address': shopaddress }, function (results, status) {
                    if (status != google.maps.GeocoderStatus.OK) {
                         let msg1= "<div class='alert alert-warning text-center' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='green'>Address Location Not Found Please Enter Correct ZIP COD And Permanent Address !</strong></font></div>";
                           $('#msg1').html(msg1);
                    }
                        else {
                              var latitude = results[0].geometry.location.lat();
                              var longitude = results[0].geometry.location.lng();

            $.ajax({
                   url:'../src/shopKeeperRegistration',
                   type:'POST',
                   data:formdata+'&lat=' + latitude +'&long=' + longitude,
                   dataType:'json',
                  
          	       success:function(response)
                   {
                     if(response.true){
                       if(response.C === 0){
                         var msg= "<div class='alert alert-success text-center' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='green'> Shopkeeper Registered Successfully!</strong></font></div>";
                              $('#msg1').html(msg);
                              window.setTimeout(function() {
                                $(".alert").fadeTo(500,0).slideUp(500, function(){
                                    $(this).remove();
                                });
                            }, 3000);
                           $("#submitshopkeeperformdata")[0].reset();
                           $("#country").select2("val", "");
                           $("#state").select2("val", "");
                           $("#city").select2("val", "");
                           window.location.reload();
                       }else {
                         let msg1= "<div class='alert alert-success text-center' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='green'> ShopKeeper Updated Successfully!</strong></font></div>";
                             $('#msg1').html(msg1);
                             window.setTimeout(function() {
                               $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                   $(this).remove();
                               });
                           }, 3000);
                              $("#submitshopkeeperformdata")[0].reset();
                              $("#country").select2("val", "");
                              $("#state").select2("val", "");
                              $("#city").select2("val", "");
                              window.location.reload();
                       }
                     }else {
                       let msg1= "<div class='alert alert-danger text-center' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong><font color='red'> Shopkeeper Not Registered Try Again!</strong></font></div>";
                             $('#msg1').html(msg1);
                             window.setTimeout(function() {
                               $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                   $(this).remove();
                               });
                           }, 3000);
                     }

                    }
                      })
                    }
                //     else {
                       
                //     //   alert("Address Location Not Found Please Enter Correct ZIP COD");
                //  }
      });
    }
 });
});
