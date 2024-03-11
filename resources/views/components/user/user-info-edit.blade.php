<div class="flex flex-col items-center">
    <h3 class="text-2xl text-center">Update User Info</h3>
    <form method="POST" action="{{ route('user_info.update') }}" class="flex flex-col items-center text-center">
        @csrf
        @method('PUT')

        <label for="country">Country</label>
        <input type="text" value="{{ $user->userInfo->country }}" required name="country" id="country"
            class="bg-gray-600">
        @error('country')
            <p>{{ $message }}</p>
        @enderror

        <label for="state">State</label>
        <input type="text" value="{{ $user->userInfo->state }}" required name="state" id="state"
            class="bg-gray-600">
        @error('state')
            <p>{{ $message }}</p>
        @enderror

        <label for="city">City</label>
        <input type="text" value="{{ $user->userInfo->city }}" required name="city" id="city"
            class="bg-gray-600">
        @error('city')
            <p>{{ $message }}</p>
        @enderror


        <label for="address">Address</label>
        <input type="text" value="{{ $user->userInfo->address }}" required name="address" id="address"
            class="bg-gray-600">
        @error('address')
            <p>{{ $message }}</p>
        @enderror


        <label for="house_num">House Number</label>
        <input type="int" required value="{{ $user->userInfo->house_num }}" name="house_num" id="house_num"
            class="bg-gray-600">
        @error('house_num')
            <p>{{ $message }}</p>
        @enderror

        <button type="submit" class="mt-4 btn-2 w-full">
            Update Info
        </button>
    </form>

</div>
