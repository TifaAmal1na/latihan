<x-filament::page>
    <h1>Register</h1>

    <form wire:submit.prevent="submit">
        <x-filament::input name="name" label="Name" wire:model="name" required />
        <x-filament::input name="email" label="Email" type="email" wire:model="email" required />
        <x-filament::input name="password" label="Password" type="password" wire:model="password" required />
        <x-filament::input name="password_confirmation" label="Confirm Password" type="password" wire:model="password_confirmation" required />

        <x-filament::button type="submit">Register</x-filament::button>
    </form>
</x-filament::page>
