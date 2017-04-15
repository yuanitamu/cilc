//-------------------------------------------------
// global count property
//-------------------------------------------------
  var mainArray=[];
  var storeNegara=[];


//-------------------------------------------------
// location property
//-------------------------------------------------
var myLocations;
var dari, tujuan;
var dariMarker, tujuanMarker;
var angkutanWindow;
var map, mapcenter;
var directionsService ;
var directionsDisplay;
var geocoder;
var touchMode = false;
var touchType = 1; //1 = dari, 2 = tujuan
var lokasiIcons;

//-------------------------------------------------
// Calculation property
//-------------------------------------------------
// page  field
if (storeNegara[0] != null)
{
var jarak=0;
var jmlOrg=1;
var makan= 3*storeNegara[0].makan;
var bobotPlace= storeNegara[0].apartment;
var bobotTrans= storeNegara[0].transPribadi;
var others=0;

var totalTrans;
var slisihHarga= 0; // in vilage
var airMinum= storeNegara[0].airminum;
var airBersih = 0; // by self
var laundri=0; // by self
var gas= 0.75* storeNegara[0].gas; // sometimes
var listrik = storeNegara[0].listrik;
}

//-------------------------------------------------
// totalValue property
//-------------------------------------------------
var valTotalTrans;
var valTotalMakan;
var valTotalAirMinum;
var valTotalAirBersih;
var valTotalLaundri;
var valTotalGas;
var valTotalListrik;
var valTotalPlace;
var valTotalOther;
var valTotalJoin;
//ambil data negara saat load
 $(document).on('pageinit','#pageone',function(){
 	  console.log( "document loaded" );
    ambilJson();
    
  });
//ambil data negara saat load
 $(document).on('pageshow','#pageone',function(){
    console.log( "document loaded show" );
    ambilJson();
    
  });
//ambil data lokasi saat ini
  $(document).on('pageinit','#pagetwo',function(){
     getGambar();
     initialize();
  	 getLocation();
  });

// tampil peta untuk map page
   $(document).on("pageshow", "#pagemap", function () {
    initializeMapsPage();
  });

 // inisialisasi pertama page peta  
  $(document).on("pageinit", "#pagemap", function () {
      loadData();
      statusGPS();
  });

// inisialisasi pertama page field 
  $(document).on("pageinit", "#pagefield", function () {
      simpanFieldAll();
  });

// inisialisasi pertama page hasil 
  $(document).on("pageinit", "#pagehasil", function () {
      calcAll();
  });

  // inisialisasi pertama page info 
  $(document).on("pageinit", "#pageinfo", function () {
      console.log( "document info loaded show" );
      getGambarInfo();
  });

  // tampil peta untuk map page
   $(document).on("pageshow", "#pagemapinfo", function () {
    initializeMapsPageInfo();
    setsDataInfo();
  });

  // tampil peta untuk map contact
   $(document).on("pageshow", "#pagecontact", function () {
    initializeMapsPageContact();
    
  });

 
 

// direct data to spesific negara
function ambilNegara(negaraId)
{
  var store=[];
    $.each( mainArray, function( key, val ) {
     if (val.idNegara==negaraId)
     store.push(val);
    });
  storeNegara=store;
  console.log(storeNegara);
 
}

//ambil data json 
function ambilJson()
{
  var store=[];
	var url= "http://localhost/colic/index.php/admin/jsonListNegara"
	$.getJSON( url, function( data ) {
	  $.each( data, function( key, val ) {
	    store.push(val);
	  });
	});
  mainArray=store;
  //console.log( mainArray);

}



//list gambar dari json untuk main page
function getGambar(){
    var contents='<li data-role="divider">Destination Country</li>';
    console.log( mainArray);
   $.each( mainArray, function( key, val ) {
        //buat request json dari ID
        contents+='<li data-theme="d">'+'<a href="#pagefield " data-transition="slide"  onclick=ambilNegara('+val.idNegara+')>'+'<img src="'+ "http://colic.allalla.com/upload/"+val.bendera+'" class="ui-li-icon" >'+val.nama+'</a>'+'</li>'
         //console.log( "gambar get" );
      });
     $("#imgs").append(contents).listview('refresh');  

     //console.log( "gambar added" );
}

