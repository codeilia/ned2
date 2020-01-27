<table class="mwh_box1">
    <tbody>
    <tr>
        <th class="theader" style="width: 1000px">
            <span>مشخصات بلیط</span>
            <div class="mwh_sep2"></div>
        </th>
    </tr>
    <tr>
        <table class="mwh_box4">
            <thead>
            <tr>
                <th width="50px">نوع</th>
                <th width="200px">شماره بلیط</th>
                <th width="200px">مبدا</th>
                <th width="200px">مقصد</th>
                <th width="200px">تاریخ رفت</th>
                <th width="200px">تاریخ برگشت</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td width="50px" style="text-align:center">{{ $sale->salable->type == 0 ? 'داخلی' : 'خارجی' }}</td>
                <td width="200px" style="text-align:center">{{ $sale->salable->ticket_number }}</td>
                <td width="200px" style="text-align:center">{{ $sale->salable->from }}</td>
                <td width="200px" style="text-align:center">{{ $sale->salable->to }}</td>
                <td width="200px" style="text-align:center">{{ CustomDateTime::toJalali($sale->salable->going_date) }}</td>
                <td width="200px" style="text-align:center">{{ CustomDateTime::toJalali($sale->salable->return_date) }}</td>
            </tr>
            </tbody>
        </table>
    </tr>
    </tbody>
</table>