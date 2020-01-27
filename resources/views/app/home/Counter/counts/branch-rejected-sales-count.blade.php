<div class="info-box-3 bg-lime">
    <div class="icon">
        <i class="material-icons">priority_high</i>
    </div>
    <div class="content">
        <div class="text">تعداد قرارداد فروش رد شده شعبه</div>
        <div class="number">
            {{ Redis::get('branch.' . Auth::user()->branch->id . '.rejectedSalesCount') ?: 0 }}
        </div>
    </div>
</div>