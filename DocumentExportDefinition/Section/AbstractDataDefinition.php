<?php
namespace DocumentExportDefinition\Section;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\Discriminator(field = "objectType", map = {
 *    "String": "DocumentExportDefinition\Section\Data\StringDefinition",
 *    "PageNumber": "DocumentExportDefinition\Section\Data\PageNumberDefinition",
 *    "File": "DocumentExportDefinition\Section\Data\FileDefinition",
 *    "Docx": "DocumentExportDefinition\Section\Encoded\DocxDefinition",
 *    "Flowchart": "DocumentExportDefinition\Section\Encoded\FlowchartDefinition",
 *    "Image": "DocumentExportDefinition\Section\Encoded\ImageDefinition",
 *    "Html": "DocumentExportDefinition\Section\Html\HtmlDefinition",
 *    "HtmlImage": "DocumentExportDefinition\Section\Html\HtmlImageDefinition",
 *    "TOC": "DocumentExportDefinition\Section\Data\TOCDefinition",
 *    "WordTOC": "DocumentExportDefinition\Section\Data\WordTOCDefinition"
 * })
 */
abstract class AbstractDataDefinition
{
    /**
     * @Serializer\SerializedName("value")
     * @Serializer\Type("string")
     * @var string
     */
    protected $value;

	/**
	 * @Serializer\SerializedName("title")
	 * @Serializer\Type("string")
	 * @var string
	 */
	protected $title;

	/**
	 * AbstractDataDefinition constructor.
	 */
	public function __construct()
	{
	}

	/**
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("objectType")
     * @Serializer\Type("string")
     * @return string
     */
    abstract public function getType();

    /**
     * @return string|array
     */
    public function getValue()
    {
        return $this->value;
    }

	/**
	 * @param string $value
	 */
	public function setValue($value)
	{
		$this->value = $value;
		return $this;
	}

	/**
	 * @param string $title
	 */
	public function setTitle($title)
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}
}
