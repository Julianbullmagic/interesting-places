
@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="">
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div>

					@if (session('status'))
					<div role="alert">
						{{ session('status') }}
					</div>
					@endif
					<div id="mapsearch">
						<div>
						<input style="display:inline" id="addressinput" type="text">
						<p style="display:inline" id="addressdisplay"></p>
						<button style="display:inline" onclick="setAddress()">set address</button>
					</div>
								<div>
					<input style="display:inline" id="radiusinput" type="range"
				min="10" max="3000" value="1000" onchange="setCircle()">
				<p style="display:inline" id="radiusdisplay"></p>
					<button style="display:inline" onclick="setRadius()">set radius</button>
				</div>
					<div>
					<div style="display:inline" name="category" id="category">
					</div>
					<p style="display:inline" id="categorydisplay"></p>
					<h4 style="display:inline">set category</h4>
				</div>
				</div>
					<h3 id="mapinfo">Radius in meters, min 100, max 30000. Right click map to set center marker</h3>

					<div id="defaultMapId" class="leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" tabindex="0" style="position: relative; outline: none;"><div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(-210px, 0px, 0px);"><div class="leaflet-pane leaflet-tile-pane"><div class="leaflet-layer " style="z-index: 1; opacity: 1;"><div class="leaflet-tile-container leaflet-zoom-animated" style="z-index: 16; transform: translate3d(410px, 234px, 0px) scale(0.25);"></div><div class="leaflet-tile-container leaflet-zoom-animated" style="z-index: 18; transform: translate3d(273px, 156px, 0px) scale(1);"><img alt="" role="presentation" src="https://c.tile.openstreetmap.org/10/511/511.png" class="leaflet-tile leaflet-tile-loaded" style="width: 512px; height: 512px; transform: translate3d(-239px, -356px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://a.tile.openstreetmap.org/10/512/511.png" class="leaflet-tile leaflet-tile-loaded" style="width: 512px; height: 512px; transform: translate3d(273px, -356px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://a.tile.openstreetmap.org/10/511/512.png" class="leaflet-tile leaflet-tile-loaded" style="width: 512px; height: 512px; transform: translate3d(-239px, 156px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://b.tile.openstreetmap.org/10/512/512.png" class="leaflet-tile leaflet-tile-loaded" style="width: 512px; height: 512px; transform: translate3d(273px, 156px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://b.tile.openstreetmap.org/10/510/511.png" class="leaflet-tile leaflet-tile-loaded" style="width: 512px; height: 512px; transform: translate3d(-751px, -356px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://b.tile.openstreetmap.org/10/513/511.png" class="leaflet-tile leaflet-tile-loaded" style="width: 512px; height: 512px; transform: translate3d(785px, -356px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://c.tile.openstreetmap.org/10/510/512.png" class="leaflet-tile leaflet-tile-loaded" style="width: 512px; height: 512px; transform: translate3d(-751px, 156px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://c.tile.openstreetmap.org/10/513/512.png" class="leaflet-tile leaflet-tile-loaded" style="width: 512px; height: 512px; transform: translate3d(785px, 156px, 0px); opacity: 1;"></div></div></div><div class="leaflet-pane leaflet-shadow-pane"></div><div class="leaflet-pane leaflet-overlay-pane"></div><div class="leaflet-pane leaflet-marker-pane"></div><div class="leaflet-pane leaflet-tooltip-pane"></div><div class="leaflet-pane leaflet-popup-pane"></div><div class="leaflet-proxy leaflet-zoom-animated" style="transform: translate3d(262144px, 262144px, 0px) scale(1024);"></div></div><div class="leaflet-control-container"><div class="leaflet-top leaflet-left"><div class="leaflet-control-zoom leaflet-bar leaflet-control"><a class="leaflet-control-zoom-in" href="#" title="Zoom in" role="button" aria-label="Zoom in">+</a><a class="leaflet-control-zoom-out" href="#" title="Zoom out" role="button" aria-label="Zoom out">−</a></div></div><div class="leaflet-top leaflet-right"></div><div class="leaflet-bottom leaflet-left"></div><div class="leaflet-bottom leaflet-right"><div class="leaflet-control-attribution leaflet-control"><a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> | Map data © <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a></div></div></div></div>

