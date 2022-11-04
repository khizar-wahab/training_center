@extends('admin.layouts.app')

@push('title')
Admin | Add Company
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
        <h5 class="card-title">Add Company</h5>
      </div>
      <div class="card-body mt-5 bg-white py-5 px-5">
        <!-- Vertical Form -->
        <form class="row g-3" action="{{ route('admin.admin-companies.store') }}" method="post"
          enctype="multipart/form-data">
          @csrf
          <div class="row mb-1">
            <div class="col-lg-4">
              <label for="inputNanme4" class="form-label">Company Name</label>
              <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                id="inputNanme4">
              <span class="text-danger">
                @error('name')
                {{ $message }}
                @enderror
              </span>
            </div>
            <div class="col-lg-4">
              <label for="inputNanme4" class="form-label">Company Owner</label>
              <select name="user_id" class="form-control">
                <option>Select User</option>
                @foreach ($users as $user)
                  <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
              </select>
                @error('user_id')
                {{ $message }}
                @enderror
              </span>
            </div>
            <div class="col-lg-4">
              <label for="inputNanme4" class="form-label">Email</label>
              <input type="text" name="email" value="{{ old('email') }}" class="form-control"
                id="inputNanme4">
              <span class="text-danger">
                @error('email')
                {{ $message }}
                @enderror
              </span>
            </div>
          </div>
          <div class="row mb-1">
            <div class="col-lg-4">
              <label for="inputNanme4" class="form-label">Phone</label>
              <input type="text" name="phone" value="{{ old('phone') }}" class="form-control"
                id="inputNanme4">
              <span class="text-danger">
                @error('phone')
                {{ $message }}
                @enderror
              </span>
            </div>
            <div class="col-lg-4">
              <label for="inputNanme4" class="form-label">Website</label>
              <input type="text" name="website" value="{{ old('website') }}" class="form-control"
                id="inputNanme4">
              <span class="text-danger">
                @error('website')
                {{ $message }}
                @enderror
              </span>
            </div>
            <div class="col-lg-4">
              <label for="inputNanme4" class="form-label">Street</label>
              <input type="text" name="street" value="{{ old('street') }}" class="form-control"
                id="inputNanme4">
              <span class="text-danger">
                @error('street')
                {{ $message }}
                @enderror
              </span>
            </div>
          </div>
          <div class="row mb-1">
            <div class="col-lg-4">
              <label for="inputNanme4" class="form-label">City</label>
              <input type="text" name="city" value="{{ old('city') }}" class="form-control"
                id="inputNanme4">
              <span class="text-danger">
                @error('city')
                {{ $message }}
                @enderror
              </span>
            </div>
            <div class="col-lg-4">
              <label for="inputNanme4" class="form-label">State</label>
              <input type="text" name="state" value="{{ old('state') }}" class="form-control"
                id="inputNanme4">
              <span class="text-danger">
                @error('state')
                {{ $message }}
                @enderror
              </span>
            </div>
            <div class="col-lg-4">
              <label for="inputNanme4" class="form-label">Address</label>
              <input type="text" name="address" value="{{ old('address') }}" class="form-control"
                id="inputNanme4">
              <span class="text-danger">
                @error('address')
                {{ $message }}
                @enderror
              </span>
            </div>
          </div>
          <div class="row mb-1">
            <div class="col-lg-12">
              <label for="inputNanme4" class="form-label">Image</label>
              <input type="file" name="image" class="form-control" id="inputNanme4">
              <span class="text-danger">
                @error('image')
                {{ $message }}
                @enderror
              </span>
            </div>
          </div>
          <div class="row mb-1">
            <div class="col-lg-12">
              <label for="inputNanme4" class="form-label">Description	</label>
              <textarea name="description" class="form-control" rows="5"></textarea>
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