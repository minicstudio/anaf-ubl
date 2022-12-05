<?php

namespace MinicStudio\UBL\Transport;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

use InvalidArgumentException;

class Transport implements XmlSerializable
{
    /**
     * Declarant code
     *
     * @var string
     */
    private $codDeclarant;

    /**
     * Declarant reference
     *
     * @var string
     */
    private $refDeclarant;

    /**
     * Notification
     *
     * @var string
     */
    private $notificare;

    /**
     * Confiramtion
     *
     * @var string
     */
    private $confirmation;

    /**
     * Delete
     *
     * @var string
     */
    private $delete;

    /**
     * Set the declarant code
     * @param string $codDeclarant
     * @return self
     */
    public function setCodDeclarant(string $codDeclarant): self
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

    /**
     * The validate function that is called during xml writing to valid the data of the object.
     *
     * @throws InvalidArgumentException An error with information about required data that is missing to write the XML
     * @return void
     */
    public function validate()
    {
        if (!$this->codDeclarant) {
            throw new InvalidArgumentException('Declarant code required!');
        }

        if (!$this->refDeclarant) {
            throw new InvalidArgumentException('Declarant reference is required!');
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
            'codDeclarant' => $this->codDeclarant,
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