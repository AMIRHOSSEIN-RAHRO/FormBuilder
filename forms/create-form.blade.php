<div>
    @if(!empty($subject))
    <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $subject }}</h2>
    @endif
    <form action="{{ $action }}" method="{{ in_array(strtolower($method), ['post', 'get']) ? strtolower($method) : 'post' }}" class="{{ $classModel }}">
        @csrf

        @if(!in_array(strtolower($method), ['post', 'get']))
            @method($method)
        @endif

        @if ($countInput > 0)

            @for ($i = 0; $i < $countInput; $i++)
                @php $startNameNumberPK++; @endphp
                <div class="Part_{{ $startNameNumberPK }}">
                    <label for="Part_{{ $startNameNumberPK }}_Input"
                        class="block text-gray-700 font-semibold mb-1">{{ $propertyTitleArray[$i] ?? '' }}</label>
                    <input value="{{ old('Part_' . $startNameNumberPK . '_Input',$oldArray[$i] ?? '') }}"
                        type="{{ $propertyInputTypeArray[$i] ?? 'text' }}"
                        {{ ($propertyInputRequiredArray[$i] ?? false) === true ? 'required' : '' }}
                        name="Part_{{ $startNameNumberPK }}_Input" id="Part_{{ $startNameNumberPK }}_Input"
                        placeholder="{{ $propertyInputPlaceholderArray[$i] ?? '' }}"
                        class="  w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>
            @endfor
        @endif
        <!-- usefully -> slot-->
        {{ $slot }}
        <!-- send -->
        <button type="submit" id="Part_{{ $startNameNumberPK }}_Submit" name="Part_{{ $startNameNumberPK }}_Submit"
            class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600 transition">
            {{ $submitText }}
        </button>
    </form>

</div>
