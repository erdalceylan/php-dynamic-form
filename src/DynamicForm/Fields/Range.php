<?php
/**
 * Created by IntelliJ IDEA.
 * User: erdal
 * Date: 07.02.2018
 * Time: 15:24
 */

namespace DynamicForm\Fields;


use DynamicForm\Field;
use DynamicForm\Fields\Items\RangeItem;

class Range implements Field
{
    /**
     * @var string
     */
    protected $type = Field::TYPE_RANGE;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var RangeItem
     */
    protected $values;
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
     * @param string $type
     * @return Range
     */
    public function setType(string $type): Range
    {
        $this->type = $type;
        return $this;
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
     * @return Range
     */
    public function setName(string $name): Range
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return RangeItem
     */
    public function getValues(): RangeItem
    {
        return $this->values;
    }

    /**
     * @param RangeItem $values
     * @return Range
     */
    public function setValues(RangeItem $values): Range
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
     * @return Range
     */
    public function setLabel(string $label): Range
    {
        $this->label = $label;
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