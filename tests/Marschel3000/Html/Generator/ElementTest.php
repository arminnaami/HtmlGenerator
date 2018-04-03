<?php
/**
 * Test Marschel3000\Element
 */

namespace Marschel3000\Tests\Html\Generator;

use Marschel3000\Html\Generator\Element;

/**
 * Test des Element Plugins
 * @author Marcel Kade <marcel.kade@mailbox.org>
 */
class ElementTest extends \PHPUnit\Framework\TestCase
{
    /** @var int aktuelles error_reporting */
    private $_current_error_reporting = null;

    public function setUp()
    {
        // disable warnings
        $this->_current_error_reporting = error_reporting();
        error_reporting(E_ERROR);
    }

    public function tearDown()
    {
        // enable "old" error_reporting
        error_reporting($this->_current_error_reporting);
    }

    public function testBasicEmptyRender()
    {
        $elem = new Element('span');
        $this->assertXmlStringEqualsXmlString('<span/>', $elem->render());
    }

    public function testBasicRender()
    {
        $elem = new Element('span', 'foo');
        $elem->addContent('test');
        $this->assertXmlStringEqualsXmlString('<span id="foo">test</span>', $elem->render());
    }

    public function testToString()
    {
        $elem = new Element('span');
        $elem->addContent('test');
        $this->assertXmlStringEqualsXmlString('<span>test</span>', (string)$elem);
    }

    public function testRenderWithChild()
    {
        $elem = new Element('div');

        $span1 = (new Element('span'))->addContent('span1');
        $elem->addChild($span1);

        $this->assertXmlStringEqualsXmlString('<div><span>span1</span></div>', $elem->render());

        // test reference
        $span1->addContent('ext');
        $this->assertXmlStringEqualsXmlString('<div><span>span1ext</span></div>', $elem->render());

        // add child element
        $span2 = new Element('span', 'span2');
        $elem->addChild($span2);
        $span1->addChild($span2);
        $this->assertXmlStringEqualsXmlString('<div><span>span1ext<span id="span2"/></span><span id="span2"/></div>', $elem->render());
    }

    public function testCssClasses()
    {
        $elem = new Element('span', 'foo');

        $elem->addCssClass('class1');
        $this->assertTrue($elem->hasCssClass('class1'));
        $this->assertFalse($elem->hasCssClass('class2'));
        $this->assertXmlStringEqualsXmlString('<span id="foo" class="class1"/>', $elem->render());

        $elem->addCssClass('class1');
        $this->assertTrue($elem->hasCssClass('class1'));
        $this->assertFalse($elem->hasCssClass('class2'));
        $this->assertXmlStringEqualsXmlString('<span id="foo" class="class1"/>', $elem->render());

        $elem->addCssClass('class2');
        $this->assertTrue($elem->hasCssClass('class1'));
        $this->assertTrue($elem->hasCssClass('class2'));
        $this->assertXmlStringEqualsXmlString('<span id="foo" class="class1 class2"/>', $elem->render());

        $elem->removeCssClass('class1');
        $this->assertFalse($elem->hasCssClass('class1'));
        $this->assertTrue($elem->hasCssClass('class2'));
        $this->assertXmlStringEqualsXmlString('<span id="foo" class="class2"/>', $elem->render());

        $elem->removeCssClass('class2');
        $this->assertFalse($elem->hasCssClass('class1'));
        $this->assertFalse($elem->hasCssClass('class2'));
        $this->assertXmlStringEqualsXmlString('<span id="foo" />', $elem->render());
    }

    public function testAttributes()
    {
        $elem = new Element('span', 'foo');

        $this->assertEquals('foo', $elem->getAttribute('id'));

        $this->assertEquals('class1', $elem->addCssClass('class1')->getAttribute('class'));
        $this->assertEquals('class1 class2', $elem->addCssClass('class2')->getAttribute('class'));
        $elem->removeCssClass('class1')->removeCssClass('class2');

        $elem->setAttribute('attr1', 'abc abc');
        $this->assertEquals('abc abc', $elem->getAttribute('attr1'));
        $this->assertNull($elem->getAttribute('attr2'));
        $this->assertXmlStringEqualsXmlString('<span id="foo" attr1="abc abc"/>', $elem->render());

        $elem->setAttribute('attr1', 'abc neu');
        $this->assertEquals('abc neu', $elem->getAttribute('attr1'));
        $this->assertNull($elem->getAttribute('attr2'));
        $this->assertXmlStringEqualsXmlString('<span id="foo" attr1="abc neu"/>', $elem->render());

        $elem->setAttribute('attr2', 'abc "at"tr2');
        $this->assertEquals('abc neu', $elem->getAttribute('attr1'));
        $this->assertEquals('abc "at"tr2', $elem->getAttribute('attr2'));
        $this->assertXmlStringEqualsXmlString('<span id="foo" attr1="abc neu" attr2="abc &quot;at&quot;tr2"/>', $elem->render());

        $elem->removeAttribute('attr1');
        $this->assertNull($elem->getAttribute('attr1'));
        $this->assertEquals('abc "at"tr2', $elem->getAttribute('attr2'));
        $this->assertXmlStringEqualsXmlString('<span id="foo" attr2="abc &quot;at&quot;tr2"/>', $elem->render());

        $elem->removeAttribute('attr2');
        $this->assertNull($elem->getAttribute('attr1'));
        $this->assertNull($elem->getAttribute('attr2'));
        $this->assertXmlStringEqualsXmlString('<span id="foo"/>', $elem->render());

        $elem->setAttribute('disabled');
        $this->assertEquals('disabled', $elem->getAttribute('disabled'));
        $this->assertXmlStringEqualsXmlString('<span id="foo" disabled="disabled"/>', $elem->render());

        $elem->removeAttribute('disabled');
        $this->assertNull($elem->getAttribute('disabled'));
        $this->assertXmlStringEqualsXmlString('<span id="foo"/>', $elem->render());
    }
}
