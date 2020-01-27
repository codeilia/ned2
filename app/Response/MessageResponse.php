<?php
/**
 * Created by PhpStorm.
 * User: Milad
 * Date: 21/07/2018
 * Time: 11:03 AM
 */

namespace App\Response;


class MessageResponse
{
    public static function respondSuccess($message = 'عملیات با موفقیت انجام شد')
    {
        return back()->with([
            'message' => [
                'body' => $message,
                'type' => 'success'
            ]
        ]);
    }

    public static function respondInfo($message = '')
    {
        return back()->with([
            'message' => [
                'body' => $message,
                'type' => 'warning'
            ]
        ]);
    }

    public static function respondWarning($message = 'عملیات با مشکل مواجه شد')
    {
        return back()->with([
            'message' => [
                'body' => $message,
                'type' => 'warning'
            ]
        ]);
    }

    public static function respondDanger($message = 'درخواست انجام نشد')
    {
        return back()->with([
            'message' => [
                'body' => $message,
                'type' => 'danger'
            ]
        ]);
    }
}