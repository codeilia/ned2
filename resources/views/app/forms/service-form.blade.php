<div class="panel-group" id="accordion_9" role="tablist" aria-multiselectable="true">
    @foreach($services as $service)
        <div class="panel panel-col-cyan">
            <div class="panel-heading" role="tab" id="headingOne_{{$service}}">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion_9" href="#collapseOne_{{$service}}" aria-expanded="true" aria-controls="collapseOne_9">
                        <span>فرم</span>
                        <span>{{ \App\ServiceForm::getName($service) }}</span>
                    </a>
                </h4>
            </div>
            <div id="collapseOne_{{$service}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne_{{$service}}">
                <div class="panel-body">
                    @if ($service == 1)
                        @include('app.forms.airplane-ticket')
                    @endif

                    @if ($service == 2)
                        @include('app.forms.train-ticket')
                    @endif

                    @if ($service == 3)
                        @include('app.forms.partner-agency-package')
                    @endif

                    @if ($service == 4)
                        @include('app.forms.visa-service')
                    @endif

                    @if ($service == 5)
                        @include('app.forms.passenger_insurance')
                    @endif

                    @if ($service == 6)
                        @include('app.forms.pickup')
                    @endif

                    @if ($service == 7)
                        @include('app.forms.hotel')
                    @endif

                    @if ($service == 8)
                        @include('app.forms.translation')
                    @endif

                    @if ($service == 9)
                        @include('app.forms.transfer')
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>