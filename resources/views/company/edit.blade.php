@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            @if (session()->has('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success') }}
              </div>
            @endif
            @if (session()->has('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session()->get('error') }}
              </div>
            @endif
            <div class="mt-4">
              <h1 class="text-center">تحديث الملف التعريفي للشركة</h1>
            </div>
            <div class="register-form text-right">
                <form action="{{ route('company.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>اسم الشركة</label>
                        <input type="text" class="form-control" name="name" value="{{ $company->name ?? '' }}">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>البريد الإلكتروني للشركة</label>
                        <input type="email" class="form-control" name="email" value="{{ $company->email ?? ''}}">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>هاتف الشركة</label>
                        <input type="text" class="form-control" name="phone" value="{{ $company->phone ?? '' }}">
                        @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>موقع الكتروني</label>
                        <input type="text" class="form-control" name="website" value="{{ $company->website ?? '' }}">
                        @error('website')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>شارع</label>
                        <input type="text" class="form-control" name="street" value="{{ $company->street ?? '' }}">
                        @error('street')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>مدينة</label>
                        <input type="text" class="form-control" name="city" value="{{ $company->city ?? '' }}">
                        @error('city')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>حالة</label>
                        <input type="text" class="form-control" name="state" value="{{ $company->state ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label>تبوك</label>
                        <input type="text" class="form-control" name="address" value="{{ $company->address ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label>وصف</label>
                        <textarea name="description" class="form-control" >{{ $company->description ?? '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>صورة</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <button type="submit" class="btn btn-success">يسجل</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection