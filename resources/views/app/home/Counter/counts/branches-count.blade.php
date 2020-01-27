<div class="info-box-3 bg-pink">
    <div class="icon">
        <i class="material-icons rtlIcon">device_hub</i>
    </div>
    <div class="content">
        <div class="text">تعداد کل شعبه ها</div>
        <div class="number">
            {{ Redis::get('branchesCount') ?: 0 }}
        </div>
    </div>
</div>