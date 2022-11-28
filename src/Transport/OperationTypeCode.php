<?php

namespace MinicStudio\UBL\Transport;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use SebastianBergmann\CodeCoverage\InvalidArgumentException;

class OperationTypeCode implements XmlSerializable
{
    private $operation_type_code;
    
    /**
     * Set the operation type code
     * @param string $operation_type_code
     * @return self
     */
    public function setOperationTypeCode(string $operation_type_code): self
    {
        $this->operation_type_code = $operation_type_code;

        return $this;
    }

    public function validate()
    {
        if (!$this->operation_type_code) {
            throw new InvalidArgumentException('Operation type code is missing!');
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
            'codTipOperatiune' => $this->operation_type_code,
        ]);
    }
}