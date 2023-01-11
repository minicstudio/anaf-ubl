<?php

namespace MinicStudio\UBL\Saga;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use SebastianBergmann\CodeCoverage\InvalidArgumentException;

class Factura implements XmlSerializable
{
    /**
     * Header
     *
     * @var Antet
     */
    private $header;

    /**
     * Detail
     *
     * @var Detail
     */
    private $detail;

    /**
     * Header
     * @param Antet $header
     * @return self
     */
    public function setHeader(Antet $header): self
    {
        $this->header = $header;

        return $this;
    }

    /**
     * Detail
     * @param Detail $detail
     * @return self
     */
    public function setDetail(Detail $detail): self
    {
        $this->detail = $detail;

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
        if (!$this->header) {
            throw new InvalidArgumentException('Header is required!');
        }

        if (!$this->detail) {
            throw new InvalidArgumentException('Details is required!');
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

        if ($this->header) {
            $writer->write([
                'Antet' => $this->header,
            ]);
        }

        if ($this->detail) {
            $writer->write([
                'Detalii' => $this->detail,
            ]);
        }
    }
}