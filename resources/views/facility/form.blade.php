@extends('settings.index')
@section('settings') 
<div class="row">
    <div class="col-md-12">
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
		      <a class="navbar-brand" href="">Facility Config</a>
		      @include('partials._headerNav')
		          </li>
		        </ul>
		      </div>
		</nav>
		   <div class="card shadow border-0 border-primary">
		        @if(isset($facility))
		            {!! Form::model($facility, ['route' => ['facility.update', $facility->id], 'method' => 'PUT']) !!}
		       		<input type="hidden" name="is_active" id="is_active" value="{{ $facility->is_active == 'Y' ? 'Y' : 'N' }}">
		        @else
		        {!! Form::open(['route' => 'facility.store','method' => 'POST']) !!}
		        @endif
		        {{ csrf_field() }}
		        <div class="card-body">
		              <div class="row">    
		                  <div class="col-md-4">
		                      <!-- {{ Form::label('region_code','Region') }}
		                      @if(isset($facility->region))
		                      {{ Form::select('region_code', $region,null, ['class' => 'form-control','id' => 'region_code','name' => 'region_code']) }}
		                      @else -->
		                      <label>Region</label>
		                      <select type="text" id="region_code" name="region_code" class="form-control">
		                        <option disabled selected>Choose your option</option>
		                        @foreach($region as $ion)
		                          <option value="{{ $ion->region_code }}">{{ $ion->region_name }}</option>
		                        @endforeach
		                      </select>
		                      <!-- @endif -->
		                  </div>
		              <div class="col-md-4">
		                      {{ Form::label('province_code','Province') }}
		                      @if(isset($facility->province))
		                      {{ Form::select('province_code', $province,null, ['class' => 'form-control','id' => 'province_code','name' => 'province_code']) }}
		                      @else
		                      <select type="text" id="province_code" name="province_code" class="form-control">

		                      </select>
		                      @endif
		              </div>
		                  <div class="col-md-4">
		                      {{ Form::label('muncity_code','Municipality') }}
		                      @if(isset($facility->municipality))
		                      {{ Form::select('muncity_code', $muncity,null, ['class' => 'form-control ','id' => 'muncity_code','name' => 'muncity_code']) }}
		                      @else
		                      <select type="text" id="muncity_code" name="muncity_code" class="form-control">

		                      </select>
		                      @endif
		                  </div>
		              </div>
		              <div class="row">    
		                  <div class="col-md-10">
		                      {{ Form::label('hfhudcode','Facility Name') }}
		                      @if(isset($facility->hfhudcode))
		                      {{ Form::select('hfhudcode', $fac,null, ['class' => 'form-control js-example-basic-single','id' => 'hfhudcode','name' => 'hfhudcode']) }}
		                      @else
		                      <select type="text" id="hfhudcode" name="hfhudcode" class="form-control js-example-basic-single">

		                      </select>
		                      @endif
		                  </div>
		              </div>
		          </div>
		          <div class="card-footer border-primary">
		              {{ Form::button( isset($facility) ? '<i class="fa fa-save"></i> Save Changes' : '<i class="fa fa-save"></i> Submit', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
		              <a href="{{ route('facility.index') }}" class="btn btn-icon btn-3 btn-success" role="button">
		                  <i class="fa fa-arrow-left"></i>
		                  Go Back
		              </a>
		          </div>  
		    </div>
</div>
  {!! Form::close() !!}
@endsection
@section('scripts')        
    @include('partials._sitesScript')
@endsection
