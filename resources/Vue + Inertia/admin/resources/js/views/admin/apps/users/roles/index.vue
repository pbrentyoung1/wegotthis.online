<template>
  <PageBreadcrumb title="Roles" subtitle="Users" />
  <BRow class="d-flex justify-content-center">
    <BCol xxl="10">
      <div class="d-flex align-items-sm-center flex-sm-row flex-column mb-3">
        <div class="flex-grow-1">
          <h4 class="fs-xl mb-1">Manage Roles</h4>
          <p class="text-muted mb-0">Manage roles for smoother operations and secure access.</p>
        </div>

        <div class="text-end">
          <BButton variant="success"> <Icon icon="plus" class="me-1" /> Add New Role </BButton>
        </div>
      </div>

      <BRow>
        <BCol v-for="(member, idx) in memberRoleData" :key="idx" md="6" lg="3">
          <MemberRoleCard :member="member" />
        </BCol>
      </BRow>

      <BRow>
        <BCol cols="12">
          <UserTable />
        </BCol>
      </BRow>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Icon from '@/components/wrappers/Icon.vue'
import { memberRoleData } from './components/data'
import MemberRoleCard from './components/MemberRoleCard.vue'
import UserTable from './components/UserTable.vue'
</script>

<style scoped></style>
