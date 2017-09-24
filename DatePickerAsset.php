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
    public $sourcePath = "@npm/persian-datepicker/dist";
    public $js = [
        'js/persian-datepicker.js',
    ];
    public $css = [
        'css/persian-datepicker.css',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'yii\bootstrap\BootstrapAsset',
        'puresoft\datepicker\PersianDateAsset',
    ];
}