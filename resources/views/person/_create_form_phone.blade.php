<!----------------------------------------------------------------------------->
<!---------------------------New phone_type_id dropdown----------------------------->
@include('layouts._forms._input_dropdown',[
    'name' => 'phone_type_id',
    'label' => 'Phone Number Type',
    'array' => $phone_type_dropdown,
    'required' => true,
    'class' => null,
    'selected' => null
  ])
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!---------------------------New country_id dropdown----------------------------->
@include('layouts._forms._input_dropdown',[
    'name' => 'country_id_phone',
    'label' => 'Country Code',
    'array' => $country_code_dropdown,
    'required' => true,
    'class' => null,
    'selected' => null
  ])
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!---------------------------New number text field----------------------------->
@include('layouts._forms._input_text',[
    'name' => 'number',
    'label' => 'Phone Number',
    'placeholder' => 'Phone Number',
    'required' => true
  ])
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!---------------------------New extension text field----------------------------->
@include('layouts._forms._input_text',[
    'name' => 'extension',
    'label' => 'Optional Extension',
    'placeholder' => 'Extension',
    'required' => false
  ])
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
