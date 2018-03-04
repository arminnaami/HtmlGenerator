<?php
/**
 * Element-Interface File
 */

namespace Marschel3000\Html\Generator;

/**
 * Interface for all HTML-Tags
 * @package Plugins
 * @author Marcel Kade <marcel.kade@t-systems.com>
 */
interface ElementInterface
{
    /**
     * toString => render() alias
     * @return string
     */
    public function __toString();

    /**
     * add a child element
     * @param Element $child
     * @return ElementInterface instance
     */
    public function addChild(Element &$child) : ElementInterface;

    /**
     * add text content
     * @param string $str
     * @return ElementInterface instance
     */
    public function addContent(string $str) : ElementInterface;

    /**
     * add a single class
     * @param string $class
     * @return ElementInterface instance
     */
    public function addCssClass(string $class) : ElementInterface;

    /**
     * determine whether a class is present
     * @param string $class
     * @return bool
     */
    public function hasCssClass(string $class) : bool;

    /**
     * remove a single class
     * @param string $class
     * @return ElementInterface instance
     */
    public function removeCssClass(string $class) : ElementInterface;

    /**
     * set an attribute
     * @param string $attr attribute name
     * @param string $content attribute content
     * @return ElementInterface instance
     */
    public function setAttribute(string $attr, string $content = ''): ElementInterface;

    /**
     * get content of an attribute
     * @param string $attr attribute name
     * @return string|null attribute content or null
     */
    public function getAttribute(string $attr);

    /**
     * remove an attribute
     * @param string $attr
     * @return ElementInterface instance
     */
    public function removeAttribute(string $attr) : ElementInterface;

    /**
     * renders the element with all children as string
     * @return string
     */
    public function render() : string;

    /**
     * render html tag attributes
     * @return string
     */
    public function renderAttributes() :string;

    /**
     * render inner html
     * @return string
     */
    public function renderInnerHtml() : string;
}
