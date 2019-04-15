@extends('settings.index')
@section('settings')	
<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
    <a class="navbar-brand" href="">Papers</a>
    	@include('partials._headerNav')
    	<a data-toggle="modal" data-target="#createPaper" class="btn btn-link text-default text-white" data-toggle="tooltip" data-placement="left" title="Add Partner">
            <span class="btn-inner--icon"></span>
            <span class="btn-inner--text">
            	<i class="fa fa-paperclip"></i>
            	Add Paper
            </span>
      		</a>
        </li>
      </ul>
    </div>
</nav> 

<div class="card shadow border-0" id="example2" style="display:none"> <!-- start of card div -->
	<div class="card-body">  
		<table id="example" class="table-striped">
			<thead>
				<tr>
					<th>No.</th>
					<th>Papers</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach( $papers as $paper )
					<tr>
						<td>{{ $count ++ .'.' }}</td>
						<td>{{ $paper->name }}</td>
						<td>

							<a data-toggle="modal" data-target="#editPaper{{ $paper->id }}" class="btn btn-link text-info" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
							<a data-toggle="modal" data-target="#deletePaper{{ $paper->id }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Delete"><i class="fa fa-trash fa-2x"></i></a>
						</td>
					</tr>

					<div class="modal fade" id="editPaper{{ $paper->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
		              	<div class="modal-dialog modal-dialog-centered" role="document">
			                <div class="modal-content">
			                  	<div class="modal-header bg-primary">
				                    <h5 class="modal-title text-white">EDIT PAPER</h5>
				                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                      <span aria-hidden="true" class="text-white">×</span>
				                    </button>
			                  	</div>
			                  	<div class="modal-body">
			                        {!! Form::model($paper, ['route' => ['papers.update', $paper->id], 'method' => 'PUT']) !!}	
					    			{{ csrf_field() }}  
					                	<div class="row">
					                		<div class="col s12">
					    	            		<div class="input-field col s12">
					    	            			{{ Form::label('name','PAPER') }}
							            			{{ Form::text('name',null,['class'=>'form-control','id'=>'name','required' => 'required']) }} 
					    					    </div>
					    	            	</div>
					    	            </div>	    
			                  	</div>
			                  		@include('partials._footerEditModal')
			                  		{!! Form::close() !!}
			                </div>
		             	</div>
		            	</div>
		            </div>

	            	<!--modal -->
					<div class="modal fade" id="deletePaper{{ $paper->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
		              	<div class="modal-dialog modal-dialog-centered" role="document">
		                	<div class="modal-content">
		                  		<div class="modal-header bg-warning">
				                    <h5 class="modal-title text-white">Please Confirm!</h5>
				                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                      <span aria-hidden="true" class="text-white">×</span>
				                    </button>
		                  		</div>
				                <div class="modal-body">
			                        {!! Form::model($paper, ['route' => ['papers.destroy', $paper->id], 'method' => 'DELETE']) !!}	
					    			{{ csrf_field() }}  
					    			<h5>Would you like to Delete this record?</h5>
				                </div>
								<div class="modal-footer">
									{{ Form::button('Save', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
									{{ Form::button('Close', ['type' => 'submit', 'class' => 'btn btn-secondary' , 'data-dismiss' => 'modal'] )  }}
			                    </div>
				                  	</form>
				                </div>
		              		</div>
		            	</div>
		           	</div>
		           	<!--modal -->

				@endforeach
			</tbody>
		</table>
	</div>
</div>	

<div class="modal fade" id="createPaper" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
		    <div class="modal-header bg-primary">
		        <h5 class="modal-title text-white">ADD PAPER</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true" class="text-white">×</span>
		        </button>
		    </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'papers.store','method' => 'POST']) !!}
				{{ csrf_field() }}  
            	<div class="row">
            		<div class="col s12">
	            		<div class="input-field col s12">
					        {{ Form::label('paper','PAPER') }}
	            			{{ Form::text('paper',null,['class'=>'form-control','id'=>'paper','required' => 'required']) }} 
					    </div>
	            	</div>
	            </div>	    
            </div>
                @include('partials._footerCreateModal')
              	{!! Form::close() !!}
            </div>
  		</div>
	</div>
</div>
@endsection