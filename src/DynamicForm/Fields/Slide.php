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
 * Class Slide
 * @package DynamicForm\Fields
 */
class Slide extends Field
{
    /**
     * @var int
     */
    protected $value;
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
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     * @return static
     */
    public function setValue($value): self
    {
        $this->value = (int)$value;
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
    public function getMax(): int
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
    public function getStep(): int
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
     * @param $value
     * @return bool
     */
    public function contain($value): bool
    {

        if(!is_string($value) && !is_int($value)){
            return false;
        }

        if(!preg_match("/^[0-9]+$/", $value)){
            return false;
        }

        if($this->getMin() <= $value && $this->getMax() >= $value){
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