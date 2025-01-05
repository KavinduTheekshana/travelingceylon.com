<?php

namespace App\Console\Commands;

use App\Models\Destinations;
use App\Models\PackageDetails;
use App\Models\Packages;
use Illuminate\Console\Command;
use Spatie\LaravelPackageTools\Package;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

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
    protected $description = 'Generate the sitemap for the website';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Generating sitemap...');

        // Create a new sitemap instance
        $sitemap = Sitemap::create();

        // Add static pages
        $this->info('Adding static pages...');
        $sitemap->add(Url::create('/')->setPriority(1.0)->setChangeFrequency('daily'));
        $sitemap->add(Url::create('/about')->setPriority(0.8)->setChangeFrequency('monthly'));
        $sitemap->add(Url::create('/contact')->setPriority(0.7)->setChangeFrequency('monthly'));
        $sitemap->add(Url::create('/gallery')->setPriority(0.7)->setChangeFrequency('monthly'));
        $sitemap->add(Url::create('/destinations/all')->setPriority(0.7)->setChangeFrequency('monthly'));
        $sitemap->add(Url::create('/packages/all')->setPriority(0.7)->setChangeFrequency('monthly'));

        // Add dynamic destination pages
        $this->info('Adding destinations...');
        $destinations = Destinations::where('status', 1)->get();
        foreach ($destinations as $destination) {
            $sitemap->add(
                Url::create("/destination/{$destination->slug}")
                    ->setPriority($destination->popular_status ? 0.9 : 0.7)
                    ->setChangeFrequency('monthly')
                    ->setLastModificationDate($destination->updated_at)
            );
        }

        // Add dynamic package pages
        $this->info('Adding packages...');
        $packages = Packages::where('status', 1)->get();
        foreach ($packages as $package) {
            $sitemap->add(
                Url::create("/packages/{$package->slug}")
                    ->setPriority($package->popular_status ? 0.9 : 0.7)
                    ->setChangeFrequency('monthly')
                    ->setLastModificationDate($package->updated_at)
            );
        }

        // Save the sitemap to a file
        $this->info('Writing sitemap to file...');
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully!');
        return Command::SUCCESS;
    }
}