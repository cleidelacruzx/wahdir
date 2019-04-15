					  <div class="modal-dialog modal-dialog-centered" role="document">
					    <div class="modal-content">
					      <div class="modal-header bg-primary">
					        <h5 class="modal-title text-white">Please Confirm!</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true" class="text-white">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					      	@if(isset($partners))
					        <h5>Would you like to {{ $partners->is_active == 'N' ? 'Activate' : 'Deactive' }} this record?</h5>
					        {!! Form::model($partners, ['route' => ['PartnerActivation', $partners->id], 'method' => 'PUT']) !!}
					        <input type="hidden" name="is_active" id="is_active" value="{{ $partners->is_active == 'N' ? 'Y' : 'N' }}">
					      	@elseif(isset($profile))
					      	<h4>Would you like to {{ $profile->is_active == 'N' ? 'Activate' : 'Deactive' }} this record?</h4>
                                    {!! Form::model($profile, ['route' => ['ProfileActivation', $profile->id], 'method' => 'PUT']) !!}
	                        	<input type="hidden" name="is_active" id="is_active" value="{{ $profile->is_active == 'N' ? 'Y' : 'N' }}">
	                            <div class="form-group">
	                                  {{ Form::label('dateendcontruct','DATE OF END OF CONTRACT?') }}
	                                  {{ Form::date('dateendcontruct',null,['class'=>'form-control','id'=>'dateendcontruct','name'=>'dateendcontruct']) }}
	                            </div>
	                            <div class="form-group">
	                              {{ Form::label('reason_deactivation_id', "REASON?") }}
	                              <select type="text" id="reason_deactivation_id" name="reason_deactivation_id" class="form-control">
	                                @if($profile->reason_deactivation_id)
	                                <option value="{{ $profile->reasondeactivation['id'] }}">{{ $profile->reasondeactivation['reasons'] }}</option>
	                                @else
	                                <option value="" disabled selected>Choose your option</option> 
	                                @endif   
	                                @foreach( App\ReasonDeactivation::all() as $reasons )
	                                      <option value="{{ $reasons['id'] }}">{{ $reasons['reasons'] }}</option>
	                                @endforeach
	                              </select>
	                            </div>
					      	@elseif(isset($site))
					    			<h5>Would you like to {{ $site->status == 'N' ? 'Activate' : 'Deactive' }} this record?</h5>
							        {!! Form::model($site, ['route' => ['SitesActivation', $site->id], 'method' => 'PUT']) !!}
							        <input type="hidden" name="status" id="status" value="{{ $site->status == 'N' ? 'Y' : 'N' }}">
							          <div class="form-group">
									   		<div class="form-group">
										   		{{ Form::label('reasons','REASON?') }}
										   		{{ Form::textarea('reasons',null,['class'=>'form-control','id'=>'reasons','name'=>'reasons','rows' => '3']) }}
											</div>
									  </div>
							@elseif(isset($info))
								<h5>Would you like to {{ $info->is_active == 'N' ? 'Activate' : 'Deactive' }} this record?</h5>
						        {!! Form::model($info, ['route' => ['FacilityInfoActivation', $info->id], 'method' => 'PUT']) !!}
						        <input type="hidden" name="is_active" id="is_active" value="{{ $info->is_active == 'N' ? 'Y' : 'N' }}">
					      	@elseif(isset($intern))
					    	<h5>Would you like to {{ $intern->is_active == 'N' ? 'Activate' : 'Deactive' }} this record?</h5>
					        {!! Form::model($intern, ['route' => ['InternActivation', $intern->id], 'method' => 'PUT']) !!}
					        <input type="hidden" name="is_active" id="is_active" value="{{ $intern->is_active == 'N' ? 'Y' : 'N' }}">
					      	@endif

					      </div>
					      <div class="modal-footer">
					      	<button type="submit" class="btn btn-primary">Save</button>
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					      </div>
					      {!! Form::close() !!}
					    </div>
					  </div>