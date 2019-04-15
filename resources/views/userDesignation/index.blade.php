@extends('settings.index')
@section('settings')	
<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
    <a class="navbar-brand" href="">User Role</a>
    @include('partials._headerNav')
    		<a data-toggle="modal" data-target="#createUserRole" class="btn btn-link text-white" data-toggle="tooltip" data-placement="left" title="Add Partner">
            <span class="btn-inner--icon"></span>
            <span class="btn-inner--text">
            	<i class="fa fa-tasks"></i>
            	Add User Role
            </span>
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
					<th>ID#</th>
					<th>User Role</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach( $userRole as $role )
					<tr>
						<td>{{ $count++ }}</td>
						<td>{{ $role->role_name }}</td>
						<td>
							<a data-toggle="modal" data-target="#editRole{{ $role->id }}" class="btn btn-link text-info" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
							<a data-toggle="modal" data-target="#deleteRole{{ $role->id }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Delete"><i class="fa fa-trash fa-2x"></i></a>
						</td>
					</tr>

					<!--modal -->
					<div class="modal fade" id="editRole{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
		              	<div class="modal-dialog modal-dialog-centered" role="document">
		                	<div class="modal-content">
			                    <div class="modal-header bg-primary">
			                        <h5 class="modal-title text-white">EDIT ROLE</h5>
			                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                         <span aria-hidden="true" class="text-white">×</span>
			                        </button>
			                    </div>
			                  	<div class="modal-body">
		                        	{!! Form::model($role, ['route' => ['userDesignation.update', $role->id], 'method' => 'PUT']) !!}	
				    				{{ csrf_field() }}  
				                	<div class="row">
				                		<div class="col s12">
				    	            		<div class="input-field col s12">
				    					        {{ Form::label('role_name','USER ROLE') }}
							    				{{ Form::text('role_name',null,['class'=>'form-control','id'=>'role_name','required' => 'required']) }}  
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
					<div class="modal fade" id="deleteRole{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
		              <div class="modal-dialog modal-dialog-centered" role="document">
		                <div class="modal-content">
				                <div class="modal-header bg-warning">
				                    <h5 class="modal-title text-white">Please Confirm!</h5>
				                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                      <span aria-hidden="true" class="text-white">×</span>
				                    </button>
				                </div>
				                <div class="modal-body">
			                        {!! Form::model($role, ['route' => ['userDesignation.destroy', $role->id], 'method' => 'DELETE']) !!}	
					    			{{ csrf_field() }}  
					    			<h5>Would you like to Delete this record?</h5>
				                </div>
								<div class="modal-footer">
										<button type="submit" class="btn btn-primary">Save</button>
				                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
	</div><!-- end div card body -->
</div>

<div class="modal fade" id="createUserRole" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white">ADD ROLE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">×</span>
        </button>
      </div>
              <div class="modal-body">
                {!! Form::open(['route' => 'userDesignation.store','method' => 'POST']) !!}
    				{{ csrf_field() }}  
                	<div class="row">
                		<div class="col s12">
    	            		<div class="input-field col s12">
    	            			{{ Form::label('role_name','USER ROLE') }}
							    {{ Form::text('role_name',null,['class'=>'form-control','id'=>'role_name','required' => 'required']) }}   
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