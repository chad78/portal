@extends('layouts.backend')

@section('content')
    <!-- Add Content Title Here b.breadcrumbs -->
    @include('layouts._breadcrumbs', [
    'title' => 'Students',
    'breadcrumbs' => [
        [
            'page_name' => 'Portal',
            'page_uri'  => '/'
        ],
        [
            'page_name' => 'Student Index',
            'page_uri'  => request()->getRequestUri()
        ]
    ]
])
    @include('layouts._content_start')
    <!--
    panel.row
    panel.column
    panel.panel
    panel.panel

    ---------------
    panel.row
    panel.column
    panel.panel
    panel.column
    panel.panel
    panel.row

    |--------------||--------------|
    |              ||              |
    |--------------||--------------|

-->
    @include('layouts._panels_start_row',['has_uniform_length' => true])
    @include('layouts._panels_start_column', ['size' => 12])
    <!-------------------------------------------------------------------------------->
    <!----------------------------------New Panel ------------------------------------>
    @include('layouts._panels_start_panel', ['title' => 'Students', 'with_block' => false])
    {{-- START BLOCK OPTIONS panel.block --}}
    @include('layouts._panels_start_content')

    <!-- TABLE OF Courses -->@include('_tables.new-table',['id' => 'student_table', 'table_head' => ['ID', 'Name', 'Status','Data of Birth', 'Grade Level', 'Actions']])
    @include('_tables.end-new-table')


    @include('layouts._panels_end_content')
    @include('layouts._panels_end_panel')
    <!-------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------->
    @include('layouts._panels_end_column')
    @include('layouts._panels_end_row')

    @include('layouts._content_end')
    <!-------------------------------- Modal: New Course Start------------------------------------------->
    @include('layouts._modal_panel_start',[
        'id' => 'modal-block-student',
        'title' => 'New Student'
    ])
    <!-- START FORM----------------------------------------------------------------------------->
    {!! Form::open(['files' => false, 'id' => 'student-form','url' => request()->getRequestUri()]) !!}
    <!----------------------------------------------------------------------------->
    <!---------------------------New student_status_id dropdown----------------------------->
    @include('layouts._forms._input_dropdown',[
        'name' => 'student_status_id',
        'label' => 'Student Status',
        'array' => $status_dropdown,
        'class' => null,
        'selected' => null,
        'required' => true
      ])
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->
    <!---------------------------New grade_level_id dropdown----------------------------->
    @include('layouts._forms._input_dropdown',[
        'name' => 'grade_level_id',
        'label' => 'Grade Level',
        'array' => $grade_level_dropdown,
        'class' => null,
        'selected' => null,
        'required' => true
      ])
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->
    @include('person._create_form_biographical', ['type' => 'student'])


    @include('layouts._forms._form_close')
    <!-- END FORM----------------------------------------------------------------------------->
    @include('layouts._modal_panel_end')
    <!-------------------------------- Modal: New Course END------------------------------------------->
    <!------   data-toggle="modal" data-target="#modal-block-student". ----->
@endsection

@section('js_after')
    {!! JsValidator::formRequest('\App\Http\Requests\StoreStudentRequest','#student-form') !!}

    <script type="text/javascript">
        jQuery(document).ready(function () {
            $('#dob').datepicker();
            $('#student_status_id').select2();
            $('#grade_level_id').select2();

            var tablestudent = $('#student_table').DataTable({
                dom: "Bfrtip",
                select: true,
                paging: true,
                pageLength: 50,
                ajax: {"url": "{{ url('api/student/ajaxshowstudent') }}", "dataSrc": ""},
                columns: [
                    {data: "id"},
                    { data: "person",
                        render: function(data, type, row) {
                            let name = data.family_name+', '+data.given_name;
                            if (data.name_in_chinese !== null) {
                                name += ' '+data.name_in_chinese;
                            }
                            if (data.preferred_name !== null && data.preferred_name !== data.given_name) {
                                name += ' ('+data.preferred_name+')';
                            }
                            return name;
                        }
                    },
                    {data: "status.name"},
                    {data: "person.dob",
                        render: function(data, type, row) {
                            return formatDate(data)+' ('+getAge(data)+' Years Old)';
                        }
                    },
                    {data: "grade_level.short_name"},
                    {
                        data: "uuid",
                        render: function (data, type, row) {
                            return "    <div class=\"btn-group\">\n" +
                                "            <button dusk=\"btn-show-" + data + "\" type=\"button\" class=\"btn btn-sm btn-outline-info\" data-toggle=\"tooltip\" title=\"View Details\"\n" +
                                "                    onclick=\"window.location.href='/student/" + data + "'\">\n" +
                                "                <i class=\"si si-magnifier\"></i>\n" +
                                "            </button>\n" +
                                "            <button dusk=\"btn-edit-" + data + "\" type=\"button\" class=\"btn btn-sm btn-outline-primary\" data-toggle=\"tooltip\" title=\"Edit\"\n" +
                                "                    onclick=\"window.location.href='/student/" + data + "/profile'\">\n" +
                                "                <i class=\"fa fa-pen\"></i>\n" +
                                "            </button>\n" +
                                "            <button dusk=\"btn-archive-" + data + "\" type=\"button\" class=\"btn btn-sm btn-outline-danger\" data-toggle=\"tooltip\" title=\"Archive\"\n" +
                                "                    onclick=\"window.location.href='/student/" + data + "/archive'\">\n" +
                                "                <i class=\"fa fa-times\"></i>\n" +
                                "            </button>\n" +
                                "        </div>"
                        }
                    },
                ],
                buttons: [
                    {
                        extend: 'collection',
                        text: '<i class="fa fa-fw fa-download mr-1"></i>',
                        buttons: [
                            'copy',
                            'excel',
                            'csv',
                            {
                                extend: 'pdf',
                                orientation: 'landscape',
                                pageSize: 'LETTER'
                            },
                            'print',
                        ],
                        fade: true,
                        className: 'btn-sm btn-hero-primary'
                    },
                    {
                        text: '',
                        className: 'btn-sm btn-light',
                        action: function (e, dt, node, config) {
                            this.disable();
                        }
                    },
                    {
                        text: 'New',
                        className: 'btn-sm btn-hero-primary',
                        action: function ( e, dt, node, config ) {
                            $('#modal-block-student').modal('toggle');
                        }
                    },
                ]
            });
        });
    </script>
@endsection