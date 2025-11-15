@props([
    'title' => 'Advertencia',
    'message' => '',
    'dismissible' => false
])

<div class="flex items-start gap-3 bg-yellow-50 border border-yellow-200 rounded-lg p-4"
     x-data="{ show: true }" 
     x-show="show" 
     x-transition>
    
    <div class="flex-shrink-0 w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
        <i class="fas fa-exclamation-triangle text-white text-sm"></i>
    </div>

    <div class="flex-1">
        <p class="text-yellow-800 font-medium">{{ $title }}</p>
        
        @if($message)
            <p class="text-yellow-700 text-sm mt-1">{{ $message }}</p>
        @endif

        @if($slot->isNotEmpty())
            <div class="text-yellow-700">
                {{ $slot }}
            </div>
        @endif
    </div>

    @if($dismissible)
        <button @click="show = false" class="text-yellow-800 hover:opacity-70 transition">
            <i class="fas fa-times"></i>
        </button>
    @endif
</div>