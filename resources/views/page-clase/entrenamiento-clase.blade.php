@extends(('layouts-clase/compact_menu_test'))
{{-- Page title --}}
@section('title')
    Entrenamiento
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}"/>
    <!--page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/css/pages/wizards.css')}}"/>
    <!--End of page styles-->
     
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/fileinput/css/fileinput.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/blueimp-gallery-with-desc/css/blueimp-gallery.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/blueimp_file_upload/css/jquery.fileupload.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/blueimp_file_upload/css/jquery.fileupload-ui.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/blueimp-gallery-with-desc/css/blueimp-gallery.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/dropify/css/dropify.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/vendors/dropzone/css/dropzone.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets-in/assets/css/pages/file_upload.css')}}">
@stop
@section('content')
    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-sm-6">
                    <h4 class="nav_top_align">
                        <i class="fa fa-file" aria-hidden="true"></i>
                        Test
                    </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right nav_breadcrumb_top_align">
                        <li class="breadcrumb-item">
                            <a href="index1">
                                <i class="fa fa-home" data-pack="default" data-tags=""></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Pages</a>
                        </li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
    <div class="outer form_wizzards">
        <div class="inner bg-container">
            <div class="row">
                <div class="col">
                    <div class="card m-t-10">
                        <div class="card-header bg-white">
                            <i class="fa fa-file-text-o"></i>
                            Validation Wizard
                        </div>
                        <div class="card-body m-t-50">
                            <!--main content-->
                            <div class="row">
                                <div class="col-sm-10">
                                    <!-- BEGIN FORM WIZARD WITH VALIDATION -->
                                    <form id="commentForm" method="post" action="#" class="validate">
                                        <div id="rootwizard">
                                            <ul class="nav nav-pills">
                                                <li class="nav-item m-t-15">
                                                    <a class="nav-link" href="#tab1" data-toggle="tab">
                                                        <span class="userprofile_tab1">1</span></a>
                                                </li>
                                                <li class="nav-item m-t-15">
                                                    <a class="nav-link" href="#tab2" data-toggle="tab">
                                                        <span class="userprofile_tab2">2</span></a>
                                                </li>
                                                <li class="nav-item m-t-15">
                                                    <a class="nav-link" href="#tab3"
                                                       data-toggle="tab"><span>3</span></a>
                                                </li>
                                            </ul>
                                            <div class="tab-content m-t-20">
                                                <div class="tab-pane" id="tab1">
                                                    
                                                    <div class="form-group">
                                                        <label  class="control-label">La pregunta
                                                            </label>
                                                        <div>
                                                            <div class="input-group input-group-prepend input_top_align">
                                                                <span class="input-group-text border-right-0 br-0 rounded-left">
                                                                     <label class="custom-control custom-radio mr-0 mb-0 pl-3">
                                                                        <input type="radio"  class="custom-control-input form-control">
                                                                        <span class="custom-control-label"></span>
                                                                     </label>
                                                                </span>
                                                                    <input type="text" readonly value="Respuesta de pregunta" class="form-control">
                                                                </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="confirm" class="control-label">Confirm
                                                            Password
                                                            *</label>
                                                        <input id="confirm" name="confirm" type="password"
                                                               placeholder="Confirm your password "
                                                               class="form-control required">
                                                    </div>
                                                    <ul class="pager wizard pager_a_cursor_pointer">
                                                        <li class="previous">
                                                            <a><i class="fa fa-long-arrow-left"></i>
                                                                Saltar Pregunta</a>
                                                        </li>
                                                        <li class="next">
                                                            <a>Siguiente Pregunta <i class="fa fa-long-arrow-right"></i>
                                                            </a>
                                                        </li>
                                                        <li class="next finish" style="display:none;">
                                                            <a>Finish</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane" id="tab2">
                                                    <div class="form-group">
                                                        <label for="name1" class="control-label">First name
                                                            *</label>
                                                        <input id="name1" name="val_first_name"
                                                               placeholder="Enter your First name"
                                                               type="text"
                                                               class="form-control required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="surname1" class="control-label">Last
                                                            name *</label>
                                                        <input id="surname1" name="lname" type="text"
                                                               placeholder=" Enter your Last name"
                                                               class="form-control required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Gender</label>
                                                        <select class="custom-select form-control"
                                                                id="gender"
                                                                title="Select an account type...">
                                                            <option>Select</option>
                                                            <option>MALE</option>
                                                            <option>FEMALE</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address">Address *</label>
                                                        <input id="address" name="val_address" type="text"
                                                               class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="age" class="control-label">Age *</label>
                                                        <input id="age" name="val_age" type="text"
                                                               maxlength="3"
                                                               class="form-control required number">
                                                    </div>
                                                    <ul class="pager wizard pager_a_cursor_pointer">
                                                        <li class="previous">
                                                            <a><i class="fa fa-long-arrow-left"></i>
                                                                Previous</a>
                                                        </li>
                                                        <li class="next">
                                                            <a>Next <i class="fa fa-long-arrow-right"></i>
                                                            </a>
                                                        </li>
                                                        <li class="next finish" style="display:none;">
                                                            <a>Finish</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane" id="tab3">
                                                    <div class="form-group">
                                                        <label>Home number *</label>
                                                        <input type="text" class="form-control" id="phone1"
                                                               name="phone1"
                                                               placeholder="(999)999-9999">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Personal number *</label>
                                                        <input type="text" class="form-control" id="phone2"
                                                               name="phone2"
                                                               placeholder="(999)999-9999">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Alternate number *</label>
                                                        <input type="text" class="form-control" id="phone3"
                                                               name="phone3"
                                                               placeholder="(999)999-9999">
                                                    </div>
                                                    <div class="form-group">
                                                        <span>Terms and Conditions *</span>
                                                        <br>
                                                        <label class="custom-control custom-checkbox wizard_label_block">
                                                            <input type="checkbox" id="acceptTerms"
                                                                   name="acceptTerms"
                                                                   class="custom-control-input">
                                                            <span class="custom-control-label"></span>
                                                            <span class="custom-control-description custom_control_description_color">I agree with the Terms and Conditions.</span>
                                                        </label>

                                                    </div>
                                                    <ul class="pager wizard pager_a_cursor_pointer">
                                                        <li class="previous">
                                                            <a><i class="fa fa-long-arrow-left"></i>
                                                                Previous</a>
                                                        </li>
                                                        <li class="next">
                                                            <a>Next <i class="fa fa-long-arrow-right"></i>
                                                            </a>
                                                        </li>
                                                        <li class="next finish" style="display:none;">
                                                            <a>Finish</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="myModal" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">

                                                        <h4 class="modal-title">Wizard</h4>
                                                        <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>You Submitted Successfully.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">
                                                            OK
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--main content end-->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.inner -->
    </div>
    <!-- /.outer -->
@stop
@section('footer_scripts')
@stop