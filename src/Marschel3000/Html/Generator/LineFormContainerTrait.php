<?php
/**
 * File for LineFormTrait trait
 */

namespace Marschel3000\Html\Generator;

/**
 * HTML <form> generator (<p><label/><input/><span.helptext/></form>)
 * @package Plugins
 * @author Marcel Kade <marcel.kade@mailbox.org>
 */
trait LineFormContainerTrait
{
    /**
     * neue Line (<p><label/><input/><span.helptext/></form>)
     * @param string $label
     * @param FormInputInterface $field
     * @param string $helptext
     * @return Element line
     */
    public function addLine(string $label, FormInputInterface $field, string $helptext = '') : Element
    {
        $line = new Element('p');
        $label = $field->generateLabel($label);
        $line->addChild($label);
        $line->addChild($field);

        if ($helptext !== '') {
            $span = (new Element('span'))->addCssClass('helptext')->addContent($helptext);
            $line->addChild($span);
        }

        $this->addChild($line);
        return $line;
    }

    /**
     * fügt LineFormFieldset hinzu
     * @param string $legend
     * @return LineFormFieldset fieldset
     */
    public function addFieldset(string $legend) : LineFormFieldset
    {
        $fieldset = new LineFormFieldset($legend);
        $this->addChild($fieldset);
        return $fieldset;
    }
}
