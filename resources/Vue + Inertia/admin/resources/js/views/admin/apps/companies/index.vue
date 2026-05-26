<template>
  <PageBreadcrumb title="Companies" subtitle="Apps" />

  <BRow class="mb-3">
    <BCol lg="12">
      <BForm class="bg-light-subtle rounded border p-3">
        <BRow class="gap-3">
          <BCol>
            <BRow class="gap-3">
              <BCol lg="4">
                <div class="app-search">
                  <BFormInput type="text" placeholder="Search company name..." />
                  <Icon icon="search" :size="18" class="app-search-icon text-muted" />
                </div>
              </BCol>

              <BCol class="col-auto">
                <div class="d-flex align-items-center gap-2">
                  <span class="me-2 fw-semibold">Filter By:</span>

                  <div class="app-search">
                    <select class="form-select form-control my-1 my-md-0">
                      <option>Location</option>
                      <option value="USA">USA</option>
                      <option value="Canada">Canada</option>
                      <option value="Germany">Germany</option>
                      <option value="India">India</option>
                      <option value="UK">United Kingdom</option>
                    </select>
                    <Icon icon="map-pin" :size="18" class="app-search-icon text-muted" />
                  </div>

                  <div class="app-search">
                    <select class="form-select form-control my-1 my-md-0">
                      <option>Category</option>
                      <option value="Tech">Tech</option>
                      <option value="Finance">Finance</option>
                      <option value="eCommerce">eCommerce</option>
                      <option value="Healthcare">Healthcare</option>
                      <option value="Automotive">Automotive</option>
                    </select>
                    <Icon icon="briefcase" :size="18" class="app-search-icon text-muted" />
                  </div>

                  <div class="app-search">
                    <select class="form-select form-control my-1 my-md-0">
                      <option>Rating</option>
                      <option value="5">5 Stars</option>
                      <option value="4">4 Stars & Up</option>
                      <option value="3">3 Stars & Up</option>
                      <option value="2">2 Stars & Up</option>
                      <option value="1">1 Star & Up</option>
                    </select>
                    <Icon icon="star" :size="18" class="app-search-icon text-muted" />
                  </div>

                  <BButton variant="secondary" type="submit">Apply</BButton>
                </div>
              </BCol>
            </BRow>
          </BCol>

          <BCol class="col-auto">
            <div role="group" aria-label="Layout toggle button group">
              <input type="radio" class="btn-check" name="btnradio" id="btnradio1" checked />
              <label class="btn btn-soft-primary btn-icon me-1" for="btnradio1">
                <Icon icon="category" class="fs-lg" />
              </label>

              <input type="radio" class="btn-check" name="btnradio" id="btnradio2" />
              <label class="btn btn-soft-primary btn-icon" for="btnradio2">
                <Icon icon="list-check" class="fs-lg" />
              </label>
            </div>
          </BCol>
        </BRow>
      </BForm>
    </BCol>
  </BRow>

  <BRow>
    <BCol v-for="(company, idx) in companyData" :key="idx" xl="4" md="6">
      <CompanyCard :company="company" />
    </BCol>
  </BRow>

  <BPagination v-model="currentPage" :total-rows="100" :per-page="20" align="center" last-number first-number class="pagination-rounded pagination-boxed" />
</template>

<script setup lang="ts">
import { BButton, BCol, BForm, BFormInput, BPagination, BRow } from 'bootstrap-vue-next'
import { ref } from 'vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Icon from '@/components/wrappers/Icon.vue'
import CompanyCard from './components/CompanyCard.vue'
import { companyData } from './data'

const currentPage = ref(1)
</script>

<style scoped></style>
