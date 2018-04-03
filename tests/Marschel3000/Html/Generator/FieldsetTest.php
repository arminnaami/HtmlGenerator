<?php
/**
 * Test Marschel3000\Fieldset
 */


namespace Marschel3000\Tests\Html\Generator;

use Marschel3000\Html\Generator\Fieldset;

/**
 * Test des Fieldset Plugins
 * @author Marcel Kade <marcel.kade@mailbox.org>
 */
class FieldsetTest extends \PHPUnit\Framework\TestCase
{
    public function testBasicRender()
    {
        $elem = new Fieldset('I\'m legend');
        $this->assertXmlStringEqualsXmlString('<fieldset><legend>I\'m legend</legend></fieldset>', $elem->render());
    }
}
