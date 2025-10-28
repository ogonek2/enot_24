<div class="categories-box-items-include-container">
    <div class="block-elements-ct">
        <div class="title-block">
            <h1>Хімчистка</h1>
        </div>
        <div class="items-elemenets-categories">
            @foreach ($content->where('category_type', 1) as $item)
                <a href="{{ route('posluga_category', $item->id) }}">
                    <div class="item-box-content">
                        <div class="header-block">
                            <div class="category-banner">
                                <img src="{{ asset('storage/' . $item->catyegory_img) }}" alt="{{ $item->category }}">
                            </div>
                            <div class="category-name">
                                {{ $item->category }}
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <div class="block-elements-ct">
        <div class="title-block">
            <h1>Ремонт та реставрація</h1>
        </div>
        <div class="items-elemenets-categories">
            @foreach ($content->where('category_type', 2) as $item)
                <a href="{{ route('posluga_category', $item->id) }}">
                    <div class="item-box-content">
                        <div class="header-block">
                            <div class="category-banner">
                                <img src="{{ asset('storage/' . $item->catyegory_img) }}" alt="{{ $item->category }}">
                            </div>
                            <div class="category-name">
                                {{ $item->category }}
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>