@if(Auth::guard('web')->check())

    <p class="text-success">
        You are logged In as a <strong>USER</strong>
    </p>
@else
    <p class="text-danger">
        You are logged Out as a <strong>USER</strong>
    </p>

@endif

@if(Auth::guard('admin')->check())

    <p class="text-success">
        You are logged In as an <strong>MERCHANT</strong>
    </p>
@else
    <p class="text-danger">
        You are logged Out as a <strong>MERCHANT</strong>
    </p>

@endif
