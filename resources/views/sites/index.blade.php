@extends('layouts.app')
@section('stylesheets')

@endsection
@section('content')
<div class="loader"></div>  
<div class="row">
	<div class="col-md-2">
		<div class="card shadow border-0 border-primary">
		  <div class="card-body">
		    <h5 class="card-title" style="text-align: center;">ADMINISTRATOR FUNCTIONS</h5>
		    <p><i class="fa fa-square fa-2x" style="color:blue;"></i> SUPERVISORY</p>
		    <p><i class="fa fa-square fa-2x" style="color:green"></i> REPORTS OFFICER</p>
		    <p><i class="fa fa-square fa-2x" style="color:yellow"></i> DATA QUALITY CHECK</p>
		    <p><i class="fa fa-square fa-2x" style="color:purple"></i> TECHNICAL SUPPORT</p>
		  </div>
		</div>
	</div>
<div class="col-md-10">
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
	    <a class="navbar-brand" href="">Sites Personnel</a>
	    <div class="collapse navbar-collapse" id="nav-inner-primary">
	      <div class="navbar-collapse-header">
	        <div class="row">
	          <div class="col-6 collapse-brand">
	          </div>
	          <div class="col-6 collapse-close">
	            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-inner-primary" aria-controls="nav-inner-primary" aria-expanded="false" aria-label="Toggle navigation">
	              <span></span>
	              <span></span>
	            </button>
	          </div>
	        </div>
	      </div>
	      <ul class="navbar-nav ml-lg-auto">
	        <li class="nav-item">
	         	<a href="{{ route('sites.create') }}" role="button" class="btn btn-link text-default text-white" data-toggle="tooltip" data-placement="left" title="ADD SITE PERSONNEL" >  
	            <i class="fa fa-globe fa-2x"></i> ADD SITES PERSONNEL
	      		</a>
	        </li>
	      </ul>
	    </div>
	</nav>
	@include('partials._warmleadsSites')
</div>
@endsection
@section('scripts')

@endsection