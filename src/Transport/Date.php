<?php

namespace MinicStudio\UBL\Transport;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use SebastianBergmann\CodeCoverage\InvalidArgumentException;

class Date implements XmlSerializable
{
    private $car_number;
    private $trailer_number_1;
    private $trailer_number_2;
    private $transport_country_code;
    private $transport_code;
    private $transport_name;
    private $transport_date;
    
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
     * Set the country code
     * @param string $transport_country_code
     * @return self
     */
    public function setTransportCountryCode(string $transport_country_code): self
    {
        $this->transport_country_code = $transport_country_code;

        return $this;
    }

    /**
     * Set transport code
     * @param string $transport_code
     * @return self
     */
    public function setTransportCode(string $transport_code): self
    {
        $this->transport_code = $transport_code;

        return $this;
    }

    /**
     * Set the transport name
     * @param string $transport_name
     * @return self
     */
    public function setTransportName(string $transport_name): self
    {
        $this->transport_name = $transport_name;

        return $this;
    }

    /**
     * Set the transport date
     * @param string $transport_date
     * @return self
     */
    public function setTransportDate(string $transport_date): self
    {
        $this->transport_date = $transport_date;

        return $this;
    }

    public function validate()
    {
        if (!$this->car_number) {
            throw new InvalidArgumentException('Car number is required!');
        }

        if (!$this->transport_country_code) {
            throw new InvalidArgumentException('Country code is required!');
        }

        if (!$this->transport_name) {
            throw new InvalidArgumentException('Name is required!');
        }

        if (!$this->transport_date) {
            throw new InvalidArgumentException('Date is required!');
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
            'nrVehicul' => $this->car_number,
            'nrRemorca1' => $this->trailer_number_1,
            'nrRemorca2' => $this->trailer_number_2,
            'codTaraTransportator' => $this->transport_country_code,
            'codTransportator' => $this->transport_code,
            'denumireTransportator' => $this->transport_name,
            'dataTransport' => $this->transport_date,
        ]);
    }
}