//list gambar dari json untuk info page
function getGambarInfo(){
    var contents='<li data-role="divider">Select Country</li>';
    console.log( mainArray);
   $.each( mainArray, function( key, val ) {
        //buat request json dari ID
        contents+='<li data-theme="d">'+'<a href="#pagemapinfo " data-transition="slide"  onclick=ambilNegara('+val.idNegara+')>'+'<img src="'+ "http://colic.allalla.com/upload/"+val.bendera+'" class="ui-li-icon" >'+val.nama+'</a>'+'</li>'
         //console.log( "gambar get" );
      });
     $("#imgsInfo").append(contents).listview('refresh');  

     //console.log( "gambar added" );
}

//inisialisasi geocoder
function initialize() {
    geocoder = new google.maps.Geocoder();
    // slides 
   
}

//inisialisasi geocoder
function initializeMapsPage() {
    geocoder = new google.maps.Geocoder();

    initMap();
    google.maps.event.addListener(map, "click", getLocationByClick);
    //init marker lokasi
    markerInit();
    google.maps.event.trigger(map, 'resize');
   
}

//inisialisasi geocoder
function initializeMapsPageInfo() {
    geocoder = new google.maps.Geocoder();
    console.log(storeNegara);
    initMapInfo();
    //init marker lokasi
 
    google.maps.event.trigger(map, 'resize');
   
}

//inisialisasi geocoder
function initializeMapsPageContact() {
    geocoder = new google.maps.Geocoder();
    console.log(storeNegara);
    initMapContact();
    //init marker lokasi
 
    google.maps.event.trigger(map, 'resize');
   
}
//ambil lokasi saat ini
function getLocation() {
    navigator.geolocation.getCurrentPosition(function (position) { //Jika sukses

        //Koordinat GPS
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        var latLng = new google.maps.LatLng(latitude, longitude);

        geocoder.geocode({ 'latLng': latLng }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    //komponen nama negara
                    var country;
                    for (i=0;i<results[0].address_components.length;i++){
                        for (j=0;j<results[0].address_components[i].types.length;j++){
                           if(results[0].address_components[i].types[j]=="country")
                              country = results[0].address_components[i].long_name
                        }
                    }
                   str="<h2>"+country+"</h2>";
                   myLocations=country;   
                   $('#countryFrom').append(str); 
                   $('#curnegara').listview('refresh'); 
                }
            } else {
                alert("Geocoder failed due to: " + status);
            }
        
        });
    }, function (error) { //Jika gagal
        if (error.code == 1) {
            alert('Lokasi di disable, enable di pengaturan');
        } else {
            alert('code: ' + error.code + '\n' +
                  'pesan: ' + error.message + '\n');
        }
    });
}
// set data page info
function setsDataInfo()
{
   $('label#namaz').text(': '+storeNegara[0].nama);
   $('label#ibukotaz').text(': '+storeNegara[0].ibukota);
   $('label#luasz').text(': '+storeNegara[0].luas+' km2');
   $('label#kepadatanz').text(': '+storeNegara[0].kepadatan+' /km2');
   $('label#uangz').text(': '+storeNegara[0].matauang);
   $('label#bahasaz').text(': '+storeNegara[0].bahasa);
  // str=': '+ '<img src="http://cilc.allalla.com/upload/'+storeNegara[0].bendera+'" width=200px; height=150px;>';
   $('img#benderaz').attr("src",'http://colic.allalla.com/upload/'+storeNegara[0].bendera);
  // $('#benderaz').append(str);
}

//Inisialisasi Peta 
function initMap() {
    //Atur center peta ke koordinat negara target
    directionsDisplay = new google.maps.DirectionsRenderer();
    mapCenter = new google.maps.LatLng(storeNegara[0].lat, storeNegara[0].long);
    geocoder = new google.maps.Geocoder();
    directionsService = new google.maps.DirectionsService();
    //Opsi peta
    var myOptions = {
        zoom: 10,
        minZoom: 0,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: mapCenter
    }

    //Buat object peta baru
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    directionsDisplay.setMap(map);
}

//Inisialisasi Peta 
function initMapInfo() {
    //Atur center peta ke koordinat negara target
    directionsDisplay = new google.maps.DirectionsRenderer();
    mapCenter = new google.maps.LatLng(storeNegara[0].lat, storeNegara[0].long);
    geocoder = new google.maps.Geocoder();
   
    //Opsi peta
    var myOptions = {
        zoom: 3,
        minZoom: 0,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: mapCenter
    }

    //Buat object peta baru
    map = new google.maps.Map(document.getElementById("map_canvasinfo"), myOptions);
  
}

