@extends('backend.master')

@section('content')
<section class="content">
    <div class="row">
       	<div class="col-md-6">
          <!-- Horizontal Form -->
        	<div class="box box-info">
            	<div class="box-header with-border">
              		<h3 class="box-title">Addition Category</h3>
            	</div>
            <!-- /.box-header -->
            <!-- form start -->
            		@if ($errors->any())
						<div class="alert alert-danger">
        					<ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
        					</ul>
    					</div>
					@endif

            		@if (Session::has('flash_message'))
            			<div class="alert alert-success">
            				{{Session('flash_message')}}
            			</div>
            		@endif
		            <form class="form-horizontal" method="post" name="add_category" id="add_category" action="{{ route('category.store') }}">
		            	@csrf
		            	
		                
	                    <div class="form-group">
	                		<label for="inputEmail3" class="col-sm-2 control-label">Category Name</label>
		                  	<div class="col-sm-10">
		                    	<input type="text" class="form-control" id="name" name="category_name" placeholder="Please enter Category name">
		                  	</div>
	                	</div>
		                	
		                	
		                	
						    

						    

						    
						{{-- </div>
				    
		                </div> --}}
		              <!-- /.box-body -->
			            <div class="box-footer">
			                <button type="submit" value="add" class="btn btn-info pull-right">Add</button>
			            </div>
		              <!-- /.box-footer -->
		            </form>
        	</div>
	    </div>
    </div>
</section>
@endsection