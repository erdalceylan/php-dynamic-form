# php-dynamic-form
[![GitHub package version](https://img.shields.io/packagist/v/erdalceylan/php-dynamic-form.svg?style=flat-square)]()
[![Total Downloads](https://img.shields.io/packagist/dt/erdalceylan/php-dynamic-form.svg?style=flat-square)]()
[![Packagist](https://img.shields.io/packagist/l/erdalceylan/php-dynamic-form.svg?style=flat-square)]()
[![Travis](https://img.shields.io/badge/require-PHP%207-brightgreen.svg?style=flat-square)]()

## Installation

### Using Composer

```sh
composer require erdalceylan/php-dynamic-form
```
##### OR
composer.json
```javascript
{
    "require": {
      "erdalceylan/php-dynamic-form": "dev-master"
    }
}
```

### USAGE

```php
<?php

use \DynamicForm\Form,
    \DynamicForm\Fields\Field,
    \DynamicForm\Fields\CheckBox,
    \DynamicForm\Fields\Radio,
    \DynamicForm\Fields\Select,
    \DynamicForm\Fields\Range,
    \DynamicForm\Fields\Text,
    \DynamicForm\Fields\Slide,
    \DynamicForm\Fields\Items\CheckBoxItem,
    \DynamicForm\Fields\Items\RadioItem,
    \DynamicForm\Fields\Items\SelectItem,
    \DynamicForm\Fields\Items\RangeItem;

$form = new Form();
$form->setName("form1")
->setTitle("My EXAMPLE FORM");

## CheckBox fields
$checkBoxField = (new CheckBox())
    ->setName("checkBox1")
    ->setLabel("any check box");

$checkBoxValue1 = (new CheckBoxItem())
    ->setText("any checkBox item label 1")
    ->setValue(1);
$checkBoxValue2 = (new CheckBoxItem())
    ->setText("any checkBox item label 2")
    ->setValue(2);

$checkBoxField
    ->add($checkBoxValue1)
    ->prepend($checkBoxValue2);

##Radio fields
$radioField = (new Radio())
    ->setName("radio1")
    ->setLabel("any radio");

$radioValue1 = (new RadioItem())
    ->setText("any radio item label 1")
    ->setValue(1);
$radioValue2 = (new RadioItem())
    ->setText("any radio item label 2")
    ->setValue(2);

$radioField
    ->add($radioValue1)
    ->prepend($radioValue2);

##Select fields
$selectField = (new Select())
    ->setName("select1")
    ->setLabel("any select");

$selectValue1 = (new SelectItem())
    ->setText("any select item label 1")
    ->setValue(1);
$selectValue2 = (new SelectItem())
    ->setText("any select item label 2")
    ->setValue(2);

$selectField
    ->add($selectValue1)
    ->prepend($selectValue2);

##Range fields
$rangeField = (new Range())
    ->setName("range1")
    ->setLabel("any range")
    ->setValues(new RangeItem(1, 101));

##Text fields
$textField = (new Text())
    ->setName("text1")
    ->setLabel("your name")
    ->setValue("default name");

##Slide fields
$slideField = (new Slide())
    ->setName("slide1")
    ->setLabel("slide label")
    ->setValue(100);

$form->add($checkBoxField)
    ->append($radioField)
    ->add($selectField)
    ->prepend($rangeField)
    ->prepend($textField)
    ->add($slideField);

echo json_encode($form);
```

###OUTPUT
```json
{  
   "title":"My EXAMPLE FORM",
   "name":"form1",
   "fields":[  
      {  
         "type":"text",
         "name":"text1",
         "value":"default name",
         "label":"your name"
      },
      {  
         "type":"range",
         "name":"range1",
         "values":{  
            "min":1,
            "max":101
         },
         "label":"any range"
      },
      {  
         "type":"checkbox",
         "name":"checkBox1",
         "values":[  
            {  
               "text":"any checkBox item label 2",
               "value":2
            },
            {  
               "text":"any checkBox item label 1",
               "value":1
            }
         ],
         "label":"any check box"
      },
      {  
         "type":"radio",
         "name":"radio1",
         "values":[  
            {  
               "text":"any radio item label 2",
               "value":2
            },
            {  
               "text":"any radio item label 1",
               "value":1
            }
         ],
         "label":"any radio"
      },
      {  
         "type":"select",
         "name":"select1",
         "values":[  
            {  
               "text":"any select item label 2",
               "value":2
            },
            {  
               "text":"any select item label 1",
               "value":1
            }
         ],
         "label":"any select"
      }
   ]
}
```