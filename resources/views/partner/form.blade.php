@extends('layouts.app')
@section('content')
<div class="card shadow rounded">
    <div class="card-header border-primary text-white bg-primary">
        {{ isset($partners) ? 'EDIT PARTNER ORGANIZATION' : 'CREATE PARTNER' }}
    </div>
    <div class="card-body">
        @if(isset($partners))
        {!! Form::model($partners, ['route' => ['partner.update', $partners->id], 'method' => 'PUT', 'files' => true ]) !!}
        <input type="hidden" name="is_active" id="is_active" value="{{ $partners->is_active == 'Y' ? 'Y' : 'N' }}">
        @else
        {!! Form::open(['route' => 'partner.store','method' => 'POST','files' => true]) !!}
        @endif
        {{ csrf_field() }} 
        <div class="row">
            <div class="col-md-3">
                {{ Form::label('last_name','LAST NAME') }}
                {{ Form::text('last_name',null,['class'=>'form-control','id'=>'last_name']) }} 
            </div>
            <div class="col-md-3">
                {{ Form::label('first_name','FIRST NAME') }}
                {{ Form::text('first_name',null,['class'=>'form-control','id'=>'first_name']) }} 
            </div>
            <div class="col-md-3">
                {{ Form::label('middle_name','MIDDLE NAME') }}
                {{ Form::text('middle_name',null,['class'=>'form-control','id'=>'middle_name']) }} 
            </div>
            <div class="col-md-3">
                {{ Form::label('suffix_name','SUFFIX NAME') }}
                {{ Form::select('suffix_name', $suffix,isset($partners) ? null : 'NOTAP', ['class' => 'form-control','id' => 'suffix_name','name' => 'suffix_name']) }}
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                {{ Form::label('desig_id','DESIGNATION') }}
                @if(isset($partners->desig_id))
                {{ Form::select('desig_id', $designation,null, ['class' => 'js-example-basic-single form-control','id' => 'desig_id','name' => 'desig_id']) }}
                @else
                <select type="text" id="desig_id" name="desig_id" class="js-example-basic-single form-control">
                  <option value="" disabled selected>Choose your option</option>
                  @foreach( App\PartnerDesignation::get() as $designation )
                        <option value="{{ $designation['id'] }}">{{ $designation['designation'] }}</option>
                  @endforeach
                </select>
                @endif
            </div>
            <div class="col-md-4">
                {{ Form::label('org_id','ORGANIZATION') }}
                @if(isset($partners->org_id))
                {{ Form::select('org_id',$organization,NULL, ['class' => 'js-example-basic-single form-control','id' => 'org_id','name' => 'org_id']) }}
                @else
                <select type="text" id="org_id" name="org_id" class="js-example-basic-single form-control">
                  <option value="" disabled selected>Choose your option</option>    
                  @foreach( App\PartnerOrganization::where('is_active','Y')->get() as $organizations )
                        <option value="{{ $organizations['id'] }}">{{ $organizations['organization'] }}</option>
                  @endforeach
                </select>
                @endif
            </div>
            <div class="col-md-2">
                {{ Form::label('birthdate','BIRTHDATE') }}
                {{ Form::date('birthdate',null,['class'=>'form-control','id'=>'birthdate','name'=>'birthdate']) }} 
            </div> 
            <div class="col-md-2">
                {{ Form::label('gender', "GENDER") }}
                {{ Form::select('gender', ['M' => 'M', 'F' => 'F'],isset($partners) ? null : 'M', ['class' => 'form-control','id' => 'gender','name' => 'gender']) }}
            </div>
        </div>    

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
            <div class="col-md-12">
                {{ Form::label('mailing_address','MAILING ADDRESS') }}
                {{ Form::textarea('mailing_address',null,['class'=>'form-control','id'=>'mailing_address','rows'=>'2']) }} 
            </div>
        </div>
        <br>
        <div class="form-group">
            <label for="image">UPLOAD IMAGE</label>
            {{ Form::file('image',null,['class'=>'form-control','id'=>'image','name'=>'image']) }} 
        </div>
    </div>
    <div class="card-footer border-primary">
        {{ Form::button( isset($partners) ? '<i class="fa fa-save"></i> Save Changes' : '<i class="fa fa-save"></i> Submit', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
        <a href="{{ route('partner.index') }}" class="btn btn-icon btn-3 btn-success" role="button">
            <i class="fa fa-arrow-left"></i>
            Go Back
        </a>
    </div>                
</div>
            {!! Form::close() !!}
@endsection
            
