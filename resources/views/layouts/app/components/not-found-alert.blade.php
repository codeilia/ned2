 <div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    <h5 class="text-center">
        @if(isset($object))
            <span> در حال حاضر</span>
            <span>{{ $object or '' }} </span>
            <span> در انبار موجود نیست</span>
        @else
            <span>{{ $customMessage }}</span>
        @endif
    </h5>
</div>