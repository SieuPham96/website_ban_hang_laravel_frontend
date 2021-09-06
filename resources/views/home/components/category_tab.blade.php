<div class="category-tab">
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach($categories as $categoryIndex => $categoryItem)
                <li class="{{ $categoryIndex == 0 ? 'active' : '' }}">
                    <a href="#category_tab_{{ $categoryItem->id }}" data-toggle="tab">
                        {{ $categoryItem->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="tab-content">
        @foreach($categories as $categoryProductIndex => $categoryProductItem)
            <div class="tab-pane fade {{ $categoryProductIndex == 0 ? 'active in' : '' }}" id="category_tab_{{ $categoryProductItem->id }}">
                @foreach($categoryProductItem->products as $productItemTab)
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ config('app.base_url').$productItemTab->feature_image_path }}" alt="" />
                                    <h2>{{ number_format($productItemTab->price) }} VND</h2>
                                    <p>{{ $productItemTab->name }}</p>
                                    <a href="#"
                                    data-url="{{ route('addToCart', ['id' => $productItemTab->id]) }}"
                                        class="btn btn-default add-to-cart"
                                    >
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
