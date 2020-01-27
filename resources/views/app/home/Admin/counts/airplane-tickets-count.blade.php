<div class="info-box-3 bg-purple">
    <div class="icon">
        <i class="material-icons rtlIcon">person</i>
    </div>
    <div class="content">
        <div class="text">تعداد مجردها</div>
        <div class="number">
            {{ \App\Models\Soldier::where('married', false)->count() }}
        </div>
    </div>
</div>