<br/>
<div id="mapsearch">
<div id="details">
	<div id="loading" style="display:none">
	<div class="lds-roller" style="display:inline;"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
	<p  style="display:inline;color:#88b378;margin-left:10vw;font-size:400%;">Loading Details</p>
</div>
</div>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
  <br/>
	<br/>
	<br/>
</div>
</div>
<br/>
<br/>
<br/>
<br/>
<br/>


<script>
let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
var places=[]
var categories=[]
var markergroup =[]
var selectedcategory="coffee"
var mymap
var radius=1000
var center=[-33.8966, 151.1525]
let selectedplaceid=sessionStorage.getItem('selectedplaceid')
let radi=sessionStorage.getItem('radius')
let cat=sessionStorage.getItem('category')
let cent=sessionStorage.getItem('center')

if(selectedplaceid){
	fetchDetails(selectedplaceid)
}
if(radi){
	radius=radi
}
if(cat){
	category=cat
}
if(cent){
	center=cent.split(",")
}
var circlegroup= L.featureGroup();
var setcirclegroup= L.featureGroup();
var centermarkergroup= L.featureGroup();
var addressstring='petersham sydney'
var options = {
  enableHighAccuracy: true,
  timeout: 5000,
  maximumAge: 0
};


function success(pos) {
  var crd = pos.coords;
	let cent=sessionStorage.getItem("center")

if(!cent){
	console.log('Your current position is:');
  console.log(`Latitude : ${crd.latitude}`);
  console.log(`Longitude: ${crd.longitude}`);
  console.log(`More or less ${crd.accuracy} meters.`);
	center=[crd.latitude,crd.longitude]
	sessionStorage.setItem('center',center)
}
	createMap()
	setRadius()
	getPlaces()
	getCategories()
}

function error(err) {
  console.warn(`ERROR(${err.code}): ${err.message}`);
}


var redIcon = new L.Icon({
  iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
  iconSize: [25, 41],
  iconAnchor: [12, 41],
  popupAnchor: [1, -34],
  shadowSize: [41, 41]
});

	navigator.geolocation.getCurrentPosition(success, error, options);

mymap.removeLayer(centermarkergroup);
centermarkergroup = L.layerGroup().addTo(mymap);
var marker = new L.marker(center,{icon: redIcon}).addTo(centermarkergroup);
console.log(center)
mymap.addLayer(centermarkergroup);

@if(isset($place))
let p={!! json_encode($place) !!};
console.log(p,"PLACE")
fetchDetails(p)
@endif


