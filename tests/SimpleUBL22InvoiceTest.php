<?php

namespace MinicStudio\UBL\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Test an UBL2.2 invoice document
 */
class SimpleUBL22InvoiceTest extends TestCase
{
    private $schema = 'http://docs.oasis-open.org/ubl/os-UBL-2.2/xsd/maindoc/UBL-Invoice-2.2.xsd';

    /** @test */
    public function testIfXMLIsValid()
    {
        // Address country
        $country = (new \MinicStudio\UBL\Invoice\Country())
            ->setIdentificationCode('BE');

        // Full address
        $address = (new \MinicStudio\UBL\Invoice\Address())
            ->setStreetName('Korenmarkt')
            ->setBuildingNumber(1)
            ->setCityName('Gent')
            ->setPostalZone('9000')
            ->setCountry($country);

        // Supplier company node
        $supplierCompany = (new \MinicStudio\UBL\Invoice\Party())
            ->setName('Supplier Company Name')
            ->setPhysicalLocation($address)
            ->setPostalAddress($address);

        // Client company node
        $clientCompany = (new \MinicStudio\UBL\Invoice\Party())
            ->setName('My client')
            ->setPostalAddress($address);

        $legalMonetaryTotal = (new \MinicStudio\UBL\Invoice\LegalMonetaryTotal())
            ->setPayableAmount(10 + 2)
            ->setAllowanceTotalAmount(0);

        // Tax scheme
        $taxScheme = (new \MinicStudio\UBL\Invoice\TaxScheme())
            ->setId(0);

        // Product
        $productItem = (new \MinicStudio\UBL\Invoice\Item())
            ->setName('Product Name')
            ->setDescription('Product Description');

        // Price
        $price = (new \MinicStudio\UBL\Invoice\Price())
            ->setBaseQuantity(1)
            ->setUnitCode(\MinicStudio\UBL\Invoice\UnitCode::UNIT)
            ->setPriceAmount(10);

        // Invoice Line tax totals
        $lineTaxTotal = (new \MinicStudio\UBL\Invoice\TaxTotal())
            ->setTaxAmount(2.1);

        // Invoice Line(s)
        $invoiceLine = (new \MinicStudio\UBL\Invoice\InvoiceLine())
            ->setId(0)
            ->setItem($productItem)
            ->setPrice($price)
            ->setTaxTotal($lineTaxTotal)
            ->setInvoicedQuantity(1);

        $invoiceLines = [$invoiceLine];

        // Total Taxes
        $taxCategory = (new \MinicStudio\UBL\Invoice\TaxCategory())
            ->setId(0)
            ->setName('VAT21%')
            ->setPercent(.21)
            ->setTaxScheme($taxScheme);

        $taxSubTotal = (new \MinicStudio\UBL\Invoice\TaxSubTotal())
            ->setTaxableAmount(10)
            ->setTaxAmount(2.1)
            ->setTaxCategory($taxCategory);

        $taxTotal = (new \MinicStudio\UBL\Invoice\TaxTotal())
            ->addTaxSubTotal($taxSubTotal)
            ->setTaxAmount(2.1);

        // Invoice object
        $invoice = (new \MinicStudio\UBL\Invoice\Invoice())
            ->setUBLVersionID('2.2')
            ->setId(1234)
            ->setCopyIndicator(false)
            ->setIssueDate(new \DateTime())
            ->setAccountingSupplierParty($supplierCompany)
            ->setAccountingCustomerParty($clientCompany)
            ->setInvoiceLines($invoiceLines)
            ->setLegalMonetaryTotal($legalMonetaryTotal)
            ->setTaxTotal($taxTotal);

        // Test created object
        // Use \MinicStudio\UBL\Generator to generate an XML string
        $generator = new \MinicStudio\UBL\Generator();
        $outputXMLString = $generator->invoice($invoice);

        // Create PHP Native DomDocument object, that can be
        // used to validate the generate XML
        $dom = new \DOMDocument;
        $dom->loadXML($outputXMLString);

        $dom->save('./tests/generated_files/SimpleUBL22InvoiceTest.xml');

        $this->assertEquals(true, $dom->schemaValidate($this->schema));
    }
}
