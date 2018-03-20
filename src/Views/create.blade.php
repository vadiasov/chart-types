@extends('layouts.admin.main')

@section('title', 'Chart Types')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet"
          href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet"
          href="{{ asset('admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/AdminLTE.min.css') }}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Chart Type</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin/chart-types') }}"><i class="fa fa-dashboard"></i> Chart Types</a></li>
                <li><a href="#">Create Chart Type</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-info">
                        <div class="box-header with-border" style="margin-bottom: 10px">
                            <h3 class="box-title">Create Chart Type</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                            @foreach ($errors->all() as $error)
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-6 alert alert-danger">{{ $error }}</div>
                                </div>
                            @endforeach

                            <div class="box-body">

                                <!-- radio -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Parent type <sup
                                                style="color: red">*</sup></label>

                                    <div class="radio col-sm-9">
                                        <div>
                                            <label>
                                                <input type="radio" name="parent" id="optionsRadios1" value="common"
                                                       @if(old('parent') == 'common' ) checked=""
                                                       @endif onchange="typeChanged()" class="optionsRadios">
                                                Common
                                            </label>
                                        </div>
                                        <div>
                                            <label>
                                                <input type="radio" name="parent" id="optionsRadios2" value="national"
                                                       @if(old('parent') == 'national' ) checked=""
                                                       @endif onchange="typeChanged()" class="optionsRadios">
                                                National
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group" id="country"
                                     @if(old('parent') == 'national')
                                        style="visibility: visible"
                                     @else
                                        style="visibility: hidden"
                                     @endif >
                                    <label class="col-sm-3 control-label">Countries</label>

                                    <div class="col-sm-9">
                                        <select class="form-control" name="country">
                                            <option value="">Choose Country</option>
                                            @foreach($all as $key=>$country)
                                                <option value="{{ $country }}" {{ old('country') == $country ? 'selected="selected"' : '' }} >
                                                    {!! $country !!}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Title <sup style="color: red">*</sup></label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="title"
                                               placeholder="Name (only letters, digits, hyphen, apostrophe, space)"
                                               value="{{ old('title') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tag</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="tag"
                                               placeholder="Tag (only letters, hyphen)"
                                               value="{{ old('tag') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Description</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="description"
                                               placeholder="Name (only letters, digits, hyphen, apostrophe, space)"
                                               value="{{ old('description') }}">
                                    </div>
                                </div>

                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <a href="{{ route('admin/chart-types') }}" class="btn btn-default">Cancel</a>
                                    <button type="submit" class="btn btn-info pull-right">Create</button>
                                </div>
                                <!-- /.box-footer -->
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('js')
    <!-- DataTables -->
    <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('admin/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('admin/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('admin/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin/dist/js/demo.js') }}"></script>
    <!-- CK Editor -->
    <script src="{{ asset('admin/bower_components/ckeditor/ckeditor.js') }}"></script>
    <!-- bootstrap datepicker -->
    <script src="{{ asset('admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- page script -->

    <script>
        function typeChanged() {
            var radios = document.getElementsByName("parent");
            if (radios[0].checked) {
                document.getElementById("country").style.visibility = 'hidden';
            }

            if (radios[1].checked) {
                document.getElementById("country").style.visibility = 'visible';
            }
        }
    </script>
@endsection