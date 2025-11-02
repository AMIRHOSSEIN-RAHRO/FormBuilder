<div>
    <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $subject }}</h2>
    <form action="{{ $action }}" method="{{ $method }}" class="{{ $classModel }}">
        @csrf

        @if ($countInput > 1)

            @for ($i = 0; $i < $countInput; $i++)
                @php $startNameNumber_PK++; @endphp
                <div class="Part_{{ $startNameNumber_PK }}">
                    <label for="Part_{{ $startNameNumber_PK }}_Input"
                        class="block text-gray-700 font-semibold mb-1">{{ $propertyTitleArray[$i] ?? '' }}</label>
                    <input type="{{ $propertyInputTypeArray[$i] ?? 'text' }}"
                        {{ ($propertyInputRequiredArray[$i] ?? 'false') === 'true' ? 'required' : '' }}
                        name="Part_{{ $startNameNumber_PK }}_Input" id="Part_{{ $startNameNumber_PK }}_Input"
                        placeholder="{{ $propertyInputPlaceholderArray[$i] ?? '' }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>
            @endfor
        @else
            <div class="Part_{{ $startNameNumber_PK }}">
                <label for="Part_{{ $startNameNumber_PK }}_Input"
                    class="block text-gray-700 font-semibold mb-1">{{ $propertyTitleArray[0] ?? '' }}</label>
                <input {{ ($propertyInputRequiredArray[0] ?? 'false') === 'true' ? 'required' : '' }}
                    type="{{ $propertyInputTypeArray[0] ?? 'text' }}" name="Part_{{ $startNameNumber_PK }}_Input"
                    id="Part_{{ $startNameNumber_PK }}_Input"
                    placeholder="{{ $propertyInputPlaceholderArray[0] ?? '' }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>
        @endif
        <!-- usefully -->
        {{ $slot }}
        <!-- send -->
        <button type="submit" id="Part_{{ $startNameNumber_PK }}_Submit" name="Part_{{ $startNameNumber_PK }}_Submit"
            class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600 transition">
            {{ $submitText }}
        </button>
    </form>

</div>
