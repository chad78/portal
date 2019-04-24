<!-- START FORM----------------------------------------------------------------------------->
@if(isset($edit_address))
    {!! Form::model($edit_address,['method' => 'PATCH','id' => 'address-form','url' => "/employee/$employee->uuid/address/$edit_address->uuid/update_address"]) !!}
@else
    {!! Form::open(['files' => false, 'id' => 'address-update-form','url' => '/employee/' . $employee->uuid . '/profile/store_address']) !!}
@endif
@include('layouts._forms._row_start', ['size' => 12])

@if(isset($edit_address))
    <!----------------------------------------------------------------------------->
    <!---------------------------New address_type_id dropdown----------------------------->
    @include('layouts._forms._input_dropdown',[
        'name' => 'address_type_id_' . $edit_address->id,
        'label' => 'Address Type',
        'array' => $address_type_dropdown,
        'class' => null,
        'selected' => $edit_address->address_type_id,
        'required' => true
      ])
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->
@else
    <!----------------------------------------------------------------------------->
    <!---------------------------New address_type_id dropdown----------------------------->
    @include('layouts._forms._input_dropdown',[
        'name' => 'address_type_id',
        'label' => 'Address Type',
        'array' => $address_type_dropdown,
        'class' => null,
        'selected' => null,
        'required' => true
      ])
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->
@endif
<!----------------------------------------------------------------------------->
<!---------------------------New address_line_1 text field----------------------------->
@include('layouts._forms._input_text',[
    'name' => 'address_line_1',
    'label' => 'Street Address',
    'placeholder' => 'Street and Number',
    'required' => true
  ])
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!---------------------------New address_line_2 text field----------------------------->
@include('layouts._forms._input_text',[
    'name' => 'address_line_2',
    'label' => '',
    'placeholder' => 'Apartment, Building, Floor',
    'required' => false
  ])
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!---------------------------New city text field----------------------------->
@include('layouts._forms._input_text',[
    'name' => 'city',
    'label' => 'City',
    'placeholder' => '',
    'required' => true
  ])
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!---------------------------New province text field----------------------------->
@include('layouts._forms._input_text',[
    'name' => 'province',
    'label' => 'Province or State',
    'placeholder' => '',
    'required' => true
  ])
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!---------------------------New postal_code text field----------------------------->
@include('layouts._forms._input_text',[
    'name' => 'postal_code',
    'label' => 'Postal Code',
    'placeholder' => '',
    'required' => true
  ])
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
@if(isset($edit_address))
    <!----------------------------------------------------------------------------->
    <!---------------------------New country_id dropdown----------------------------->
    @include('layouts._forms._input_dropdown',[
        'name' => 'country_id_' . $edit_address->id,
        'label' => 'Country',
        'array' => $country_dropdown,
        'required' => true,
        'class' => null,
        'selected' => $edit_address->country_id
      ])
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->
@else
    <!----------------------------------------------------------------------------->
    <!---------------------------New country_id dropdown----------------------------->
    @include('layouts._forms._input_dropdown',[
        'name' => 'country_id',
        'label' => 'Country',
        'array' => $country_dropdown,
        'required' => true,
        'selected' => null,
        'class' => null
      ])
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->
@endif

@include('layouts._forms._row_end')
@include('layouts._forms._form_close')
<!-- END FORM----------------------------------------------------------------------------->