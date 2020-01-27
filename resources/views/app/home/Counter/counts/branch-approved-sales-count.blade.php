<div class="info-box-3 bg-teal">
    <div class="icon">
        <i class="material-icons">done</i>
    </div>
    <div class="content">
        <div class="text">تعداد قراردادهای تایید شده شعبه</div>
        <div class="number">
            {{ Redis::get('branch.' . Auth::user()->branch->id . '.approvedSalesCount') ?: 0}}
        </div>
    </div>
</div>