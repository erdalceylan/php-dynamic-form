<?php
/**
 * Created by IntelliJ IDEA.
 * User: erdal
 * Date: 07.02.2018
 * Time: 12:14
 */

namespace DynamicForm\Fields\Items;

use DynamicForm\Fields\Item;

/**
 * Class CheckBoxItem
 * @package DynamicForm\Fields\Items
 */
class CheckBoxItem implements Item
{
    /**
     * @var string;
     */
    protected $text;
    /**
     * @var mixed
     */
    protected $value;
    /**
     * @var bool
     */
    protected $checked = false;

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return self
     */
    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return self
     */
    public function setValue($value) : self
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function isChecked(): bool
    {
        return $this->checked;
    }

    /**
     * @param bool $checked
     * @return static
     */
    public function setChecked(bool $checked): self
    {
        $this->checked = $checked;
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
