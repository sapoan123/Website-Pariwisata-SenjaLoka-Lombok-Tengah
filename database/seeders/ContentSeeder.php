<?php

namespace Database\Seeders;

use App\Models\Destination;
use App\Models\Gallery;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        Destination::create([
            'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=800&auto=format&fit=crop',
            'title' => 'Kuta Mandalika',
            'slug' => 'kuta',
            'description' => 'Pantai Kuta Mandalika terkenal dengan pasir putihnya yang lembut dan ombak yang cocok untuk berselancar. Kawasan ini juga menjadi lokasi Sirkuit Mandalika yang mendunia.',
            'location' => 'Kuta, Lombok Tengah',
            'price' => 'Mulai 150k',
            'rating' => 4.8,
            'reviews' => 1200,
            'category' => 'pantai',
            'status' => 'approved',
        ]);

        Destination::create([
            'image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=800&auto=format&fit=crop',
            'title' => 'Bukit Merese',
            'slug' => 'merese',
            'description' => 'Bukit Merese menawarkan panorama sunset yang memukau dengan hamparan savana hijau dan laut biru yang luas dari ketinggian.',
            'location' => 'Kuta, Lombok Tengah',
            'price' => 'Mulai 50k',
            'rating' => 4.9,
            'reviews' => 980,
            'category' => 'bukit',
            'status' => 'approved',
        ]);

        Destination::create([
            'image' => 'https://images.unsplash.com/photo-1537956965359-7573183d1f57?q=80&w=800&auto=format&fit=crop',
            'title' => 'Tanjung Aan',
            'slug' => 'tanjung aan',
            'description' => 'Pantai Tanjung Aan memiliki pasir unik berbentuk seperti lada putih dan lada hitam, cocok untuk bersantai dan berenang.',
            'location' => 'Kuta, Lombok Tengah',
            'price' => 'Gratis',
            'rating' => 4.7,
            'reviews' => 560,
            'category' => 'pantai',
            'status' => 'approved',
        ]);

        Destination::create([
            'image' => 'https://images.unsplash.com/photo-1599292588958-bdaed6243377?q=80&w=800&auto=format&fit=crop',
            'title' => 'Desa Sade',
            'slug' => 'sade',
            'description' => 'Desa adat Sade menyajikan kearifan lokal suku Sasak dengan rumah tradisional dan tenun khas yang masih dilestarikan.',
            'location' => 'Kuta, Lombok Tengah',
            'price' => 'Mulai 20k',
            'rating' => 4.6,
            'reviews' => 340,
            'category' => 'budaya',
            'status' => 'approved',
        ]);

        Destination::create([
            'image' => 'https://images.unsplash.com/photo-1469334031218-e382a71b716b?q=80&w=800&auto=format&fit=crop',
            'title' => 'Selong Belanak',
            'slug' => 'selong',
            'description' => 'Pantai Selong Belanak memiliki pasir putih yang luas dan ombak yang tenang, cocok untuk belajar berselancar pemula.',
            'location' => 'Praya, Lombok Tengah',
            'price' => 'Gratis',
            'rating' => 4.8,
            'reviews' => 420,
            'category' => 'pantai',
            'status' => 'approved',
        ]);

        Destination::create([
            'image' => 'https://images.unsplash.com/photo-1519046904884-53103b34b359?q=80&w=800&auto=format&fit=crop',
            'title' => 'Pantai Mawun',
            'slug' => 'mawun',
            'description' => 'Pantai Mawun berbentuk teluk alami dengan pasir putih yang bersih dan air laut yang jernih kehijauan.',
            'location' => 'Praya, Lombok Tengah',
            'price' => 'Mulai 10k',
            'rating' => 4.7,
            'reviews' => 500,
            'category' => 'pantai',
            'status' => 'approved',
        ]);

        $galleries = [
            ['image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=800&auto=format&fit=crop', 'caption' => 'Pantai Kuta Mandalika'],
            ['image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=800&auto=format&fit=crop', 'caption' => 'Sunset Bukit Merese'],
            ['image' => 'https://images.unsplash.com/photo-1537956965359-7573183d1f57?q=80&w=800&auto=format&fit=crop', 'caption' => 'Pasir Pantai Tanjung Aan'],
            ['image' => 'https://images.unsplash.com/photo-1599292588958-bdaed6243377?q=80&w=800&auto=format&fit=crop', 'caption' => 'Budaya Sasak Desa Sade'],
            ['image' => 'https://images.unsplash.com/photo-1469334031218-e382a71b716b?q=80&w=800&auto=format&fit=crop', 'caption' => 'Selong Belanak'],
            ['image' => 'https://images.unsplash.com/photo-1519046904884-53103b34b359?q=80&w=800&auto=format&fit=crop', 'caption' => 'Pantai Mawun'],
            ['image' => 'https://images.unsplash.com/photo-1594744803329-e58b31de8bf5?q=80&w=800&auto=format&fit=crop', 'caption' => 'Pemandu Wisata Lokal'],
            ['image' => 'https://images.unsplash.com/photo-1541976597150-5a496a655613?q=80&w=800&auto=format&fit=crop', 'caption' => 'Sunset Lombok Tengah'],
        ];

        foreach ($galleries as $g) {
            Gallery::create($g);
        }

        Testimonial::create([
            'name' => 'Reza Pratama',
            'role' => 'Wisatawan Lokal',
            'avatar' => 'https://i.pravatar.cc/150?img=1',
            'content' => 'Pengalaman yang luar biasa! Sunset di Bukit Merese benar-benar tak terlupakan. Tour guide-nya ramah dan profesional. Recommended banget buat yang mau liburan ke Lombok Tengah.',
            'rating' => 5,
            'status' => 'approved',
        ]);

        Testimonial::create([
            'name' => 'Nina Safira',
            'role' => 'Travel Blogger',
            'avatar' => 'https://i.pravatar.cc/150?img=5',
            'content' => 'Pelayanan SenjaLoka sangat memuaskan. Dari penjemputan sampai antar, semuanya terorganisir rapi. Spot-spot yang dikunjungi juga instagenic abis!',
            'rating' => 5,
            'status' => 'approved',
        ]);

        Testimonial::create([
            'name' => 'Andi Gunawan',
            'role' => 'Tour Guide',
            'avatar' => 'https://i.pravatar.cc/150?img=3',
            'content' => 'Paket wisata yang ditawarkan SenjaLoka sangat variatif dan terjangkau. Saya senang bisa menjadi bagian dari tim yang memperkenalkan keindahan Lombok Tengah ke wisatawan.',
            'rating' => 4,
            'status' => 'approved',
        ]);
    }
}
