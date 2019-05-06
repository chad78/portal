<!-- START FORM----------------------------------------------------------------------------->

{!! Form::open(['files' => true, 'id' => "visa-form-$passport->id",'url' => "/employee/$employee->uuid/passport/$passport->uuid/create_visa"]) !!}
<!----------------------------------------------------------------------------->
<!---------------------------New is_active dropdown----------------------------->
@include('layouts._forms._input_dropdown',[
    'name' => 'is_active__' . $passport->id,
    'label' => 'Is the visa active?',
    'array' => $status_dropdown,
    'class' => null,
    'selected' => null,
    'required' => true
  ])
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!---------------------------New visa_type_id dropdown----------------------------->
@include('layouts._forms._input_dropdown',[
    'name' => 'visa_type_id__' . $passport->id,
    'label' => 'Visa Type',
    'array' => $visa_type_dropdown,
    'class' => null,
    'selected' => null,
    'required' => true
  ])
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!---------------------------New visa_entry_id dropdown----------------------------->
@include('layouts._forms._input_dropdown',[
    'name' => 'visa_entry_id__' . $passport->id,
    'label' => 'Entry Type',
    'array' => $entry_dropdown,
    'class' => null,
    'selected' => null,
    'required' => true
  ])
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!---------------------------New number text field----------------------------->
@include('layouts._forms._input_text',[
    'name' => 'number',
    'label' => 'Visa Number',
    'placeholder' => '',
    'required' => true
  ])
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!---------------------------New entry_duration text field----------------------------->
@include('layouts._forms._input_text',[
    'name' => 'entry_duration',
    'label' => 'Entry Duration (Not Required for Work Visa)',
    'placeholder' => '',
    'required' => false
  ])
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!---------------------------New issue_Date date field----------------------------->
@include('layouts._forms._input_date',[
    'name' => 'issue_date__' . $passport->id,
    'label' => 'Issue Date',
    'format' => 'yyyy-mm-dd',
    'required' => true
])
{{-- MUST ADD form.date.js TO BOTTOM OF PAGE --}}

<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!---------------------------New expiration_date date field----------------------------->
@include('layouts._forms._input_date',[
    'name' => 'expiration_date__' . $passport->id,
    'label' => 'Expiration Date',
    'format' => 'yyyy-mm-dd',
    'required' => true
])
{{-- MUST ADD form.date.js TO BOTTOM OF PAGE --}}
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!---------------------------New visa image file field----------------------------->
@include('layouts._forms._input_file_upload', [
    'name' => 'upload',
    'label' => 'Visa Image',
    'required' => true,
    'options' => ['class' => 'filepond', 'accept' => 'image/*']
])
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->

@include('layouts._forms._form_close')
<!-- END FORM----------------------------------------------------------------------------->
