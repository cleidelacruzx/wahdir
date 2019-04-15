@extends('layouts.app')
@section('content')
<div class="loader"></div>  
<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
    <a class="navbar-brand" href="">WAH-STAFF</a>
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
          <a href="{{ route('profile.create') }}" role="button" class="btn btn-link text-default text-white" data-toggle="tooltip" data-placement="left" title="ADD WAH-STAFF" >
            <i class="fa fa-user-plus fa-2x"></i> ADD WAH-STAFF
            </a>
        </li>
      </ul>
    </div>
</nav>

<div class="card shadow border-0  border-primary" id="example2" style="display:none">
    <div class="card-body">
                <table id="example" class="table-striped">
                    <thead>
                        <tr>
                            <th>ID.</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Date Hired</th>
                            <th>Birthdate</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($profiles as $profile)
                        <tr>
                            <td>{{ $profile->id }}</td>
                            <td style="font-size:20px;">
                              {{ 
                              $profile->first_name . " " . 
                              $profile->middle_name . " " . 
                              $profile->last_name 
                              }} {{ $profile->suffix_name == "NOTAP" ? ' ' : $profile->suffix['suffix_desc'] }}
                            </td>
                            <td>{{ $profile->designations['role_name'] }}</td>
                            <td>{{ $profile->datehired == '0000-00-00' ? '' :  date('F j, Y', strtotime($profile->datehired)) }}</td>
                            <td>{{ $profile->birthdate == '0000-00-00' ? '' :  date('F j, Y', strtotime($profile->birthdate)) }}</td>
                            <td>
                              <a  href="{{ route('profile.edit',$profile->id) }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
                              <a data-toggle="modal" data-target="#activeInactive{{ $profile->id }}"  data-toggle="tooltip" data-placement="left"
                                class="btn btn-link text-{{ $profile->is_active == 'Y' ? 'primary' : 'danger' }}" 
                                title="{{ $profile->is_active == 'Y' ? 'Deactivate' : 'Activate' }}">
                              <i class="fa {{ $profile->is_active == 'Y' ? 'fa-eye fa-2x' : 'fa-eye-slash fa-2x' }}"></i>
                              </a>
                              <a  href="{{ route('profile.show',$profile->id) }}" class="btn btn-link text-info" data-toggle="tooltip" data-placement="left" title="Show"><i class="fa fa-clipboard fa-2x"></i></a>
                            </td>

                            <!-- Modal -->
                            <div class="modal fade" id="activeInactive{{ $profile->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                @include('partials._modalActivation')
                            </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
       </div>   
    </div>   
@endsection