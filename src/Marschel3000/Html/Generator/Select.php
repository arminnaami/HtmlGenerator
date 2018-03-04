<?php
/**
 * File for Select class
 */

namespace Marschel3000\Html\Generator;

/**
 * HTML <select> input
 * @package Plugins
 * @author Marcel Kade <marcel.kade@t-systems.com>
 */
class Select extends AbstractFormInput implements FormInputInterface
{
    /** @var string */
    protected $tag = 'select';

    /** @var array List of used option values */
    protected $used_values = [];

    /** @inheritdoc */
    public function setValue(string $value) : FormInputInterface
    {
        foreach ($this->children as $child) {
            if ($child instanceof OptGroup) {
                $child->setSelectedValue($value);
            } elseif ($child instanceof Option) {
                if ($child->isSelected()) {
                    $child->deselect();
                }

                if ($child->getValue() === $value) {
                    $child->select();
                }
            }
        }

        return $this;
    }

    /** @inheritdoc */
    public function getValue()
    {
        foreach ($this->children as $child) {
            if ($child instanceof OptGroup) {
                $value = $child->getSelectedValue();
                if ($value !== null) {
                    return $value;
                }
            } elseif ($child instanceof Option) {
                if ($child->isSelected()) {
                    return $child->getValue();
                }
            }
        }

        return null;
    }

    /** @inheritdoc */
    public function renderInnerHtml() : string
    {
        $html = '';
        if (!$this->isRequired() and !in_array('', $this->used_values)) {
            $empty_option = Option::generateEmpty();
            $html .= (string)$empty_option;
        }
        $html .= parent::renderInnerHtml();
        return $html;
    }

    /**
     * add <option>
     * @param string $text
     * @param string $value
     * @return Option
     */
    public function &addOption(string $text, $value = null) : Option
    {
        if (in_array($value, $this->used_values)) {
            throw new Exception('Duplicate value "'.$value.'" for select "'.$this->id.'"');
        }

        $option = new Option($text, $value);
        $this->addChild($option);
        return $option;
    }

    /**
     * add multiple options
     * @param array $options ['{value:string}' => '{text:string}']
     * @param bool  $selected selected option (value)
     * @param array $disabled list of disabled oprions ([value])
     * @return Select instance
     */
    public function addOptions(array $options, string $selected = '', array $disabled = []) : Select
    {
        foreach ($options as $value => $text) {
            $option = $this->addOption($text, $value);

            if ($value === $selected) {
                $option->select();
            }
            if (in_array($value, $disabled)) {
                $option->disable();
            }
        }
        return $this;
    }

    /**
     * add <optgroup>
     * @param string $group_label optgroup label
     * @param array $options ['{value:string}' => '{text:string}']
     * @param bool  $selected selected option (value)
     * @param array $disabled list of disabled oprions ([value])
     * @return OptGroup optgroup
     */
    public function &addOptGroup(
        string $group_label,
        array $options,
        string $selected = '',
        array $disabled = []
    ) : OptGroup {
        $optgoup = new OptGroup($group_label);

        foreach ($options as $value => $text) {
            if (in_array($value, $this->used_values)) {
                throw new Exception('Duplicate value "'.$value.'" for select "'.$this->id.'"');
            }

            $option = new Option($text, $value);
            if ($value === $selected) {
                $option->select();
            }
            if (in_array($value, $disabled)) {
                $option->disable();
            }
            $optgoup->addChild($option);
        }

        $this->addChild($optgoup);
        return $optgoup;
    }
}
