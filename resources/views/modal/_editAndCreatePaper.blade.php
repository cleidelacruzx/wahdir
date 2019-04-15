  <div id="editPaper{{ $paper->id }}" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Edit Course</h4>
  	  	<form method="POST" action="{{ route('papers.update',$paper->id) }}">
				{{ csrf_field() }}  
            	<div class="row">
            		<div class="col s12">
	            		<div class="input-field col s12">
					        <input type="text" name="papers" id="papers" class="validation" value="{{ $paper->name }}"> 
					        <label for="papers">Paper</label>
					    </div>
	            	</div>
	            </div>	            	
    </div>
    @include('partials._otherFooterEdit')
  </div>