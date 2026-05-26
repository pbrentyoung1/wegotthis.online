<template>
  <PageBreadcrumb title="Pin Board" subtitle="Apps" />

  <BRow>
    <BCol cols="12">
      <BCard no-body class="bg-transparent shadow">
        <BCardBody>
          <div class="pin-board d-flex flex-wrap">
            <div v-for="note in notes" :key="note.id" :class="['pin-board-item', note.className]">
              <p class="text-end fs-10">{{ note.timestamp }}</p>
              <h4 class="fs-md">{{ note.title }}</h4>
              <p>{{ note.description }}</p>
              <Link href="" class="pin-board-delete fs-lg" @click="deleteNote(note.id)">
                <Icon icon="trash" />
              </Link>
            </div>
            <div class="pin-board-item pin-board-add d-flex align-items-center justify-content-center">
              <BButton variant="primary" class="btn-icon" @click="openPinModal = !openPinModal">
                <Icon icon="plus" />
              </BButton>
            </div>
          </div>
        </BCardBody>
      </BCard>
    </BCol>
  </BRow>

  <BModal @ok="addNote" v-model="openPinModal" centered class="fade" ok-title="Add Note" cancel-variant="secondary" title="Add New Note" title-tag="h5" tabindex="-1" aria-labelledby="addNoteModalLabel" aria-hidden="true">
    <form id="addNoteForm" @submit.prevent="addNote">
      <div class="mb-3">
        <label class="form-label fw-semibold">Title</label>
        <input type="text" v-model="newNote.title" class="form-control" name="noteTitle" placeholder="Enter note title" required />
      </div>

      <div class="mb-3">
        <label class="form-label fw-semibold">Note Content</label>
        <textarea v-model="newNote.description" class="form-control" name="noteContent" rows="3" placeholder="Write your note..." required></textarea>
      </div>

      <div>
        <label class="form-label fw-semibold">Color Theme</label>
        <BFormSelect v-model="newNote.className" name="noteColor">
          <BFormSelectOption value="bg-success-subtle" selected>Green (Success)</BFormSelectOption>
          <BFormSelectOption value="bg-primary-subtle">Blue (Primary)</BFormSelectOption>
          <BFormSelectOption value="bg-warning-subtle">Yellow (Warning)</BFormSelectOption>
          <BFormSelectOption value="bg-danger-subtle">Red (Danger)</BFormSelectOption>
          <BFormSelectOption value="bg-light-subtle">Light</BFormSelectOption>
        </BFormSelect>
      </div>
    </form>
  </BModal>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BButton, BCard, BCardBody, BCol, BRow } from 'bootstrap-vue-next'
import { ref } from 'vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Icon from '@/components/wrappers/Icon.vue'
import { pinNoteData, type PinNoteType } from './components/data'

const notes = ref<PinNoteType[]>(pinNoteData)

const openPinModal = ref<boolean>(false)

const newNote = ref({
  id: '',
  title: '',
  description: '',
  className: 'bg-success-subtle',
  timestamp: '',
})

const addNote = () => {
  if (!newNote.value.title || !newNote.value.description) return

  notes.value.push({
    id: Date.now().toString(),
    title: newNote.value.title,
    description: newNote.value.description,
    timestamp: new Date().toLocaleString(),
    className: newNote.value.className,
  })

  newNote.value = { title: '', description: '', className: 'bg-success-subtle', id: '', timestamp: '' }
  openPinModal.value = false
}

const deleteNote = (id: string) => {
  notes.value = notes.value.filter((note: PinNoteType) => note.id !== id)
}
</script>
