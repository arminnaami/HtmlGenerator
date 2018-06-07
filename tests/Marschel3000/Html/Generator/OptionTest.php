<?php
/**
 * Test Marschel3000\Option
 */

namespace Marschel3000\Tests\Html\Generator;

use Marschel3000\Html\Generator\Option;

/**
 * Test des Option Plugins
 * @author Marcel Kade <marcel.kade@mailbox.org>
 */
class OptionTest extends \PHPUnit\Framework\TestCase
{

    public function testBasicRender()
    {
        $option1 = new Option('Zoe');
        $option1_expected = '<option value="Zoe">Zoe</option>';
        $this->assertEquals('Zoe', $option1->getValue('Zoe'));
        $this->assertXmlStringEqualsXmlString($option1_expected, $option1->render());

        $option2 = new Option('Tesla Model S', 'tesla_model_s');
        $option2_expected = '<option value="tesla_model_s">Tesla Model S</option>';
        $this->assertXmlStringEqualsXmlString($option2_expected, $option2->render());
    }

    public function testGenerateEmpty()
    {
        $option1 = Option::generateEmpty();
        $option1_expected = '<option value="">---</option>';
        $this->assertXmlStringEqualsXmlString($option1_expected, $option1->render());
    }

    public function testDisable()
    {
        $option = new Option('Tesla Model S', 'tesla_model_s');
        $option_expected = '<option value="tesla_model_s">Tesla Model S</option>';
        $option_disabled_expected = '<option value="tesla_model_s" disabled="disabled" class="disabled">Tesla Model S</option>';

        $this->assertXmlStringEqualsXmlString($option_expected, $option->render());

        $option->disable();
        $this->assertTrue($option->isDisabled());
        $this->assertXmlStringEqualsXmlString($option_disabled_expected, $option->render());

        $option->reenable();
        $this->assertFalse($option->isDisabled());
        $this->assertXmlStringEqualsXmlString($option_expected, $option->render());
    }

    public function testSelect()
    {
        $option = new Option('Tesla Model S', 'tesla_model_s');
        $option_expected = '<option value="tesla_model_s">Tesla Model S</option>';
        $option_selected_expected = '<option value="tesla_model_s" selected="selected" class="selected">Tesla Model S</option>';

        $this->assertXmlStringEqualsXmlString($option_expected, $option->render());

        $option->select();
        $this->assertTrue($option->isSelected());
        $this->assertXmlStringEqualsXmlString($option_selected_expected, $option->render());

        $option->deselect();
        $this->assertFalse($option->isSelected());
        $this->assertXmlStringEqualsXmlString($option_expected, $option->render());
    }
}
