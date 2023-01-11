<?php

namespace MinicStudio\UBL\Saga;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

use InvalidArgumentException;

class SagaInvoice implements XmlSerializable
{
    /**
     * Invoice
     *
     * @var Factura $invoice
     */
    private $invoices = [];

    /**
     * Invoice
     * @param Factura $invoice
     * @return self
     */
    public function setInvoice(Factura $invoice): self
    {
        $this->invoices[] = $invoice;

        return $this;
    }

    /**
     * The validate function that is called during xml writing to valid the data of the object.
     *
     * @throws InvalidArgumentException An error with information about required data that is missing to write the XML
     * @return void
     */
    public function validate()
    {
        if (!count($this->invoices)) {
            throw new InvalidArgumentException('No invoice provided!');
        }
    }

    /**
     * The xmlSerialize method is called during xml writing.
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer): void
    {
        $this->validate();

        foreach ($this->invoices as $invoice) {
            $writer->write([
                'Factura' => $invoice,
            ]);
        }
    }
}