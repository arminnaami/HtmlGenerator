Marschel3000\Html\Generator\Option
===============

HTML &lt;select&gt; input




* Class name: Option
* Namespace: Marschel3000\Html\Generator
* Parent class: [Marschel3000\Html\Generator\Element](Marschel3000-Html-Generator-Element.md)
* This class implements: [Marschel3000\Html\Generator\ElementInterface](Marschel3000-Html-Generator-ElementInterface.md)






Methods
-------


### __construct

    mixed Marschel3000\Html\Generator\Element::__construct(string $tag, string $id)





* Visibility: **public**
* This method is defined by [Marschel3000\Html\Generator\Element](Marschel3000-Html-Generator-Element.md)


#### Arguments
* $tag **string** - &lt;p&gt;Tag-Name&lt;/p&gt;
* $id **string** - &lt;p&gt;Element ID&lt;/p&gt;



### generateEmpty

    \Marschel3000\Html\Generator\Option Marschel3000\Html\Generator\Option::generateEmpty()

generates "empty" option (value="", text="---")



* Visibility: **public**
* This method is **static**.




### getValue

    string Marschel3000\Html\Generator\Option::getValue()

returns option value



* Visibility: **public**




### disable

    \Marschel3000\Html\Generator\Option Marschel3000\Html\Generator\Option::disable()

disable option (attribute 'disabled'; css-class 'disabled')



* Visibility: **public**




### reenable

    \Marschel3000\Html\Generator\Option Marschel3000\Html\Generator\Option::reenable()

reenable option



* Visibility: **public**




### isDisabled

    boolean Marschel3000\Html\Generator\Option::isDisabled()

check if option is disabled



* Visibility: **public**




### select

    \Marschel3000\Html\Generator\Option Marschel3000\Html\Generator\Option::select()

select option (attribute 'disabled'; css-class 'disabled')



* Visibility: **public**




### deselect

    \Marschel3000\Html\Generator\Option Marschel3000\Html\Generator\Option::deselect()

deselect option



* Visibility: **public**




### isSelected

    boolean Marschel3000\Html\Generator\Option::isSelected()

check if option is disabled



* Visibility: **public**




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



