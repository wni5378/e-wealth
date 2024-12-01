<x-guest-layout>

    <form action="{{ route('two-factor.verify') }}" method="POST">
        @csrf
        <div>
            <x-input-label for="code" :value="__('Two-Factor Code')" />
            <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')" required autofocus autocomplete="code" />
            <x-input-error :messages="$errors->get('code')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Verify') }}
            </x-primary-button>
        </div>
    </form>

</x-guest-layout>
