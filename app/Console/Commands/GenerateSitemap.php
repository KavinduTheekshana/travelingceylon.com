<?php

namespace App\Console\Commands;

use App\Models\Destinations;
use App\Models\PackageDetails;
use App\Models\Packages;
use Illuminate\Console\Command;
use Spatie\LaravelPackageTools\Package;
use Spatie\Sitemap\Sitemap;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically Generate an XML Sitemap';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sitemap = Sitemap::create();

        // Add destinations to the sitemap
        Destinations::all()->each(function ($destination) use ($sitemap) {
            $sitemap->add(
                url("/destination/{$destination->slug}")
            );
        });

        // Add packages to the sitemap
        Packages::all()->each(function ($package) use ($sitemap) {
            $sitemap->add(
                url("/package/{$package->slug}")
            );
        });

        // Add package details to the sitemap
        PackageDetails::all()->each(function ($packageDetail) use ($sitemap) {
            $sitemap->add(
                url("/package/detail/{$packageDetail->slug}")
            );
        });

        // Write the sitemap to a file
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully.');
    }
}
