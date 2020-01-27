<div class="info-box-3 bg-lime">
    <div class="icon">
        <i class="material-icons">priority_high</i>
    </div>
    <div class="content">
        <div class="text">تعداد قرارداد فروش رد شده من</div>
        <div class="number">
            {{ Redis::get('counter.' . Auth::user()->id . '.rejectedSalesCount') ?: 0 }}
        </div>
    </div>
</div>