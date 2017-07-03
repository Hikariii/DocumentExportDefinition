<?php

namespace DocumentExportDefinition\Section;

use DocumentExportDefinition\DocumentDefinition;
use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;
use DocumentExportDefinition\Section\AbstractDataDefinition;

class SectionDefinition
{
    const OPTION_NEXT_SECTION_ORIENTATION = 'nextSectionOrientation';

       /**
     * @Serializer\SerializedName("title")
     * @Serializer\Type("DocumentExportDefinition\Section\AbstractDataDefinition")
     */
    protected $title;

    /**
     * @Serializer\SerializedName("contents")
     * @Serializer\Type("DocumentExportDefinition\Section\AbstractDataDefinition")
     */
    protected $contents;

    /**
     * @Serializer\SerializedName("variables")
     * @Serializer\Type("array<DocumentExportDefinition\Section\AbstractDataDefinition>")
     */
    protected $variables;

    /**
     * @Serializer\SerializedName("options")
     * @Serializer\Type("array")
     * @var array
     */
    protected $options = [
        DocumentDefinition::OPTION_ADD_TITLES => null,
        DocumentDefinition::OPTION_ADD_PAGE_BREAK => null,
        DocumentDefinition::OPTION_ORIENTATION => null,
        self::OPTION_NEXT_SECTION_ORIENTATION => null,
        DocumentDefinition::OPTION_PAGE_NUMBERING => null,
        DocumentDefinition::OPTION_DOWNLOAD_IMAGES => null,
        DocumentDefinition::OPTION_USE_STRICT_STYLES => null,
        DocumentDefinition::OPTION_ANCHOR => null
    ];

    /**
     * @Serializer\SerializedName("images")
     * @Serializer\Type("array<AbstractEncodedDataDefinition>")
     */
    protected $images;


    /**
     * AbstractSectionDefinition constructor.
     * @param null $title
     * @param null $contents
     */
    public function __construct($title = null, $contents = null)
    {
        $this->title = $title;
        $this->contents = $contents;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $contents
     */
    public function setContents($contents)
    {
        $this->contents = $contents;
    }

    /**
     * @return string
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * @param $variables
     */
    public function setVariables($variables)
    {
        $this->variables = $variables;
    }

    /**
     * @return array
     */
    public function getVariables()
    {
        return $this->variables;
    }

    public function setOption($option, $value)
    {
        $this->options[$option] = $value;
    }

    public function getOption($option)
    {
        if (array_key_exists($option, $this->options) === false) {
            return false;
        }

        return $this->options[$option];
    }

    /**
     * @return mixed
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param mixed $images
     */
    public function setImages($images)
    {
        $this->images = $images;
    }
}
