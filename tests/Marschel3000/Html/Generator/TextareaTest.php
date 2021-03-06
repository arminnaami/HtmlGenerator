<?php
/**
 * Test Marschel3000\Textarea
 */

namespace Marschel3000\Tests\Html\Generator;

use Marschel3000\Html\Generator\Textarea;

/**
 * Test des Textarea Plugins
 * @author Marcel Kade <marcel.kade@mailbox.org>
 */
class TextareaTest extends \PHPUnit\Framework\TestCase
{
    public function testBasicRender()
    {
        $elem = new Textarea('remark');
        $this->assertXmlStringEqualsXmlString('<textarea name="remark" id="id_remark" />', $elem->render());
    }

    public function testRenderWithValue()
    {
        $elem = new Textarea('remark');
        $elem->setValue('test');
        $this->assertXmlStringEqualsXmlString('<textarea name="remark" id="id_remark">test</textarea>', $elem->render());
    }
}
