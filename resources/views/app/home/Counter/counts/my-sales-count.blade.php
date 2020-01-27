<div class="info-box-3 bg-orange">
    <div class="icon">
        <i class="material-icons rtlIcon">assignment</i>
    </div>
    <div class="content">
        <div class="text">تعداد قراردادهای ثبت شده من</div>
        <div class="number">
            {{ Redis::get('counter.' . Auth::user()->id . '.salesCount') ?: 0}}
        </div>
    </div>
</div>