async function getCoordinatesFromAddress(){
	  await fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${addressstring}.json?proximity=ip&types=place%2Cpostcode%2Caddress&access_token=pk.eyJ1IjoianVsaWFuYnVsbCIsImEiOiJjbDI2bnk5c2YwZzhkM2pvOHdpeWdoNmxsIn0.URYz3r-yZA7V-J_qoSi_VQ`)
		.then(response => response.json())
		.then(response => center=[response['features'][0]['center'][1],response['features'][0]['center'][0]])
		.catch(err => {
			console.error(err)
		});
		console.log("CENTER",center)
		sessionStorage.setItem('center',center)

}

async function setAddress(){
	addressstring = document.getElementById("addressinput").value
	let adddisplay=document.getElementById("addressdisplay")
	adddisplay.textContent=addressstring
	mymap.removeLayer(centermarkergroup);
	centermarkergroup = L.layerGroup().addTo(mymap);
	await getCoordinatesFromAddress()
	var marker = new L.marker(center,{icon: redIcon}).addTo(centermarkergroup);
	mymap.addLayer(centermarkergroup);
	getPlaces()
	setRadius()
}

async function setRadius(){
	radius = document.getElementById("radiusinput").value;
	console.log("radius",radius)
	mymap.removeLayer(circlegroup);
	mymap.removeLayer(setcirclegroup);
	sessionStorage.setItem('radius',radius)
	setcirclegroup = L.layerGroup().addTo(mymap);
	let circle = L.circle(center,{radius: radius, color:'green',weight:0.5, opacity:1,fillColor: 'green',fillOpacity:0.3}).addTo(setcirclegroup);
	mymap.addLayer(setcirclegroup);
	getPlaces()
}

async function setCircle(){
	let rad = document.getElementById("radiusinput").value;
	let radiusdisplay=document.getElementById("radiusdisplay");
	radiusdisplay.textContent=`${rad} meter radius`
	console.log("rad",rad)
	mymap.removeLayer(circlegroup);
	circlegroup = L.layerGroup().addTo(mymap);
	let circle = L.circle(center,{radius: rad, color:'#ff9900',weight:0.5, opacity:1,fillColor: '#ff9900',fillOpacity:0.3}).addTo(circlegroup);
	mymap.addLayer(circlegroup);
}

async function createMap(){
mymap= L.map('defaultMapId').setView(center, 13);
				let urldefaultMapId = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
		L.tileLayer(urldefaultMapId, {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
				'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
}).addTo(mymap);
 markergroup = L.layerGroup().addTo(mymap);

 mymap.on('contextmenu', function(e){
	 event.preventDefault()
	 console.log(event.button)
	 if(event.button==2){
		 mymap.removeLayer(centermarkergroup);
		 centermarkergroup = L.layerGroup().addTo(mymap);
		 var marker = new L.marker(e.latlng,{icon: redIcon}).addTo(centermarkergroup);
		 center=[e.latlng['lat'],e.latlng['lng']]
		 sessionStorage.setItem('center',center)
		 console.log(center)
		 mymap.addLayer(centermarkergroup);
		 getPlaces()
		 setRadius()
	 }
});
}

//fetches places by category and within a distance range
async function getPlaces(){
const options = {
method: 'GET',
headers: {
	'X-RapidAPI-Host': 'nearby-places.p.rapidapi.com',
	'X-RapidAPI-Key': '24f2c04f41msh794ec7d5b9283dcp1ebdf7jsn01969526d5ac'
}
};
console.log(`https://nearby-places.p.rapidapi.com/nearby?lat=${center[0]}&lng=${center[1]}&type=${selectedcategory}&radius=${radius}`,"GETTING PLACES",radius)
await fetch(`https://nearby-places.p.rapidapi.com/nearby?lat=${center[0]}&lng=${center[1]}&type=${selectedcategory}&radius=${radius}`, options)
	.then(response => response.json())
	.then(response => places=response)
	.catch(err => {
		console.error(err)
		places=[]
	});
	places = places.filter(obj => {
  return !(obj.name === "Sydney");
});
places = places.filter(obj => {
return !(obj.name === "Marrickville");
});
	console.log("places",places)
	let bounds = [];

mymap.removeLayer(markergroup)
markergroup = L.layerGroup().addTo(mymap);

	for ( var i=0; i < places.length; ++i ) {
		L.marker([places[i].location.lat, places[i].location.lng],title=places[i].name).addTo(markergroup).bindPopup(`<p>${places[i].name}<br /><a href="/#details"><button onClick="setDetails('${places[i].name}')" key="${places[i].name}">See Details</button></a></p>`).openPopup();
		bounds.push([places[i].location.lat, places[i].location.lng])

	}
	mymap.fitBounds(bounds,{padding: [20,20]});
}

async function getCategories(){
const options = {
method: 'GET',
headers: {
	'X-RapidAPI-Host': 'nearby-places.p.rapidapi.com',
	'X-RapidAPI-Key': '24f2c04f41msh794ec7d5b9283dcp1ebdf7jsn01969526d5ac'
}
};

await fetch('https://nearby-places.p.rapidapi.com/types', options)
.then(response => response.json())
.then(response => categories=response)
.catch(err => console.error(err));
console.log(categories)
updateCategories()
}

function updateCategories(){
	let categoryoptions = document.getElementById('category');
	let select = document.createElement('select');
	select.onchange = function(event) {
		selectedcategory=event.target.value
		let categorydisplay = document.getElementById('categorydisplay');
		categorydisplay.textContent=selectedcategory
		select.value=selectedcategory
		sessionStorage.setItem('category',selectedcategory)

		updateCategories()
		getPlaces()
		console.log(selectedcategory);
}
let option = document.createElement('option');
select.appendChild(option);
	for (let category of categories){
		let option = document.createElement('option');
		option.innerText = category
		option.value = category
		select.appendChild(option);
	}
	categoryoptions.replaceChildren(select)
}



