<?php
/**
 * Created by IntelliJ IDEA.
 * User: erdal
 * Date: 07.02.2018
 * Time: 10:48
 */

namespace DynamicForm;

use DynamicForm\Fields\Validators\Message;

/**
 * Class Form
 * @package DynamicForm
 */
class Form implements \JsonSerializable, Validation
{
    /**
     * @var string $title
     */
    protected $title;
    /**
     * @var string $name
     */
    protected $name;
    /**
     * @var Field[] $fields
     */
    protected $fields = [];

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return static
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return static
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Field[]
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param $fields Field[]
     * @return static
     */
    public function setFields(Array $fields): self
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * @param Field $field
     * @return static
     */
    public function add($field): self
    {

        if($field instanceof Field){

            $this->fields[] = $field;
        }

        return $this;
    }

    /**
     * @param Field $field
     * @return static
     */
    public function append($field): self
    {

        return $this->add($field);
    }

    /**
     * @param Field $field
     * @return static
     */
    public function prepend($field): self
    {

        if($field instanceof Field){

            array_unshift($this->fields, $field);
        }

        return $this;
    }

    /**
     * @param $value array
     * @return bool
     */
    public function isValid(array $value): bool
    {
        foreach ($this->getFields() as $field){

            if(!$field->isValid($value)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param array $value ['a'=>1, 'b'=> 2]
     * @return Message[]
     */
    public function getErrorMessages(array $value) :array
    {
        $messages = [];

        foreach ($this->getFields() as $field){

            $messages = array_merge($messages, $field->getErrorMessages($value));
        }

        return $messages;
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
