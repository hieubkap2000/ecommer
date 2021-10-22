<div id="brand_carouse" class="ptb_50 text-center">
    <div class="type-01">
        <div class="row">
            <div class="col-sm-12">
                <div class="brand owl-carousel ptb_20">
                    @foreach ($brands as $item)
                        <div class="item text-center">
                            <img src="{{ $item->logo }}" alt="{{ $item->brand_name }}" class="img-brand img-responsive" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
