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

use Exception;

class Tpl
{
    protected $templateDir;

    protected $data = [
        '_scripts' => [],
        '_styles' => [],
    ];

    public function __construct($templateDir)
    {
        if (!is_readable($templateDir)) {
            throw new Exception(sprintf('unknown templateDir: %s', $templateDir));
        }

        $this->templateDir = realpath($templateDir);
    }

    public function addStyle($url)
    {
        $this->data['_styles'][] = $this->escapeVar($url);
    }

    public function addScript($url)
    {
        $this->data['_scripts'][] = $this->escapeVar($url);
    }

    public function getStyles()
    {
        return $this->data['_styles'];
    }

    public function getScripts()
    {
        return $this->data['_scripts'];
    }

    public function assign($name, $value)
    {
        $this->data["__{$name}"] = $value;
        $this->data[$name] = $this->escapeVar($value);
    }

    public function display($template, $http_code = 200)
    {
        if ($http_code !== 200) {
            http_response_code($http_code);
        }

        header('Content-Type: text/html; charset=UTF-8');

        extract($this->data);

        ob_start([$this, 'output']);
        require $this->templateDir . DIRECTORY_SEPARATOR . $template . '.tpl.php';
        ob_end_flush();
    }

    protected function escapeVar($data)
    {
        if (is_array($data)) {
            foreach($data as $k => $each) {
                if (is_array($each)) {
                    $data[$k] = $this->escapeVar($each);
                } elseif (is_string($each)) {
                    $data[$k] = Html::escape($each, true);
                } else {
                    continue;
                }
            }
        } elseif (is_string($data)) {
            $data = Html::escape($data, true);
        }

        return $data;
    }

    protected function output($buffer)
    {
        if (!class_exists('\WyriHaximus\HtmlCompress\Factory')) {
            return $buffer;
        }

        $parser = \WyriHaximus\HtmlCompress\Factory::construct();
        return $parser->compress($buffer);
    }
}
