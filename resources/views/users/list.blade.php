<!DOCTYPE html>
<html>
	<head>
	    <title>Laravel 8|7 Datatables Tutorial</title>
	    <meta name="_token" content="{{ csrf_token() }}">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
	    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
	    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

	</head>
	<body>
	    
	<!-- <div class="container mt-5"> -->
	<div>
	    <h2 class="mb-4">Laravel 7|8 Yajra Datatables Example</h2>
	    <div class='table-responsive'>
			@csrf
		    <table class="table table-bordered table-striped nowrap yajra-datatable" id="mainTable">
		        <thead>
		            <tr>
		                <th>Username <i class="fas fa-pencil-alt"></i></i></th>
		                <th>Password</th>
		                <th>Storecode</th>
		                <th>First name</th>
		                <th>Last name</th>
		                <th>M.I.</th>
		                <th>Jobtitlecode</th>
		                <th>Sex</th>
		                <th>Email</th>
		                <th>Status</th>
		            </tr>
		        </thead>
		        <tbody>
	<!-- 	        	<tr>
		        		<td>a</td>
		        		<td>a</td>
		        		<td>a</td>
		        		<td>a</td>
		        		<td>a</td>
		        		<td>a</td>
		        		<td>a</td>
		        		<td>a</td>
		        		<td>a</td>
		        		<td>a</td>
		        	</tr>
		        </tbody> -->
		    </table>
	    </div>
	</div>
	   
	</body>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
	<script src="{{ asset('css/jquery-tabledit/jquery.tabledit.min.js') }}"></script>

	<script type="text/javascript">
	  $(function () {



		  $.ajaxSetup({
		  	headers:{
		  		'X-CSRF-Token' : $("input[name=_token]").val()
		  	}
		  });



	    var table = $('#mainTable').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax: "{{ Route('users.list.json') }}",
	        columns:
	        	[
	            	{data: 'username'},
	            	{data: 'password'},
	            	{data: 'storecode'},
	            	{data: 'firstname'},
	            	{data: 'lastname'},
	            	{data: 'mi'},
	            	{data: 'jobtitlecode'},
	            	{data: 'sex'},
	            	{data: 'useremail'},
	            	{data: 'status'},
				],

			"drawCallback": function(settings) {
	   			 

				  $('#mainTable').Tabledit({
				  	url: '{{ route("users.tabledit.action") }}',
				  	dataType: "json",
				  	columns: {
				  		identifier: [0,'username'],
				  		editable: [
				  					[1, 'password'],
				  					[2, 'storecode'],
				  					[3, 'firstname'],
				  					[4, 'lastname'],
				  					[5, 'mi'],
				  					[6, 'jobtitlecode'],
				  					[7, 'sex', '{"1":"M", "2":"F"}'],
				  					[8, 'useremail'],
				  					[9, 'status', '{"1":"ACTIVE", "2":"REG_PENDING", "3":"DISABLED"}'],
				  				  ]
				  	},
				  	restoreButton: false,
				  	onSuccess: function(data, textStatus, jqXHR)
				  	{
				  		if(data.action == 'delete')
				  		{
				  			$('#'+data.id).remove();
				  		}
				  	}
				  });


	 		 }
	    });






	    
	  });

	</script>





</html>