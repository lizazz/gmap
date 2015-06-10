$(document).ready(initialize);
var marker;
 
function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(49.9909644,36.2341494);
    var mapOptions = {
      zoom: 11,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
	var run=new init();
  }
 
 function init(){
	jQuery.ajax({
		type:"GET",
		url:'php3.php',
		dataType:'xml',
		success: function(xml){
			jQuery(xml).find('marker').each(
				function()
				{
					var name=jQuery(this).attr('name');
					var address=jQuery(this).attr('address');
					var image=jQuery(this).attr('image');
					codeAddress(name,address,image);
				}
			)
		}
	});
}

    function codeAddress(name,address,image) {
	
		
		geocoder.geocode( { 'address': address}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
					map.setCenter(results[0].geometry.location);
					var koord=results[0].geometry.location;
					
					
					//код маркера
					var marker = new google.maps.Marker({
						position: koord,
						map: map,
						title: address,
						visible: true
					}); 
					
					
					//вывод инфобокса
					//var myLatlng = new google.maps.LatLng(koord);
					var user='<div id="content" style="width:200px; height:100px"><div style="display:inline-block;float: left" ><img src="/image/'+image+'" height="50px" width="50px" ></div><div style="font-weight:bold;padding:5px;">'+name+'</div><div style="padding:5px;">'+address+'</div></div>';
					var infowindow = new google.maps.InfoWindow({
						 content: user
					});
	
	
					google.maps.event.addListener(marker, 'click', function() {
						infowindow.open(map,marker);
					})
			};
		})
	}
	
function addAddress(){
		var name = escape(document.getElementById("name").value);
		var address = escape(document.getElementById("address").value);
	 	var url = "addtobase.php?name=" + name + "&address=" + address;
}

function checkform(){
	alert ("hello");
}

function DeleteUser (name){
	if(confirm ("Delete "+name+" user?")){
			alert ("Data was deleted");
			name="./deleteDB.php?name="+name;
			window.location.href = name;
		}	
	else alert("No");
}