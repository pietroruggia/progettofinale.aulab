<x-layout>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-1 p-4 mt-5">{{ __('ui.login') }}</h1>
            </div>
        </div>
    </div>
    <div class="container mt-4 ">
        <div class="row justify-content-center">
            <div class="col-8 border p-5 shadow rounded souloutimg">
                <form method="POST" action="{{route('login')}}" >
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">{{ __('ui.mail') }}</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" >
                        @error('email')
                        <div class="text-danger">{{ __('ui.email') }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold ">{{ __('ui.password') }}</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror " name="password" {{old('password')}}>
                        @error('password')
                        <div class="text-danger">{{ __('ui.pass') }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">{{ __('ui.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
