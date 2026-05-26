<template>
  <BCard class="card-h-100" no-body>
    <BCardBody>
      <div class="d-flex align-items-center mb-4">
        <div class="me-3 position-relative">
          <img v-if="contact.image" :src="contact.image" alt="avatar" class="rounded-circle" width="72" height="72" />

          <div v-else class="avatar rounded-circle flex-shrink-0" style="height: 72px; width: 72px">
            <span class="avatar-title text-bg-primary fw-semibold rounded-circle fs-22">
              {{ generateInitials(contact.name) }}
            </span>
          </div>

          <span :class="`position-absolute bottom-0 end-0 badge bg-${contact.variant} rounded-circle p-1 shadow-sm`" title="Rating 4.8">
            <Icon icon="star" class="text-white" />
          </span>
        </div>

        <div>
          <h5 class="mb-1 d-flex align-items-center">
            <Link href="/apps/users/profile" class="link-reset">
              {{ contact.name }}
            </Link>

            <img :src="contact.flag" alt="flag" class="ms-2 rounded-circle" height="16" />
          </h5>

          <p class="text-muted mb-1">
            {{ contact.position }}
          </p>

          <span class="badge text-bg-light badge-label">
            {{ contact.role }}
          </span>
        </div>

        <div class="ms-auto">
          <BDropdown variant="link" toggle-class="btn btn-icon btn-ghost-light text-muted drop-arrow-none" placement="bottom-end" no-caret>
            <template #button-content>
              <Icon icon="dots-vertical" class="fs-xl" />
            </template>

            <BDropdownItem href="#">
              <Icon icon="share" class="me-2" />
              Share
            </BDropdownItem>

            <BDropdownItem href="#">
              <Icon icon="edit" class="me-2" />
              Edit
            </BDropdownItem>

            <BDropdownItem href="#">
              <Icon icon="ban" class="me-2" />
              Block
            </BDropdownItem>

            <BDropdownItem class="text-danger" href="#">
              <Icon icon="trash" class="me-2" />
              Delete
            </BDropdownItem>
          </BDropdown>
        </div>
      </div>

      <ul class="list-unstyled text-muted mb-4">
        <li class="mb-2">
          <div class="d-flex align-items-center gap-2">
            <div class="avatar-xs avatar-img-size fs-24">
              <span class="avatar-title text-bg-light fs-sm rounded-circle">
                <Icon icon="mail" />
              </span>
            </div>

            <h5 class="fs-base mb-0 fw-medium">
              <Link href="#" class="link-reset">
                {{ contact.email }}
              </Link>
            </h5>
          </div>
        </li>

        <li class="mb-2">
          <div class="d-flex align-items-center gap-2">
            <div class="avatar-xs avatar-img-size fs-24">
              <span class="avatar-title text-bg-light fs-sm rounded-circle">
                <Icon icon="phone" />
              </span>
            </div>

            <h5 class="fs-base mb-0 fw-medium">
              <Link href="#" class="link-reset">
                {{ contact.contact }}
              </Link>
            </h5>
          </div>
        </li>

        <li class="mb-2">
          <div class="d-flex align-items-center gap-2">
            <div class="avatar-xs avatar-img-size fs-24">
              <span class="avatar-title text-bg-light fs-sm rounded-circle">
                <Icon icon="map-pin" />
              </span>
            </div>

            <h5 class="fs-base mb-0 fw-medium">
              {{ contact.location }}
            </h5>
          </div>
        </li>

        <li>
          <div class="d-flex align-items-center gap-2">
            <div class="avatar-xs avatar-img-size fs-24">
              <span class="avatar-title text-bg-light fs-sm rounded-circle">
                <Icon icon="link" />
              </span>
            </div>

            <h5 class="fs-base mb-0 fw-medium">
              <Link href="#">
                {{ contact.website }}
              </Link>
            </h5>
          </div>
        </li>
      </ul>

      <div class="d-flex justify-content-between align-items-center">
        <span class="text-muted fs-xs">
          <Icon icon="refresh" class="me-1" />
          {{ contact.updatedTime }}
        </span>

        <Link href="/apps/users/profile" class="btn btn-soft-primary btn-sm rounded-pill"> View Profile </Link>
      </div>
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import Icon from '@/components/wrappers/Icon.vue'
import { generateInitials } from '@/utils/helpers'
import type { ContactType } from './data'

defineProps<{ contact: ContactType }>()
</script>
