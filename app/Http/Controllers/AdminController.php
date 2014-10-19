<?php namespace App\Http\Controllers;

use App\AssignedRoles;
use Illuminate\Support\Facades\Auth;

class AdminController extends BaseController {

    /**
     * Initializer.
     *
     * @return \AdminController
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('csrf');
        $this->middleware('auth');
    }

}