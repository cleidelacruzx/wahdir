  <div id="editSchool{{ $school->id }}" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Edit School</h4>
  	  	<form method="POST" action="{{ route('school.update',$school->id) }}">
				{{ csrf_field() }}  
            	<div class="row">
            		<div class="col s12">
	            		<div class="input-field col s12">
					        <input type="text" name="school" id="school" class="validation" value="{{ $school->school }}"> 
					        <label for="school">School</label>
					    </div>
	            	</div>
	            </div>	            	
    </div>
@include('partials._otherFooterEdit')
  </div>
