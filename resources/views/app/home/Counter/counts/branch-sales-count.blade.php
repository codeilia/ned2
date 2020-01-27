<div class="info-box-3 bg-orange">
    <div class="icon">
        <i class="material-icons rtlIcon">assignment</i>
    </div>
    <div class="content">
        <div class="text">تعداد قراردادهای ثبت شده‌ی شعبه</div>
        <div class="number">
            {{ Redis::get('branch.' . Auth::user()->branch->id . '.salesCount') ?: 0}}
        </div>
    </div>
</div>