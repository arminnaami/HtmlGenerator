<?php
/**
 * Container-Interface File
 */

namespace Marschel3000\Html\Generator;

/**
 * Interface for all line-form / line-form-fieldset
 * @package Plugins
 * @author Marcel Kade <marcel.kade@t-systems.com>
 */
interface LineFormContainerInterface extends ElementInterface
{
    /**
     * neue Line (<p><label/><input/><span.helptext/></form>)
     * @param string $label
     * @param FormInputInterface $field
     * @param string $helptext
     * @return Element line
     */
    public function addLine(string $label, FormInputInterface $field, string $helptext = '') : Element;

        /**
     * fügt LineFormFieldset hinzu
     * @param string $legend
     * @return LineFormFieldset fieldset
     */
    public function addFieldset(string $legend) : LineFormFieldset;
}
