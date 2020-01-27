<div class="info-box-3 bg-pink">
    <div class="icon">
        <i class="material-icons rtlIcon">people</i>
    </div>
    <div class="content">
        <div class="text">تعداد کل ناویان</div>
        <div class="number">
            {{ \App\Models\Soldier::count() }}
        </div>
    </div>
</div>