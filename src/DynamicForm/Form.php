<?php
/**
 * Created by IntelliJ IDEA.
 * User: erdal
 * Date: 07.02.2018
 * Time: 10:48
 */

namespace DynamicForm;

/**
 * Class Form
 * @package DynamicForm
 */
class Form implements \JsonSerializable
{
    /**
     * @var string $title
     */
    protected $title;
    /**
     * @var string $subTitle
     */
    protected $subTitle;
    /**
     * @var string $name
     */
    protected $name;
    /**
     * @var Field[] $fields
     */
    protected $fields;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Form
     */
    public function setTitle(string $title): Form
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubTitle(): string
    {
        return $this->subTitle;
    }

    /**
     * @param string $subTitle
     * @return Form
     */
    public function setSubTitle(string $subTitle): Form
    {
        $this->subTitle = $subTitle;
        return $this;
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
     * @return Form
     */
    public function setName(string $name): Form
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param $fields Field[]
     * @return Form
     */
    public function setFields(Array $fields)
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * @param Field $field
     * @return $this
     */
    public function add(Field $field){

        $this->fields[] = $field;
        return $this;
    }

    /**
     * @param Field $field
     * @return Form
     */
    public function append(Field $field){

        $this->add($field);
        return $this;
    }

    /**
     * @param Field $field
     * @return Form
     */
    public function prepend(Field $field){

        array_unshift($this->fields, $field);
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