@extends('layouts.app')
@section('stylesheets')
  {!! Html::style('/css/show.css') !!}
@endsection
@section('content')

<div class="row">
      <div class="col-xs-12 col-sm-9">
        
        <!-- User profile -->
        <div class="card shadow">
          <div class="card-header">
              Facility Info
          </div>
          <div class="profile-comments__item">
            <div class="card-body">
              <div class="profile__avatar">
                <img src="{{ isset( $fac->image ) ? asset('img/' . $fac->image) : asset('img/default.png') }}" alt="...">
              </div>
              <div class="profile__header">
                <h4>{{ $fac->facilityConfig->facilities->hfhudname }}</h4>
                This record is {{ $fac->is_active == 'Y' ? 'Active' : 'Inactive' }}<br>
                Registered by : {{ $fac->user->first_name . ' ' . $fac->user->middle_name . ' ' . $fac->user->last_name . ' ' }}
                @if($fac->user->suffix_name == 'NOTAP') @else {{ $fac->user->suffix_name }} @endif
              </div>
            </div>
            <div class="profile-comments__controls">
              <a href="{{ route('facilityinfo.edit',$fac->id) }}"><i class="fa fa-edit"></i></a>
              <a href="/img/{{$fac->image}}" download="{{ $fac->image }}">
                <i class="fa fa-download"></i>
              </a>
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
                  <th><strong>MAYOR NAME :</strong></th>
                  <td>{{ $fac->mayors_name }}</td>
                </tr>
                <tr>
                  <th><strong>MHO NAME :</strong></th>
                  <td>{{ $fac->mho_name }}</td>
                </tr>
                <tr>
                  <th><strong>LOCAL GOVERNMENT UNIT ADDRESS :</strong></th>
                  <td>{{ $fac->lgu_address }}</td>
                </tr>
                <tr>
                  <th><strong>MOA VERSION :</strong></th>
                  <td>{{ $fac->moa_version }}</td>
                </tr>
                <tr>
                  <th><strong>MAILING ADDRESS :</strong></th>
                  <td>{{ $fac->mailing_address }} ( {{ $fac->pickup_delivery == 1 ? 'PICK-UP' : 'DELIVERY' }} )  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- start of row -->
      <div class="col-xs-12 col-sm-3">
        
        <!-- Edit user -->
        <p>
          <a href="{{ route('facilityinfo.index') }}" class="profile__contact-btn btn btn-lg btn-block btn-primary">
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
              {{ $fac->primary_contact }}
            </div>
          </div>
          <div class="profile__contact-info-item">
            <div class="profile__contact-info-icon">
              <i class="fa fa-phone"></i>
            </div>
            <div class="profile__contact-info-body">
              <h5 class="profile__contact-info-heading">Mobile number</h5>
              {{ $fac->secondary_contact }}
            </div>
          </div>
          <div class="profile__contact-info-item">
            <div class="profile__contact-info-icon">
              <i class="fa fa-envelope-square"></i>
            </div>
            <div class="profile__contact-info-body">
              <h5 class="profile__contact-info-heading">E-mail address</h5>
              {{ $fac->email }}
            </div>
          </div>
          <div class="profile__contact-info-item">
            <div class="profile__contact-info-icon">
              <i class="fa fa-map-marker"></i>
            </div>
            <div class="profile__contact-info-body">
              <h5 class="profile__contact-info-heading">Work address</h5>
              {{ $fac->secondary_email }}
            </div>
          </div>
        </div>
        <!-- end of Contact info -->.
      </div> <!-- end of row -->
    </div>



@endsection