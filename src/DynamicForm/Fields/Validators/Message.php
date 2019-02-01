<?php
/**
 * Created by IntelliJ IDEA.
 * User: erdal
 * Date: 10.01.2019
 * Time: 17:42
 */

namespace DynamicForm\Fields\Validators;


/**
 * Class Message
 * @package DynamicForm\Fields\Validators
 */
class Message implements \JsonSerializable
{
    /**
     * @var string
     */
    protected $text;
    /**
     * @var string
     */
    protected $key;

    /**
     * Message constructor.
     * @param $key
     * @param $text
     */
    public function __construct($key, $text)
    {
        $this->text = $text;
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return static
     */
    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return static
     */
    public function setKey(string $key): self
    {
        $this->key = $key;
        return $this;
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