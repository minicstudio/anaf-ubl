<?php

namespace MinicStudio\UBL\Transport;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class TransportItem implements XmlSerializable
{
    private $codTipOperatiune;

    public function setCodTipOperatiune(string $codTipOperatiune): self
    {
        $this->codTipOperatiune = $codTipOperatiune;

        return $this;
    }

    /**
     * The xmlSerialize method is called during xml writing.
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer): void
    {
        $writer->writeAttributes([
            'nrCrt' => '1',
            'codTarifar' => '0202',
            'denumireMarfa' => 'denumireMarfa1',
            'codScopOperatiune' => '300101',
            'cantitate' => '50.5',
            'codUnitateMasura' => '10',
            'greutateNeta' => '50.5',
            'greutateBruta' => '50.5',
            'valoareLeiFaraTva' => '50',
        ]);
    }
}