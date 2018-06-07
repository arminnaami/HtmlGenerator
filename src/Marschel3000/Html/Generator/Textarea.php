<?php
/**
 * File for Textarea class
 */

namespace Marschel3000\Html\Generator;

/**
 * HTML <textarea>
 * @package Plugins
 * @author Marcel Kade <marcel.kade@mailbox.org>
 */
class Textarea extends AbstractFormInput implements FormInputInterface
{
    /** @var string */
    protected $tag = 'textarea';

    /** @inheritdoc */
    public function setValue(string $value) : FormInputInterface
    {
        $this->children = [];
        return $this->addContent($value);
    }

    /** @inheritdoc */
    public function getValue()
    {
        if (!empty($this->children)) {
            return (string)$this->children[0];
        }
        return null;
    }

    /** @inheritdoc */
    public function addChild(Element &$child) : ElementInterface
    {
        throw new RuntimeException('Textareas cannot have children');
    }
}
