<?php

namespace MinicStudio\UBL\Transport;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

use DateTime;
use InvalidArgumentException;

class Transport implements XmlSerializable
{
    private $codDeclarant;
    private $refDeclarant;
    private $notificare;
    private $confirmation;
    private $delete;

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
     * Set the declarant reference
     * @param string $refDeclarant
     * @return self
     */
    public function setReferenceDeclarant(string $refDeclarant): self
    {
        $this->refDeclarant = $refDeclarant;

        return $this;
    }

    /**
     * Set the notification
     * @param Notificare $notificare
     * @return self
     */
    public function setNotificare(Notificare $notificare): self
    {
        $this->notificare = $notificare;

        return $this;
    }

    /**
     * Set the confirmation
     * @param Confirmare $confirmation
     * @return self
     */
    public function setConfirmation(Confirmare $confirmation): self
    {
        $this->confirmation = $confirmation;

        return $this;
    }

    /**
     * Set delete
     * @param Delete $delete
     * @return self
     */
    public function setDelete(Delete $delete): self
    {
        $this->delete = $delete;

        return $this;
    }

    public function validate()
    {
        if (!$this->codDeclarant) {
            throw new InvalidArgumentException('Declarant code is missing!');
        }

        if (!$this->refDeclarant) {
            throw new InvalidArgumentException('Declarant reference is missing!');
        }

        if (!$this->notificare) {
            throw new InvalidArgumentException('Notificare is missing!');
        }

        if (!$this->confirmation) {
            throw new InvalidArgumentException('confirmation is missing!');
        }

        if (!$this->delete) {
            throw new InvalidArgumentException('Uit don\'t exist!');
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
            'xsi:schemaLocation' => 'mfp:anaf:dgti:eTransport:declaratie:v1',
            'codeDeclarant' => $this->codDeclarant,
            'refDeclarant' => $this->refDeclarant,
        ]);

        if ($this->notificare) {
            $writer->write([
                'notificare' => $this->notificare,
            ]);
        }

        if ($this->confirmation) {
            $writer->write([
                'confirmare' => $this->confirmation,
            ]);
        }

        if ($this->delete) {
            $writer->write([
                'stergere' => $this->delete,
            ]);
        }
    }
}