<?php
/**
 * Created by IntelliJ IDEA.
 * User: erdal
 * Date: 10.01.2019
 * Time: 14:56
 */

namespace DynamicForm\Fields;


use DynamicForm\Field;

/**
 * Interface Validator
 * @package DynamicForm\Fields
 */
abstract class Validator implements \JsonSerializable
{
    /**
     * @var static
     */
    protected $type;
    /**
     * @var string
     */
    protected $message;

    public function __construct()
    {
        $this->type = self::getClassName();
    }

    /**
     * @param $value
     * @param null|Field $field
     * @return bool
     */
    abstract public function isValid($value, $field = null): bool;

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return static
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return bool|string
     */
    public static function getClassName()
    {
        return substr(strrchr(static::class, "\\"), 1) ;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}