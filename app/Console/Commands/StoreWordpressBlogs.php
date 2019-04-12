<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogMedia;
use App\Models\BlogAuthor;
use App\Helpers\WordpressHelper;

class StoreWordpressBlogs extends Command
{
    
    protected $wordpress;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:wp-blogs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports Wordpress Blogs';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(WordpressHelper $wordpressHelper)
    {
        parent::__construct();

        $this->wordpress = $wordpressHelper;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
        // insert and update the categories
            $categories_api = $this->wordpress->getCategories();

            if (!$categories_api) {
                $this->error('Could not get categories from api call');
                return;
            }

            $category_db_ids = BlogCategory::all()->pluck('wp_category_id')->all();

            foreach($categories_api as $category_api){

            if (in_array($category_api->id, $category_db_ids)) {
                
                $category_db = BlogCategory::where('wp_category_id', $category_api->id)->first();
                
                $this->insertOrUpdateCategory($category_db, $category_api);

                continue;
            }

            $category_db = new BlogCategory;

            $this->insertOrUpdateCategory($category_db, $category_api);


            $this->info('a new category: ' . $category_db->name . " inserted");
        }

        // delete categories

        $category_api_ids = [];

        foreach($categories_api as $category_api){

            $category_api_ids[] = $category_api->id;
        }

        $categories_db = BlogCategory::all();

        if($categories_db->first()){

            foreach($categories_db as $category_db){

                if (in_array($category_db->wp_category_id, $category_api_ids))
                 {
                continue;
                }else{
                    $category_db->delete();

                    $this->info('a category: ' . $category_db->category . " deleted");
                }

            }
        }
       $this->info('categories updated');

       // author

       // insert and update author

       $authors_api = $this->wordpress->getAuthors();

            if (!$authors_api) {
                $this->error('Could not get authors from api call');
                return;
            }

            $authors_db_ids = BlogAuthor::all()->pluck('wp_author_id')->all();

            foreach($authors_api as $author_api){

            if (in_array($author_api->id, $authors_db_ids)) {
                
                $author_db = BlogAuthor::where('wp_author_id', $author_api->id)->first();
                
                $this->insertOrUpdateAuthor($author_db, $author_api);

                continue;
            }

            $author_db = new BlogAuthor;

            $this->insertOrUpdateAuthor($author_db, $author_api);


            $this->info('a new author: ' . $author_db->name . " inserted");
        }

        // delete authors

        $author_api_ids = [];

        foreach($authors_api as $author_api){

            $author_api_ids[] = $author_api->id;
        }

        $authors_db = BlogAuthor::all();

        if($authors_db->first()){

            foreach($authors_db as $author_db){

                if (in_array($author_db->wp_author_id, $author_api_ids))
                 {
                continue;
                }else{
                    $author_db->delete();

                    $this->info('an author : ' . $author_db->name . " deleted");
                }

            }
        }
       $this->info('authors updated');


    //blog posts

    //insert or update posts

    $blogs_api = $this->wordpress->getBLogPosts();

         if (!$blogs_api) {
             $this->error('Could not get blogs from api call');
             return;
         }

         $blogs_db_ids = Blog::all()->pluck('wp_blog_id')->all();

         foreach($blogs_api as $blog_api){

         if (in_array($blog_api->id, $blogs_db_ids)) {
             
             $blog_db = Blog::where('wp_blog_id', $blog_api->id)->first();

             $this->insertOrUpdateBlog($blog_db, $blog_api);
             
             continue;
         }

         $blog_db = new Blog;

         $this->insertOrUpdateBLog($blog_db, $blog_api);


         $this->info('a new blog with Id ' . $blog_db->id . " inserted");
     }

     // delete blogs

     $blog_api_ids = [];

     foreach($blogs_api as $blog_api){

         $blog_api_ids[] = $blog_api->id;
     }

     $blogs_db = Blog::all();

     if($blogs_db->first()){

         foreach($blogs_db as $blog_db){

             if (in_array($blog_db->wp_blog_id, $blog_api_ids))
              {
             continue;
             }else{
                 $blog_db->delete();

                 $this->info('a blog with Id  ' . $blog_db->id . " deleted");
             }

         }
     }
    $this->info('blogs updated');

    //media

    //insert or update media

    $media_api = $this->wordpress->getMedia();

         if (!$media_api) {
             $this->error('Could not get media from api call');
             return;
         }

         $media_db_ids = BlogMedia::all()->pluck('wp_medium_id')->all();

         foreach($media_api as $medium_api){

         if (in_array($medium_api->id, $media_db_ids)) {
             
             $medium_db = BlogMedia::where('wp_medium_id', $medium_api->id)->first();
             
             $this->insertOrUpdateMedium($medium_db, $medium_api);

             continue;
         }

         $medium_db = new BlogMedia;

         $this->insertOrUpdateMedium($medium_db, $medium_api);


         $this->info('a new medium  with  id : ' . $medium_db->id . " inserted");
     }

     // delete medium

     $medium_api_ids = [];

     foreach($media_api as $medium_api){

         $medium_api_ids[] = $medium_api->id;
     }

     $media_db = BlogMedia::all();

     if($media_db->first()){

         foreach($media_db as $medium_db){

             if (in_array($medium_db->wp_medium_id, $medium_api_ids))
              {
             continue;
             }else{
                 $medium_db->delete();

                 $this->info('a medium with id : ' . $medium_db->id . " deleted");
             }

         }
     }
    $this->info('media  updated');

    // copy over the files directory

    //$this->wordpress->recurse_copy('http://blogs.bdmrat.com/wp-content', '/assets/wp-content');


                    

                
    }

