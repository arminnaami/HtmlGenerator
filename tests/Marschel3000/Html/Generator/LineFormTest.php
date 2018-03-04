<?php
/**
 * Test Marschel3000\LineForm
 */


namespace Myshs\Tests\Plugins\Html\Generator;

use Marschel3000\Html\Generator\LineForm;
use Marschel3000\Html\Generator\Input;

/**
 * Test des LineForm Plugins
 * @author Marcel Kade <marcel.kade@t-systems.com>
 */
class LineFormTest extends \PHPUnit\Framework\TestCase
{
    public function testBasicRender()
    {
        $elem = new LineForm();
        $this->assertXmlStringEqualsXmlString('<form action="" method="POST" class="line_form"/>', $elem->render());

        $elem->addLine('Name:', (new Input('name')));
        $line1 = '<p><label for="id_name">Name:</label><input type="text" name="name" id="id_name" /></p>';
        $this->assertXmlStringEqualsXmlString('<form action="" method="POST" class="line_form">'.$line1.'</form>', $elem->render());

        $fs = $elem->addFieldset('Basic');
        $fs->addLine('Age:', new Input('age', 'number'), 'Set your age');
        $fs->addLine('Password:', new Input('password', 'password'));
        $line2 = '<p><label for="id_age">Age:</label><input type="number" name="age" id="id_age" /><span class="helptext">Set your age</span></p>';
        $line3 = '<p><label for="id_password">Password:</label><input type="password" name="password" id="id_password" /></p>';
        $fs_excpected = '<fieldset><legend>Basic</legend>'.$line2.$line3.'</fieldset>';
        $this->assertXmlStringEqualsXmlString('<form action="" method="POST" class="line_form">'.$line1.$fs_excpected.'</form>', $elem->render());
    }
}
