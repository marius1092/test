<?php

namespace Mba\CautiousBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Mba\CautiousBundle\Entity\Podcast
 * @Vich\Uploadable
 * @ORM\Table(name="podcast_work")
 * @ORM\Entity(repositoryClass="Mba\CautiousBundle\Entity\PodcastRepository")
 */
class Podcast
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;
    
    /**
     * @var string $subtitle
     *
     * @ORM\Column(name="subtitle", type="string", length=255, nullable=true)
     */
    private $subtitle;

    /**
     * @var date $podcast_date
     *
     * @ORM\Column(name="podcast_date", type="date")
     */
    private $podcast_date;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string $audio_url
     *
     * @ORM\Column(name="audio_url", type="string", length=255, nullable=true)
     */
    private $audio_url;

    /**
     * @Assert\File(
     *     maxSize="10M",
     *     mimeTypes={"audio/mpeg", "application/octet-stream"}
     * )
     * @Vich\UploadableField(mapping="audioFile", fileNameProperty="audio_mp3_name")
     *
     * @var File $audio_mp3
     */
    protected $audio_mp3;

    /**
     * @var string $audio_mp3_name
     *
     * @ORM\Column(name="audio_mp3_name", type="string", length=255, nullable=true)
     */
    private $audio_mp3_name;
    
    /**
     * @var boolean $active
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active = true;
    
    /**
     * @var date $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="date")
     */
    private $created;

    /**
     * @var date $updated
     *
     * @ORM\Column(type="date")
     * @Gedmo\Timestampable(on="update")
     */
    private $updated;     
    
    public function getAudioMp3()
    {
        return $this->audio_mp3;
    }
    
    public function setAudioMp3($audio)
    {
        $this->audio_mp3 = $audio;
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set subtitle
     *
     * @param string $subtitle
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * Get subtitle
     *
     * @return string 
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set podcast_date
     *
     * @param datetime $podcastDate
     */
    public function setPodcastDate($podcastDate)
    {
        $this->podcast_date = $podcastDate;
    }

    /**
     * Get podcast_date
     *
     * @return datetime 
     */
    public function getPodcastDate()
    {
        return $this->podcast_date;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set audio_url
     *
     * @param string $audioUrl
     */
    public function setAudioUrl($audioUrl)
    {
        $this->audio_url = $audioUrl;
    }

    /**
     * Get audio_url
     *
     * @return string 
     */
    public function getAudioUrl()
    {
        return $this->audio_url;
    }

    /**
     * Set slug
     *
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set active
     *
     * @param boolean $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set audio_mp3_name
     *
     * @param string $audioMp3Name
     */
    public function setAudioMp3Name($audioMp3Name)
    {
        $this->audio_mp3_name = $audioMp3Name;
    }

    /**
     * Get audio_mp3_name
     *
     * @return string 
     */
    public function getAudioMp3Name()
    {
        return $this->audio_mp3_name;
    }

    /**
     * Set created
     *
     * @param date $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * Get created
     *
     * @return date 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param date $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * Get updated
     *
     * @return date 
     */
    public function getUpdated()
    {
        return $this->updated;
    }
}