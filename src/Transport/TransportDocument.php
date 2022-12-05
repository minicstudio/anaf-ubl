<?php

namespace MinicStudio\UBL\Transport;

use InvalidArgumentException;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class TransportDocument implements XmlSerializable
{
    /**
     * Operation type code
     *
     * @var string
     */
    private $cod_tip_operatiune;

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
     * Set the operation type code
     * @param string $cod_tip_operatiune
     * @return self
     */
    public function setCodTipOperatiune(string $cod_tip_operatiune): self
    {
        $this->cod_tip_operatiune = $cod_tip_operatiune;

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
        if (!$this->cod_tip_operatiune) {
            throw new InvalidArgumentException('Operation type code is required!');
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
            'tipDocument' => $this->cod_tip_operatiune,
            'numarDocument' => $this->document_number,
            'dataDocument' => $this->document_date,
            'observatii' => $this->document_information,
        ]);
    }
}