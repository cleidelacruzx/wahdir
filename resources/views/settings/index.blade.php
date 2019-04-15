<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials._head')
</head>
<body>  
   
<div class="row">
  <div class="col-md-12" style="padding:0px 20px 0px 20px">
      @include('partials._navbar')
      <br>
      <div class="row">
        @include('partials._sideNavSetting')
        <div class="col-md-10">
            @yield('settings')
        </div>
      </div>
   </div>
</div>
@include('partials._script')
</body>
</html>
