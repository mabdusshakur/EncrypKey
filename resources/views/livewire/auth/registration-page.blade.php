<div class="bg-register">
    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5 col-xxl-4 mx-auto">
                <div class="card rounded-4 mt-4">
                    <div class="card-body p-5">
                        <h4 class="fw-bold">Get Started Now</h4>
                        <p class="mb-0">Enter your credentials to create your account</p>

                        <div class="form-body my-4">
                            <form class="row g-3" wire:submit.prevent="registration">
                                <div class="col-12">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" placeholder="jhon" wire:model.live.debounce.250ms="name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" placeholder="jhon@example.com"
                                        wire:model.live.debounce.250ms="email">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input type="password"
                                            class="form-control border-end-0 @error('password') is-invalid @enderror"
                                            id="password" placeholder="Enter Password"
                                            wire:model.live.debounce.250ms="password">
                                        <a href="javascript:;" class="input-group-text bg-transparent">
                                            <i class="bi bi-eye-slash-fill"></i>
                                        </a>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirmation" placeholder="Re Enter Password"
                                        wire:model.live.debounce.250ms="password_confirmation">
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Register</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="text-start">
                                        <p class="mb-0">Already have an account? <a href="{{ route('login') }}">Login
                                                here</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>

                        {{-- <div class="separator section-padding">
                                <div class="line"></div>
                                <p class="mb-0 fw-bold">OR</p>
                                <div class="line"></div>
                            </div>
    
                            <div class="d-flex gap-3 justify-content-center mt-4">
                                <a href="javascript:;"
                                    class="wh-48 d-flex align-items-center justify-content-center rounded-circle border">
                                    <img src="{{ asset('assets/images/apps/google_no_bg.png') }}" width="30" alt="">
                                </a>
                            </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--plugins-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bi-eye-slash-fill");
                    $('#show_hide_password i').removeClass("bi-eye-fill");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bi-eye-slash-fill");
                    $('#show_hide_password i').addClass("bi-eye-fill");
                }
            });
        });
    </script>
</div>
