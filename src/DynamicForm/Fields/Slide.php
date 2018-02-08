<?php
/**
 * Created by IntelliJ IDEA.
 * User: erdal
 * Date: 07.02.2018
 * Time: 11:41
 */

namespace DynamicForm\Fields;


/**
 * Class Slide
 * @package DynamicForm\Fields
 */
class Slide implements Field
{
    /**
     * @var string
     */
    protected $type = Field::TYPE_SLIDE;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var int
     */
    protected $value;
    /**
     * @var string
     */
    protected $label;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Slide
     */
    public function setName(string $name): Slide
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     * @return Slide
     */
    public function setValue($value): Slide
    {
        $this->value = (int)$value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return Text
     */
    public function setLabel(string $label): Text
    {
        $this->label = $label;
        return $this;
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