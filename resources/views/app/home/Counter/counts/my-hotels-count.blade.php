<div class="info-box-3 bg-amber">
    <div class="icon">
        <i class="material-icons rtlIcon">hotel</i>
    </div>
    <div class="content">
        <div class="text">تعداد قرادادهای هتل من </div>
        <div class="number">
            {{ Redis::get('counter.' . Auth::user()->id . '.hotelsCount') ?: 0 }}
        </div>
    </div>
</div>