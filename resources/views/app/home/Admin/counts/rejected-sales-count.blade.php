<div class="info-box-3 bg-lime">
    <div class="icon">
        <i class="material-icons">wc</i>
    </div>
    <div class="content">
        <div class="text">تعداد متاهل</div>
        <div class="number">
            {{ \App\Models\Soldier::where('married', true)->count() }}
        </div>
    </div>
</div>