<?php
/**
 * Test Marschel3000\Label
 */


namespace Marschel3000\Tests\Html\Generator;

use Marschel3000\Html\Generator\Label;

/**
 * Test des Label Plugins
 * @author Marcel Kade <marcel.kade@mailbox.org>
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
