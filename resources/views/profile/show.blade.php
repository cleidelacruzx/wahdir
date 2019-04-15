@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-2">
      <div class="card shadow" style="width: 16rem;">
        <img class="card-img-top" src="{{ isset( $profile->image ) ? asset('img/' . $profile->image) : asset('img/default.png') }}" style="height: 15rem;" alt="Card image cap">
        <div class="card-body">
          <h5>{{ $profile-> first_name . ' ' . $profile->middle_name . ' ' . $profile->last_name }}</h5>
          <p class="card-text">Registered by : {{ $profile->user->first_name . ' ' . $profile->user->middle_name . ' ' . $profile->user->last_name . ' ' }}</p>
          {{ $profile->mailing_address }}   
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <ul class="nav nav-pills mb-2" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">GENERAL</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">INFORMATION</a>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="card shadow">
              <div class="card-body">
                <h5 class="card-title">{{ $profile->designations['role_name'] }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">This record is {{ $profile->is_active == 'Y' ? 'Active' : 'Inactive' }}</h6>
                <p class="card-text">
                  Birthdate: {{ $profile->birthdate == '0000-00-00' ? '' :  date('F j, Y', strtotime($profile->birthdate)) }}<br>
                  Gender: {{ $profile->gender == 'M' ? 'Male' : 'Female' }}<br>
                  Primary Contact: {{ $profile->primary_contact }}<br>
                  Mobile Number: {{ $profile->secondary_contact }}<br>
                  Email: {{ $profile->email }}<br>
                  Secondary Email: {{ $profile->secondary_email }}
                </p>
              </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="card shadow">
              <div class="card-body ">
                <p class="card-text">
                  <div class="row">
                    <div class="col-md-6">
                      SECONDARY CONTACT
                    </div>
                    <div class="col-md-6">
                      {{ $profile->secondary_contact }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      SECONDARY EMAIL
                    </div>
                    <div class="col-md-6">
                      {{ $profile->secondary_email }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      PHILHEALTH
                    </div>
                    <div class="col-md-6">
                      {{ $profile->philhealth }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      WAH EMPLOYEE NUMBER
                    </div>
                    <div class="col-md-6">
                      {{ $profile->wahemployeenumber }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      PGT EMPLOYEE NUMBER
                    </div>
                    <div class="col-md-6">
                      {{ $profile->pgtemployeenumber }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      METROBANK ACCOUNT
                    </div>
                    <div class="col-md-6">
                      {{ $profile->metrobankaccount }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      LANDBANK ACCOUNT
                    </div>
                    <div class="col-md-6">
                      {{ $profile->landbankaccount }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      SSS
                    </div>
                    <div class="col-md-6">
                      {{ $profile->sss }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      TIN
                    </div>
                    <div class="col-md-6">
                      {{ $profile->tin }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      HDMF NO
                    </div>
                    <div class="col-md-6">
                      {{ $profile->pagibighdmf }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      MABUHAY MILES NO
                    </div>
                    <div class="col-md-6">
                      {{ $profile->mabuhaymilespal }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      CEBU PAC GET GO NO
                    </div>
                    <div class="col-md-6">
                      {{ $profile->getgocebupac }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      CONTACT PERSON
                    </div>
                    <div class="col-md-6">
                      {{ $profile->contact_person }}
                    </div>
                  </div>  
                </p>
                <a href="{{ route('profile.edit',$profile->id) }}" class="btn btn-primary">Edit Partner</a>
              </div>
            </div>
        </div>
      </div>  
</div>
<div class="col-md-4">

</div>
</div>
@endsection