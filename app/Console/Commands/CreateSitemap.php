<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\SitemapIndex;
use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\House;
 use Psr\Http\Message\UriInterface;



class CreateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'creating sitemap from command line';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
        

        SitemapIndex::create()
            ->add('/sitemap.xml')
            ->add('/sitemap_1.xml')
            ->add('/sitemap_2.xml')
            ->writeToFile(public_path('sitemapindex.xml'));

        //SitemapGenerator::create('http://www.banglatoronto.ca')->writeToFile('/var/www/rentBasement/public/sitemap.xml');

       

        // SitemapGenerator::create('http://www.banglatoronto.ca')
        //    ->shouldCrawl(function (UriInterface $url) {
        //        // All pages will be crawled, except the contact page.
        //        // Links present on the contact page won't be added to the
        //        // sitemap unless they are present on a crawlable page.
               
        //        return strpos($url->getPath(), '/listing/') === false;
        //    })
        //    ->writeToFile('/var/www/rentBasement/public/sitemap.xml');

        $sitemap = Sitemap::create();
                    
        
        House::where('id','<', 50000)->get()->map(function($listing) use($sitemap){

            $sitemap->add(Url::create('/listing/'. $listing->id)) ;

        });

        $sitemap->writeToFile(public_path('sitemap_1.xml'));

        $sitemap = Sitemap::create();
                    
        
        House::where('id','>=', 50000)->get()->map(function($listing) use($sitemap){

            $sitemap->add(Url::create('/listing/'. $listing->id)) ;

        });

        $sitemap->writeToFile(public_path('sitemap_2.xml'));

           


    }
}
