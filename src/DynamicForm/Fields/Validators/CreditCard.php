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
 * Class CreditCard
 * @package DynamicForm\Fields\Validators
 */
class CreditCard extends Validator
{
    /**
     * CreditCard constructor.
     * @param string $message
     */
    public function __construct($message = '')
    {
        parent::__construct();
        $this
            ->setMessage((string)$message);
    }

    /**
     * @param $value
     * @param null|Field $field
     * @return bool
     */
    public function isValid($value, $field = null): bool
    {
        $sum = '';

        $reversed = array_reverse(str_split((string) $value));

        foreach ($reversed as $key => $val) {
            $sum .= $key & 1 ? $reversed[$key] * 2 : $reversed[$key];
        }

        return array_sum(str_split($sum)) % 10 === 0;
    }
}