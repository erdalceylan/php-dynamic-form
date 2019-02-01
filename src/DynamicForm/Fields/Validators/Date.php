<?php
/**
 * Created by IntelliJ IDEA.
 * User: erdal
 * Date: 10.01.2019
 * Time: 11:15
 */

namespace DynamicForm\Fields\Validators;

use DynamicForm\Field;
use DynamicForm\Fields\Validator;

/**
 * Class Date
 * @package DynamicForm\Fields\Validators
 */
class Date extends Validator
{
    /**
     * @var \DateTime
     */
    protected $min;
    /**
     * @var \DateTime
     */
    protected $max;

    /**
     * Date constructor.
     * @param $min string
     * @param $max string
     * @param string $message
     */
    public function __construct($min, $max, $message = '')
    {
        parent::__construct();
        $this
            ->setMin(date("Y-m-d H:i:s", strtotime($min)))
            ->setMax(date("Y-m-d H:i:s", strtotime($max)))
            ->setMessage((string)$message);
    }

    /**
     * @return string
     */
    public function getMin(): string
    {
        return $this->min;
    }

    /**
     * @param string $min
     * @return Date
     */
    public function setMin(string $min): Date
    {
        $this->min = $min;
        return $this;
    }

    /**
     * @return string
     */
    public function getMax(): string
    {
        return $this->max;
    }

    /**
     * @param string $max
     * @return Date
     */
    public function setMax(string $max): Date
    {
        $this->max = $max;
        return $this;
    }

    /**
     * @param $value
     * @param null|Field $field
     * @return bool
     */
    public function isValid($value, $field = null): bool
    {
        $value = strtotime((string) $value);

        if($value >= strtotime($this->getMin()) && $value <= strtotime($this->getMax())){
            return true;
        }

        return false;
    }
}