// inisialisasi peta lokasi kantor
function initMapContact() {
    //Atur center peta ke koordinat negara target
    directionsDisplay = new google.maps.DirectionsRenderer();
    mapCenter = new google.maps.LatLng('-7.95601', '112.61594');
    geocoder = new google.maps.Geocoder();
   
    //Opsi peta
    var myOptions = {
        zoom: 13,
        minZoom: 0,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: mapCenter
    }

    //Buat object peta baru
    map = new google.maps.Map(document.getElementById("map_canvascontact"), myOptions);
  
}
/////////////////////////////
function getLocation2() {
    navigator.geolocation.getCurrentPosition(function (position) { //Jika sukses

        //Koordinat GPS
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        var latLng = new google.maps.LatLng(latitude, longitude);

        geocoder.geocode({ 'latLng': latLng }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    //komponen nama jalan
                    var jalan = results[0].address_components[0].short_name;

                    //update instance lokasi dari
                    dari = results[0];

                    //update marker
                    updateMarker(dariMarker, latLng);

                    //update text
                    $('p#dari_text').text(jalan);

                    //enable button
                    enableBersihkanButton();
                }
            } else {
                alert("Geocoder failed due to: " + status);
            }

            //close panel
            $("#mypanel").panel("close");
        
        });
    }, function (error) { //Jika gagal
        if (error.code == 1) {
            alert('Lokasi di disable, enable di pengaturan');
        } else {
            alert('code: ' + error.code + '\n' +
                  'pesan: ' + error.message + '\n');
        }
    });
}


function updateMarker(targetMarker, location) {
    //set posisi marker
    targetMarker.position = location;
    targetMarker.setMap(map);

    //tampilkan marker
    targetMarker.setVisible(true);
    map.setZoom(10);
    map.setCent
  }

function markerInit() {
    dariMarker = buatMarker(mapCenter, lokasiIcons.start, 'Lokasi Awal');
    dariMarker.setVisible(false);

    tujuanMarker = buatMarker(mapCenter, lokasiIcons.end, 'Lokasi Tujuan');
    tujuanMarker.setVisible(false);
}


//Fungsi untuk set mode touch
function makeTouch(typeInput) {
    touchMode = true;
    switch (typeInput) {
        case 'dari': touchType = 1; break;
        case 'tujuan': touchType = 2; break;
    }
    closePanel();
}

// untuk membuat marker di peta
function buatMarker(position, icon, title) {
    return new google.maps.Marker({
        position: position,
        map: map,
        icon: icon,
        title: title
    });
}

//Load data, icons dll
function loadData() {


    //Ikon lokasi awal/akhir
    lokasiIcons = {
        start: new google.maps.MarkerImage(
         // URL
         'img/maps/m1.png',
         // (width,height)
         new google.maps.Size(46, 45),
         // The origin point (x,y)
         new google.maps.Point(0, 0),
         // The anchor point (x,y)
         new google.maps.Point(0, 0)
        ),
        end: new google.maps.MarkerImage(
         // URL
         'img/maps/m3.png',
         // (width,height)
         new google.maps.Size(46, 45),
         // The origin point (x,y)
         new google.maps.Point(0, 0),
         // The anchor point (x,y)
         new google.maps.Point(0, 0)
        )
    };
}

function statusGPS(){
  if (myLocations==storeNegara[0].nama)
  {enableGPSButton();} else disableGPSButton();
}

var getLocationByClick = function (event) {
    //kalau mode halaman, sedang dalam terima klik koordinat
    if (touchMode) {
        //lakukan geocoding
        geocoder.geocode({ 'latLng': event.latLng }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    //dapatkan komponen jalan
                    var jalan = results[0].address_components[0].short_name;
                    switch (touchType) {
                        case 1: //lokasi dari
                            dari = results[0];
                            updateMarker(dariMarker, event.latLng);
                            $('p#dari_text').text(jalan);
                            break;
                        case 2: //lokasi tujuan
                            tujuan = results[0];
                            updateMarker(tujuanMarker, event.latLng);
                            $('p#tujuan_text').text(jalan);
                            break;
                    }
                }
                touchMode = false;
            } else {
                alert("Geocoder failed due to: " + status);
            }
        });
        enableBersihkanButton();
    }
};

