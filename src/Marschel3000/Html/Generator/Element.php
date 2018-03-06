<?php
/**
 * File for Element class
 */

namespace Marschel3000\Html\Generator;

/**
 * HTML Element generator
 * @package Plugins
 * @author Marcel Kade <marcel.kade@t-systems.com>
 */
class Element implements ElementInterface
{
    /** @var string */
    protected $id;

    /** @var string */
    protected $tag;

    /** @var array */
    protected $css_classes = [];

    /** @var array ('{attribute name} => '{attribute content}') */
    protected $attributes = [];

    /** @var array Attributes, that accepted as bool */
    protected $boolean_attributes = ['required', 'disabled', 'readonly', 'selected', 'checked', 'multiple'];

    /** @var array(Element|string) */
    protected $children = [];

    /**
     * @param string $tag Tag-Name
     * @param string $id  Element ID
     */
    public function __construct(string $tag, string $id = '')
    {
        $this->tag = $tag;
        $this->id = ($id !== '') ? $id : null;
    }

    /** @inheritdoc */
    public function __toString()
    {
        return $this->render();
    }

    /** @inheritdoc */
    public function addChild(Element &$child) : ElementInterface
    {
        $this->children[] = $child;
        return $this;
    }

    /** @inheritdoc */
    public function addContent(string $str) : ElementInterface
    {
        $this->children[] = $str;
        return $this;
    }

    /** @inheritdoc */
    public function addCssClass(string $class) : ElementInterface
    {
        if (!$this->hasCssClass($class)) {
            $this->css_classes[] = $class;
        } else {
            trigger_error('CSS-Class "'.$class.'" already present', E_USER_NOTICE);
        }
        return $this;
    }

    /** @inheritdoc */
    public function hasCssClass(string $class) : bool
    {
        return (in_array($class, $this->css_classes));
    }

    /** @inheritdoc */
    public function removeCssClass(string $class) : ElementInterface
    {
        if ($this->hasCssClass($class)) {
            $this->css_classes = array_diff($this->css_classes, [$class]);
        } else {
            trigger_error('CSS-Class "'.$class.'" not found', E_USER_NOTICE);
        }
        return $this;
    }

    /** @inheritdoc */
    public function setAttribute(string $attr, string $content = '') : ElementInterface
    {
        if (in_array($attr, ['id', 'class'])) {
            throw new \InvalidArgumentException('Attribute "'.$attr.'" cannot be set directly');
        }

        // set name also as content, if no content is given (f.e. readonly, disabled)
        $this->attributes[$attr] = (empty($content) and in_array($attr, $this->boolean_attributes)) ? $attr : $content;

        return $this;
    }

    /** @inheritdoc */
    public function getAttribute(string $attr)
    {
        if ($attr === 'id') {
            return $this->id;
        } elseif ($attr === 'class') {
            return implode(' ', $this->css_classes);
        } elseif (isset($this->attributes[$attr])) {
            return $this->attributes[$attr];
        }

        return null;
    }

    /** @inheritdoc */
    public function removeAttribute(string $attr) : ElementInterface
    {
        if (in_array($attr, ['id', 'class'])) {
            throw new \InvalidArgumentException('Attribute "'.$attr.'" cannot be set directly');
        } elseif (isset($this->attributes[$attr])) {
            unset($this->attributes[$attr]);
        } else {
            trigger_error('Attribute "'.$attr.'" not found', E_USER_NOTICE);
        }
        return $this;
    }

    /** @inheritdoc */
    public function render() : string
    {
        // render start tag
        $html = '<'.$this->tag;

        $html .= $this->renderAttributes();

        $inner_html = $this->renderInnerHtml();
        if ($inner_html === '') {
            // no children => short html tag
            $html .= '/>';
        } else {
            $html .= '>'.$inner_html. '</'.$this->tag.'>';
        }

        return $html;
    }

    /** @inheritdoc */
    public function renderAttributes() :string
    {
        $html = '';

        if ($this->id !== null) {
            $html .= ' id="'.$this->id.'"';
        }

        if (!empty($this->css_classes)) {
            $html .= ' class="'.implode(' ', $this->css_classes).'"';
        }

        foreach ($this->attributes as $attr => $attr_content) {
            $attr_content = str_replace('"', '&quot;', $attr_content);
            $html .= ' '.$attr.'="'.$attr_content.'"';
        }

        return $html;
    }

    /** @inheritdoc */
    public function renderInnerHtml() : string
    {
        $html = '';

        // render children
        foreach ($this->children as $item) {
            $html .= (string)$item;
        }

        return $html;
    }
}
