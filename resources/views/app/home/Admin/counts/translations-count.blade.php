<div class="info-box-3 bg-pink">
    <div class="icon">
        <i class="material-icons rtlIcon">translate</i>
    </div>
    <div class="content">
        <div class="text">تعداد ترجمه ها </div>
        <div class="number">
            {{ Redis::get('translationsCount') ?: 0 }}
        </div>
    </div>
</div>