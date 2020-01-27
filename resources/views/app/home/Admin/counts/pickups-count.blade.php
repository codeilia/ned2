<div class="info-box-3 bg-deep-purple">
    <div class="icon">
        <i class="material-icons rtlIcon">pie_chart</i>
    </div>
    <div class="content">
        <div class="text">تعداد پیکاپ ها</div>
        <div class="number">
            {{ Redis::get('pickupsCount') ?: 0 }}
        </div>
    </div>
</div>