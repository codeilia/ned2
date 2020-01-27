<div class="card">
    <div class="header">
        <h2>
            {{ $title }}
            <small> {{ $description or ''}} </small>
        </h2>

        {{ $dropdown or ''}}
    </div>

    <div class="body">
        {{ $body }}
    </div>
</div>