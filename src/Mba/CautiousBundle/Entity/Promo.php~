<?php

namespace Mba\CautiousBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;

/**
 * Mba\CautiousBundle\Entity\Promo
 *
 * @ORM\Table(name="promo_work")
 * @ORM\Entity(repositoryClass="Mba\CautiousBundle\Entity\PromoRepository")
 * @Vich\Uploadable
 */
class Promo {

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
     * @var string $director
     *
     * @ORM\Column(name="director", type="string", length=255, nullable=true)
     */
    private $director;

    /**
     * @var string $client
     *
     * @ORM\Column(name="client", type="string", length=255, nullable=true)
     */
    private $client;

    /**
     * @var date $promo_date
     *
     * @ORM\Column(name="promo_date", type="date")
     */
    private $promo_date;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string $video_url
     *
     * @ORM\Column(name="video_url", type="text")
     */
    private $video_url;

    /**
     * @Assert\File(
     *     maxSize="1M",
     *     mimeTypes={"image/png", "image/jpeg", "image/pjpeg"}
     * )
     * @Vich\UploadableField(mapping="promoImage", fileNameProperty="image_name")
     *
     * @var File $image
     */
    protected $image;

    /**
     * @var string $image_name
     *
     * @ORM\Column(name="image_name", type="string", length=255)
     */
    private $image_name;

    /**
     * @Assert\File(
     *     maxSize="1M",
     *     mimeTypes={"image/png", "image/jpeg", "image/pjpeg"}
     * )
     * @Vich\UploadableField(mapping="promoImage", fileNameProperty="image_over_name")
     *
     * @var File $imageOver
     */
    protected $imageOver;

    /**
     * @var string $image_over_name
     *
     * @ORM\Column(name="image_over_name", type="string", length=255, nullable=true)
     */
    private $image_over_name;

    /**
     * @var boolean $active
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active = true;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set slug
     *
     * @param string $slug
     */
    public function setSlug($slug) {
        $this->slug = $slug;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug() {
        return $this->slug;
    }

    /**
     * Set director
     *
     * @param string $director
     */
    public function setDirector($director) {
        $this->director = $director;
    }

    /**
     * Get director
     *
     * @return string 
     */
    public function getDirector() {
        return $this->director;
    }

    /**
     * Set client
     *
     * @param string $client
     */
    public function setClient($client) {
        $this->client = $client;
    }

    /**
     * Get client
     *
     * @return string 
     */
    public function getClient() {
        return $this->client;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set video_url
     *
     * @param string $videoUrl
     */
    public function setVideoUrl($videoUrl) {
        $this->video_url = $videoUrl;
    }

    /**
     * Get video_url
     *
     * @return string 
     */
    public function getVideoUrl() {
        return $this->video_url;
    }

    /**
     * Set image_name
     *
     * @param string $imageName
     */
    public function setImageName($imageName) {
        $this->image_name = $imageName;
    }

    /**
     * Get image_name
     *
     * @return string 
     */
    public function getImageName() {
        return $this->image_name;
    }

    /**
     * Set promo_image_over
     *
     * @param string $promoImageOver
     */
    public function setPromoImageOver($promoImageOver) {
        $this->promo_image_over = $promoImageOver;
    }

    /**
     * Get promo_image_over
     *
     * @return string 
     */
    public function getPromoImageOver() {
        return $this->promo_image_over;
    }

    /**
     * Set active
     *
     * @param boolean $active
     */
    public function setActive($active) {
        $this->active = $active;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive() {
        return $this->active;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getImage() {
        return $this->image;
    }
    
    public function setImageOver($imageOver) {
        $this->imageOver = $imageOver;
    }

    public function getImageOver() {
        return $this->imageOver;
    }    


    /**
     * Set image_over_name
     *
     * @param string $imageOverName
     */
    public function setImageOverName($imageOverName)
    {
        $this->image_over_name = $imageOverName;
    }

    /**
     * Get image_over_name
     *
     * @return string 
     */
    public function getImageOverName()
    {
        return $this->image_over_name;
    }

    /**
     * Set promo_date
     *
     * @param date $promoDate
     */
    public function setPromoDate($promoDate)
    {
        $this->promo_date = $promoDate;
    }

    /**
     * Get promo_date
     *
     * @return date 
     */
    public function getPromoDate()
    {
        return $this->promo_date;
    }
}