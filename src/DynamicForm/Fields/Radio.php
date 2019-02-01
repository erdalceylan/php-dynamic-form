<?php
/**
 * Created by IntelliJ IDEA.
 * User: erdal
 * Date: 07.02.2018
 * Time: 12:08
 */

namespace DynamicForm\Fields;

use DynamicForm\Field;
use DynamicForm\Fields\Items\RadioItem;

/**
 * Class Radio
 * @package DynamicForm\Fields
 */
class Radio extends Field
{

    /**
     * @var RadioItem[]
     */
    protected $values = [];

    /**
     * @return RadioItem[]
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @param RadioItem[] $values
     * @return self
     */
    public function setValues(Array $values): self
    {
        $this->values = $values;
        return $this;
    }

    /**
     * @param RadioItem $field
     * @return self
     */
    public function add(RadioItem $field): self
    {

        $this->values[] = $field;
        return $this;
    }

    /**
     * @param RadioItem $field
     * @return self
     */
    public function append(RadioItem $field): self
    {

        $this->add($field);
        return $this;
    }

    /**
     * @param RadioItem $field
     * @return self
     */
    public function prepend(RadioItem $field):self
    {

        array_unshift($this->values, $field);
        return $this;
    }

    /**
     * @param $value
     * @return bool
     */
    public function contain($value): bool
    {
        foreach ($this->getValues() as $item){

            if($item->getValue() == $value){
                return true;
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