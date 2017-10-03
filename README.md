The PureSoft Persian Date Picker
================================
This extension will display a Persian date picker.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist puresoft/yii2-persian-datepicker "~1.0"
```

or add

```
"puresoft/yii2-persian-datepicker": "^1.0"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by:

```php
# Within a model
<?= Datepicker::widget([
    'model' => $model,
    'attribute' => 'date',
]) ?>

# Or

<?= $form->field($model, 'date')->widget(Datepicker::className()) ?>
```

```php
# Without model
<?= Datepicker::widget([
    'name' => 'my-date-picker',
    'value' => '1373/12/17',
]) ?>
```

Options
-----

Following custom options are available:

* `size` : The size of the input which must be one of ('lg', 'md', 'sm', 'xs').
* `addon` : The addon markup if you wish to display the input as a component then set it to something like `<i class="glyphicon glyphicon-calendar"></i>`.
* `template` : The template to render the input. `{input}` and `{addon}` placeholders are available.
* `inline` : Whether to render the input as an inline calendar or not. It can be `true` or `false`.