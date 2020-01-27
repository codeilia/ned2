<div class="info-box-3 bg-cyan">
    <div class="icon">
        <i class="material-icons rtlIcon">people</i>
    </div>
    <div class="content">
        <div class="text">تعداد کل کانتر های شعبه</div>
        <div class="number">
            {{ Redis::get("branch." . Auth::user()->branch->id . ".countersCount") ?: 0}}
        </div>
    </div>
</div>