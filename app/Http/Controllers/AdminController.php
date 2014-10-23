<?php namespace App\Http\Controllers;

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
        $this->middleware('admin');
    }

}