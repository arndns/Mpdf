@extends('frontend.customer.layouts.menu')
@include('frontend.include.header')
@section('menu')

 <!--Page header & Title-->
 <section id="page_header">
    <div class="page_title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title">Shopping  Cart</h2>
                    <p>UINSA FOOD</p>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="container">
    <div class="row justify-content-center">
        @if (session()->has('message'))
        <div class="text-green-6 mb-4">{{session()->get('message')}}</div>
        @endif
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">Update Profile</div>

                <div class="card-body">
                    <form action="{{route('updateprofile')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @method('PUT')

                        <div class="form-group">
                            <label for="nama_lengkap">Nama</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', Auth::user()->nama_lengkap)}}">

                            @error('nama_lengkap')
                                <div class="text-red-500 mt-2 text-sm">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email',Auth::user()->email ) }}">
                        </div>

                        <div class="form-group">
                            <label for="no_tlp">No Telepon</label>
                            <input type="text" class="form-control" id="no_tlp" name="no_tlp" value="{{ old('no_tlp',Auth::user()->no_tlp ) }}">
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat Lengkap</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat',Auth::user()->alamat ) }}">
                        </div>

                        <div class="form-group">
                            <label for="unit_kerja">Unit Kerja</label>
                            <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" value="{{ old('unit_kerja', Auth::user()->unit_kerja) }}">
                        </div>


                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{route('editpassword')}}" class="btn btn-primary">Change Password</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection