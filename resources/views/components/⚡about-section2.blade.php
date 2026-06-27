<?php

use App\Models\Setting;
use Illuminate\Support\Str;
use Livewire\Component;

new class extends Component
{
    public ?string $aboutTitle = null;
    public ?string $aboutContent = null;
    public ?string $fullContent = null;
    public ?string $aboutImage = null;
    public ?string $aboutImage2 = null;
    public bool $showFullContent = false; // Controls toggle state

    public function mount(): void
    {
        $this->aboutTitle   = Setting::get('about_title', 'Discover Our Essence');
        
        // Store full clean content
        $this->fullContent = strip_tags(
            Setting::get('about_content', 'At Artmart, we are passionate art enthusiasts dedicated to connecting artists and collectors through dynamic and exciting auctions.')
        );

        // Truncate content for initial view
        $this->aboutContent = Str::limit($this->fullContent, 500);

        $this->aboutImage = Setting::get('about_image');
        $this->aboutImage2 = Setting::get('about_image_2');
    }

    // Toggle between short and full content
    public function toggleContent(): void
    {
        $this->showFullContent = !$this->showFullContent;
    }
};
?>

<div>
    <!-- discover section starts -->
    <div class="discover-section mb-120">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="discover-content">
                        <h3 style="font-size: 30px;">{{ $aboutTitle }}</h3>

                        <!-- Show either truncated or full content -->
                        <p>
                            @if ($showFullContent)
                                {{ $fullContent }}
                            @else
                                {{ $aboutContent }}
                            @endif
                        </p>

                        <!-- Show toggle button only if content is longer than limit -->
                        @if (strlen($this->fullContent) > 500)
                            <button 
                                wire:click="toggleContent" 
                                class="read-more-btn mt-2"
                                type="button"
                            >
                                {{ $showFullContent ? 'Show Less' : 'Read More' }}
                            </button>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6 wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="discover-section-image">
                        <div class="row g-2">
                            <div class="col-lg-6">
                                <img
                                    src="{{ $aboutImage ? asset('storage/' . $aboutImage) : asset('assets/img/placeholder.jpg') }}"
                                    alt="{{ $aboutTitle }}"
                                    loading="lazy">
                            </div>
                            <div class="col-lg-6">
                                <img
                                    src="{{ $aboutImage2 ? asset('storage/' . $aboutImage2) : asset('assets/img/placeholder.jpg') }}"
                                    alt="{{ $aboutTitle }}"
                                    loading="lazy">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- discover section ends -->

    <!-- Add simple styling for the button -->
    <style>
        .read-more-btn {
            background: none;
            border: none;
            color: #ff6b6b;
            font-weight: 600;
            padding: 0;
            cursor: pointer;
            text-decoration: underline;
            transition: color 0.2s;
        }
        .read-more-btn:hover {
            color: #e64a4a;
        }
    </style>
</div>