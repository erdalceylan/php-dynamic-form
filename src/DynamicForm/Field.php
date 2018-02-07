<?php
/**
 * Created by IntelliJ IDEA.
 * User: erdal
 * Date: 07.02.2018
 * Time: 10:54
 */

namespace DynamicForm;


/**
 * Interface Field
 * @package DynamicForm
 */
interface Field extends \JsonSerializable
{
    /**
     * @var string
     */
    const TYPE_TEXT = "text";
    /**
     *@var string
     */
    const TYPE_SELECT = "select";
    /**
     *@var string
     */
    const TYPE_RADIO= "radio";
    /**
     *@var string
     */
    const TYPE_CHECKBOX= "checkbox";
    /**
     *@var string
     */
    const TYPE_RANGE= "range";

    /**
     * @return string
     */
    public function getType(): string ;

    /**
     * @return string
     */
    public function getName(): string ;

    /**
     * @param string $name
     * @return mixed
     */
    public function setName(string $name);

    /**
     * @return string
     */
    public function getLabel(): string ;

    /**
     * @param string $label
     * @return mixed
     */
    public function setLabel(string $label);
}