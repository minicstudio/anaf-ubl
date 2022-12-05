<?php

namespace MinicStudio\UBL\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Test an UBL2.1 invoice document
 */
class EN16931Test extends TestCase
{
    private $schema = 'http://docs.oasis-open.org/ubl/os-UBL-2.1/xsd/maindoc/UBL-Invoice-2.1.xsd';
    private $xslfile = 'vendor/num-num/ubl-invoice/tests/EN16931-UBL-validation.xslt';

    /** @test */
    public function testIfXMLIsValid()
    {
        // Tax scheme
        $taxScheme = (new \MinicStudio\UBL\Invoice\TaxScheme())
            ->setId('VAT');

        // Address country
        $country = (new \MinicStudio\UBL\Invoice\Country())
            ->setIdentificationCode('BE');

        // Full address
        $address = (new \MinicStudio\UBL\Invoice\Address())
            ->setStreetName('Korenmarkt 1')
            ->setAdditionalStreetName('Building A')
            ->setCityName('Gent')
            ->setPostalZone('9000')
            ->setCountry($country);

        $financialInstitutionBranch = (new \MinicStudio\UBL\Invoice\FinancialInstitutionBranch())
            ->setId('RABONL2U');

        $payeeFinancialAccount = (new \MinicStudio\UBL\Invoice\PayeeFinancialAccount())
           ->setFinancialInstitutionBranch($financialInstitutionBranch)
            ->setName('Customer Account Holder')
            ->setId('NL00RABO0000000000');

        $paymentMeans = (new \MinicStudio\UBL\Invoice\PaymentMeans())
            ->setPayeeFinancialAccount($payeeFinancialAccount)
            ->setPaymentMeansCode(31, [])
            ->setPaymentId('our invoice 1234');


        // Supplier company node
        $supplierLegalEntity = (new \MinicStudio\UBL\Invoice\LegalEntity())
            ->setRegistrationName('Supplier Company Name')
            ->setCompanyId('BE123456789');

        $supplierPartyTaxScheme = (new \MinicStudio\UBL\Invoice\PartyTaxScheme())
            ->setTaxScheme($taxScheme)
            ->setCompanyId('BE123456789');

        $supplierCompany = (new \MinicStudio\UBL\Invoice\Party())
            ->setName('Supplier Company Name')
            ->setLegalEntity($supplierLegalEntity)
            ->setPartyTaxScheme($supplierPartyTaxScheme)
            ->setPostalAddress($address);

        // Client company node
        $clientLegalEntity = (new \MinicStudio\UBL\Invoice\LegalEntity())
            ->setRegistrationName('Client Company Name')
            ->setCompanyId('Client Company Registration');

        $clientPartyTaxScheme = (new \MinicStudio\UBL\Invoice\PartyTaxScheme())
            ->setTaxScheme($taxScheme)
            ->setCompanyId('BE123456789');

        $clientCompany = (new \MinicStudio\UBL\Invoice\Party())
            ->setName('Client Company Name')
            ->setLegalEntity($clientLegalEntity)
            ->setPartyTaxScheme($clientPartyTaxScheme)
            ->setPostalAddress($address);

        $legalMonetaryTotal = (new \MinicStudio\UBL\Invoice\LegalMonetaryTotal())
            ->setPayableAmount(10 + 2.1)
            ->setAllowanceTotalAmount(0)
            ->setTaxInclusiveAmount(10 + 2.1)
            ->setLineExtensionAmount(10)
            ->setTaxExclusiveAmount(10);

        $classifiedTaxCategory = (new \MinicStudio\UBL\Invoice\ClassifiedTaxCategory())
            ->setId('S')
            ->setPercent(21.00)
            ->setTaxScheme($taxScheme);

        // Product
        $productItem = (new \MinicStudio\UBL\Invoice\Item())
            ->setName('Product Name')
            ->setClassifiedTaxCategory($classifiedTaxCategory)
            ->setDescription('Product Description');

        // Price
        $price = (new \MinicStudio\UBL\Invoice\Price())
            ->setBaseQuantity(1)
            ->setUnitCode(\MinicStudio\UBL\Invoice\UnitCode::UNIT)
            ->setPriceAmount(10);

        // Invoice Line tax totals
        $lineTaxTotal = (new \MinicStudio\UBL\Invoice\TaxTotal())
            ->setTaxAmount(2.1);

        // InvoicePeriod
        $invoicePeriod = (new \MinicStudio\UBL\Invoice\InvoicePeriod())
            ->setStartDate(new \DateTime());

        // Invoice Line(s)
        $invoiceLine = (new \MinicStudio\UBL\Invoice\InvoiceLine())
            ->setId(0)
            ->setItem($productItem)
            ->setPrice($price)
            ->setInvoicePeriod($invoicePeriod)
            ->setLineExtensionAmount(10)
            ->setInvoicedQuantity(1);

        $invoiceLines = [$invoiceLine];

        // Total Taxes
        $taxCategory = (new \MinicStudio\UBL\Invoice\TaxCategory())
            ->setId('S', [])
            ->setPercent(21.00)
            ->setTaxScheme($taxScheme);

        $taxSubTotal = (new \MinicStudio\UBL\Invoice\TaxSubTotal())
            ->setTaxableAmount(10)
            ->setTaxAmount(2.1)
            ->setTaxCategory($taxCategory);


        $taxTotal = (new \MinicStudio\UBL\Invoice\TaxTotal())
            ->addTaxSubTotal($taxSubTotal)
            ->setTaxAmount(2.1);

        // Payment Terms
        $paymentTerms = (new \MinicStudio\UBL\Invoice\PaymentTerms())
            ->setNote('30 days net');

        // Delivery
        $deliveryLocation = (new \MinicStudio\UBL\Invoice\Address())
            ->setCountry($country);

        $delivery = (new \MinicStudio\UBL\Invoice\Delivery())
            ->setActualDeliveryDate(new \DateTime())
            ->setDeliveryLocation($deliveryLocation);

        $orderReference = (new \MinicStudio\UBL\Invoice\OrderReference())
            ->setId('5009567')
            ->setSalesOrderId('tRST-tKhM');

        // Invoice object
        $invoice = (new \MinicStudio\UBL\Invoice\Invoice())
            ->setCustomizationID('urn:cen.eu:en16931:2017')
            ->setId(1234)
            ->setIssueDate(new \DateTime())
            ->setNote('invoice note')
            ->setDelivery($delivery)
            ->setAccountingSupplierParty($supplierCompany)
            ->setAccountingCustomerParty($clientCompany)
            ->setInvoiceLines($invoiceLines)
            ->setLegalMonetaryTotal($legalMonetaryTotal)
            ->setPaymentTerms($paymentTerms)
            ->setInvoicePeriod($invoicePeriod)
            ->setPaymentMeans($paymentMeans)
            ->setBuyerReference('BUYER_REF')
            ->setOrderReference($orderReference)
            ->setTaxTotal($taxTotal);

        // Test created object
        // Use \MinicStudio\UBL\Generator to generate an XML string
        $generator = new \MinicStudio\UBL\Generator();
        $outputXMLString = $generator->invoice($invoice);

        // Create PHP Native DomDocument object, that can be
        // used to validate the generate XML
        $dom = new \DOMDocument;
        $dom->loadXML($outputXMLString);

        $dom->save('./tests/generated_files/EN16931Test.xml');

        // $this->assertEquals(true, $dom->schemaValidate($this->schema));

        // Use webservice at peppol.helger.com to verify the result
        $wsdl = "http://peppol.helger.com/wsdvs?wsdl=1";
        $client = new \SoapClient($wsdl);
        $response = $client->validate(['XML' => $outputXMLString, 'VESID' => 'eu.cen.en16931:ubl:1.3.1']);

        // Output validation warnings if present
        if ($response->mostSevereErrorLevel == 'WARN' && isset($response->Result[1]->Item)) {
            foreach ($response->Result[1]->Item as $responseWarning) {
                fwrite(STDERR, '*** '.$responseWarning->errorText."\n");
            }
        }

        $this->assertEquals('SUCCESS', $response->mostSevereErrorLevel);
    }
}
