<div class="info-box-3 bg-brown">
    <div class="icon">
        <i class="material-icons rtlIcon">card_travel</i>
    </div>
    <div class="content">
        <div class="text">تعداد خدمات ویزای شعبه</div>
        <div class="number">
            {{ Redis::get('branch.' . Auth::user()->branch->id .'.visaServicesCount') ?: 0}}
        </div>
    </div>
</div>