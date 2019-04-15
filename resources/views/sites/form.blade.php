@extends('layouts.app')
@section('content')
  <div class="card shadow">
    <div class="card-header border-primary text-white bg-primary">
        {{ isset($sites) ? 'EDIT SITE' : 'CREATE SITE' }}
    </div>
        <div class="card-body">
        @if(isset($sites))
        {!! Form::model($sites, ['route' => ['sites.update', $sites->id], 'method' => 'PUT', 'files' => true]) !!}
        @else
        {!! Form::open(['route' => 'sites.store','method' => 'POST', 'files' => true]) !!}
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
                {{ Form::label('suffix_name', "SUFFIX NAME") }}
                {{ Form::select('suffix_name', $suffix,isset($sites) ? null : 'NOTAP', ['class' => 'form-control','id' => 'suffix_name','name' => 'suffix_name']) }}
            </div>
        </div>    

        <div class="row">
            <div class="col-md-9">
                {{ Form::label('site_id','DESIGNATION') }}
                @if(isset($sites->site_id))
                {{ Form::select('site_id', $siteDesignation,NULL, ['class' => 'js-example-basic-single form-control','id' => 'site_id','name' => 'site_id']) }}
                @else
                <select type="text" id="site_id" name="site_id" class="js-example-basic-single form-control">
                  <option value="" disabled selected>Choose your option</option>
                  @foreach(App\SitesDesignation::get() as $siteDesig)
                        <option value="{{ $siteDesig['id'] }}">{{ $siteDesig['sites_desc'] }}</option>  
                   @endforeach
                </select>
                @endif
            </div>
            <div class="col-md-3">
                {{ Form::label('system_admin_id','ADMIN FUNCTION') }}
                @if(isset($sites->system_admin_id))
                    {{ Form::select('system_admin_id', $admin,NULL, ['class' => 'form-control','id' => 'system_admin_id','name' => 'system_admin_id']) }}
                @else
                <select type="text" id="system_admin_id" name="system_admin_id" class="form-control">
                  <option value="" disabled selected>Choose your option</option>
                  @foreach(App\SitePersonnelSystemAdministrator::all() as $systemadmin)
                        <option
                        style="color : 
                        @if($systemadmin['id'] == 1) blue 
                        @elseif($systemadmin['id'] == 2) Lime 
                        @elseif($systemadmin['id'] == 3) yellow
                        @elseif($systemadmin['id'] == 4) purple
                        @endif" 
                        value="{{ $systemadmin['id'] }}">
                        {{ $systemadmin['functions'] }}
                    </option>  
                   @endforeach
                </select>
                @endif
            </div> 
        </div>
        <div class="row">
            <div class="col-md-8">
                {{ Form::label('status','STATUS') }}
                {{ Form::select('status', ['' => 'Choose you option','Y' => 'Site Partner','N' => 'Warm Leads'],null, ['class' => 'form-control','id' => 'status','name' => 'status']) }}
            </div>
            <div class="col-md-2">
                {{ Form::label('birthdate','BIRTHDATE') }}
                {{ Form::date('birthdate',null,['class'=>'form-control','id'=>'birthdate','name'=>'birthdate']) }}
            </div> 
            <div class="col-md-2">
                {{ Form::label('gender', "GENDER") }}
                {{ Form::select('gender', ['M' => 'M', 'F' => 'F'],isset($sites) ? null : 'M', ['class' => 'form-control','id' => 'gender','name' => 'gender']) }}
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                {{ Form::label('email','EMAIL') }}
                {{ Form::email('email',null,['class'=>'form-control','id'=>'email']) }} 
            </div>
            <div class="col-md-3">
                {{ Form::label('secondary_email','ALTERNATIVE EMAIL') }}
                {{ Form::email('secondary_email',null,['class'=>'form-control','id'=>'secondary_email','name'=> 'secondary_email']) }} 
            </div> 
            <div class="col-md-3">
                {{ Form::label('primary_contact','PRIMARY CONTACT') }}
                {{ Form::text('primary_contact',null,['class'=>'form-control','id'=>'primary_contact','name'=> 'primary_contact']) }} 
            </div>
            <div class="col-md-3">
                {{ Form::label('secondary_contact','SECONDARY CONTACT') }}
                {{ Form::text('secondary_contact',null,['class'=>'form-control','id'=>'secondary_contact','name'=> 'secondary_contact']) }} 
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {{ Form::label('facility_id','FACILITY CONFIG') }}
                @if(isset($sites->facility_id))
                {{ Form::select('facility_id', $fac,NULL, ['class' => 'js-example-basic-single form-control','id' => 'facility_id','name' => 'facility_id']) }}
                @else
                <select type="text" id="facility_id" name="facility_id" class="js-example-basic-single form-control">
                  <option value="" disabled selected>Choose your option</option>
                  @foreach(App\FacilityConfig::all() as $facility)
                        <option value="{{ $facility['id'] }}">{{ $facility->facilities->hfhudname  }}</option>  
                   @endforeach
                </select>
                @endif
            </div>
        </div>             
            <br>
            <div class="form-group">
                <label for="image">Upload Image:</label>
                {{ Form::file('image',null,['class'=>'form-control','id'=>'image','name'=>'image']) }} 
            </div>
    </div>

        <div class="card-footer border-primary">
                {{ Form::button( isset($sites) ? '<i class="fa fa-save"></i> Save Changes' : '<i class="fa fa-save"></i> Submit', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                <a href="{{ route('sites.index') }}" class="btn btn-icon btn-3 btn-success" role="button">
                    <i class="fa fa-arrow-left"></i>
                    Go Back
                </a>
        </div> 
    </div>            
</div>
{!! Form::close() !!}
@endsection
