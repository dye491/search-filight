<?php
/**
 * Created by PhpStorm.
 * User: yuri
 * Date: 18.06.18
 * Time: 22:02
 */

namespace app\components;


use app\interfaces\SenderInterface;
use yii\base\Component;

class FileReader implements SenderInterface
{
    private $_file;

    public function __construct($file)
    {
        $this->_file = $file;
    }

    /**
     * @return bool|\DOMDocument
     */
    public function send()
    {
        $dom = new \DOMDocument();
        if ($dom->load($this->_file)) {
            return $dom;
        }

        return false;
    }
}