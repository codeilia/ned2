<div class="info-box-3 bg-purple">
    <div class="icon">
        <i class="material-icons rtlIcon">airplanemode_active</i>
    </div>
    <div class="content">
        <div class="text">تعداد بلیط های هواپیمای من</div>
        <div class="number">
            {{ Redis::get('counter' . Auth::user()->id . '.airplaneTicketsCount') ?: 0}}
        </div>
    </div>
</div>