<?php
/**
 * File for Input class
 */

namespace Marschel3000\Html\Generator;

/**
 * HTML <input>
 * @package Plugins
 * @author Marcel Kade <marcel.kade@mailbox.org>
 */
class Input extends AbstractFormInput implements FormInputInterface
{
    /** @var string */
    protected $tag = 'input';

    /**
     * @param string $name Input-name
     * @param string $type Input-type (defaut: 'text)
     * @param string $id   ID (default: 'id_'.$name)
     */
    public function __construct(string $name, string $type = 'text', string $id = '')
    {
        parent::__construct($name, $id);
        $this->setAttribute('type', $type);
    }

    /**
     * set input value
     * @param string $value
     * @return FormInputInterface instance
     */
    public function setValue(string $value) : FormInputInterface
    {
        return $this->setAttribute('value', $value);
    }

    /**
     * get input value
     * @return string|null
     */
    public function getValue()
    {
        return $this->getAttribute('value');
    }

    /** @inheritdoc */
    public function addChild(Element &$child) : ElementInterface
    {
        throw new RuntimeException('Inputs cannot have children');
    }
}
