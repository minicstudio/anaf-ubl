<?php

namespace MinicStudio\UBL\Transport;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use SebastianBergmann\CodeCoverage\InvalidArgumentException;

class Notificare implements XmlSerializable
{
    private $codTipOperatiune;
    private $items = [];
    private $partner;

    public function setCodTipOperatiune(string $codTipOperatiune): self
    {
        $this->codTipOperatiune = $codTipOperatiune;

        return $this;
    }

    public function setItem(TransportItem $item): self
    {
        $this->items[] = $item;

        return $this;
    }

    public function setItems(array $items): self
    {
        $this->items = array_merge($this->items, $items);

        return $this;
    }

    public function setPartner(Partner $partner): self
    {
        $this->partner = $partner;

        return $this;
    }

    public function validate()
    {
        if (!count($this->items)) {
            throw new InvalidArgumentException('No items to transport.');
        }

        if (!$this->partner) {
            throw new InvalidArgumentException('Partner is not provided!');
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

        $writer->writeAttribute('codTipOperatiune', '30');

        $writer->write([
            'SomeData' => 'asd',
        ]);

        foreach ($this->items as $item) {
            $writer->write([
                'bunuriTransportate' => $item,
            ]);
        }

        $writer->write([
            'partnerComercial' => $this->partner,
        ]);
    }
}