@extends('layouts.app')
@section('content')
<div class="card shadow rounded">
    <div class="card-header border-primary text-white bg-primary">
        {{ isset($profile) ? 'EDIT WAH-NGO' : 'CREATE WAH-NGO' }}
    </div>
    <div class="card-body">
        @if(isset($profile))
        {!! Form::model($profile, ['route' => ['profile.update', $profile->id], 'method' => 'PUT', 'files' => true]) !!}
        <input type="hidden" name="is_active" id="is_active" value="{{ $profile->is_active == 'Y' ? 'Y' : 'N' }}">
        @else
        {!! Form::open(['route' => 'profile.store','method' => 'POST', 'files' => true]) !!}
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
                {{ Form::select('suffix_name', $suffix,isset($profile) ? null : 'NOTAP', ['class' => 'form-control','id' => 'suffix_name','name' => 'suffix_name']) }}
            </div>
        </div>    
        <div class="row">
            <div class="col-md-8">
                {{ Form::label('role_id','DESIGNATION') }}
                @if(isset($profile->role_id))
                {{ Form::select('role_id', $desig,NULL, ['class' => 'js-example-basic-single form-control','id' => 'role_id','name' => 'role_id']) }}
                @else
                <select type="text" id="role_id" name="role_id" class="js-example-basic-single form-control">
                  <option value="" disabled selected>Choose your option</option> 
                  @foreach( App\UserRole::get() as $designation )
                        <option value="{{ $designation['id'] }}">{{ $designation['role_name'] }}</option>
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
                {{ Form::select('gender', ['M' => 'M', 'F' => 'F'], isset($profile) ? null : 'M', ['class' => 'form-control','id' => 'gender','name' => 'gender']) }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                {{ Form::label('email','EMAIL') }}
                {{ Form::email('email',null,['class'=>'form-control','id'=>'email','placeholder' => 'domain@gmail.com']) }} 
            </div>
            <div class="col-md-3">
                {{ Form::label('secondary_email','ALTERNATIVE EMAIL') }}
                {{ Form::email('secondary_email',null,['class'=>'form-control','id'=>'secondary_email','placeholder' => 'domain@gmail.com']) }} 
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
            <div class="col-md-3">
                {{ Form::label('wahemployeenumber','WAH EMPLOYEE #') }}
                {{ Form::text('wahemployeenumber',null,['class'=>'form-control','id'=>'wahemployeenumber','name' => 'wahemployeenumber']) }} 
            </div>
            <div class="col-md-3">
                {{ Form::label('pgtemployeenumber','PGT EMPLOYEE #') }}
                {{ Form::text('pgtemployeenumber',null,['class'=>'form-control','id'=>'pgtemployeenumber','name' => 'pgtemployeenumber']) }} 
            </div>
            <div class="col-md-3">
                {{ Form::label('metrobankaccount','METROBANK ACCOUNT') }}
                {{ Form::text('metrobankaccount',null,['class'=>'form-control','id'=>'metrobankaccount','name' => 'metrobankaccount']) }} 
            </div>
            <div class="col-md-3">
                {{ Form::label('landbankaccount','LANDBANK ACCOUNT') }}
                {{ Form::text('landbankaccount',null,['class'=>'form-control','id'=>'landbankaccount','name' => 'landbankaccount']) }} 
            </div>
        </div> 
        <div class="row">
            <div class="col-md-3">
                {{ Form::label('philhealth','PHILHEALTH NUMBER') }}
                {{ Form::text('philhealth',null,['class'=>'form-control','id'=>'philhealth']) }} 
            </div>
            <div class="col-md-3">
                {{ Form::label('tin','TIN NUMBER') }}
                {{ Form::text('tin',null,['class'=>'form-control','id'=>'tin']) }} 
            </div>
            <div class="col-md-3">
                {{ Form::label('sss','SSS NUMBER') }}
                {{ Form::text('sss',null,['class'=>'form-control','id'=>'sss']) }} 
            </div>
            <div class="col-md-3">
                {{ Form::label('datehired','DATE HIRED') }}
                {{ Form::date('datehired',null,['class'=>'form-control','id'=>'datehired','name' => 'datehired']) }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                {{ Form::label('pagibighdmf','PAG-IBIG HDMF') }}
                {{ Form::text('pagibighdmf',null,['class'=>'form-control','id'=>'pagibighdmf']) }}
            </div>    
            <div class="col-md-3">
                {{ Form::label('mabuhaymilespal','MABUHAY MILES NO.') }}
                {{ Form::text('mabuhaymilespal',null,['class'=>'form-control','id'=>'mabuhaymilespal']) }} 
            </div>
            <div class="col-md-3">
                {{ Form::label('getgocebupac','GET GO CEBU PAC NO.') }}
                {{ Form::text('getgocebupac',null,['class'=>'form-control','id'=>'getgocebupac']) }} 
            </div>
            <div class="col-md-3">
                {{ Form::label('contact_person','CONTACT PERSON') }}
                {{ Form::text('contact_person',null,['class'=>'form-control','id'=>'contact_person','name' => 'contact_person','placeholder' => 'IN CASE OF EMERGENCY']) }}
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
            {{ Form::button( isset($profile) ? '<i class="fa fa-save"></i> Save Changes' : '<i class="fa fa-save"></i> Submit', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
            <a href="{{ route('profile.index') }}" class="btn btn-icon btn-3 btn-success" role="button">
                <i class="fa fa-arrow-left"></i>
                Go Back
            </a>
    </div> 
</div>            
    {!! Form::close() !!}
@endsection
