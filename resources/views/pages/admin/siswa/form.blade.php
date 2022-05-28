@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <h4 class="page-title">Stiped Color Tables</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javaScript:void();">Rukada</a></li>
                    <li class="breadcrumb-item"><a href="javaScript:void();">Tables</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Stiped Color Tables</li>
                </ol>
            </div>
            <div class="col-sm-3">
                <div class="btn-group float-sm-right">
                    <a href="{{ url('admin/siswa/form-siswa') }}" class="btn btn-info float-right">+ Tambah Siswa</a>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb-->


        {{-- FORM --}}

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <div class="card-title text-dark">Horizontal Form</div>
                    <hr />
                    <form>
                        <div class="form-group row">
                        <label for="input-21" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-21" placeholder="Enter Your Name" />
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="input-22" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-22" placeholder="Enter Your Email Address" />
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="input-23" class="col-sm-2 col-form-label">Mobile</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-23" placeholder="Enter Your Mobile Number" />
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="input-24" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-24" placeholder="Enter Password" />
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="input-25" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-25" placeholder="Confirm Password" />
                        </div>
                        </div>
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="icheck-material-dark">
                            <input type="checkbox" id="user-checkbox5" checked="" />
                            <label for="user-checkbox5">Remember me</label>
                            </div>
                        </div>
                        </div>
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-dark shadow-dark px-5">
                            <i class="icon-lock"></i> Register
                            </button>
                        </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection