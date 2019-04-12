<?php
namespace App\Helpers;


class WordpressHelper {
    private $blog_url = '';

    public function __construct()
    {
        $this->blog_url = 'http://www.leverage.it';
    }

    public function getBlogPosts()
    {
       // $posts=[];
       // for($i=1; $i<100; $i++) {
       //  $url = $this->blog_url.'/wp-json/wp/v2/posts?per_page=100&page='. $i ;
       //  $posts_per_page = json_decode(file_get_contents($url));
       //  if(!$posts_per_page){
       //      break;
       //  }

       //  $posts = array_merge($posts, $posts_per_page);
        
       // }

         $url = $this->blog_url.'/wp-json/wp/v2/posts?per_page=100';
        $posts = json_decode(file_get_contents($url));
       
       return $posts;
    }

    public function getCategories(){

       $url = $this->blog_url . '/wp-json/wp/v2/categories?per_page=100';
       $categories = json_decode(file_get_contents($url));

       return $categories;

    }

    public function getMedia(){

       // $media=[];
       // for($i=1; $i<100; $i++) {
       //  $url = $this->blog_url.'/wp-json/wp/v2/media?per_page=100&page='. $i ;
       //  $media_per_page = json_decode(file_get_contents($url));
       //  if(!$media_per_page){
       //      break;
       //  }

       //  $media = array_merge($media, $media_per_page);
        
       // }
        $url = $this->blog_url.'/wp-json/wp/v2/media?per_page=100';
        $media = json_decode(file_get_contents($url));
       return $media;

    }

    public function getAuthors(){

      $url = $this->blog_url . '/wp-json/wp/v2/users?per_page=100';
      $users = json_decode(file_get_contents($url));

      return $users;

    }

    public function recurse_copy($src,$dst) { 
        $dir = opendir($src); 
        @mkdir($dst); 
        while(false !== ( $file = readdir($dir)) ) { 
            if (( $file != '.' ) && ( $file != '..' )) { 
                if ( is_dir($src . '/' . $file) ) { 
                    recurse_copy($src . '/' . $file,$dst . '/' . $file); 
                } 
                else { 
                    copy($src . '/' . $file,$dst . '/' . $file); 
                } 
            } 
        } 
        closedir($dir); 
    } 
}
