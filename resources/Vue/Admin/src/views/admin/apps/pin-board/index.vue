<template>
  <PageBreadcrumb title="Pin Board" subtitle="Apps" />

  <div class="card bg-transparent! shadow-none">
    <div class="card-body">
      <div class="p-7.5">
        <div class="flex flex-wrap justify-center gap-5">
          <div v-for="note in notes" :key="note.id" :class="['relative size-52.5 p-3.5 shadow-[4px_3px_7px_rgba(49,58,70,0.1)] transition-transform duration-300 hover:scale-110 hs-removing:hidden', note.className]" id="pin-1">
            <p class="mb-4 text-end text-2xs">{{ note.timestamp }}</p>
            <h4 class="mb-2 text-md">{{ note.title }}</h4>
            <p class="mb-4">
              {{ note.description }}
            </p>

            <a href="#" class="absolute end-3 bottom-3" @click.prevent="deleteNote(note.id)">
              <Icon icon="trash" class="text-base mb-1.25" />
            </a>
          </div>

          <div class="flex size-52.5 items-center justify-center p-3.5 transition-transform duration-300" id="pin-9">
            <a href="#" class="btn btn-icon btn-sm relative size-9.25 bg-primary text-white transition-transform duration-300 hover:scale-110" aria-haspopup="dialog" aria-expanded="false" aria-controls="addNoteModal" data-hs-overlay="#addNoteModal">
              <Icon icon="plus" class="text-base" />
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="addNoteModal" class="hs-overlay pointer-events-none fixed start-0 top-0 z-80 hidden size-full overflow-x-hidden overflow-y-auto hs-overlay-open:opacity-100 hs-overlay-open:duration-500" role="dialog" tabindex="-1" aria-labelledby="addNoteModalLabel">
    <div class="hs-overlay-animation-target m-3 flex min-h-[calc(100%-56px)] scale-95 items-center opacity-0 transition-all duration-200 ease-in-out md:mx-auto md:w-full md:max-w-lg hs-overlay-open:scale-100 hs-overlay-open:opacity-100">
      <div class="card pointer-events-auto flex w-full flex-col">
        <form @submit.prevent="addNote">
          <div class="card-header">
            <h3 id="addNoteModalLabel" class="text-sm font-bold">Add New Note</h3>

            <button type="button" aria-label="Close" data-hs-overlay="#addNoteModal">
              <Icon icon="x" class="text-xl" />
            </button>
          </div>

          <div class="card-body overflow-y-auto">
            <div class="mb-5">
              <label class="form-label">Title</label>
              <input type="text" class="form-input" placeholder="Enter note title" v-model="newNote.title" />
            </div>

            <div class="mb-5">
              <label class="form-label">Note Content</label>
              <textarea rows="3" class="form-textarea" placeholder="Write your note..." v-model="newNote.description"></textarea>
            </div>

            <div class="mb-5">
              <label class="form-label">Color Theme</label>
              <select class="form-select" v-model="newNote.className">
                <option value="bg-success/10" selected>Green (Success)</option>
                <option value="bg-primary/10">Blue (Primary)</option>
                <option value="bg-warning/10">Yellow (Warning)</option>
                <option value="bg-danger/10">Red (Danger)</option>
                <option value="bg-light">Light</option>
              </select>
            </div>
          </div>

          <div class="flex items-center justify-end gap-x-2 border-t border-default-300 p-5">
            <button type="button" class="btn bg-secondary text-white hover:bg-secondary-hover" data-hs-overlay="#addNoteModal">Cancel</button>

            <button type="submit" class="btn bg-primary text-white hover:bg-primary-hover">Add Note</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { pinNoteData } from './components/data'

const notes = ref([...pinNoteData])

const newNote = ref({
  id: '',
  title: '',
  description: '',
  className: 'bg-success-subtle',
  timestamp: '',
})

const addNote = () => {
  if (!newNote.value.title || !newNote.value.description) return

  notes.value = [
    ...notes.value,
    {
      id: Date.now().toString(),
      title: newNote.value.title,
      description: newNote.value.description,
      timestamp: new Date().toLocaleString(),
      className: newNote.value.className,
    },
  ]

  newNote.value.title = ''
  newNote.value.description = ''
  newNote.value.className = 'bg-success-subtle'

  // @ts-ignore
  window.HSOverlay?.close('#addNoteModal')
}

const deleteNote = (id: string) => {
  notes.value = notes.value.filter((note: any) => note.id !== id)
}
</script>
