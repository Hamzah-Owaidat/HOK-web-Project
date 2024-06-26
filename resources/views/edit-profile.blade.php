@extends('master')

@section('title', 'Edit Profile Page')

@section('content')
<div class="flex justify-center items-center py-6">
    <form action="{{ route('update.profile' , ['userId' => $user->id]) }}"  method="POST" enctype="multipart/form-data" class="w-4/12">
        @csrf

        {{-- Profile image --}}
        <div>
            <label for="profile_image" class="block mb-2 text-sm md:text-lg text-gray-600 dark:text-gray-200">{{ __("customLang.Profile image") }}</label>
            <div class="profile-image mx-auto" style="background-image: url('{{ asset('images/profile-images/' . $user->profile_image) }}');
                                                background-repeat: no-repeat;
                                                background-position: center;
                                                background-size: cover;
                                                height: 200px;
                                                width: 200px;
                                                border-radius: 10%;"></div>

            <input type="file" id="profile_image_input" class="py-5" name="profile_image" hidden>

            <input type="hidden" id="deleteProfileImageInput" name="delete_profile_image" value="false">


            <div class="flex justify-around items-center ">
                <button type="button" class="lebify-btn-custom-9 my-4 bg-blue-500" id="editImageButton">
                    <svg class="svg" viewBox="0 0 512 512">
                    <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z">
                    </path>
                    </svg>
                    {{ __("customLang.Edit") }}
                </button>


                <button type="button" class="button bg-blue-500" id="deleteBtn">
                    <span class="button__text">{{ __("customLang.Delete") }}</span>
                    <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="512" viewBox="0 0 512 512" height="512" class="svg"><title></title><path style="fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;stroke-width:25px" d="M112,112l20,320c.95,18.49,14.4,32,32,32H348c17.67,0,30.87-13.51,32-32l20-320"></path><line y2="112" y1="112" x2="432" x1="80" style="stroke:#ffffff;stroke-linecap:round;stroke-miterlimit:10;stroke-width:25px"></line><path style="fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;stroke-width:25px" d="M192,112V72h0a23.93,23.93,0,0,1,24-24h80a23.93,23.93,0,0,1,24,24h0v40"></path><line y2="400" y1="176" x2="256" x1="256" style="fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;stroke-width:25px"></line><line y2="400" y1="176" x2="192" x1="184" style="fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;stroke-width:25px"></line><line y2="400" y1="176" x2="320" x1="328" style="fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;stroke-width:25px"></line></svg></span>
                </button>

            </div>

            @error('profile_image')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        {{-- Username --}}
        <div class="mt-6">
            <label for="username"
                class="block mb-2 text-sm md:text-lg text-gray-600 dark:text-gray-200">{{ __('customLang.Username') }}</label>
            <input type="text" name="username" id="username" value="{{ $user->username }}"
                class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
            @error('username')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        {{-- Bio --}}
        <div class="mt-6">
            <label for="bio" class="block mb-2 text-sm md:text-lg text-gray-600 dark:text-gray-200">{{ __("customLang.Bio") }}</label>
            <textarea type="text" name="bio" id="bio"
                class="block w-full px-4 py-2 mt-2 text-gray-700  bg-white border border-gray-200 rounded-lg  dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700">{{ $user->bio }}</textarea>
            @error('bio')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-6 flex justify-center items-center gap-10">
            <button type="submit" class="button bg-blue-500">
                <span class="button__text">{{ __("customLang.Submit") }}</span>
                <span class="button__icon"><svg fill="currentColor" viewBox="0 0 24 24" class="icon">
                    <path clip-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm4.28 10.28a.75.75 0 000-1.06l-3-3a.75.75 0 10-1.06 1.06l1.72 1.72H8.25a.75.75 0 000 1.5h5.69l-1.72 1.72a.75.75 0 101.06 1.06l3-3z" fill-rule="evenodd"></path>
                  </svg>
                </span>
            </button>

        </div>
    </form>
</div>


<script src="{{ asset('js/profile_image.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $('#profile_image_input').change(function () {
        var input = this;
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.profile-image').css('background-image', 'url(' + e.target.result + ')');
        }
        reader.readAsDataURL(input.files[0]);
    });

    // Use event delegation for dynamically created button
    $(document).on('click', '#deleteBtn', function () {
        // Reset the file input field
        $('#profile_image_input').val('');

        // Set a hidden input field value to indicate profile image deletion
        $('#deleteProfileImageInput').val('true');

        // Change the profile image to the default one
        $('.profile-image').css('background-image', 'url(/images/profile-images/blank_profile.png)');
    });
});
</script>
@endsection


