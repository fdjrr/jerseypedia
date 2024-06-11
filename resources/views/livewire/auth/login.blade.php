<div>
    <div class="card card-md">
        <div class="card-body">
            <h2 class="h2 text-center mb-4">Login to your account</h2>
            <form wire:submit.prevent="submit">
                <div class="mb-3">
                    <x-label :required="true">Email Address</x-label>
                    <x-input type="email" wire:model="form.email" class="{{ $errors->has('form.email') ? 'is-invalid' : '' }}" placeholder="your@email.com" autocomplete="off" />
                    @error('form.email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <x-label :required="true">
                        Password
                        <span class="form-label-description">
                            <a href="{{ route('auth.forgot_password') }}">I forgot password</a>
                        </span>
                    </x-label>
                    <x-input type="password" wire:model="form.password" class="{{ $errors->has('form.password') ? 'is-invalid' : '' }}" placeholder="Your password" autocomplete="off" />
                    @error('form.password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <x-checkbox wire:model="form.remember_me">Remember me on this device</x-checkbox>
                </div>
                <div class="form-footer">
                    <x-button type="submit" variant="primary" class="w-100">Sign In</x-button>
                </div>
            </form>
        </div>
    </div>
    <div class="text-center text-secondary mt-3">
        Don't have account yet? <a href="{{ route('auth.register') }}" tabindex="-1">Sign Up</a>
    </div>
</div>
