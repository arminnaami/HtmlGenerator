<?php
/**
 * File for SubmitButton class
 */

namespace Marschel3000\Html\Generator;

/**
 * HTML <inout type="submit> generator
 * @package Plugins
 * @author Marcel Kade <marcel.kade@t-systems.com>
 */
class SubmitButton extends Element implements ElementInterface
{
    /** @var string */
    protected $tag = 'input';

    /**
     * @param string $legend
     */
    public function __construct(string $text)
    {
        parent::__construct($this->tag);
        $this->setAttribute('type', 'submit');
        $this->setAttribute('value', $text);
        $this->addCssClass('button');
    }
}
