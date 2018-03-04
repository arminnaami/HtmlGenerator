<?php
/**
 * File for Fieldset class
 */

namespace Marschel3000\Html\Generator;

/**
 * HTML <fieldset> generator
 * @package Plugins
 * @author Marcel Kade <marcel.kade@t-systems.com>
 */
class Fieldset extends Element implements ElementInterface
{
    /** @var string */
    protected $tag = 'fieldset';

    /**
     * @param string $legend
     */
    public function __construct(string $legend)
    {
        parent::__construct($this->tag);
        $legend = (new Element('legend'))->addContent($legend);
        $this->addChild($legend);
    }
}
