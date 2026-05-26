<template>
  <PageBreadcrumb title="Companies" subtitle="Apps" />

  <div class="card mb-base border border-default-300 shadow-none">
    <div class="card-body">
      <div class="grid gap-base xl:grid-cols-3">
        <div class="col-span-1 lg:pe-2.5">
          <div class="input-icon-group">
            <Icon icon="search" class="input-icon text-default-400" />
            <input type="text" class="form-input" placeholder="Search company name..." />
          </div>
        </div>

        <div class="lg:ps-2.5 xl:col-span-2">
          <div class="flex flex-wrap items-center gap-2.5">
            <span class="me-2.5 font-semibold">Filter By:</span>

            <div class="input-icon-group">
              <Icon icon="map-pin" class="input-icon text-default-400" />
              <select class="form-select">
                <option selected>Location</option>
                <option value="USA">USA</option>
                <option value="Canada">Canada</option>
                <option value="Germany">Germany</option>
                <option value="India">India</option>
                <option value="UK">United Kingdom</option>
              </select>
            </div>

            <div class="input-icon-group">
              <Icon icon="briefcase" class="input-icon text-default-400" />
              <select class="form-select">
                <option selected>Category</option>
                <option value="Tech">Tech</option>
                <option value="Finance">Finance</option>
                <option value="eCommerce">eCommerce</option>
                <option value="Healthcare">Healthcare</option>
                <option value="Automotive">Automotive</option>
              </select>
            </div>

            <div class="input-icon-group">
              <Icon icon="star" class="input-icon text-default-400" />
              <select class="form-select">
                <option selected>Rating</option>
                <option value="5">5 Stars</option>
                <option value="4">4 Stars & Up</option>
                <option value="3">3 Stars & Up</option>
                <option value="2">2 Stars & Up</option>
                <option value="1">1 Star & Up</option>
              </select>
            </div>

            <button type="submit" class="btn bg-secondary text-white hover:bg-secondary-hover">Apply</button>

            <div class="ms-auto">
              <nav class="flex items-center gap-x-1" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                <button type="button" class="btn btn-icon active size-9.25! bg-primary/15 text-primary hs-tab-active:bg-primary hs-tab-active:text-white" id="contact-tab-1" aria-selected="true" data-hs-tab="#tabs-contact-1" aria-controls="tabs-contact-1" role="tab">
                  <Icon icon="category" class="text-lg" />
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

  <div class="mb-5 grid grid-cols-1 gap-base md:grid-cols-2 xl:grid-cols-3">
    <CompanyCard v-for="(company, idx) in companyData" :key="idx" :company="company" />
  </div>

  <nav class="flex items-center justify-center gap-1.5" aria-label="Pagination">
    <button type="button" class="btn btn-icon rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary" aria-label="Previous">
      <span>«</span>
    </button>

    <button type="button" class="btn btn-icon rounded-full bg-primary text-white">1</button>

    <button type="button" class="btn btn-icon rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary">2</button>

    <button type="button" class="btn btn-icon rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary">3</button>

    <button type="button" class="btn btn-icon rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary">4</button>

    <button type="button" class="btn btn-icon rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary">5</button>

    <button type="button" class="btn btn-icon rounded-full border-default-300 bg-card hover:bg-default-50 hover:text-primary" aria-label="Next">
      <span>»</span>
    </button>
  </nav>
</template>

<script lang="ts" setup>
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import CompanyCard from './components/CompanyCard.vue'
import { companyData } from './components/data'
</script>
