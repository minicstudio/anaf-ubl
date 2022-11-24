<?php

namespace MinicStudio\UBL\Tests;

use DOMDocument;
use MinicStudio\UBL\Schematron;
use MinicStudio\UBL\Transport\Notificare;
use MinicStudio\UBL\Transport\Partner;
use MinicStudio\UBL\Transport\Transport;
use MinicStudio\UBL\Transport\TransportItem;
use PHPUnit\Framework\TestCase;

/**
 * Test an UBL2.2 invoice document
 */
class TransportTest extends TestCase
{
    public function testTransportXML()
    {
        $partner = (new Partner)
            ->setCountryCode('RO')
            ->setCode('1234567')
            ->setName('Minic Studio');

        $items = [(new TransportItem)];

        $notificare = (new Notificare)
            ->setPartner($partner)
            ->setItems($items);

        $transport = (new Transport())
            ->setCodeDeclarant('1234567')
            ->setNotificare($notificare);

        // Test created object
        // Use \MinicStudio\UBL\Invoice\Generator to generate an XML string
        $generator = new \MinicStudio\UBL\Generator();
        $outputXMLString = $generator->transport($transport);

        dd($outputXMLString);
    } 
}