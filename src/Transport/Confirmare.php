<?php

namespace MinicStudio\UBL\Transport;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use SebastianBergmann\CodeCoverage\InvalidArgumentException;

class Confirmare implements XmlSerializable
{
    /**
     * Uit
     *
     * @var string
     */
    private $uit;

    /**
     * Confirmation type
     *
     * @var string
     */
    private $confirmation_type;

    /**
     * Remarks
     *
     * @var string
     */
    private $remarks;
    
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
     * Set the confiramtion type
     * @param string $confirmation_type
     * @return self
     */
    public function setConfirmationType(string $confirmation_type): self
    {
        $this->confirmation_type = $confirmation_type;

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

        if (!$this->confirmation_type) {
            throw new InvalidArgumentException('Confirmation type is required!');
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
            'tipConfirmare' => $this->confirmation_type,
            'observatii' => $this->remarks,
        ]);
    }
}