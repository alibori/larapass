<div>
    <!-- Comment Form -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="mx-auto max-w-2xl">
            <div class="text-center">
                <h2 class="text-xl text-gray-800 font-bold sm:text-3xl dark:text-white">
                    {{ __('Password data') }}
                </h2>
            </div>

            <!-- Card -->
            <div class="mt-5 p-4 relative z-10 bg-white border rounded-xl sm:mt-10 md:p-10 dark:bg-neutral-900 dark:border-neutral-700">
                <form wire:submit="save">
                    <div class="mb-4 sm:mb-8">
                        <label for="title" class="block mb-2 text-sm font-medium dark:text-white">{{ __('Title') }}</label>
                        <input type="text" id="title" name="title" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="GitHub" wire:model="form.title">
                    </div>

                    <div class="mb-4 sm:mb-8">
                        <label for="origin" class="block mb-2 text-sm font-medium dark:text-white">{{ __('Origin') }}</label>
                        <input type="text" id="origin" name="origin" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="https://github.com" wire:model="form.origin">
                    </div>

                    <div class="mb-4 sm:mb-8">
                        <label for="username" class="block mb-2 text-sm font-medium dark:text-white">{{ __('Username') }}</label>
                        <input type="text" id="username" name="username" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="me@my-email.com" wire:model="form.username">
                    </div>

                    <div class="mb-4 sm:mb-8">
                        <label for="password" class="block mb-2 text-sm font-medium dark:text-white">{{ __('Password') }}</label>
                        <input type="password" id="password" name="password" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" wire:model="form.password">

                        <div class="mt-2 flex justify-items-start gap-x-5">
                            <button type="button" class="px-2 py-1.5 text-sm text-white rounded-lg bg-blue-500 hover:bg-gradient-lp" wire:click="generate">{{ __('Generate password') }}</button>

                            @if($password)
                                <button type="button" class="px-2 py-1.5 text-sm text-white rounded-lg bg-blue-500 hover:bg-gradient-lp" wire:click="copy('{{ $password->password }}')">{{ __('Copy password') }}</button>
                            @endif
                        </div>
                    </div>

                    <div>
                        <label for="comments" class="block mb-2 text-sm font-medium dark:text-white">{{ __('Comment') }}</label>
                        <div class="mt-1">
                            <textarea id="comments" name="comments" rows="3" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="{{ __('Leave your comment here...') }}" wire:model="form.comments"></textarea>
                        </div>
                    </div>

                    <div class="mt-6 grid">
                        <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
            <!-- End Card -->
        </div>
    </div>
    <!-- End Comment Form -->
</div>
