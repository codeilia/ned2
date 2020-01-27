<div class="info-box-3 bg-green">
    <div class="icon">
        <i class="material-icons">train</i>
    </div>
    <div class="content">
        <div class="text">تعداد بلیط های قطار من</div>
        <div class="number">
            {{ Redis::get('counter' . Auth::user()->id . '.trainTicketsCount') ?: 0 }}
        </div>
    </div>
</div>