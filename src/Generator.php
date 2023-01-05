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
     * @return string
     */
    public static function transportV1(TransportV1 $transport): string
    {
        $xmlService = new Service();

        $xmlService->namespaceMap = [
            'mfp:anaf:dgti:eTransport:declaratie:v1' => '',
            'http://www.w3.org/2001/XMLSchema-instance' => 'xsi',
        ];

        return $xmlService->write('eTransport', $transport);
    }

    /**
     * Generates the transport v2 xml.
     *
     * @param TransportV2 $transport
     * @return string
     */
    public static function transportV2(TransportV2 $transport): string
    {
        $xmlService = new Service();

        $xmlService->namespaceMap = [
            'mfp:anaf:dgti:eTransport:declaratie:v2' => '',
            'http://www.w3.org/2001/XMLSchema-instance' => 'xsi',
        ];

        return $xmlService->write('eTransport', $transport);
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

        $xmlService->namespaceMap = [
            'Facturi' => '',
        ];

        return $xmlService->write('Facturi', $sagaInvoice);
    }
}
