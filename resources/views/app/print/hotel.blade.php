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
                <th width="200px">نام هتل</th>
                <th width="200px">نوع اتاق</th>
                <th width="200px">نوع اتاق</th>
                <th width="200px">درجه</th>
                <th width="200px">درجه</th>
                <th width="200px">کشور</th>
                <th width="200px">شهر</th>
                <th width="200px">از تاریخ</th>
                <th width="200px">تا تاریخ</th>
                <th width="200px">تعداد شب</th>
                <th width="200px">تعداد روز</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td width="50px" style="text-align:center">{{ $sale->salable->type == 0 ? 'داخلی' : 'خارجی' }}</td>
                <td width="50px" style="text-align:center">{{ $sale->salable->name }}</td>
                <td width="50px" style="text-align:center">{{ $sale->salable->name }}</td>
                <td width="50px" style="text-align:center">{{ $sale->salable->room_type }}</td>
                <td width="50px" style="text-align:center">{{ $sale->salable->degree }}</td>
                <td width="50px" style="text-align:center">{{ $sale->salable->country }}</td>
                <td width="50px" style="text-align:center">{{ $sale->salable->city }}</td>
                <td width="200px" style="text-align:center">{{ CustomDateTime::toJalali($sale->salable->from) }}</td>
                <td width="200px" style="text-align:center">{{ CustomDateTime::toJalali($sale->salable->to) }}</td>
                <td width="200px" style="text-align:center">{{ $sale->salable->days }}</td>
                <td width="200px" style="text-align:center">{{ $sale->salable->nights }}</td>
            </tr>
            </tbody>
        </table>
    </tr>
    </tbody>
</table>