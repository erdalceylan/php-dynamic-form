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

class Select implements Field
{

    /**
     * @var string
     */
    protected $type = Field::TYPE_SELECT;
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
     * @return Select
     */
    public function setName(string $name): Select
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return SelectItem[]
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @param SelectItem[] $values
     * @return Select
     */
    public function setValues(Array $values): Select
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
     * @return Select
     */
    public function setLabel(string $label): Select
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
     * @return Select
     */
    public function setSubLabel(string $subLabel): Select
    {
        $this->subLabel = $subLabel;
        return $this;
    }

    /**
     * @param SelectItem $field
     * @return Select
     */
    public function add(SelectItem $field){

        $this->fields[] = $field;
        return $this;
    }

    /**
     * @param SelectItem $field
     * @return Select
     */
    public function append(SelectItem $field){

        $this->add($field);
        return $this;
    }

    /**
     * @param SelectItem $field
     * @return Select
     */
    public function prepend(SelectItem $field){

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