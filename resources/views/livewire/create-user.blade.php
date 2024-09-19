<div>
    <h4>Register new user</h4>
    <h4>{{$count}}</h4>
    <form wire:submit="create" action="">
        <input type="text" wire:model="name" placeholder="Name">
        <x-validation-error field="name"/>
        <br>
        <input type="email" wire:model="email" placeholder="Email">
        <x-validation-error field="name"/>
        <br>
        <input type="password" wire:model="password" placeholder="Password">
        <x-validation-error field="name"/>
        <br>
        <button>Create User</button>
    </form>
    @foreach ($users as $user)
        <h3>{{$user->name}}</h3>
    @endforeach
    {{$users->links('vendor.livewire.bootstrap')}}
</div>
