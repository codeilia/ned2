<div class="info-box-3 bg-orange">
    <div class="icon">
        <i class="material-icons rtlIcon">location_on</i>
    </div>
    <div class="content">
        <div class="text">تعداد بومی</div>
        <div class="number">
            {{ \App\Models\MartialInfo::where('native', true)->count() }}
        </div>
    </div>
</div>