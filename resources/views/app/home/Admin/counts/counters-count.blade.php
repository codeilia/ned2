<div class="info-box-3 bg-cyan">
    <div class="icon">
        <i class="material-icons rtlIcon">directions_walk</i>
    </div>
    <div class="content">
        <div class="text">تعداد کل ناویان مشغول به خدمت</div>
        <div class="number">
            {{ \App\Models\Soldier::where('archive', '!=', 1)->count() }}
        </div>
    </div>
</div>