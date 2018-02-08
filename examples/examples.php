<?php
/**
 * Created by IntelliJ IDEA.
 * User: erdal
 * Date: 08.02.2018
 * Time: 14:11
 */
header('Content-Type: application/json; charset=UTF-8');

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('BASE_PATH', realpath(dirname(__FILE__)));

spl_autoload_register(function ($class){
    $filename = BASE_PATH . '/../src/' . str_replace('\\', '/', $class) . '.php';
    require_once ''.$filename;
});
/*------------config for test-------------*/


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
//
//$fieldTypes = [
//    Field::TYPE_CHECKBOX,
//    Field::TYPE_RADIO,
//    Field::TYPE_SELECT,
//    Field::TYPE_RANGE,
//    Field::TYPE_TEXT];
//
//for($i=0; $i < 7; $i++){
//
//    $type = $fieldTypes[array_rand($fieldTypes)];
//
//    $field;
//
//    switch ($type){
//        case Field::TYPE_CHECKBOX :
//            $field = new CheckBox();
//            $field->setLabel("check-box-label".$i)
//                ->setName("check-box-name".$i);
//            break;
//        case Field::TYPE_RADIO :
//            $field = new Radio();
//            $field->setLabel("radio-label".$i)
//                ->setName("radio-name".$i);
//            break;
//        case Field::TYPE_SELECT :
//            $field = new Select();
//            $field->setLabel("select-label".$i)
//                ->setName("select-name".$i);
//            break;
//        case Field::TYPE_RANGE :
//            $field = new Range();
//            $field->setName("range_".$i)
//                ->setLabel("label_range_".$i)
//                ->setValues(new RangeItem($i * 2, $i * 5));
//            break;
//        case Field::TYPE_TEXT :
//            $field = new Text();
//            $field->setLabel("text_label_".$i)
//                ->setName("text_".$i)
//                ->setValue("");
//            break;
//    }
//
//    $fieldTypes = [Field::TYPE_CHECKBOX, Field::TYPE_RADIO, Field::TYPE_SELECT];
//    if(in_array($type, $fieldTypes)){
//
//        $itemCount = rand(2,3);
//
//        for ($j=0; $j < $itemCount; $j++){
//
//            if($type == Field::TYPE_SELECT){
//                $item = new SelectItem();
//            }else if($type == Field::TYPE_RADIO){
//                $item = new RadioItem();
//            }else if($type == Field::TYPE_CHECKBOX){
//                $item = new CheckBoxItem();
//            }
//
//            $item->setValue($j)
//                ->setText("item-text--".$j);
//            $field->add($item);
//
//        }
//    }
//
//    $form->add($field);
//}
//
//
//echo json_encode($form);
