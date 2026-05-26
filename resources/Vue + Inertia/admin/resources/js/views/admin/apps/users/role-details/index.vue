<template>
  <PageBreadcrumb title="Role Details" subtitle="Users" />

  <BRow>
    <BCol md="4" lg="3">
      <RoleDetailCard />
    </BCol>

    <BCol md="8" lg="9">
      <UserTable />
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import RoleDetailCard from './components/RoleDetailCard.vue'
import UserTable from './components/UserTable.vue'
</script>
<style scoped></style>
