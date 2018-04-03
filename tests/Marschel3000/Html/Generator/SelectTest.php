<?php
/**
 * Test Marschel3000\Select
 */

namespace Marschel3000\Tests\Html\Generator;

use Marschel3000\Html\Generator\Select;

/**
 * Test des Select Plugins
 * @author Marcel Kade <marcel.kade@mailbox.org>
 */
class SelectTest extends \PHPUnit\Framework\TestCase
{
    private $empty_option = '<option value="">---</option>';

    public function testBasicRender()
    {
        $elem = new Select('cars');
        $this->assertXmlStringEqualsXmlString('<select name="cars" id="id_cars">'.$this->empty_option.'</select>', $elem->render());
    }

    public function testDisable()
    {
        $elem = new Select('cars');
        $elem_expected = '<select name="cars" id="id_cars">'.$this->empty_option.'</select>';
        $elem_disabled_expected = '<select name="cars" id="id_cars" disabled="disabled" readonly="readonly" class="disabled readonly">'.$this->empty_option.'</select>';

        $this->assertFalse($elem->isDisabled());
        $this->assertXmlStringEqualsXmlString($elem_expected, $elem->render());

        $elem->disable();
        $this->assertTrue($elem->isDisabled());
        $this->assertXmlStringEqualsXmlString($elem_disabled_expected, $elem->render());

        $elem->reenable();
        $this->assertFalse($elem->isDisabled());
        $this->assertXmlStringEqualsXmlString($elem_expected, $elem->render());
    }

    public function testMarkRequired()
    {
        $elem = new Select('cars');
        $elem->addOption('Tesla Model S', 'tesla_model_s');
        $option_expected = '<option value="tesla_model_s">Tesla Model S</option>';
        $this->assertFalse($elem->isRequired());
        $this->assertXmlStringEqualsXmlString('<select name="cars" id="id_cars">'.$this->empty_option.$option_expected.'</select>', $elem->render());

        $elem->markRequired();
        $this->assertTrue($elem->isRequired());
        $this->assertXmlStringEqualsXmlString('<select name="cars" id="id_cars" required="required" class="required">'.$option_expected.'</select>', $elem->render());

        $elem->markOptional();
        $this->assertFalse($elem->isRequired());
        $this->assertXmlStringEqualsXmlString('<select name="cars" id="id_cars">'.$this->empty_option.$option_expected.'</select>', $elem->render());
    }

    public function testAddOption()
    {
        $elem = new Select('cars');

        $option1 = $elem->addOption('Zoe');
        $option1_expected = '<option value="Zoe">Zoe</option>';
        $this->assertXmlStringEqualsXmlString($option1_expected, $option1->render());
        $this->assertXmlStringEqualsXmlString('<select name="cars" id="id_cars">'.$this->empty_option.$option1_expected.'</select>', $elem->render());

        $option2 = $elem->addOption('Tesla Model S', 'tesla_model_s');
        $option2->disable();
        $option2_expected = '<option value="tesla_model_s" disabled="disabled" class="disabled">Tesla Model S</option>';
        $this->assertXmlStringEqualsXmlString($option2_expected, $option2->render());
        $this->assertXmlStringEqualsXmlString('<select name="cars" id="id_cars">'.$this->empty_option.$option1_expected.$option2_expected.'</select>', $elem->render());

        $option2->reenable();
        $option2_expected = '<option value="tesla_model_s">Tesla Model S</option>';
        $this->assertXmlStringEqualsXmlString($option2_expected, $option2->render());
        $this->assertXmlStringEqualsXmlString('<select name="cars" id="id_cars">'.$this->empty_option.$option1_expected.$option2_expected.'</select>', $elem->render());
    }

    public function testAddOptions()
    {
        $elem = new Select('cars');
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
        $this->assertXmlStringEqualsXmlString('<select name="cars" id="id_cars">'.$this->empty_option.$option1_expected.$option2_expected.'</select>', $elem->render());
    }

    public function testAddOptGroup()
    {
        $elem = new Select('cars');
        $elem->addOptGroup(
            'Petrol engine',
            [
                'bmw' => 'BMW',
                'vw' => 'VW'
            ]
        );
        $optgroup_1 = '<optgroup label="Petrol engine"><option value="bmw">BMW</option><option value="vw">VW</option></optgroup>';

        $elem->addOptGroup(
            'Electric cars',
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
        $this->assertXmlStringEqualsXmlString('<select name="cars" id="id_cars">'.$this->empty_option.$optgroup_1.'<optgroup label="Electric cars">'.$option1_expected.$option2_expected.'</optgroup></select>', $elem->render());
    }

    public function testValue()
    {
        $elem = new Select('cars');
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
        $this->assertNull($elem->getValue());
        $this->assertXmlStringEqualsXmlString('<select name="cars" id="id_cars">'.$this->empty_option.$option1_expected.$option2_expected.'</select>', $elem->render());

        $elem->setValue('Zoe');
        $this->assertEquals('Zoe', $elem->getValue());
        $this->assertXmlStringEqualsXmlString('<select name="cars" id="id_cars">'.$this->empty_option.$option1_selected_expected.$option2_expected.'</select>', $elem->render());

        $elem->setValue('tesla_model_s');
        $this->assertEquals('tesla_model_s', $elem->getValue());
        $this->assertXmlStringEqualsXmlString('<select name="cars" id="id_cars">'.$this->empty_option.$option1_expected.$option2_selected_expected.'</select>', $elem->render());
    }

    public function testOptGroupValue()
    {
        $elem = new Select('cars');
        $elem->addOptGroup(
            'Petrol engine',
            [
                'bmw' => 'BMW',
                'vw' => 'VW'
            ]
        );
        $optgroup_1 = '<optgroup label="Petrol engine"><option value="bmw">BMW</option><option value="vw">VW</option></optgroup>';

        $elem->addOptGroup(
            'Electric cars',
            [
                'Zoe' => 'Zoe',
                'tesla_model_s' => 'Tesla Model S'
            ]
        );
        $option1_expected = '<option value="Zoe">Zoe</option>';
        $option2_expected = '<option value="tesla_model_s">Tesla Model S</option>';
        $option1_selected_expected = '<option value="Zoe" selected="selected" class="selected">Zoe</option>';
        $option2_selected_expected = '<option value="tesla_model_s" selected="selected" class="selected">Tesla Model S</option>';
        $this->assertNull($elem->getValue());
        $this->assertXmlStringEqualsXmlString('<select name="cars" id="id_cars">'.$this->empty_option.$optgroup_1.'<optgroup label="Electric cars">'.$option1_expected.$option2_expected.'</optgroup></select>', $elem->render());

        $elem->setValue('Zoe');
        $this->assertEquals('Zoe', $elem->getValue());
        $this->assertXmlStringEqualsXmlString('<select name="cars" id="id_cars">'.$this->empty_option.$optgroup_1.'<optgroup label="Electric cars">'.$option1_selected_expected.$option2_expected.'</optgroup></select>', $elem->render());

        $elem->setValue('tesla_model_s');
        $this->assertEquals('tesla_model_s', $elem->getValue());
        $this->assertXmlStringEqualsXmlString('<select name="cars" id="id_cars">'.$this->empty_option.$optgroup_1.'<optgroup label="Electric cars">'.$option1_expected.$option2_selected_expected.'</optgroup></select>', $elem->render());
    }
}
