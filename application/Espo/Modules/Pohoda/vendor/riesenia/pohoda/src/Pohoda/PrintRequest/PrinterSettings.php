<?php
/**
 * This file is part of riesenia/pohoda package.
 *
 * Licensed under the MIT License
 * (c) RIESENIA.com
 */

declare(strict_types=1);

namespace Riesenia\Pohoda\PrintRequest;

use Riesenia\Pohoda\Agenda;
use Riesenia\Pohoda\Common\OptionsResolver;

class PrinterSettings extends Agenda
{
    /** @var string[] */
    protected $_elements = ['report', 'printer', 'pdf'];

    /**
     * {@inheritdoc}
     */
    public function __construct(array $data, string $ico, bool $resolveOptions = true)
    {
        // process report
        if (isset($data['report'])) {
            $data['report'] = new Report($data['report'], $ico, $resolveOptions);
        }
        // process pdf
        if (isset($data['pdf'])) {
            $data['pdf'] = new Pdf($data['pdf'], $ico, $resolveOptions);
        }

        parent::__construct($data, $ico, $resolveOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function getXML(): \SimpleXMLElement
    {
        $xml = $this->_createXML()->addChild('prn:printerSettings', '', $this->_namespace('prn'));

        $this->_addElements($xml, $this->_elements, 'prn');

        return $xml;
    }

    /**
     * {@inheritdoc}
     */
    protected function _configureOptions(OptionsResolver $resolver)
    {
        // available options
        $resolver->setDefined($this->_elements);
    }
}
