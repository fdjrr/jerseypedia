<div>
    <div class="card card-md">
        <div class="card-body">
            <h2 class="h2 text-center mb-4">Create new account</h2>
            <form wire:submit.prevent="submit">
                <div class="mb-3">
                    <x-label :required="true">Name</x-label>
                    <x-input type="text" wire:model="form.name" class="{{ $errors->has('form.name') ? 'is-invalid' : '' }}" placeholder="Your Name" autocomplete="off" />
                    @error('form.name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <x-label :required="true">Email Address</x-label>
                    <x-input type="email" wire:model="form.email" class="{{ $errors->has('form.email') ? 'is-invalid' : '' }}" placeholder="your@email.com" autocomplete="off" />
                    @error('form.email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <x-label :required="true">Password</x-label>
                    <x-input type="password" wire:model="form.password" class="{{ $errors->has('form.password') ? 'is-invalid' : '' }}" placeholder="Your Password" autocomplete="off" />
                    @error('form.password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <x-label :required="true">Confirm Password</x-label>
                    <x-input type="password" wire:model="form.confirm_password" class="{{ $errors->has('form.confirm_password') ? 'is-invalid' : '' }}" placeholder="Your Confirm Password" autocomplete="off" />
                    @error('form.confirm_password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-footer">
                    <x-button type="submit" variant="primary" class="w-100">Sign Up</x-button>
                </div>
            </form>
        </div>
    </div>
    <div class="text-center text-secondary mt-3">
        Already have account yet? <a href="{{ route('auth.login') }}" tabindex="-1">Sign In</a>
    </div>
</div>
