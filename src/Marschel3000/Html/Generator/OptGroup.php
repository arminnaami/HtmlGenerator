<?php
/**
 * File for Label class
 */

namespace Marschel3000\Html\Generator;

/**
 * HTML <label> generator
 * @package Plugins
 * @author Marcel Kade <marcel.kade@t-systems.com>
 */
class OptGroup extends Element implements ElementInterface
{
    /** @var string */
    protected $tag = 'optgroup';

    /**
     * @param string $label
     */
    public function __construct(string $label)
    {
        parent::__construct($this->tag);
        $this->setAttribute('label', $label);
    }

    /**
     * add multiple options
     * @param array $options ['{value:string}' => '{text:string}']
     * @param bool  $selected selected option (value)
     * @param array $disabled list of disabled options ([value])
     * @return OptGroup instance
     */
    public function addOptions(array $options, string $selected = '', array $disabled = []) : OptGroup
    {
        foreach ($options as $value => $text) {
            $option = new Option($text, $value);

            if ($value === $selected) {
                $option->select();
            }
            if (in_array($value, $disabled)) {
                $option->disable();
            }
            $this->addChild($option);
        }
        return $this;
    }


    /**
     * set selected option
     * @param string $value
     * @return OptGroup instance
     */
    public function setSelectedValue(string $value) : OptGroup
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

    /**
     * get selected option
     * @return string|null
     */
    public function getSelectedValue()
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
}
