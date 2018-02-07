<?php
/**
 * Created by IntelliJ IDEA.
 * User: erdal
 * Date: 07.02.2018
 * Time: 12:19
 */

namespace DynamicForm\Fields\Items;


/**
 * Interface Item
 * @package DynamicForm\Fields\Items
 */
interface Item extends \JsonSerializable
{
    /**
     * @return string
     */
    public function getText(): string ;

    /**
     * @param string $text
     * @return mixed
     */
    public function setText(string $text);

}