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
class Option extends Element implements ElementInterface
{
    protected $tag = 'option';

    /**
     * @param string $text
     * @param string $value (default: $text)
     */
    public function __construct(string $text, $value = null)
    {
        parent::__construct($this->tag);

        if ($value === null) {
            $value = $text;
        }

        $this->addContent($text)->setAttribute('value', $value);
    }

    /**
     * generates "empty" option (value="", text="---")
     * @return Option
     */
    public static function generateEmpty()
    {
        return new Option('---', '');
    }

    /**
     * returns option value
     * @return string
     */
    public function getValue() : string
    {
        return $this->getAttribute('value');
    }

    /**
     * disable option (attribute 'disabled'; css-class 'disabled')
     * @return Option
     */
    public function disable() : Option
    {
        return $this->setAttribute('disabled')->addCssClass('disabled');
    }

    /**
     * reenable option
     * @return Option
     */
    public function reenable() : Option
    {
        return $this->removeAttribute('disabled')->removeCssClass('disabled');
    }

    /**
     * check if option is disabled
     * @return bool
     */
    public function isDisabled() : bool
    {
        return ($this->getAttribute('disabled') !== null);
    }

    /**
     * select option (attribute 'disabled'; css-class 'disabled')
     * @return Option
     */
    public function select() : Option
    {
        return $this->setAttribute('selected')->addCssClass('selected');
    }

    /**
     * deselect option
     * @return Option
     */
    public function deselect() : Option
    {
        return $this->removeAttribute('selected')->removeCssClass('selected');
    }

    /**
     * check if option is disabled
     * @return bool
     */
    public function isSelected() : bool
    {
        return ($this->getAttribute('selected') !== null);
    }
}
