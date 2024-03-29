<div class="flex flex-col items-center p-4 text-lg">
    <div class="border-2 rounded-lg border-amber-500 w-fit p-6">
        <form method="POST" action="{{ route('register.store') }}" class="flex flex-col gap-6 items-center">
            @csrf

            <div>
                <label for="name" class="block text-center">Name</label>
                <input type="text" name="name" id="name" class="bg-gray-600" value="{{ old('name') }}">
            </div>
            @error('name')
                <div>
                    <span>{{ $message }}</span>
                </div>
            @enderror

            <div>
                <label for="email" class="block text-center">Email</label>
                <input type="email" name="email" id="email"class="bg-gray-600" value="{{ old('email') }}">
            </div>
            @error('email')
                <div>
                    <span>{{ $message }}</span>
                </div>
            @enderror

            <div>
                <label for="password" class="block text-center">Password</label>
                <input type="password" name="password" id="password"class="bg-gray-600">
            </div>
            @error('password')
                <div>
                    <span>{{ $message }}</span>
                </div>
            @enderror

            <div>
                <label for="confirm_password" class="block text-center">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password"class="bg-gray-600">
            </div>
            @error('confirm_password')
                <div>
                    <span>{{ $message }}</span>
                </div>
            @enderror

            <div class="text-center">
                <h2>Register as</h2>

                <div class="flex gap-5">
                    <div>
                        <input type="radio" name="is_admin" id="is_user" value="0" required>
                        <label for="is_user">User</label>
                    </div>

                    <div>
                        <input type="radio" name="is_admin" id="is_admin" value="1" required>
                        <label for="is_admin">Admin</label>
                    </div>
                </div>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="btn-2 px-14">Register</button>
            </div>
        </form>
    </div>
</div>
