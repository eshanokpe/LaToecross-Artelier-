<?php

use App\Models\Setting;
use Illuminate\Support\Str;
use Livewire\Component;

new class extends Component
{
    public ?string $aboutTitle = null;
    public ?string $mission = null;
    public ?string $vision = null;
    public ?string $whatMakesSpecial = null;
    public ?string $whatMakesSpecialImage = null;

    public function mount(): void
    {
        

        $this->aboutTitle = Setting::get('about_title');
        $this->vision = Setting::get('vision');
        $this->mission = Setting::get('mission');
        $this->whatMakesSpecial = Setting::get('what_makes_special');
        $this->whatMakesSpecialImage = Setting::get('what_makes_special_image');
    }

    
};
?>


<div>
    <!-- Behiend us Section strats  -->
    <div class="behiend-us-section mb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-60">
                    <div class="behiend-us-section-title">
                        <h3>The Story Behind Us</h3>
                        <p>A group of passionate art collectors and tech innovators, the company set out to make art
                        auctions more accessible, transparent, and global.</p>
                    </div>
                </div>
            </div>
            <div class="row gy-5">
                <div class="col-lg-6">
                    <div class="behiend-us-section-card">
                        <h5>The Vision </h5>
                        <p>{{ $vision}}</p>
                    </div>
                </div>
                <div class="col-lg-6 mb-80 d-flex justify-content-lg-end">
                    <div class="behiend-us-section-card style-2">
                        <svg class="arrow-1" width="133" height="12" viewBox="0 0 133 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M133 6L123 0.226497L123 11.7735L133 6ZM1 5C0.447708 5 -1.75552e-08 5.44772 0 6C1.75552e-08 6.55229 0.447708 7 1 7L1 5ZM127.176 5L123.294 5L123.294 7L127.176 7L127.176 5ZM119.412 5L115.529 5L115.529 7L119.412 7L119.412 5ZM111.647 5L107.765 5L107.765 7L111.647 7L111.647 5ZM103.882 5L100 5L100 7L103.882 7L103.882 5ZM96.1176 5L92.2353 5L92.2353 7L96.1176 7L96.1176 5ZM88.3529 5L84.4706 5L84.4706 7L88.3529 7L88.3529 5ZM80.5882 5L76.7059 5L76.7059 7L80.5882 7L80.5882 5ZM72.8235 5L68.9412 5L68.9412 7L72.8235 7L72.8235 5ZM65.0588 5L61.1765 5L61.1765 7L65.0588 7L65.0588 5ZM57.2941 5L53.4117 5L53.4117 7L57.2941 7L57.2941 5ZM49.5294 5L45.647 5L45.647 7L49.5294 7L49.5294 5ZM41.7647 5L37.8823 5L37.8823 7L41.7647 7L41.7647 5ZM34 5L30.1176 5L30.1176 7L34 7L34 5ZM26.2353 5L22.3529 5L22.3529 7L26.2353 7L26.2353 5ZM18.4706 5L14.5882 5L14.5882 7L18.4706 7L18.4706 5ZM10.7058 5L6.82349 5L6.82349 7L10.7058 7L10.7058 5ZM2.94113 5L1 5L1 7L2.94113 7L2.94113 5ZM133 6L123 0.226497L123 11.7735L133 6ZM1 5C0.447708 5 -1.75552e-08 5.44772 0 6C1.75552e-08 6.55229 0.447708 7 1 7L1 5ZM127.176 5L123.294 5L123.294 7L127.176 7L127.176 5ZM119.412 5L115.529 5L115.529 7L119.412 7L119.412 5ZM111.647 5L107.765 5L107.765 7L111.647 7L111.647 5ZM103.882 5L100 5L100 7L103.882 7L103.882 5ZM96.1176 5L92.2353 5L92.2353 7L96.1176 7L96.1176 5ZM88.3529 5L84.4706 5L84.4706 7L88.3529 7L88.3529 5ZM80.5882 5L76.7059 5L76.7059 7L80.5882 7L80.5882 5ZM72.8235 5L68.9412 5L68.9412 7L72.8235 7L72.8235 5ZM65.0588 5L61.1765 5L61.1765 7L65.0588 7L65.0588 5ZM57.2941 5L53.4117 5L53.4117 7L57.2941 7L57.2941 5ZM49.5294 5L45.647 5L45.647 7L49.5294 7L49.5294 5ZM41.7647 5L37.8823 5L37.8823 7L41.7647 7L41.7647 5ZM34 5L30.1176 5L30.1176 7L34 7L34 5ZM26.2353 5L22.3529 5L22.3529 7L26.2353 7L26.2353 5ZM18.4706 5L14.5882 5L14.5882 7L18.4706 7L18.4706 5ZM10.7058 5L6.82349 5L6.82349 7L10.7058 7L10.7058 5ZM2.94113 5L1 5L1 7L2.94113 7L2.94113 5Z" fill="#595959"/>
                        </svg>
                        <h5>Mission</h5>
                        <p>{{ $mission }}</p>
                        <svg class="arrow-2" width="12" height="91" viewBox="0 0 12 91" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 91L11.7735 81L0.226497 81L6 91ZM7 1C7 0.447716 6.55229 6.58594e-09 6 0C5.44772 -6.58594e-09 5 0.447716 5 1L7 1ZM7 84.8636L7 80.7727L5 80.7727L5 84.8636L7 84.8636ZM7 76.6818L7 72.5909L5 72.5909L5 76.6818L7 76.6818ZM7 68.5L7 64.4091L5 64.4091L5 68.5L7 68.5ZM7 60.3182L7 56.2273L5 56.2273L5 60.3182L7 60.3182ZM7 52.1364L7 48.0455L5 48.0455L5 52.1364L7 52.1364ZM7 43.9546L7 39.8636L5 39.8636L5 43.9546L7 43.9546ZM7 35.7727L7 31.6818L5 31.6818L5 35.7727L7 35.7727ZM7 27.5909L7 23.5L5 23.5L5 27.5909L7 27.5909ZM7 19.4091L7 15.3182L5 15.3182L5 19.4091L7 19.4091ZM7 11.2273L7 7.13636L5 7.13636L5 11.2273L7 11.2273ZM7 3.04545L7 1L5 1L5 3.04545L7 3.04545ZM6 91L11.7735 81L0.226497 81L6 91ZM7 1C7 0.447716 6.55229 6.58594e-09 6 0C5.44772 -6.58594e-09 5 0.447716 5 1L7 1ZM7 84.8636L7 80.7727L5 80.7727L5 84.8636L7 84.8636ZM7 76.6818L7 72.5909L5 72.5909L5 76.6818L7 76.6818ZM7 68.5L7 64.4091L5 64.4091L5 68.5L7 68.5ZM7 60.3182L7 56.2273L5 56.2273L5 60.3182L7 60.3182ZM7 52.1364L7 48.0455L5 48.0455L5 52.1364L7 52.1364ZM7 43.9546L7 39.8636L5 39.8636L5 43.9546L7 43.9546ZM7 35.7727L7 31.6818L5 31.6818L5 35.7727L7 35.7727ZM7 27.5909L7 23.5L5 23.5L5 27.5909L7 27.5909ZM7 19.4091L7 15.3182L5 15.3182L5 19.4091L7 19.4091ZM7 11.2273L7 7.13636L5 7.13636L5 11.2273L7 11.2273ZM7 3.04545L7 1L5 1L5 3.04545L7 3.04545Z" fill="#595959"/>
                        </svg>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <!-- Behiend us Section ends  -->

    <!-- Feature Section Start -->
    <div class="home1-feature-section mb-120 ">
        <div class="container">
            <div class="row gy-lg-0 gy-5 justify-content-between">
                <div class="col-xl-6 col-lg-7 d-flex align-items-lg-end wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="feature-content">
                        <div class="section-title">
                            <h3>What Makes Us Special</h3>
                            <p>{!! $whatMakesSpecial !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 position-relative wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="feature-img">
                        <img
                            src="{{ $whatMakesSpecialImage ? asset('storage/' . $whatMakesSpecialImage) : asset('assets/img/placeholder.jpg') }}"
                            alt="{{ $aboutTitle }}"
                            loading="lazy">
                        <img src="{{ asset($whatMakesSpecialImage) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature Section End -->
</div>