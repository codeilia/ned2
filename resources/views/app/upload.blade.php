<form action="/upload" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <label for="service_type" class="form-label">تصویر فیش پرداختی </label>
    <input id="receipt_pic" name="receipt_pic" type="file" multiple />

    <button type="submit">submit</button>
</form>