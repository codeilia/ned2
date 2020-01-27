<div class="form-group form-float">
    <span class="font-24 col-red">*</span>
    <label for="type" class="form-label">نوع بلیط </label>
    <select id="type" class="form-control show-tick" name="type">
        <option value=""> -- لطفا انتخاب کنید -- </option>
        <option value="0"> داخلی </option>
        <option value="1"> خارجی </option>
    </select>
</div>

<div class="form-group form-float">
    <span class="font-24 col-red">*</span>
    <label for="revoked" class="form-label">ابطال شده؟ </label>
    <select id="revoked" class="form-control show-tick" name="revoked">
        <option value=""> -- لطفا انتخاب کنید -- </option>
        <option value="0"> باطل شده </option>
        <option value="1"> باطل نشده </option>
    </select>
</div>

<div class="form-group form-float">
    <span class="font-24 col-red">*</span>
    <div class="form-line">
        <input type="text" id="flight_number" class="form-control" name="flight_number">
        <label for="flight_number" class="form-label">شماره پرواز </label>
    </div>
</div>

<div class="form-group form-float">
    <span class="font-24 col-red">*</span>
    <div class="form-line">
        <input type="text" id="airline" class="form-control" name="airline">
        <label for="airline" class="form-label"> خط هوایی </label>
    </div>
</div>

<div class="form-group form-float">
    <span class="font-24 col-red">*</span>
    <div class="form-line">
        <input type="text" id="reference_number" class="form-control" name="reference_number">
        <label for="reference_number" class="form-label"> شماره مرجع </label>
    </div>
</div>

<div class="form-group form-float">
    <div class="form-line">
        <input type="text" id="ticket_number" class="form-control" name="ticket_number">
        <label for="ticket_number" class="form-label"> شماره بلیط </label>
    </div>
</div>

<div class="form-group form-float">
    <span class="font-24 col-red">*</span>
    <div class="form-line">
        <input type="text" id="from_country" class="form-control" name="from_country">
        <label for="from_country" class="form-label"> کشور مبدا </label>
    </div>
</div>

<div class="form-group form-float">
    <span class="font-24 col-red">*</span>
    <div class="form-line">
        <input type="text" id="from_city" class="form-control" name="from_city">
        <label for="from_city" class="form-label"> شهر مبدأ </label>
    </div>
</div>

<div class="form-group form-float">
    <span class="font-24 col-red">*</span>
    <div class="form-line">
        <input type="text" id="to_country" class="form-control" name="to_country">
        <label for="to_country" class="form-label"> کشور مقصد </label>
    </div>
</div>

<div class="form-group form-float">
    <span class="font-24 col-red">*</span>
    <div class="form-line">
        <input type="text" id="to_city" class="form-control" name="to_city">
        <label for="to_city" class="form-label"> شهر مقصد </label>
    </div>
</div>

<div class="form-group form-float">
    <span class="font-24 col-red">*</span>
    <div class="form-line">
        <input type="text" id="going_date" class="form-control datePicker" name="going_date">
        <label for="going_date" class="form-label"> تاریخ رفت </label>
    </div>
</div>

<div class="form-group form-float">
    <span class="font-24 col-red">*</span>
    <div class="form-line">
        <input type="text" id="return_date" class="form-control datePicker" name="return_date">
        <label for="return_date" class="form-label"> تاریخ برگشت </label>
    </div>
</div>