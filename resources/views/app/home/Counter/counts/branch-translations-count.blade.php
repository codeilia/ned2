<div class="info-box-3 bg-pink">
    <div class="icon">
        <i class="material-icons rtlIcon">translate</i>
    </div>
    <div class="content">
        <div class="text">تعداد ترجمه های شعبه </div>
        <div class="number">
            {{ Redis::get('branch.' . Auth::user()->branch->id . '.translationsCount') ?: 0 }}
        </div>
    </div>
</div>