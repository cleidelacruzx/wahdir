
                <!-- Navbar primary -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary mt-1">
            <a class="navbar-brand" href="#">
              <img src="/img/wah_logo.png" class="img-responsive" width="auto" height="auto" alt="">
              WAH DIRECTORY
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-primary" aria-controls="navbar-primary" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-primary">
              <div class="navbar-collapse-header">
                <div class="row">
                  <div class="col-6 collapse-brand">
                  </div>
                  <div class="col-6 collapse-close">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-primary" aria-controls="navbar-primary" aria-expanded="false" aria-label="Toggle navigation">
                      <span></span>
                      <span></span>
                    </button>
                  </div>
                </div>
              </div>
              <ul class="navbar-nav ml-lg-auto">
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/partner')}}">PARTNERS
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/profile')}}">WAH-STAFF
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/sites')}}">SITES PERSONNEL
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/facilityinfo')}}">FACILITY INFO
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/interns')}}">INTERNS</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" href="#" id="navbar-primary_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="nav-link-inner--text">{{ Auth::user()->first_name }}</span>
                      <i class="fa fa-ellipsis-v"></i>
                  </a>    
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-primary_dropdown_1">
                    @if(Auth::user()->is_admin == 'Y')
                    <a class="dropdown-item" href="{{ url('/settings')}}">
                      <span class="fa fa-cog"></span>
                      Setting
                    </a>
                    <div class="dropdown-divider"></div>
                    @else
                    @endif
                    <a class="dropdown-item" href="{{ url('/logout') }}">
                      <span class="fa fa-power-off"></span>
                      Logout
                    </a>
                  </div>
                </li>
              </ul>
            </div>
        </nav>