# php-dynamic-form
This Library for Angular, React Ajax request and Android, Ios Api request

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
    \DynamicForm\Fields\CheckBox,
    \DynamicForm\Fields\Radio,
    \DynamicForm\Fields\Select,
    \DynamicForm\Fields\Range,
    \DynamicForm\Fields\Text,
    \DynamicForm\Fields\Slide,
    \DynamicForm\Fields\TextArea;

use \DynamicForm\Fields\Items\CheckBoxItem,
    \DynamicForm\Fields\Items\RadioItem,
    \DynamicForm\Fields\Items\SelectItem,
    \DynamicForm\Fields\Items\RangeItem;

use \DynamicForm\Fields\Validators\Inclusion,
    \DynamicForm\Fields\Validators\Required,
    \DynamicForm\Fields\Validators\Email,
    \DynamicForm\Fields\Validators\Date,
    \DynamicForm\Fields\Validators\Regex,
    \DynamicForm\Fields\Validators\StringLength;

class TestForm extends Form
{
    public function __construct()
    {
        $this->setName("form1")
            ->setTitle("My EXAMPLE FORM");

        ## CheckBox fields
        $checkBoxField = (new CheckBox())
            ->setName("checkBox1")
            ->setLabel("any check box 1");
        
        $checkBoxField->addValidators([
            new Inclusion("data error"),
            new Required("required error")
        ]);

        for($i=0; $i < 5; $i++) {
            $checkBoxValue = (new CheckBoxItem())
                ->setText("any checkBox item label-". $i)
                ->setValue($i);

            $checkBoxField->add($checkBoxValue);
        }

        ##Radio fields
        $radioField = (new Radio())
            ->setName("radio1")
            ->setLabel("any radio");
        
        $radioField
            ->addValidator(new Inclusion("data error"))
            ->addValidator(new Required("required error"));

        for($i=0; $i < 8; $i++) {
            $radioValue = (new RadioItem())
                ->setText("any radio item label-".$i)
                ->setValue($i);

            $radioField->prepend($radioValue);
        }

        ##Select fields
        $selectField = (new Select())
            ->setName("select1")
            ->setLabel("any select");
        
        $selectField->setValidators([
            new Inclusion("data error"),
            new Required("required error")
            ]);
        
        for($i=15; $i < 24; $i++) {
            $selectValue = (new SelectItem())
                ->setText("any select item label-".$i)
                ->setValue($i);

            $selectField->prepend($selectValue);
        }

        ##Range fields
        $rangeField = (new Range())
            ->setName("range1")
            ->setLabel("any range")
            ->setMin(0)
            ->setMax(100)
            ->setValues(new RangeItem(30, 60));
        
        $rangeField
            ->addValidator(new Inclusion("data error"));

        ##Text fields
        $textField = (new Text())
            ->setName("text1")
            ->setLabel("email")
            ->setValue("info@example.com");
        
        $textField->addValidator(new Email("error email"));

        ##Text fields
        $textFieldDate = (new Text())
            ->setName("date")
            ->setLabel("date of birth")
            ->setValue("");
        
        $textFieldDate
            ->addValidator(new Date("-35 year", "-18 year","year error"))
            ->addValidator(new Required("date is required"))
            ->addValidator(new Regex("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", "pattern error"));

        ##TextArea fields
        $textAreaField = (new TextArea())
            ->setName("textArea1")
            ->setLabel("Your Message")
            ->setValue("defaultmessage");

        $textAreaField->addValidators([
            new Regex("/^[a-z]+$/", "error pattern"),
            new StringLength(0, 30,"error length"),
            new Required("error required")
        ]);

        ##Slide fields
        $slideField = (new Slide())
            ->setName("slide1")
            ->setLabel("slide label")
            ->setMin(0)
            ->setMax(110)
            ->setValue(50);
        
        $slideField
            ->addValidator(new Inclusion("data error"))
            ->addValidator(new Required("required error"));

        $this->add($checkBoxField)
            ->append($radioField)
            ->add($selectField)
            ->prepend($rangeField)
            ->prepend($textField)
            ->prepend($textFieldDate)
            ->prepend($textAreaField)
            ->add($slideField);
    }
}

$form = new TestForm();

// $form->isValid($_POST);// boolean
// $form->getErrorMessages($_POST);// Message[]

