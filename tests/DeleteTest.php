<?php

namespace MinicStudio\UBL\Tests;

use MinicStudio\UBL\Transport\Delete;
use MinicStudio\UBL\Transport\Transport;
use PHPUnit\Framework\TestCase;

/**
 * Test an UBL2.2 invoice document
 */
class DeleteTest extends TestCase
{
    private $schema = '../anaf-ubl/SchemaSimtic.xsd';

    /** @test */
    public function testTransportXML()
    {
        $delete = (new Delete)
            ->setUit('3V0P0L0P0T3JUW46');

        $transport = (new Transport())
            ->setDelete($delete);

        // Test created object
        // Use \MinicStudio\UBL\Invoice\Generator to generate an XML string
        $generator = new \MinicStudio\UBL\Generator();
        $outputXMLString = $generator->transport($transport);

        // Create PHP Native DomDocument object, that can be
        // used to validate the generate XML
        $dom = new \DOMDocument;
        $dom->loadXML($outputXMLString);

        $dom->save('./tests/DeleteTest.xml');

        $this->assertEquals(true, $dom->schemaValidate($this->schema));

        dd($outputXMLString);
    } 
}