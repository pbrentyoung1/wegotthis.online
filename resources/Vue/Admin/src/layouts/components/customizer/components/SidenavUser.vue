<template>
  <div id="sidenav-user" class="p-6">
    <div class="flex items-center justify-between">
      <label class="m-0 font-bold" for="sidebaruser-check">Sidebar User Info</label>
      <input type="checkbox" class="form-switch" name="sidebar-user" id="sidebaruser-check" :checked="layout.sidenavUser" @change="() => updateLayout({ sidenavUser: !layout.sidenavUser })" />
    </div>
  </div>
</template>

<script setup lang="ts">
import { storeToRefs } from 'pinia'
import { useLayout } from '~/stores/layout'

const layoutStore = useLayout()

const { layout } = storeToRefs(layoutStore)
const { updateLayout } = layoutStore
</script>
