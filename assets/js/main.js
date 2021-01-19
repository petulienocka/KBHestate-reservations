// Light/Dark Mode

$('#body').toggleClass(localStorage.toggled);

function DarkLightMode() {

  if (localStorage.toggled != 'dark') {
    $('#body, p').toggleClass('dark', true);
    localStorage.toggled = "dark";
     
  } else {
    $('#body, p').toggleClass('dark', false);
    localStorage.toggled = "";
  }
}

if ($('body').hasClass('dark')) {
   $( '#checkBox' ).prop( "checked", true )
} else {
  $( '#checkBox' ).prop( "checked", false )
}

// Change Image on index page

function changeImage(element) {
  document.getElementById('imageReplace').src = element;
  }

// Table in profiles

  $(document).ready(function(){
		$("#table").DataTable();
	});

// Delete account

  function confirmationDelete(anchor){
		var conf = confirm("Are you sure you want to delete this record?");
		if(conf){
			window.location = anchor.attr("href");
		}
	} 

  // Google maps API

  function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 12,
      center: { lat: 55.666153, lng: 12.513480, }
    });
   
   
    var markerCopenhagen1 = new google.maps.Marker({
      position: new google.maps.LatLng(55.678060, 12.548820),
      map: map,
      title: "Copenhagen 1",
    });
    map.addListener("center_changed", () => {
      window.setTimeout(() => {
        map.panTo(markerCopenhagen1.getPosition());
      }, 3000);
    });
    markerCopenhagen1.addListener("click", () => {
      map.setZoom(15);
      map.setCenter(markerCopenhagen1.getPosition());
    });
    
    var markerCopenhagen2 = new google.maps.Marker({
      position: new google.maps.LatLng(55.666374, 12.552419),
      map: map,
      title: "Copenhagen 2",

    });
    map.addListener("center_changed", () => {
      window.setTimeout(() => {
        map.panTo(markerCopenhagen2.getPosition());
      }, 3000);
    });
    markerCopenhagen2.addListener("click", () => {
      map.setZoom(15);
      map.setCenter(markerCopenhagen2.getPosition());
    });


    
    var markerCopenhagen3 = new google.maps.Marker({
      position: new google.maps.LatLng(55.659341, 12.583480),
      map: map,
      title: "Copenhagen 3",
    });
    map.addListener("center_changed", () => {
      window.setTimeout(() => {
        map.panTo(markerCopenhagen3.getPosition());
      }, 3000);
    });
    markerCopenhagen3.addListener("click", () => {
      map.setZoom(15);
      map.setCenter(markerCopenhagen3.getPosition());
    });

    
    
    var markerCopenhagen4 = new google.maps.Marker({
      position: new google.maps.LatLng(55.688394, 12.584707),
      map: map,
      title: "Copenhagen 4",

    });
    map.addListener("center_changed", () => {
      window.setTimeout(() => {
        map.panTo(markerCopenhagen4.getPosition());
      }, 3000);
    });
    markerCopenhagen4.addListener("click", () => {
      map.setZoom(15);
      map.setCenter(markerCopenhagen4.getPosition());
    });


    var markerCopenhagen5 = new google.maps.Marker({
      position: new google.maps.LatLng(55.691129, 12.545309),
      map: map,
      title: "Copenhagen 5",
    }); 
    map.addListener("center_changed", () => {
      window.setTimeout(() => {
        map.panTo(markerCopenhagen5.getPosition());
      }, 3000);
    });
    markerCopenhagen5.addListener("click", () => {
      map.setZoom(15);
      map.setCenter(markerCopenhagen5.getPosition());
    });
  }


  // Animations set-up
  AOS.init();


// JQuery counter
$('.counter').counterUp({
  delay: 10,
  time: 2000
});
$('.counter').addClass('animated fadeInDownBig');
$('h3').addClass('animated fadeIn');


// Admin Dashboard
function mainInfo() {
  var x = document.getElementById("agent-info");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function sideBar() {
  var x = document.getElementById("side-links");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}


// Pagination

$(document).ready(function () {
  $('#houses-limit').change(function () {
      $('form').submit();
  })
});


// JavaScript Alert 

function alertActive() {
  alert("Hello! I am an alert box!");
}


// Live Search 

$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:'../../components/Client-Search.php',
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#agents').html(data);
			}
		});
	}
	
	$('#search').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});