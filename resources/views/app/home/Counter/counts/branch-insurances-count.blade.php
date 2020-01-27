<div class="info-box-3 bg-blue-grey">
    <div class="icon">
        <i class="material-icons rtlIcon">loyalty</i>
    </div>
    <div class="content">
        <div class="text">تعداد خدمات بیمه مسافر شعبه</div>
        <div class="number">
            {{ Redis::get('branch.'. Auth::user()->branch->id . '.passengerInsurancesCount') ?: 0 }}
        </div>
    </div>
</div>