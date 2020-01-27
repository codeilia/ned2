<div class="info-box-3 bg-red">
    <div class="icon">
        <i class="material-icons rtlIcon">redeem</i>
    </div>
    <div class="content">
        <div class="text">تعداد پکیج های من</div>
        <div class="number">
            {{ Redis::get('counter.' . Auth::user()->id . '.packagesCount') ?: 0 }}
        </div>
    </div>
</div>