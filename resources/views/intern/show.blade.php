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
              Intern Record
          </div>
          <div class="profile-comments__item">
            <div class="card-body">
              <div class="profile__avatar">
                <img src="{{ isset( $tag->image ) ? asset('img/' . $tag->image) : asset('img/default.png') }}" alt="...">
              </div>
              <div class="profile__header">
                <h4>{{ $tag->first_name . ' ' . $tag->middle_name . ' ' . $tag->last_name }}</h4>
                This record is {{ $tag->is_active == 'Y' ? 'Active' : 'Inactive' }}<br>
                Birtdate: {{ $tag->birthdate == '0000-00-00' ? '' :  date('F j, Y', strtotime($tag->birthdate)) }}<br>
                Gender: {{ $tag->gender == 'M' ? 'Male' : 'Female' }}<br>
                Start of OJT: {{ $tag->date_start == '0000-00-00' ? '' : date('F j, Y', strtotime($tag->date_start)) }} <br>
                End of OJT: {{ $tag->date_start == '0000-00-00' ? '' : date('F j, Y', strtotime($tag->date_end)) }}<br>
                Registered by : {{ $tag->user->first_name . ' ' . $tag->user->middle_name . ' ' . $tag->user->last_name . ' ' }}
                @if($tag->user->suffix_name == 'NOTAP') @else {{ $tag->user->suffix_name }} @endif
                Work Number : {{ $tag->primary_contact }} <br>
                Email : {{ $tag->email }}
              </div>
            </div>
            <div class="profile-comments__controls">
              <a href="{{ route('interns.edit',$tag->id) }}"><i class="fa fa-edit"></i></a>
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
                  <th><strong>Course :</strong></th>
                  <td>{{ $tag->courses['course'] }}</td>
                </tr>
                <tr>
                  <th><strong>School :</strong></th>
                  <td>{{ $tag->schools['school'] }}</td>
                </tr>
                <tr>
                  <th><strong>Papers :</strong></th>
                  <td>
                    @foreach($tag->tags as $tag)
                        <span class="badge badge-pill badge-primary text-uppercase">{{ $tag->name }}</span>
                    @endforeach
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection