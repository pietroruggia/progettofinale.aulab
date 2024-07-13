<x-layout>
    <div class="container-fluid ">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-1 p-4 mt-5">{{ __('ui.register') }}</h1>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-8 border p-5 shadow rounded souloutimg">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold ">{{ __('ui.username') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                        @error('name')
                        <div class="text-danger">{{ __('ui.name1') }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">{{ __('ui.mail') }}</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror " name="email">
                        @error('email')
                        <div class="text-danger">{{ __('ui.email') }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">{{ __('ui.password') }}</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror " name="password">
                        @error('password')
                        <div class="text-danger">{{ __('ui.pass') }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">{{ __('ui.confirmPassword') }}</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror " name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-success">{{ __('ui.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
