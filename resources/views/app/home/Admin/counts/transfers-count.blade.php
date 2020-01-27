<div class="info-box-3 bg-grey">
    <div class="icon">
        <i class="material-icons rtlIcon">swap_vert</i>
    </div>
    <div class="content">
        <div class="text">تعداد ترانسفر در اختیار ها </div>
        <div class="number">
            {{ Redis::get('transfersCount') ?: 0 }}
        </div>
    </div>
</div>