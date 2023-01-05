<?php

namespace MinicStudio\UBL\Tests;

use MinicStudio\UBL\Transport\V1\Confirmare;
use MinicStudio\UBL\Transport\V1\Correction;
use MinicStudio\UBL\Transport\V1\NotificareAnterioare;
use MinicStudio\UBL\Transport\V1\Partner;
use MinicStudio\UBL\Transport\V1\Delete;
use MinicStudio\UBL\Transport\V2\Location;
use MinicStudio\UBL\Transport\V2\Notificare;
use MinicStudio\UBL\Transport\V2\LoadingDock;
use MinicStudio\UBL\Transport\V2\Date;
use MinicStudio\UBL\Transport\V2\Transport;
use MinicStudio\UBL\Transport\V2\TransportDocument;
use MinicStudio\UBL\Transport\V2\TransportItem;
use MinicStudio\UBL\Transport\V2\UnLoadingDock;
use MinicStudio\UBL\Transport\V2\VehicleModification;
use PHPUnit\Framework\TestCase;

/**
 * Test an UBL2.2 invoice document
 */
class TransportTestV2 extends TestCase
{
    private $schema = 'schema_ETR_v2_20221215.xsd';

    /**
     * Test the notification
     * @param \MinicStudio\UBL\Transport\V1\Notificare
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

        // Transport location
        $location = (new Location)
            ->setCountyCode('6')
            ->setCity('Odorhei')
            ->setStreet('Bechlean');

        // Transport loading dock
        $loading_dock = (new LoadingDock)
            ->setLocation($location);

        // Transport unloading dock
        $un_loading_dock = (new UnLoadingDock)
            ->setLocation($location);

        // Transport product
        $items = [(new TransportItem)
            ->setTariffCode('2020')
            ->setProductName('product')
            ->setPurposeOperationCode('401')
            ->setQuantity('50.5')
            ->setUnitOfMeasureCode('10')
            ->setNetWeight('50.5')
            ->setGrossWeight('50.5')
            ->setPriceWithoutVat('50')
        ];

        // Transport document
        $documents = [(new TransportDocument)
            ->setDocumentType('10')
            ->setDocumentDate('2022-11-11')
        ];

        //Transport notificare anterioare
        $prio_notice = (new NotificareAnterioare)
            ->setUit('3V0P0L0P0T3JUW46');

        // Transport notification
        $notificare = (new Notificare)
            ->setOperationTypeCode('40')
            ->setPartner($partner)
            ->setDate($date)
            ->setLoadingDock($loading_dock)
            ->setUnLoadingDock($un_loading_dock)
            ->setItems($items)
            ->setDocuments($documents)
            ->setPrioNotice($prio_notice);

        // Transport
        $transport = (new Transport())
            ->setCodDeclarant('159')
            ->setNotificare($notificare);

        // Test created object
        // Use \MinicStudio\UBL\Generator to generate an XML string
        $generator = new \MinicStudio\UBL\Generator();
        $outputXMLString = $generator->transportV2($transport);

        // Create PHP Native DomDocument object, that can be
        // used to validate the generate XML
        $dom = new \DOMDocument;
        $dom->loadXML($outputXMLString);

        $dom->save('./tests/generated_files/NotificareTestV2.xml');

        $this->assertEquals(true, $dom->schemaValidate($this->schema));
    }

    /**
     * Test the confirmation
     * @param \MinicStudio\UBL\Transport\V1\Confirmare
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
            ->setConfirmation($confirmation);

        // Test created object
        // Use \MinicStudio\UBL\Generator to generate an XML string
        $generator = new \MinicStudio\UBL\Generator();
        $outputXMLString = $generator->transportV2($transport);

        // Create PHP Native DomDocument object, that can be
        // used to validate the generate XML
        $dom = new \DOMDocument;
        $dom->loadXML($outputXMLString);

        $dom->save('./tests/generated_files/ConfirmareTestV2.xml');

        $this->assertEquals(true, $dom->schemaValidate($this->schema));
    }

    /**
     * Test delete
     * @param \MinicStudio\UBL\Transport\V1\Delete
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
            ->setDelete($delete);

        // Test created object
        // Use \MinicStudio\UBL\Generator to generate an XML string
        $generator = new \MinicStudio\UBL\Generator();
        $outputXMLString = $generator->transportV2($transport);

        // Create PHP Native DomDocument object, that can be
        // used to validate the generate XML
        $dom = new \DOMDocument;
        $dom->loadXML($outputXMLString);

        $dom->save('./tests/generated_files/StergereTestV2.xml');

        $this->assertEquals(true, $dom->schemaValidate($this->schema));
    }

    /**
     * Test modifVehicul
     * @param \MinicStudio\UBL\Transport\V2\VehicleModification
     * @return void
     */
    public function testVehicleModificationXML()
    {
        // Transport vehicle modification
        $vehicleModification = (new VehicleModification)
            ->setUit('3V0P0L0P0T3JUW46')
            ->setCrtNumber('B111ABC')
            ->setModificationDate('2009-10-10T12:00:00-05:00');

        // Transport
        $transport = (new Transport())
            ->setCodDeclarant('159')
            ->setVehicleModification($vehicleModification);

        // Test created object
        // Use \MinicStudio\UBL\Generator to generate an XML string
        $generator = new \MinicStudio\UBL\Generator();
        $outputXMLString = $generator->transportV2($transport);

        // Create PHP Native DomDocument object, that can be
        // used to validate the generate XML
        $dom = new \DOMDocument;
        $dom->loadXML($outputXMLString);

        $dom->save('./tests/generated_files/VehicleModificationTest.xml');

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

        // Transport location
        $location = (new Location)
            ->setCountyCode('6')
            ->setCity('Odorhei')
            ->setStreet('Bechlean');

        // Transport loading dock
        $loading_dock = (new LoadingDock)
            ->setLocation($location);

        // Transport unloading dock
        $un_loading_dock = (new UnLoadingDock)
            ->setLocation($location);

        // Transport product corretion
        $items = [(new TransportItem)
            ->setTariffCode('2020')
            ->setProductName('product')
            ->setPurposeOperationCode('401')
            ->setQuantity('50.5')
            ->setUnitOfMeasureCode('10')
            ->setNetWeight('50.5')
            ->setGrossWeight('50.5')
            ->setPriceWithoutVat('50')
        ];

        // Transport document corretion
        $documents = [(new TransportDocument)
            ->setDocumentType('10')
            ->setDocumentDate('2022-11-11')
        ];

        // Transport corretion
        $correction = (new Correction)
            ->setUit('4C0U0C0J0W3DDQ92');

        //Transport notificare anterioare
        $prio_notice = (new NotificareAnterioare)
            ->setUit('3V0P0L0P0T3JUW46');

        // Transport notification corretion
        $notificare = (new Notificare)
            ->setOperationTypeCode('40')
            ->setPartner($partner)
            ->setDate($date)
            ->setLoadingDock($loading_dock)
            ->setUnLoadingDock($un_loading_dock)
            ->setItems($items)
            ->setDocuments($documents)
            ->setCorrection($correction)
            ->setPrioNotice($prio_notice);

        // Transport corretion
        $transport = (new Transport())
            ->setCodDeclarant('159')
            ->setNotificare($notificare);

        // Test created object
        // Use \MinicStudio\UBL\Generator to generate an XML string
        $generator = new \MinicStudio\UBL\Generator();
        $outputXMLString = $generator->transportV2($transport);

        // Create PHP Native DomDocument object, that can be
        // used to validate the generate XML
        $dom = new \DOMDocument;
        $dom->loadXML($outputXMLString);

        $dom->save('./tests/generated_files/Corectie1807Test.xml');

        $this->assertEquals(true, $dom->schemaValidate($this->schema));
    }
}