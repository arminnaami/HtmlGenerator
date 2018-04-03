<?php
/**
 * Element-Interface File
 */

namespace Marschel3000\Html\Generator;

/**
 * Interface for all HTML inputs (input, select, textarea, ...)
 * @package Plugins
 * @author Marcel Kade <marcel.kade@mailbox.org>
 */
interface FormInputInterface extends ElementInterface
{
    /**
     * generate Label for a form Input
     * @param string $text
     * @return Label
     */
    public function generateLabel(string $text) : Label;

    /**
     * disable input (attribute 'disabled', 'readonly'; css-class 'disabled', 'readonly')
     * @return FormInputInterface instance
     */
    public function disable() : FormInputInterface;

    /**
     * reenable input
     * @return FormInputInterface instance
     */
    public function reenable() : FormInputInterface;

    /**
     * check if input is disabled
     * @return bool
     */
    public function isDisabled() : bool;

    /**
     * marks an input as required
     * @return FormInputInterface instance
     */
    public function markRequired() : FormInputInterface;

    /**
     * mark input as oprional (not required)
     * @return FormInputInterface instance
     */
    public function markOptional() : FormInputInterface;

    /**
     * check if input is required
     * @return bool
     */
    public function isRequired() : bool;

    /**
     * set input value
     * @param string $value
     * @return FormInputInterface instance instance
     */
    public function setValue(string $value);

    /**
     * get input value
     * @return string|null
     */
    public function getValue();
}