function BersihkanMarker() {

    //Update lokasi text info
    $('p#tujuan_text').text('nothing place selected');
    $('p#dari_text').text('nothing place selected');

    //Set instance lokasi null
    dari = null;
    tujuan = null;

    //hide lokasi marker
    tujuanMarker.setVisible(false);
    dariMarker.setVisible(false);


    //hide direction renderer service
    directionsDisplay.setMap(null);

    //disable 'bersihkan' button
    disableBersihkanButton();
    disableSubmitButton();
}

function getDistance() {
    //Cek instance lokasi dulu
    if (!dari) {
        alert('your current place not set');
    } else if (!tujuan) {
        alert('daily destination not set');
    } else {

        //parameter request direction
        var request = {
            origin: dari.geometry.location,
            destination: tujuan.geometry.location,
            travelMode: google.maps.DirectionsTravelMode.DRIVING
        };

        //Tampilkan animasi loading 
        $.mobile.loading('show', {
            text: 'calculating',
            textVisible: true
        });

        //Lakukan pencarian rute
        directionsService.route(request, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {

                //Tampilkan rute di peta
                directionsDisplay.setDirections(response);

                //console.log(match);
                $.mobile.loading('hide');
                $("#mypanel").panel("close");
            }
        });

        //console.log(request.origin.nb);
        //set jarak 
        jarak=hitungJarak(request.origin.nb, request.origin.ob,request.destination.nb, request.destination.ob ); // in km
        console.log('set jarak '+jarak);

        enableSubmitButton();
    }
}

function getTotalDistance() {
  var totalDistance = 0;
  var legs = directionsService.routes[0].legs;
    for(var i=0; i<legs.length; ++i) {
        totalDistance += legs[i].distance.value;
        
    }
  return totalDistance;
}


function hitungJarak(lat1, lon1, lat2, lon2) {
    //Radius of the earth in:  1.609344 miles,  6371 km  | var R = (6371 / 1.609344);
    var R = 3958.7558657440545; // Radius of earth in Miles 
    var dLat = toRad(lat2-lat1);
    var dLon = toRad(lon2-lon1); 
    var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
            Math.cos(toRad(lat1)) * Math.cos(toRad(lat2)) * 
            Math.sin(dLon/2) * Math.sin(dLon/2); 
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
    var d = R * c;
    return d;
}

function toRad(Value) {
    /** Converts numeric degrees to radians */
    return Value * Math.PI / 180;
}
///////////////////////////// helper attribute
function enableBersihkanButton() {
    $('#bersihkanButton').removeClass('ui-disabled');
}

function disableBersihkanButton() {
    $('#bersihkanButton').addClass('ui-disabled');
}

function closePanel() {
    $("#mypanel").panel("close");
}

function showPanel() {
    $("#mypanel").panel("show");
}

function enableGPSButton() {
    $('#GPSButton').removeClass('ui-disabled');
}
function disableGPSButton() {
    $('#GPSButton').addClass('ui-disabled');
}
function enableSubmitButton() {
    $('#submitButton').removeClass('ui-disabled');
}
function disableSubmitButton() {
    $('#submitButton').addClass('ui-disabled');
}

//disable character input bro
$('#inputangka').on('keypress', function(ev) {
    var keyCode = window.event ? ev.keyCode : ev.which;
    //codes for 0-9
    if (keyCode < 48 || keyCode > 57) {
        //codes for backspace, delete, enter
        if (keyCode != 0 && keyCode != 8 && keyCode != 13 && !ev.ctrlKey) {
            ev.preventDefault();
        }
    }
});

function setInput(ids){
  var nilais = document.getElementById(ids);
  others=nilais.value ;
  console.log('others '+others)
}
/////////////////////////////////////////////// go calculating

function tentukanBobotPlace(jenis)
{
  var bobot=0;
  if (jenis=='hotel'){bobot= storeNegara[0].hotel;}
  if (jenis=='apartment'){bobot=storeNegara[0].apartment;}
  if (jenis=='home'){bobot=storeNegara[0].home;}
  return bobot;
}

function tentukanBobotTrans(jenis)
{
  var bobot=0;
  if (jenis=='train'){bobot=storeNegara[0].transKereta;}
  if (jenis=='private'){bobot=storeNegara[0].transPribadi;}
  if (jenis=='taxi'){bobot=storeNegara[0].transTaxi;}
  if (jenis=='bus'){bobot=storeNegara[0].transBus;}
  if (jenis=='foot'){bobot=0;}
  return bobot;
}

