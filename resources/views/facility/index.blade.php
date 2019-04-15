@extends('settings.index')
@section('settings') 
<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
  <a class="navbar-brand" href="">FACILITY CONFIG</a>
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
        <a href="{{ route('facility.create') }}" role="button" class="btn btn-link text-default text-white" data-toggle="tooltip" data-placement="left" title="ADD FACILITY CONFIG" >  
          <i class="fa fa-user-plus fa-2x"></i> ADD FACILITY CONFIG
        </a>
      </li>
    </ul>
  </div>
</nav>

<div class="card shadow border-0" id="example2" style="display:none">
  <div class="card-body">  
    <table id="example" class="table-striped">
      <thead>
        <tr>
          <th>ID.</th>
          <th>Region</th>
          <th>Province</th>
          <th>Municipality</th>
          <!-- <th>Barangay</th> -->
          <th>Facility Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($facilities as $facility)
        <tr>
          <td>{{ $facility->id }}</td>
          <td>{{ $facility->region['region_name'] }}</td>
          <td>{{ $facility->province['province_name'] }}</td>
          <td>{{ $facility->municipality['muncity_name'] }}</td>
          <td>{{ $facility->facilities['hfhudname'] }}</td>
          <td>
            <a  href="{{ route('facility.edit',$facility->id) }}" class="btn btn-link text-info" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
            <a data-toggle="modal" data-target="#deleteCourse{{ $facility->id }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Delete"><i class="fa fa-trash fa-2x"></i></a>
            <a data-toggle="modal" data-target="#activeInactive{{ $facility->id }}"  data-toggle="tooltip" data-placement="left"
                  class="btn btn-link text-{{ $facility->is_active == 'Y' ? 'primary' : 'danger' }}" 
                  title="{{ $facility->is_active == 'Y' ? 'Deactivate' : 'Activate' }}">
                <i class="fa {{ $facility->is_active == 'Y' ? 'fa-eye fa-2x' : 'fa-eye-slash fa-2x' }}"></i>
            </a>
          </td>
        </tr>

            <!-- Modal -->
            <div class="modal fade" id="activeInactive{{ $facility->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Please Confirm!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <h5>Would you like to {{ $facility->is_active == 'N' ? 'Activate' : 'Deactive' }} this record?</h5>
                    <h5>Site Personnel under this Facility Record will also {{ $facility->is_active == 'N' ? 'Activated' : 'Deactived' }}?</h5>
                    {!! Form::model($facility, ['route' => ['facilityActivation', $facility->id], 'method' => 'PUT']) !!}
                    <input type="hidden" name="is_active" id="is_active" value="{{ $facility->is_active == 'N' ? 'Y' : 'N' }}">
                        <div class="form-group">
                          {{ Form::label('deactivation_date','DATE OF END OF DEACTIVATION?') }}
                          {{ Form::date('deactivation_date',null,['class'=>'form-control','id'=>'deactivation_date','name'=>'deactivation_date']) }}
                        </div>
                        <div class="form-group">
                        <div class="form-group">
                          {{ Form::label('remarks','REMARKS:') }}
                          {{ Form::textarea('remarks',null,['class'=>'form-control','id'=>'remarks','name'=>'remarks','rows' => '3']) }}
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    {{ Form::button('Save', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                    {{ Form::button('Close', ['type' => 'submit', 'class' => 'btn btn-secondary' , 'data-dismiss' => 'modal'] )  }}
                  </div>
                  {!! Form::close() !!}
                </div>
              </div>
            </div>
            <!-- Modal -->

            <!--modal -->
            <div class="modal fade" id="deleteCourse{{ $facility->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Please Confirm!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                 <div class="modal-body">
                    <form method="POST" action="{{ route('facility.destroy',$facility->id) }}">
                    {{ csrf_field() }}  
                    <h5>Would you like to Delete this record?</h5>
                 </div>
                  <div class="modal-footer">
                    {{ Form::button('Save', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                    {{ Form::button('Close', ['type' => 'submit', 'class' => 'btn btn-secondary' , 'data-dismiss' => 'modal'] )  }}
                    {{ method_field('DELETE') }}
                    </div>
                    </form>
                  </div>
                </div>
            </div>
          </div>
          <!-- Modal -->

        @endforeach         
      </tbody>
    </table>
  </div>  
</div>

@endsection
@section('scripts')        
    @include('partials._sitesScript')
@endsection
