<?php

namespace App\Entity;

use App\Repository\LibrosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LibrosRepository::class)
 */
class Libros
{
     /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $isbn;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $subtitle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $author;

    /**
     * @ORM\Column(type="datetime")
     */
    private $published;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $publisher;

    /**
     * @ORM\Column(type="smallint")
     */
    private $pages;

    /**
     * @ORM\Column(type="text", length=65535)
     */
    private $description;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $website;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $category;
    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $imagenes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setisbn(string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(?string $subtitle): self
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getPublished(): ?\DateTimeInterface
    {
        return $this->published;
    }

    public function setPublished(\DateTimeInterface $published): self
    {
        $this->published = $published;

        return $this;
    }

    public function getPublisher(): ?string
    {
        return $this->publisher;
    }

    public function setPublisher(string $publisher): self
    {
        $this->publisher = $publisher;

        return $this;
    }

    public function getPages(): ?int
    {
        return $this->pages;
    }

    public function setPages(int $pages): self
    {
        $this->pages = $pages;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }


    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getImagenes(): ?int
    {
        $current_imgs = json_decode($this->imagenes);
        
        if(is_string($current_imgs) || $current_imgs == null)
        {
            return 1;
        }else{
            return sizeof($current_imgs);
        }
        
    }

    public function getImagenesId(): ?array
    {
        $current_imgs = json_decode($this->imagenes);

        if(is_string($current_imgs)){
            $current = [$current_imgs];
            return $current;
        }else{
            return $current_imgs;
        } 
    }

    public function setImagenes(string $img_id): self
    {
        if ($img_id != ""):
            $current_imgs = json_decode($this->imagenes);
            
            if($current_imgs === null){
                $this->imagenes = json_encode( $img_id );
            }else{
                
                if(is_string($current_imgs)){
                    $current = [$current_imgs];
                    array_push($current, $img_id);
                    $this->imagenes = json_encode($current);
                }else{
                    array_push($current_imgs, $img_id);
                    $this->imagenes = json_encode($current_imgs);
                }         
            }   
        endif;
        return $this;
    } 
}
