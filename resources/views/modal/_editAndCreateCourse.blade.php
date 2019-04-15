  <div id="editCourse{{ $course->id }}" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4>Edit Course</h4>
      	  	<form method="POST" action="{{ route('course.update',$course->id) }}">
    				{{ csrf_field() }}  
                	<div class="row">
                		<div class="col s12">
    	            		<div class="input-field col s12">
    					        <input type="text" name="course" id="course" class="validation" value="{{ $course->course }}"> 
    					        <label for="course">Course</label>
    					    </div>
    	            	</div>
    	            </div>	            	
        </div>
        <div class="modal-footer">
          <button type="submit" class="waves-effect waves-light btn right">UPDATE<i class="material-icons right">send</i></button>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">CLOSE</a>
            {{ method_field('PUT') }}
        </div>
        </form>
  </div>