 protected function insertOrUpdateCategory($category_db, $category_api){

    $category_db->wp_category_id =  $category_api->id;

    $category_db->category = $category_api->name;

    $category_db->save();

 }  

 protected function insertOrUpdateAuthor($author_db, $author_api){

    $author_db->wp_author_id =  $author_api->id;

    $author_db->name = $author_api->name;

    $author_db->save();

 }   

 protected function insertOrUpdateBlog($blog_db, $blog_api){

    $author = BlogAuthor::where('wp_author_id', $blog_api->author)->first();

     $blog_db->wp_blog_id      = $blog_api->id;
     $blog_db->modified_at     = $blog_api->modified;
     $blog_db->blog_created_at = $blog_api->date;
     $blog_db->author_id       = $author ? $author->id : 1;
     $blog_db->slug            = $blog_api->slug;
     $blog_db->status          = ''.@$blog_api->status;
     $blog_db->link            = $blog_api->link;
     $blog_db->title           = $blog_api->title->rendered;
     $blog_db->content         = $blog_api->content->rendered;
     $blog_db->excerpt         = $blog_api->excerpt->rendered;
     $blog_db->featured_media  = $blog_api->featured_media;
     $blog_db->save();

     $catIds = [];
     foreach($blog_api->categories as $cat){
         $category = BlogCategory::where('wp_category_id', $cat)->first();

         if($category){
             $catIds[] = $category->id ;
         }
     }

     $blog_db->categories()->sync($catIds);

 } 

 protected function insertOrUpdateMedium($medium_db, $medium_api){

                $blog= Blog::where('wp_blog_id', $medium_api->post)->first();
                $featured_blog = Blog::where('featured_media', $medium_api->id)->first();

                $medium_db->blog_id       = $blog ? $blog->id : 0;
                $medium_db->featured_blog = $featured_blog ? $featured_blog->id : 0 ;
                $medium_db->wp_medium_id  = $medium_api->id ;
                $medium_db->creation_date = $medium_api->date;
                $medium_db->modified_at   = $medium_api->modified;
                $medium_db->alt_text      = $medium_api->alt_text;
                $medium_db->image_url     = $medium_api->source_url;

                $medium_db->save();                       

           

    }  
             

   

    
}
