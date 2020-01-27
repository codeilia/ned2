@if(count($errors))
    <div class="alert alert-danger">
        <h4>خطا</h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif