
<div class="card shadow border-0 border-primary" id="example2" style="display:none">
	<div class="card-body">
				<table id="example" class="table-striped" >
					<thead>
						<tr>
							<th>ID.</th>
							<th>Name</th>
							<th>Designation</th>
							<th>Facility Name</th>
							<th>Primary Contact</th>
							<th>Email</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($sites as $site)
						<tr>
							<td>
								<I class="fa fa-square fa-2x"  style="color:
		                        @if($site->system_admin_id == 1) blue 
		                        @elseif($site->system_admin_id == 2) Lime 
		                        @elseif($site->system_admin_id == 3) yellow
		                        @elseif($site->system_admin_id == 4) purple
		                        @endif;"></I>
								{{ $site->id }}</td>
							<td style="font-size:20px;">
							  {{ 
                              $site->first_name . " " . 
                              $site->middle_name . " " . 
                              $site->last_name 
                              }} {{ $site->suffix_name == "NOTAP" ? ' ' : $site->siteSuffix['suffix_desc'] }}
                          </td>
							<td>{{ $site->designations['sites_desc'] }}</td>
							<td>{{ $site->facilityConfig->region->region_name . ', ' . 
								   $site->facilityConfig->province->province_name . ', ' .
								   $site->facilityConfig->municipality->muncity_name . ', ' .	
								   $site->facilityConfig->facilities->hfhudname }}
							</td>
							<td>{{ $site->primary_contact }}</td>
							<td>{{ $site->email }}</td>
							<td>
								<a  href="{{ route('sites.edit',$site->id) }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
								</a>
								<a  href="{{ route('sites.show',$site->id) }}" class="btn btn-link text-info" data-toggle="tooltip" data-placement="left" title="Show"><i class="fa fa-clipboard fa-2x"></i></a>
								<a data-toggle="modal" data-target="#activeInactive{{ $site->id }}"  data-toggle="tooltip" data-placement="left"
					                  class="btn btn-link text-{{ $site->status == 'Y' ? 'primary' : 'danger' }}" 
					                  title="{{ $site->status == 'Y' ? 'Deactivate' : 'Activate' }}">
					                <i class="fa {{ $site->status == 'Y' ? 'fa fa-eye fa-2x' : 'fa fa-eye-slash fa-2x' }}"></i>
					            </a>
							</td>
						</tr>
							
							<!-- Modal -->
							<div class="modal fade" id="activeInactive{{ $site->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								@include('partials._modalActivation')
							</div>

						@endforeach				  
					</tbody>
				</table>
	</div>			
</div>