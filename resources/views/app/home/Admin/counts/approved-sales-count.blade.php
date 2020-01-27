<div class="info-box-3 bg-teal">
    <div class="icon">
        <i class="material-icons">location_off</i>
    </div>
    <div class="content">
        <div class="text">تعداد غیر بومی</div>
        <div class="number">
            {{ \App\Models\MartialInfo::where('native', false)->count() }}
        </div>
    </div>
</div>