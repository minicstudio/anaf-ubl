<?php

namespace MinicStudio\UBL\Tests;

use MinicStudio\UBL\Saga\Antet;
use MinicStudio\UBL\Saga\Content;
use MinicStudio\UBL\Saga\Detail;
use MinicStudio\UBL\Saga\Factura;
use MinicStudio\UBL\Saga\Line;
use MinicStudio\UBL\Saga\SagaInvoice;
use PHPUnit\Framework\TestCase;

/**
 * Test an UBL2.2 invoice document
 */
class SagaTest extends TestCase
{
    /**
     * Test saga invoice
     * @param \MinicStudio\UBL\Saga\SagaInvoice
     * @return void
     */
    public function testSagaInvoiceXML()
    {
        // Header
        $header = (new Antet)
            ->setProvider('name')
            ->setProviderVatNumber('657575')
            ->setProviderRegistrationNumber('3536467')
            ->setProviderCapital('random')
            ->setProviderCountry('Romania')
            ->setProviderLocation('London')
            ->setProviderCounty('HR')
            ->setProviderAddress('Test,12')
            ->setProviderPhoneNumber('0754324567')
            ->setProviderEmail('randomname.google.com')
            ->setProviderBank('ING')
            ->setProviderBankAccount('RO12345678')
            ->setProviderAdditionalInformation('random')
            ->setClient('Random srl')
            ->setClientAdditionalInformation('random')
            ->setClientVatNumber('4567854')
            ->setClientRegistrationNumber('4657575')
            ->setClientCounty('CJ')
            ->setClientCountry('Romania')
            ->setClientLocation('Bucurest')
            ->setClientAddress('random,125')
            ->setClientBank('BCR')
            ->setClientBankAccount('RO87654321')
            ->setClientPhoneNumber('0754324545')
            ->setClientEmail('random2@yahoo.com')
            ->setInvoiceNumber('RO122454')
            ->setInvoiceDate('2022-11-11')
            ->setInvoiceDueDate('2022-12-11')
            ->setReverseChargeInvoice(true)
            ->setFacturaTVAIncasare(true)
            ->setInvoiceiAdditionalInformation('random')
            ->setInvoiceiCurrency('RON')
            ->setInvoiceWeight('1234');
        
        // Line
        $lines = [(new Line)
            ->setLinieNrCrt('1')
            ->setSupplierItemCode('45678')
            ->setDescription('random')
            ->setCont('23345')
            ->setAdministration('0001')
            ->setAdditionalInformation('random')
            ->setUnitOfMeasure('KG')
            ->setQuantity('10')
            ->setPrice('5')
            ->setValue('8')
            ->setVat('19')
        ];

        // Content
        $content = (new Content)
            ->setLines($lines);

        // Detail
        $detail = (new Detail)
            ->setContent($content);

        // Factura
        $facturas = [(new Factura)
            ->setDetail($detail)
            ->setHeader($header)
        ];

        // Invoice
        $sagaInvoice = (new SagaInvoice())
            ->setInvoices($facturas);

        // Test created object
        // Use \MinicStudio\UBL\Generator to generate an XML string
        $generator = new \MinicStudio\UBL\Generator();
        $outputXMLString = $generator->sagaInvoice($sagaInvoice);

        // Create PHP Native DomDocument object, that can be
        // used to validate the generate XML
        $dom = new \DOMDocument;
        $dom->loadXML($outputXMLString);

        $dom->save('./tests/generated_files/SagaInvoiceTest.xml');
    }
}