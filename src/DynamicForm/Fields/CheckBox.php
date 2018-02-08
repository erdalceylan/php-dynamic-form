<?php
/**
 * Created by IntelliJ IDEA.
 * User: erdal
 * Date: 07.02.2018
 * Time: 12:08
 */

namespace DynamicForm\Fields;


use DynamicForm\Fields\Items\CheckBoxItem;

class CheckBox implements Field
{

    /**
     * @var string
     */
    protected $type = Field::TYPE_CHECKBOX;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var CheckBoxItem[]
     */
    protected $values = [];
    /**
     * @var string
     */
    protected $label;

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
     * @return CheckBox
     */
    public function setName(string $name): CheckBox
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return CheckBoxItem[]
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @param CheckBoxItem[] $values
     * @return CheckBox
     */
    public function setValues(Array $values): CheckBox
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
     * @return CheckBox
     */
    public function setLabel(string $label): CheckBox
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @param CheckBoxItem $field
     * @return CheckBox
     */
    public function add(CheckBoxItem $field){

        $this->values[] = $field;
        return $this;
    }

    /**
     * @param CheckBoxItem $field
     * @return CheckBox
     */
    public function append(CheckBoxItem $field){

        $this->add($field);
        return $this;
    }

    /**
     * @param CheckBoxItem $field
     * @return CheckBox
     */
    public function prepend(CheckBoxItem $field){

        array_unshift($this->values, $field);
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