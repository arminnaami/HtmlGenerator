<?php
/**
 * File for Form class
 */

namespace Marschel3000\Html\Generator;

/**
 * HTML <form> generator
 * @package Plugins
 * @author Marcel Kade <marcel.kade@mailbox.org>
 */
class Form extends Element implements ElementInterface
{
    /** @var string */
    protected $tag = 'form';

    /**
     * @param string $method Method (default: 'POST')
     * @param string $action Action (default: '' -> same page)
     */
    public function __construct(string $method = 'POST', string $action = '')
    {
        parent::__construct($this->tag);
        $this->setAttribute('method', strtoupper($method));
        $this->setAttribute('action', (empty($action)) ? '' : $action);
    }
}
