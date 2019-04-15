@extends('settings.index')
@section('settings')
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
	    <a class="navbar-brand" href="">Partner Designation</a>
	    @include('partials._headerNav')
	    		<a data-toggle="modal" data-target="#createCourse" class="btn btn-link text-white" data-toggle="tooltip" data-placement="left" title="Add Partner Designation">
	            	<i class="fa fa-building"></i>
	            	Add Partner Designation
	      		</a>
	        </li>
	      </ul>
	    </div>
	</nav> 

	<div class="card shadow border-0" id="example2" style="display:none">
		<div class="card-body">  <!-- div card body -->
			<table id="example" class="table-striped">
				<thead>
					<tr>
						<th>No.</th>
						<th>Partner Designation</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $partnerDesig as $partnerDsg )
						<tr>
							<td>{{ $count ++ .'.' }}</td>
							<td>{{ $partnerDsg->designation }}</td>
							<td>
								<a data-toggle="modal" data-target="#editPartDesig{{ $partnerDsg->id }}" class="btn btn-link text-info" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
								<a data-toggle="modal" data-target="#deletePartDesig{{ $partnerDsg->id }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Delete"><i class="fa fa-trash fa-2x"></i></a>
							</td>
						</tr>

						<!-- Edit modal -->
						<div class="modal fade" id="editPartDesig{{ $partnerDsg->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
			              <div class="modal-dialog modal-dialog-centered" role="document">
			                <div class="modal-content">
			                  <div class="modal-header bg-primary">
			                    <h5 class="modal-title text-white">EDIT DESIGNATION</h5>
			                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                      <span aria-hidden="true" class="text-white">×</span>
			                    </button>
			                  </div>
					                  <div class="modal-body">
				                        {!! Form::model($partnerDsg, ['route' => ['partnerDesignation.update', $partnerDsg->id], 'method' => 'PUT']) !!}
						    				{{ csrf_field() }}  
						                	<div class="row">
						                		<div class="col s12">
						    	            		<div class="input-field col s12">
						    	            			{{ Form::label('designation','PARTNER DESIGNATION') }}
						        						{{ Form::text('designation',null,['class'=>'form-control','id'=>'designation','required' => 'required']) }}
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

			           	    <!-- delete modal -->
							<div class="modal fade" id="deletePartDesig{{ $partnerDsg->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
								        <div class="modal-header bg-warning">
								            <h5 class="modal-title text-white">Please Confirm!</h5>
								            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								              <span aria-hidden="true" class="text-white">×</span>
								            </button>
								        </div>
								        <div class="modal-body">
								        	{!! Form::model($partnerDsg, ['route' => ['partnerDesignation.destroy', $partnerDsg->id], 'method' => 'DELETE']) !!}
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

							<!-- delete modal -->

					@endforeach
				</tbody>
			</table>
	</div><!-- end div card body -->
</div>

<div class="modal fade" id="createCourse" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header bg-primary">
	        <h5 class="modal-title text-white">ADD DESIGNATION</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true" class="text-white">×</span>
	        </button>
        </div>
        <div class="modal-body">
        	{!! Form::open(['route' => 'partnerDesignation.store','method' => 'POST']) !!}
			{{ csrf_field() }}  
        	<div class="row">
        		<div class="col s12">
            		<div class="input-field col s12">
            			{{ Form::label('designation','PARTNER DESIGNATION') }}
						{{ Form::text('designation',null,['class'=>'form-control','id'=>'designation','required' => 'required']) }}
				    </div>
            	</div>
            </div>	    
        </div>
	 		@include('partials._footerCreateModal')
			{!! Form::close() !!}
        </div>
  	</div>
</div>

@endsection