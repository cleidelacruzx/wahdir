@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-2">
      <div class="card shadow" style="width: 16rem;">
        <img class="card-img-top" src="{{ isset( $partner->image ) ? asset('img/' . $partner->image) : asset('img/default.png') }}" style="height: 15rem;" alt="Card image cap">
        <div class="card-body">
          <h5>{{ $partner-> first_name . ' ' . $partner->middle_name . ' ' . $partner->last_name }}</h5>
          <p class="card-text">Registered by : {{ $partner->user->first_name . ' ' . $partner->user->middle_name . ' ' . $partner->user->last_name . ' ' }}</p>
          {{ $partner->mailing_address }}   
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
                <h5 class="card-title">{{ $partner->partnerDesignation['designation'] }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">This record is {{ $partner->is_active == 'Y' ? 'Active' : 'Inactive' }}</h6>
                <p class="card-text">
                  Birtdate: {{ $partner->birthdate == '0000-00-00' ? '' :  date('F j, Y', strtotime($partner->birthdate)) }}<br>
                  Gender: {{ $partner->gender == 'M' ? 'Male' : 'Female' }}<br>
                </p>
              </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="card shadow">
              <div class="card-body">
                <h5 class="card-title">{{ $partner->partnerOrganization['organization'] }}</h5>
                <p class="card-text">
                  Primary Contact: {{ $partner->primary_contact }}<br>
                  Mobile Number: {{ $partner->secondary_contact }}<br>
                  Email: {{ $partner->email }}<br>
                  Secondary Email: {{ $partner->secondary_email }}
                </p>
                <a href="{{ route('partner.edit',$partner->id) }}" class="btn btn-primary">Edit Partner</a>
              </div>
            </div>
        </div>
      </div>

    <br>

<div class="row">
  <div class="col-md-12">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
      <a class="navbar-brand" href="">Add Comments</a>
      @include('partials._headerNav')
          <a data-toggle="modal" data-target="#createComment" class="btn btn-link text-white" data-toggle="tooltip" data-placement="left" title="Add Comments">
                <i class="fa fa-building"></i>
                Add Comments
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="card shadow border-0" id="example2" style="display:none">
      <div class="card-body"> 
        <table class="table" id="example">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Comment</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            @foreach($partner->comments as $comment)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $comment->name }}</td>
              <td>{{ $comment->email }}</td>
              <td>{{ $comment->comment }}</td>
              <td>
                <a data-toggle="modal" data-target="#editComment{{ $comment->id }}" class="btn btn-link text-info" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
                <a  href="{{ route('comments.show',$comment->id) }}" class="btn btn-link text-primary" data-toggle="tooltip" data-placement="left" title="Show"><i class="fa fa-eye fa-2x"></i></a>
                <a data-toggle="modal" data-target="#deleteComment{{ $comment->id }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Delete"><i class="fa fa-trash fa-2x"></i></a>
              </td>
            </tr>

            <!--modal Edit -->
            <div class="modal fade" id="editComment{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">EDIT COMMENT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="text-white">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    {!! Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) !!}
                      {{ csrf_field() }} 
                      <div class="row">
                        <div class="col-md-6">
                            {{ Form::label('name','NAME') }}
                            {{ Form::text('name',null,['class'=>'form-control','id'=>'name','required' => 'required']) }} 
                        </div>
                        <div class="col-md-6">
                            {{ Form::label('email','EMAIL') }}
                            {{ Form::text('email',null,['class'=>'form-control','id'=>'email','required' => 'required']) }} 
                        </div>
                      </div>  
                      <div class="row">
                            <div class="col-md-12">
                              {{ Form::label('comment','COMMENT') }}
                              {{ Form::textarea('comment',null,['class'=>'form-control','id'=>'comment','rows'=>'2','required' => 'required']) }} 
                            </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                    {!! Form::close() !!}    
                </div>
              </div>
            </div>
            <!--modal Edit -->

            <!--modal Delete -->
            <div class="modal fade" id="deleteComment{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-primary">
                      <h5 class="modal-title text-white">Please Confirm!</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">×</span>
                      </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="{{ route('comments.destroy',$comment->id) }}">
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
            <!--modal Delete -->

            @endforeach
          </tbody>  
        </table>
      </div>  
    </div>
  </div>
</div>  

    <div class="modal fade" id="createComment" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">ADD COMMENT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" class="text-white">×</span>
                </button>
              </div>
              <div class="modal-body">
                {!! Form::open(['route' => ['comments.store', $partner->id], 'method' => 'POST']) !!}
                  {{ csrf_field() }} 
                  <div class="row">
                    <div class="col-md-6">
                        {{ Form::label('name','NAME') }}
                        {{ Form::text('name',null,['class'=>'form-control','id'=>'name','required' => 'required']) }} 
                    </div>
                    <div class="col-md-6">
                        {{ Form::label('email','EMAIL') }}
                        {{ Form::text('email',null,['class'=>'form-control','id'=>'email','required' => 'required']) }} 
                    </div>
                  </div>  
                  <div class="row">
                        <div class="col-md-12">
                          {{ Form::label('comment','COMMENT') }}
                          {{ Form::textarea('comment',null,['class'=>'form-control','id'=>'comment','rows'=>'2','required' => 'required']) }} 
                        </div>
                  </div>

                  
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
                {!! Form::close() !!}    
            </div>
          </div>
        </div>
</div>
<div class="col-md-4">

</div>
</div>
@endsection