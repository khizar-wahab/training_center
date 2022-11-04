@extends('admin.layouts.app')

@push('title')
Admin | Edit Company
@endpush

@section('content')

<div class="row">
  {{-- sidebar --}}
  <div class="col-2">
    @include('admin.layouts.sidebar')
  </div>
  {{-- main content --}}
  <div class="col-xl-10 col-sm-12 mt-5">

    <div class="container mt-5">
      <div class="card-header">
        <h3>Edit Company</h3>
      </div>
      <div class="card-body mt-5 bg-white py-5 px-5">
        <!-- Vertical Form -->
        <form class="row g-3" action="{{ route('admin.admin-companies.update',$company->id) }}" method="post"
          enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-lg-4">
              <label for="inputNanme4" class="form-label">Company Name</label>
              <input type="text" name="name" value="{{ $company->name ?? old('name') }}" class="form-control"
                id="inputNanme4">
              <span class="text-danger">
                @error('name')
                {{ $message }}
                @enderror
              </span>
            </div>
            <div class="col-lg-4">
              <label for="inputNanme4" class="form-label">Email</label>
              <input type="text" name="email" value="{{ $company->email ?? old('email') }}" class="form-control"
                id="inputNanme4">
              <span class="text-danger">
                @error('email')
                {{ $message }}
                @enderror
              </span>
            </div>
            <div class="col-lg-4">
              <label for="inputNanme4" class="form-label">Phone</label>
              <input type="text" name="phone" value="{{ $company->phone ?? old('phone') }}" class="form-control"
                id="inputNanme4">
              <span class="text-danger">
                @error('phone')
                {{ $message }}
                @enderror
              </span>
            </div>
          </div>
          <div class="row">
            
          <div class="col-lg-4">
            <label for="inputNanme4" class="form-label">Website</label>
            <input type="text" name="website" value="{{ $company->website ?? old('website') }}" class="form-control"
              id="inputNanme4">
            <span class="text-danger">
              @error('website')
              {{ $message }}
              @enderror
            </span>
          </div>
          <div class="col-lg-4">
            <label for="inputNanme4" class="form-label">Street</label>
            <input type="text" name="street" value="{{ $company->street ?? old('street') }}" class="form-control"
              id="inputNanme4">
            <span class="text-danger">
              @error('street')
              {{ $message }}
              @enderror
            </span>
          </div>
          <div class="col-lg-4">
            <label for="inputNanme4" class="form-label">City</label>
            <input type="text" name="city" value="{{ $company->city ?? old('city') }}" class="form-control"
              id="inputNanme4">
            <span class="text-danger">
              @error('city')
              {{ $message }}
              @enderror
            </span>
          </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <label for="inputNanme4" class="form-label">State</label>
              <input type="text" name="state" value="{{ $company->state ?? old('state') }}" class="form-control"
                id="inputNanme4">
              <span class="text-danger">
                @error('state')
                {{ $message }}
                @enderror
              </span>
            </div>
            <div class="col-lg-4">
              <label for="inputNanme4" class="form-label">Address</label>
              <input type="text" name="address" value="{{ $company->address ?? old('address') }}" class="form-control"
                id="inputNanme4">
              <span class="text-danger">
                @error('address')
                {{ $message }}
                @enderror
              </span>
            </div>
            <div class="col-lg-4">
              <label for="inputNanme4" class="form-label">Image</label>
              <input type="file" name="image" class="form-control" id="inputNanme4">
              <span class="text-danger">
                @error('image')
                {{ $message }}
                @enderror
              </span>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <label for="inputNanme4" class="form-label">Description	</label>
              <textarea name="description" class="form-control" rows="5">{{ $company->description ?? '' }}</textarea>
              <span class="text-danger">
                @error('description')
                {{ $message }}
                @enderror
              </span>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form><!-- Vertical Form -->

      </div>

    </div>
  </div>
</div>

@push('scripts')

<script>
        var elem = $('.custom-alert:eq(0)');
        console.log(elem.html());
        if(elem.html() != ""){
            setTimeout(() => {
                elem.fadeOut("slow");
            }, 1800);
        }
</script>

@endpush

@endsection