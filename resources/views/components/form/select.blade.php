@props(['id' => null])

<select
    {{ $attributes
        ->merge(
        [
            "id" => $id,
            "class" => "mt-1 block w-full rounded-md 
            border-gray-300 shadow-sm focus:ring-blue-300 
            focus:border-blue-300",
            ]
    ) }}
>
    {{ $slot }}
</select>
