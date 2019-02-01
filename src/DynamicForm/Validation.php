<?php
/**
 * Created by IntelliJ IDEA.
 * User: erdal
 * Date: 09.02.2018
 * Time: 09:35
 */

namespace DynamicForm;


/**
 * Interface Validation
 * @package DynamicForm\Fields
 */
interface Validation
{
    /**
     * @param array
     * @return bool
     */
    public function isValid(array $value): bool;

}