<?php

namespace Database\Seeders;

use App\Models\Opportunity;
use App\Models\OrganizerProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OpportunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengambil profil penyelenggara demo
        $organizer = OrganizerProfile::where(
            'organization_name',
            'Career Development Center'
        )->first();

        // Lewati jika profil penyelenggara belum tersedia
        if (!$organizer) {
            $this->command->warn(
                'Profil penyelenggara Career Development Center tidak ditemukan. OpportunitySeeder dilewati.'
            );

            return;
        }

        $opportunities = [
            [
                'title' => 'Beasiswa Unggulan Mahasiswa Berprestasi 2027',
                'category' => 'scholarship',
                'description' => 'Program beasiswa untuk mahasiswa berprestasi yang memiliki potensi akademik dan nonakademik serta berkomitmen untuk mengembangkan diri.',
                'requirements' => 'Mahasiswa aktif, memiliki prestasi akademik atau nonakademik, dan melengkapi dokumen pendaftaran.',
                'eligibility' => 'Mahasiswa aktif jenjang S1 dari perguruan tinggi di Indonesia.',
                'benefits' => 'Bantuan biaya pendidikan dan kesempatan mengikuti program pengembangan diri.',
                'location' => 'Indonesia',
                'registration_url' => 'https://example.com/beasiswa',
                'registration_start' => '2027-01-01',
                'registration_deadline' => '2027-03-31',
            ],
            [
                'title' => 'Web Developer Internship Program 2027',
                'category' => 'internship',
                'description' => 'Program magang untuk mahasiswa yang tertarik mempelajari pengembangan aplikasi web secara langsung melalui proyek dan bimbingan profesional.',
                'requirements' => 'Memahami HTML, CSS, JavaScript, dan dasar pemrograman web. Memiliki kemampuan bekerja dalam tim.',
                'eligibility' => 'Mahasiswa aktif minimal semester 4 dari jurusan teknologi informasi atau bidang terkait.',
                'benefits' => 'Pengalaman kerja, mentoring profesional, sertifikat magang, dan kesempatan membangun portofolio.',
                'location' => 'Jakarta, Indonesia',
                'registration_url' => 'https://example.com/internship',
                'registration_start' => '2027-01-05',
                'registration_deadline' => '2027-04-15',
            ],
            [
                'title' => 'National Student Innovation Competition 2027',
                'category' => 'competition',
                'description' => 'Kompetisi inovasi mahasiswa yang mendorong peserta untuk menciptakan solusi kreatif terhadap permasalahan di masyarakat melalui teknologi.',
                'requirements' => 'Mengirimkan proposal inovasi, membentuk tim, dan mengikuti seluruh tahapan seleksi kompetisi.',
                'eligibility' => 'Mahasiswa aktif perguruan tinggi di Indonesia.',
                'benefits' => 'Penghargaan, sertifikat, pengalaman kompetisi, dan kesempatan mempresentasikan inovasi.',
                'location' => 'Online',
                'registration_url' => 'https://example.com/competition',
                'registration_start' => '2027-02-01',
                'registration_deadline' => '2027-05-30',
            ],
            [
                'title' => 'Data Science and Machine Learning Bootcamp 2027',
                'category' => 'training',
                'description' => 'Program pelatihan intensif untuk mempelajari dasar analisis data, visualisasi data, dan machine learning menggunakan Python.',
                'requirements' => 'Memiliki laptop dan pemahaman dasar komputer. Pengetahuan dasar pemrograman menjadi nilai tambah.',
                'eligibility' => 'Mahasiswa dan lulusan baru yang tertarik pada bidang data science.',
                'benefits' => 'Materi pembelajaran, praktik proyek, mentoring, dan sertifikat pelatihan.',
                'location' => 'Online',
                'registration_url' => 'https://example.com/bootcamp',
                'registration_start' => '2027-03-01',
                'registration_deadline' => '2027-06-15',
            ],
        ];

        foreach ($opportunities as $data) {
            $slug = Str::slug($data['title']);

            Opportunity::updateOrCreate(
                [
                    'slug' => $slug,
                ],
                array_merge($data, [
                    'organizer_profile_id' => $organizer->id,
                    'slug' => $slug,
                    'poster_path' => null,
                    'status' => 'published',
                    'verification_status' => 'verified',
                ])
            );
        }
    }
}
