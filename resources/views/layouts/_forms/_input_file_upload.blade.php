{{--
$name = text
$label = text
$required = bool
$options = array

--}}

@php
isset($options) ?: $options = [];
isset($options['id']) ?: $options['id'] = $name
@endphp

<div class="form-group row">
    @if(!empty($label))
    <label class="col-sm-4 col-form-label" for="{{ $name }}">{{ $label }}
        @if($required)
            <span class="text-danger">*</span>
        @endif
    </label>
    @endif
    <div class="
    @if(!empty($label))
    col-sm-8">
    @else
    col-sm-12">
    @endif
        {{ Form::file($name, $options) }}
    </div>
</div>
