
function displaymap(markers){
  var mapOptions = {
      center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
      zoom: 8,
      mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(document.getElementById("livetrackmap"), mapOptions);

  var j = 0;
  var interval = setInterval(function () {
    // alert("ok2");
    $.ajax({
      url: "../src/fetchLivetrackposition",
      method: "POST",
      dataType: 'json',
      success: function (response) {
       // alert(response);
        var count = Object.keys(response).length;
        var work_id = 0;
        var markers1 = [];
        var dist1 = [];
        for (var i = 0; i < count; i++) {
          markers1.push({
          title: response[i].SellName,
          lat: response[i].latitude,
          lng: response[i].longitude,
          description: response[i].SellName
          });
          var data = markers1[i];
          var myLatlng = new google.maps.LatLng(data.lat, data.lng);
          var icon = "cycling";
          icon = "http://maps.google.com/mapfiles/ms/micons/" + icon + ".png";
          var marker = new google.maps.Marker({
              position: myLatlng,
              map: map,
              title: data.title,
              icon: new google.maps.MarkerImage(icon)
          });
          }

      },

      error: function (jqXhr, textStatus, errorMessage) { // error callback
        // alert(textStatus);
      }
    });

  }, 10000);
}



function displaySalesManList(){
$.ajax({
      url: "../src/fetchDashboardData",
      method: "POST",
      dataType: 'json',
      success: function (response) {
      var count = Object.keys(response).length;
      if(count <= 0){
       $("#SalesmanListTable").hide();
      }
  else{
      $("#SalesmanListTable").show();
    for (var i = 0; i < count; i++) {

      $("#SalesmanListTableData").append('<tr><td class="text-center">'+ response[i].EmpId +'</td><td class="text-center">'
      + response[i].fname+ " " + response[i].lname+'</td>'
      +'<td class="actions text-center"><a data-toggle="popover" data-placement="top" data-content="'+response[i].address+'"><i class="fa fa-map-marker"></i></a></td></tr>');


   }
      $("#SalesmanListTable").DataTable({
         bPaginate: $('#SalesmanListTable tbody tr').length>10,
			        order: [],
			        columnDefs: [ { orderable: false, targets: [0,1,2] } ],
      })

      $("[data-toggle=popover]").popover({'trigger':'hover'});

      // $('.popup-gmaps').magnificPopup({
      //   disableOn: 300,
      //   type: 'iframe',
      //   mainClass: 'mfp-fade',
      //   removalDelay: 160,
      //   preloader: false,
      //   fixedContentPos: false
      // });

    }

      },
      error: function (jqXhr, textStatus, errorMessage) { // error callback
         }
       });
}


function displayShopKeeperList(){
$.ajax({
      url: "../src/fetchShopKeeperList",
      method: "POST",
      dataType: 'json',
      success: function (response) {
      var count = Object.keys(response).length;
      if(count <= 0){
       $("#ShopsListTable").hide();
      }
  else{
      $("#ShopsListTable").show();

    for (var i = 0; i < count; i++) {
      // var datacontent = response[i].contactPerson;
      // markers.push({
      //        title: response[i].fname+" "+response[i].lname+" "+response[i].contact_number,
      //        lat: response[i].Latitude,
      //        lng: response[i].Longitude,
      //        description: response[i].shoperId
      //        });

      $("#ShopsListTableData").append('<tr><td class="text-center">'+ response[i].shoperId +'</td><td class="text-center">'
      + response[i].contactPerson+'</td>'
      +'<td class="actions text-center"><a data-toggle="popover" data-placement="top" data-content='+response[i].address+'><i class="fa fa-map-marker"></i></a></td></tr>');
   }
      $("#ShopsListTable").DataTable({
          bPaginate: $('#ShopsListTable tbody tr').length>10,
			        order: [],
			        columnDefs: [ { orderable: false, targets: [0,1,2] } ],
      })
      $("[data-toggle=popover]").popover({'trigger':'hover'});

      // $('.popup-gmaps').magnificPopup({
      //   disableOn: 300,
      //   type: 'iframe',
      //   mainClass: 'mfp-fade',
      //   removalDelay: 160,
      //   preloader: false,
      //   fixedContentPos: false
      // });

    }

      },
      error: function (jqXhr, textStatus, errorMessage) { // error callback
         }
       });
}
displaySalesManList();
displayShopKeeperList();
displayLivetracking();

// alert("ok");


// alert("ok");
// alert("done");
 // alert("ok");



  // function displaySalesManList() {
  //
  //   $.ajax({
  //     url: "../src/fetchDashboardData",
  //     method: "POST",
  //     dataType: 'json',
  //     success: function (response) {
  //       var count = Object.keys(response).length;
  //       $("#countsalesman").html(count);
  //       var work_id = 0;
  //       var markers = [];
  //       var dist1 = [];
  //       for (var i = 0; i < count; i++) {
  //         markers.push({
  //         title: response[i].fname+" "+response[i].lname+" "+response[i].contact_number,
  //         lat: response[i].Latitude,
  //         lng: response[i].Longitude,
  //         description: response[i].address
  //         });
  //         }
  //         var mapOptions = {
  //             center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
  //             zoom: 8,
  //             mapTypeId: google.maps.MapTypeId.ROADMAP
  //         };
  //         var infoWindow = new google.maps.InfoWindow();
  //         var latlngbounds = new google.maps.LatLngBounds();
  //         var map = new google.maps.Map(document.getElementById("salesManList"), mapOptions);
  //         var i = 0;
  //
  //         var interval = setInterval(function () {
  //             var data = markers[i];
  //             var myLatlng = new google.maps.LatLng(data.lat, data.lng);
  //             var icon = "blue-dot";
  //             // http:// google.com/mapfiles/ms/micons
  //             icon = "http://maps.google.com/mapfiles/ms/micons/" + icon + ".png";
  //             var marker = new google.maps.Marker({
  //                 position: myLatlng,
  //                 map: map,
  //                 title: data.title,
  //                 animation: google.maps.Animation.DROP,
  //                 icon: new google.maps.MarkerImage(icon)
  //             });
  //             (function (marker, data) {
  //                 google.maps.event.addListener(marker, "click", function (e) {
  //                     infoWindow.setContent(data.description);
  //                     infoWindow.open(map, marker);
  //                 });
  //             })(marker, data);
  //             latlngbounds.extend(marker.position);
  //             i++;
  //             if (i == markers.length) {
  //                 clearInterval(interval);
  //                 var bounds = new google.maps.LatLngBounds();
  //                 map.setCenter(latlngbounds.getCenter());
  //                 map.fitBounds(latlngbounds);
  //             }
  //         }, 80);
  //     },
  //
  //     error: function (jqXhr, textStatus, errorMessage) { // error callback
  //     }
  //   });
  // }


  // function displayShopKeeperList() {
  //
  //   $.ajax({
  //     url: "../src/fetchShopKeeperList",
  //     method: "POST",
  //     dataType: 'json',
  //     success: function (response) {
  //
  //       var count = Object.keys(response).length;
  //       $("#countshoplist").html(count);
  //       var work_id = 0;
  //       var markers = [];
  //       var dist1 = [];
  //       for (var i = 0; i < count; i++) {
  //         markers.push({
  //         title: response[i].contactPerson+" "+response[i].contactNumber,
  //         lat: response[i].Latitude,
  //         lng: response[i].Longitude,
  //         description: response[i].address+" "+response[i].address2+" "+response[i].city+" "+response[i].state+" "+response[i].country+" "+response[i].pincode
  //         });
  //         }
  //         var mapOptions = {
  //             center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
  //             zoom: 8,
  //             mapTypeId: google.maps.MapTypeId.ROADMAP
  //         };
  //         var infoWindow = new google.maps.InfoWindow();
  //         var latlngbounds = new google.maps.LatLngBounds();
  //         var map = new google.maps.Map(document.getElementById("shopList"), mapOptions);
  //         var i = 0;
  //         var interval = setInterval(function () {
  //             var data = markers[i]
  //             var myLatlng = new google.maps.LatLng(data.lat, data.lng);
  //             var icon = "icon21";
  //
  //             icon = "http://maps.google.com/mapfiles/kml/pal3/" + icon + ".png";
  //             var marker = new google.maps.Marker({
  //                 position: myLatlng,
  //                 map: map,
  //                 title: data.title,
  //                 animation: google.maps.Animation.DROP,
  //                 icon: new google.maps.MarkerImage(icon)
  //             });
  //             (function (marker, data) {
  //                 google.maps.event.addListener(marker, "click", function (e) {
  //                     infoWindow.setContent(data.description);
  //                     infoWindow.open(map, marker);
  //                 });
  //             })(marker, data);
  //             latlngbounds.extend(marker.position);
  //             i++;
  //             if (i == markers.length) {
  //                 clearInterval(interval);
  //                 var bounds = new google.maps.LatLngBounds();
  //                 map.setCenter(latlngbounds.getCenter());
  //                 map.fitBounds(latlngbounds);
  //             }
  //         }, 80);
  //     },
  //     error: function (jqXhr, textStatus, errorMessage) { // error callback
  //
  //     }
  //   });
  // }


  function displayLivetracking(){
    // alert("hello");
    $.ajax({
      url: "../src/fetchLivetrackposition",
      method: "POST",
      dataType: 'json',
      success: function (response) {
        //alert(response);
        // var count = 1;
        var count = Object.keys(response).length;
        if(count < 1){
            $("#livetrackmapDiv").hide();
            //$("#countlivesalesman").html("<font color='red' style='float:right;'>No one Available Now</font>");
        }
        else{
          $("#livetrackmapDiv").show();
          $("#countlivesalesman").html(count);
        }
        var work_id = 0;
        var markers = [];
        var dist1 = [];
        for (var i = 0; i < count; i++) {
          markers.push({
          title: response[i].salesAssignId,
          lat: response[i].latitude,
          lng: response[i].longitude,
          description: response[i].salesAssignId
          });
          }
          displaymap(markers);
      },

      error: function (jqXhr, textStatus, errorMessage) { // error callback
      }
    });
  }




  function computeTotalDistance(result) {
    var total = 0,time=0;
    var myroute = result.routes[0];

    for (var i = 0; i < myroute.legs.length; i++) {

      time += (Math.floor(myroute.legs[i].duration.value / 60));
      total += myroute.legs[i].distance.value;
    }
    total = total / 1000;
    document.getElementById('total').innerHTML = total + ' km';
    document.getElementById('time').innerHTML = time + ' (in minute)';
  }
