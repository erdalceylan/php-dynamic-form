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
 * Class StringLength
 * @package DynamicForm\Fields\Validators
 */
class StringLength extends Validator
{
    /**
     * @var int
     */
    protected $min;
    /**
     * @var int
     */
    protected $max;

    public function __construct($min = 0, $max = PHP_INT_MAX, $message = '')
    {
        parent::__construct();
        $this
            ->setMin((int)$min)
            ->setMax((int)$max)
            ->setMessage((string)$message);
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
    public function setMax(int $max): self
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
        $value = mb_strlen((string) $value);

        if($value >= $this->getMin() && $value <= $this->getMax()){
            return true;
        }

        return false;
    }
}
