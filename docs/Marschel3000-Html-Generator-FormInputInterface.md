Marschel3000\Html\Generator\FormInputInterface
===============

Interface for all HTML inputs (input, select, textarea, .

..)


* Interface name: FormInputInterface
* Namespace: Marschel3000\Html\Generator
* This is an **interface**
* This interface extends: [Marschel3000\Html\Generator\ElementInterface](Marschel3000-Html-Generator-ElementInterface.md)





Methods
-------


### generateLabel

    \Marschel3000\Html\Generator\Label Marschel3000\Html\Generator\FormInputInterface::generateLabel(string $text)

generate Label for a form Input



* Visibility: **public**


#### Arguments
* $text **string**



### disable

    \Marschel3000\Html\Generator\FormInputInterface Marschel3000\Html\Generator\FormInputInterface::disable()

disable input (attribute 'disabled', 'readonly'; css-class 'disabled', 'readonly')



* Visibility: **public**




### reenable

    \Marschel3000\Html\Generator\FormInputInterface Marschel3000\Html\Generator\FormInputInterface::reenable()

reenable input



* Visibility: **public**




### isDisabled

    boolean Marschel3000\Html\Generator\FormInputInterface::isDisabled()

check if input is disabled



* Visibility: **public**




### markRequired

    \Marschel3000\Html\Generator\FormInputInterface Marschel3000\Html\Generator\FormInputInterface::markRequired()

marks an input as required



* Visibility: **public**




### markOptional

    \Marschel3000\Html\Generator\FormInputInterface Marschel3000\Html\Generator\FormInputInterface::markOptional()

mark input as oprional (not required)



* Visibility: **public**




### isRequired

    boolean Marschel3000\Html\Generator\FormInputInterface::isRequired()

check if input is required



* Visibility: **public**




### setValue

    \Marschel3000\Html\Generator\FormInputInterface Marschel3000\Html\Generator\FormInputInterface::setValue(string $value)

set input value



* Visibility: **public**


#### Arguments
* $value **string**



### getValue

    string|null Marschel3000\Html\Generator\FormInputInterface::getValue()

get input value



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



