@if(!empty($subject)) <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $subject }}</h2> @endif

    <form action="{{ $action }}" method="{{ in_array(strtolower($method), ['post', 'get']) ? strtolower($method) : 'post' }}" class="{{ $classModel }}">
    @if($csrf!==false)  @csrf  @endif
    @if(!in_array(strtolower($method), ['post', 'get']))   @method($method)  @endif

    @if ($countInput > 0)
        @for ($i = 0; $i < $countInput; $i++)

              @php if ($autoNameId===true) $autoIdStart++; else $autoIdStart=false; @endphp

                <div class="{{ $autoIdStart !== false ? 'Part_'.$autoIdStart : $propertyIdArray[$i] }}">
                  <label for="{{  $autoIdStart !== false ? 'Part_'.$autoIdStart.'_Input' : $propertyNameArray[$i] }}"
                         class="block text-gray-700 font-semibold mb-1">{{ $propertyTitleArray[$i] ?? '' }}</label>
                  <input value="{{ old(($autoIdStart !== false ? 'Part_'.$autoIdStart .'_Input' : $propertyNameArray[$i]), $propertyOldArray[$i] ?? '') }}"
                         type="{{ $propertyInputTypeArray[$i] ?? 'text' }}" {{ ($propertyInputRequiredArray[$i] ?? false) === true ? 'required' : '' }}
                         name="{{  $autoIdStart !== false ? 'Part_'.$autoIdStart.'_Input' : $propertyNameArray[$i] }}"
                         id="{{ $autoIdStart !== false ? 'Part_'.$autoIdStart.'_Input' : $propertyIdArray[$i] }}"
                         placeholder="{{ $propertyInputPlaceholderArray[$i] ?? '' }}"
                         class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>

        @endfor
    @endif

        <!-- usefully -> slot-->   {{ $slot }}

        <!-- submit -->
        @php if ($autoNameId===true) $autoIdStart++;  @endphp
        <button type="submit" id="{{ empty($idSubmit) ? 'Part_'.$autoIdStart.'_Submit' : $idSubmit }}"
                name="{{ empty($nameSubmit) ? 'Part_'.$autoIdStart.'_Submit' : $nameSubmit }}"
                class="{{$submitStyle}}">
            {{ $submitText }}
        </button>

    </form>
