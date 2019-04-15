@extends('settings.index')
@section('settings')	
<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
    <a class="navbar-brand" href="">Partner Organization</a>
    @include('partials._headerNav')
    		<a data-toggle="modal" data-target="#createCourse" class="btn btn-link text-white" data-toggle="tooltip" data-placement="left" title="Add Partner Organization">
            	<i class="fa fa-building"></i>
            	Add Partner Organization
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
						<th>Partner Organization</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $partnerOrg as $partner )
						<tr>
							<td>{{ $count ++ .'.' }}</td>
							<td>{{ $partner->organization }}</td>
							<td>
								<a data-toggle="modal" data-target="#editPartOrg{{ $partner->id }}" class="btn btn-link text-info" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
								<a data-toggle="modal" data-target="#deleteeditPartOrg{{ $partner->id }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Delete"><i class="fa fa-trash fa-2x"></i></a>
								<a data-toggle="modal" data-target="#activeInactive{{ $partner->id }}"  data-toggle="tooltip" data-placement="left"
									class="btn btn-link text-{{ $partner->is_active == 'Y' ? 'primary' : 'danger' }}" 
									title="{{ $partner->is_active == 'Y' ? 'Deactivate' : 'Activate' }}">
								<i class="fa {{ $partner->is_active == 'Y' ? 'fa-eye fa-2x' : 'fa-eye-slash fa-2x' }}"></i>
								</a>
							</td>
						</tr>

						<!--modal -->
						<div class="modal fade" id="editPartOrg{{ $partner->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
			              	<div class="modal-dialog modal-dialog-centered" role="document">
			                	<div class="modal-content">
				                  	<div class="modal-header bg-primary">
					                    <h5 class="modal-title text-white">EDIT ORGANIZATION</h5>
					                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                      <span aria-hidden="true" class="text-white">×</span>
					                    </button>
				                  	</div>
					                <div class="modal-body">
					                	{!! Form::model($partner, ['route' => ['partnerOrganization.update', $partner->id], 'method' => 'PUT']) !!}
						    			{{ csrf_field() }}  
						                	<div class="row">
						                		<div class="col s12">
						    	            		<div class="input-field col s12">
						    	            			{{ Form::label('organization','PARTNER ORGANIZATION') }}
							    						{{ Form::text('organization',null,['class'=>'form-control','id'=>'organization','required' => 'required']) }} 
						    					        <input type="hidden" name="is_active" id="is_active" value="{{ $partner->is_active == 'Y' ? 'Y' : 'N' }}"> 
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

			           	<!--modal -->
						<div class="modal fade" id="deleteeditPartOrg{{ $partner->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
			              	<div class="modal-dialog modal-dialog-centered" role="document">
			                	<div class="modal-content">
				                  	<div class="modal-header bg-warning">
					                    <h5 class="modal-title text-white">Please Confirm!</h5>
					                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                      <span aria-hidden="true" class="text-white">×</span>
					                    </button>
					                </div>
					                <div class="modal-body">
					                	{!! Form::model($partner, ['route' => ['partnerOrganization.destroy', $partner->id], 'method' => 'DELETE']) !!}
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
			           	<!--modal -->

			           	<!-- Modal -->
						<div class="modal fade" id="activeInactive{{ $partner->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						  	<div class="modal-dialog modal-dialog-centered" role="document">
						    	<div class="modal-content">
							      	<div class="modal-header  bg-warning">
								        <h5 class="modal-title text-white">Please Confirm!</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true" class="white-text">&times;</span>
								        </button>
							      	</div>
								    <div class="modal-body">
								        <h5>Would you like to {{ $partner->is_active == 'N' ? 'Activate' : 'Deactive' }} this record?</h5>
								        <h5>Partners Record will also {{ $partner->is_active == 'N' ? 'Activated' : 'Deactived' }}?</h5>
								        {!! Form::model($partner, ['route' => ['PartnerOrganizationInactive', $partner->id], 'method' => 'PUT']) !!}
								        <input type="hidden" name="is_active" id="is_active" value="{{ $partner->is_active == 'N' ? 'Y' : 'N' }}">
								    </div>
								    <div class="modal-footer">
										{{ Form::button('Save', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
										{{ Form::button('Close', ['type' => 'submit', 'class' => 'btn btn-secondary' , 'data-dismiss' => 'modal'] )  }}
								    </div>
							     	 {!! Form::close() !!}
						    	</div>
						  	</div>
						</div>
						<!-- Modal -->

					@endforeach
				</tbody>
			</table>
	</div><!-- end div card body -->
</div>

<div class="modal fade" id="createCourse" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
	      	<div class="modal-header bg-primary">
		        <h5 class="modal-title text-white">ADD ORGANIZATION</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true" class="text-white">×</span>
		        </button>
		    </div>
            <div class="modal-body">
            	{!! Form::open(['route' => 'partnerOrganization.store','method' => 'POST']) !!}
				{{ csrf_field() }}  
            	<div class="row">
            		<div class="col s12">
	            		<div class="input-field col s12">
    					    {{ Form::label('organization','PARTNER ORGANIZATION') }}
    						{{ Form::text('organization',null,['class'=>'form-control','id'=>'organization','required' => 'required']) }} 
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