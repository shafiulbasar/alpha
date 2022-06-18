<?php

if (!defined('ABSPATH'))
    exit;

include_once(QLIGG_PLUGIN_DIR . 'includes/models/Account.php');
include_once(QLIGG_PLUGIN_DIR . 'includes/models/Feed.php');

class QLIGG_API_Feed
{
    protected static $_instance;
    public $messages = array();
    public $instagram_url = 'https://www.instagram.com';

    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    function setupMediaItems($data, $last_id = null)
    {

        static $load = false;
        static $i = 1;
        if (!$last_id) {
            $load = true;
        }

        $instagram_items = array();

        if (is_array($data) && !empty($data)) {

            foreach ($data as $item) {

                if ($load) {

                    $hashtags = $this->getItemHashtags($item);

                    $media_url = $this->getItemMediaURL($item);

                    $date = $this->getItemDate($item);

                    $file_type = $this->getFileType($media_url);

                    $instagram_items[] = array(
                        'i' => $i,
                        'id' => $item['id'],
                        'type' => ucwords($file_type),//strtolower(str_replace('_ALBUM', '', $item['media_type'])),
                        'file_type' =>  $file_type,
                        'media' => $media_url,
                        'images' => array(
                            'standard' => $media_url,
                            'medium' => $media_url,
                            'small' => $media_url,
                        ),
                        'videos' => array(
                            'standard' => $media_url,
                            'medium' => $media_url,
                            'small' => $media_url,
                        ),
                        'likes' => isset($item['like_count']) ? $item['like_count'] : false,
                        'comments' => isset($item['comments_count']) ? $item['comments_count'] : false,
                        'caption' => preg_replace('/(?<!\S)#([0-9a-zA-Z]+)/', "<a href=\"{$this->instagram_url}/explore/tags/$1\">#$1</a>", htmlspecialchars(@$item['caption'])),
                        'hashtags' => $hashtags, //array_map('utf8_encode', (array) @$hashtags[1]), // issue with uft 8 encode breakes json_encode
                        'link' => $item['permalink'],
                        'date' => $date
                    );
                }

                if ($last_id && ($last_id == $i)) {
                    $i = $last_id;
                    $load = true;
                }
                $i++;
            }
        }

        return $instagram_items;
    }

    function getFileType($media_url)
    {
        $type =  parse_url($media_url);

        $file_type =  pathinfo($type['path'], PATHINFO_EXTENSION);

        if ($file_type == 'mp4') {
            return 'video';
        }
        return 'image';
    }

    function getItemMediaURL(array $item = [])
    {
        if (isset($item['media_type'])) {
            switch ($item['media_type']) {
                case 'IMAGE':
                    $image = @$item['media_url'];
                    break;
                case 'VIDEO':
                    if (!$image = @$item['media_url']) {
                        $image = @$item['thumbnail_url'];
                    }
                    break;
                case 'CAROUSEL_ALBUM':
                    $image = @$item['children']['data'][0]['media_url'];
                    break;
            }
        }

        return $image;
    }

    /*   function getItemImageURL(array $item = [])
    {

        if (isset($item['media_type'])) {
            switch ($item['media_type']) {
                case 'IMAGE':
                    $image = @$item['media_url'];
                    break;
                case 'VIDEO':
                    $image = @$item['media_url'];
                    break;
                case 'CAROUSEL_ALBUM':

                    if (!$image = @$item['children']['data'][0]['media_url']) {
                        $image = @$item['children']['data'][0]['media_url'];
                    }

                    break;
            }
        }


        return $image;
    } */

    function getItemDate(array $item = [])
    {

        if (isset($item['timestamp'])) {
            return date_i18n('j F, Y', strtotime(trim(str_replace(array('T', '+', ' 0000'), ' ', $item['timestamp']))));
        }

        return false;
    }

    function getItemHashtags(array $item = [])
    {

        if (isset($item['caption'])) {

            preg_match_all('/(?<!\S)#([0-9a-zA-Z]+)/', $item['caption'], $hashtags);

            if (isset($hashtags[1])) {
                return $hashtags[1];
            }
        }
    }

    // Return messages
    // ---------------------------------------------------------------------------
    public function getMessages()
    {
        return $this->messages;
    }

    public function setMessage($message = '')
    {
        $this->messages[] = $message;
    }
}
