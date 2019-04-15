@extends('settings.index')
@section('settings')
<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
    <a class="navbar-brand" href="">User List</a>
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
          <a href="{{ route('users.create') }}" role="button" class="btn btn-link text-default text-white" data-toggle="tooltip" data-placement="left" title="Add User" >  
            <span class="btn-inner--icon"></span>
            <span class="btn-inner--text"><i class="fa fa-user-plus fa-2x"></i> Add User</span>
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
          <th>No.</th>
          <th>Name</th>
          <th>Designation</th>
          <th>Birthdate</th>
          <th>Gender</th>
          <th>Mobile Number</th>
          <th>Email Address</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td>{{ $count++ .'.' }}</td>
          <td>{{ $user->last_name . ", " . $user->first_name . " " . $user->middle_name . " " }} @if($user->suffix_name == 'NOTAP') @else {{ $user->suffix_name }} @endif</td>
          <td>{{ $user->userRole['role_name'] }}</td>
          <td>{{ $user->birthdate }}</td>
          <td>{{ $user->gender }}</td>
          <td>{{ $user->mobile_number }}</td>
          <td>{{ $user->email }}</td>
          <td>
              <a  href="{{ route('users.edit',$user->id) }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
              <a data-toggle="modal" data-target="#activeInactive{{ $user->id }}"  data-toggle="tooltip" data-placement="left"
              class="btn btn-link text-{{ $user->is_active == 'Y' ? 'primary' : 'danger' }}" 
              title="{{ $user->is_active == 'Y' ? 'Deactivate' : 'Activate' }}">
              <i class="fa {{ $user->is_active == 'Y' ? 'fa-eye fa-2x' : 'fa-eye-slash fa-2x' }}"></i>
            </a>
          </td>
        </tr>

          <!-- Modal -->
          <div class="modal fade" id="activeInactive{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <h5 class="modal-title text-white">Please Confirm!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <h5>Would you like to {{ $user->is_active == 'N' ? 'Activate' : 'Deactive' }} this record?</h5>
                  {!! Form::model($user, ['route' => ['UserActivation', $user->id], 'method' => 'PUT']) !!}
                  <input type="hidden" name="is_active" id="is_active" value="{{ $user->is_active == 'N' ? 'Y' : 'N' }}">
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                {!! Form::close() !!}
              </div>
            </div>
          </div>
          <!-- End Modal -->

      @endforeach 
      </tbody>
    </table>
  </div>  
</div>
@endsection