@extends('layouts.app')

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Apologies! Your request for <?php echo ($user['role']); ?> access is yet to be approved by admin.</div>
               
            </div>
        </div>
    </div>
</div>
@endsection
