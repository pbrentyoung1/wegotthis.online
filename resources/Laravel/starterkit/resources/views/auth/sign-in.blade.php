@extends("shared.base", ["title" => "Sign in"])

@section("styles")
<style>
    /* On mobile, pull the card up to overlap the dark brand header and give it a bottom-sheet shape */
    @media (max-width: 767px) {
        .auth-form-card {
            margin-top: -1.75rem !important;
            border-radius: 2rem 2rem 0 0 !important;
            border: none !important;
            box-shadow: 0 -8px 30px rgba(0, 0, 0, 0.08) !important;
            padding: 2rem 1.75rem 1.5rem !important;
        }
    }
</style>
@endsection

@section("content")
    {{-- Mobile: dark brand header + white card sliding up from below.
         Desktop: centered card layout (unchanged). --}}
    <div class="flex min-h-screen flex-col md:items-center md:justify-center md:p-12.5">

        {{-- Mobile-only dark brand header --}}
        <div class="flex flex-col items-center px-8 pb-14 pt-16 text-center md:hidden" style="background: linear-gradient(150deg, #1e2d35 0%, #1c1c1e 100%)">
            @include("auth.partials.logo", ["invert" => true, "logoClass" => "h-14"])
            <h2 class="text-xl font-bold text-[#f7f4ee]">Welcome back</h2>
            <p class="mt-2 text-sm leading-relaxed text-[#f7f4ee]/60">Enter your email and password to continue.</p>
        </div>

        {{-- White fill area on mobile; container on desktop --}}
        <div class="flex-1 bg-white md:flex-none md:bg-transparent md:container">
            <div class="md:flex md:justify-center md:px-2.5">
                <div class="w-full sm:w-2/3 md:w-1/2 2xl:w-4/10">

                    {{-- Desktop-only logo + heading above the card --}}
                    <div class="mb-3 hidden flex-col items-center justify-center text-center md:flex">
                        @include("auth.partials.logo")
                        <h4 class="mb-2 mt-2 text-base font-bold text-dark">Welcome back</h4>
                        <p class="mb-4 w-full text-default-400 lg:w-3/4">Enter your email and password to continue.</p>
                    </div>

                    {{-- Form card: .card handles desktop styling; auth-form-card CSS overrides for mobile --}}
                    <div class="card p-7.5 rounded-2xl auth-form-card">
                        @include("auth.partials.messages")
                        <form action="{{ route("login.store") }}" method="POST">
                            @csrf
                            <div class="mb-5">
                                <label class="form-label" for="userEmail">
                                    Email address
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input autocomplete="email" autofocus class="form-input" id="userEmail" name="email" placeholder="you@example.com" required type="email" value="{{ old("email") }}" />
                                </div>
                            </div>
                            <div class="mb-5">
                                <label class="form-label" for="userPassword">
                                    Password
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input autocomplete="current-password" class="form-input" id="userPassword" name="password" placeholder="••••••••" required type="password" />
                                </div>
                            </div>
                            <div class="mb-5 flex items-center justify-between gap-3">
                                <div class="flex items-center gap-2">
                                    <input class="form-checkbox form-checkbox-light size-4.25 shrink-0" id="rememberMe" name="remember" type="checkbox" />
                                    <label class="form-check-label whitespace-nowrap" for="rememberMe">Keep me signed in</label>
                                </div>
                                <a class="shrink-0 whitespace-nowrap text-default-400 underline underline-offset-4" href="{{ route("password.request") }}">Forgot password?</a>
                            </div>
                            <div>
                                <button class="btn bg-primary w-full py-3 font-semibold text-white hover:bg-primary-hover" type="submit">Sign In</button>
                            </div>
                        </form>
                    </div>

                    {{-- Mobile copyright --}}
                    <p class="py-8 text-center text-sm text-default-400 md:hidden">
                        © <span data-current-year=""></span> ForWorship Creative
                    </p>

                    {{-- Desktop copyright --}}
                    <p class="mt-7.5 hidden text-center text-default-400 md:block">
                        © <span data-current-year=""></span> ForWorship Creative
                    </p>

                </div>
            </div>
        </div>
    </div>

    @include("shared.partials.customizer")
@endsection

@section("scripts")
@endsection
