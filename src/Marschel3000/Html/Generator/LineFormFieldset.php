<?php
/**
 * File for LineFormFieldset class
 */

namespace Marschel3000\Html\Generator;

/**
 * HTML <form> generator (<p><label/><input/><span.helptext/></form>)
 * @package Plugins
 * @author Marcel Kade <marcel.kade@mailbox.org>
 */
final class LineFormFieldset extends Fieldset implements LineFormContainerInterface
{
    use LineFormContainerTrait;
}
