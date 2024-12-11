@extends('backend.app')

@section('title', 'Profile Settings')

@section('content')

{{-- Title and Breadcrumb --}}
<div class="container">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h2 class="page-title fw-bold text-default">
                <i class="lni lni-user"></i> Profile Settings
            </h2>
        </div>

    </div>
</div>

<div class="mt-4 row">
    {{-- Profile Card --}}
    <div class="mx-auto col-md-8">
        <div class="border-0 shadow card rounded-4">
            <div class="text-white card-header bg-dark d-flex align-items-center">
                <h5 class="mb-0">
                    <i class="lni lni-user"></i> Personal Information
                </h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('update.profile.picture') }} " enctype="multipart/form-data">
                    @csrf
                    {{-- Profile Picture --}}
                    <div class="mb-4 text-center">
                        <div class="avatar avatar-xxl position-relative">
                            <img id="profile-picture" class="avatar-img rounded-circle"
                                src="{{ asset(Auth::user()->photo ?? 'backend/img/jm_denis.jpg') }}"
                                alt="Profile Picture" class="shadow-lg rounded-circle"
                                style="width: 130px; height: 130px; object-fit: cover; border: 3px solid #ddd;">
                            <label for="profile_picture_input"
                                class="bottom-0 btn btn-xs btn-rounded btn-default position-absolute end-0 ">
                                <i class="icon-cloud-upload"></i>
                            </label>
                            <input type="file" id="profile_picture_input" class="d-none" name="photo">

                        </div>
                        <!-- <p class="mt-2 text-muted">Upload a clear and professional picture.</p> -->
                    </div>
                </form>
                <form method="POST" action="{{ route('profile.setting') }} ">
                    @csrf


                    {{-- Name and Email --}}
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="name" class="form-label fw-semibold">Name</label>
                            <input type="text" id="name" name="name" class="shadow-sm form-control"
                                value="{{ Auth::user()->name }}" placeholder="Your full name">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" id="email" name="email" class="shadow-sm form-control"
                                value="{{ Auth::user()->email }}" placeholder="Your email address">
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <div class="mt-4 text-end">
                        <button type="submit" class="px-4 shadow-sm btn btn-success">
                            <i class="lni lni-save"></i> Save Changes
                        </button>
                        <a href="{{ route('dashboard') }}" class="px-4 shadow-sm btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Password Section --}}
<div class="mt-5 row">
    <div class="mx-auto col-md-8">
        <div class="border-0 shadow card rounded-4">
            <div class="text-white card-header bg-danger d-flex align-items-center">
                <h5 class="mb-0">
                    <i class="lni lni-lock"></i> Update Password
                </h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('update.password') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="old_password" class="form-label fw-semibold">Current Password</label>
                        <input type="password" id="old_password" name="old_password" class="shadow-sm form-control"
                            placeholder="Enter current password">
                    </div>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="password" class="form-label fw-semibold">New Password</label>
                            <input type="password" id="password" name="password" class="shadow-sm form-control"
                                placeholder="Enter new password">
                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="shadow-sm form-control" placeholder="Confirm new password">
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <div class="mt-4 text-end">
                        <button type="submit" class="px-4 shadow-sm btn btn-danger">
                            <i class="lni lni-lock-alt"></i> Update Password
                        </button>
                        <a href="{{ route('dashboard') }}" class="px-4 shadow-sm btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $(document).ready(function() {
    // Trigger file input click when profile picture is clicked
    $('#profile-picture').click(function() {
        $('#profile_picture_input').click();
    });

    // Handle the file input change event
    $('#profile_picture_input').change(function() {
        const formData = new FormData();
        formData.append('photo', $(this)[0].files[0]);
        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
            url: "{{ route('update.profile.picture') }}",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.success) {
                    $('#profile-picture').attr('src', data.image_url);
                    toastr.success('Profile picture updated successfully.');
                } else {
                    toastr.error(data.message);
                }
            },
            error: function(e) {

                if(e.status === 422){
                    toastr.error(e.responseJSON?.message);
                }else{
                    toastr.error(e.responseJSON?.message);
                }
                
            }
        });
    });
});

</script>
@endpush