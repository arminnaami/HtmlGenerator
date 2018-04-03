<?php
/**
 * File for AbstractFormInput class
 */

namespace Marschel3000\Html\Generator;

/**
 * HTML generic form input (input, select, textarea,..) generator
 * @package Plugins
 * @author Marcel Kade <marcel.kade@mailbox.org>
 */
abstract class AbstractFormInput extends Element implements FormInputInterface
{
    /**
     * @param string $name Element Name
     * @param string $id   Element ID (default: 'id_'.$name)
     */
    public function __construct(string $name, string $id = '')
    {
        $this->name = $name;

        // generate id, if not given
        if ($id === '') {
            $id = 'id_'.$name;
        }

        parent::__construct($this->tag, $id);
        $this->setAttribute('name', $name);
    }

    /**
     * generate Label for a form input
     * @param string $text Label-Text
     * @return Label
     */
    public function generateLabel(string $text) : Label
    {
        $label = new Label($this->id, $text);

        foreach (['required', 'disabled', 'readonly'] as $css_class) {
            if ($this->hasCssClass($css_class)) {
                $label->addCssClass($css_class);
            }
        }

        return $label;
    }

    /**
     * disable input (attribute 'disabled', 'readonly'; css-class 'disabled', 'readonly')
     * @return FormInputInterface instance
     */
    public function disable() : FormInputInterface
    {
        $this->setAttribute('disabled')->addCssClass('disabled');
        $this->setAttribute('readonly')->addCssClass('readonly');
        return $this;
    }

    /**
     * reenable input
     * @return FormInputInterface instance
     */
    public function reenable() : FormInputInterface
    {
        $this->removeAttribute('disabled')->removeCssClass('disabled');
        $this->removeAttribute('readonly')->removeCssClass('readonly');
        return $this;
    }

    /**
     * check if input is disabled
     * @return bool
     */
    public function isDisabled() : bool
    {
        return ($this->getAttribute('disabled') !== null);
    }

    /**
     * marks an input as required
     * @return FormInputInterface instance
     */
    public function markRequired() : FormInputInterface
    {
        return $this->setAttribute('required')->addCssClass('required');
    }

    /**
     * mark input as oprional (not required)
     * @return FormInputInterface instance
     */
    public function markOptional() : FormInputInterface
    {
        return $this->removeAttribute('required')->removeCssClass('required');
    }

    /**
     * check if input is required
     * @return bool
     */
    public function isRequired() : bool
    {
        return ($this->getAttribute('required') !== null);
    }
}
