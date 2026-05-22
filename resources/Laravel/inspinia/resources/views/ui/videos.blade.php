@extends("shared.base", ["title" => "Videos"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "UI", "title" => "Videos"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "UI", "title" => "Videos"])

                <div class="container">
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
                        <div class="flex flex-col gap-base">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Responsive embed video 21:9</h5>
                                    <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                        <i class="iconify tabler--chevron-up text-base"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="relative aspect-21/9 w-full">
                                        <iframe class="h-full w-full" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Responsive embed video 1:1</h5>
                                    <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                        <i class="iconify tabler--chevron-up text-base"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="relative aspect-square w-full">
                                        <iframe class="h-full w-full" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-base">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Responsive embed video 16:9</h5>
                                    <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                        <i class="iconify tabler--chevron-up text-base"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="relative aspect-video w-full">
                                        <iframe class="h-full w-full" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Responsive embed video 4:3</h5>
                                    <button class="btn size-6 rounded-full bg-light text-dark hover:text-primary" data-action="card-toggle">
                                        <i class="iconify tabler--chevron-up text-base"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="relative aspect-4/3 w-full">
                                        <iframe class="h-full w-full" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            @include("shared.partials.footer")
        </div>
    </div>

    @include("shared.partials.customizer")
@endsection

@section("scripts")
@endsection
