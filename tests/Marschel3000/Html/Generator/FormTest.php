<?php
/**
 * Test Marschel3000\Form
 */


namespace Marschel3000\Tests\Html\Generator;

use Marschel3000\Html\Generator\Form;

/**
 * Test des Form
 * @author Marcel Kade <marcel.kade@mailbox.org>
 */
class FormTest extends \PHPUnit\Framework\TestCase
{
    public function testBasicRender()
    {
        $elem = new Form();
        $this->assertXmlStringEqualsXmlString('<form action="" method="POST"/>', $elem->render());

        $elem = new Form('get', '');
        $this->assertXmlStringEqualsXmlString('<form action="" method="GET"/>', $elem->render());
    }
}
