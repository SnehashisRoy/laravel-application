var map_view = new Vue({
		    el: '#map_view',
		    delimiters: ['${', '}'],

		    data: {
		    	map: null,
		    	geoJson: geoJsonFromBlade, 
		    	filters: {},
		    	geoJsonlayer: null,
		    	openModal: false,
		    	listing: null,

				

		        
		    },

		    computed: {
		        
		    }, 

		    methods: {

		    	drawMap(){

		    		var mymap = L.map('mapid').setView([43.69494, -79.293783], 12);

		    		L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
		    		    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		    		    maxZoom: 24,
		    		    id: 'mapbox.streets',
		    		    accessToken: 'pk.eyJ1Ijoic25laGFzaGlzIiwiYSI6ImNqaG84ZW9sYzFwdXgzZHVpNmEyODA3azMifQ.yKvFkhM7KLjF6VMDd1iomQ'
		    		}).addTo(mymap);

		    		this.map = mymap;
		    		

		    	},

		    	addMarker(){


		    		 function onEachFeature(feature, layer) {
		    		     // does this feature have a property named popupContent?
		    		     if (feature.properties && feature.properties.popupContent) {
		    		         layer
		    		         .on('click', function(){ 

		    		         	// to display after modal after filtering
		    		         	if(this instanceof Vue){
		    		         		
		    		         		this.openModal = true;
		    		         	
		    		         		this.listing = feature.properties;

		    		         		return;

		    		         	};

		    		         	this.map_view.openModal = true;
		    		         	
		    		         	this.map_view.listing = feature.properties;


		    		         }.bind(map_view));
		    		     }
		    		 }

		    		 var markerOptions = {
		    		     radius: 12,
		    		     fillColor: "green",
		    		     color: "#fff",
		    		     weight: 3,
		    		     opacity: 1,
		    		     fillOpacity: 0.8
		    		 };
		    		 this.geoJsonlayer = L.geoJSON(this.geoJson, {
		    		     pointToLayer: function (feature, latlng) {
		    		         return L.circleMarker(latlng, markerOptions);
		    		     }, 
		    		     onEachFeature: onEachFeature,
		    		     // style: function(feature){
		    		     // 	switch (feature.properties.type) {
		    		     // 	            case 'basement': return {fillColor: "#ff0000"};
		    		     // 	            case 'house':   return { fillColor: "#0000ff"};
		    		     // 	        }

		    		     // }
		    		 }).addTo(this.map);


		    	},

		    	filter(){
		    		console.log(this.filters);


		    		axios.post('/filter', {filters: this.filters})
		    		  .then(function (response) {

		    		  	this.map.removeLayer(this.geoJsonlayer);
		    		  	this.geoJson = response.data.geoJson;
		    		  	console.log(this.geoJson);

		    		  	this.addMarker();
		    		  }.bind(this))
		    		  .catch(function (error) {
		    		    console.log(error);
		    		  });

		    	},
		    	closeModal(){
		    		this.openModal = false;
		    	}

		        
		                
		    },

		    mounted: function(){
		        this.drawMap();
		        this.addMarker();

		    }
		 });