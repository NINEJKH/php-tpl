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

class Html
{
    public static function escape($string, $return = false)
    {
        if ($return) {
            return htmlspecialchars($string, ENT_QUOTES|ENT_HTML5, 'UTF-8');
        } else {
            echo htmlspecialchars($string, ENT_QUOTES|ENT_HTML5, 'UTF-8');
        }

    }

    public static function scripts($context, $return = false)
    {
        if ($context instanceof Tpl) {
            $scripts = $context->getScripts();
        } else {
            $scripts = $context;
        }

        if (empty($scripts) || !is_array($scripts)) {
            return;
        }

        $data = [];

        foreach ($scripts as $script) {
            $data[] = sprintf('<script src="%s"></script>', $script);
        }

        if ($return) {
            return $data;
        } else {
            echo implode("\n", $data);
        }
    }

    public static function styles($context, $return = false)
    {
        if ($context instanceof Tpl) {
            $styles = $context->getStyles();
        } else {
            $styles = $context;
        }

        if (empty($styles) || !is_array($styles)) {
            return;
        }

        $data = [];

        foreach ($styles as $style) {
            $data[] = sprintf('<link href="%s" rel="stylesheet">', $style);
        }

        if ($return) {
            return $data;
        } else {
            echo implode("\n", $data);
        }
    }
}
