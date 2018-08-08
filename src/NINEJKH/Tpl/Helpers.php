<?php

/**
 * This file is part of the NINEJKH/php-tpl library.
 *
 * (c) 9JKH (Pty) Ltd. <hello@9jkh.co.za>
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace NINEJKH\Tpl;

use Detection\MobileDetect;

class Helpers
{
    protected static $mobileDetect;

    public static function mobileDetect()
    {
        if (self::$mobileDetect === null) {
            self::$mobileDetect = new MobileDetect;
        }

        return self::$mobileDetect;
    }

    public static function active($menu, $return = false)
    {
        if (empty($_SERVER['REQUEST_URI'])) {
            return;
        }

        // normalise request-uri
        $request_uri = mb_strtolower(urldecode($_SERVER['REQUEST_URI']));
        if (($pos = strpos($request_uri, '?')) !== false) {
            $request_uri = substr($request_uri, 0, $pos);
        }

        if (preg_match('~' . $menu . '~i', $request_uri)) {
            if (!$return) {
                echo ' active';
            } else {
                return true;
            }
        }

        if ($return) {
            return false;
        }
    }

    public static function checked($key, $default)
    {
        // if POST then use it
        if (static::posted()) {
            if (!empty($_POST[$key])) {
                echo ' checked';
                return;
            } else {
                echo '';
                return;
            }
        }

        // fallback
        if ($default) {
            echo ' checked';
            return;
        } else {
            echo '';
            return;
        }
    }

    public static function selected($key, $value, $default)
    {
        if (static::posted()) {
            if (!empty($_POST[$key]) && $_POST[$key] == $value) {
                echo ' selected';
                return;
            } else {
                echo '';
                return;
            }
        }

        if ($default == $value) {
            echo ' selected';
            return;
        } else {
            echo '';
            return;
        }
    }

    public static function posted()
    {
        return (!empty($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST');
    }

    public static function caseTitle($string)
    {
        return mb_convert_case($string, MB_CASE_TITLE, 'UTF-8');
    }

    public static function truncate($string, $max_length)
    {
        if (mb_strlen($string, 'UTF-8') <= $max_length) {
            return $string;
        }

        $string = mb_substr($string, 0, ($max_length - 3), 'UTF-8');
        $string .= '...';
        return $string;
    }

    public static function showAds()
    {
        if (($_SERVER['REMOTE_ADDR'] === '::1' || $_SERVER['REMOTE_ADDR'] === '127.0.0.1') && empty($_GET['force_ads'])) {
            return false;
        }

        return true;
    }

    public static function isDev()
    {
        if ($_SERVER['REMOTE_ADDR'] === '::1' || $_SERVER['REMOTE_ADDR'] === '127.0.0.1' || !empty($_GET['force_dev'])) {
            return true;
        }

        return false;
    }

    public static function isMobile()
    {
        if (self::mobileDetect()->isMobile()) {
            return true;
        }

        return false;
    }

    public static function isTablet()
    {
        if (self::mobileDetect()->isTablet()) {
            return true;
        }

        return false;
    }
}
