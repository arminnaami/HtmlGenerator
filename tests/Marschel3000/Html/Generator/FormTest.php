<?php
/**
 * Test Marschel3000\Form
 */


namespace Myshs\Tests\Plugins\Html\Generator;

use Marschel3000\Html\Generator\Form;

/**
 * Test des Form
 * @author Marcel Kade <marcel.kade@t-systems.com>
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
