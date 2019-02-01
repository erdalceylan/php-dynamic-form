<?php
/**
 * Created by IntelliJ IDEA.
 * User: erdal
 * Date: 14.01.2019
 * Time: 11:03
 */


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