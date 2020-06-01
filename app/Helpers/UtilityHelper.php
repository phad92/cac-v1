<?php
use Carbon\Carbon;
/**
 * TEST
 * This function is used for returning department name with respect to id.
 *
 * @return type string
 */
if (!function_exists('test')) {
    function test()
    {

        return 'helper test';
    }
}

/**
 * UPDATE ENV
 * updates the env file
 * @return type string
 */

if (!function_exists('update_env')) {
    function update_env($name, $value)
    {
        $env_file = base_path('.env');
        if (file_exists($env_file)) {
            file_put_contents($env_file, str_replace($name . '=' . env($name), $name . '=' . $value, file_get_contents($env_file)));
        }
    }
}



if (!function_exists('check_env')) {
    function check_env()
    {
        $env_file = base_path('.env');
        if (file_exists($env_file)) {
            return false;
        }

        return $env_file;
    }
}


if (!function_exists('selected_option')) {
    function selected_option($option, $selected)
    {

        if ($option === $selected) {
            return "selected=''";
        }

        return '';
    }
}

//This function generates random codes
if (!function_exists('uniq_id')) {
    function uniq_id($lenght = 13)
    {
        // uniqid gives 13 chars, but you could adjust it to your needs.
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            throw new Exception("no cryptographically secure random function available");
        }

        return substr(bin2hex($bytes), 0, $lenght);
    }

}


if (!function_exists('calculate_age')) {
    function calculate_age($date)
    {
        $dateobj = new DateTime($date);
        $now = new DateTime();
        $diff = $dateobj->diff($now);
        return $diff->y;
    }
}

if(!function_exists('get_day_from_date'))
{
    function get_day_from_date($date)
    {
        return Carbon::parse($date)->englishDayOfWeek;
    }
}