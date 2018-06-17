

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://cdn.jsdelivr.net/npm/vue"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<script
	  src="https://code.jquery.com/jquery-3.3.1.min.js"
	  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	  crossorigin="anonymous"></script>

	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<!-- <script src='https://api.mapbox.com/mapbox-gl-js/v0.44.2/mapbox-gl.js'></script>
	<link href='https://api.mapbox.com/mapbox-gl-js/v0.44.2/mapbox-gl.css' rel='stylesheet' /> -->
</head>
<body>

	<div id="scraper" class="container">

		
		
		<form @submit="getSubUrls" method="post" >
			<div class="form-group">
				<label for="url">Main Url</label>
				<input type="text" id="url" v-model="main_url" class="form-control">
			</div>
			<div class="form-group">
				<input type="submit" value="submit" class="form-contrl">
			</div>
			

		</form>

		<ul class="list-group">
		  <li v-for="url in urls" class="list-group-item">
		    <a><p>${url}</p></a>

		    

		    <button @click= "getDetail(url)" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
		      see detail
		    </button>

		    
		    
		  </li>
		</ul>

		


		

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
		      </div>
		      <div class="modal-body">
		        <form @submit ="createHouse" method="post">
		          <div class="form-group">
		            <label for="title">Title</label>
		            <input type="text" class="form-control" id="title" v-model="detail.title">
		          </div>
		          <div class="form-group">
		            <label for="slug">Slug</label>
		            <input type="text" class="form-control" id="slug" v-model="detail.slug">
		          </div>
		          <div class="form-group">
		            <label for="address">Address</label>
		            <input type="text" class="form-control" id="address" v-model="detail.address">
		          </div>

		          <div class="form-group">

		            <label for="address">Description</label>
		          	<textarea class="form-control" id ='description' rows="4" v-model="detail.description"></textarea>
		          </div>

		          <div class="form-group">
		            <label for="image">Images</label>
		            <div v-for=" image in detail.image">
		            	<input type="text" class="form-control" id="image" v-model="image">
		        	</div>
		          </div>
		          <div class="form-control">
		            <input type="radio" id="basement" value="basement" v-model="detail.type">
		            <label for="basement">Basement</label>
		            <input type="radio" id="house" value="house" v-model="detail.type">
		            <label for="house">House</label>
		            
		          </div>

		          
		          <button type="submit" class="btn btn-default">Submit</button>
		        </form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary">Save changes</button>
		      </div>
		    </div>
		  </div>
		</div>


    </div>

	<!-- <div id='map' style='width: 400px; height: 300px;'></div>
	<script>
	mapboxgl.accessToken = 'pk.eyJ1Ijoic25laGFzaGlzIiwiYSI6ImNqaGp3YXBldzJqOHUzNm5nb3Uwdmx4cTYifQ.RpIrw_DONCYcxjycRYZalQ';
	var map = new mapboxgl.Map({
	container: 'map',
	style: 'mapbox://styles/mapbox/streets-v10'
	});
	</script> -->
	<script type="text/javascript">

		var scraper = new Vue({
		    el: '#scraper',
		    delimiters: ['${', '}'],

		    data: {

				main_url: '',
				urls: null,
				detail: {
					title : null,
					slug  : null,
					description: null,
					address: null,
					type: null
				}

		        
		    },

		    computed: {
		        
		    }, 

		    methods: {

		    	getSubUrls(e){
		    		e.preventDefault();
		    		

		    		axios.post('/scraper/main-url', {url: this.main_url})
		    		  .then(function (response) {
		    		    this.urls = response.data.data;
		    		  }.bind(this))
		    		  .catch(function (error) {
		    		    console.log(error);
		    		  });

		    	}, 

		    	getDetail(url){
		    		axios.get('/scraper/detail?link='+url)
		    		  .then(function (response) {
		    		    this.detail = response.data.data;
		    		    console.log(this.detail);
		    		  }.bind(this))
		    		  .catch(function (error) {
		    		    console.log(error);
		    		  });


		    	},

		    	createHouse(e){
		    		e.preventDefault();
		    		axios.post('/scraper/create-house', {house: this.detail})
		    		  .then(function (response) {
		    		  	console.log(response);
		    		  })
		    		  .catch(function (error) {
		    		    console.log(error);
		    		  });

		    	}

		    	

		        
		                
		    },

		    // mounted: function(){
		    //     this.drawMap();

		    // }
		});

		
	</script>
	

</body>
</html>

