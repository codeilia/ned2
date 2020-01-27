<div class="panel-group" id="accordion_9" role="tablist" aria-multiselectable="true">
    @foreach($collapses as $collapse)
        <div class="panel panel-col-pink">
            <div class="panel-heading" role="tab" id="headingOne_{{$collapse->id}}">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion_9" href="#collapseOne_{{$collapse->id}}" aria-expanded="true" aria-controls="collapseOne_9">
                        گروه اول
                    </a>
                </h4>
            </div>
            <div id="collapseOne_{{$collapse->id}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_{{$collapse->id}}">
                <div class="panel-body">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.

                </div>
            </div>
        </div>
    @endforeach
</div>