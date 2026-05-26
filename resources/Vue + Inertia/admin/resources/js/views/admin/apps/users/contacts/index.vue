<template>
  <PageBreadcrumb title="Contacts" subtitle="Users" />

  <BRow class="mb-3">
    <BCol lg="12">
      <form class="bg-light-subtle rounded border p-3">
        <BRow class="gap-3">
          <BCol lg="4">
            <div class="app-search">
              <input type="text" class="form-control" placeholder="Search contact name..." />
              <Icon icon="search" class="app-search-icon text-muted" />
            </div>
          </BCol>

          <BCol>
            <div class="d-flex flex-wrap align-items-center gap-2">
              <span class="me-2 fw-semibold">Filter By:</span>

              <div class="app-search">
                <BFormSelect v-model="designation" class="form-control my-1 my-md-0">
                  <option value="All">Designation</option>
                  <option value="Manager">Manager</option>
                  <option value="Developer">Developer</option>
                  <option value="Designer">Designer</option>
                  <option value="Sales">Sales</option>
                  <option value="Support">Support</option>
                </BFormSelect>
                <Icon icon="user-check" class="app-search-icon text-muted" />
              </div>

              <div class="app-search">
                <BFormSelect v-model="location" class="form-control my-1 my-md-0">
                  <option value="All">Location</option>
                  <option value="USA">USA</option>
                  <option value="UK">UK</option>
                  <option value="Germany">Germany</option>
                  <option value="India">India</option>
                  <option value="Canada">Canada</option>
                </BFormSelect>
                <Icon icon="map-pin" class="app-search-icon text-muted" />
              </div>

              <div class="app-search">
                <BFormSelect v-model="department" class="form-control my-1 my-md-0">
                  <option value="All">Department</option>
                  <option value="UI/UX">UI/UX</option>
                  <option value="Engineering">Engineering</option>
                  <option value="HR">HR</option>
                  <option value="Marketing">Marketing</option>
                  <option value="Finance">Finance</option>
                </BFormSelect>
                <Icon icon="stack-2" class="app-search-icon text-muted" />
              </div>

              <BButton type="submit" variant="secondary">Apply</BButton>

              <div role="group" aria-label="Layout toggle button group" class="ms-auto flex-shrink-0">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" checked />
                <label class="btn btn-soft-primary btn-icon me-1" for="btnradio1">
                  <Icon icon="apps" class="fs-lg" />
                </label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" />
                <label class="btn btn-soft-primary btn-icon" for="btnradio2">
                  <Icon icon="list-check" class="fs-lg" />
                </label>
              </div>
            </div>
          </BCol>
        </BRow>
      </form>
    </BCol>
  </BRow>

  <BRow>
    <BCol v-for="(contact, idx) in contactData" :key="idx" xxl="3" md="6">
      <ContactCard :contact="contact" />
    </BCol>
  </BRow>

  <ul class="pagination pagination-rounded pagination-boxed justify-content-center">
    <li class="page-item">
      <Link class="page-link" href="" aria-label="Previous">
        <Icon icon="chevron-left" class="align-middle fs-lg"></Icon>
      </Link>
    </li>
    <li class="page-item active">
      <Link class="page-link" href="">1</Link>
    </li>
    <li class="page-item">
      <Link class="page-link" href="">2</Link>
    </li>
    <li class="page-item">
      <Link class="page-link" href="">3</Link>
    </li>
    <li class="page-item">
      <Link class="page-link" href="">4</Link>
    </li>
    <li class="page-item">
      <Link class="page-link" href="">5</Link>
    </li>
    <li class="page-item">
      <Link class="page-link" href="javascript: void(0);" aria-label="Next">
        <Icon icon="chevron-right" class="align-middle fs-lg"></Icon>
      </Link>
    </li>
  </ul>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BButton, BCol, BFormSelect, BRow } from 'bootstrap-vue-next'
import { ref } from 'vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Icon from '@/components/wrappers/Icon.vue'
import ContactCard from './components/ContactCard.vue'
import { contactData } from './components/data'

const designation = ref('All')
const location = ref('All')
const department = ref('All')
</script>
