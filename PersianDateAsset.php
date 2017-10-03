<?php
/**
 * Created by PhpStorm.
 * User: jtag
 * Date: 9/17/17
 * Time: 5:31 PM
 */

namespace puresoft\datepicker;


use yii\web\AssetBundle;

class PersianDateAsset extends AssetBundle
{
    public $sourcePath = "@npm/persian-date/dist";
    public $js = [
        'persian-date.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}