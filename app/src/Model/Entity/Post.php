<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Post Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string|resource $content
 * @property string $imgpath
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class Post extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'user_id' => true,
        'title' => true,
        'content' => true,
        'imgpath' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
    ];

    /*public function beforeMarshal(\Cake\Event\EventInterface $event, \ArrayObject $data, \ArrayObject $options)
    {
        if ($data['imgpath'] === '') {
            unset($data['imgpath']);
        }
    }*/

    protected function _setImage($imagePath)
    {
        if (empty($imagePath) || $imagePath['error'] === UPLOAD_ERR_NO_FILE) {
            return null;
        }
        if ($imagePath instanceof \Laminas\Diactoros\UploadedFile) {
        $uploadPath = WWW_ROOT . 'img' . DS . 'uploads' . DS;
        $filename = uniqid() . '-' . $imagePath->getClientFilename();
        $imagePath->moveTo($uploadPath . $filename);
        return 'img/uploads/' . $filename;
        }
        return $imagePath;
    }
}
