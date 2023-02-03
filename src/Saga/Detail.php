<?php

namespace MinicStudio\UBL\Saga;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use InvalidArgumentException;

class Detail implements XmlSerializable
{
    /**
     * Content
     *
     * @var Content
     */
    private $content;

    /**
     * Content
     * @param Content $content
     * @return self
     */
    public function setContent(Content $content): self
    {
        $this->content = $content;

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
        if (!$this->content) {
            throw new InvalidArgumentException('Content missing!');
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

        $writer->write([
            'Continut' => $this->content,
        ]);
    }
}