<?php

namespace MinicStudio\UBL\Transport;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use SebastianBergmann\CodeCoverage\InvalidArgumentException;

class Delete implements XmlSerializable
{
    private $uit;
    
    /**
     * Set the uit
     * @param string $uit
     * @return self
     */
    public function setUit(string $uit): self
    {
        $this->uit = $uit;

        return $this;
    }

    public function validate()
    {
        if (!$this->uit) {
            throw new InvalidArgumentException('Uit is not provided!');
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

        $writer->writeAttributes ([
            'uit' => '3V0P0L0P0T3JUW46',
        ]);
    }
}