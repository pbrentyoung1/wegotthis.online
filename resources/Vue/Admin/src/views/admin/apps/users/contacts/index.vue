<template>
  <PageBreadcrumb title="Contacts" subtitle="Users" />

  <div class="card mb-base">
    <div class="card-body">
      <div class="grid gap-base lg:grid-cols-3">
        <div class="col-span-1 lg:pe-2.5">
          <div class="input-icon-group">
            <Icon icon="search" class="input-icon" />
            <input type="text" class="form-input" placeholder="Search contact name..." />
          </div>
        </div>

        <div class="lg:ps-2.5 xl:col-span-2">
          <div class="flex flex-wrap items-center gap-2.5">
            <span class="me-2.5 font-semibold">Filter By:</span>

            <div class="input-icon-group">
              <Icon icon="user-check" class="input-icon text-default-400" />
              <select class="form-select">
                <option selected>Designation</option>
                <option value="Manager">Manager</option>
                <option value="Developer">Developer</option>
                <option value="Designer">Designer</option>
                <option value="Sales">Sales</option>
                <option value="Support">Support</option>
              </select>
            </div>

            <div class="input-icon-group">
              <Icon icon="map-pin" class="input-icon text-default-400" />
              <select class="form-select">
                <option selected>Location</option>
                <option value="USA">USA</option>
                <option value="UK">UK</option>
                <option value="Germany">Germany</option>
                <option value="India">India</option>
                <option value="Canada">Canada</option>
              </select>
            </div>

            <div class="input-icon-group">
              <Icon icon="stack-2" class="input-icon text-default-400" />
              <select class="form-select">
                <option selected>Department</option>
                <option value="UI/UX">UI/UX</option>
                <option value="Engineering">Engineering</option>
                <option value="HR">HR</option>
                <option value="Marketing">Marketing</option>
                <option value="Finance">Finance</option>
              </select>
            </div>

            <button type="submit" class="btn bg-secondary text-white hover:bg-secondary-hover">Apply</button>

            <div class="ms-auto">
              <nav class="flex items-center gap-x-1" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                <button type="button" class="btn btn-icon active size-9.25! bg-primary/15 text-primary hs-tab-active:bg-primary hs-tab-active:text-white" id="contact-tab-1" aria-selected="true" data-hs-tab="#tabs-contact-1" aria-controls="tabs-contact-1" role="tab">
                  <Icon icon="apps" class="text-lg" />
                </button>

                <button type="button" class="btn btn-icon size-9.25! bg-primary/15 text-primary hs-tab-active:bg-primary hs-tab-active:text-white" id="contact-tab-2" aria-selected="false" data-hs-tab="#tabs-contact-2" aria-controls="#tabs-contact-2" role="tab">
                  <Icon icon="list-check" class="text-lg" />
                </button>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="grid grid-cols-1 gap-base md:grid-cols-2 lg:grid-cols-4">
    <ContactCard v-for="(contact, idx) in contactData" :key="idx" :contact="contact" />
  </div>

  <div class="mt-5">
    <nav class="mx-auto flex items-center justify-center gap-1.5" aria-label="Pagination">
      <button type="button" class="btn btn-icon rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary" aria-label="Previous">
        <Icon icon="chevron-left" class="align-middle text-lg" />
      </button>

      <button type="button" class="btn btn-icon bg-card hover:bg-default-50 border-default-300 hover:text-primary rounded-full">1</button>

      <button type="button" class="btn btn-icon bg-primary rounded-full text-white">2</button>

      <button type="button" class="btn btn-icon rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary">3</button>

      <button type="button" class="btn btn-icon rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary">4</button>

      <button type="button" class="btn btn-icon rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary">5</button>

      <button type="button" class="btn btn-icon rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary" aria-label="Next">
        <Icon icon="chevron-right" class="align-middle text-lg" />
      </button>
    </nav>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import ContactCard from './components/ContactCard.vue'
import { contactData } from './components/data'
</script>
