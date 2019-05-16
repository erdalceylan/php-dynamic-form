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

/**
 * Class Range
 * @package DynamicForm\Fields
 */
class Range extends Field
{

    /**
     * @var RangeItem
     */
    protected $values;
    /**
     * @var int
     */
    protected $min;
    /**
     * @var int
     */
    protected $max;
    /**
     * @var int
     */
    protected $step = 1;

    /**
     * @return RangeItem
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @param RangeItem $values
     * @return static
     */
    public function setValues(RangeItem $values): self
    {
        $this->values = $values;
        return $this;
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
    public function setMin(int $min): self
    {
        $this->min = $min;
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
     * @return int
     */
    public function getStep()
    {
        return $this->step;
    }

    /**
     * @param int $step
     * @return static
     */
    public function setStep(int $step): self
    {
        $this->step = $step;
        return $this;
    }

    /**
     * @param $value mixed
     * @return bool
     */
    public function contain($value): bool
    {

       if($this->getValues() instanceof RangeItem){

           if(is_array($value) && count($value) === 2
               && array_key_exists(0, $value)
               && array_key_exists(1, $value)){

               return $this->getValues()->contain($value[0])
                   && $this->getValues()->contain($value[1]);
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
