<?php

use App\Models\Artwork;
use Livewire\Component;
use Livewire\Attributes\Url;

new class extends Component
{
    public $artworks;
    
    #[Url(as: 'category')]
    public $selectedCategory = 'all';

    public $categories = [
        'all' => 'All Artworks',
        'abstract' => 'Abstract Painting',
        'landscape' => 'Landscape Painting',
        'mixed_media' => 'Mixed Media Painting',
        'figure' => 'Figure Painting',
        'miniature' => 'Miniature',
    ];

    public function mount(): void
    {
        $this->loadArtworks();
    }

    public function loadArtworks(): void
    {
        $query = Artwork::query()->latest();

        if ($this->selectedCategory !== 'all') {
            $query->where('style', $this->selectedCategory);
        }

        $this->artworks = $query->get();
        $this->dispatch('artworks-updated');
    }

    public function filterByCategory($category): void
    {
        $this->selectedCategory = $category;
        $this->loadArtworks();
    }
};
?>

<div class="art-section-wrapper">
    <div class="home1-general-art-slider-section py-16 md:py-20" style="background: #FFFFFF;">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <!-- Section Header -->
                <div class="flex flex-wrap items-center justify-between gap-4 mb-10">
                    <div class="section-title">
                        <span class="inline-block font-semibold text-sm uppercase tracking-wider px-4 py-1.5 rounded-full" style="color: #DB2077; background: #fce4ec;">
                            Featured Collection
                        </span>
                        <h3 class="text-3xl md:text-4xl font-bold mt-3" style="color: #1a0a0f; font-family: 'Georgia', serif;">
                            General Artwork
                        </h3>
                        <p class="text-gray-600 mt-2 max-w-xl" style="color: #6b3b4f;">
                            Explore a curated collection of original artworks and fashion pieces, handpicked for the discerning collector.
                        </p>
                    </div>
                    <a href="{{ route('artworks.index') }}" 
                       class="group inline-flex items-center gap-2 px-6 py-2.5 rounded-full font-medium transition-all duration-300 hover:shadow-lg"
                       style="color: #DB2077; background: #fce4ec;">
                        <span>View All</span>
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>

                <!-- Category Filter Tabs -->
                <div class="category-filter-tabs mb-8 overflow-x-auto">
                    <ul class="flex gap-2 flex-nowrap md:flex-wrap justify-center">
                        @foreach ($categories as $key => $label)
                            <li class="flex-shrink-0">
                                <button 
                                    wire:click="filterByCategory('{{ $key }}')"
                                    class="nav-link px-4 py-2.5 rounded-full font-medium transition-all duration-300 whitespace-nowrap"
                                    style="{{ $selectedCategory === $key 
                                        ? 'background: linear-gradient(135deg, #DB2077, #ff6b9d); color: white; box-shadow: 0 4px 15px rgba(219, 32, 119, 0.3);' 
                                        : 'background: #faf0f5; color: #6b3b4f;' }}"
                                    type="button"
                                    wire:loading.attr="disabled">
                                    {{ $label }}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Artwork Slider -->
                <div class="general-art-slider-wrap relative">
                    <div class="swiper home1-generat-art-slider" wire:key="artwork-slider-{{ $selectedCategory }}">
                        <div class="swiper-wrapper">
                            @forelse ($artworks as $artwork)
                                <div class="swiper-slide" wire:key="artwork-{{ $artwork->id }}">
                                    <div class="auction-card general-art bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden group">
                                        <div class="auction-card-img-wrap relative overflow-hidden">
                                            <a href="{{ route('artwork.show', $artwork) }}" class="card-img block">
                                                <img
                                                    src="{{ $artwork->image ? asset('storage/' . $artwork->image) : asset('assets/img/home1/general-art-img1.jpg') }}"
                                                    alt="{{ $artwork->title }}"
                                                    class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-700">
                                            </a>

                                            @unless ($artwork->is_for_sale)
                                                <div class="batch absolute top-4 left-4 z-10">
                                                    <span class="sold-out px-3 py-1 text-xs font-bold rounded-full" 
                                                          style="background: #1a0a0f; color: white; letter-spacing: 1px;">
                                                        Sold Out
                                                    </span>
                                                </div>
                                            @endunless

                                            <a href="#" class="wishlist absolute top-4 right-4 z-10 w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110" 
                                               style="background: rgba(255, 255, 255, 0.9);"
                                               wire:click.prevent="toggleWishlist({{ $artwork->id }})">
                                                <svg class="w-5 h-5" style="color: #DB2077;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                                </svg>
                                            </a>
                                        </div>

                                        <div class="auction-card-content p-2 space-y-3">
                                            <h6 class="text-lg font-bold line-clamp-1" style="color: #1a0a0f;">
                                                <a href="{{ route('artwork.show', $artwork) }}" class="hover:underline">
                                                    {{ $artwork->title }}
                                                </a>
                                            </h6>
                                            <ul class="space-y-1.5 text-sm">
                                                <li class="flex justify-between">
                                                    <span style="color: #6b3b4f;">Category :</span>
                                                    <span style="color: #1a0a0f; font-weight: 500;">
                                                        {{ $categories[$artwork->style] ?? $artwork->style }}
                                                    </span>
                                                </li>
                                                <li class="flex justify-between">
                                                    <span style="color: #6b3b4f;">Price :</span>
                                                    <span style="color: #1a0a0f; font-weight: 600;">
                                                        @if ($artwork->is_for_sale && $artwork->price)
                                                            ₦{{ number_format($artwork->price, 2) }}
                                                        @else
                                                            <span style="color: #6b3b4f;">Not for sale</span>
                                                        @endif
                                                    </span>
                                                </li>
                                            </ul>
                                            <a href="{{ route('artwork.show', $artwork) }}" 
                                               class="bid-btn block w-full text-center py-2.5 rounded-xl font-medium transition-all duration-300 hover:shadow-lg"
                                               style="background: linear-gradient(135deg, #DB2077, #ff6b9d); color: white;">
                                                <span>Read More</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="swiper-slide">
                                    <div class="text-center py-16 bg-gray-50 rounded-2xl">
                                        <svg class="w-16 h-16 mx-auto mb-4" style="color: #DB2077;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <p class="text-lg" style="color: #6b3b4f;">No artworks available in this category yet.</p>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Slider Navigation -->
                    <div class="slider-btn-grp flex justify-center gap-4 mt-8">
                        <button class="slider-btn generat-art-slider-prev w-12 h-12 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110" 
                                style="background: #fce4ec; color: #DB2077;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>
                        <button class="slider-btn generat-art-slider-next w-12 h-12 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110"
                                style="background: linear-gradient(135deg, #DB2077, #ff6b9d); color: white;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @script
    <script>
        let swiperInstance = null;

        function initSwiper() {
            if (swiperInstance) {
                swiperInstance.destroy(true, true);
            }

            setTimeout(() => {
                swiperInstance = new Swiper(".home1-generat-art-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    loop: false,
                    navigation: {
                        nextEl: ".generat-art-slider-next",
                        prevEl: ".generat-art-slider-prev",
                    },
                    breakpoints: {
                        280: { slidesPerView: 1, spaceBetween: 15 },
                        576: { slidesPerView: 2, spaceBetween: 15 },
                        768: { slidesPerView: 2, spaceBetween: 15 },
                        992: { slidesPerView: 3, spaceBetween: 20 },
                        1200: { slidesPerView: 4, spaceBetween: 24 },
                    },
                });
            }, 100);
        }

        initSwiper();

        $wire.on('artworks-updated', () => {
            initSwiper();
        });
    </script>
    @endscript

    <style>
        .category-filter-tabs .nav-link {
            border: 2px solid transparent;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .category-filter-tabs .nav-link:hover:not(.active) {
            border-color: #DB2077;
            transform: translateY(-2px);
        }

        .category-filter-tabs .nav-link[wire\:loading] {
            opacity: 0.6;
            pointer-events: none;
        }

        /* Mobile responsive */
        @media (max-width: 640px) {
            .category-filter-tabs ul {
                justify-content: flex-start;
            }
        }

        /* Custom scrollbar for filter tabs on mobile */
        .category-filter-tabs {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        .category-filter-tabs::-webkit-scrollbar {
            display: none;
        }
    </style>
</div>