<?php

namespace MinicStudio\UBL\Tests;

use MinicStudio\UBL\Transport\Confirmare;
use MinicStudio\UBL\Transport\Correction;
use MinicStudio\UBL\Transport\Notificare;
use MinicStudio\UBL\Transport\Partner;
use MinicStudio\UBL\Transport\Date;
use MinicStudio\UBL\Transport\Delete;
use MinicStudio\UBL\Transport\LoadingDock;
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

    /**
     * Test the notification
     * @param \MinicStudio\UBL\Transport\Notificare
     * @return void
     */
    public function testNotificareXML()
    {
        // Transport partner
        $partner = (new Partner)
            ->setCountryCode('RO')
            ->setCode('1234567')
            ->setName('Minic Studio');

        // Transport date
        $date = (new Date)
            ->setCarNumber('B111ABC')
            ->setTrailerNumberOne('B111ABC')
            ->setTrailerNumberTwo('B111ABC')
            ->setTransportCountryCode('RO')
            ->setTransportCode('1234567')
            ->setTransportName('Minic Studio')
            ->setTransportDate('2022-11-11');

        // Transport loading dock
        $loading_dock = (new LoadingDock)
            ->setCountyCode('1')
            ->setCity('Odorheiu Scuiesc')
            ->setStreet('Bechlean')
            ->setAddressNumber('198')
            ->setBlockNumber('7')
            ->setStairs('2')
            ->setFloor('2')
            ->setApartmentNumber('15')
            ->setInformation('nothing')
            ->setPostCode('456789');

        // Transport unloading dock
        $un_loading_dock = (new UnLoadingDock)
            ->setCountyCode('1')
            ->setCity('Odorheiu Scuiesc')
            ->setStreet('Bechlean')
            ->setAddressNumber('198')
            ->setBlockNumber('7')
            ->setStairs('2')
            ->setFloor('2')
            ->setApartmentNumber('15')
            ->setInformation('nothing')
            ->setPostCode('456789');

        // Transport product
        $items = [(new TransportItem)
            ->setCrtNumber('2')
            ->setTariffCode('2020')
            ->setProductName('product')
            ->setPurposeOperationCode('300101')
            ->setQuantity('50.5')
            ->setUnitOfMeasureCode('10')
            ->setNetWright('50.5')
            ->setGrossWright('50.5')
            ->setPriceWithoutVat('50')
        ];

        // Transport document
        $documents = [(new TransportDocument)
            ->setCodTipOperatiune('10')
            ->setDocumentNumber('2')
            ->setDocumentDate('2022-11-11')
            ->setDocumentInformation('nothing')
        ];

        // Transport notification
        $notificare = (new Notificare)
            ->setOperationTypeCodeAsAttribute('30')
            ->setPartner($partner)
            ->setDate($date)
            ->setLoadingDock($loading_dock)
            ->setUnLoadingDock($un_loading_dock)
            ->setItems($items)
            ->setDocuments($documents);

        // Transport
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

    /**
     * Test the confirmation
     * @param \MinicStudio\UBL\Transport\Confirmare
     * @return void
     */
    public function testConfirmareXML()
    {
        // Transport confirmation
        $confirmation = (new Confirmare)
            ->setUit('3V0P0L0P0T3JUW46')
            ->setConfirmationType('10')
            ->setRemarks('information');

        // Transport
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

    /**
     * Test delete
     * @param \MinicStudio\UBL\Transport\Delete
     * @return void
     */
    public function testStergereXML()
    {
        // Transport delete
        $delete = (new Delete)
            ->setUit('3V0P0L0P0T3JUW46');

        // Transport
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

        $dom->save('./tests/generated_files/StergereTest.xml');

        $this->assertEquals(true, $dom->schemaValidate($this->schema));
    }

    /**
     * Test the correction
     * @param \MinicStudio\UBL\Transport\Correction
     * @return void
     */
    public function testCorrectie1807XML()
    {
        // Transport partner corretion
        $partner = (new Partner)
            ->setCountryCode('RO')
            ->setCode('1234567')
            ->setName('Minic Studio');

        // Transport date corretion
        $date = (new Date)
            ->setCarNumber('B111ABC')
            ->setTrailerNumberOne('B111ABC')
            ->setTrailerNumberTwo('B111ABC')
            ->setTransportCountryCode('RO')
            ->setTransportCode('1234567')
            ->setTransportName('Minic Studio')
            ->setTransportDate('2022-11-11');

        // Transport loading dock corretion
        $loading_dock = (new LoadingDock)
            ->setCountyCode('1')
            ->setCity('Bucuresti')
            ->setStreet('Caramidariei')
            ->setAddressNumber('198')
            ->setBlockNumber('7')
            ->setStairs('2')
            ->setFloor('2')
            ->setApartmentNumber('15')
            ->setInformation('nothing')
            ->setPostCode('456789');

        // Transport unloading dock corretion
        $un_loading_dock = (new UnLoadingDock)
            ->setCountyCode('1')
            ->setCity('Bucuresti')
            ->setStreet('Caramidariei')
            ->setAddressNumber('198')
            ->setBlockNumber('7')
            ->setStairs('2')
            ->setFloor('2')
            ->setApartmentNumber('15')
            ->setInformation('nothing')
            ->setPostCode('456789');

        // Transport product corretion
        $items = [(new TransportItem)
            ->setCrtNumber('2')
            ->setTariffCode('2020')
            ->setProductName('product')
            ->setPurposeOperationCode('300101')
            ->setQuantity('50.5')
            ->setUnitOfMeasureCode('10')
            ->setNetWright('50.5')
            ->setGrossWright('50.5')
            ->setPriceWithoutVat('50')
        ];

        // Transport document corretion
        $documents = [(new TransportDocument)
            ->setCodTipOperatiune('10')
            ->setDocumentNumber('2')
            ->setDocumentDate('2022-11-11')
            ->setDocumentInformation('nothing')
        ];

        // Transport corretion
        $correction = (new Correction)
            ->setUit('4C0U0C0J0W3DDQ92');

        // Transport notification corretion
        $notificare = (new Notificare)
            ->setOperationTypeCodeAsAttribute('30')
            ->setPartner($partner)
            ->setDate($date)
            ->setLoadingDock($loading_dock)
            ->setUnLoadingDock($un_loading_dock)
            ->setItems($items)
            ->setDocuments($documents)
            ->setCorrection($correction);

        // Transport corretion
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
}