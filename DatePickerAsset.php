<?php
/**
 * Created by PhpStorm.
 * User: jtag
 * Date: 9/17/17
 * Time: 4:22 PM
 */

namespace puresoft\datepicker;


use yii\web\AssetBundle;

class DatePickerAsset extends AssetBundle
{
    public $sourcePath = "@npm/persian-date/dist";
    public $js = [
        '0.1.8/persian-date-0.1.8.min.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}