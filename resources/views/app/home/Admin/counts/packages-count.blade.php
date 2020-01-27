<div class="info-box-3 bg-red">
    <div class="icon">
        <i class="material-icons rtlIcon">redeem</i>
    </div>
    <div class="content">
        <div class="text">تعداد پکیج های آژانس های همکار</div>
        <div class="number">
            {{ Redis::get('packagesCount') ?: 0 }}
        </div>
    </div>
</div>