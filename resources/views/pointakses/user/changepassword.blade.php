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
        @if(session('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div style="color: red;">{{ session('error') }}</div>
        @endif

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 ">
                        <div class="card">
                            <div class="card-header">Update Password</div>

                            <div class="card-body">
                                <form action="{{route('update-password-user')}}" method="POST" enctype="multipart/form-data">
                                    @csrf   

                                    <div class="form-group">
                                        <label for="current_pw">Password Lama</label>
                                        <input type="password" class="form-control"  name="current_pw" required>
                                        
                                        @error('current_pw')
                                         <div style="color: red;">{{ $message }}</div>
                                         @enderror

                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password Baru</label>
                                        <input type="password" class="form-control"  name="password" required>
                                        
                                        @error('password')
                                         <div style="color: red;">{{ $message }}</div>
                                         @enderror

                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirmation">Password Lama</label>
                                        <input type="password" class="form-control"  name="password_confirmation" required>

                                        @error('password_confirmation')
                                         <div style="color: red;">{{ $message }}</div>
                                         @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection