<div>
    <div class="w-full h-full text-center">
        <img id="userPhoto"
        class="w-20 h-20 rounded-full cursor-pointer object-cover border-2 border-gray-300 hover:scale-105 transition-transform mx-auto"
        src="{{ $url }}" alt="User">
    </div>
    <h2 class="text-bold text-md  text-gray-800 my-1">{{ $user->name }}</h2>
    <p class="text-sm text-gray-500">{{ $roleName}}</p>
</div>
