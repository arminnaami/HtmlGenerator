<?php
/**
 * Test Marschel3000\Fieldset
 */


namespace Myshs\Tests\Plugins\Html\Generator;

use Marschel3000\Html\Generator\Fieldset;

/**
 * Test des Fieldset Plugins
 * @author Marcel Kade <marcel.kade@t-systems.com>
 */
class FieldsetTest extends \PHPUnit\Framework\TestCase
{
    public function testBasicRender()
    {
        $elem = new Fieldset('I\'m legend');
        $this->assertXmlStringEqualsXmlString('<fieldset><legend>I\'m legend</legend></fieldset>', $elem->render());
    }
}
