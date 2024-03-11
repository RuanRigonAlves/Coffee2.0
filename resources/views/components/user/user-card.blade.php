@if (session('success'))
    <x-flash-messages.success />
@endif
<section class="flex justify-around">

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


    @if (!$user->has_address)
        <div>
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
</section>
