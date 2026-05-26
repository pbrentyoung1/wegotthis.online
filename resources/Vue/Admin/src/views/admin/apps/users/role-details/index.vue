<template>
  <div class="container">
    <div class="my-5 flex flex-wrap items-center justify-between gap-3">
      <div>
        <h4 class="page-main-title mb-1.25">Role Details</h4>

        <p class="text-default-400">Define and manage roles to streamline operations and ensure secure access control.</p>
      </div>

      <div>
        <button class="btn bg-success text-white hover:bg-success-hover" data-hs-overlay="#addRoleModal">
          <Icon icon="plus" />
          Add New Role
        </button>
      </div>
    </div>

    <div class="grid grid-cols-1 gap-base lg:grid-cols-4">
      <div class="col-span-1">
        <MemberRoleCard />
      </div>

      <div class="lg:col-span-3">
        <UsersTable />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import Icon from '~/components/wrappers/Icon.vue'
import MemberRoleCard from './components/MemberRoleCard.vue'
import UsersTable from './components/UsersTable.vue'

</script>
