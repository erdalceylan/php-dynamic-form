<?php
/**
 * Created by IntelliJ IDEA.
 * User: erdal
 * Date: 14.01.2019
 * Time: 09:53
 */

namespace DynamicForm;

/**
 * Interface Checker
 * @package DynamicForm
 */
interface Checker
{
    /**
     * @param $value
     * @return bool
     */
    public function contain($value): bool ;
}