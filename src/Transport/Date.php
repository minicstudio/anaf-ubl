<?php

namespace MinicStudio\UBL\Transport;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use SebastianBergmann\CodeCoverage\InvalidArgumentException;

class Date implements XmlSerializable
{
    private $car_number;
    private $country_code;
    private $code;
    private $name;
    private $date;
    
    /**
     * Set the car number
     * @param string $car_number
     * @return self
     */
    public function setCarNumber(string $car_number): self
    {
        $this->car_number = $car_number;

        return $this;
    }

    /**
     * Set the country code
     * @param string $country_code
     * @return self
     */
    public function setCountryCode(string $country_code): self
    {
        $this->country_code = $country_code;

        return $this;
    }

    /**
     * Set code
     * @param string $code
     * @return self
     */
    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Set the name
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set the country code
     * @param string $date
     * @return self
     */
    public function setdate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function validate()
    {
        if (!$this->car_number) {
            throw new InvalidArgumentException('Car number is not provided!');
        }

        if (!$this->country_code) {
            throw new InvalidArgumentException('Country code is not provided!');
        }

        if (!$this->code) {
            throw new InvalidArgumentException('Organization identifier is not provided!');
        }

        if (!$this->name) {
            throw new InvalidArgumentException('Name is not provided!');
        }

        if (!$this->date) {
            throw new InvalidArgumentException('Date is not provided!');
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
            // 'carNumber' => $this->car_number,
            // 'codTara' => $this->country_code,
            // 'cod' => $this->code,
            // 'denumire' => $this->name,
            // 'date' => $this->date,

        
            'nrVehicul' => "B111ABC",
            'codTaraTransportator' => "RO",
            'codTransportator' => "38575952",
            'denumireTransportator' => "SME MITANI TRANSPORT",
            'dataTransport' => "2006-05-04",
            'codBirouVamal' => "12801",
        ]);
    }
}