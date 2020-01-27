<div class="info-box-3 bg-amber">
    <div class="icon">
        <i class="material-icons rtlIcon">hotel</i>
    </div>
    <div class="content">
        <div class="text">تعداد قرادادهای هتل شعبه </div>
        <div class="number">
            {{ Redis::get('branch.' . Auth::user()->branch->id . '.hotelsCount') ?: 0 }}
        </div>
    </div>
</div>