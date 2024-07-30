<div class="space-y-6">

    <div>
        <x-label for="account_type" :value="__('Account Type')"/>
        <x-input id="account_type" name="account_type" type="text" class="mt-1 block w-full" :value="old('account_type', $bankAccount?->account_type)" autocomplete="account_type" placeholder="Account Type"/>
        <x-input-error for="account_type" class="mt-2" :messages="$errors->get('account_type')"/>
    </div>
    <div>
        <x-label for="account_number" :value="__('Account Number')"/>
        <x-input id="account_number" name="account_number" type="text" class="mt-1 block w-full" :value="old('account_number', $bankAccount?->account_number)" autocomplete="account_number" placeholder="Account Number"/>
        <x-input-error for="account_number" class="mt-2" :messages="$errors->get('account_number')"/>
    </div>
    <div>
        <x-label for="account_pin" :value="__('Account Pin')"/>
        <x-input id="account_pin" name="account_pin" type="text" class="mt-1 block w-full" :value="old('account_pin', $bankAccount?->account_pin)" autocomplete="account_pin" placeholder="Account Pin"/>
        <x-input-error for="account_pin" class="mt-2" :messages="$errors->get('account_pin')"/>
    </div>
    <div>
        <x-label for="balance" :value="__('Balance')"/>
        <x-input id="balance" name="balance" type="text" class="mt-1 block w-full" :value="old('balance', $bankAccount?->balance)" autocomplete="balance" placeholder="Balance"/>
        <x-input-error for="balance" class="mt-2" :messages="$errors->get('balance')"/>
    </div>
    {{-- <div>
        <x-label for="user_id" :value="__('User Id')"/>
        <x-input id="user_id" name="user_id" type="text" class="mt-1 block w-full" :value="old('user_id', $bankAccount?->user_id)" autocomplete="user_id" placeholder="User Id"/>
        <x-input-error for="user_id" class="mt-2" :messages="$errors->get('user_id')"/>
    </div> --}}
    <div>
        <x-label for='user_id' :value="__('User Id')"/>
        <select name="user_id" id="user_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            @foreach ($customers as $customer)
                <option value="{{ $customer->id }}" {{ old('user_id', $bankAccount?->user_id) == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
            @endforeach
        </select>
        <x-input-error for="user_id" class="mt-2" :messages="$errors->get('user_id')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-button>Submit</x-button>
    </div>
</div>
