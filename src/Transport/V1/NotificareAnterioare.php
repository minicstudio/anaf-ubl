<?php

namespace MinicStudio\UBL\Transport\V1;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use InvalidArgumentException;

class NotificareAnterioare implements XmlSerializable
{
     /**
     * Uit
     *
     * @var string
     */
    private $uit;

    /**
     * Remarks
     *
     * @var string
     */
    private $remarks;

    /**
     * Post accident declaration
     *
     * @var string
     */
    private $refDeclarant;
    
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

    /**
     * Set the declarant reference
     * @param string $refDeclarant
     * @return self
     */
    public function setReferenceDeclarant(string $refDeclarant): self
    {
        $this->refDeclarant = $refDeclarant;

        return $this;
    }

    /**
     * Set remarks
     * @param string $remarks
     * @return self
     */
    public function setRemarks(string $remarks): self
    {
        $this->remarks = $remarks;

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
        if (!$this->uit) {
            throw new InvalidArgumentException('Uit is required!');
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

        $writer->writeAttributes([
            'uit' => $this->uit,
        ]);

        if ($this->refDeclarant) {
            $writer->writeAttributes([
                'refDeclarant' => $this->refDeclarant,
            ]);
        }

        if ($this->remarks) {
            $writer->writeAttributes([
                'observatii' => $this->remarks,
            ]);
        }
    }
}