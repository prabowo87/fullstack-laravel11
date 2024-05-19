<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information Detail') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your detail account's profile information .") }}
            <!-- <x-input-label class="mt-1 text-sm text-gray-600 dark:text-gray-400" :value="'Last Updated :'.$user->updated_at" /> -->
        </p>
    </header>

    @if($errors->any())
    {{ implode('', $errors->all()) }}
@endif
    <form method="post" name="form_profile_detail" action="{{ route('profile.detail.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        <div class="flex items-center" x-data="picturePreview('')">
            <div class="rounded-full bg-gray-200 mr-2 " style="width: 100px; height: 100px;">
                <template x-if="imageUrl">
                    <img :src="imageUrl" 
                        class="object-cover rounded-full border border-gray-200 " 
                        style="width: 100px; height: 100px;"
                    >
                </template>
                <!-- Show the gray box when image is not available -->
                <template x-if="!imageUrl">
                <div 
                    class="border rounded-full border-gray-200 bg-gray-200" 
                    style="width: 100px; height: 100px;"
                ></div>
                </template>
            </div>
            <div>
                <x-secondary-button @click="document.getElementById('photo').click()" class="relative">
                    <div class="flex items-center text-sm font-normal normal-case">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                        Upload Photo Profile
                    </div>
                    
                </x-secondary-button>
                <input x-on:change="fileChosen" type="file"  accept="image/*" name="photo" id="photo"
                        class="absolute inset-0 -z-10 opacity-0">
            </div>
            <script>
                function picturePreview(src = '') {
                    src = "{{$user->photo ? url('avatar'.'/'.$user->photo):''}}"
                    return {
                        imageUrl: src,

                        fileChosen(event) {
                            this.fileToDataUrl(event, src =>{
                                this.imageUrl = src
                            } )
                            
                        },

                        fileToDataUrl(event, callback) {
                            if (! event.target.files.length) return

                            let file = event.target.files[0],
                                reader = new FileReader()

                            reader.readAsDataURL(file)
                            console.log(file)
                            reader.onload = e =>{
                                // console.log(e.target.result);
                                callback(e.target.result);
                            } 
                            
                        },
                        
                    };
                    // console.log("this");
                    // console.log(imageUrl);
                }
            </script>
        </div>
        <div >
            <x-input-label for="birth_date" :value="__('Birth Date')" />
            <div
                x-data
                x-init="
                    flatpickr($refs.birth_date, {
                    altInput: true,
                    altFormat: 'Y-m-d',
                    dateFormat: 'Y-m-d'
                    })
                "
                >
                <input x-ref="birth_date" required type="text" name="birth_date" placeholder="YYYY-MM-DD" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" value="{{old('birth_date', $user->birth_date)}}" />
            </div>

        </div>
        <div>
            
            
          
        </div>
        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" required autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>
        <div>
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $user->address)" required autofocus autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>
        <div>
            <x-input-label for="profession" :value="__('Profession')" />
            <select class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="profession">
                <option value="Software Archietect" >Software Architect</option>
                <option value="Programmer">Programmer</option>
            </select>
            
        </div>

        

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
            
        </div>
    </form>
   
</section>
