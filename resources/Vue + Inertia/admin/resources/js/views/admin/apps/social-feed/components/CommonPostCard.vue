<template>
  <BCard no-body>
    <BCardBody class="pb-2">
      <div class="d-flex align-items-center mb-2">
        <img :src="props.image" class="me-2 avatar-md rounded-circle" />
        <div class="w-100">
          <h5 class="m-0">
            <Link href="/apps/users/profile" class="link-reset">{{ props.name }}</Link>
          </h5>
          <p class="text-muted mb-0">
            <small>{{ props.time }}</small>
          </p>
        </div>

        <BDropdown placement="bottom-end" toggle-class="bg-transparent border-0 text-muted drop-arrow-none card-drop p-0">
          <template #button-content>
            <Icon icon="dots-vertical" class="fs-lg" />
          </template>
          <BDropdownItem href="">
            <Icon icon="edit" class="me-2" />
            Edit Post
          </BDropdownItem>
          <BDropdownItem href="">
            <Icon icon="trash" class="me-2" />
            Delete Post
          </BDropdownItem>
          <BDropdownItem href="">
            <Icon icon="share" class="me-2" />
            Share
          </BDropdownItem>
          <BDropdownItem href="">
            <Icon icon="pin" class="me-2" />
            Pin to Top
          </BDropdownItem>
          <BDropdownItem href="">
            <Icon icon="flag" class="me-2" />
            Report Post
          </BDropdownItem>
        </BDropdown>
      </div>

      <p v-if="props.description">{{ props.description }}</p>
      <slot />

      <div class="mt-2">
        <Link href="" class="btn btn-sm fs-sm btn-link text-muted">
          <Icon icon="corner-up-left" class="me-1" />
          Reply
        </Link>
        <span class="btn btn-sm fs-sm btn-link text-muted"> <Icon icon="heart-filled" class="text-danger me-1" /> Liked! </span>
        <Link href="" class="btn btn-sm fs-sm btn-link text-muted">
          <Icon icon="share" class="me-1" />
          Share
        </Link>
      </div>
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BCard, BCardBody, BDropdown, BDropdownItem } from 'bootstrap-vue-next'
import Icon from '@/components/wrappers/Icon.vue'

const props = defineProps({
  image: String,
  name: String,
  time: String,
  description: String,
})
</script>
