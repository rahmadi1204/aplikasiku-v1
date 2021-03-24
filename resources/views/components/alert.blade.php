@if (session()->has('deleted'))
<div class="alert alert-danger alert-dismissible" style="border-radius: 0.75rem">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <p><i class="icon fas fa-ban"></i> {{ session()->get('deleted') }}!</p>
</div>
@elseif(session()->has('created'))
<div class="alert alert-success alert-dismissible" style="border-radius: 0.75rem">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <p><i class="icon fas fa-check"></i> {{ session()->get('created') }}</p>
</div>
@elseif(session()->has('updated'))
<div class="alert alert-info alert-dismissible" style="border-radius: 0.75rem">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <p><i class="icon fas fa-check"></i> {{ session()->get('updated') }}</p>
</div>
@elseif(session()->has('success'))
<div class="alert alert-success alert-dismissible" style="border-radius: 0.75rem">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <p><i class="icon fas fa-check"></i> {{ session()->get('success') }}</p>
</div>
@elseif(session()->has('failed'))
<div class="alert alert-danger alert-dismissible" style="border-radius: 0.75rem">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <p><i class="icon fas fa-check"></i> {{ session()->get('failed') }}</p>
</div>
@elseif(session()->has('errorLogin'))
<div class="x_content bs-example-popovers" style="border-radius: 0.75rem">
    <div class="alert alert-danger alert-dismissible " role="alert">
    <strong>Username / Password Salah
</div>
@endif
