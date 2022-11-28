<?php

namespace MinicStudio\UBL\Transport;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class TransportDocument implements XmlSerializable
{
    private $codTipOperatiune;

    /**
     * Set the operation type code
     * @param string $codTipOperatiune
     * @return self
     */
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
            'tipDocument' => '10',
            'dataDocument' => '2022-11-11',
        ]);
    }
}