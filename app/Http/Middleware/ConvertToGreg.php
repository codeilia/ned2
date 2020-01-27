<?php

namespace App\Http\Middleware;

use App\Nedsa\Helpers\CustomDateTime;
use Closure;

class ConvertToGreg
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $resource = null)
    {
        if ($resource === 'soldier')
            $request = $this->convertSoldierParams($request);

        if ($resource == 'martialInfo') {
            $request = $this->convertMartialInfoParams($request);
        }

        if ($resource == 'leave') {
            $request = $this->convertLeaveParams($request);
        }

        return $next($request);
    }

    private function convertMartialInfoParams($request)
    {
        if ($request->sent_date)
            $request->offsetSet('sent_date', CustomDateTime::toGreg($request->sent_date));

        if ($request->end_date)
            $request->offsetSet('end_date', CustomDateTime::toGreg($request->end_date));

        if ($request->start_date)
            $request->offsetSet('start_date', CustomDateTime::toGreg($request->start_date));

        if ($request->previous_intro_date)
            $request->offsetSet('previous_intro_date', CustomDateTime::toGreg($request->previous_intro_date));

        return $request;
    }

    private function convertSoldierParams($request)
    {
        if ($request->birthday)
            $request->offsetSet('birthday', CustomDateTime::toGreg($request->birthday));

        return $request;
    }

    private function convertLeaveParams($request)
    {
        if ($request->from)
            $request->offsetSet('from', CustomDateTime::toGreg($request->from));

        if ($request->to)
            $request->offsetSet('to', CustomDateTime::toGreg($request->to));

        return $request;
    }
}
