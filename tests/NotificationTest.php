<?php

namespace MinicStudio\UBL\Tests;

use MinicStudio\UBL\Transport\Correction;
use MinicStudio\UBL\Transport\Notificare;
use MinicStudio\UBL\Transport\Partner;
use MinicStudio\UBL\Transport\Date;
use MinicStudio\UBL\Transport\LoadingDock;
use MinicStudio\UBL\Transport\OperationTypeCode;
use MinicStudio\UBL\Transport\Transport;
use MinicStudio\UBL\Transport\TransportDocument;
use MinicStudio\UBL\Transport\TransportItem;
use MinicStudio\UBL\Transport\UnLoadingDock;
use PHPUnit\Framework\TestCase;

/**
 * Test an UBL2.2 invoice document
 */
class TransportTest extends TestCase
{
    private $schema = '../anaf-ubl/SchemaSimtic.xsd';

    /** @test */
    public function testTransportXML()
    {
        $partner = (new Partner)
            ->setCountryCode('RO')
            ->setCode('1234567')
            ->setName('Minic Studio');

        $operation_type_code = (new OperationTypeCode)
            ->setOperationTypeCode('10');

        $correction = (new Correction)
            ->setUit('3V0P0L0P0T3JUW46');

        $date = (new Date)
            ->setCarNumber('hr-01-vls')
            ->setCountryCode('RO')
            ->setCode('1234567')
            ->setName('Minic Studio')
            ->setdate('2022-11-11');

        $loading_dock = (new LoadingDock)
            ->setCountyCode('1')
            ->setCity('Bucuresti')
            ->setStreet('Caramidariei');

        $un_loading_dock = (new UnLoadingDock)
            ->setCountyCode('1')
            ->setCity('Bucuresti')
            ->setStreet('Caramidariei');

        $items = [(new TransportItem)];

        $documents = [(new TransportDocument)];

        $notificare = (new Notificare)
            ->setCodeDeclarant('1234567')
            ->setPartner($partner)
            ->setCorrection($correction)
            ->setDate($date)
            ->setOperationTypeCode($operation_type_code)
            ->setLoadingDock($loading_dock)
            ->setUnLoadingDock($un_loading_dock)
            ->setItems($items)
            ->setDocuments($documents);

        $transport = (new Transport())
            ->setNotificare($notificare);

        // Test created object
        // Use \MinicStudio\UBL\Invoice\Generator to generate an XML string
        $generator = new \MinicStudio\UBL\Generator();
        $outputXMLString = $generator->transport($transport);

        // Create PHP Native DomDocument object, that can be
        // used to validate the generate XML
        $dom = new \DOMDocument;
        $dom->loadXML($outputXMLString);

        $dom->save('./tests/NotificationTest.xml');

        $this->assertEquals(true, $dom->schemaValidate($this->schema));

        dd($outputXMLString);
    } 
}