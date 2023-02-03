<?php

namespace MinicStudio\UBL\Saga;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use InvalidArgumentException;

class Content implements XmlSerializable
{
    /**
     * Line
     *
     * @var Line
     */
    private $lines = [];

    /**
     * Line
     * @param Line $line
     * @return self
     */
    public function setLine(Line $line): self
    {
        $this->lines[] = $line;

        return $this;
    }

    /**
     * Set lines
     * @param array $lines
     * @return self
     */
    public function setLines(array $lines): self
    {
        $this->lines = array_merge($this->lines, $lines);

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
        if (!count($this->lines)) {
            throw new InvalidArgumentException('No line provided!');
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

        foreach ($this->lines as $line) {
            $writer->write([
                'Linie' => $line,
            ]);
        }
    }
}