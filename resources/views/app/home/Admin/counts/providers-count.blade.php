<div class="info-box-3 bg-light-green">
    <div class="icon">
        <i class="material-icons rtlIcon">domain</i>
    </div>
    <div class="content">
        <div class="text">تعداد کل واحدها و معاونت ها</div>
        <div class="number">
            {{ \App\Models\Unit::count() }}
        </div>
    </div>
</div>