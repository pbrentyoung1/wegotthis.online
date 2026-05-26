<template>
  <div class="d-flex align-items-center gap-1">
    <button class="btn-icon btn btn-default">
      <Icon icon="video" class="fs-lg" />
    </button>

    <button class="btn btn-icon btn-default">
      <Icon icon="phone-call" class="fs-lg" />
    </button>

    <BDropdown end toggle-class="btn btn-default btn-icon drop-arrow-none shadow-none">
      <template #button-content>
        <Icon icon="dots-vertical" class="fs-lg" />
      </template>
      <BDropdownItem>
        <Icon icon="user" class="me-2" />
        View Profile
      </BDropdownItem>
      <BDropdownItem>
        <Icon icon="bell-off" class="me-2" />
        Mute Notifications
      </BDropdownItem>
      <BDropdownItem>
        <Icon icon="trash" class="me-2" />
        Delete Chat
      </BDropdownItem>
    </BDropdown>
  </div>
</template>

<script setup lang="ts">
import { BDropdown, BDropdownItem } from 'bootstrap-vue-next'
import Icon from '@/components/wrappers/Icon.vue'
</script>
