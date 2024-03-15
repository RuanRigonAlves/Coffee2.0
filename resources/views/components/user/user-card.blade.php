@if (session('success'))
    <x-flash-messages.success />
@endif
<section class="flex justify-between h-full text-lg">
    <div class="flex justify-around">
        <div>
            <ul>
                <p>Profile info</p>
                <li>
                    Name: <span>{{ $user->name }}</span>
                </li>
                <li>
                    Email: <span>{{ $user->email }}</span>
                </li>
            </ul>

        </div>
    </div>

    <div>
        @if (!$user->has_address)
            <div class="mt-3">
                <a href="{{ route('user_info.index') }}" class="btn-2">Address Form</a>
            </div>
        @else
            <div>
                <ul>
                    <li>
                        Country: <span>{{ $user->userInfo->country }}</span>
                    </li>

                    <li>
                        State: <span>{{ $user->userInfo->state }}</span>
                    </li>
                    <li>
                        City: <span>{{ $user->userInfo->city }}</span>
                    </li>
                    <li>
                        Address: <span>{{ $user->userInfo->address }}</span>
                    </li>
                    <li>
                        House Number: <span>{{ $user->userInfo->house_num }}</span>
                    </li>
                </ul>

                <a href="{{ route('user_info.edit') }}" class=" btn-2">Edit Adress Form</a>
            </div>
        @endif
    </div>

    <div class="w-64">
        <div class="my-3">
            @if ($user->is_admin)
                <a href="{{ route('user_info.addProductPage') }}" class="btn-2">Add Product</a>
            @endif
        </div>
        </form>
    </div>

</section>
