<?php

/**
 * Returns default string 'active' if route is active.
 *
 * @param $route
 * @param string $str
 * @return string
 */
function set_active($route, $str = 'active') {

  return call_user_func_array('Request::is', (array)$route) ? $str : '';

}