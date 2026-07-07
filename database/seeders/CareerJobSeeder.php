<?php

namespace Database\Seeders;

use App\Models\CareerSection;
use App\Models\HiringProcessStep;
use App\Models\JobPosition;
use Illuminate\Database\Seeder;

class CareerJobSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Career Sections
        |--------------------------------------------------------------------------
        */

        // php artisan db:seed --class=CareerJobSeeder

        $careerSections = [
            [
                'section_key' => 'open_positions',
                'label' => 'Open Positions',
                'title' => 'Available Jobs',
                'description' => 'Select the role that matches your profile and submit your application.',
                'button_text' => 'Submit Application',
                'button_url' => '#apply-now',
                'sort_order' => 1,
                'status' => 1,
            ],
            [
                'section_key' => 'hiring_process',
                'label' => 'Hiring Process',
                'title' => 'Simple steps to join GPT Group.',
                'description' => 'Apply for a suitable role, share your details and our HR team can connect with you for the next steps.',
                'button_text' => null,
                'button_url' => null,
                'sort_order' => 2,
                'status' => 1,
            ],
            [
                'section_key' => 'apply_form',
                'label' => 'Apply Now',
                'title' => 'Start your career with GPT Group.',
                'description' => 'Fill this form to apply for any open position. Our HR team will review your profile.',
                'button_text' => 'Submit Application',
                'button_url' => null,
                'email_title' => 'Email',
                'email' => 'info@gptgroups.com',
                'phone_title' => 'Helpline',
                'phone' => '+968 2450-1533',
                'sort_order' => 3,
                'status' => 1,
            ],
        ];

        foreach ($careerSections as $section) {
            CareerSection::updateOrCreate(
                [
                    'section_key' => $section['section_key'],
                ],
                $section
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Job Positions
        |--------------------------------------------------------------------------
        */

        $jobs = [
            [
                'title' => 'Marketing & Sales Intern - GlobeSpac',
                'company' => 'GlobeSpac',
                'icon_text' => 'M',
                'icon_theme' => 'blue',
                'job_type' => 'In-Office',
                'badge_theme' => 'green',
                'location' => 'Muscat, Oman',
                'experience' => '0 Years',
                'short_description' => 'Develop and implement marketing campaigns to increase bookings and promote the property. Suitable for candidates interested in branding and customer engagement.',
                'full_description' => 'This role is focused on marketing campaigns, customer engagement, branding activities and business growth support.',
                'sort_order' => 1,
                'status' => 1,
            ],
            [
                'title' => 'Marketing & Sales Intern - HikVision',
                'company' => 'HikVision',
                'icon_text' => 'H',
                'icon_theme' => 'cyan',
                'job_type' => 'In-Office',
                'badge_theme' => 'green',
                'location' => 'Muscat, Oman',
                'experience' => 'Freshers / Experienced',
                'short_description' => 'Sales internship role focused on managing business partners, driving revenue growth, customer satisfaction and business targets.',
                'full_description' => 'The candidate will support sales activities, customer handling, partner coordination and revenue growth.',
                'sort_order' => 2,
                'status' => 1,
            ],
            [
                'title' => 'Marketing & Sales - Nature Republic',
                'company' => 'Nature Republic',
                'icon_text' => 'N',
                'icon_theme' => 'pink',
                'job_type' => 'In-Office',
                'badge_theme' => 'green',
                'location' => 'Seeb, Oman',
                'experience' => '0 Years',
                'short_description' => 'Marketing campaign role for branding, customer engagement and promotional growth.',
                'full_description' => 'The role includes campaign support, promotion planning, branding work and customer engagement.',
                'sort_order' => 3,
                'status' => 1,
            ],
            [
                'title' => 'Sales & Marketing Intern - Handset Retail',
                'company' => 'Handset Retail',
                'icon_text' => 'R',
                'icon_theme' => 'blue',
                'job_type' => 'Hybrid',
                'badge_theme' => 'yellow',
                'location' => 'Seeb, Oman',
                'experience' => 'Freshers / Experienced',
                'short_description' => 'Manage business partners, drive revenue growth, ensure customer satisfaction and meet business targets.',
                'full_description' => 'This role includes sales support, partner management, revenue tracking and customer satisfaction activities.',
                'sort_order' => 4,
                'status' => 1,
            ],
            [
                'title' => 'Marketing Intern',
                'company' => null,
                'icon_text' => 'M',
                'icon_theme' => 'blue',
                'job_type' => 'In-Office',
                'badge_theme' => 'green',
                'location' => 'Seeb, Oman',
                'experience' => '0 Years',
                'short_description' => 'Develop marketing campaigns, support promotions and assist with customer engagement activities.',
                'full_description' => 'The candidate will assist the marketing team with campaigns, promotions and customer engagement work.',
                'sort_order' => 5,
                'status' => 1,
            ],
            [
                'title' => 'Front Desk Receptionist',
                'company' => null,
                'icon_text' => 'F',
                'icon_theme' => 'purple',
                'job_type' => 'In-Office',
                'badge_theme' => 'green',
                'location' => 'Seeb, Oman',
                'experience' => 'Communication Skills',
                'short_description' => 'Be the face of the property, welcome guests, manage reservations, check-ins and customer inquiries.',
                'full_description' => 'This role includes front desk handling, guest welcome, check-in support, reservations and customer inquiries.',
                'sort_order' => 6,
                'status' => 1,
            ],
            [
                'title' => 'Sales Intern',
                'company' => null,
                'icon_text' => 'S',
                'icon_theme' => 'orange',
                'job_type' => 'Hybrid',
                'badge_theme' => 'yellow',
                'location' => 'Seeb, Oman',
                'experience' => 'Freshers',
                'short_description' => 'Support sales operations, business partner handling, revenue growth and customer satisfaction.',
                'full_description' => 'The candidate will support daily sales operations, follow-ups, partner handling and customer communication.',
                'sort_order' => 7,
                'status' => 1,
            ],
            [
                'title' => 'Jr. Event Coordinator',
                'company' => null,
                'icon_text' => 'E',
                'icon_theme' => 'emerald',
                'job_type' => 'In-Office',
                'badge_theme' => 'green',
                'location' => 'Muscat, Oman',
                'experience' => '0 Years',
                'short_description' => 'Plan and execute corporate and social events. Suitable for creative candidates with strong organization skills.',
                'full_description' => 'This role includes event planning, coordination, vendor follow-up, execution support and client communication.',
                'sort_order' => 8,
                'status' => 1,
            ],
        ];

        foreach ($jobs as $job) {
            JobPosition::updateOrCreate(
                [
                    'title' => $job['title'],
                ],
                $job
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Hiring Process Steps
        |--------------------------------------------------------------------------
        */

        $steps = [
            [
                'icon_text' => '1',
                'title' => 'Choose Role',
                'description' => 'Select an open position matching your skill and location preference.',
                'theme' => 'blue',
                'sort_order' => 1,
                'status' => 1,
            ],
            [
                'icon_text' => '2',
                'title' => 'Submit Application',
                'description' => 'Fill the form with your contact details and profile summary.',
                'theme' => 'blue',
                'sort_order' => 2,
                'status' => 1,
            ],
            [
                'icon_text' => '3',
                'title' => 'HR Review',
                'description' => 'Shortlisted candidates may be contacted for discussion or interview.',
                'theme' => 'cyan',
                'sort_order' => 3,
                'status' => 1,
            ],
        ];

        foreach ($steps as $step) {
            HiringProcessStep::updateOrCreate(
                [
                    'title' => $step['title'],
                ],
                $step
            );
        }
    }
}