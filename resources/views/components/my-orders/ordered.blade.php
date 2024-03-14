<div class="overflow-auto h-90 mt-1 pr-1">
    @foreach ($products as $product)
        <div class="flex p-2 mb-4 border border-stone-700 rounded-xl">
            <div>
                <img src="{{ $product->product_image }}" class="w-64">
            </div>

            <div class="ml-2 flex flex-col gap-4">
                <p> {{ $product->name }}</p>

                <p>
                    is illum possimus vel tenetur illo perspiciatis sint rerum, eligendi sunt architecto veniam
                    recusandae delectus rem, tempore corrupti.
                </p>
            </div>

        </div>
    @endforeach
</div>
