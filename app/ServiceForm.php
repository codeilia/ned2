<?php
/**
 * Created by PhpStorm.
 * User: Milad
 * Date: 05/08/2018
 * Time: 10:00 AM
 */

namespace App;


class ServiceForm
{
    public static function get($formId)
    {
        if ($formId == 1)
            return view('app.forms.airplane-ticket');

        if ($formId == 2)
            return view('app.forms.train-ticket');

        if ($formId == 3)
            return view('app.forms.partner-agency-package');

        if ($formId == 4)
            return view('app.forms.visa-service');

        if ($formId == 5)
            return view('app.forms.passenger_insurance');

        if ($formId == 6)
            return view('app.forms.pickup');

        if ($formId == 7)
            return view('app.forms.hotel');

        if ($formId == 8)
            return view('app.forms.translation');

        if ($formId == 9)
            return view('app.forms.transfer');
    }

    public static function getName($id)
    {
        if ($id == 1)
            return 'بلیط هواپیما';

        if ($id == 2)
            return 'بلیط قطار';

        if ($id == 3)
            return 'تور پکیج آژانس های همکار';

        if ($id == 4)
            return 'خدمات اخذ ویزا';

        if ($id == 5)
            return 'خدمات بیمه مسافر';

        if ($id == 6)
            return 'پیکاپ';

        if ($id == 7)
            return 'هتل';

        if ($id == 8)
            return 'دارالترجمه';

        if ($id == 9)
            return 'ترانسفر در اختیار';
    }
}