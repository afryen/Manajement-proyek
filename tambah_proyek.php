<link rel="stylesheet" href="assets/css/style.css">


<link 
rel="stylesheet" 
href="https://unpkg.com/leaflet/dist/leaflet.css"
/>





<div class="content-box">



<h1 class="page-title">

Tambah Proyek

</h1>






<form 

action="proses/simpan_proyek.php" 

method="POST" 

class="project-form"

onsubmit="return cekLokasi();"

>








<div class="form-grid">







<div class="form-group">

<label>
Nama Proyek
</label>


<input 
type="text"
name="nama_proyek"
required>


</div>









<div class="form-group">

<label>
Lokasi
</label>


<input 
type="text"
name="lokasi"
required>


</div>









<div class="form-group">

<label>
Client
</label>


<input 
type="text"
name="client"
required>


</div>









<div class="form-group">

<label>
Tanggal Mulai
</label>


<input 
type="date"
name="tanggal_mulai"
required>


</div>









<div class="form-group">

<label>
Tanggal Selesai
</label>


<input 
type="date"
name="tanggal_selesai"
required>


</div>









<div class="form-group">

<label>
Anggaran
</label>


<input 
type="number"
name="anggaran"
required>


</div>









<div class="form-group">

<label>
Status
</label>


<select name="status">


<option value="Perencanaan">

Perencanaan

</option>



<option value="Berjalan">

Berjalan

</option>



<option value="Selesai">

Selesai

</option>


</select>


</div>









<div class="form-group">

<label>
Progress (%)
</label>


<input 

type="number"

name="progress"

min="0"

max="100"

value="0">


</div>







</div>









<!-- ==========================
     MAP LOKASI PROYEK
========================== -->


<div class="map-container">


<label>

Pilih Lokasi Proyek Pada Peta

</label>





<div id="map"></div>





<button 

type="button"

id="resetMap"

class="btn-reset">

Reset Lokasi

</button>



</div>









<!-- ==========================
     KOORDINAT
========================== -->



<div class="form-grid">





<div class="form-group">


<label>

Latitude

</label>


<input 

type="text"

name="latitude"

id="latitude"

readonly>


</div>









<div class="form-group">


<label>

Longitude

</label>


<input 

type="text"

name="longitude"

id="longitude"

readonly>


</div>






</div>









<button 

type="submit" 

class="btn-primary">


Simpan Proyek


</button>







</form>






</div>









<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>







<script>


document.addEventListener(

"DOMContentLoaded",

function(){



let mapElement = 
document.getElementById("map");





if(mapElement){





let map = L.map("map")

.setView(

[
0.5071,
101.4478
],

12

);







L.tileLayer(

'https://tile.openstreetmap.org/{z}/{x}/{y}.png',

{

maxZoom:19,

attribution:'© OpenStreetMap'

}

)

.addTo(map);







let marker = null;







map.on(

"click",

function(e){



let lat = 
e.latlng.lat;



let lng = 
e.latlng.lng;







if(marker){


map.removeLayer(marker);


}






marker = L.marker(

[

lat,

lng

]

)

.addTo(map)

.bindPopup(
"Lokasi Proyek"
)

.openPopup();









document.getElementById(
"latitude"
)

.value = 

lat.toFixed(8);








document.getElementById(
"longitude"
)

.value = 

lng.toFixed(8);




}

);









document.getElementById(
"resetMap"
)

.onclick=function(){





if(marker){


map.removeLayer(marker);


}



marker=null;




document.getElementById(
"latitude"
)

.value="";





document.getElementById(
"longitude"
)

.value="";





map.setView(

[
0.5071,
101.4478
],

12

);




};






}



});









// ==========================
// CEK LOKASI SEBELUM SIMPAN
// ==========================


function cekLokasi(){



let lat = 
document.getElementById(
"latitude"
).value;




let lng = 
document.getElementById(
"longitude"
).value;






if(lat=="" || lng==""){



alert(

"Silahkan pilih lokasi proyek pada peta terlebih dahulu"

);



return false;



}



return true;



}



</script>