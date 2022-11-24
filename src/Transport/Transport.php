<?php

namespace MinicStudio\UBL\Transport;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

use DateTime;
use InvalidArgumentException;

class Transport implements XmlSerializable
{
    private $notificare;
    private $codDeclarant;

    public function setCodeDeclarant(string $codDeclarant): self
    {
        $this->codDeclarant = $codDeclarant;

        return $this;
    }

    public function setNotificare(Notificare $notificare): self
    {
        $this->notificare = $notificare;

        return $this;
    }

    public function validate()
    {
        if (!$this->notificare) {
            throw new InvalidArgumentException('Notificare is missing!');
        }

        if (!$this->codDeclarant) {
            throw new InvalidArgumentException('CodDeclarant is missing!');
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

        $writer->writeAttribute('codeDeclarant', $this->codDeclarant);

        $writer->write([
            'notificare' => $this->notificare,
        ]);


        // $writer->write([
        //     [
        //         'name' => 'notificare',
        //         'value' => $this->notificare,
        //         'attributes' => [
        //             'codTipOperatiune' => 30,
        //         ],
        //     ],
        // ]);
    }
}