<?php

namespace MinicStudio\UBL\Transport\V2;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use InvalidArgumentException;

class VehicleModification implements XmlSerializable
{
    /**
     * Uit
     *
     * @var string
     */
    private $uit;

    /**
     * Crt number
     *
     * @var string
     */
    private $crt_number;

    /**
     * Trailer one  
     *
     * @var string
     */
    private $trailer_number_1;

    /**
     * Trailer two
     *
     * @var string
     */
    private $trailer_number_2;

    /**
     * Modification date
     *
     * @var string
     */
    private $modification_date;
    
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
     * Remarks
     *
     * @var string
     */
    private $remarks;

    /**
     * Set the crt number
     * @param string $crt_number
     * @return self
     */
    public function setCrtNumber(string $crt_number): self
    {
        $this->crt_number = $crt_number;

        return $this;
    }

    /**
     * Set the trailer number one
     * @param string $trailer_number_1
     * @return self
     */
    public function setTrailerNumberOne(string $trailer_number_1): self
    {
        $this->trailer_number_1 = $trailer_number_1;

        return $this;
    }

    /**
     * Set the trailer number one
     * @param string $trailer_number_2
     * @return self
     */
    public function setTrailerNumberTwo(string $trailer_number_2): self
    {
        $this->trailer_number_2 = $trailer_number_2;

        return $this;
    }

    /**
     * Set the modification date
     * @param string $modification_date
     * @return self
     */
    public function setModificationDate(string $modification_date): self
    {
        $this->modification_date = $modification_date;

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

        if (!$this->crt_number) {
            throw new InvalidArgumentException('Crt number is required!');
        }

        if (!($this->modification_date)) {
            throw new InvalidArgumentException('Modification date is required!');
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
            'nrVehicul' => $this->crt_number,
            'dataModificare' => $this->modification_date,
        ]);

        if ($this->trailer_number_1) {
            $writer->writeAttributes([
                'nrRemorca1' => $this->trailer_number_1,
            ]);
        }

        if ($this->trailer_number_2) {
            $writer->writeAttributes([
                'nrRemorca2' => $this->trailer_number_2,
            ]);
        }

        if ($this->remarks) {
            $writer->writeAttributes([
                'observatii' => $this->remarks,
            ]);
        }
    }
}