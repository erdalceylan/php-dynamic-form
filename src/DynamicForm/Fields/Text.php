<?php
/**
 * Created by IntelliJ IDEA.
 * User: erdal
 * Date: 07.02.2018
 * Time: 11:41
 */

namespace DynamicForm\Fields;


use DynamicForm\Field;

/**
 * Class Text
 * @package DynamicForm\Fields
 */
class Text implements Field
{
    /**
     * @var string
     */
    protected $type = Field::TYPE_TEXT;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $value;
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
     * @return Text
     */
    public function setName(string $name): Text
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return Text
     */
    public function setValue(string $value): Text
    {
        $this->value = $value;
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
     * @return Text
     */
    public function setLabel(string $label): Text
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
     * @return Text
     */
    public function setSubLabel(string $subLabel): Text
    {
        $this->subLabel = $subLabel;
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