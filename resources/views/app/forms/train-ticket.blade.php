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
        <input type="text" id="ticket_number" class="form-control" name="ticket_number">
        <label for="ticket_number" class="form-label"> شماره بلیط </label>
    </div>
</div>

<div class="form-group form-float">
    <span class="font-24 col-red">*</span>
    <div class="form-line">
        <input type="text" id="from" class="form-control" name="from">
        <label for="from" class="form-label"> مبدأ </label>
    </div>
</div>

<div class="form-group form-float">
    <span class="font-24 col-red">*</span>
    <div class="form-line">
        <input type="text" id="to" class="form-control" name="to">
        <label for="to" class="form-label"> مقصد </label>
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