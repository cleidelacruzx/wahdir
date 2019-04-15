@extends('layouts.app')
@section('content')
	<div class="card shadow rounded">
        <div class="card-header border-primary text-white bg-primary">
        {{ isset($facilityInfo) ? 'EDIT FACILITY INFO' : 'CREATE FACILITY INFO' }}
        </div>
        <div class="card-body">
       	@if(isset($facilityInfo))
        {!! Form::model($facilityInfo, ['route' => ['facilityinfo.update', $facilityInfo->id], 'method' => 'PUT', 'files' => true]) !!}
        <input type="hidden" name="is_active" id="is_active" value="{{ $facilityInfo->is_active == 'Y' ? 'Y' : 'N' }}">
        @else
        	{!! Form::open(['route' => 'facilityinfo.store','method' => 'POST', 'files' => true]) !!}
        @endif 
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-11">
                {{ Form::label('facility_id','FACILITY CONFIG') }}
                @if(isset($facilityInfo->facility_id))
                {{ Form::select('facility_id', $facility1,NULL, ['class' => 'js-example-basic-single form-control','id' => 'facility_id','name' => 'facility_id']) }}
               	@else
                <select type="text" id="facility_id" name="facility_id" class="js-example-basic-single form-control">
                  <option value="" disabled selected>Choose your option</option>
                  @foreach($info2 as $facility)
                        <option value="{{ $facility['id'] }}">{{ $facility->facilities->hfhudname  }}</option>  
                   @endforeach
                </select>
               @endif
            </div>
        </div>

        <div id="form-hide">

		    <div class="row">
		        <div class="col-md-3">
		            {{ Form::label('email','EMAIL') }}
		            {{ Form::email('email',null,['class'=>'form-control','id'=>'email']) }} 
		        </div>
		        <div class="col-md-3">
		            {{ Form::label('secondary_email','ALTERNATIVE EMAIL') }}
		            {{ Form::email('secondary_email',null,['class'=>'form-control','id'=>'secondary_email']) }} 
		        </div>
		        <div class="col-md-3">
		            {{ Form::label('primary_contact','PRIMARY CONTACT') }}
		            {{ Form::text('primary_contact',null,['class'=>'form-control','id'=>'primary_contact']) }} 
		        </div>
		        <div class="col-md-3">
		            {{ Form::label('secondary_contact','SECONDARY CONTACT') }}
		            {{ Form::text('secondary_contact',null,['class'=>'form-control','id'=>'secondary_contact']) }} 
		        </div>
		    </div>

		    <div class="row">
		    	<div class="col-md-10">
		    		{{ Form::label('incomeclass_id','INCOME CLASS') }}
		    		@if(isset($facilityInfo->incomeclass_id))
                    {{ Form::select('incomeclass_id', $income_class,NULL, ['class' => 'form-control','id' => 'incomeclass_id','name' => 'incomeclass_id']) }}
                	@else
		    		<select type="text" id="incomeclass_id" name="incomeclass_id" class="form-control">
	                  <option value="" disabled selected>Choose your option</option>
	                  @foreach(App\FacilityIncomeClass::all() as $incomeClass)
	                        <option value="{{ $incomeClass['id'] }}">{{ $incomeClass['income_class']  }}</option>  
	                   @endforeach
	                </select>
	                @endif
		    	</div>
		    	<div class="col-md-2">
		    		{{ Form::label('moa_version','MOA VERSION') }}
                    {{ Form::text('moa_version',null,['class'=>'form-control','id'=>'moa_version']) }} 
		    	</div>
		    </div>

		    <div class="row">
		    	<div class="col-md-6">
		    		{{ Form::label('mayors_name','MAYOR NAME') }}
                    {{ Form::text('mayors_name',null,['class'=>'form-control','id'=>'mayors_name']) }} 
		    	</div>
		    	<div class="col-md-6">
                    {{ Form::label('mho_name','MUNICIPALITY HEALTH OFFICE NAME') }}
                    {{ Form::text('mho_name',null,['class'=>'form-control','id'=>'mho_name']) }} 
		    	</div>
		    </div>

		    <div class="row">
		    	<div class="col-md-12">
		    		{{ Form::label('mailing_address','MAILING ADDRESS') }}
                    {{ Form::textarea('mailing_address',null,['class'=>'form-control','id'=>'mailing_address','rows'=>'1']) }} 
		    	</div>
		    </div>

		    <div class="form-group form-check">
			    {{ Form::checkbox('pickup_delivery','1',null, ['class' => 'form-check-input' , 'id' => 'pickup_delivery', 'name' => 'pickup_delivery']) }}
			    <label class="form-check-label" for="pickup_delivery">PICK-UP</label>
			</div>

		   	<div class="row">
		    	<div class="col-md-12">
		    		{{ Form::label('lgu_address','LGU ADDRESS') }}
                    {{ Form::textarea('lgu_address',null,['class'=>'form-control','id'=>'lgu_address','rows'=>'1']) }} 
		    	</div>
		    </div>
		    <br>
		    <div class="form-group">
                <label for="image">UPLOAD IMAGE</label>
                {{ Form::file('image',null,['class'=>'form-control','id'=>'image','name'=>'image']) }} 
            </div>

        </div>

    	</div>
        <div class="card-footer border-primary">
            {{ Form::button( isset($partners) ? '<i class="fa fa-save"></i> Save Changes' : '<i class="fa fa-save"></i> Submit', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
            <a href="{{ route('facilityinfo.index') }}" class="btn btn-icon btn-3 btn-success" role="button">
                <i class="fa fa-arrow-left"></i>
                Go Back
            </a>
        </div>                
</div>
    {!! Form::close() !!}
@endsection
@section('scripts')        
    <script>
		$('#facility_id')
		    .select2()
		    .on('select2:open', () => {
		        $(".select2-results:not(:has(a))").append('<a href="{{ route('facility.create') }}" style="padding: 6px;height: 20px;display: inline-table;">CREATE NEW FACILITY</a>');
		})
    </script>
@endsection