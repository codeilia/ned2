<div class="info-box-3 bg-pink">
    <div class="icon">
        <i class="material-icons rtlIcon">translate</i>
    </div>
    <div class="content">
        <div class="text">تعداد ترجمه های من </div>
        <div class="number">
            {{ Redis::get('counter.' . Auth::user()->id . '.translationsCount') ?: 0 }}
        </div>
    </div>
</div>