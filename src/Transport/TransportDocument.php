<?php

namespace MinicStudio\UBL\Transport;

use InvalidArgumentException;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class TransportDocument implements XmlSerializable
{
    /**
     * Document type
     *
     * @var string
     */
    private $document_type;

    /**
     * Document number
     *
     * @var string
     */
    private $document_number;

    /**
     * Document date
     *
     * @var string
     */
    private $document_date;

    /**
     * Document information
     *
     * @var string
     */
    private $document_information;

    /**
     * Set the document type
     * @param string $document_type
     * @return self
     */
    public function setDocumentType(string $document_type): self
    {
        $this->document_type = $document_type;

        return $this;
    }

    /**
     * Set the document number
     * @param string $document_number
     * @return self
     */
    public function setDocumentNumber(string $document_number): self
    {
        $this->document_number = $document_number;

        return $this;
    }

    /**
     * Set the document number
     * @param string $document_date
     * @return self
     */
    public function setDocumentDate(string $document_date): self
    {
        $this->document_date = $document_date;

        return $this;
    }

    /**
     * Set the document number
     * @param string $document_information
     * @return self
     */
    public function setDocumentInformation(string $document_information): self
    {
        $this->document_information = $document_information;

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
        if (!$this->document_type) {
            throw new InvalidArgumentException('Document type is required!');
        }

        if (!$this->document_date) {
            throw new InvalidArgumentException('Document date is required!');
        }
    }

    /**
     * The xmlSerialize method is called during xml writing.
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer): void
    {
        $writer->writeAttributes([
            'tipDocument' => $this->document_type,
            'dataDocument' => $this->document_date,
        ]);

        if ($this->document_number) {
            $writer->write([
                'numarDocument' => $this->document_number,
            ]);
        }

        if ($this->document_information) {
            $writer->write([
                'observatii' => $this->document_information,
            ]);
        }
    }
}