async function setDetails(name){
console.log(name)
for (let place of places){
	if (place.name==name){
await fetchDetails(place.place_id)
	}
}
}

async function fetchDetails(place){
	sessionStorage.setItem('selectedplaceid',place)
	let loading = document.getElementById('loading');
	loading.style.display="block"
	console.log(place,"place")
	let details = document.getElementById('details');
	let reviews=await fetch(`/getreviewsforaplace/${place}`)
	.then(response => response.json())
	.then(response => {return response})
	.catch(err => console.error(err));

			var reviewsdiv = document.createElement('div');
			for (let review of reviews){
				let reviewcontainer=document.createElement('div');
				reviewcontainer.style.border="1px solid #88b378"
				reviewcontainer.style.borderRadius="10px"
				reviewcontainer.style.padding="0.5vw"
				reviewcontainer.style.marginTop="1vw"
				reviewcontainer.style.width="90vw"

				let body = document.createElement('h3');
				body.style.marginLeft="2vw"
				body.textContent = review.body
				body.style.display="inline"
				let stars = document.createElement('div');
				stars.style.display="inline"
				stars.style.marginLeft="2vw"
				for (let x=1;x<=5;x++){
					let star = document.createElement('span');
					console.log(x,Number(review.stars))

					if (x<=Number(review.stars)){
							star.className="fa fa-star checked"
							console.log("checked")
					}else{
						star.className="fa fa-star"
						console.log("unchecked")
					}
					console.log(star)
					stars.appendChild(star)
				}
				let editbutton=document.createElement('a')
				editbutton.style.display="inline"
				editbutton.style.marginLeft="2vw"
				editbutton.href=`/reviews/${review.id}/edit`
				let editbuttonbutton=document.createElement('button')
				editbuttonbutton.textContent="Edit"
				editbutton.appendChild(editbuttonbutton)
				reviewcontainer.appendChild(body);
				reviewcontainer.appendChild(stars);
				let guest={!! json_encode(Auth::guest()) !!};
				console.log(guest,"guest")
				var userid
				if(!guest){
						@if(Auth::check())
						userid={!! json_encode(Auth::user()->id) !!};

								@endif
								console.log(userid,review.userid,"userids")
							if(userid == review.userid){
								console.log(editbutton)
								reviewcontainer.appendChild(editbutton)
							}}
							reviewsdiv.appendChild(reviewcontainer)
			}
	var deets = document.createElement('div');
	let name = document.createElement('h3');
	name.textContent = place.name
	deets.appendChild(name);

	const optionstwo = {
method: 'GET',
headers: {
'X-RapidAPI-Host': 'nearby-places.p.rapidapi.com',
'X-RapidAPI-Key': '24f2c04f41msh794ec7d5b9283dcp1ebdf7jsn01969526d5ac'
}
};

await fetch(`https://nearby-places.p.rapidapi.com/details?id=${place}`, optionstwo)
.then(response => response.json())
.then(response => {

	const requestOptions = {
	method: 'POST',
	headers: {
			"Content-Type": "application/json",
			"Accept": "application/json, text-plain, */*",
			"X-Requested-With": "XMLHttpRequest",
			"X-CSRF-TOKEN": token
			},
	credentials: "same-origin",
	body: JSON.stringify(response)

};
console.log(requestOptions)
	 fetch(`/createplace`,requestOptions)
	.then(response => response.json())
	.then(response => console.log(response))
	.catch(err=>console.log(err))

let name = document.createElement('h3');
name.textContent = response.name
deets.appendChild(name);
let phone = document.createElement('h5');
phone.textContent = response.phone
deets.appendChild(phone);
let address = document.createElement('h5');
address.textContent = response.address
deets.appendChild(address);
let website = document.createElement('h5');
website.textContent = response.website
deets.appendChild(website);
let link = document.createElement('a');
link.href = `/reviews/create/${place}`
let button = document.createElement('button');
button.textContent = "leave review"
link.appendChild(button)
deets.appendChild(link);
console.log(response)
details.replaceChildren(deets)
details.appendChild(reviewsdiv)
loading.style.display="none"

})
.catch(err => console.error(err));
}
</script>
@endsection