function simpanFieldMakan()
{
    makan= (document.getElementById("valMakan").value)*storeNegara[0].makan;
    console.log('makan set' + makan);
}
function simpanFieldOrang()
{
    jmlOrg= document.getElementById("valOrang").value;
    console.log('orang set' + jmlOrg);
}
function simpanFieldPlace()
{
    var jenis="";
    jenis= document.getElementById("valPlace").value;
    bobotPlace= tentukanBobotPlace(jenis);
    console.log('place set' + bobotPlace);
}
function simpanFieldTrans()
{
    var jenis="";
    jenis= document.getElementById("valTransport").value;
    bobotTrans= tentukanBobotTrans(jenis);
    console.log('trans set' + bobotTrans);
}

function simpanFieldAll(){
  simpanFieldMakan();
  simpanFieldOrang();
  simpanFieldPlace();
  simpanFieldTrans();
  setInput("inputangka");
}

function totalTransCost()
{
  totalTrans= jarak* bobotTrans;
  console.log('totalTrans ' + totalTrans +' '+bobotTrans);
}

function findRadioCek(nama)
{
   var radios = document.getElementsByName(nama);
    var found = 1;
    for (var i = 0; i < radios.length; i++) {       
        if (radios[i].checked) {
            return radios[i].value;
            found = 0;
            break;
        }
    }
    if(found == 1)
    {
    alert("Please Select Radio");
    }    
}

function saveAll()
{
  statusTown= findRadioCek("town_choice");
  if (statusTown=='town') slisihHarga= 20; else slisihHarga=0;
  statusWater= findRadioCek("water_choice");
  if (statusWater=='yes') {airBersih= storeNegara[0].air; } else {airBersih=0; listrik=1.5*storeNegara[0].listrik;}
   statusLaundry= findRadioCek("laundry_choice");
  if (statusLaundry=='yes') {laundri= storeNegara[0].laundry; } else {laundri= 0;}
   statusGas= findRadioCek("gas_choice");
  if (statusGas=='often') {gas= storeNegara[0].gas*1.5; }
  if (statusGas=='sometime') {gas= storeNegara[0].gas*1; }
  if (statusGas=='seldom') {gas= storeNegara[0].gas*0.5; }

  listrik=storeNegara[0].listrik;
  airMinum=storeNegara[0].airminum;

  console.log('slisihHarga ' + slisihHarga );
  console.log('airBersih ' + airBersih );
  console.log('laundry ' + laundri );
  console.log('gas ' + gas );
}

/////// total set value //////////

function calcMakan(){
  valTotalMakan= 30 * jmlOrg * makan;
   $('span#makanRes').text('$ '+valTotalMakan);
}

function calcPlace(){
  valTotalPlace= 30 * jmlOrg * bobotPlace;
   $('span#placeRes').text('$ '+valTotalPlace);
}

function calcTrans(){
  valTotalTrans= bobotTrans * 26;
   $('span#transRes').text('$ '+valTotalTrans);
}

function calcAirMinum(){
  valTotalAirMinum= (30/5) * jmlOrg * airMinum;
   $('span#airmRes').text('$ '+valTotalAirMinum);
}

function calcAirBersih(){
  valTotalAirBersih= 30 * jmlOrg * airBersih;
   $('span#airbRes').text('$ '+valTotalAirBersih);
}

function calcLaundri(){
  valTotalLaundri= 4 * jmlOrg * laundri;
   $('span#laundryRes').text('$ '+valTotalLaundri);
}

function calcGas(){
  valTotalGas= 2 * jmlOrg * gas;
   $('span#gasRes').text('$ '+valTotalGas);
}

function calcListrik(){
  valTotalListrik= 30 * listrik;
   $('span#listrikRes').text('$ '+valTotalListrik);
}

function calcOther(){
  valTotalOther= others;
   $('span#otherRes').text('$ '+valTotalOther);
}

function calcAll()
{
  calcOther();
  calcListrik();
  calcGas();
  calcLaundri();
  calcTrans();
  calcPlace();
  calcAirBersih();
  calcAirMinum();
  calcMakan();

  //hitung semua variabel
  valTotalJoin=  (parseInt(valTotalMakan)+ parseInt(valTotalOther)+parseInt(valTotalListrik)+ parseInt(valTotalGas)+parseInt(valTotalLaundri)+parseInt(valTotalAirBersih)+parseInt(valTotalAirMinum)+parseInt(valTotalPlace)+parseInt(valTotalTrans));
   $('h1#totalRes').text('$ '+valTotalJoin);
}

// untuk merefresh page agar kembali 0
function refreshPage(url){
  document.location.href = url;
}