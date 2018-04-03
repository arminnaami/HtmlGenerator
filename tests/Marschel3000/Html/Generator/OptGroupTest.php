<?php
/**
 * Test Marschel3000\OptGroup
 */

namespace Marschel3000\Tests\Html\Generator;

use Marschel3000\Html\Generator\OptGroup;

/**
 * Test des OptGroup Plugins
 * @author Marcel Kade <marcel.kade@mailbox.org>
 */
class OptGroupTest extends \PHPUnit\Framework\TestCase
{
    public function testAddOptions()
    {
        $elem = new OptGroup('Electric cars');
        $elem->addOptions(
            [
                'Zoe' => 'Zoe',
                'tesla_model_s' => 'Tesla Model S'
            ],
            'Zoe',
            [
                'tesla_model_s'
            ]
        );
        $option1_expected = '<option value="Zoe" selected="selected" class="selected">Zoe</option>';
        $option2_expected = '<option value="tesla_model_s" disabled="disabled" class="disabled">Tesla Model S</option>';
        $this->assertEquals('Zoe', $elem->getSelectedValue());
        $this->assertXmlStringEqualsXmlString('<optgroup label="Electric cars">'.$option1_expected.$option2_expected.'</optgroup>', $elem->render());
    }

    public function testValue()
    {
        $elem = new OptGroup('Electric cars');
        $this->assertXmlStringEqualsXmlString('<optgroup label="Electric cars" />', $elem->render());

        $elem->addOptions(
            [
                'Zoe' => 'Zoe',
                'tesla_model_s' => 'Tesla Model S'
            ]
        );
        $option1_expected = '<option value="Zoe">Zoe</option>';
        $option2_expected = '<option value="tesla_model_s">Tesla Model S</option>';
        $option1_selected_expected = '<option value="Zoe" selected="selected" class="selected">Zoe</option>';
        $option2_selected_expected = '<option value="tesla_model_s" selected="selected" class="selected">Tesla Model S</option>';
        $this->assertNull($elem->getSelectedValue());
        $this->assertXmlStringEqualsXmlString('<optgroup label="Electric cars">'.$option1_expected.$option2_expected.'</optgroup>', $elem->render());

        $elem->setSelectedValue('Zoe');
        $this->assertEquals('Zoe', $elem->getSelectedValue());
        $this->assertXmlStringEqualsXmlString('<optgroup label="Electric cars">'.$option1_selected_expected.$option2_expected.'</optgroup>', $elem->render());

        $elem->setSelectedValue('tesla_model_s');
        $this->assertEquals('tesla_model_s', $elem->getSelectedValue());
        $this->assertXmlStringEqualsXmlString('<optgroup label="Electric cars">'.$option1_expected.$option2_selected_expected.'</optgroup>', $elem->render());
    }
}
