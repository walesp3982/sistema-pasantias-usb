props([
    'title' => 'Error',
    'message' => '',
    'dismissible' => false
])

<div class="flex items-start gap-3 bg-red-50 border border-red-200 rounded-lg p-4"
     x-data="{ show: true }" 
     x-show="show" 
     x-transition>
    
    <div class="flex-shrink-0 w-8 h-8 bg-red-600 rounded-full flex items-center justify-center">
        <i class="fas fa-exclamation-triangle text-white text-sm"></i>
    </div>

    <div class="flex-1">
        <p class="text-red-800 font-medium">{{ $title }}</p>
        
        @if($message)
            <p class="text-red-700 text-sm mt-1">{{ $message }}</p>
        @endif

        @if($slot->isNotEmpty())
            <div class="text-red-700">
                {{ $slot }}
            </div>
        @endif
    </div>

    @if($dismissible)
        <button @click="show = false" class="text-red-800 hover:opacity-70 transition">
            <i class="fas fa-times"></i>
        </button>
    @endif
</div>