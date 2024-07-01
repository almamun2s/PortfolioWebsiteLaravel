<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Home>
 */
class HomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hi' => 'Hello',
            'name' => 'Abdullah Almamun',
            'title' => 'Laravel Developer',
            'description' => "Web Design and Web Development are my meditation. My goal is to make Satisfy my every clients with error free and all the requirments of them. You'll get the best service and On-time Delivery from me.",
            'welcome_title' => 'Welcome to my website',
            'welcome_description' => 'I am passionate about making an error-free website that will be faster to load, more beautiful to visit, easier to use, accessible to all, and frustration-free and fully responsive.\r\n\r\nI am ensuring you that you will get a website from me in which you can manage your content easily by WordPress without knowing any type of coding knowledge. And that will be unique including your requirements so that you can find success online faster.',
            'quality_icon' => 'fas fa-pen-to-square',
            'quality_text' => 'Friendly coding and design professionally increase website speed. Only an experienced person can make sure of this.',
            'performance_icon' => 'fas fa-hand-back-fist',
            'performance_text' => 'I use HTML, CSS, and JavaScript to produce responsive websites that provide users with the best experience suited to their devices.',
            'support_icon' => 'fas fa-hands-helping',
            'support_text' => 'Get a lifetime working relationship and support with full instructions from me.',
            'service_title' => 'See what I do',
            'process_title' => 'Find out how I work',
            'portfolio_title' => 'Visit my previous works',
            'about_details' => 'I design and develop web applications for clients of all sizes, focusing on creating robust, scalable, and efficient solutions. Specializing in Laravel, I craft stylish, modern websites, comprehensive web services, and dynamic online stores. My passion lies in coding seamless user experiences through clean, maintainable code and meaningful interactions, ensuring each project not only meets but exceeds client expectations',
            'about_image' => '1803023388582815_400.png',
        ];
    }
}
