<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Upload Photos — {{ $deliverable->title }}</title>
    @vite(['resources/css/app.css', 'resources/js/pages/photo-upload.js'])
</head>
<body class="bg-default-50 min-h-full">

    <div class="mx-auto max-w-lg px-4 py-10">

        {{-- Logo --}}
        <div class="mb-8 flex justify-center">
            <span class="flex dark:hidden text-[#1c1c1e]">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 410.77 239.43" class="h-10 w-auto max-w-full fill-current" aria-label="ForWorship">
                    <path d="M0,127.06V0H106.67V31.84H37.67V60.2h62.81v30.27H37.67v36.59H0Z"/>
                    <path d="M117.51,127.06V0h77.2c10.74,0,19.87,1.73,27.38,5.2s13.28,8.32,17.32,14.55,6.06,13.49,6.06,21.79c0,7.19-1.63,13.72-4.9,19.59s-7.97,10.6-14.1,14.18c-3.32,1.96-7.14,3.49-11.47,4.58l34.09,47.17h-43.05l-28.43-42.33h-22.43v42.33h-37.67ZM155.17,55.24h34.95c4.86,0,8.66-1.39,11.39-4.16s4.1-6.44,4.1-11c0-4.7-1.37-8.35-4.1-10.96s-6.53-3.92-11.39-3.92h-34.95v30.03Z"/>
                    <path d="M330.39,129.22c-13.3,0-25.14-2.94-35.52-8.83s-18.54-14.06-24.49-24.53-8.93-22.42-8.93-35.87,2.98-25.34,8.93-35.75,14.1-18.6,24.49-24.57S316.17,0,329.67,0s25.27,2.9,35.66,8.69,18.54,13.82,24.42,24.09,8.83,22.08,8.83,35.43-2.98,25.46-8.93,35.92-14.1,18.64-24.42,24.53-22.35,8.57-35.04,8.57h.2ZM329.87,97.52c6.72,0,12.75-1.65,18.08-4.94s9.54-7.99,12.61-14.08,4.61-13.18,4.61-21.27-1.54-14.98-4.61-21-7.27-10.72-12.61-14.08-11.39-5.04-18.16-5.04-12.87,1.68-18.28,5.04-9.68,8.08-12.81,14.18-4.7,13.12-4.7,21.06,1.57,14.95,4.7,20.97,7.41,10.7,12.81,14.02,11.59,4.98,18.37,4.98l.0,.14Z"/>
                    <path d="M.29,239.43l30.03-127.06h36.49l20.32,86.49,22.49-86.49h36.2l20.47,86.49,20.18-86.49h36.2l-29.74,127.06h-39.1l-21.28-84.78-21.18,84.78H.29Z"/>
                    <path d="M225.1,239.43v-127.06h77.2c10.74,0,19.87,1.73,27.38,5.2s13.28,8.32,17.32,14.55,6.06,13.49,6.06,21.79c0,7.19-1.63,13.72-4.9,19.59s-7.97,10.6-14.1,14.18c-3.32,1.96-7.14,3.49-11.47,4.58l34.09,47.17h-43.05l-28.43-42.33h-22.43v42.33h-37.67ZM262.77,167.61h34.95c4.86,0,8.66-1.39,11.39-4.16s4.1-6.44,4.1-11c0-4.7-1.37-8.35-4.1-10.96s-6.53-3.92-11.39-3.92h-34.95v30.03Z"/>
                    <path d="M375.51,239.43v-127.06h35.25v127.06h-35.25Z"/>
                </svg>
            </span>
            <span class="hidden dark:flex text-[#f7f4ee]">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 410.77 239.43" class="h-10 w-auto max-w-full fill-current" aria-label="ForWorship">
                    <path d="M0,127.06V0H106.67V31.84H37.67V60.2h62.81v30.27H37.67v36.59H0Z"/>
                    <path d="M117.51,127.06V0h77.2c10.74,0,19.87,1.73,27.38,5.2s13.28,8.32,17.32,14.55,6.06,13.49,6.06,21.79c0,7.19-1.63,13.72-4.9,19.59s-7.97,10.6-14.1,14.18c-3.32,1.96-7.14,3.49-11.47,4.58l34.09,47.17h-43.05l-28.43-42.33h-22.43v42.33h-37.67ZM155.17,55.24h34.95c4.86,0,8.66-1.39,11.39-4.16s4.1-6.44,4.1-11c0-4.7-1.37-8.35-4.1-10.96s-6.53-3.92-11.39-3.92h-34.95v30.03Z"/>
                    <path d="M330.39,129.22c-13.3,0-25.14-2.94-35.52-8.83s-18.54-14.06-24.49-24.53-8.93-22.42-8.93-35.87,2.98-25.34,8.93-35.75,14.1-18.6,24.49-24.57S316.17,0,329.67,0s25.27,2.9,35.66,8.69,18.54,13.82,24.42,24.09,8.83,22.08,8.83,35.43-2.98,25.46-8.93,35.92-14.1,18.64-24.42,24.53-22.35,8.57-35.04,8.57h.2ZM329.87,97.52c6.72,0,12.75-1.65,18.08-4.94s9.54-7.99,12.61-14.08,4.61-13.18,4.61-21.27-1.54-14.98-4.61-21-7.27-10.72-12.61-14.08-11.39-5.04-18.16-5.04-12.87,1.68-18.28,5.04-9.68,8.08-12.81,14.18-4.7,13.12-4.7,21.06,1.57,14.95,4.7,20.97,7.41,10.7,12.81,14.02,11.59,4.98,18.37,4.98l.0,.14Z"/>
                    <path d="M.29,239.43l30.03-127.06h36.49l20.32,86.49,22.49-86.49h36.2l20.47,86.49,20.18-86.49h36.2l-29.74,127.06h-39.1l-21.28-84.78-21.18,84.78H.29Z"/>
                    <path d="M225.1,239.43v-127.06h77.2c10.74,0,19.87,1.73,27.38,5.2s13.28,8.32,17.32,14.55,6.06,13.49,6.06,21.79c0,7.19-1.63,13.72-4.9,19.59s-7.97,10.6-14.1,14.18c-3.32,1.96-7.14,3.49-11.47,4.58l34.09,47.17h-43.05l-28.43-42.33h-22.43v42.33h-37.67ZM262.77,167.61h34.95c4.86,0,8.66-1.39,11.39-4.16s4.1-6.44,4.1-11c0-4.7-1.37-8.35-4.1-10.96s-6.53-3.92-11.39-3.92h-34.95v30.03Z"/>
                    <path d="M375.51,239.43v-127.06h35.25v127.06h-35.25Z"/>
                </svg>
            </span>
        </div>

        {{-- Heading --}}
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-bold text-default-900">{{ $deliverable->title }}</h1>
            @if ($deliverable->project)
                <p class="text-default-500 mt-1 text-sm">{{ $deliverable->project->name }}</p>
            @endif
            <p class="text-default-600 mt-3">Share your photos from this event.</p>
        </div>

        {{-- Upload form --}}
        <div class="card" id="upload-card">
            <div class="card-body space-y-5">

                <div>
                    <label class="form-label" for="uploader-name">Your name <span class="text-default-400">(optional)</span></label>
                    <input
                        class="form-input"
                        id="uploader-name"
                        name="uploader_name"
                        placeholder="e.g. Sarah Johnson"
                        type="text"
                    />
                </div>

                <div>
                    <label class="form-label" for="photo-input">Select photos</label>
                    <label
                        class="flex flex-col items-center justify-center gap-3 rounded-xl border-2 border-dashed border-default-300 bg-default-50 p-8 text-center cursor-pointer hover:border-primary hover:bg-primary/5 transition-colors"
                        for="photo-input"
                        id="drop-zone"
                    >
                        <i class="iconify tabler--photo-up text-default-400 size-10"></i>
                        <div>
                            <p class="font-semibold text-default-700">Tap to select photos</p>
                            <p class="text-default-400 text-sm mt-1">JPEG, PNG, HEIC or WebP · Max 20 MB each</p>
                        </div>
                    </label>
                    <input
                        accept="image/*"
                        class="sr-only"
                        id="photo-input"
                        multiple
                        name="file"
                        type="file"
                    />
                </div>

                {{-- Progress list --}}
                <div class="space-y-2 hidden" id="progress-list"></div>

                {{-- Keep open notice --}}
                <p class="text-default-400 text-xs text-center hidden" id="uploading-notice">
                    Keep this page open while photos are uploading.
                </p>

            </div>
        </div>

        {{-- Success state --}}
        <div class="card hidden" id="success-card">
            <div class="card-body py-10 text-center">
                <i class="iconify tabler--circle-check text-success mb-3 size-12"></i>
                <h2 class="text-lg font-semibold">Photos received!</h2>
                <p class="text-default-500 mt-1">Thank you for sharing.</p>
                <button class="btn bg-primary text-white hover:bg-primary-hover mt-6" id="upload-more-btn">
                    Upload more photos
                </button>
            </div>
        </div>

        <p class="text-center text-default-400 text-xs mt-8">Powered by ForWorship Creative</p>
    </div>

    <script>
        window.uploadSlug = @json($deliverable->upload_slug);
        window.uploadUrl  = @json(route('upload.store', $deliverable->upload_slug));
    </script>
</body>
</html>
