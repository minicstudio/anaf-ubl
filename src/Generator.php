<?php

namespace MinicStudio\UBL;

use MinicStudio\UBL\Invoice\Invoice;
use MinicStudio\UBL\Transport\Transport;
use Sabre\Xml\Service;

class Generator
{
    public static $currencyID;

    public static function invoice(Invoice $invoice, $currencyId = 'EUR')
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

    // <eTransport xmlns="mfp:anaf:dgti:eTransport:declaratie:v1" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="mfp:anaf:dgti:eTransport:declaratie:v1 file:/D:/formInteractive/_inLucru/_proiecte/eTransport/final/SchemaSimtic_model_2022_03_15.xsd" codDeclarant="40890617">
    // <notificare codTipOperatiune="30">
    // <bunuriTransportate nrCrt="1" codTarifar="0202" denumireMarfa="denumireMarfa1" codScopOperatiune="300101" cantitate="50.5" codUnitateMasura="10" greutateNeta="50.5" greutateBruta="50.5" valoareLeiFaraTva="50"/>
    // <bunuriTransportate nrCrt="2" codTarifar="02071410" denumireMarfa="denumireMarfa3" codScopOperatiune="300101" cantitate="50.5" codUnitateMasura="10" greutateNeta="50.5" greutateBruta="50.5" valoareLeiFaraTva="50"/>
    // <partenerComercial codTara="RO" cod="1590082" denumire="denumire1"/>
    // <dateTransport nrVehicul="B111ABC" codTaraTransportator="RO" codTransportator="38575952" denumireTransportator="SME MITANI TRANSPORT" dataTransport="2006-05-04"/>
    // <locIncarcare codJudet="1" denumireLocalitate="denumireLocalitate1" denumireStrada="denumireStrada1"/>
    // <locDescarcare codJudet="40" denumireLocalitate="denumireLocalitate3" denumireStrada="denumireStrada3"/>
    // <documenteTransport tipDocument="10" dataDocument="2006-05-04"/>
    // <documenteTransport tipDocument="20" dataDocument="2006-05-04"/>
    // </notificare>
    // </eTransport>
    
    public static function transport(Transport $transport)
    {
        $xmlService = new Service();

        $xmlService->namespaceMap = [
            'mfp:anaf:dgti:eTransport:declaratie:v1' => '',
            // 'xsi' => "http://www.w3.org/2001/XMLSchema-instance",
            // 'xsi:schemaLocation="mfp:anaf:dgti:eTransport:declaratie:v1 file:/D:/formInteractive/_inLucru/_proiecte/eTransport/final/SchemaSimtic_model_2022_03_15.xsd"',
            // 'codDeclarant' => "1234567",
        ];

        return $xmlService->write('eTransport', $transport);
    }
}
