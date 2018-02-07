<?php
/**
 * Created by IntelliJ IDEA.
 * User: erdal
 * Date: 07.02.2018
 * Time: 15:34
 */

namespace DynamicForm\Fields\Items;


class RangeItem implements Item
{

    /**
     * @var int
     */
    protected $min;
    /**
     * @var int
     */
    protected $max;

    /**
     * @deprecated
     * @return string
     */
    public function getText(): string
    {
        return "";
    }

    /**
     * @deprecated
     * @param string $text
     * @return RangeItem
     */
    public function setText(string $text)
    {
        return $this;
    }

    /**
     * @return int
     */
    public function getMin(): int
    {
        return $this->min;
    }

    /**
     * @param int $min
     * @return RangeItem
     */
    public function setMin($min): RangeItem
    {
        $this->min = (int)$min;
        return $this;
    }

    /**
     * @return int
     */
    public function getMax(): int
    {
        return $this->max;
    }

    /**
     * @param int $max
     * @return RangeItem
     */
    public function setMax($max): RangeItem
    {
        $this->max = (int)$max;
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