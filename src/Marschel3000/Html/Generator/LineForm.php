<?php
/**
 * File for LineForm class
 */

namespace Marschel3000\Html\Generator;

/**
 * HTML <form> generator (<p><label/><input/><span.helptext/></form>)
 * @package Plugins
 * @author Marcel Kade <marcel.kade@mailbox.org>
 */
final class LineForm extends Form implements LineFormContainerInterface
{
    use LineFormContainerTrait;

    /** @inheritdoc */
    public function __construct(string $method = 'POST', string $action = '')
    {
        parent::__construct($method, $action);
        $this->addCssClass('line_form');
    }
}
