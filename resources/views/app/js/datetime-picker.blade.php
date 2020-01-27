<script src="{{ URL::asset('js/persian-date-0.1.8.min.js') }}"></script>
<script src="{{ URL::asset('js/persian-datepicker-0.4.5.min.js') }}"></script>

<script>
    $(window).bind('load',function () {
        var datePickerInput =  $('.datePicker');
        datePickerInput.pDatepicker({
            persianDigit: true,
            viewMode: false,
            position: "auto",
            autoClose: false,
            format: false,
            observer: true,
            altField: false,
            inputDelay: 800,
            formatter: function (unixDate) {
                var self = this;
                var pdate = new persianDate(unixDate);
                pdate.formatPersian = false;
                return pdate.format(self.format);
            },
            altFormat: 'unix',
            altFieldFormatter: function (unixDate) {
                var self = this;
                var thisAltFormat = self.altFormat.toLowerCase();
                if (thisAltFormat === "gregorian" | thisAltFormat === "g") {
                    return new Date(unixDate);
                }
                if (thisAltFormat === "unix" | thisAltFormat === "u") {
                    return unixDate;
                } else {
                    return new persianDate(unixDate).format(self.altFormat);
                }
            },
            onShow: function (self) {},
            onHide: function (self) {},
            onSelect: function (unixDate) {
                return this;
            },
            navigator: {
                enabled: true,
                text: {
                    btnNextText: ">",
                    btnPrevText: "<"
                },
                onNext: function (navigator) {
                    //log("navigator next ");
                },
                onPrev: function (navigator) {
                    //log("navigator prev ");
                },
                onSwitch: function (state) {
                    // console.log("navigator switch ");
                }
            },
            toolbox: {
                enabled: true,

                text: {
                    btnToday: "امروز"
                },
                onToday: function (toolbox) {
                    //log("toolbox today btn");
                }
            },
            timePicker: {
                enabled: false,
                showSeconds: true,
                showMeridian: true,
                scrollEnabled: true
            },
            dayPicker: {
                enabled: true,
                scrollEnabled: true,
                titleFormat: 'YYYY MMMM',
                titleFormatter: function (year, month) {
                    if (this.datepicker.persianDigit == false) {
                        window.formatPersian = false;
                    }
                    var titleStr = new persianDate([year, month]).format(this.titleFormat);
                    window.formatPersian = true;
                    return titleStr
                },
                onSelect: function (selectedDayUnix) {
                    //log("daypicker month day :" + selectedDayUnix);
                }

            },
            monthPicker: {
                enabled: true,
                scrollEnabled: true,
                titleFormat: 'YYYY',
                titleFormatter: function (unix) {
                    if (this.datepicker.persianDigit == false) {
                        window.formatPersian = false;
                    }
                    var titleStr = new persianDate(unix).format(this.titleFormat);
                    window.formatPersian = true;
                    return titleStr

                },
                onSelect: function (monthIndex) {
                    //log("daypicker select day :" + monthIndex);
                }
            },
            yearPicker: {
                enabled: true,
                scrollEnabled: true,
                titleFormat: 'YYYY',
                titleFormatter: function (year) {
                    var remaining = parseInt(year / 12) * 12;
                    return remaining + "-" + (remaining + 11);
                },
                onSelect: function (monthIndex) {
                    //log("daypicker select Year :" + monthIndex);
                }
            },
            onlyTimePicker: false,
            justSelectOnDate: false,
            minDate: false,
            maxDate: false

        });

        datePickerInput.val('');
        datePickerInput.attr('placeholder', '1396-04-13');

        $('.tooltipster').tooltipster({
            side: 'left'
        });
    });
</script>