@extends('layouts.app')
  {!! Html::style('/css/show.css') !!}
@section('content')
<div class="row">
      <div class="col-xs-12 col-sm-9">
        <!-- User profile -->
        <div class="card shadow">
          <div class="card-header">
              Site Record
          </div>
          <div class="profile-comments__item">
            <div class="card-body">
              <div class="profile__avatar">
                <img src="{{ isset( $sites->image ) ? asset('img/' . $sites->image) : asset('img/default.png') }}" alt="...">
              </div>
              <div class="profile__header">
                <h4>{{ $sites->first_name . ' ' . $sites->middle_name . ' ' . $sites->last_name . ' ' }}</h4>
                {{ $sites->designations['sites_desc'] }}<br>
                This record is {{ $sites->is_active == 'Y' ? 'Active' : 'Inactive' }}
                Birtdate: {{ $sites->birthdate == '0000-00-00' ? '' :  date('F j, Y', strtotime($sites->birthdate)) }}<br>
                Gender: {{ $sites->gender == 'M' ? 'Male' : 'Female' }}<br>
                Registered by : {{ $sites->user->first_name . ' ' . $sites->user->middle_name . ' ' . $sites->user->last_name . ' ' }}
                @if($sites->user->suffix_name == 'NOTAP') @else {{ $sites->user->suffix_name }} @endif
              </div>
            </div>
            <div class="profile-comments__controls">
              <a href="{{ route('sites.edit',$sites->id) }}"><i class="fa fa-edit"></i></a>
            </div>
          </div>
        </div>
        <br>
        <!-- User info -->
        <div class="card shadow">
          <div class="card-header">
              Other Details
          </div>
          <div class="card-body">
            <table class=" profile__table">
              <tbody>
                <tr>
                  <th><strong>Admin Function :</strong></th>
                  <td>{{ $sites->systemAdmin['functions'] }}</td>
                </tr>
                <tr>
                  <th><strong>Facility Name :</strong></th>
                  <td>{{ $sites->facilityConfig->facilities->hfhudname }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

<!--     Latest posts
        <div class="panel panel-default">
          <div class="panel-heading">
          <h4 class="panel-title">Latest posts</h4>
          </div>
          <div class="panel-body">
            <div class="profile__comments">
              <div class="profile-comments__item">
                <div class="profile-comments__controls">
                  <a href="#"><i class="fa fa-share-square-o"></i></a>
                  <a href="#"><i class="fa fa-edit"></i></a>
                  <a href="#"><i class="fa fa-trash-o"></i></a>
                </div>
                <div class="profile-comments__avatar">
                  <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="...">
                </div>
                <div class="profile-comments__body">
                  <h5 class="profile-comments__sender">
                    Richard Roe <small>2 hours ago</small>
                  </h5>
                  <div class="profile-comments__content">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, corporis. Voluptatibus odio perspiciatis non quisquam provident, quasi eaque officia.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->

      </div>

      <!-- start of row -->
      <div class="col-xs-12 col-sm-3">
        
        <!-- Edit user -->
        <p>
          <a href="{{ route('sites.index') }}" class="profile__contact-btn btn btn-lg btn-block btn-primary">
            BACK
          </a>
        </p>

        <hr class="profile__contact-hr">
        
        <!-- Contact info -->
        <div class="profile__contact-info">
          <div class="profile__contact-info-item">
            <div class="profile__contact-info-icon">
              <i class="fa fa-phone"></i>
            </div>
            <div class="profile__contact-info-body">
              <h5 class="profile__contact-info-heading">Work number</h5>
              {{ $sites->primary_contact }}
            </div>
          </div>
          <div class="profile__contact-info-item">
            <div class="profile__contact-info-icon">
              <i class="fa fa-phone"></i>
            </div>
            <div class="profile__contact-info-body">
              <h5 class="profile__contact-info-heading">Mobile number</h5>
              {{ $sites->secondary_contact }}
            </div>
          </div>
          <div class="profile__contact-info-item">
            <div class="profile__contact-info-icon">
              <i class="fa fa-envelope-square"></i>
            </div>
            <div class="profile__contact-info-body">
              <h5 class="profile__contact-info-heading">E-mail address</h5>
              {{ $sites->email }}
            </div>
          </div>
          <div class="profile__contact-info-item">
            <div class="profile__contact-info-icon">
              <i class="fa fa-map-marker"></i>
            </div>
            <div class="profile__contact-info-body">
              <h5 class="profile__contact-info-heading">Work address</h5>
              {{ $sites->secondary_email }}
            </div>
          </div>
        </div>
        <!-- end of Contact info -->.
      </div> <!-- end of row -->
    </div>
@endsection