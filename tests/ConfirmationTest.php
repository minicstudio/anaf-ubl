<?php

namespace MinicStudio\UBL\Tests;

use MinicStudio\UBL\Transport\Confirmare;
use MinicStudio\UBL\Transport\Transport;
use PHPUnit\Framework\TestCase;

/**
 * Test an UBL2.2 invoice document
 */
class ConfirmationTest extends TestCase
{
    private $schema = '../anaf-ubl/SchemaSimtic.xsd';

    /** @test */
    public function testTransportXML()
    {
        $confirmation = (new Confirmare)
            ->setUit('3V0P0L0P0T3JUW46')
            ->setConfirmationType('10');

        $transport = (new Transport())
            ->setConfirmation($confirmation);

        // Test created object
        // Use \MinicStudio\UBL\Invoice\Generator to generate an XML string
        $generator = new \MinicStudio\UBL\Generator();
        $outputXMLString = $generator->transport($transport);

        // Create PHP Native DomDocument object, that can be
        // used to validate the generate XML
        $dom = new \DOMDocument;
        $dom->loadXML($outputXMLString);

        $dom->save('./tests/ConfiramtionTest.xml');

        $this->assertEquals(true, $dom->schemaValidate($this->schema));

        dd($outputXMLString);
    } 
}