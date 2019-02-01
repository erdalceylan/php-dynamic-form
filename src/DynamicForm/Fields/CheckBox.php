<?php
/**
 * Created by IntelliJ IDEA.
 * User: erdal
 * Date: 07.02.2018
 * Time: 12:08
 */

namespace DynamicForm\Fields;


use DynamicForm\Field;
use DynamicForm\Fields\Items\CheckBoxItem;

/**
 * Class CheckBox
 * @package DynamicForm\Fields
 */
class CheckBox extends Field
{
    /**
     * @var CheckBoxItem[]
     */
    protected $values = [];

    /**
     * @return CheckBoxItem[]
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @param CheckBoxItem[] $values
     * @return static
     */
    public function setValues(Array $values): self
    {
        $this->values = $values;
        return $this;
    }

    /**
     * @param CheckBoxItem $field
     * @return static
     */
    public function add(CheckBoxItem $field): self
    {

        $this->values[] = $field;
        return $this;
    }

    /**
     * @param CheckBoxItem $field
     * @return static
     */
    public function append(CheckBoxItem $field): self
    {

        $this->add($field);
        return $this;
    }

    /**
     * @param CheckBoxItem $field
     * @return static
     */
    public function prepend(CheckBoxItem $field): self
    {

        array_unshift($this->values, $field);
        return $this;
    }

    /**
     * @param $value mixed
     * @return bool
     */
    public function contain($value): bool
    {
        if(count($this->getValues()) === 0){
            return false;
        }

        if(is_array($value)){
            $lastIndex = count($this->getValues()) -1;
            foreach ($value as $v){
                foreach ($this->getValues() as $key => $item){
                    if($item->getValue() == $v){
                        continue 2;
                    }
                    if($key === $lastIndex){
                        return false;
                    }
                }
            }

            return true;
        }else{
            foreach ($this->getValues() as $item){
                if($item->getValue() == $value){
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}