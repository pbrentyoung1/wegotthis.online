<template>
  <PageBreadcrumb title="Pagination" subtitle="UI" />

  <div class="container-xxl">
    <BRow>
      <BCol cols="12">
        <BCard no-body>
          <BCardHeader>
            <BCardTitle tag="h4">Examples</BCardTitle>
          </BCardHeader>

          <BCardBody>
            <p class="text-muted mb-2">Documentation and examples for showing pagination to indicate a series of related content exists across multiple pages.</p>

            <Link class="btn btn-link p-0 fw-semibold" href="https://bootstrap-vue-next.github.io/bootstrap-vue-next/docs/components/pagination.html" target="_blank">
              Pagination on Bootstrap
              <Icon icon="chevron-right" class="ms-1" />
            </Link>
          </BCardBody>
        </BCard>
      </BCol>

      <BCol xl="6">
        <CardWithAction title="Default Pagination" isCollapsable>
          <BPagination v-model="currentPage" :total-rows="25" :per-page="perPageItem" class="mb-0" first-number last-number prev-text="Previous" next-text="Next" />
        </CardWithAction>

        <CardWithAction title="Alignment" isCollapsable>
          <BPagination v-model="currentPage" :total-rows="15" :per-page="perPageItem" prev-text="Previous" next-text="Next" class="justify-content-center" first-number last-number />
          <BPagination v-model="currentPage" :total-rows="15" :per-page="perPageItem" prev-text="Previous" next-text="Next" class="justify-content-end mb-0" first-number last-number />
        </CardWithAction>

        <CardWithAction title="Custom Color Pagination" isCollapsable>
          <BPagination v-model="currentPage" :total-rows="25" :per-page="perPageItem" class="pagination-boxed pagination-info" first-number last-number>
            <template #prev-text>
              <Icon icon="chevron-left" class="ti ti-chevron-left" />
            </template>
            <template #next-text>
              <Icon icon="chevron-right" class="align-middle" />
            </template>
          </BPagination>

          <BPagination v-model="currentPage" :total-rows="25" :per-page="perPageItem" class="pagination-boxed pagination-secondary" first-number last-number>
            <template #prev-text>
              <Icon icon="arrow-left" class="ti ti-chevron-left" />
            </template>
            <template #next-text>
              <Icon icon="arrow-right" class="align-middle" />
            </template>
          </BPagination>
        </CardWithAction>

        <CardWithAction title="Disabled and active states" isCollapsable>
          <BPagination v-model="currentPage" :total-rows="15" :per-page="perPageItem" prev-text="Previous" next-text="Next" first-number last-number />
        </CardWithAction>

        <CardWithAction title="Custom Icon Pagination" isCollapsable>
          <BPagination v-model="currentPage" :total-rows="25" :per-page="perPageItem" class="pagination-boxed" first-number last-number>
            <template #prev-text>
              <Icon icon="chevron-left" class="ti ti-chevron-left" />
            </template>
            <template #next-text>
              <Icon icon="chevron-right" class="align-middle" />
            </template>
          </BPagination>

          <BPagination v-model="currentPage" :total-rows="25" :per-page="perPageItem" class="pagination-boxed" first-number last-number>
            <template #prev-text>
              <Icon icon="arrow-left" class="ti ti-chevron-left" />
            </template>
            <template #next-text>
              <Icon icon="arrow-right" class="align-middle" />
            </template>
          </BPagination>
        </CardWithAction>
      </BCol>

      <BCol xl="6">
        <CardWithAction title="Sizing" isCollapsable>
          <BPagination v-model="currentPage" :total-rows="15" :per-page="perPageItem" size="lg" first-number last-number hide-goto-end-buttons prev-text="«" next-text="»" />
          <BPagination v-model="currentPage" :total-rows="15" :per-page="perPageItem" size="sm" class="mb-0" first-number last-number prev-text="«" next-text="»" />
        </CardWithAction>

        <CardWithAction title="Boxed Pagination" isCollapsable>
          <BPagination v-model="currentPage" :total-rows="25" :per-page="perPageItem" class="pagination-boxed" first-number last-number prev-text="«" next-text="»" />
          <BPagination v-model="currentPage" :total-rows="25" :per-page="perPageItem" size="lg" class="pagination-boxed" first-number last-number prev-text="«" next-text="»" />
          <BPagination v-model="currentPage" :total-rows="25" :per-page="perPageItem" size="sm" class="pagination-boxed mb-0" first-number last-number prev-text="«" next-text="»" />
        </CardWithAction>

        <CardWithAction title="Rounded Pagination" isCollapsable>
          <BPagination v-model="currentPage" :total-rows="25" :per-page="perPageItem" class="pagination-rounded pagination-boxed mb-0" first-number last-number prev-text="«" next-text="»" />
        </CardWithAction>

        <CardWithAction title="Soft Pagination" isCollapsable>
          <BPagination v-model="currentPage" :total-rows="25" :per-page="perPageItem" class="pagination-soft-danger pagination-boxed mb-0" first-number last-number>
            <template #prev-text>
              <Icon icon="chevron-left" />
            </template>
            <template #next-text>
              <Icon icon="chevron-right" />
            </template>
          </BPagination>
        </CardWithAction>
      </BCol>
    </BRow>
  </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BCard, BCardBody, BCardHeader, BCardTitle, BCol, BPagination, BRow } from 'bootstrap-vue-next'
import { ref } from 'vue'
import CardWithAction from '@/components/CardWithAction.vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Icon from '@/components/wrappers/Icon.vue'

const perPageItem = ref(5)
const currentPage = ref(1)
</script>

<style scoped></style>
