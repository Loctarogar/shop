@if(Auth::guard("web")->check())
  <p class="text-success">
    You are Logged in as a User
  </p>
@else
  <p class="text-danger">
    You are Logged out as a User
  </p>
@endif

@if(Auth::guard("admin")->check())
  <p class="text-success">
    You are Logged in as an ADMIN
  </p>
@else
  <p class="text-danger">
    You are Logged out as an ADMIN
  </p>
@endif
