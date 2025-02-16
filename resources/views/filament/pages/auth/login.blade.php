<x-filament::page>
    <h1>Login</h1>

    <form wire:submit.prevent="submit">
        <x-filament::input name="email" label="Email" type="email" wire:model="email" required />
        <x-filament::input name="password" label="Password" type="password" wire:model="password" required />

        <x-filament::button type="submit">Login</x-filament::button>
    </form>
</x-filament::page>
