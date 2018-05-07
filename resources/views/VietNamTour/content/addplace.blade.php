@include('VietNamTour.header-footer.header')

<link rel="stylesheet" href="public/resource/css/select2.min.css">
<link rel="stylesheet" href="public/resource/css/addplace.css">

<style>
  /* Always set the map height explicitly to define the size of the div
   * element that contains the map. */
  #map {
    height: 100%;
  }
  /* Optional: Makes the sample page fill the window. */
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }
  #description {
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
  }

  #infowindow-content .title {
    font-weight: bold;
  }

  #infowindow-content {
    display: none;
  }

  #map #infowindow-content {
    display: inline;
  }

  .pac-card {
    margin: 10px 10px 0 0;
    border-radius: 2px 0 0 2px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    outline: none;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    background-color: #fff;
    font-family: Roboto;
  }

  #pac-container {
    padding-bottom: 12px;
    margin-right: 12px;
  }

  .pac-controls {
    display: inline-block;
    padding: 5px 11px;
  }

  .pac-controls label {
    font-family: Roboto;
    font-size: 13px;
    font-weight: 300;
  }

  #pac-input {
    background-color: #fff;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
    margin-left: 12px;
    padding: 0 11px 0 13px;
    text-overflow: ellipsis;
    width: 400px;
  }

  #pac-input:focus {
    border-color: #4d90fe;
  }

  #title {
    color: #fff;
    background-color: #4d90fe;
    font-size: 25px;
    font-weight: 500;
    padding: 6px 12px;
  }
  #target {
    width: 345px;
  }
</style>


<section class="addplace">
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 content" style="margin-top: 80px;">
				<h4 style="font-size: 25px; font-weight: bold;" class="text-center">Thêm địa điểm mới</h4>
				<h5 style="color: red;">Thông tin cơ bản</h5>
				<div class="div" style="height: 1px; width: 100%; background-color: red; margin-bottom: 10px;"></div>
				<form action="">
					<div class="input-text col-md-12">
						<label class="col-md-2">Tên địa điểm</label>
						<input type="text">
					</div>

					<div class="input-text col-md-12">
						<label class="col-md-2">Điện thoại</label>
						<input type="text">
					</div>

					<div class="input-text col-md-12" style="margin-bottom: 10px;">
						<label class="col-md-2">Tỉnh thành</label>
						<select class="js-example-basic-single col-md-4" name="city">
              <option value="0">Chọn tỉnh thành phố</option>
							@foreach($city as $c)
							  <option value="{{$c->id}}">{{$c->province_city_name}}</option>
							@endforeach
						</select>
						<label class="col-md-2" style="margin-right: -10px;display: inline-block;">Quận huyện</label>
						<select class="js-example-basic-single col-md-3" name="districtt" id="district">
              <option value="0">Chọn quận huyện</option>
						</select>
					</div>

					<div class="col-md-12" style="margin-bottom: 10px;">
						<label class="col-md-2" style="width: 150px;font-size: 14px;font-weight: bold;">Khu vực</label>
						<select class="js-example-basic-single col-md-9" name="" id="ward" style="padding: 0">
						</select>
					</div>

					<div class="input-text col-md-12">
						<label class="col-md-2">Địa chỉ</label>
						<input type="text">
					</div>

					<div class="input-text col-md-12">
						<label class="col-md-2" style="">Mô tả</label>
						<textarea style="height: 105px;"></textarea>
					</div>

					<div class="input-text col-md-12" style="margin-bottom: 10px;">
						<label class="col-md-2">Vị trí</label>
						<button type="button" style="padding: 8px 25px;border: none;border-radius: 0;font-size: 15px;font-weight: 600;margin: 0;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
							Vị trí
						</button>

						<div id="myModal" class="modal fade" role="dialog" style="margin-top: 105px;">
						  <div class="modal-dialog modal-lg">

						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" style="color: black">&times;</button>
						      </div>
						      <div class="modal-body" style="min-height: 450px;">

					        	<input id="pac-input" class="controls" type="text" placeholder="Search Box">
    							<div id="map"></div>

						      </div>
						    </div>

						  </div>
						</div>
					</div>

					<div class="input-text col-md-12">
						<label class="col-md-2" style="padding: 0;">Nhập trực tiếp</label>
						<input type="text" placeholder="Vĩ độ" class="col-md-4">
						<input type="text" placeholder="Kinh độ" class="col-md-4">
					</div>

					<button class="btn btn-success col-md-12" id="btnaddplace" style="margin-top: 20px;">
						Thêm địa điểm mới
					</button>
				</form>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</section>


<script src="public/resource/js/select2.full.js"></script>

<script type="text/javascript">
	// In your Javascript (external .js resource or <script> tag)
	$(document).ready(function() {
	    $('.js-example-basic-single').select2();
	});
</script>

<script src="public/resource/js/p/addplace.js"></script>

<script>
      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13,
          mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4NgGvVNbWb_bMXOdeHLMWVhHm_HITw34&libraries=places&callback=initAutocomplete"
         async defer></script>





@include('VietNamTour.header-footer.footer')
