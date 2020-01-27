<div class="info-box-3 bg-purple">
    <div class="icon">
        <i class="material-icons rtlIcon">airplanemode_active</i>
    </div>
    <div class="content">
        <div class="text">تعداد بلیط های هواپیمای شعبه</div>
        <div class="number">
            {{ Redis::get('branch' . Auth::user()->branch->id . '.airplaneTicketsCount') ?: 0}}
        </div>
    </div>
</div>