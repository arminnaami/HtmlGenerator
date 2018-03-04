Marschel3000\Html\Generator\LineFormFieldset
===============

HTML &lt;form&gt; generator (&lt;p&gt;&lt;label/&gt;&lt;input/&gt;&lt;span.helptext/&gt;&lt;/form&gt;)




* Class name: LineFormFieldset
* Namespace: Marschel3000\Html\Generator
* Parent class: [Marschel3000\Html\Generator\Fieldset](Marschel3000-Html-Generator-Fieldset.md)
* This class implements: [Marschel3000\Html\Generator\LineFormContainerInterface](Marschel3000-Html-Generator-LineFormContainerInterface.md)






Methods
-------


### addLine

    \Marschel3000\Html\Generator\Element Marschel3000\Html\Generator\LineFormContainerInterface::addLine(string $label, \Marschel3000\Html\Generator\FormInputInterface $field, string $helptext)

neue Line (<p><label/><input/><span.helptext/></form>)



* Visibility: **public**
* This method is defined by [Marschel3000\Html\Generator\LineFormContainerInterface](Marschel3000-Html-Generator-LineFormContainerInterface.md)


#### Arguments
* $label **string**
* $field **[Marschel3000\Html\Generator\FormInputInterface](Marschel3000-Html-Generator-FormInputInterface.md)**
* $helptext **string**



### addFieldset

    \Marschel3000\Html\Generator\LineFormFieldset Marschel3000\Html\Generator\LineFormContainerInterface::addFieldset(string $legend)

fügt LineFormFieldset hinzu



* Visibility: **public**
* This method is defined by [Marschel3000\Html\Generator\LineFormContainerInterface](Marschel3000-Html-Generator-LineFormContainerInterface.md)


#### Arguments
* $legend **string**



### __construct

    mixed Marschel3000\Html\Generator\Element::__construct(string $tag, string $id)





* Visibility: **public**
* This method is defined by [Marschel3000\Html\Generator\Element](Marschel3000-Html-Generator-Element.md)


#### Arguments
* $tag **string** - &lt;p&gt;Tag-Name&lt;/p&gt;
* $id **string** - &lt;p&gt;Element ID&lt;/p&gt;



### __toString

    string Marschel3000\Html\Generator\ElementInterface::__toString()

toString => render() alias



* Visibility: **public**
* This method is defined by [Marschel3000\Html\Generator\ElementInterface](Marschel3000-Html-Generator-ElementInterface.md)




### addChild

    \Marschel3000\Html\Generator\ElementInterface Marschel3000\Html\Generator\ElementInterface::addChild(\Marschel3000\Html\Generator\Element $child)

add a child element



* Visibility: **public**
* This method is defined by [Marschel3000\Html\Generator\ElementInterface](Marschel3000-Html-Generator-ElementInterface.md)


#### Arguments
* $child **[Marschel3000\Html\Generator\Element](Marschel3000-Html-Generator-Element.md)**



### addContent

    \Marschel3000\Html\Generator\ElementInterface Marschel3000\Html\Generator\ElementInterface::addContent(string $str)

add text content



* Visibility: **public**
* This method is defined by [Marschel3000\Html\Generator\ElementInterface](Marschel3000-Html-Generator-ElementInterface.md)


#### Arguments
* $str **string**



### addCssClass

    \Marschel3000\Html\Generator\ElementInterface Marschel3000\Html\Generator\ElementInterface::addCssClass(string $class)

add a single class



* Visibility: **public**
* This method is defined by [Marschel3000\Html\Generator\ElementInterface](Marschel3000-Html-Generator-ElementInterface.md)


#### Arguments
* $class **string**



### hasCssClass

    boolean Marschel3000\Html\Generator\ElementInterface::hasCssClass(string $class)

determine whether a class is present



* Visibility: **public**
* This method is defined by [Marschel3000\Html\Generator\ElementInterface](Marschel3000-Html-Generator-ElementInterface.md)


#### Arguments
* $class **string**



### removeCssClass

    \Marschel3000\Html\Generator\ElementInterface Marschel3000\Html\Generator\ElementInterface::removeCssClass(string $class)

remove a single class



* Visibility: **public**
* This method is defined by [Marschel3000\Html\Generator\ElementInterface](Marschel3000-Html-Generator-ElementInterface.md)


#### Arguments
* $class **string**



### setAttribute

    \Marschel3000\Html\Generator\ElementInterface Marschel3000\Html\Generator\ElementInterface::setAttribute(string $attr, string $content)

set an attribute



* Visibility: **public**
* This method is defined by [Marschel3000\Html\Generator\ElementInterface](Marschel3000-Html-Generator-ElementInterface.md)


#### Arguments
* $attr **string** - &lt;p&gt;attribute name&lt;/p&gt;
* $content **string** - &lt;p&gt;attribute content&lt;/p&gt;



### getAttribute

    string|null Marschel3000\Html\Generator\ElementInterface::getAttribute(string $attr)

get content of an attribute



* Visibility: **public**
* This method is defined by [Marschel3000\Html\Generator\ElementInterface](Marschel3000-Html-Generator-ElementInterface.md)


#### Arguments
* $attr **string** - &lt;p&gt;attribute name&lt;/p&gt;



### removeAttribute

    \Marschel3000\Html\Generator\ElementInterface Marschel3000\Html\Generator\ElementInterface::removeAttribute(string $attr)

remove an attribute



* Visibility: **public**
* This method is defined by [Marschel3000\Html\Generator\ElementInterface](Marschel3000-Html-Generator-ElementInterface.md)


#### Arguments
* $attr **string**



### render

    string Marschel3000\Html\Generator\ElementInterface::render()

renders the element with all children as string



* Visibility: **public**
* This method is defined by [Marschel3000\Html\Generator\ElementInterface](Marschel3000-Html-Generator-ElementInterface.md)




### renderAttributes

    string Marschel3000\Html\Generator\ElementInterface::renderAttributes()

render html tag attributes



* Visibility: **public**
* This method is defined by [Marschel3000\Html\Generator\ElementInterface](Marschel3000-Html-Generator-ElementInterface.md)




### renderInnerHtml

    string Marschel3000\Html\Generator\ElementInterface::renderInnerHtml()

render inner html



* Visibility: **public**
* This method is defined by [Marschel3000\Html\Generator\ElementInterface](Marschel3000-Html-Generator-ElementInterface.md)



