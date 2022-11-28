<?php

namespace MinicStudio\UBL\Transport;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use SebastianBergmann\CodeCoverage\InvalidArgumentException;

class Confirmare implements XmlSerializable
{
    private $uit;
    private $confirmation_type;

    /**
     * Set the declarant code
     * @param string $codDeclarant
     * @return self
     */
    public function setCodeDeclarant(string $codDeclarant): self
    {
        $this->codDeclarant = $codDeclarant;

        return $this;
    }
    
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

    public function validate()
    {
        if (!$this->uit) {
            throw new InvalidArgumentException('Uit is not provided!');
        }

        if (!$this->confirmation_type) {
            throw new InvalidArgumentException('Confirmation type is not provided!');
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
        ]);
    }
}