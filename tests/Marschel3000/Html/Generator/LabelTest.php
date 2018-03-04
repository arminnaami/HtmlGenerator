<?php
/**
 * Test Marschel3000\Label
 */


namespace Myshs\Tests\Plugins\Html\Generator;

use Marschel3000\Html\Generator\Label;

/**
 * Test des Label Plugins
 * @author Marcel Kade <marcel.kade@t-systems.com>
 */
class LabelTest extends \PHPUnit\Framework\TestCase
{
    public function setUp()
    {
    }

    public function tearDown()
    {
    }

    public function testBasicRender()
    {
        $elem = new Label('id_name', 'Name Test');
        $this->assertXmlStringEqualsXmlString('<label for="id_name">Name Test</label>', $elem->render());
    }
}
