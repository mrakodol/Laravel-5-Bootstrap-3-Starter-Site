<?php namespace App\Http\Filters;

class AuthFilter {

    /**
     * Run the request filter.
     *
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function filter(Route $route,Request $request) // a little fix: $route parameter was missing.
    {
        if (Auth::guest())
        {
            if ($request->ajax())
            {
                return Response::make('Unauthorized', 401);
            }
            else
            {
                return Redirect::guest('/user/login');
            }
        }
    }

}