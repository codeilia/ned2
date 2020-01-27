<script>
$(window).bind('load', function () {
    var baseUrl = window.location.origin;

    $("#province").on('change', function () {
        var provinceId = $(this).val();
        var $cities = $("#cities");

        $.ajax({
            url: baseUrl + '/api/provinces/' + provinceId + '/cities',
            dataType: "json",
            heders: {"Access-Control-Allow-Origin": "*"},
            type: 'GET',
            success: function (data) {
                cities = data;

                for (var city in cities) {
                    var html += '<option value="' + city.id + '">' + city.name + '</option>';
                }
            }
        });
    });
})
</script>