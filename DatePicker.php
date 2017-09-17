<?php

namespace puresoft\datepicker;

use yii\bootstrap\Html;
use yii\bootstrap\InputWidget;
use yii\helpers\Json;

/**
 * This is just an example.
 */
class DatePicker extends InputWidget
{
    /**
     * @var array the options for the Persian Bootstrap DatePicker plugin.
     * Please refer to the Persian Bootstrap DatePicker plugin Web page for possible options.
     * @see http://babakhani.github.io/PersianWebToolkit/doc/datepicker/#/options/
     */
    public $clientOptions = [];

    /**
     * @var array HTML attributes to render on the container
     */
    public $containerOptions = [];

    /**
     * @var string the size of the input ('lg', 'md', 'sm', 'xs')
     */
    public $size;

    /**
     * @var string the addon markup if you wish to display the input as a component then set it to
     * something like '<i class="glyphicon glyphicon-calendar"></i>'.
     */
    public $addon = false;

    /**
     * @var string the template to render the input.
     */
    public $template = '{input}{addon}';

    /**
     * @var bool whether to render the input as an inline calendar
     */
    public $inline = false;

    public function init()
    {
        parent::init();
        if ($this->inline) {
            $this->options['readonly'] = 'readonly';
            Html::addCssClass($this->options, 'text-center');
        }
        if ($this->size) {
            Html::addCssClass($this->options, 'input-' . $this->size);
            Html::addCssClass($this->containerOptions, 'input-group-' . $this->size);
        }
        Html::addCssClass($this->options, 'form-control');
        Html::addCssClass($this->containerOptions, 'input-group date');
    }

    public function run()
    {
        $input = $this->hasModel()
            ? Html::activeTextInput($this->model, $this->attribute, $this->options)
            : Html::textInput($this->name, $this->value, $this->options);
        if ($this->inline) {
            $input .= '<div></div>';
        }
        if ($this->addon && !$this->inline) {
            $addon = Html::tag('span', $this->addon, ['class' => 'input-group-addon']);
            $input = strtr($this->template, ['{input}' => $input, '{addon}' => $addon]);
            $input = Html::tag('div', $input, $this->containerOptions);
        }
        if ($this->inline) {
            $input = strtr($this->template, ['{input}' => $input, '{addon}' => '']);
        }
        echo $input;
        $this->registerClientScript();
    }

    /**
     * Registers required script for the plugin to work as DatePicker
     */
    public function registerClientScript()
    {
        $js = [];
        $view = $this->getView();
        DatePickerAsset::register($view);

        DatepickerAsset::register($view);

        $id = $this->options['id'];
        $selector = ";jQuery('#{$id}')";
        if ($this->inline) {
            $selector .= ".parent()";
        }
        $options = !empty($this->clientOptions) ? Json::encode($this->clientOptions) : '';
        $js[] = "$selector.pDatepicker($options);";
        if (!empty($this->clientEvents)) {
            foreach ($this->clientEvents as $event => $handler) {
                $js[] = "$selector.on('$event', $handler);";
            }
        }
        $view->registerJs(implode("\n", $js));
    }
}
