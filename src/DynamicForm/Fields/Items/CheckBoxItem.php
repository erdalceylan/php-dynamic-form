<?php
/**
 * Created by IntelliJ IDEA.
 * User: erdal
 * Date: 07.02.2018
 * Time: 12:14
 */

namespace DynamicForm\Fields\Items;


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
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return CheckBoxItem
     */
    public function setText(string $text): CheckBoxItem
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
     * @return CheckBoxItem
     */
    public function setValue($value) : CheckBoxItem
    {
        $this->value = $value;
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