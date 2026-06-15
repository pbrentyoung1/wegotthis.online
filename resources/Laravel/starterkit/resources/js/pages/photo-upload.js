document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('photo-input')
    const progressList = document.getElementById('progress-list')
    const uploadCard = document.getElementById('upload-card')
    const successCard = document.getElementById('success-card')
    const uploadMoreBtn = document.getElementById('upload-more-btn')
    const uploadingNotice = document.getElementById('uploading-notice')

    if (!input) return

    input.addEventListener('change', () => {
        const files = Array.from(input.files || [])
        if (!files.length) return

        progressList.classList.remove('hidden')
        uploadingNotice.classList.remove('hidden')

        // Queue uploads sequentially to avoid overwhelming mobile connections
        uploadFiles(files).then(() => {
            uploadingNotice.classList.add('hidden')
        })
    })

    uploadMoreBtn?.addEventListener('click', () => {
        successCard.classList.add('hidden')
        uploadCard.classList.remove('hidden')
        progressList.innerHTML = ''
        progressList.classList.add('hidden')
        input.value = ''
    })

    async function uploadFiles(files) {
        const uploaderName = document.getElementById('uploader-name')?.value?.trim() || ''

        for (const file of files) {
            await uploadOne(file, uploaderName)
        }

        // All done — show success
        const allSucceeded = progressList.querySelectorAll('.upload-row.failed').length === 0
        if (allSucceeded) {
            uploadCard.classList.add('hidden')
            successCard.classList.remove('hidden')
        }
    }

    async function uploadOne(file, uploaderName) {
        const row = createProgressRow(file.name)
        progressList.appendChild(row)

        const formData = new FormData()
        formData.append('file', file)
        if (uploaderName) formData.append('uploader_name', uploaderName)

        // Laravel CSRF token from meta tag or cookie
        const csrf = document.cookie.split(';').map(c => c.trim()).find(c => c.startsWith('XSRF-TOKEN='))
        const token = csrf ? decodeURIComponent(csrf.split('=')[1]) : null

        try {
            const response = await fetch(window.uploadUrl, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    ...(token ? { 'X-XSRF-TOKEN': token } : {}),
                },
                body: formData,
            })

            const data = await response.json()

            if (response.ok && data.success) {
                setRowStatus(row, 'done')
            } else {
                setRowStatus(row, 'failed', data.error || 'Upload failed')
                row.classList.add('failed')
            }
        } catch (err) {
            setRowStatus(row, 'failed', 'Connection error. Please try again.')
            row.classList.add('failed')
        }
    }

    function createProgressRow(name) {
        const row = document.createElement('div')
        row.className = 'upload-row flex items-center gap-3 rounded-lg bg-default-100 px-3 py-2 text-sm'
        row.innerHTML = `
            <i class="iconify tabler--photo text-default-400 size-4 shrink-0"></i>
            <span class="flex-1 truncate text-default-700">${escapeHtml(name)}</span>
            <span class="row-status text-default-400 shrink-0">
                <i class="iconify tabler--loader-2 size-4 animate-spin"></i>
            </span>
        `
        return row
    }

    function setRowStatus(row, status, message) {
        const statusEl = row.querySelector('.row-status')
        if (status === 'done') {
            statusEl.innerHTML = '<i class="iconify tabler--circle-check text-success size-4"></i>'
        } else {
            statusEl.innerHTML = `<span class="text-danger text-xs">${escapeHtml(message || 'Failed')}</span>`
        }
    }

    function escapeHtml(str) {
        return str.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;')
    }
})
