<?php
/**
 * Test Marschel3000\SubmitButton
 */

namespace Marschel3000\Tests\Html\Generator;

use Marschel3000\Html\Generator\SubmitButton;

/**
 * Test des SubmitButton Plugins
 * @author Marcel Kade <marcel.kade@mailbox.org>
 */
class SubmitButtonTest extends \PHPUnit\Framework\TestCase
{
    public function testBasicRender()
    {
        $elem = new SubmitButton('Send');
        $this->assertXmlStringEqualsXmlString('<input type="submit" value="Send" class="button" />', $elem->render());
    }
}
