@if($message = session('message'))
{{--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
    <div class="alert alert-{{ $message['type'] }} alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h5 class="text-center">{{ $message['body'] }}</h5>
    </div>
{{--</div>--}}
@endif