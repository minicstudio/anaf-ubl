<?php

namespace MinicStudio\UBL\Tests;

use MinicStudio\UBL\Transport\Confirmare;
use MinicStudio\UBL\Transport\Correction;
use MinicStudio\UBL\Transport\Notificare;
use MinicStudio\UBL\Transport\Partner;
use MinicStudio\UBL\Transport\Date;
use MinicStudio\UBL\Transport\Delete;
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
    public function testNotificareXML()
    {
        $partner = (new Partner)
            ->setCountryCode('RO')
            ->setCode('1234567')
            ->setName('Minic Studio');

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
            ->setOperationTypeCodeAsAttribute('30')
            ->setPartner($partner)
            ->setDate($date)
            ->setLoadingDock($loading_dock)
            ->setUnLoadingDock($un_loading_dock)
            ->setItems($items)
            ->setDocuments($documents);

        $transport = (new Transport())
            ->setCodDeclarant('159')
            ->setReferenceDeclarant('159')
            ->setNotificare($notificare);

        // Test created object
        // Use \MinicStudio\UBL\Generator to generate an XML string
        $generator = new \MinicStudio\UBL\Generator();
        $outputXMLString = $generator->transport($transport);

        // Create PHP Native DomDocument object, that can be
        // used to validate the generate XML
        $dom = new \DOMDocument;
        $dom->loadXML($outputXMLString);

        $dom->save('./tests/generated_files/NotificareTest.xml');

        $this->assertEquals(true, $dom->schemaValidate($this->schema));
    }

    public function testConfirmareXML()
    {
        $confirmation = (new Confirmare)
            ->setUit('3V0P0L0P0T3JUW46')
            ->setConfirmationType('10');

        $transport = (new Transport())
            ->setCodDeclarant('159')
            ->setReferenceDeclarant('159')
            ->setConfirmation($confirmation);

        // Test created object
        // Use \MinicStudio\UBL\Generator to generate an XML string
        $generator = new \MinicStudio\UBL\Generator();
        $outputXMLString = $generator->transport($transport);

        // Create PHP Native DomDocument object, that can be
        // used to validate the generate XML
        $dom = new \DOMDocument;
        $dom->loadXML($outputXMLString);

        $dom->save('./tests/generated_files/ConfirmareTest.xml');

        $this->assertEquals(true, $dom->schemaValidate($this->schema));
    }

    public function testStergereXML()
    {
        $delete = (new Delete)
            ->setUit('3V0P0L0P0T3JUW46');

        $transport = (new Transport())
            ->setCodDeclarant('159')
            ->setReferenceDeclarant('159')
            ->setDelete($delete);

        // Test created object
        // Use \MinicStudio\UBL\Generator to generate an XML string
        $generator = new \MinicStudio\UBL\Generator();
        $outputXMLString = $generator->transport($transport);

        // Create PHP Native DomDocument object, that can be
        // used to validate the generate XML
        $dom = new \DOMDocument;
        $dom->loadXML($outputXMLString);

        $dom->save('./tests/generated_files/ConfirmareTest.xml');

        $this->assertEquals(true, $dom->schemaValidate($this->schema));
    }

    public function testCorrectie1807XML()
    {
        $partner = (new Partner)
            ->setCountryCode('RO')
            ->setCode('1234567')
            ->setName('Minic Studio');

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

        $correction = (new Correction)
            ->setUit('4C0U0C0J0W3DDQ92');

        $notificare = (new Notificare)
            ->setOperationTypeCodeAsAttribute('30')
            ->setPartner($partner)
            ->setDate($date)
            ->setLoadingDock($loading_dock)
            ->setUnLoadingDock($un_loading_dock)
            ->setItems($items)
            ->setDocuments($documents)
            ->setCorrection($correction);

        $transport = (new Transport())
            ->setCodDeclarant('159')
            ->setReferenceDeclarant('referinta declarant')
            ->setNotificare($notificare);

        // Test created object
        // Use \MinicStudio\UBL\Generator to generate an XML string
        $generator = new \MinicStudio\UBL\Generator();
        $outputXMLString = $generator->transport($transport);

        // Create PHP Native DomDocument object, that can be
        // used to validate the generate XML
        $dom = new \DOMDocument;
        $dom->loadXML($outputXMLString);

        $dom->save('./tests/generated_files/Corectie1807Test.xml');

        $this->assertEquals(true, $dom->schemaValidate($this->schema));
    }

    public function testCorrectie2503XML()
    {
        $partner = (new Partner)
            ->setCountryCode('RO')
            ->setCode('1234567')
            ->setName('Minic Studio');

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
            ->setOperationTypeCodeAsAttribute('10')
            ->setOperationTypeCodeAselement('10')
            ->setPartner($partner)
            ->setDate($date)
            ->setLoadingDock($loading_dock)
            ->setUnLoadingDock($un_loading_dock)
            ->setItems($items)
            ->setDocuments($documents);

        $transport = (new Transport())
            ->setCodDeclarant('159')
            ->setReferenceDeclarant('referinta declarant')
            ->setNotificare($notificare);

        // Test created object
        // Use \MinicStudio\UBL\Generator to generate an XML string
        $generator = new \MinicStudio\UBL\Generator();
        $outputXMLString = $generator->transport($transport);

        // Create PHP Native DomDocument object, that can be
        // used to validate the generate XML
        $dom = new \DOMDocument;
        $dom->loadXML($outputXMLString);

        $dom->save('./tests/generated_files/Corectie2530Test.xml');

        $this->assertEquals(true, $dom->schemaValidate($this->schema));
    }
}