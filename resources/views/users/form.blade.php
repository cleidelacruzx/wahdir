@extends('settings.index')
@section('settings')
<div class="card shadow rounded">
    <div class="card-header border-primary text-white bg-primary">
        {{ isset($user) ? 'EDIT USER' : 'CREATE USER' }}
    </div>
    <div class="card-body">
        @if(isset($user))
        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
        <input type="hidden" name="is_active" id="is_active" value="{{ $user->is_active == 'Y' ? 'Y' : 'N' }}">
        @else
        {!! Form::open(['route' => 'users.store','method' => 'POST']) !!}
        @endif    
        {{ csrf_field() }} 
            <div class="row">
                    <div class="col-md-4">
                        {{ Form::label('username','USER NAME') }}
                        {{ Form::text('username',null,['class'=>'form-control','id'=>'username','name'=>'username']) }}
                    </div>
                    <div class="col-md-4">
                        {{ Form::label('password','PASSWORD') }}
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="col-md-4">
                        {{ Form::label('comfirm_password','CONFIRM PASSWORD') }}
                        <input type="password" class="form-control" name="comfirm_password" id="comfirm_password"> 
                    </div>
            </div>    

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
                        {{ Form::select('suffix_name', $suffix,isset($user) ? null : 'NOTAP', ['class' => 'form-control','id' => 'suffix_name','name' => 'suffix_name']) }}
                    </div>
            </div>
             
            <div class="row">
                <div class="col-md-3">  
                        {{ Form::label('birthdate','DATE OF BIRTH') }}
                        {{ Form::date('birthdate',null,['class'=>'form-control','id'=>'birthdate','name'=>'birthdate']) }} 

                </div> 
                <div class="col-md-3">
                        {{ Form::label('mobile_number','MOBILE NUMBER') }}
                        {{ Form::text('mobile_number',null,['class'=>'form-control','id'=>'mobile_number']) }} 
                </div>
                <div class="col-md-4">
                        {{ Form::label('email','EMAIL') }}
                        {{ Form::email('email',null,['class'=>'form-control','id'=>'email']) }} 
                </div>
                <div class="col-md-2">
                        {{ Form::label('gender','GENDER') }}
                        {{ Form::select('gender', ['M' => 'M', 'F' => 'F'],null, ['class' => 'form-control','id' => 'gender','name' => 'gender']) }}
                </div> 
            </div> 

            <div class="row">
              <div class="col-md-9">
                    {{ Form::label('role_id','DESIGNATION') }}
                    @if(isset($user))
                    {{ Form::select('role_id', $role,'NOTAP', ['class' => 'form-control','id' => 'role_id','name' => 'role_id']) }}
                    @else
                    <select type="text" id="role_id" name="role_id" class="form-control">
                        <option value="" disabled selected>Choose your option</option>
                          @foreach(App\UserRole::get() as $role)
                              <option value="{{ $role['id'] }}">{{ $role['role_name'] }}</option>
                          @endforeach
                    </select>
                    @endif
               </div>
                <div class="col-md-3">
                    {{ Form::label('is_admin','IS ADMIN') }}
                    @if(isset($user))
                    {{ Form::select('is_admin', ['Y' => 'Yes', 'N' => 'No'],null, ['class' => 'form-control','id' => 'is_admin','name' => 'is_admin']) }}
                    @else
                    {{ Form::select('is_admin', ['Y' => 'Yes', 'N' => 'No'],'N', ['class' => 'form-control','id' => 'is_admin','name' => 'is_admin']) }}
                    @endif
                </div>
            </div>
    </div>
    <div class="card-footer border-primary">
            {{ Form::button( isset($user) ? '<i class="fa fa-save"></i> Save Changes' : '<i class="fa fa-save"></i> Submit', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
            <a href="{{ route('users.index') }}" class="btn btn-icon btn-3 btn-success" role="button">
                <i class="fa fa-arrow-left"></i>
                Go Back
            </a>
    </div>                
</div>
    {!! Form::close() !!}              
@endsection