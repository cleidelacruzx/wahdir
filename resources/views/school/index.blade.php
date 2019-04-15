@extends('settings.index')
@section('settings')
<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
    <a class="navbar-brand" href="">School</a>
    @include('partials._headerNav')
    		<a data-toggle="modal" data-target="#createSchool" class="btn btn-link text-default text-white" data-toggle="tooltip" data-placement="left" title="Add Partner">
            <span class="btn-inner--icon"></span>
            <span class="btn-inner--text"><i class="fa fa-university"></i>Add School</span>
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
					<th>School</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach( $schools as $school )
					<tr>
						<td>{{ $count ++ .'.' }}</td>
						<td>{{ $school->school }}</td>
						<td>

							<a data-toggle="modal" data-target="#editSchool{{ $school->id }}" class="btn btn-link text-info" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
							<a data-toggle="modal" data-target="#deleteSchool{{ $school->id }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Delete"><i class="fa fa-trash fa-2x"></i></a>
						</td>
					</tr>

					<div class="modal fade" id="editSchool{{ $school->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
		              <div class="modal-dialog modal-dialog-centered" role="document">
		                <div class="modal-content">
		                  <div class="modal-header bg-primary">
		                    <h5 class="modal-title text-white">EDIT SCHOOL</h5>
		                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                      <span aria-hidden="true" class="text-white">×</span>
		                    </button>
		                  </div>
		                  <div class="modal-body">
	                        {!! Form::model($school, ['route' => ['school.update', $school->id], 'method' => 'PUT']) !!}		
			    			{{ csrf_field() }}  
			                	<div class="row">
			                		<div class="col s12">
			    	            		<div class="input-field col s12">
			    	            			{{ Form::label('school','SCHOOL') }}
					            			{{ Form::text('school',null,['class'=>'form-control','id'=>'school','required' => 'required']) }}
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
					<div class="modal fade" id="deleteSchool{{ $school->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
		              	<div class="modal-dialog modal-dialog-centered" role="document">
		                	<div class="modal-content">
			                  	<div class="modal-header bg-warning">
				                    <h5 class="modal-title text-white">Please Confirm!</h5>
				                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                      <span aria-hidden="true" class="text-white">×</span>
				                    </button>
			                  	</div>
						        <div class="modal-body">
			                        {!! Form::model($school, ['route' => ['school.destroy', $school->id], 'method' => 'DELETE']) !!}	
					    			{{ csrf_field() }}  
					    			<h5>Would you like to Delete this record?</h5>
						         </div>
					                  
								<div class="modal-footer">
									{{ Form::button('Save', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
									{{ Form::button('Close', ['type' => 'submit', 'class' => 'btn btn-secondary' , 'data-dismiss' => 'modal'] )  }}
							    </div>
					                {!! Form::close() !!}
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

<div class="modal fade" id="createSchool" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      	<div class="modal-header bg-primary">
        <h5 class="modal-title text-white">ADD SCHOOL</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true" class="text-white">×</span>
	        </button>
      	</div>
        <div class="modal-body">
            {!! Form::open(['route' => 'school.store','method' => 'POST']) !!}	
			{{ csrf_field() }}  
            	<div class="row">
            		<div class="col s12">
	            		<div class="input-field col s12">
					        {{ Form::label('school','SCHOOL') }}
	            			{{ Form::text('school',null,['class'=>'form-control','id'=>'school','required' => 'required']) }} 
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