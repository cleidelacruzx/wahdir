@extends('layouts.app')
@section('content')
<div class="card shadow">
    <div class="card-header border-primary text-white bg-primary">
            {{ isset($sites) ? 'EDIT INTERN' : 'CREATE INTERN' }}
	</div>
	    <div class="card-body">
	        @if(isset($intern))
	        {!! Form::model($intern, ['route' => ['interns.update', $intern->id], 'method' => 'PUT', 'files' => true]) !!}
	        <input type="hidden" name="is_active" id="is_active" value="{{ $intern->is_active == 'Y' ? 'Y' : 'N' }}">
	        @else
	        {!! Form::open(['route'=>'interns.store','method'=>'POST', 'files' => true]) !!}
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
	                {{ Form::select('suffix_name', $suffix,isset($intern) ? null : 'NOTAP', ['class' => 'form-control','id' => 'suffix_name','name' => 'suffix_name']) }}
	            </div>
	        </div>
	        <div class="row">
	                <div class="col-md-5">
	                    {{ Form::label('school_id','SCHOOL') }}
	                    @if(isset($intern->school_id))
	                    {{ Form::select('school_id', $schools,null, ['class' => 'form-control','id' => 'school_id','name' => 'school_id']) }}
	                    @else
	                    <select type="text" name="school_id" id="school_id" class="form-control">
	                    <option value="" disabled selected>Choose your option</option>
	                        @foreach(App\InternSchool::get() as $school)
	                        <option value="{{ $school['id'] }}">{{ $school['school'] }}</option>
	                        @endforeach
	                    </select>
	                    @endif 
	                </div>
	                <div class="col-md-5">
	                    {{ Form::label('course_id','COURSE') }}
	                    @if(isset($intern->course_id))
	                    {{ Form::select('course_id', $courses,null, ['class' => 'form-control','id' => 'course_id','name' => 'course_id']) }}
	                    @else
	                    <select type="text" name="course_id" id="course_id" class="form-control">
	                       <option value="" disabled selected>Choose your option</option>
	                        @foreach( App\InternCourse::get() as $course)
	                        <option value="{{ $course['id'] }}">{{ $course['course'] }}</option>
	                        @endforeach
	                    </select>
	                    @endif 
	                </div>
	                <div class="col-md-2">
	                    {{ Form::label('gender', "GENDER") }}
	                    {{ Form::select('gender', ['M' => 'M', 'F' => 'F'],isset($intern) ? null : 'M', ['class' => 'form-control','id' => 'gender','name' => 'gender']) }}
	                </div>
	        </div> 
	        <div class="row">
	                <div class="col-md-10">
	                    {{ Form::label('tags','PAPERS') }}
	                    @if(isset($intern->tags))
	                    {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi','id'=>'tags','multiple' => 'multiple']) }}
	                    @else
	                    <select type="text" name="tags[]" id="tags" class="form-control select2-multi" multiple="multiple">
	                        @foreach($tags as $tag)
	                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
	                        @endforeach
	                    </select> 
	                    @endif  
	                </div>
	                <div class="col-md-2">
	                    {{ Form::label('birthdate','BIRTHDATE') }}
	                    {{ Form::date('birthdate',null,['class'=>'form-control','id'=>'birthdate','name'=>'birthdate']) }} 
	                </div>
	        </div>
	        <div class="row">
	                <div class="col-md-4">
	                    {{ Form::label('primary_contact','CONTACT NUMBER') }}
	                    {{ Form::text('primary_contact',null,['class'=>'form-control','id'=>'primary_contact']) }}
	                </div>
	                <div class="col-md-4">
	                    {{ Form::label('email','EMAIL NUMBER') }}
	                    {{ Form::email('email',null,['class'=>'form-control','id'=>'email']) }} 
	                </div>
	                <div class="col-md-2">
	                    {{ Form::label('date_start','DATE START') }}
	                    {{ Form::date('date_start',null,['class'=>'form-control','id'=>'date_start']) }}
	                </div>
	                <div class="col-md-2">
	                    {{ Form::label('date_end','DATE END') }}
	                    {{ Form::date('date_end',null,['class'=>'form-control','id'=>'date_end']) }}
	                </div>
	        </div> 
	        <br>
	        <div class="form-group">
	            <label for="image">Upload Image:</label>
	            {{ Form::file('image',null,['class'=>'form-control','id'=>'image','name'=>'image']) }} 
	        </div>
	    </div>
	    <div class="card-footer border-primary">
	            {{ Form::button( isset($intern) ? '<i class="fa fa-save"></i> Save Changes' : '<i class="fa fa-save"></i> Submit', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
	            <a href="{{ route('interns.index') }}" class="btn btn-icon btn-3 btn-success" role="button">
	                <i class="fa fa-arrow-left"></i>
	                Go Back
	            </a>
	    </div>               
</div>
    {!! Form::close() !!}
@endsection
@section('scripts')
    <script>
        $('.select2-multi').select2({
            width: 'resolve',
            placeholder: 'Choose Paper'
        });
        @if(isset($intern))
        $('.select2-multi').select2().val({!! json_encode($intern->tags()->getRelatedIds()) !!}).trigger('change');
    	@endif
    </script>
@endsection