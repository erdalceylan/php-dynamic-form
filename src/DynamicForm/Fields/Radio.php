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

class Radio implements Field
{

    /**
     * @var string
     */
    protected $type = Field::TYPE_RADIO;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $values;
    /**
     * @var string
     */
    protected $label;
    /**
     * @var string
     */
    protected $subLabel;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Radio
     */
    public function setName(string $name): Radio
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getValues(): string
    {
        return $this->values;
    }

    /**
     * @param string $values
     * @return Radio
     */
    public function setValues(string $values): Radio
    {
        $this->values = $values;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return Radio
     */
    public function setLabel(string $label): Radio
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubLabel(): string
    {
        return $this->subLabel;
    }

    /**
     * @param string $subLabel
     * @return Radio
     */
    public function setSubLabel(string $subLabel): Radio
    {
        $this->subLabel = $subLabel;
        return $this;
    }

    /**
     * @param RadioItem $field
     * @return Radio
     */
    public function add(RadioItem $field){

        $this->fields[] = $field;
        return $this;
    }

    /**
     * @param RadioItem $field
     * @return Radio
     */
    public function append(RadioItem $field){

        $this->add($field);
        return $this;
    }

    /**
     * @param RadioItem $field
     * @return Radio
     */
    public function prepend(RadioItem $field){

        array_unshift($this->fields, $field);
        return $this;
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