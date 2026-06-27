<?php

use App\Models\Setting;
use Illuminate\Support\Str;
use Livewire\Component;

new class extends Component
{
    public ?string $aboutTitle = null;
    public ?string $aboutContent = null;
    public ?string $aboutImage = null;
    public ?string $establishedYear = null;

    public function mount(): void
    {
        $this->aboutTitle = Setting::get('about_title', 'Discover Our Essence');
        $this->aboutContent = Str::limit(
            strip_tags(Setting::get('about_content', 'At Latocross Artelier, we are passionate art enthusiasts dedicated to connecting artists and collectors through dynamic and exciting auctions.')),
            600
        );
        $this->aboutImage = Setting::get('about_image');
        $this->establishedYear = Setting::get('established_year', '2020');
    }
};
?>

<div class="about-section-wrapper">
    <!-- Home2 About Section Start -->
    <div class="home2-about- py-16 md:py-15" style="background: linear-gradient(180deg, #FFFFFF 0%, #faf0f5 100%);">
        <div class="container mx-auto px-4">
            <div class="about-wrapper max-w-7xl mx-auto">
                <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                    <!-- Image Column -->
                    <div class="relative">
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                            <div class="absolute inset-0" style="background: linear-gradient(135deg, rgba(219, 32, 119, 0.2), rgba(255, 107, 157, 0.2));"></div>
                            <img
                                src="{{ $aboutImage ? asset('storage/' . $aboutImage) : asset('assets/img/home2/home2-about-img.jpg') }}"
                                alt="{{ $aboutTitle }}"
                                class="w-full h-auto object-cover hover:scale-105 transition-transform duration-700"
                                loading="lazy"
                            >
                            <div class="absolute bottom-0 left-0 right-0 p-6" style="background: linear-gradient(180deg, transparent, rgba(26, 10, 15, 0.8));">
                                <p class="text-white text-sm font-medium" style="font-family: 'Georgia', serif;">Celebrating African Artistry Since {{ $establishedYear }}</p>
                            </div>
                        </div>
                        <!-- Decorative Elements -->
                        <div class="absolute -top-4 -right-4 w-24 h-24 rounded-full opacity-50 -z-10" style="background: linear-gradient(135deg, #fce4ec, #f5d6e0);"></div>
                        <div class="absolute -bottom-4 -left-4 w-32 h-32 rounded-full opacity-50 -z-10" style="background: linear-gradient(135deg, #fce4ec, #f5d6e0);"></div>
                    </div>

                    <!-- Content Column -->
                    <div class="about-content space-y-6">
                        <div>
                            <span class="inline-block font-semibold text-sm uppercase tracking-wider px-4 py-1.5 rounded-full" style="color: #DB2077; background: #fce4ec;">
                                About Latocross Artelier
                            </span>
                            <h3 class="text-3xl md:text-4xl font-bold mt-4" style="color: #1a0a0f; font-family: 'Georgia', serif;">
                                {{ $aboutTitle }}
                            </h3>
                        </div>
                        
                        <p class="text-gray-700 leading-relaxed" style="color: #2d1b24;">
                            {{ $aboutContent }}
                        </p>
                        
                        <div class="feature-list-and-btn-area space-y-6">
                            <ul class="grid grid-cols-2 gap-3">
                                <li class="flex items-center gap-2 text-sm font-medium" style="color: #2d1b24;">
                                    <svg class="w-5 h-5 flex-shrink-0" style="color: #DB2077;" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                    Integrity
                                </li>
                                <li class="flex items-center gap-2 text-sm font-medium" style="color: #2d1b24;">
                                    <svg class="w-5 h-5 flex-shrink-0" style="color: #DB2077;" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                    Diversity
                                </li>
                                <li class="flex items-center gap-2 text-sm font-medium" style="color: #2d1b24;">
                                    <svg class="w-5 h-5 flex-shrink-0" style="color: #DB2077;" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                    Accessibility
                                </li>
                                <li class="flex items-center gap-2 text-sm font-medium" style="color: #2d1b24;">
                                    <svg class="w-5 h-5 flex-shrink-0" style="color: #DB2077;" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                    Support
                                </li>
                            </ul>
                            <a href="{{ route('about') }}" 
                               class="group inline-flex items-center gap-3 px-6 py-3 rounded-xl font-semibold transition-all duration-300 hover:shadow-lg hover:scale-105"
                               style="background: linear-gradient(135deg, #DB2077, #ff6b9d); color: white;">
                                <span>Learn More About Us</span>
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Stats Counter Section -->
                <div class="countdown-wrap mt-16 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="single-countdown bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-2xl transition-all duration-300" style="border-bottom: 4px solid #DB2077;">
                        <div class="number flex items-center justify-center gap-1">
                            <h3 class="text-4xl font-bold" style="color: #DB2077;">65</h3>
                            <strong class="text-2xl" style="color: #DB2077;">k</strong>
                        </div>
                        <span class="text-sm font-medium" style="color: #6b3b4f;">Happy Clients</span>
                    </div>
                    <div class="single-countdown bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-2xl transition-all duration-300" style="border-bottom: 4px solid #ff6b9d;">
                        <div class="number flex items-center justify-center gap-1">
                            <h3 class="text-4xl font-bold" style="color: #ff6b9d;">1.5</h3>
                            <strong class="text-2xl" style="color: #ff6b9d;">k</strong>
                        </div>
                        <span class="text-sm font-medium" style="color: #6b3b4f;">Artworks &amp; Designs</span>
                    </div>
                    <div class="single-countdown bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-2xl transition-all duration-300" style="border-bottom: 4px solid #ff9ec4;">
                        <div class="number">
                            <h3 class="text-4xl font-bold" style="color: #ff9ec4;">350</h3>
                        </div>
                        <span class="text-sm font-medium" style="color: #6b3b4f;">Artists &amp; Designers</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Home2 About Section End -->
</div>