echo json_encode($form);
```

###OUTPUT
```json
{  
   "title":"My EXAMPLE FORM",
   "name":"form1",
   "fields":[  
      {  
         "value":"defaultmessage",
         "type":"TextArea",
         "name":"textArea1",
         "label":"Your Message",
         "validators":[  
            {  
               "pattern":"\/^[a-z]+$\/",
               "type":"Regex",
               "message":"error pattern"
            },
            {  
               "min":0,
               "max":30,
               "type":"StringLength",
               "message":"error length"
            },
            {  
               "type":"Required",
               "message":"error required"
            }
         ]
      },
      {  
         "value":"",
         "type":"Text",
         "name":"date",
         "label":"date of birth",
         "validators":[  
            {  
               "min":"1984-02-01 09:42:42",
               "max":"2001-02-01 09:42:42",
               "type":"Date",
               "message":"year error"
            },
            {  
               "type":"Required",
               "message":"date is required"
            },
            {  
               "pattern":"\/^[0-9]{4}-[0-9]{2}-[0-9]{2}$\/",
               "type":"Regex",
               "message":"pattern error"
            }
         ]
      },
      {  
         "value":"info@example.com",
         "type":"Text",
         "name":"text1",
         "label":"email",
         "validators":[  
            {  
               "type":"Email",
               "message":"error email"
            }
         ]
      },
      {  
         "values":{  
            "min":30,
            "max":60
         },
         "min":0,
         "max":100,
         "step":1,
         "type":"Range",
         "name":"range1",
         "label":"any range",
         "validators":[  
            {  
               "type":"Inclusion",
               "message":"data error"
            }
         ]
      },
      {  
         "values":[  
            {  
               "text":"any checkBox item label-0",
               "value":0,
               "checked":false
            },
            {  
               "text":"any checkBox item label-1",
               "value":1,
               "checked":false
            },
            {  
               "text":"any checkBox item label-2",
               "value":2,
               "checked":false
            },
            {  
               "text":"any checkBox item label-3",
               "value":3,
               "checked":false
            },
            {  
               "text":"any checkBox item label-4",
               "value":4,
               "checked":false
            }
         ],
         "type":"CheckBox",
         "name":"checkBox1",
         "label":"any check box 1",
         "validators":[  
            {  
               "type":"Inclusion",
               "message":"data error"
            },
            {  
               "type":"Required",
               "message":"required error"
            }
         ]
      },
      {  
         "values":[  
            {  
               "text":"any radio item label-7",
               "value":7,
               "checked":false
            },
            {  
               "text":"any radio item label-6",
               "value":6,
               "checked":false
            },
            {  
               "text":"any radio item label-5",
               "value":5,
               "checked":false
            },
            {  
               "text":"any radio item label-4",
               "value":4,
               "checked":false
            },
            {  
               "text":"any radio item label-3",
               "value":3,
               "checked":false
            },
            {  
               "text":"any radio item label-2",
               "value":2,
               "checked":false
            },
            {  
               "text":"any radio item label-1",
               "value":1,
               "checked":false
            },
            {  
               "text":"any radio item label-0",
               "value":0,
               "checked":false
            }
         ],
         "type":"Radio",
         "name":"radio1",
         "label":"any radio",
         "validators":[  
            {  
               "type":"Inclusion",
               "message":"data error"
            },
            {  
               "type":"Required",
               "message":"required error"
            }
         ]
      },
      {  
         "values":[  
            {  
               "text":"any select item label-23",
               "value":23,
               "selected":false
            },
            {  
               "text":"any select item label-22",
               "value":22,
               "selected":false
            },
            {  
               "text":"any select item label-21",
               "value":21,
               "selected":false
            },
            {  
               "text":"any select item label-20",
               "value":20,
               "selected":false
            },
            {  
               "text":"any select item label-19",
               "value":19,
               "selected":false
            },
            {  
               "text":"any select item label-18",
               "value":18,
               "selected":false
            },
            {  
               "text":"any select item label-17",
               "value":17,
               "selected":false
            },
            {  
               "text":"any select item label-16",
               "value":16,
               "selected":false
            },
            {  
               "text":"any select item label-15",
               "value":15,
               "selected":false
            }
         ],
         "multiple":false,
         "type":"Select",
         "name":"select1",
         "label":"any select",
         "validators":[  
            {  
               "type":"Inclusion",
               "message":"data error"
            },
            {  
               "type":"Required",
               "message":"required error"
            }
         ]
      },
      {  
         "value":50,
         "min":0,
         "max":110,
         "step":1,
         "type":"Slide",
         "name":"slide1",
         "label":"slide label",
         "validators":[  
            {  
               "type":"Inclusion",
               "message":"data error"
            },
            {  
               "type":"Required",
               "message":"required error"
            }
         ]
      }
   ]
}
```