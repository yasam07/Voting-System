@props([
    'label' => '',        // Label above the dropdown
    'name' => '',         // Input name
    'options' => [],      // Array of options ['value' => 'Label']
    'selected' => null    // Selected value
])

<div class="mb-4">
    @if($label)
        <label class="block text-gray-700 font-semibold mb-2">{{ $label }}</label>
    @endif

    <select name="{{ $name }}" id="{{ $name }}" class="w-full border px-3 py-2 rounded">
        <option value="">Select {{ $label }}</option>
        @foreach($options as $value => $optionLabel)
            <option value="{{ $value }}"
             {{ (string) old($name, $selected) === (string) $value ? 'selected' : '' }}>
             {{ $optionLabel }}
            </option>

        @endforeach
    </select>
</div>
