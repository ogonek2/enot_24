<div class="header-block-blade header-block-page">
    <div class="header-container">
        <div class="back-banner-block">
            <img src="{{ asset('storage/src/banner_img/1862199947357d445819704e18d3241d-min(1).png') }}"
                alt="ЄНОТ-24 Хімчистка">
        </div>
        <div class="header-content">
            <div class="content">
                <div class="block">
                    <div class="box">
                        <div class="title">
                            <h1 style="font-size: 40px">{{ $content }}</h1>
                            @if (!empty($paragraph))
                                <p style="font-size: 16px; max-width: 600px; padding: 25px 0">{{ $paragraph }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
