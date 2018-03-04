<?php
/**
 * Test Marschel3000\Checkbox
 */

namespace Myshs\Tests\Plugins\Html\Generator;

use Marschel3000\Html\Generator\Checkbox;

/**
 * Test des Checkbox Plugins
 * @author Marcel Kade <marcel.kade@t-systems.com>
 */
class CheckboxTest extends \PHPUnit\Framework\TestCase
{
    public function testRender()
    {
        $elem = new Checkbox('is_active', '1');
        $elem_expected = '<input name="is_active" id="id_is_active" type="checkbox" value="1"/>';
        $elem_checked_expected = '<input name="is_active" id="id_is_active" type="checkbox" value="1" checked="checked" class="checked" />';

        $this->assertFalse($elem->isChecked());
        $this->assertXmlStringEqualsXmlString($elem_expected, $elem->render());

        $elem->check();
        $this->assertTrue($elem->isChecked());
        $this->assertXmlStringEqualsXmlString($elem_checked_expected, $elem->render());

        $elem->uncheck();
        $this->assertFalse($elem->isChecked());
        $this->assertXmlStringEqualsXmlString($elem_expected, $elem->render());
    }
}
