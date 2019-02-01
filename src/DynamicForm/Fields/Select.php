<?php
/**
 * Created by IntelliJ IDEA.
 * User: erdal
 * Date: 07.02.2018
 * Time: 12:08
 */

namespace DynamicForm\Fields;

use DynamicForm\Field;
use DynamicForm\Fields\Items\SelectItem;

/**
 * Class Select
 * @package DynamicForm\Fields
 */
class Select extends Field
{
    /**
     * @var SelectItem[]
     */
    protected $values = [];
    /**
     * @var bool
     */
    protected $multiple = false;

    /**
     * @return SelectItem[]
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @param SelectItem[] $values
     * @return static
     */
    public function setValues(Array $values): self
    {
        $this->values = $values;
        return $this;
    }

    /**
     * @param SelectItem $field
     * @return static
     */
    public function add(SelectItem $field): self
    {
        $this->values[] = $field;
        return $this;
    }

    /**
     * @param SelectItem $field
     * @return static
     */
    public function append(SelectItem $field): self
    {

        $this->add($field);
        return $this;
    }

    /**
     * @param SelectItem $field
     * @return static
     */
    public function prepend(SelectItem $field): self
    {

        array_unshift($this->values, $field);
        return $this;
    }

    /**
     * @return bool
     */
    public function isMultiple(): bool
    {
        return $this->multiple;
    }

    /**
     * @param bool $multiple
     * @return static
     */
    public function setMultiple(bool $multiple): self
    {
        $this->multiple = $multiple;
        return $this;
    }

    /**
     * @param $value mixed
     * @return bool
     */
    public function contain($value): bool
    {
        if(!$this->isMultiple() && is_array($value)){
            return false;
        }

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