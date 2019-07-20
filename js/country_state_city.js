
function getCountry_name()
{
    $.ajax({
              type: "POST",
              url: "../src/get_countryNames",
              success: function(msg)
             {
                    $("#country").html(msg);
              }
            });
}
function getState(country)
{
  $.ajax({
              type: "POST",
              url: "../src/get_StateNames",
              data: ({
                        user_id:country
                      }),
                      success: function(msg)
                      {
                         $("#state").html(msg);
                            //   $("#state").append(msg).val("").trigger("change");
                             //    $("#state").append(msg).val(msg);
                        }
          });
}


function getCity(state)
{
  $.ajax({
      type: "POST",
      url: "../src/getcityNames",
      data: ({
          user_id:state
      }),
      success: function(msg) {
        $("#city").html(msg);
        // $("#city").html(msg).val("").trigger("change");
          //$("#city").append(msg).val(msg);
      }
  });
}
