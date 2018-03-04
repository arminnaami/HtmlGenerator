<?php
/**
 * File for Label class
 */

namespace Marschel3000\Html\Generator;

/**
 * HTML <label> generator
 * @package Plugins
 * @author Marcel Kade <marcel.kade@t-systems.com>
 */
class Label extends Element implements ElementInterface
{
    /** @var string */
    protected $tag = 'label';

    /**
     * @param string $id_form_element ID corresponding
     * @param string $text Text
     */
    public function __construct(string $id_form_element, string $text)
    {
        parent::__construct($this->tag);
        $this->setAttribute('for', $id_form_element);
        $this->addContent($text);
    }
}
