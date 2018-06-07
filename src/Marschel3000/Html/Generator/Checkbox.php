<?php
/**
 * File for Input class
 */

namespace Marschel3000\Html\Generator;

/**
 * HTML <input>
 * @package Plugins
 * @author Marcel Kade <marcel.kade@t-systems.com>
 */
class Checkbox extends Input implements FormInputInterface
{
    /**
     * @param string $name Input-Name
     * @param string $value (default: 1)
     * @param string $id (default: 'id_'+$name)
     */
    public function __construct(string $name, string $value = '1', string $id = '')
    {
        parent::__construct($name, 'checkbox', $id);
        $this->setValue($value);
    }

    /**
     * select option (attribute 'checked'; css-class 'checked')
     * @return Checkbox instance
     */
    public function check() : Checkbox
    {
        return $this->setAttribute('checked')->addCssClass('checked');
    }

    /**
     * deselect option
     * @return Checkbox instance
     */
    public function uncheck() : Checkbox
    {
        return $this->removeAttribute('checked')->removeCssClass('checked');
    }

    /**
     * is checkbox checked
     * @return bool
     */
    public function isChecked() : bool
    {
        return ($this->getAttribute('checked') !== null);
    }
}
