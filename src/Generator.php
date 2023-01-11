<?php

namespace MinicStudio\UBL;

use MinicStudio\UBL\Invoice\Invoice;
use MinicStudio\UBL\Saga\SagaInvoice;
use MinicStudio\UBL\Transport\V1\Transport as TransportV1;
use MinicStudio\UBL\Transport\v2\Transport as TransportV2;
use Sabre\Xml\Service;

class Generator
{
    /**
     * Currency id
     *
     * @var string
     */
    public static $currencyID;

    /**
     * Validate the xml
     * 
     * @param string $xml
     * @param string $validation_file
     * @return void
     */
    public function validate(string $xml, string $validation_file): bool
    {
        $dom = new \DOMDocument;
        $dom->loadXML($xml);

        return $dom->schemaValidate($validation_file);
    }

    /**
     * Generates the invoice xml.
     *
     * @param Invoice $invoice
     * @param $currencyID
     * @return string
     */
    public static function invoice(Invoice $invoice, $currencyId = 'EUR'): string
    {
        self::$currencyID = $currencyId;

        $xmlService = new Service();

        $xmlService->namespaceMap = [
            'urn:oasis:names:specification:ubl:schema:xsd:Invoice-2' => '',
            'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2' => 'cbc',
            'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2' => 'cac'
        ];

        return $xmlService->write('Invoice', [
            $invoice
        ]);
    }
    
    /**
     * Generates the transport v1 xml.
     *
     * @param TransportV1 $transport
     * @param bool $validate
     * @return string
     */
    public function transportV1(TransportV1 $transport, bool $validate = false): string
    {
        $xmlService = new Service();

        $xmlService->namespaceMap = [
            'mfp:anaf:dgti:eTransport:declaratie:v1' => '',
            'http://www.w3.org/2001/XMLSchema-instance' => 'xsi',
        ];

        $xml = $xmlService->write('eTransport', $transport);

        if ($validate) {
            $this->validate($xml, dirname(__FILE__).'/../schema_etransport_v1.xsd');
        }

        return $xml;
    }

    /**
     * Generates the transport v2 xml.
     *
     * @param TransportV2 $transport
     * @param bool $validate
     * @return string
     */
    public function transportV2(TransportV2 $transport, bool $validate = false): string
    {
        $xmlService = new Service();

        $xmlService->namespaceMap = [
            'mfp:anaf:dgti:eTransport:declaratie:v2' => '',
            'http://www.w3.org/2001/XMLSchema-instance' => 'xsi',
        ];

        $xml = $xmlService->write('eTransport', $transport);

        if ($validate) {
            $this->validate($xml, dirname(__FILE__).'/../schema_etransport_v2_20221215.xsd');
        }

        return $xml;
    }

    /**
     * Generates the saga invoice xml.
     *
     * @param SagaInvoice $sagaInvoice
     * @return string
     */
    public static function sagaInvoice(SagaInvoice $sagaInvoice): string
    {
        $xmlService = new Service();

        return $xmlService->write('Facturi', $sagaInvoice);
    }
}
