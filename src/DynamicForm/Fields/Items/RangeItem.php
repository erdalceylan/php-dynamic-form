<?php
/**
 * Created by IntelliJ IDEA.
 * User: erdal
 * Date: 07.02.2018
 * Time: 15:34
 */

namespace DynamicForm\Fields\Items;

use DynamicForm\Checker;
use DynamicForm\Field;
use DynamicForm\Fields\Item;

/**
 * Class RangeItem
 * @package DynamicForm\Fields\Items
 */
class RangeItem implements Item, Checker
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
     * RangeItem constructor.
     * @param $min
     * @param $max
     */
    function __construct($min='', $max='')
    {
        if(is_numeric($min) && is_numeric($max)){

            $this->setMin($min)
                ->setMax($max);
        }
    }

    /**
     * @return int
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @param int $min
     * @return static
     */
    public function setMin($min): self
    {
        $this->min = (int)$min;
        return $this;
    }

    /**
     * @return int
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @param int $max
     * @return static
     */
    public function setMax($max): self
    {
        $this->max = (int)$max;
        return $this;
    }

    /**
     * @param $value
     * @param null|Field $field
     * @return bool
     */
    public function contain($value, $field = null): bool
    {
        if(!is_string($value) && !is_int($value)){
            return false;
        }

        if(!preg_match("/^[0-9]+$/", $value)){
            return false;
        }

        if($value >= $this->getMin() && $value <= $this->getMax()){
            return true;
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
